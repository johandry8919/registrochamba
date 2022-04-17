<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprofesion_oficio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
  
    }

    public function obtener_prefesion() {
       $profesiones= $this->Mprofesion_oficio->getprofesion();
   

    

        $html1 = "<option value=''>Seleccione una profesion </option>";
        for ($i = 0; $i < count($profesiones, 0); $i++) {
            $html1 .= "<option value=" . $profesiones[$i]->id_profesion . ">" . ucwords(mb_strtolower(utf8_decode($profesiones[$i]->desc_profesion))) . "</option>";
        }
    
        echo json_encode(compact('html1'));


    }
    
}