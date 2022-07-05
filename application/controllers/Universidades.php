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
        $this->load->model('Oferta_universida_model');
        $this->load->model('Estatus_oferta_model');
        $this->load->model('Ofertas_chambistas_model');
        $this->load->model('Estructuras_model');
    }



    public function index()
    {

        $breadcrumb = (object) [
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

    public function universidad_oferta_admin()
    {
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        $id_empresa = $this->session->userdata('id_empresa');
        


        $oferta = $this->Oferta_universida_model->obtener_oferta($id_empresa);

        $id_rol = $this->session->userdata('id_rol');
        $rango_edad = $this->Estructuras_model->rango_Edad();
        // echo json_encode($id_solicitud);
        // exit();
        $breadcrumb = (object) [
            "menu" => "Universidad",
            "menu_seleccion" => "Ver oferta"
        ];

        $output = [

            "menu_lateral"      => "universidades",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Universidade  oferta",
            "vista_principal"   => "admin/oferta_universidad",
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            "oferta" => $oferta,
            "id_rol" => $id_rol,

            "librerias_js" => [recurso("universidad_nueva_oferta_uner_js")],

            "id_empresa" => $id_empresa,
            "rangoedad" => $rango_edad,


        ];
        $this->load->view("main", $output);
    }
    public function listar_oferta_universidades()

   
    {

    
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        

        $id_empresa = $this->session->userdata('id_empresa');

    

        $ofertas = $this->Oferta_universida_model->obtener_ofertas_unirversidad($id_empresa);
        // echo json_encode($id_empresa);
        // exit;

        $breadcrumb = (object) [
            "menu" => "Universidad",
            "menu_seleccion" => "Listar oferta"


        ];


        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      => "universidades",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/listar_ofertas_uner",
            "ficheros_js" => [recurso("listar_oferta_js")],
            "ofertas" => $ofertas,
            "constantes_js" => ["ruta" => $ruta]





        ];

        $this->load->view("main", $output);
    }
    public function  editar_oferta()
    {

        // if (!$this->session->userdata('id_rol')) {
        //     redirect('admin/login');
        // }

        $id_oferta = strip_tags(trim($this->uri->segment(3)));

        $oferta = $this->Oferta_universida_model->obtener_oferta($id_oferta);
        $breadcrumb = (object) [
            "menu" => "universidad",
            "menu_seleccion" => "Ver oferta"


        ];
        $id_rol = $this->session->userdata('id_rol');

        $estatus =  $this->Estatus_oferta_model->obtener_estatus_oferta();
        $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);

        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $rango_edad = $this->Estructuras_model->rango_Edad();


        $output = [
            "menu_lateral"      => "universidades",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Editar  oferta",
            "vista_principal"   => "admin/editar_oferta_uner",
            "estatus" => $estatus,
            "librerias_js" => [recurso("accordion_js")],
            "oferta" => $oferta,
            "profesion_oficio" => $profesion_oficio,
            "chambista_ofertas" => $chambista_ofertas,
            "id_oferta" => $id_oferta,
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            "id_rol" => $id_rol,
            "rangoedad" => $rango_edad,

            "ficheros_js" => [recurso("editar_oferta_uner_js")],





        ];

        $this->load->view("main", $output);
    }

    public function ver_ofertas()
    {

        
     


        $permitidos = [5,4];
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            redirect('admin/login');
            exit();
        }
        $rango_edad = $this->Estructuras_model->rango_Edad();

        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        $oferta =  $this->Oferta_universida_model->obtener_oferta($id_oferta);
        $breadcrumb = (object) [
            "menu" => "Universidad",
            "menu_seleccion" => "Ver oferta"


        ];

        $chambista_ofertas = $this->Oferta_universida_model->obtener_solicitud_chambista($id_oferta);

        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $estatus_oferta_chambista = $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();



        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      =>  "universidades",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Oferta de emplo " . $oferta->nombre_razon_social,
            "vista_principal"   => "admin/ver_oferta_univerdidad",
            "ficheros_js" => [recurso("accordion_js"), recurso("ver_oferta_universidad_js")],
            "oferta" => $oferta,
            "estatus_oferta_chambista" => $estatus_oferta_chambista,
            "profesion_oficio" => $profesion_oficio,
            "chambista_ofertas" => $chambista_ofertas,
            "id_oferta" => $id_oferta,
            "rangoedad" => $rango_edad,

            "datatable"             => true,
            "areaform"     =>   $this->Musuarios->getAreaForm(),





        ];

        $this->load->view("main", $output);
    }

    public function update_oferta()
    {
        $permitidos = [4, 5];
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            redirect('admin/login');

            exit();
        }
        $this->form_validation->set_rules('mencion', 'mencion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('duracion', 'duracion', 'trim|required|strip_tags|numeric');

        $this->form_validation->set_rules('edad', 'edad', 'trim|required|strip_tags|numeric');

        $this->form_validation->set_rules('id_area_formacion', 'area de formacion', 'trim|required|strip_tags');

        // validar solo numero
        $this->form_validation->set_rules('cupos_disponibles', 'cupos_disponibles', 'trim|required|strip_tags|numeric');


        $this->form_validation->set_rules('titularidad', 'titularidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_area_formacion', 'id_area_formacion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('sexo', 'sexo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|strip_tags');



        if ($this->form_validation->run() == FALSE) {
            echo  json_encode(["resultado" => false, "mensaje" => "Campo solo numerico"]); {
                exit();
            }
        }





        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }



        $registro = $this->Oferta_universida_model->update_oferta([
            "mencion" => $this->input->post('mencion'),
            "duracion" => $this->input->post('duracion'),
            "cupos_disponibles" => $this->input->post('cupos_disponibles'),
            "id_estatus" => $this->input->post('estatus'),
            "id_area_formacion" => $this->input->post('id_area_formacion'),
            "descripcion_solicitud" =>  $this->input->post('descripcion'),
            "edad" =>  $this->input->post('edad'),
            "sexo" =>  $this->input->post('sexo'),
          
            "titularidad" =>  $this->input->post('titularidad'),

        ]);

        if ($registro) {

            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
        } else {
            echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
        }
    }
}
