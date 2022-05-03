<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        $this->load->model('Mprofesion_oficio');
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
     
      
           "estados"          => $estados,

            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
           recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),recurso("jquery_easing_js")

            
     
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js"),
           recurso("estructuras_js"), recurso("mapa_mabox_js")],
           "ficheros_css" => [recurso("mapa_mabox_css"),recurso("estructuras_css")],


        ];

        $this->load->view("main", $output);
       
	}



    public function crearEstructura(){

        

       // echo "esto es lo que recibe".$this->input->post('fname');
       
       $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');


       $this->form_validation->set_error_delimiters('*', '');
       //delimitadores de errores

       //reglas de validación
       $this->form_validation->set_message('required', 'Debe llenar el campo %s');
       //reglas de validación

       if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
        
            echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);

    }else{
  
        echo  json_encode(["resultado" =>true,"mensaje"=>"registro exitoso"]);
    }
    
}
    public function registro_empresas()
  
	{
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de empresas"
 
                ];
    
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
             "sectorProductivo" => $sectorProductivo,
     
           
           "estados"          => $estados,

            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("jquery_steps_js"),  recurso("parsleyjs_js"),recurso("jquery_easing_js")
        ],


           "ficheros_js" => [   recurso("registro_empresas_admin_js"),recurso("mapa_mabox_js")],

           
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
       
            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
             recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);

    }
}