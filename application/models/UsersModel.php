<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

	function __construct(){

		parent::__construct();

	}




    //----- Guarda usuario en la base de datos -----
    public function guardar_usuario($data){
        $this->db->insert('usuarios', $data);
    }




    //----- Busca usuario en la base de datos -----
    public function buscar_usuario($email, $contrasenia){

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('email', $email);        
        $this->db->where('password', $contrasenia);        

        $query = $this->db->get();
        $resultado = $query->row();

        return $resultado;

    }




    //----- Enviar la consulta a la base de datos -----
    public function guardar_consulta($data){
        $this->db->insert('consultas', $data);
    }




    //----- Obtener la lista de las consultas -----
    public function obtener_consultas(){
        $data = $this->input->post('busqueda');

        if(empty($data)){
            $this->db->select('*');
            $this->db->from('consultas');
    
            $query = $this->db->get();
    
            return $query->result();
        }else{

            $this->db->select('*');
            $this->db->from('consultas');
            $this->db->like('consultas.nombre', $data);
            $this->db->or_like('consultas.apellido', $data);
            $this->db->or_like('consultas.email', $data);
            $this->db->or_like('consultas.consulta', $data);
    
            $query = $this->db->get();
    
            return $query->result();
        }
    }



    //----- Obtiene una consulta específica -----
    public function obtener_consulta_id($id_consulta){        
        $this->db->select('*');
        $this->db->from('consultas');
        $this->db->where('consultas.id', $id_consulta);

        $query = $this->db->get();
        $resultado = $query->row();

        return $resultado;
    }




    //----- Actualiza la consulta -----
    public function update_consulta($id_consulta, $data){
        $this->db->set('leido', $data);        
        $this->db->where('id', $id_consulta);
        $this->db->update('consultas');
    }



    //----- Obtiene todos los usuarios registrados -----
    public function obtener_usuarios(){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->order_by('id_perfil', 'ASC');

        $query = $this->db->get();
    
        return $query->result();
    }



    public function obtener_usuario_especifico($id_usuario){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id', $id_usuario);

        $query = $this->db->get();
        $resultado = $query->row();

        return $resultado;
    }



    //----- Dar de baja o activar un usuario -----
    public function baja_alta_usuario($id_usuario, $data){
        $this->db->set('estado', $data);
        $this->db->where('id', $id_usuario);
        $this->db->update('usuarios');
    }



}

?>