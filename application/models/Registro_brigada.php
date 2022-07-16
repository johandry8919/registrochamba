<?php

    class Registro_brigada extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){

		$this->db->insert('tbl_brigadas_estructuras',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
            $insert_id = $this->db->insert_id();

            return  $insert_id;
		}

        }



        public function obtener_brigada(){

            $this->db->select('tbl_brigadas_estructuras.*,
            estado.nombre as nombre_estado ,municipio.nombre as municipio,parroquia.nombre as parroquia ,
            
            ');
            // $this->db->where('id_usuario_registro', $id);
            // $this->db->where('tbl_roles.activo', 1);
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia'); 
            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        public function obtener_brigada_id($id_brigada){

            $this->db->select('tbl_brigadas_estructuras.*,

            estado.nombre as nombre_estado ,municipio.nombre as municipio,parroquia.nombre as parroquia ,');

            $this->db->where('id_brigada', $id_brigada);
        
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia');  
            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }



        
        public function actualizar_brigada($id_rol, $datos){
           

            $this->db->where('id_rol_estructura', $id_rol);
            $this->db->update('tbl_brigadas_estructuras', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

}


      

    }