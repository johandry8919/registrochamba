<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobterner_coord_estructura extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->library('form_validation'); 
        $this->load->model('Estructuras_model');
        $this->load->model('Brigadas_estructuras_model');

        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        
    }

    public function index() {
    
   

    

    $this->form_validation->set_rules('cod_estado', 'cod_estado', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('cod_municipio', 'cod_municipio', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('cod_parroquia', 'cod_parroquia', 'trim|required|strip_tags');  
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
    $cod_estado =$_POST['cod_estado'];
    $cod_municipio =$_POST['cod_municipio'];
    $cod_parroquia =$_POST['cod_parroquia'];
   

 
    if($id_rol == "00"  &&   $cod_estado=='todos'   ){

        $resultado=   $this->Brigadas_estructuras_model->obtener_brigadas();
      
        //   echo json_encode($resultado);
        // exit;

    }else {
        $resultado=   $this->Brigadas_estructuras_model->obtener_brigada_coord($cod_estado,$cod_municipio,$cod_parroquia,$id_rol);

       
    }

      if($resultado)
      echo  json_encode(["resultado" =>true,"res"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'No se encontraron resultados']);


    }
    
}