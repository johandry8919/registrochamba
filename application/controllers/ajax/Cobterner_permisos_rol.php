<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobterner_permisos_rol extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Roles_model');

        $this->load->library('form_validation'); 

    }

    public function index() {
    
   

    
       
        $permitidos =  obtener_roles('admin'); 
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

        if ( !$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

    $this->form_validation->set_rules('id_rol', 'id_rol', 'trim|required|strip_tags');  


    $this->form_validation->set_error_delimiters('*', '');
    //reglas de validación
    $this->form_validation->set_message('required', 'El campo %s es requerido');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }


    $id_rol =$_POST['id_rol'];

    $resultado = $this->Roles_model->obtener_rol($id_rol);


      if($resultado)
      echo  json_encode(["resultado" =>true,"res"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'No se encontraron resultados']);


    }
    
}