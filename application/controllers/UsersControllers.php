<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class UsersControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('ProductModel');

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



    //----- Reglas de envío del formulario -----
    public function registrar_usuario(){

        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Confirmar contraseña', 'required|trim|matches[password]');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'required|is_unique[usuarios.email]|valid_email');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('documento', 'Nro. Documento', 'required|integer');
        

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_length', 'El campo %s debe contener %d caracteres o más');
        $this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
        $this->form_validation->set_message('is_unique', 'El cliente ya está registrado');
        $this->form_validation->set_message('valid_email', 'Ingrese una dirección de correo válida');
        $this->form_validation->set_message('integer', 'El campo %s solo debe contener números');


		
		if($this->form_validation->run() == FALSE){
			$this->registro();
		}else{
            $this->insertar_usuario();
        }

    }



    //----- Guardado del usuario en la base de datos -----
    public function insertar_usuario(){

        $usuario = array(
            'usuario' => $this->input->post('usuario'),
            'password' => base64_encode($this->input->post('password')),
            'email' => $this->input->post('email'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'documento' => $this->input->post('documento'),
            'id_perfil' => 2,
            'estado' => 1
        );

        $this->load->model('UsersModel');

        $this->UsersModel->guardar_usuario($usuario);

        redirect('login');

    }




    //----- Login del usuario -----
    public function ingresar_usuario(){

    }




    //----- Inicio de sesión - ROUTE = 'ingresar' -----
    public function iniciar_sesion(){

        $this->form_validation->set_rules('email', 'Correo electrónico');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verificar_password');

        // La regla 'callback' necesita una función para ejecutarse, la cual recibirá como parámetro el primer campo escrito en el set_rules()
        // En este caso 'password'

        if($this->form_validation->run() == FALSE){

            $this->ingreso();

        }else{

            $this->usuario_logueado();

        }

    }




    //----- Callback - Verificación de password -----
    public function verificar_password($password){

        $usuario = $this->input->post('email');
        $pass = $this->input->post('password');

        $pass_encriptado = base64_encode($pass);
        

        //Cargamos el modelo para poder acceder a sus funciones
        $this->load->model('UsersModel');

        //Accedemos a una funcion de 'UsersModel'
        $usuario = $this->UsersModel->buscar_usuario($usuario, $pass_encriptado);


        //Verificación de la búsqueda del usuario con una estructura selectiva
        if($usuario){

            // Se creará un array con los datos del usuario que queramos que estén disponibles en todas las páginas

            if($usuario->estado == 1){
                $datos_usuario = array(

                    'id_usuario' => $usuario->id,
                    'usuario' => $usuario->usuario,
                    'email' => $usuario->email,
                    'nombre' => $usuario->nombre,
                    'apellido' => $usuario->apellido,
                    'id_perfil' => $usuario->id_perfil,
                    'login' => TRUE

                );

                // La función 'set_userdata($param)' sirve para cargar los valores de la sesión, para acceder a ellos
                // se utiliza 'userdata($param)' donde $param puede ser cualquiera de los valores que definimos dentro del array
                $this->session->set_userdata($datos_usuario);

                return true;
            }else{
                $this->form_validation->set_message('verificar_password', 'Este usuario fue dado de baja, consulte con la administración para más información');

                return false;
            }



        }else{

            $this->form_validation->set_message('verificar_password', 'Usuario y/o contrase&ntilde;a incorrectos');

            return false;

        }

    }



    //----- Usuario Logueado -----
    /** Función que se encarga de verificar el tipo de usuario logueado (administrador, moderador o cliente) */
    public function usuario_logueado(){

        // Primero verificamos que el valor 'login' de nuestro array sea verdadero.
        // Si es verdadero significa que hay una sesión abierta
        if($this->session->userdata('login')){

            switch($this->session->userdata('id_perfil')){
                case '1':
                    redirect('administrador');
                    break;

                case '2':
                    redirect('inicio');
                    break;

                case '3':
                    redirect('moderador');
                    break;
            }

        }

    }




    //----- Cerrar sesión -----
    /** Función que se encarga de cerrar/destruir la sesión actual */
    public function cerrar_sesion(){

        $this->session->sess_destroy();

        redirect('inicio');

    }

    

}


