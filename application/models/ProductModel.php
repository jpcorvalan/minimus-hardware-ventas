<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {

	function __construct(){

		parent::__construct();

	}



    public function agregar_producto($data){
        $this->db->insert('productos', $data);
    }



    public function select_categoria(){
        $query = $this->db->get('categorias');
        
        return $query->result();
    }



    public function select_productos(){

        $this->db->select('*');
        $this->db->from('productos');

        $query = $this->db->get();

        return $query->result();
    }



    public function select_producto_id($id){
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->result();
    }
    


    public function producto_categoria(){
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->join('categorias', 'categorias.id = productos.id_categoria');

        $query = $this->db->get();

        return $query->result();
    }



    public function producto_categoria_id($id_categoria){

        $data = $this->input->post('busqueda');

        if(empty($data)){
            $this->db->select('*, productos.id AS id_producto');
            $this->db->from('productos');
            $this->db->join('categorias', 'categorias.id = productos.id_categoria');
            $this->db->where('productos.id_categoria', $id_categoria);
    
            $query = $this->db->get();
    
            return $query->result();
        }else{
            $this->db->select('*, productos.id AS id_producto');
            $this->db->from('productos');
            $this->db->join('categorias', 'categorias.id = productos.id_categoria');
            $this->db->where('productos.id_categoria', $id_categoria);
            $this->db->like('productos.nombre', $data);
            $this->db->or_where('productos.id_categoria', $id_categoria);
            $this->db->like('productos.fabricante', $data);
            $this->db->or_where('productos.id_categoria', $id_categoria);
            $this->db->like('productos.ensambladora', $data);
    
            $query = $this->db->get();
    
            return $query->result();
        }


        /* QUERY NATIVO PARA BUSQUEDA */
        /*
        
            SELECT *, productos.id AS id_producto
            FROM productos
            JOIN categorias ON categorias.id = productos.id_categoria
            WHERE productos.id_categoria = 1 AND productos.nombre LIKE '%AMD%' OR
            productos.id_categoria = 1 AND productos.fabricante LIKE '%AMD%' OR
            productos.id_categoria = 1 AND productos.ensambladora LIKE '%AMD%';
 
        */


    }



    public function actualizar_producto($data, $id){
        $this->db->where('id', $id);
        $this->db->update('productos', $data);
    }



    public function select_productos_admin(){

        $busqueda = $this->input->post('busqueda');
        $orden = $this->input->post('seleccionar-filtro');

        if(empty($busqueda) && empty($orden)){

            $this->db->select('*');
            $this->db->from('productos');

            $query = $this->db->get();

            return $query->result();

        }else if(empty($orden) && !empty($busqueda)){
            $this->db->select('*');
            $this->db->from('productos');
            $this->db->like('productos.nombre', $busqueda);
            $this->db->or_like('productos.ensambladora', $busqueda);
            $this->db->or_like('productos.fabricante', $busqueda);
            $this->db->or_like('productos.descripcion', $busqueda);

            $query = $this->db->get();

            return $query->result();

        }else if(!empty($orden) && empty($busqueda)){
            
            if($orden == "stock-alto"){
                $this->db->select('*');
                $this->db->from('productos');
                $this->db->order_by('stock', 'DESC');

                $query = $this->db->get();

                return $query->result();

            }else if($orden == "stock-bajo"){
                $this->db->select('*');
                $this->db->from('productos');
                $this->db->order_by('stock', 'ASC');

                $query = $this->db->get();

                return $query->result();
            }else if($orden == "inactivos"){
                $this->db->select('*');
                $this->db->from('productos');
                $this->db->order_by('estado', 'ASC');

                $query = $this->db->get();

                return $query->result();
            }else if($orden == "precio-alto"){
                $this->db->select('*');
                $this->db->from('productos');
                $this->db->order_by('precio', 'DESC');

                $query = $this->db->get();

                return $query->result();
            }else if($orden == "precio-bajo"){
                $this->db->select('*');
                $this->db->from('productos');
                $this->db->order_by('precio', 'ASC');

                $query = $this->db->get();

                return $query->result();
            }else{
                $this->db->select('*');
                $this->db->from('productos');

                $query = $this->db->get();

                return $query->result();
            }


        }

        
    }




}