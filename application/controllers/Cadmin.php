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


    public function login()
	{
        //$this->load->view('layouts/head');
		$this->load->view('usuarios/admin/inicioSesionAdmin');
	}

	public function index()
	{
       
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Inicio"
           
 
                ];
    


     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "admin/inicio",
             "librerias_js" => [recurso("admin_js") ]
     

     

        ];

        $this->load->view("main", $output);
	}

    public function registro_estructura()
  
	{
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"
        
 
                ];
    


     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "admin/registro_estructura",
     
           "ficheros_js" => [recurso("registro_estructuras_js") ],
           "estados"          => $estados,

            
           "librerias_css" => [recurso("mapbox_css")],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("mapbox_js"), recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
       
	}


    
    public function registro_empresas()
  
	{
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de empresas"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
     
           "ficheros_js" => [],
           "estados"          => $estados,

            
           "librerias_css" => [recurso("mapbox_css")],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("mapbox_js"), recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
       
	}

    public function registro_universidades(){
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
        
        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de universidades"
 
                ];
    
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
             "vista_principal"   => "admin/registro_universidades",
             "estados"          => $estados,
     
           "ficheros_js" => [],
       
            
           "librerias_css" => [recurso("mapbox_css")],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("mapbox_js"), recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);

    }
}