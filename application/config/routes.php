<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'ProjectControllers';
$route['login'] = 'ProjectControllers/ingreso';
$route['inicio'] = 'ProjectControllers/index';
$route['comercializacion'] = 'ProjectControllers/comercializacion';
$route['login'] = 'UsersControllers/ingreso';
$route['registrarme'] = 'UsersControllers/registro';
$route['registrar'] = 'UsersControllers/registrar_usuario';
$route['ingresar'] = 'UsersControllers/iniciar_sesion';
$route['salir'] = 'UsersControllers/cerrar_sesion';
$route['categorias/(:num)'] = 'ProductControllers/productos_por_categoria/$1';
$route['registrar_consulta'] = 'ProjectControllers/registrar_consulta';
$route['administrador'] = 'AdminControllers/acceso_admin';
$route['ventas_realizadas'] = 'AdminControllers/listar_ventas/';
$route['detalle_venta/(:num)'] = 'AdminControllers/ver_detalle_venta/$1';
$route['lista_consultas'] = 'AdminControllers/ver_consultas';
$route['consulta_leida/(:num)'] = 'AdminControllers/consulta_leida/$1';
$route['consulta_ampliada/(:num)'] = 'AdminControllers/consulta_ampliada/$1';
$route['gestion_usuarios'] = 'AdminControllers/ver_info_usuarios';
$route['activar_desactivar_usuario/(:num)'] = 'AdminControllers/usuario_activo_inactivo/$1';
$route['agregar_producto'] = 'ProductControllers/alta_producto';
$route['registrar_producto'] = 'ProductControllers/registrar_producto';
$route['gestion_producto'] = 'ProductControllers/gestion_producto';
$route['editar_producto/(:num)'] = 'ProductControllers/form_editar_producto/$1';
// $route['actualizar_producto'] = 'ProductControllers/actualizar_producto';
$route['actualizar_producto/(:num)'] = 'ProductControllers/actualizar_datos_producto/$1';
$route['carrito'] = 'CartControllers/agregar_productos_carrito';
$route['borrar/(:any)'] = 'CartControllers/borrar/$1';
$route['producto/(:num)'] = 'ProductControllers/producto_view/$1';
$route['realizar_compra'] = 'SalesControllers/validacion_venta';
$route['venta_fallida'] = 'SalesControllers/venta_fallida';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
