<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobtener_coord_brigada extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Registro_brigada');
        $this->load->library('form_validation'); 
      

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

        

            $cod_estado = $this->input->post("cod_estado");
            $cod_municipio = $this->input->post("cod_municipio");
            $cod_parroquia = $this->input->post("cod_parroquia");
            $id_rol_estructura = $this->input->post("id_estructura");



    if($id_rol_estructura == "00"  &&   $cod_estado=='todos'   ){

        $resultado=   $this->Registro_brigada->obtener_brigadas();
      
        //   echo json_encode($resultado);
        // exit;

    }else  {
        $resultado=   $this->Registro_brigada->obtener_brigada_coord($cod_estado,$cod_municipio,$cod_parroquia,$id_rol_estructura);

       
    }

      if($resultado)
      echo  json_encode(["resultado" =>true,"res"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'No se encontraron resultados']);


    }
    
}