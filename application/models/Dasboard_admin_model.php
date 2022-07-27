<?php

    class Dasboard_admin_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function verificarSiExiste($campo,$valor){

            $this->db->where($campo, $valor);
            $query = $this->db->get("usuarios_admin");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_total_usuarios_registrados(){

            $this->db->select('count(id_usuario_personal) as total');
            $query = $this->db->get("tbl_usuarios_personales");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = 0;
    

            return $valor;
        }

        public function obtener_registros_completados(){

            $this->db->select('count(id_usuario) as total');
            $this->db->where('porcentaje_perfil', 100);
            $query = $this->db->get("tbl_usuarios");
 
            if ($query->num_rows()) $valor = $query->row();
            else $valor = 0;
    

            return $valor;
        }


        public function obtener_estados_chambistas_registrados(){

            $this->db->select('tbl_estado.nombre AS estado, tbl_usuarios_personales.creado');
            $this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_usuarios_personales.codigoestado');
            $query = $this->db->get("tbl_usuarios_personales");
             if ($query->num_rows()) $valor = $query->row();
            else $valor = 0;
    

            return $valor;
        }

        public function obtener_empresas_registradas(){

            $this->db->select('count(id_empresas) as total');
            $this->db->where('id_tipo_empresas_universidades',1);
            $query = $this->db->get("tbl_empresas_entes");
                if ($query->num_rows()) $valor = $query->row();
            else $valor = 0;
            return $valor;
        }


        
        
        public function obtener_univesidades_registradas(){

            $this->db->select('count(id_empresas) as total');
            $this->db->where('id_tipo_empresas_universidades',2);
            $query = $this->db->get("tbl_empresas_entes");
                if ($query->num_rows()) $valor = $query->row();
            else $valor =0;
            return $valor;
        }


        public function obtener_estructuras_registradas(){

            $this->db->select('count(id_estructura) as total');         
            $query = $this->db->get("tbl_estructuras");
                if ($query->num_rows()) $valor = $query->row();
            else $valor = 0;
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
        



    }