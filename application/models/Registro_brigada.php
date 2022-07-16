<?php

    class Registro_brigada extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){

		$this->db->insert('tbl_brigadas_estructuras',$data);

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



        public function obtener_brigada(){

            $this->db->select('tbl_brigadas_estructuras.*');
            // $this->db->where('id_usuario_registro', $id);
            // $this->db->where('tbl_roles.activo', 1);
            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }



        
//         public function actualizar_rol($id_rol, $datos){
           

//             $this->db->where('id_rol', $id_rol);
//             $this->db->update('tbl_roles', $datos);
//             if($this->db->affected_rows() > 0){
//                 return true;
//             }else{
//                 return false;
//             }

// }


      

    }