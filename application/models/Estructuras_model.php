<?php

    class Estructuras_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();
        }
      

       

        public function profesion_oficio(){



            $this->db->select('*');
            $this->db->from('tbl_profesion_oficio');
            $this->db->order_by('tbl_profesion_oficio', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }
        public function responsabilidad_estructuras(){



            $this->db->select('*');
            $this->db->from('tbl_responsabilidad_estructuras');
            $this->db->order_by('tbl_responsabilidad_estructuras', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }
        public function instruccion_academica(){



            $this->db->select('*');
            $this->db->from('tbl_instruccion');
            $this->db->order_by('tbl_instruccion', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }

      

        public function post_crearEstructura($data) {
            

            $this->db->trans_begin();
            $this->db->insert('tbl_estructuras', $data);
            if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}

                   

        }

        public function verificarSiUsuarioExiste($cedula,$correo,$rol_usuario){

            $this->db->limit(1);
            $this->db->select('count(*) AS cantidad');
            $this->db->from('public.tbl_usuarios');
            $this->db->where('cedula',$cedula);
            $this->db->or_where('email', $correo);
           // $this->db->where('id_rol', $rol_usuario);
            $resultado = $this->db->get();
    
            $fila = $resultado->row();
    
            if ($fila->cantidad > 0) {
                return TRUE;
            }else{
                return FALSE;
            }
        }

    public function verificarSiUsuarioExisteEstructura($cedula,$correo){

        $this->db->limit(1);
        $this->db->select('count(*) AS cantidad');
        $this->db->from('public.tbl_estructuras');
        $this->db->where('cedula',$cedula);
        $this->db->or_where('email', $correo);
       // $this->db->where('id_rol', $rol_usuario);
        $resultado = $this->db->get();

        $fila = $resultado->row();

        if ($fila->cantidad > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }


 
    }


?>