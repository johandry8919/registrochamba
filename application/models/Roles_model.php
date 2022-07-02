<?php

    class Roles_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_roles', $data);
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

        public function verificarSiExiste($campo,$valor){

            $this->db->where($campo, $valor);
            $query = $this->db->get("tbl_roles");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_roles($perfil){

            $this->db->select('id_rol, nombre, created_on, perfil');
            $this->db->where('perfil', $perfil);
            $this->db->where('tbl_roles.activo', 1);
            $query = $this->db->get("tbl_roles");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        public function obtener_rol($id_rol){

            $this->db->select('tbl_roles.*');
            $this->db->where('id_rol', $id_rol);
            $query = $this->db->get("tbl_roles");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        
        public function actualizar_rol($id_rol, $datos){
           

            $this->db->where('id_rol', $id_rol);
            $this->db->update('tbl_roles', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

}


      

    }