<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ProductControllers extends CI_Controller {

	function __construct(){

		parent::__construct();

		// if(!$this->session->userdata('login')){
		// 	redirect('ingresar');
		// }

		$this->load->model('ProductModel');

	}



	/** ----- Controladores para agregar un producto NUEVO - INICIO ----- */

	//----- Carga la vista del formulario -----
	public function alta_producto(){

		$this->load->model('ProductModel');

		$data['categorias'] = $this->ProductModel->select_categoria();
		$data['titulo'] = 'Alta de producto';
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/alta_producto');				// Contenido
		$this->load->view('templates/footer');	
		
	}



	//----- Validaciones para la comprobación de las entradas -----
	public function registrar_producto(){
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('fabricante', 'Fabricante', 'required');
		$this->form_validation->set_rules('ensambladora', 'Ensambladora', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		$this->form_validation->set_rules('categoria', 'Seleccione una categoría', 'required|callback_select_validate');
		$this->form_validation->set_rules('stock', 'Cantidad de stock', 'required');
		$this->form_validation->set_rules('garantia', 'Año/Días de garantía', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required|integer');

		$this->form_validation->set_rules('imagen', 'Imagen', 'callback_validar_imagen');


		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('integer', 'El campo %s solo debe contener números enteros');
		$this->form_validation->set_message('numeric', 'El campo %s solo debe contener números');


		if($this->form_validation->run() == FALSE){
			$this->alta_producto();
		}else{
            $this->guardar_producto();
        }

	}



	//----- Verificación de una correcta selección de categoría -----
	public function select_validate($categoria){

		if($categoria == "0"){

			$this->form_validation->set_message('select_validate', 'Selecciona una categoría');

			return false;

		}else{

			return true;

		}

	}



	//----- Callback para la validación de la imagen subida -----
	public function validar_imagen($imagen){

		$nombre_imagen = $_FILES['imagen']['name'];

		if(empty($nombre_imagen)){

			$this->form_validation->set_message('validar_imagen', 'Seleccione una imagen para subir');

			return false;

		}else{
			
			return true;

		}

	}



	//----- Carga el modelo para guardar los datos en la base de datos -----
	public function guardar_producto(){

		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
		$config['remove_spaces'] = TRUE;
		$config['max_size'] = '1024';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('imagen')){

			echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";

			$this->alta_producto();

		}else{

			$data = array(

				'nombre' => $this->input->post('nombre'),
				'fabricante' => $this->input->post('fabricante'),
				'ensambladora' => $this->input->post('ensambladora'),
				'precio' => $this->input->post('precio'),
				'descripcion' => $this->input->post('descripcion'),
				'id_categoria' => $this->input->post('categoria'),
				'stock' => $this->input->post('stock'),
				'garantia' => $this->input->post('garantia'),
				'estado' => 1,
				'imagen' => $_FILES['imagen']['name']

			);

			$this->load->model('ProductModel');

			$this->ProductModel->agregar_producto($data);

			$this->alta_producto();

		}


	}


	/** ----- Controladores para agregar un producto NUEVO - FIN ----- */




	/** ----- Controladores para editar un producto - INICIO ----- */


	//----- Carga la vista de los productos -----

	public function gestion_producto(){

		$data['producto'] = $this->ProductModel->select_productos_admin();
		$data['categoria'] = $this->ProductModel->select_categoria();

		$data['titulo'] = 'Gestionar productos';

		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/gestion_productos', $data);				// Contenido
		$this->load->view('templates/footer');	

	}



	//----- Carga el formulario para editar los productos -----

	public function form_editar_producto($id = NULL){

		$producto = $this->ProductModel->select_producto_id($id);

		$data['titulo'] = 'Formulario de edición de productos';
		$data['categorias'] = $this->ProductModel->select_categoria();

		foreach($producto as $row){
			$data['id'] = $row->id;
			$data['nombre'] = $row->nombre;
			$data['fabricante'] = $row->fabricante;
			$data['ensambladora'] = $row->ensambladora;
			$data['precio'] = $row->precio;
			$data['descripcion'] = $row->descripcion;
			$data['categoria'] = $row->id_categoria;
			$data['stock'] = $row->stock;
			$data['garantia'] = $row->garantia;
			$data['estado'] = $row->estado;
			$data['imagen'] = $row->imagen;
		}		

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar');
		$this->load->view('contents/form_editar_producto_view', $data);				// Contenido
		$this->load->view('templates/footer');	

	}



	//----- Función que confirma la edición del producto -----
	public function actualizar_datos_producto($id){

		// Validación de la información enviada a través del formulario
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('fabricante', 'Fabricante', 'required');
		$this->form_validation->set_rules('ensambladora', 'Ensambladora', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		$this->form_validation->set_rules('categoria', 'Seleccione una categoría', 'required|callback_select_validate');
		$this->form_validation->set_rules('stock', 'Cantidad de stock', 'required');
		$this->form_validation->set_rules('garantia', 'Año/Días de garantía', 'required');
		$this->form_validation->set_rules('estado', 'Estado', 'required|integer');

		// $this->form_validation->set_rules('imagen', 'Imagen', 'callback_validar_imagen');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('integer', 'El campo %s solo debe contener números enteros');
		$this->form_validation->set_message('numeric', 'El campo %s solo debe contener números');


		// Guardamos el nombre de la imagen en la variable
		$nombre_imagen = $_FILES['imagen']['name'];

		if(!empty($nombre_imagen)){		//Si es administrador SI ACTUALIZÓ LA IMAGEN (es decir, si la imagen NO está vacía)

			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
			$config['remove_spaces'] = TRUE;
			$config['max_size'] = '1024';
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('imagen')){

				echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>";

				$this->alta_producto();

			}else{

				$data = array(

					'nombre' => $this->input->post('nombre'),
					'fabricante' => $this->input->post('fabricante'),
					'ensambladora' => $this->input->post('ensambladora'),
					'precio' => $this->input->post('precio'),
					'descripcion' => $this->input->post('descripcion'),
					'id_categoria' => $this->input->post('categoria'),
					'stock' => $this->input->post('stock'),
					'garantia' => $this->input->post('garantia'),
					'estado' => $this->input->post('estado'),
					'imagen' => $_FILES['imagen']['name']
	
				);
	
				$this->load->model('ProductModel');

				// Función del modelo que actualiza los datos
				$this->ProductModel->actualizar_producto($data, $id);

				// Redirecciona a la vista de los productos
				$this->gestion_producto();

			}

		}else{		// Si actualizó todos los datos MENOS LA IMAGEN

			$data = array(

				'nombre' => $this->input->post('nombre'),
				'fabricante' => $this->input->post('fabricante'),
				'ensambladora' => $this->input->post('ensambladora'),
				'precio' => $this->input->post('precio'),
				'descripcion' => $this->input->post('descripcion'),
				'id_categoria' => $this->input->post('categoria'),
				'stock' => $this->input->post('stock'),
				'garantia' => $this->input->post('garantia'),
				'estado' => $this->input->post('estado')

			);

			$this->load->model('ProductModel');
	
			// Función del modelo que actualiza los datos
			$this->ProductModel->actualizar_producto($data, $id);

			// Redirecciona a la vista de los productos
			$this->gestion_producto();
		}


	}









	//----- Controladores del CARRITO DE COMPRAS -----


	//-----Carga la vista del carrito-----
	// public function carrito(){

	// 	$this->load->model('ProductModel');

	// 	$data['titulo'] = 'Carrito de compras';		
			
	// 	$this->load->view('templates/head', $data);
	// 	$this->load->view('templates/navbar');
	// 	$this->load->view('contents/carrito_view.html');				// Contenido
	// 	$this->load->view('templates/footer');	

	// }



	//----- Carga la vista del producto seleccionado -----
	public function producto_view($id){

		$this->load->model('ProductModel');
		$producto = $this->ProductModel->select_producto_id($id);

		foreach($producto as $row){
			$data['id'] = $row->id;
			$data['nombre'] = $row->nombre;
			$data['fabricante'] = $row->fabricante;
			$data['ensambladora'] = $row->ensambladora;
			$data['precio'] = $row->precio;
			$data['descripcion'] = $row->descripcion;
			$data['categoria'] = $row->id_categoria;
			$data['stock'] = $row->stock;
			$data['garantia'] = $row->garantia;
			$data['estado'] = $row->estado;
			$data['imagen'] = $row->imagen;
		}

		$data['titulo'] = 'Ver producto';		
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/producto_view', $data);				// Contenido
		$this->load->view('templates/footer');	

	}



	//----- Carga la vista de los productos por CATEGORIA -----
	public function productos_por_categoria($id_categoria){

		$data['productos'] = $this->ProductModel->producto_categoria_id($id_categoria);

		$data['titulo'] = "Productos";
		$data['categorias'] = $this->ProductModel->select_categoria();

		$this->load->view('templates/head', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('contents/productos_categoria', $data);				// Contenido
		$this->load->view('templates/footer');	
		
	}




}