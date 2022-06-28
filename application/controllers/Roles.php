<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
  
        $this->load->model('Usuarios_admin_model');
    }


    public function index()
    {
        
        $breadcrumb =(object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Inicio"
                 ];
    
       $roles = oberner_roles('estructura');
       print_r($roles);



        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Inicio",
            "vista_principal"   => "admin/roles",
            "roles" =>$roles,
            "librerias_js" => [],
             "ficheros_js" => [recurso("roles_js")],
            "ficheros_css" => [],


        ];
        $this->load->view("main", $output);
    }


}