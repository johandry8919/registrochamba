<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estructuras extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

	public function index()
	{
       
	}

    public function registro()
	{

        $breadcrumb =(object) [
            "menu" => "Estructura",
            "menu_seleccion" => "Registro"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "estructuras/registro_estructura",
     
           "ficheros_js" => [recurso("estructuras_js") ]


        ];

        $this->load->view("main", $output);
       
	}

}