<?php

    class Oferta_universida_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_solicitudes_estudios', $data);
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

        public function obtener_univerdidad($id_tipo_empresa = 2){
        

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,estado.nombre as nombre_estado,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, cargo, productivo
  
                    
            ');
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');

            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }
        public function obtener_ofertas(){

            $this->db->select('public.tbl_solicitudes_estudios.*,
            tbl_empresas_entes.nombre_razon_social,
            mencion,
            tbl_areas_formacion.nombre as formacion,tbl_estatus_oferta.descripcion as estatus
        
                    
            ');
       
            $this->db->where("tbl_solicitudes_estudios.activo",1);
            $this->db->join('tbl_empresas_entes', 'tbl_empresas_entes.id_empresas = tbl_solicitudes_estudios.id_area_formacion');
      
            $this->db->join('tbl_areas_formacion', 'tbl_areas_formacion.id_area_form = tbl_solicitudes_estudios.id_area_formacion');
            $this->db->join('tbl_estatus_oferta', 'tbl_estatus_oferta.id_estatus_oferta = tbl_solicitudes_estudios.id_estatus');

            $query = $this->db->get("tbl_solicitudes_estudios");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

          public function obtener_oferta($id_solicitud){

            $this->db->select('public.tbl_solicitudes_estudios.*,
            tbl_empresas_entes.nombre_razon_social,
            mencion,
            tbl_areas_formacion.nombre as formacion,tbl_estatus_oferta.descripcion as estatus
        
                    
            ');
            $this->db->where("id_solicitud",$id_solicitud);
            $this->db->where("tbl_solicitudes_estudios.activo",1);
            $this->db->join('tbl_empresas_entes', 'tbl_empresas_entes.id_empresas = tbl_solicitudes_estudios.id_area_formacion');
      
            $this->db->join('tbl_areas_formacion', 'tbl_areas_formacion.id_area_form = tbl_solicitudes_estudios.id_area_formacion');
            $this->db->join('tbl_estatus_oferta', 'tbl_estatus_oferta.id_estatus_oferta = tbl_solicitudes_estudios.id_estatus');

            $query = $this->db->get("tbl_solicitudes_estudios");
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function update_oferta ($datos){
          

            $this->db->where('id_area_formacion',  $datos['id_area_formacion']);
            $this->db->update('tbl_solicitudes_estudios', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
            



           


    }
    }
