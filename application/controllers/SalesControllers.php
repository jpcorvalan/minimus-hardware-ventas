<?php


defined('BASEPATH') OR exit('No direct script access allowed');


// Contendrá funciones para recorrer el carrito y llamar a funciones en SalesModel
class SalesControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('SalesModel');
        $this->load->model('ProductModel');

	}



    public function venta_registrada_view(){
        $data['titulo'] = 'Compra exitosa';
        
        $data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/venta_exitosa');				// Contenido
		$this->load->view('templates/footer');
    }



    public function venta_fallida(){
        $data['titulo'] = 'Error en la venta';

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/venta_fallida');				// Contenido
		$this->load->view('templates/footer');
    }



    public function validacion_venta(){
        $this->form_validation->set_rules('codigo-postal', 'Código Postal', 'required|integer|callback_postal_valida');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('integer', 'El campo %s solo debe contener números');

        if($this->form_validation->run() == FALSE){
            $data['titulo'] = 'Carrito de compras';	
        
            if(!$this->cart->contents()){
                $data['message'] = 'El carrito está vacío';
            }else{
                $data['message'] = '';
            }
            
            $data['categorias'] = $this->ProductModel->select_categoria();

            $this->load->view('templates/head', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('contents/carrito_view', $data);				// Contenido
            $this->load->view('templates/footer');	
		}else{
            $this->guardar_venta();
        }
    }



    public function postal_valida($codigo_postal){
        $longitud = strlen($codigo_postal);

        if($longitud > 4){
            $this->form_validation->set_message('postal_valida', 'Ingrese un código postal válido');

            return false;
        }else{
            return true;
        }
    }



    public function guardar_venta(){
        $encabezado_venta = array(
            'id_usuario' => $this->session->userdata('id_usuario'),
            'fecha_venta' => date('Y-m-d'),
            'provincia' => $this->input->post('provincia'),
            'direccion' => $this->input->post('direccion'),
            'codigo_postal' => $this->input->post('codigo-postal')
        );

        $this->SalesModel->guardar_venta($encabezado_venta);


        // Obtenemos el último ID insertado en la tabla de ventas
        $id_venta = $this->db->insert_id();

        // Obtenemos los productos del carrito
        $cart = $this->cart->contents();

        foreach($cart as $item){

            $detalle_venta = array(
                'id_venta' => $id_venta,
                'id_producto' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['price']
            );

            //Controlar el stock de los productos

            //Obtenemos el id del producto
            // $producto = $this->ProductModel->select_producto_id($item['id']);
            
            $this->load->model('ProductModel');
            $producto = $this->ProductModel->select_producto_id($item['id']);

            foreach($producto as $row){
                $stock = $row->stock;
            }

            //Obtenemos el stock del producto

            //Actualizamos el stock del producto
            if($stock >= $item['qty']){
                $stock = $stock - $item['qty'];

                $data = array(
                    'stock' => $stock
                );

                $this->ProductModel->actualizar_producto($data, $item['id']);
                $this->SalesModel->guardar_detalle_venta($detalle_venta);
            }else{
                echo "<script type=\"text/javascript\">alert('No hay stock suficiente de uno de los productos seleccionados, no se realizará la venta');</script>";
                $this->load->model('SalesModel');

                $venta = $this->SalesModel->select_ultima_venta();

                $this->SalesModel->borrar_venta($venta->venta_id);

                $this->cart->destroy();
                
                $this->venta_fallida();

            }

        }

        $this->venta_registrada_view();

        $this->cart->destroy();
    }

}