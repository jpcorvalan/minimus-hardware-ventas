<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('ingresar');
        }

        $this->load->model('ProductModel');

	}




    public function usuario_admin(){
        $data['titulo'] = 'Administrador';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/administrador');				// Contenido
		$this->load->view('templates/footer');
    }




    public function acceso_admin(){

        if($this->session->userdata('login')){

            if($this->session->userdata('id_perfil') == 1){

                $this->usuario_admin();

            }else{

                redirect('inicio');
            }

        }else{

            redirect('ingresar');

        }
    }




    //----- Página que visualiza las ventas -----
    public function listar_ventas(){
        $data['titulo'] = 'Ventas realizadas';

        $this->load->model('SalesModel');

        $data['ventas'] = $this->SalesModel->select_ventas();
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/listar_ventas', $data);				// Contenido
		$this->load->view('templates/footer');
    }



    //----- Página que visualiza los detalles de las ventas -----
    public function ver_detalle_venta($id_venta){
        $data['titulo'] = 'Detalle de venta';

        $this->load->model('SalesModel');

        $data['detalle_venta'] = $this->SalesModel->select_detalle_ventas($id_venta);
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/detalle_venta', $data);				// Contenido
		$this->load->view('templates/footer');
    }




    //----- Página que lista las consultas que hicieron los usuarios -----
    public function ver_consultas(){
        $data['titulo'] = "Consultas";

        $this->load->model('UsersModel');

        $data['consultas'] = $this->UsersModel->obtener_consultas();

        $this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/consultas', $data);				// Contenido
		$this->load->view('templates/footer');
    }



    //---- Función que marca como leído o no leído -----
    public function consulta_leida($id_consulta){
        $this->load->model('UsersModel');

        $consulta = $this->UsersModel->obtener_consulta_id($id_consulta);

        if($consulta->leido == 1){
            $this->UsersModel->update_consulta($id_consulta, 0);
        }else{
            $this->UsersModel->update_consulta($id_consulta, 1);
        }

        redirect('lista_consultas');
    }



    //----- Página que muestra en detalle una consulta específica -----
    public function consulta_ampliada($id_consulta){
        $data['titulo'] = "Detalle de consulta";

        $this->load->model('UsersModel');

        $data['consulta'] = $this->UsersModel->obtener_consulta_id($id_consulta);

        $this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/consulta_ampliada', $data);				// Contenido
		$this->load->view('templates/footer');
        
    }



    //----- Página que ve la información de todos los usuarios -----
    public function ver_info_usuarios(){
        $data['titulo'] = "Gestión de usuarios";

        $this->load->model('UsersModel');

        $data['usuarios'] = $this->UsersModel->obtener_usuarios();

        $this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/datos_usuarios', $data);				// Contenido
		$this->load->view('templates/footer');
    }




    public function usuario_activo_inactivo($id_usuario){
        $this->load->model('UsersModel');

        $usuario = $this->UsersModel->obtener_usuario_especifico($id_usuario);

        if($usuario->estado == 0){
            $this->UsersModel->baja_alta_usuario($id_usuario, 1);
        }else{
            $this->UsersModel->baja_alta_usuario($id_usuario, 0);
        }

        redirect('gestion_usuarios');
    }




}