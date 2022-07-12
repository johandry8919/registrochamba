<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_rol extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Usuarios_admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {



        $id_rol = $this->input->post("id_rol");
        $id_usuarios_admin = $this->input->post("id_usuarios_admin");

        $respuesta = $this->Usuarios_admin_model->obtener_usuario($id_usuarios_admin,$id_rol);


        if ($respuesta) {
            echo  json_encode(["resultado" => true, "mensaje" => $respuesta]);
        };
    }

    public function Editor_Usuarios()
    {

        $password = password_hash($this->input->post('contraseña'), PASSWORD_DEFAULT);
       $Roles =  $this->input->post('Roles');

       echo print($Roles);
       exit;

        $id_usuarios_admin = $this->input->post("id_usuarios_admin");

        $datos  = array(

            'nombre' => $this->input->post('nombre'),
            'cedula' => $this->input->post('cedula'),
            'email' => $this->input->post('email'),
            'password' => $password,
            'id_rol' => $this->input->post('id_rol'),



        );


        $respuesta = $this->Usuarios_admin_model->update_admin_usuarios($datos, $id_usuarios_admin);





        if ($respuesta) {
            echo  json_encode(["resultado" => true, "mensaje" => $respuesta]);
        };
    }
}
