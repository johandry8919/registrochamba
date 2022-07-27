<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cbuscar_estructuras extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Estructuras_model');
        $this->load->library('form_validation');
    }

    public function index()
    {



        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_error_delimiters('*', '');
        //reglas de validación
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }

        $cedula = 'V' . $this->input->post('cedula');

        $resultado =   $this->Estructuras_models->verificarSiUsuarioExisteEstructuras($cedula);

        if ($resultado)
            echo  json_encode(["resultado" => true, "mensaje" =>  $resultado]);
        else
            echo  json_encode(["resultado" => false, "mensaje" => 'Cedula no encontrada']);
    }


    public function eliminar_estructura()
    {


        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        //verificar si tiene permiso
        if (!tiene_permiso('permiso_eliminar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }

        $this->form_validation->set_rules('id_estructura', 'id_estructura', 'trim|required|strip_tags');
        $this->form_validation->set_error_delimiters('*', '');
        //reglas de validación
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }

        $resultado=  $this->Estructuras_model->actualizar_estructura(
            $_POST['id_estructura'],
            [
                'activo' => 0
            ]

        );

        
      if($resultado)
      echo  json_encode(["resultado" =>true,"mensaje"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'Cedula no encontrada']);


    
    }
}
