<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empresas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('Mprofesion_oficio');
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        
        $breadcrumb =(object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Inicio"
                 ];
    
        $output = [
            "menu_lateral" => "empresas",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Inicio",
            "vista_principal"   => "empresas/inicio",
            "librerias_js" => [],
             "ficheros_js" => [],
            "ficheros_css" => [],


        ];
        $this->load->view("main", $output);
    }


    public function nuevaoferta(){
        $estados = $this->Musuarios->getEstados();
        $profesion_oficio= $this->Mprofesion_oficio->getprofesion();
        $areaform = $this->Musuarios->getAreaForm();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Oferta de empleo"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"empresas",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
            "areaform"    => $areaform,
             "vista_principal"   => "empresas/oferta_empleo",
             "profesion_oficio" =>$profesion_oficio,
     
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
}