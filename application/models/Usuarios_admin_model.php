<?php

class Usuarios_admin_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function post_regitrar($data)
    {


        $this->db->insert('usuarios_admin', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $insert_id = $this->db->insert_id();

            return  $insert_id;
        }
    }

    public function verificarSiExiste($campo, $valor)
    {

        $this->db->where($campo, $valor);
        $query = $this->db->get("usuarios_admin");

        if ($query->num_rows()) $valor = $query->row();
        else $valor = false;


        return $valor;
    }


    public function obtener_usuarios($array_rol)
    {
        $this->db->select('usuarios_admin.id_usuarios_admin, usuarios_admin.id_rol, usuarios_admin.cedula, 
        usuarios_admin.email, usuarios_admin.token, usuarios_admin.password, 
        usuarios_admin.activo,usuarios_admin.created_on, usuarios_admin.nombre,
        tbl_roles.crear, tbl_roles.modificar, tbl_roles.eliminar, tbl_roles.vincular, tbl_roles.perfil
            ');

        $this->db->where_in('usuarios_admin.id_rol', $array_rol);
        $this->db->join('tbl_roles', 'tbl_roles.id_rol = usuarios_admin.id_rol');
        $query = $this->db->get("usuarios_admin");
      

        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;
    }
    public function obtener_usuario($id_usuarios_admin,$array_rol )
    {
        $this->db->select('usuarios_admin.id_usuarios_admin, usuarios_admin.id_rol, usuarios_admin.cedula, 
        usuarios_admin.email, usuarios_admin.token, usuarios_admin.password, 
        usuarios_admin.activo,usuarios_admin.created_on, usuarios_admin.nombre,
        tbl_roles.crear, tbl_roles.modificar, tbl_roles.eliminar, tbl_roles.vincular, tbl_roles.perfil , tbl_roles.nombre as nombre_rol
            ');

        $this->db->where('id_usuarios_admin', $id_usuarios_admin);
        $this->db->where_in('usuarios_admin.id_rol', $array_rol);
        $this->db->join('tbl_roles', 'tbl_roles.id_rol = usuarios_admin.id_rol');

 

        $query = $this->db->get("usuarios_admin");

        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;
    }



    public function validarEmailUsuarioRol($email, $array_rol)
    {

        $this->db->select('usuarios_admin.id_usuarios_admin, usuarios_admin.id_rol, usuarios_admin.cedula, 
        usuarios_admin.email, usuarios_admin.token, usuarios_admin.password, 
        usuarios_admin.activo,usuarios_admin.created_on, usuarios_admin.nombre,
        tbl_roles.crear, tbl_roles.modificar, tbl_roles.eliminar, tbl_roles.vincular
            ');
        $this->db->where('upper(email)', $email);
        $this->db->where_in(' usuarios_admin.id_rol', $array_rol);
        $this->db->join('tbl_roles', 'tbl_roles.id_rol = usuarios_admin.id_rol');

        $query = $this->db->get("usuarios_admin");

        if ($query->num_rows()) $valor = $query->row();
        else $valor = false;


        return $valor;
    }


    public function validarEmailUsuario($email, $id_rol = 2)
    {
        $this->db->select('usuarios_admin.id_usuarios_admin, id_rol, cedula, email, token, password, activo, created_on, nombre
            ');
        $this->db->where('upper(email)', $email);
        $this->db->where('id_rol', $id_rol);
        $query = $this->db->get("usuarios_admin");

        if ($query->num_rows()) $valor = $query->row();
        else $valor = false;


        return $valor;
    }

    public function obtenerUsuarioEmpresa($email)
    {


        $this->db->select('usuarios_admin.id_rol,usuarios_admin.email, usuarios_admin.password, 
            usuarios_admin.cedula,tipo_empresa,usuarios_admin.id_usuarios_admin,usuarios_admin.activo,
            usuarios_admin.created_on,
            empresas.id_empresas
            ');

        $this->db->join('tbl_representantes_empresas_entes re_entes', 're_entes.id_usuario = usuarios_admin.id_usuarios_admin');
        $this->db->join('tbl_empresas_entes empresas', 'empresas.id_empresas= re_entes.id_empresas_entes');
        $this->db->where('upper(usuarios_admin.email)', $email);

        $query = $this->db->get("usuarios_admin");

        if ($query->num_rows()) $valor = $query->row();
        else $valor = false;


        return $valor;
    }


    public function update_admin_usuarios($datos,$id_usuarios_admin){
          

        $this->db->where('id_usuarios_admin',  $id_usuarios_admin);
        $this->db->update('usuarios_admin', $datos);
        if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
        



       


}
}
