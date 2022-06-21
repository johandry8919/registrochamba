<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

	public function chambistas()
	{
        $permitidos = [2];        
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);
        if ( !$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            redirect('admin/login');
            
            exit();
            
        }

      
            $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Reporte Chambista"


        ];
    
        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      =>'admin',
            "estados" =>  $estados,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "reportes/rep_chambista",
            "ficheros_js" => [recurso("reportes_js"), recurso("mapa_mabox_js")],
            
     
            "ficheros_css" => [recurso("mapa_mabox_css")]
     
     


        ];

        $this->load->view("main", $output);
        // $this->load->view('layouts/head');
	
	}
}