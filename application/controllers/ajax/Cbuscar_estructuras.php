<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbuscar_estructuras extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Estructuras_model');
        $this->load->library('form_validation');

    }

    public function index() {
    
   

    
       if ($this->session->userdata('id_rol') != 2) {
        echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
        exit();
        
    }

    $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');  
    $this->form_validation->set_error_delimiters('*', '');
    //reglas de validación
    $this->form_validation->set_message('required', 'El campo %s es requerido');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }

    $cedula = 'V'.$this->input->post('cedula');

      $resultado=   $this->Estructuras_models->verificarSiUsuarioExisteEstructuras($cedula);

      if($resultado)
      echo  json_encode(["resultado" =>true,"mensaje"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'Cedula no encontrada']);


    }
    
}