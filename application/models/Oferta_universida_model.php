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

        public function post_regitrar_solicitud($data){
        
    
            $this->db->insert('tbl_solicitudes_chambistas', $data);
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


    
    public function buscar_oferta_chambista_id($id_usuario,$id_oferta){

            
        $this->db->where('id_usuario_chambista', $id_usuario);
        $this->db->where('id_oferta', $id_oferta);
        $query = $this->db->get("tbl_solicitudes_chambistas");

        if ($query->num_rows()) $valor = $query->row();
        else $valor = false;


        return $valor;
    }



    

    public function obtener_solicitud_chambista($id_oferta){

        $this->db->select('tbl_usuarios.id_usuario, tbl_usuarios.cedula,tbl_usuarios.email,up.nombres, up.telf_cel,
        up.apellidos,profesion.desc_profesion, id_estatus_solicitud,tblestatus.descripcion as estatus,id_solicitud_chambista

    
                
        ');
      
        $this->db->join('tbl_usuarios', 'tbl_usuarios.id_usuario = tbl_solicitudes_chambistas.id_usuario_chambista','left');
        $this->db->join('tbl_usuarios_personales up', 'up.id_usuario = tbl_solicitudes_chambistas.id_usuario_chambista','left');
        $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = up.id_profesion_oficio', 'left');
        $this->db->join('tbl_estatus_oferta_chambista tblestatus', 'tblestatus.id_estatus_chambista = tbl_solicitudes_chambistas.id_estatus_solicitud','left');

        $this->db->where('id_oferta', $id_oferta);
        $query = $this->db->get("tbl_solicitudes_chambistas");

        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;
    }

    public function update_solicitud_chambista ($datos,$id_solicitud){
          

        $this->db->where('id_solicitud_chambista',  $id_solicitud);
        $this->db->update('tbl_solicitudes_chambistas', $datos);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function eliminar_solicitud_chambista($id_oferta_chambista){

            
        $this->db->where('id_solicitud_chambista', $id_oferta_chambista);

        $query = $this->db->delete('tbl_solicitudes_chambistas');



     
    }
    }
