<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class CartControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('ProductModel');

	}



    public function carrito(){

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

	}



    public function agregar_productos_carrito(){


        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('producto'),
            'price' => $this->input->post('precio'),
            'qty' => $this->input->post('cantidad')
        );

        $this->cart->insert($data);

        $this->carrito();

    }



    public function borrar($id){
        if($id == "all"){
            $this->cart->destroy();
        }else{
            $data = array(
                'rowid' => $id,
                'qty' => 0
            );

            $this->cart->update($data);
        }

        $this->carrito();
    }


}