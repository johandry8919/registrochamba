<?php

    class Representante_empresas_entes_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_representantes_empresas_entes', $data);
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
        public function Estructura_representante($data){
        
    
            $this->db->insert('tbl_representantes_empresas_entes', $data);
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
            $query = $this->db->get("tbl_representantes_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }

         public function update_representante($datos){
          

            $this->db->where('id_empresas_entes',  $datos['id_empresas_entes']);
            $this->db->update('public.tbl_representantes_empresas_entes', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
            



           


    }



    }