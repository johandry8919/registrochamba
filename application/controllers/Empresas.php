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
        $this->load->model('Empresas_entes_model');
        $this->load->model('Representante_empresas_entes_model');
        $this->load->model('Usuarios_admin_model');
        $this->load->model('Oferta_empleo_model');
        $this->load->model('Ofertas_chambistas_model');
        $this->load->model('Estatus_oferta_model');
        $this->load->model('Estructuras_model');
        $this->load->model('Oferta_empleo_model');


        $this->load->model('Usuarios_admin_model');
    }


    public function validarSession()
    {

        $this->form_validation->set_rules('email', 'email', 'trim|strip_tags|valid_email|min_length[3]|max_length[60]|required');
        //$this->form_validation->set_rules('password', 'password', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        //validaciones
        //delimitadores de errores
        $this->form_validation->set_error_delimiters('*', '*');
        //delimitadores de errores
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación





        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
        }

        $email = strtoupper($this->input->post('email'));
        //encriptamos clave codeigniter

        $password = trim($this->input->post('password'));
        $id_rol = 5;
        $resultado = $this->Usuarios_admin_model->obtenerUsuarioEmpresa($email);


        if ($resultado) {

            if (password_verify($password, $resultado->password)) {

                $s_usuario = array(
                    'id_usuario' => $resultado->id_usuarios_admin,
                    'cedula' => $resultado->cedula,
                    'email' => $resultado->email,
                    'activo' => $resultado->activo,
                    'fecha_reg' => $resultado->created_on,
                    'tipo_empresa' => $resultado->tipo_empresa,
                    'id_rol' => $resultado->id_rol,
                    'id_empresa' => $resultado->id_empresas
                );


                //SI ES IGUAAL A CERO MUESTRA VISTA DONDE ACTIVA LA CUENTA A TRAVES DEL CODIGO O PERMITE REENVIAR EMAIL

                //SINO ENVIA A LA VISTA DE CHAMBA
                if ($resultado->activo == 0) {
                    //$this->session->set_flashdata('mensaje', 'Debes completar tus datos para poder realizar una publicación');
                    //redirect('Cusuarios/VvalidarCuenta');

                    echo  json_encode(["resultado" => false, "mensaje" => "La Cuenta de usuario no se encuenta activa"]);
                    exit;
                } else {
                    $this->session->set_userdata($s_usuario);
                    echo  json_encode([
                        "resultado" => true,
                        "mensaje" => ' Ingreso exitoso',
                        'tipo_empresa' => $resultado->tipo_empresa
                    ]);
                    exit;
                }
            } else {
                //mando a la vista de error

                echo  json_encode(["resultado" => false, "mensaje" => 'Email o Clave incorrectas']);
                exit;
            }
        } else {

            echo  json_encode(["resultado" => false, "mensaje" => 'Email o Clave incorrectas']);
            exit;
        }
    }

    public function index()
    {

        $breadcrumb = (object) [
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


    public function nuevaoferta()
    {


        // echo json_encode($this->session->userdata('id_rol'));
        // exit;



        if ($this->session->userdata('id_rol') == 5) {
            $breadcrumb = (object) [
                "menu" => "Empresas",
                "menu_seleccion" => " nueva oferta"


            ];



            $profesion_oficio = $this->Estructuras_model->profesion_oficio();
            // id de la empresas
            $id_rol = $this->session->userdata('id_rol');
            $id_empresas = $this->session->userdata('id_empresa');
            $rango_edad = $this->Estructuras_model->rango_Edad();

            $ofertas = $this->Oferta_empleo_model->obtener_ofertas_empresa($id_empresas);


            $output = [
                "menu_lateral"      => "empresas",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/oferta_laboral",
                "ficheros_js" => [recurso("admin_nueva_oferta_js")],
                "profesion_oficio" => $profesion_oficio,
                "areaform"     =>   $this->Musuarios->getAreaForm(),
                "id_empresa"   => $id_empresas,

                "empresa"  => $ofertas,
                "id_rol" => $id_rol,
                "rangoedad" => $rango_edad,




            ];

            $this->load->view("main", $output);
        } else if ($this->session->userdata('id_rol') == 4) {
            $breadcrumb = (object) [
                "menu" => "Universidad",
                "menu_seleccion" => " nueva oferta"


            ];
            $profesion_oficio = $this->Estructuras_model->profesion_oficio();
            // id de la empresas
            $id_rol = $this->session->userdata('id_rol');
            $id_empresas = $this->session->userdata('id_empresa');

            $ofertas = $this->Oferta_empleo_model->obtener_ofertas_empresa($id_empresas);




            $output = [
                "menu_lateral"      => "universidades",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/oferta_laboral",
                "ficheros_js" => [recurso("admin_nueva_oferta_uner_js")],
                "profesion_oficio" => $profesion_oficio,
                "areaform"     =>   $this->Musuarios->getAreaForm(),
                "id_empresa"   => $id_empresas,

                "empresa"  => $ofertas,
                "id_rol" => $id_rol,




            ];

            $this->load->view("main", $output);
        }
    }
    public function crear_oferta()
    {

        $permitidos = [2, 3, 5, 4];
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {
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
            "id_empresa_ente" => $this->session->userdata('id_empresa'),
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
        } else {
            echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
        }
    }
    public function listar_oferta_empresas()
    {



        $permitidos = array(4, 5);
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {


            json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        }
        // id del usuario 
        $id_empresa = $this->session->userdata('id_empresa');



        $ofertas = $this->Oferta_empleo_model->obtener_ofertas_empresa($id_empresa);

        $breadcrumb = (object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Listar oferta"


        ];


        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      => "empresas",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/listar_ofertas",
            "ficheros_js" => [recurso("listar_oferta_js")],
            "ofertas" => $ofertas,
            "constantes_js" => ["ruta" => $ruta]





        ];

        $this->load->view("main", $output);
    }

    public function  editar_oferta()
    {

        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        // echo json_encode($id_oferta);
        // exit();
        $oferta = $this->Oferta_empleo_model->obtener_oferta($id_oferta);
        $breadcrumb = (object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Ver oferta"


        ];

        $estatus =  $this->Estatus_oferta_model->obtener_estatus_oferta();
        $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);

        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $rango_edad = $this->Estructuras_model->rango_Edad();


        $output = [
            "menu_lateral"      => "empresas",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Editar  oferta",
            "vista_principal"   => "admin/editar_oferta",
            "estatus" => $estatus,
            // "librerias_js" => [recurso("accordion_js"),recurso("ver_oferta_js")],
            "oferta" => $oferta,
            "profesion_oficio" => $profesion_oficio,
            "chambista_ofertas" => $chambista_ofertas,
            "id_oferta" => $id_oferta,
            "areaform"     =>   $this->Musuarios->getAreaForm(),

            "ficheros_js" => [recurso("editar_oferta_js")],
            "rangoedad" => $rango_edad,





        ];

        $this->load->view("main", $output);
    }

    public function ver_oferta()
    {


        $permitidos = [4, 5];
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        $oferta = $this->Oferta_empleo_model->obtener_oferta($id_oferta);

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Ver oferta"


        ];

        $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);



        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $estatus_oferta_chambista = $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();
        $rango_edad = $this->Estructuras_model->rango_Edad();



        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      =>   $ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Oferta de emplo " . $oferta->nombre_razon_social,
            "vista_principal"   => "admin/ver_oferta",
            "ficheros_js" => [recurso("accordion_js"), recurso("ver_oferta_js")],
            "oferta" => $oferta,
            "estatus_oferta_chambista" => $estatus_oferta_chambista,
            "profesion_oficio" => $profesion_oficio,
            "chambista_ofertas" => $chambista_ofertas,
            "id_oferta" => $id_oferta,
            "constantes_js" => ["ruta" => $ruta],
            "datatable"             => true,
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            "rangoedad" => $rango_edad,





        ];

        $this->load->view("main", $output);
    }
    public function datos_empresa()
    {


        $permitidos = [4, 5];
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        $estados = $this->Musuarios->getEstados();

        $id_usuario = $this->session->userdata('id_usuario');



        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();

        $datos  = $this->Empresas_entes_model->obtener_empresas_id(1, $id_usuario);

        $breadcrumb = (object) [
            "menu" => "Empresa",
            "menu_seleccion" => "Datos de la Empresa"


        ];


        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      =>   $ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Oferta de emplo ",
            "vista_principal"   => "admin/datos_empresa",
            "sectorProductivo" => $sectorProductivo,
            "datos" => $datos,
            "estados" => $estados,

            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"), recurso("jquery_easing_js")



            ],


            "ficheros_js" => [
                recurso("datosempresa_js"), recurso("mapa_mabox_js")
            ],
            "ficheros_css" => [recurso("mapa_mabox_css"), recurso("estructuras_css")],

        ];

        $this->load->view("main", $output);
    }

    public function cambiarClave()
    {

        $id_admin = $this->session->userdata('id_usuario');



        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Cambiar Clave"

        ];


        $output = [
            "menu_lateral" => "estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "cambiarClave",
            "vista_principal"   => "chambistas/cambiarClave",
            "id_admin"           => $id_admin,

            "ficheros_js" => [recurso("admin_cambiarClave_js")]


        ];

        $this->load->view("main", $output);
    }
}
