<?php

    class Ofertas_chambistas_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('tbl_ofertas_chambistas', $data);
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

        public function buscar_oferta_chambista_id($id_usuario,$id_oferta){

            
            $this->db->where('id_usuario_chambista', $id_usuario);
            $this->db->where('id_oferta', $id_oferta);
            $query = $this->db->get("tbl_ofertas_chambistas");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }

    

        public function eliminar_oferta_chambista($id_oferta_chambista){

            
            $this->db->where('id_oferta_chambista', $id_oferta_chambista);
  
            $query = $this->db->delete('tbl_ofertas_chambistas');
    
    

         
        }


        public function obtener_chambista_oferta($id_oferta){

            $this->db->select('tbl_usuarios.id_usuario, tbl_usuarios.cedula,tbl_usuarios.email,up.nombres, up.telf_cel,
            up.apellidos,profesion.desc_profesion, id_oferta_chambista,tblestatus.descripcion as estatus,id_estatus_oferta
    
        
                    
            ');
          
            $this->db->join('tbl_usuarios', 'tbl_usuarios.id_usuario = tbl_ofertas_chambistas.id_usuario_chambista');
            $this->db->join('tbl_usuarios_personales up', 'up.id_usuario = tbl_ofertas_chambistas.id_usuario_chambista');
            $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = up.id_profesion_oficio');
            $this->db->join('tbl_estatus_oferta_chambista tblestatus', 'tblestatus.id_estatus_chambista = tbl_ofertas_chambistas.id_estatus_oferta');

            $this->db->where('id_oferta', $id_oferta);
            $query = $this->db->get("tbl_ofertas_chambistas");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


        public function update_oferta ($datos,$id_oferta_chambista){
          

            $this->db->where('id_oferta_chambista',  $id_oferta_chambista);
            $this->db->update('tbl_ofertas_chambistas', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }


    }