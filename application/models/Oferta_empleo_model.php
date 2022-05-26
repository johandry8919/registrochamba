<?php

    class Oferta_empleo_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_ofertas_empleo', $data);
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
            $query = $this->db->get("tbl_ofertas_empleo");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_oferta($id_rol){

            $this->db->where('id_oferta', $id_rol);
            $query = $this->db->get("tbl_ofertas_empleo");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }



        public function update_oferta ($datos,$id){
          

            $this->db->where('id_oferta',  $id);
            $this->db->update('tbl_ofertas_empleo', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
            



           


    }




    }