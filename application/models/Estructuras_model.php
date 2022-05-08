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

        public function actualizarPersonales($data){
            $datas = array(

                'nombres' => $data['nombres'],
				'apellidos' => $data['apellidos'],
				'fecha_nac' => $data['datepicker'],
                'cedula' => $data['cedula'],
                'tlf_celular' => $data['tlf_celular'],
                'tlf_fijo' => $data['tlf_fijo'],
                'email' => $data['email'],
                'direccion' => $data['direccion'],
                'id_profesion_oficio' => $data['id_profesion_oficio'],
                'id_responsabilidad_estructuras' => $data['id_responsabilidad_estructuras'],
                'id_instruccion' => $data['id_instruccion'],
                'id_estructura' => $data['id_estructura'],
                'id_usuario' => $data['id_usuario'],
                'id_estructura' => $data['id_estructura'],
              


            );
            $this->db->where('id_usuario', $data['id_usuario']);
            $this->db->update('tbl_estructuras', $datas);
            return true;






           


            
            
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

    // hacer un get a tbl_estructuras para  ver todo lo datos de la tabla
    
    public function getestructuras() {
       
        $this->db->select('*');
        $this->db->from('public.tbl_estructuras');
        $this->db->order_by('tbl_estructuras', 'ASC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) 
            return $query->result();
        else
            return FALSE;

       
    }

   

 
	public function getEditEstruturaID($id){
        $this->db->select('*');
        $this->db->from('public.tbl_estructuras');
        $this->db->where('id_usuario',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            return $query->row();
        else{
            return FALSE;
        }

 
    }

    public function getUsuarioRegistradoPersonal(){

        $this->db->select('*');
        $this->db->from('public.tbl_estructuras');
    
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            return $query->result();
        else{
            return FALSE;
        }

                                                      
    }
		
	}




    




?>