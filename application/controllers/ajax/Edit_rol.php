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

        $id_usuarios_admin = $this->input->post("id_usuarios_admin");

        $respuesta = $this->Usuarios_admin_model->obtener_usuario($id_usuarios_admin);


        $perfil = $respuesta[0]->perfil;

        $roles =  $this->Roles_model->obtener_roles($perfil);


        if ($respuesta) {
        $roles =  $this->Roles_model->obtener_roles($perfil);
            echo  json_encode(["resultado" => true,
             "mensaje" => $respuesta  , "roles" => $roles]);

        };

    }

    public function Editor_Usuarios()
    {



        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cudula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_usuarios_admin', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_rol', 'id_rol', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'correo', 'trim|required|strip_tags');


        
        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }





            $id_usuarios = $this->input->post("id_usuarios_admin");

            $password = $this->input->post("contraseña");

         if(empty($password)){
            $respuesta = $this->Usuarios_admin_model->obtener_usuario($id_usuarios);
            $password = $respuesta[0]->password;

         }else{
            $password = password_hash($this->input->post('contraseña'), PASSWORD_DEFAULT);


         }


        $id_usuarios_admin = $this->input->post("id_usuarios_admin");

        $datos  = array(

            'nombre' => $this->input->post('nombre'),
            'cedula' => $this->input->post('cedula'),
            'email' => $this->input->post('email'),
            'password' => $password,
            'id_rol' => $this->input->post('id_rol'),

        );


        if($respuesta = $this->Usuarios_admin_model->update_admin_usuarios($datos, $id_usuarios_admin)){
           
        


            $id_rol =  $this->input->post('id_rol');
            $data = array(
                
                "perfil" => $this->input->post('perfil'),
            );
            $this->Roles_model->actualizar_rol($id_rol ,$data);
        };
        if ($respuesta) {

            $perfil = $this->input->post('perfil');

            $id_roles =  obtener_roles($perfil);
             
            $usuarios = $this->Usuarios_admin_model->obtener_usuarios($id_roles);


            echo  json_encode(["resultado" => true, "mensaje" => $respuesta , "datos" => $usuarios ]);
        };
    }
}
