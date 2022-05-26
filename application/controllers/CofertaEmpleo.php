<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CofertaEmpleo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->model('Estructuras_model');
        $this->load->model('Empresas_entes_model');
        $this->load->model('Representante_empresas_entes_model');
        $this->load->model('Usuarios_admin_model');



        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }


    public function index()
    {


        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
    } 



    public function publicar_oferta_admin(){

          
            if (!$this->session->userdata('id_rol')) {
                redirect('admin/login');
            }
    
    
            $breadcrumb = (object) [
                "menu" => "Admin",
                "menu_seleccion" => "Admin/ nueva oferta"
    
    
            ];
    
    
            $output = [
                "menu_lateral" => "admin",
                "breadcrumb"      =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/oferta_laboral",
                "librerias_js" => [recurso("admin_nueva_oferta_js")]
    
    
    
    
            ];
    
            $this->load->view("main", $output);
        
    }
}