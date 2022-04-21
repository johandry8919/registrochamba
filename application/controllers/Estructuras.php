<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estructuras extends CI_Controller
{

    function __construct()
    {
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
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb = (object) [
            "menu" => "Estructura",
            "menu_seleccion" => "Registro"

        ];

      




        $output = [
            "menu_lateral" => "estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "estructuras/registro_estructura",
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
