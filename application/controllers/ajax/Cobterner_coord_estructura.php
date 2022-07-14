<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobterner_coord_estructura extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->library('form_validation'); 
        $this->load->model('Estructuras_model');

        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        
    }

    public function index() {
    
   

    

    $this->form_validation->set_rules('cod_estado', 'cod_estado', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('cod_municipio', 'cod_municipio', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('cod_parroquia', 'cod_parroquia', 'trim|required|strip_tags');  


    $this->form_validation->set_error_delimiters('*', '');
    //reglas de validación
    $this->form_validation->set_message('required', 'El campo %s es requerido');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }


    $cod_estado =$_POST['cod_estado'];
    $cod_municipio =$_POST['cod_municipio'];
    $cod_parroquia =$_POST['cod_parroquia'];
   

    if($cod_estado=='todos'){

        $resultado=   $this->Estructuras_model->obtener_estrucutras();
        //  echo json_encode($resultado);
        // exit;

    }else {
        $resultado=   $this->Estructuras_model->obtener_Estructura_coord($cod_estado,$cod_municipio,$cod_parroquia);

       
    }

      if($resultado)
      echo  json_encode(["resultado" =>true,"res"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'No se encontraron resultados']);


    }
    
}