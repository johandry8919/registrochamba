<?php

    class Menu_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){
        
    
            $this->db->insert('menu', $data);
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
            $query = $this->db->get("menu");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }


        public function obtener_menu($id_rol){

            $this->db->select('DISTINCT(menu.id_menu), menu.nombre_menu, menu.ruta_menu, menu.perfil, menu.icono');
            $this->db->join('sub_menu', 'sub_menu.id_menu=menu.id_menu');
            $this->db->join('rol_submenu', 'rol_submenu.id_submenu=sub_menu.id_submenu');

            $this->db->where('rol_submenu.id_rol', $id_rol);
            $this->db->where('menu.activo', 1);
            $query = $this->db->get("menu");
        //    print_r($this->db->last_query());
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        public function obtener_menu_perfil($perfil, $id_rol){
   

            $this->db->select('nombre_menu,nombre_submenu,sub_menu.id_submenu,menu.id_menu,rol_submenu.id_rol,rol_submenu.activo');
            $this->db->join('sub_menu', 'sub_menu.id_menu=menu.id_menu');

            $this->db->join('rol_submenu', "rol_submenu.id_submenu=sub_menu.id_submenu AND rol_submenu.id_rol=$id_rol",'LEFT');
            $this->db->order_by('nombre_menu', 'ASC');
         //   $this->db->where('rol_submenu.id_rol', $id_rol);
            $this->db->where('menu.perfil', $perfil);
            $this->db->where('menu.activo', 1);

            $query = $this->db->get("menu");
        //    print_r($this->db->last_query());
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        

        public function obtener_sub_menu($id_menu){

            $this->db->select('nombre_submenu, ruta');
            $this->db->where('sub_menu.id_menu', $id_menu);
            $this->db->where('sub_menu.activo', 1);
            $query = $this->db->get("sub_menu");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


        public function comprobar_rol_submenu($id_rol,$id_submenu){
           
            $this->db->where('id_submenu', $id_submenu);
            $this->db->where('id_rol', $id_rol);
            $query = $this->db->get("rol_submenu");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;

        }



        public function actualizar_rol_submenu($id_rol,$id_submenu, $datos){
           
            $this->db->where('id_submenu', $id_submenu);
            $this->db->where('id_rol', $id_rol);
            $this->db->update('rol_submenu', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

}


      
public function regitrar_rol_submenu($data){
        
    
    $this->db->insert('rol_submenu', $data);
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

    }