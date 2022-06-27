<?php

    class Menu_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('menu', $data);
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
            $query = $this->db->get("menu");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_menu($id_rol){


            $this->db->join('submenu', 'submenu.id_menu=menu.id_menu');
            $this->db->join('rol_submenu', 'rol_submenu.id_menu=submenu.id_submenu');
            $this->db->where('rol_submenu.id_rol', $id_rol);
            $query = $this->db->get("menu");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        

        public function obtener_sub_menu(){


            $query = $this->db->get("sub_menu");
    
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