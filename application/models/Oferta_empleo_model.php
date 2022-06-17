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


        public function obtener_ofertas(){

            $this->db->select('tbl_ofertas_empleo.*,
            tbl_empresas_entes.nombre_razon_social,tbl_instruccion.nivel,profesion.desc_profesion,
            tbl_areas_formacion.nombre as formacion,tbl_estatus_oferta.descripcion as estatus
        
                    
            ');
       
            $this->db->where("tbl_ofertas_empleo.activo",1);
            $this->db->join('tbl_empresas_entes', 'tbl_empresas_entes.id_empresas = tbl_ofertas_empleo.id_empresa_ente');
            $this->db->join('tbl_instruccion ', 'tbl_instruccion.id_instruccion = tbl_ofertas_empleo.id_nivel_instruccion');
            $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = tbl_ofertas_empleo.id_profesion_oficio');
            $this->db->join('tbl_areas_formacion', 'tbl_areas_formacion.id_area_form = tbl_ofertas_empleo.id_area_formacion');
            $this->db->join('tbl_estatus_oferta', 'tbl_estatus_oferta.id_estatus_oferta = tbl_ofertas_empleo.id_estatus_oferta');

            $query = $this->db->get("tbl_ofertas_empleo");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

   


        
        public function obtener_ofertas_empresa($id_empresa){

            $this->db->select('tbl_ofertas_empleo.*,
            tbl_empresas_entes.nombre_razon_social,tbl_instruccion.nivel,profesion.desc_profesion,
            tbl_areas_formacion.nombre as formacion,tbl_estatus_oferta.descripcion as estatus
        
                    
            ');
       
            $this->db->where("tbl_ofertas_empleo.activo",1);
            $this->db->where("tbl_ofertas_empleo.id_empresa_ente",$id_empresa);
            $this->db->join('tbl_empresas_entes', 'tbl_empresas_entes.id_empresas = tbl_ofertas_empleo.id_empresa_ente');
            $this->db->join('tbl_instruccion ', 'tbl_instruccion.id_instruccion = tbl_ofertas_empleo.id_nivel_instruccion');
            $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = tbl_ofertas_empleo.id_profesion_oficio');
            $this->db->join('tbl_areas_formacion', 'tbl_areas_formacion.id_area_form = tbl_ofertas_empleo.id_area_formacion');
            $this->db->join('tbl_estatus_oferta', 'tbl_estatus_oferta.id_estatus_oferta = tbl_ofertas_empleo.id_estatus_oferta');

            $query = $this->db->get("tbl_ofertas_empleo");
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

     

        public function obtener_oferta($id_oferta){

            $this->db->select(' tbl_ofertas_empleo.*,
            tbl_empresas_entes.nombre_razon_social,tbl_instruccion.nivel,profesion.desc_profesion,
            tbl_areas_formacion.nombre as formacion
        
                    
            ');
            $this->db->where("id_oferta",$id_oferta);
            $this->db->where("tbl_ofertas_empleo.activo",1);
            $this->db->join('tbl_empresas_entes', 'tbl_empresas_entes.id_empresas = tbl_ofertas_empleo.id_empresa_ente');
            $this->db->join('tbl_instruccion ', 'tbl_instruccion.id_instruccion = tbl_ofertas_empleo.id_nivel_instruccion');
            $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = tbl_ofertas_empleo.id_profesion_oficio');
            $this->db->join('tbl_areas_formacion', 'tbl_areas_formacion.id_area_form = tbl_ofertas_empleo.id_area_formacion');
            $query = $this->db->get("tbl_ofertas_empleo");
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }

        public function update_oferta ($datos){
          

            $this->db->where('id_oferta',  $datos['id_oferta']);
            $this->db->update('tbl_ofertas_empleo', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
            



           


    }




    }