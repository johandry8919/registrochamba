<?php

    class Estatus_oferta_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_estatus_oferta', $data);
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
            $query = $this->db->get("tbl_estatus_oferta");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_estatus_oferta(){

       
         
            $query = $this->db->get("tbl_estatus_oferta");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


        public function obtener_estatus_oferta_chambista(){

           
         
            $query = $this->db->get("tbl_estatus_oferta_chambista");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }






    }