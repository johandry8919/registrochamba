<?php

    class Empresas_entes_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar_empresa($data){
        
    
            $this->db->insert('tbl_empresas_entes', $data);
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
            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }



    }