<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Universidades extends CI_Controller
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
        $this->load->model('Usuarios_admin_model');
    }

    

    public function index()
    {
        
        $breadcrumb =(object) [
            "menu" => "Universidades",
            "menu_seleccion" => "Inicio"
                 ];
    
        $output = [
            "menu_lateral" => "universidades",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Inicio",
            "vista_principal"   => "universidades/inicio",
            "librerias_js" => [],
             "ficheros_js" => [],
            "ficheros_css" => [],


        ];
        $this->load->view("main", $output);
    }


}