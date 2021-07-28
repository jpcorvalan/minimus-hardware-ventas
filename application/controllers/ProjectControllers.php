<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->load->model('ProductModel');

	}

	
	//---- Home ----
	public function index(){	

		$data['titulo'] = 'Inicio';

		$data['productos'] = $this->ProductModel->select_productos();
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/principal', $data);				// Contenido
		$this->load->view('templates/footer');

	}



	//----- Comercializacion -----
	public function comercializacion(){		

		$data['titulo'] = '¿Cómo comprar?';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/comercializacion');			// Contenido
		$this->load->view('templates/footer');

	}



	//----- ¿Quiénes somos? -----
	public function nosotros(){

		$data['titulo'] = 'Sobre nosotros';
		
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/nosotros');			// Contenido
		$this->load->view('templates/footer');

	}



	//----- Ingreso/Login -----
	public function ingreso(){

		$data['titulo'] = 'Login';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/ingreso');			// Contenido
		$this->load->view('templates/footer');

	}



	//----- Registro -----
	public function registro(){

		$data['titulo'] = 'Registro';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/registro');			// Contenido
		$this->load->view('templates/footer');

	}



	//----- Contacto -----
	public function contacto(){

		$data['titulo'] = 'Contacto';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/contacto');			// Contenido
		$this->load->view('templates/footer');

	}



	//----- Términos y condiciones de uso -----
	public function terminos(){

		$data['titulo'] = 'Términos y condiciones de uso';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/terminos');			// Contenido
		$this->load->view('templates/footer');

	}




	//
	public function usuario_admin(){
        $data['titulo'] = 'Administrador';
		
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/administrador.html');				// Contenido
		$this->load->view('templates/footer');
    }




	//----- Funciones sobre las consultas -----

	//----- Función que CAPTURA las consultas para la BD-----
    public function registrar_consulta(){
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
        $this->form_validation->set_rules('mensaje', 'Consulta', 'required');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'Ingrese una dirección de correo válida');

        if($this->form_validation->run() == FALSE){

			$this->index();
									
		}else{
            $this->insertar_consulta();
        }

    }


    //----- Función que INSERTA las consultas en la BD -----
    public function insertar_consulta(){

        $consulta = array(
            
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'email' => $this->input->post('email'),
            'consulta' => $this->input->post('mensaje'),
			'leido' => 0

        );

        $this->load->model('UsersModel');

        $this->UsersModel->guardar_consulta($consulta);

        redirect('inicio');

    }

}
