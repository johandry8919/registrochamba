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

        public function obtener_empresas(){

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, cargo, productivo
	
        						
            ');
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');

            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


    }