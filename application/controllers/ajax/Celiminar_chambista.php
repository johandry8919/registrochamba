<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Celiminar_chambista extends CI_Controller {

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

    $this->form_validation->set_rules('id_oferta_chambista', 'id_oferta_chambista', 'trim|required|strip_tags'); 

 
    $this->form_validation->set_error_delimiters('*', '');
    //reglas de validación
    $this->form_validation->set_message('required', 'El campo %s es requerido');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }

    $id_oferta_chambista = $this->input->post('id_oferta_chambista');


    $resultado=$this->Ofertas_chambistas_model->eliminar_oferta_chambista($id_oferta_chambista);

 


      echo  json_encode(["resultado" =>true,"mensaje"=>  'Chambista eliminado exitosamente']);
  



    }
    
}