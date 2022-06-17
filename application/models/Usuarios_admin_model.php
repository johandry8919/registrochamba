<?php

    class Usuarios_admin_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('usuarios_admin', $data);
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
            $query = $this->db->get("usuarios_admin");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_usuarios($id_rol){

            $this->db->where('id_rol', $id_rol);
            $query = $this->db->get("usuarios_admin");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }



      

        public function validarEmailUsuario($email,$id_rol=2){
            
            $this->db->where('upper(email)', $email);
            $this->db->where('id_rol', $id_rol);
            $query = $this->db->get("usuarios_admin");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }

        public function obtenerUsuarioEmpresa($email){
            
            
            $this->db->select('usuarios_admin.id_rol,usuarios_admin.email, usuarios_admin.password, 
            usuarios_admin.cedula,tipo_empresa,usuarios_admin.id_usuarios_admin,usuarios_admin.activo,
            usuarios_admin.created_on,
            empresas.id_empresas
            ');
          
            $this->db->join('tbl_representantes_empresas_entes re_entes', 're_entes.id_usuario = usuarios_admin.id_usuarios_admin');
            $this->db->join('tbl_empresas_entes empresas', 'empresas.id_empresas= re_entes.id_empresas_entes');
            $this->db->where('upper(usuarios_admin.email)', $email);

            $query = $this->db->get("usuarios_admin");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }
        



    }