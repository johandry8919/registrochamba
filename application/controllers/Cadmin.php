<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

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

    public function registro_estructura()
	{

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "admin/registro_estructura",
     
           "ficheros_js" => [recurso("registro_estructuras_js") ]


        ];

        $this->load->view("main", $output);
       
	}

}