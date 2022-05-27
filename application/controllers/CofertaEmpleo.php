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
        $this->load->model('Oferta_empleo_model');
        



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
                "menu_seleccion" => " nueva oferta"
    
    
            ];
            $profesion_oficio = $this->Estructuras_model->profesion_oficio();
            $id_empresa = strip_tags(trim($this->uri->segment(3)));

        $empresa= $this->Empresas_entes_model->obtener_empresa(1,$id_empresa);
    
            $output = [
                "menu_lateral"      => "admin",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/oferta_laboral",
                "librerias_js" => [recurso("admin_nueva_oferta_js")],
                "profesion_oficio"=> $profesion_oficio,
                "areaform"     =>   $this->Musuarios->getAreaForm(),
                "id_empresa"   => $id_empresa,
                "empresa"  => $empresa,
    
    
    
    
            ];
    
            $this->load->view("main", $output);
        
    }


    public function listar_oferta_admin(){

          
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Listar oferta"


        ];
    


        $output = [
            "menu_lateral"      => "admin",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/listar_ofertas",
            "librerias_js" => [recurso("listar_oferta_js")]
        
     
     
   




        ];

        $this->load->view("main", $output);
    
}

    public function crear_oferta(){

        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        $this->form_validation->set_rules('id_instruccion', 'instruccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_profesion', 'profesion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_area_form', 'area de formacion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('experiencia_laboral', 'experiencia_laboral', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('descripcion_oferta', 'descripcion_oferta', 'trim|required|strip_tags');
        $this->form_validation->set_rules('edad', 'edad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cantidad_oferta', 'cantidad_oferta', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_empresa', 'id_empresa', 'trim|required|strip_tags');
        $this->form_validation->set_rules('sexo', 'sexo', 'trim|required|strip_tags');


        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }


      $registro = $this->Oferta_empleo_model->post_regitrar([
        "id_nivel_instruccion" => $this->input->post('id_instruccion'),
        "id_profesion_oficio" => $this->input->post('id_profesion'),
        "id_area_formacion" => $this->input->post('id_area_form'),
        "id_estatus_oferta" => 1,
        "id_empresa_ente" => $this->input->post('id_empresa'),        
        "id_usuario_registro" => $this->session->userdata('id_usuario'),
        "cargo" => $this->input->post('cargo'),
        "experiencia" =>  $this->input->post('experiencia_laboral'),
        "sexo" =>  $this->input->post('sexo'),
        "descripcion_oferta" =>  $this->input->post('descripcion_oferta'),
        "edad" =>  $this->input->post('edad'),
        "cantidad_oferta" =>  $this->input->post('cantidad_oferta'),
      ]);

      if ($registro) {
    
        echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
     
    }else{
        echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
    }

    }

}