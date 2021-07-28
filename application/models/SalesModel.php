<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// Contendrá funciones para guardar las ventas realizadas en la base de datos
class SalesModel extends CI_Model {

	function __construct(){

		parent::__construct();

	}



    public function guardar_venta($data){
        $this->db->insert('ventas', $data);
    }



    public function guardar_detalle_venta($data){
        $this->db->insert('detalle_venta', $data);
    }



    public function select_detalle_ventas($id_venta){
        $this->db->select('ventas.id, usuarios.nombre, usuarios.apellido, productos.ensambladora, productos.nombre AS producto_comprado, detalle_venta.cantidad, detalle_venta.precio, detalle_venta.cantidad, ventas.fecha_venta');
        $this->db->from('detalle_venta');
        $this->db->join('ventas', 'ventas.id = detalle_venta.id_venta');
        $this->db->join('productos', 'productos.id = detalle_venta.id_producto');
        $this->db->join('usuarios', 'usuarios.id = ventas.id_usuario');
        $this->db->where('id_venta', $id_venta);

        $query = $this->db->get();

        return $query->result();

        //----- QUERY NATIVO -----
        /*
            SELECT ventas.id, usuarios.nombre, usuarios.apellido, productos.ensambladora, productos.nombre AS producto_comprado, detalle_venta.cantidad, detalle_venta.precio
            FROM detalle_venta
            JOIN ventas ON ventas.id = detalle_venta.id_venta
            JOIN productos ON productos.id = detalle_venta.id_producto
            JOIN usuarios ON usuarios.id = ventas.id_usuario
            WHERE id_venta = $parametro;

        */
    }




    public function select_ventas(){

        $data = $this->input->post('busqueda');

        if(empty($data)){
            $this->db->select('ventas.id, usuarios.nombre, usuarios.apellido, usuarios.documento, ventas.fecha_venta');
            $this->db->from('ventas');
            $this->db->join('usuarios', 'usuarios.id = ventas.id_usuario');

            $query = $this->db->get();
            return $query->result();
        }else{
            
            $this->db->select('ventas.id, usuarios.nombre, usuarios.apellido, usuarios.documento, ventas.fecha_venta');
            $this->db->from('ventas');
            $this->db->join('usuarios', 'usuarios.id = ventas.id_usuario');
            $this->db->like('usuarios.documento', $data);
            $this->db->or_like('ventas.fecha_venta', $data);
            $this->db->or_like('usuarios.nombre', $data);
            $this->db->or_like('usuarios.apellido', $data);

            // $this->db->where('usuarios.documento', $data);

            $query = $this->db->get();
            return $query->result();
        }
        
        
                

        //----- QUERY NATIVO -----
        /*
            SELECT usuarios.nombre, usuarios.apellido, usuarios.documento, ventas.fecha_venta
            FROM ventas
            JOIN usuarios ON usuarios.id = ventas.id_usuario
        */
    }




    //----- Seleccionar la última venta -----
    public function select_ultima_venta(){
        $this->db->select('MAX(ventas.id) AS venta_id');
        $this->db->from('ventas');
        
        $query = $this->db->get();
        $resultado = $query->row();

        return $resultado;
    }



    //----- Borrar una venta -----
    public function borrar_venta($id_venta){
        $this->db->delete('ventas', array('id' => $id_venta));  // Produces: // DELETE FROM mytable  // WHERE id = $id
    }

}