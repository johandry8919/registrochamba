<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpostular_chambista extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->model('Oferta_empleo_model');
        $this->load->model('Ofertas_chambistas_model');
        
        
        $this->load->library('form_validation'); 
    }

    public function index() {
    
   

    
       if ($this->session->userdata('id_rol') != 2) {
        echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
        exit();
        
    }

    $this->form_validation->set_rules('id_usario_chambista', 'id_usario_chambista', 'trim|required|strip_tags'); 
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

    $id_usuario = $this->input->post('id_usario_chambista');
    $id_oferta = $this->input->post('id_oferta');

    $oferta_chambista=$this->Ofertas_chambistas_model->buscar_oferta_chambista_id($id_usuario,$id_oferta);

    if($oferta_chambista){

        echo  json_encode(["resultado" =>false,"mensaje"=> 'El chambista ya se encuentra registrado en la oferta']);
        exit;
    }
      $resultado=   $this->Ofertas_chambistas_model->post_regitrar([
          "id_usuario_chambista" => $id_usuario,
          "id_oferta" => $id_oferta,
          "id_usuario_registro" => $this->session->userdata('id_usuario'),
          "id_estatus_oferta" => 1
      ]);

      if($resultado)
      echo  json_encode(["resultado" =>true,"mensaje"=>  $resultado]);
      else
      echo  json_encode(["resultado" =>false,"mensaje"=> 'Cedula no encontrada']);


    }
    
}