<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cactualizar_estatus_chambista_universidad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->model('Oferta_empleo_model');
        $this->load->model('Oferta_universida_model');
        
        
        $this->load->library('form_validation'); 
    }

    public function index() {
    




            //tiene login
        if (!tiene_acceso(['estructura','admin',4,5])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

   
        
    $this->form_validation->set_rules('estatus_chambista', 'estatus_chambista', 'trim|required|strip_tags'); 
    $this->form_validation->set_rules('id_oferta', 'id_oferta', 'trim|required|strip_tags'); 

    
 
    $this->form_validation->set_error_delimiters('*', '');
    //reglas de validación
    $this->form_validation->set_message('required', 'El campo %s es requerido');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }

    $id_oferta_chambista = $this->input->post('id_oferta');
    $id_estatus_chambista = $this->input->post('estatus_chambista');
    $DateAndTime = date('Y-m-d H:i:s', time());  

    $resultado=$this->Oferta_universida_model->update_solicitud_chambista(
        ["id_estatus_solicitud"=>$id_estatus_chambista,
         "update_on"=>  $DateAndTime],
    
    $id_oferta_chambista);

 

    if($resultado)
      echo  json_encode(["resultado" =>true,"mensaje"=>  'Chambista actualizado exitosamente']);
  else
  echo  json_encode(["resultado" =>false,"mensaje"=>  'No se actulizo el registro']);





    }
    
}