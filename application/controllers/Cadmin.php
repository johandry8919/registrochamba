<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'libraries/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Cadmin extends CI_Controller
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


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Inicio"


        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "admin/inicio",
            "librerias_js" => [recurso("admin_js")]




        ];

        $this->load->view("main", $output);
    }
    public function login()
    {


        //$this->load->view('layouts/head');
        $this->load->view('usuarios/admin/inicioSesionAdmin');
    }

    public function listar_usuarios_admin()
    {


        if ($this->session->userdata('id_rol') != 2) {
            redirect('admin/login');
        }
        $usuarios = $this->Usuarios_admin_model->obtener_usuarios(2);


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Usuarios",
            "vista_principal"   => "admin/listar_usuarios",
            "usuarios" => $usuarios,




            "librerias_css" => [],


            "librerias_js" => [],


            "ficheros_js" => [recurso("listar_usuario_admin_js")],
            "ficheros_css" => [],


        ];

        $this->load->view("main", $output);
    }
    public function cerrar_sesion()
    {

        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('cedula');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('activo');
        $this->session->unset_userdata('id_rol');


        redirect("admin/login");
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

        $resultado = $this->Usuarios_admin_model->validarEmailUsuario($email);

        if ($resultado) {

            if (password_verify($password, $resultado->password) && $resultado->id_rol = 2) {

                $s_usuario = array(
                    'id_usuario' => $resultado->id_usuarios_admin,
                    'cedula' => $resultado->cedula,
                    'email' => $resultado->email,
                    'activo' => $resultado->activo,
                    'fecha_reg' => $resultado->created_on,
                    'id_rol' => $resultado->id_rol
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
                    echo  json_encode(["resultado" => true, "mensaje" => ' Ingreso exitoso']);
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


    public function registro_usuarios()
    {

        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registrar usuario admin"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de usuario",
            "vista_principal"   => "admin/registro_usuarios",
            "librerias_js" => [recurso("admin_registrar_usuario_js")]

        ];

        $this->load->view("main", $output);
    }


    public function crear_usuario()
    {
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password', 'password', 'trim|required|strip_tags');


        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        //reglas de validación

        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }


        $email = trim(strtoupper($this->input->post('email')));
        //encriptamos clave codeigniter



        $resultado = $this->Usuarios_admin_model->validarEmailUsuario($email);
        if ($resultado) {
            echo  json_encode(["resultado" => false, "mensaje" => "EL email ya se encuentra registrado"]);
            exit;
        }


        $pass_cifrado = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
        $id_usuario = $this->Usuarios_admin_model->post_regitrar([
            "nombre" => $this->input->post('password'),
            "id_rol"  => $this->input->post('id_rol'),
            "cedula"  => $this->input->post('cedula'),
            "email"   => $email,
            "password" => $pass_cifrado
        ]);


        echo  json_encode(["resultado" => true, "mensaje" => "Registro exitoso"]);
    }


    public function registro_estructura()

    {

        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        $estados = $this->Musuarios->getEstados();

        $responsabilidad_estructuras = $this->Estructuras_model->responsabilidad_estructuras();

        $instruccion_academica = $this->Estructuras_model->instruccion_academica();

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $persona = $this->Estructuras_model->getUsuarioRegistradoPersonal();
        $res = [];
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Estructuras_model->getEditEstruturaID($id__exp_lab);
            json_encode($res);
        }



        $datos['profesion_oficio'] = $profesion_oficio;


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "admin/registro_estructura",
            "responsabilidad_estructuras"   =>  $responsabilidad_estructuras,
            "academica"   =>  $instruccion_academica,
            "estados"          => $estados,
            "sectorProductivo" => $sectorProductivo,
            'profesion_oficio' => $profesion_oficio,
            "datos" => $res,

            "persona" => $persona,



            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"), recurso("jquery_easing_js")



            ],


            "ficheros_js" => [
                recurso("datospersonales_js"), recurso("validacion_datospersonales_js"),
                recurso("estructuras_js"), recurso("mapa_mabox_js")
            ],
            "ficheros_css" => [recurso("mapa_mabox_css"), recurso("estructuras_css")],


        ];

        $this->load->view("main", $output);
    }


    public function crearEstructura()
    {
        //delimitadores de errores


        if (!$this->session->userdata('id_rol') == 2) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $this->form_validation->set_rules('nombres', 'nombres', 'trim|required|strip_tags');

        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_nivel_academico', 'academico', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local', 'telf local', 'trim|required|strip_tags');
        $this->form_validation->set_rules('correo1', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('fecha_nac', 'fecha_nac', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('cod_responsabilidad', 'cod_responsabilidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('edad', 'edad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_profesion_oficio', 'id_profesion_oficio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_estructura', 'estructura_responsabilidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');



        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
        } else {

            $rol_usuario = 3;
            //verificar que el usuario no exita. si exite no debes registrarse
            $validacion_usuario = $this->Estructuras_model->verificarSiUsuarioExiste('V' . $this->input->post('cedula'), strtoupper(trim($this->input->post('email1'))), $rol_usuario);


            // si el cedula de usuario existe 
            if ($validacion_usuario) {
                echo  json_encode(["resultado" => false, "mensaje" => "la cedula o correo ya se  encuentra registrado"]);
                exit;
            }

            if ($this->Estructuras_model->verificarSiUsuarioExisteEstructura('V' . $this->input->post('cedula'), strtoupper(trim($this->input->post('email1'))))) {
                echo  json_encode(["resultado" => false, "mensaje" => "la cedula o correo ya se  encuentra registrado en la estructura"]);
                exit;
            }



            // $datos_usuario['codigo'] = generar_uuid();
            $datos_usuario['cedula'] = strtoupper($this->input->post('cedula'));
            $datos_usuario['email'] = strtoupper($this->input->post('correo1'));
            //encriptacion
            $pass_cifrado = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
            $datos_usuario['password'] = $pass_cifrado;
            $datos_usuario['activo'] = 1;
            // $datos_usuario['registro_anterior'] = 0;
            $datos_usuario['id_rol'] = 3;
            $datos_usuario['nombre'] = $this->input->post('nombres') . " " . $this->input->post('apellidos');





            //REGISTRo de usuario DE ESTRUCTURA en la tabla usuario
            $id_usuario = $this->Usuarios_admin_model->post_regitrar($datos_usuario);
            $datas = array(
                'nombre' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('correo1'),
                'tlf_celular' => $this->input->post('telf_movil'),
                'tlf_coorparativo' => $this->input->post('telf_local'),
                'cedula' => $this->input->post('cedula'),
                'fecha_nac' => $this->input->post('fecha_nac'),
                'edad' => $this->input->post('edad'),
                'id_profesion_oficio' => $this->input->post('id_profesion_oficio'),
                'id_nivel_academico' => $this->input->post('id_nivel_academico'),
                'codigoestado' => $this->input->post('cod_estado'),
                'codigomunicipio' => $this->input->post('cod_municipio'),
                'codigoparroquia' => $this->input->post('cod_parroquia'),
                'direccion' => $this->input->post('direccion'),
                'id_responsabilidad_estructura' => $this->input->post('cod_responsabilidad'),
                'tipo_estructura' => $this->input->post('id_estructura'),
                'talla_pantalon' => $this->input->post('talla_pantalon'),
                'talla_camisa' => $this->input->post('talla_camisa'),
                'latitud' => $this->input->post('latitud'),
                'longitud' => $this->input->post('longitud'),
                'id_usuario' =>  $id_usuario,
                'id_usuario_registro' => $this->session->userdata('id_usuario')

            );


            $this->Estructuras_model->post_crearEstructura($datas);
            echo  json_encode(["resultado" => true, "mensaje" => "Datos guardados correctamente."]);
        }
    }


    public function registro_empresas()

    {
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de empresas"

        ];

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();




        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
            "vista_principal"   => "admin/registro_empresas",
            "sectorProductivo" => $sectorProductivo,



            "estados"          => $estados,


            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"),
                recurso("jquery_steps_js"),  recurso("parsleyjs_js"), recurso("jquery_easing_js")
            ],


            "ficheros_js" => [recurso("registro_empresas_admin_js"), recurso("mapa_mabox_js")],


            "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
    }


    public function crearEmpresas()
    {


        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //delimitadores de errores
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nombre_representante', 'nombre_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('apellidos_representante', 'apellidos_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local_representante', 'telf telf_local_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion_empresa', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password', 'password', 'trim|required|strip_tags');



        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }


        $id_usuario_registro = $this->session->userdata('id_usuario');
        //REGISTRI DE eEMPRESA
        $rif = $this->input->post('rif');
        $nombre_razon_social = $this->input->post('razon_social');
        $rif = $this->input->post('rif');
        $email_empresa = $this->input->post('email');
        $email_representante = $this->input->post('email_representante');
        $cedula_representante = $this->input->post('cedula_representante');

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = array(

            "id_tipo_empresas_universidades" => 1,
            "tipo_empresa"          => 1,
            "id_sector_economico"          => $this->input->post('sector_economico'),
            "id_usuario_registro"   => $id_usuario_registro,
            "nombre_razon_social"   => $nombre_razon_social,
            "rif" => $rif,
            "tlf_celular"   => $this->input->post('telf_movil'),

            "actividad_economica" => $this->input->post('actividad_economica'),
            "email"        => $email_empresa,

            "instagram"    => $this->input->post('instagram'),
            "twitter"      => $this->input->post('twitter'),
            "facebook"     => $this->input->post('facebook'),

            "codigoestado"      => $this->input->post('cod_estado'),
            "codigomunicipio"   => $this->input->post('cod_municipio'),
            "codigoparroquia"   => $this->input->post('cod_parroquia'),

            "latitud"   => $this->input->post('latitud'),
            "longitud"  => $this->input->post('longitud')


        );


        //comprobar si nombre de la empresa esta registrado
        $exite_razon_social = $this->Empresas_entes_model->verificarSiExiste("nombre_razon_social", $nombre_razon_social);
        if ($exite_razon_social) {
            echo  json_encode(["resultado" => false, "mensaje" => "nombre o razon social  $nombre_razon_social ya se encuentra registrado"]);
            exit;
        }
        //comprobar si el rif existe
        $rifexiste = $this->Empresas_entes_model->verificarSiExiste("rif", $rif);
        if ($rifexiste) {
            echo  json_encode(["resultado" => false, "mensaje" => "El rif nro $rif la empresa ya se encuentra registrado"]);
            exit;
        }
        // comprobar si el correo existe
        $correoexiste = $this->Empresas_entes_model->verificarSiExiste("email", $email_empresa);
        if ($correoexiste) {
            echo  json_encode(["resultado" => false, "mensaje" => "el email  $email_empresa  ya se encuentra registrado"]);
            exit;
        }

        // comprobar si el correo del representante existe
        $correo_r_existe = $this->Representante_empresas_entes_model->verificarSiExiste("email", $email_representante);
        if ($correo_r_existe) {
            echo  json_encode(["resultado" => false, "mensaje" => "el email de representante  $email_representante  ya se encuentra registrado"]);
            exit;
        }

        // comprobar si la cedula del representante existe
        $cedula_r_existe = $this->Representante_empresas_entes_model->verificarSiExiste("cedula", $cedula_representante);
        if ($cedula_r_existe) {
            echo  json_encode(["resultado" => false, "mensaje" => "La cedula del representante  $cedula_representante  ya se encuentra registrado"]);
            exit;
        }
        //registrar usuario **

        $id_usuario = $this->Usuarios_admin_model->post_regitrar([
            "id_rol"  => 5,
            "cedula"  => $cedula_representante,
            "email"   => $email_representante,
            "password" => $password,
        ]);


        //Se registra la empresa o ente
        $id_empresa =  $this->Empresas_entes_model->post_regitrar_empresa($data);


        //registrar representante
        $this->Representante_empresas_entes_model->post_regitrar([
            "id_empresas_entes "    => $id_empresa,
            "id_usuario "           => $id_usuario,
            "cedula "               => $cedula_representante,
            "id_usuario_registro "  => $id_usuario_registro,
            "nombre"                => $this->input->post('nombre_representante'),
            "apellidos"             => $this->input->post('apellidos_representante'),
            "tlf_celular"           => $this->input->post('telf_movil_representante'),
            "tlf_local"             => $this->input->post('telf_local_representante'),
            "email "                => $email_representante,
            "cargo "                => $this->input->post('cargo')

        ]);

        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }



    public function listar_empresas_entes()
    {


        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        $estados = $this->Musuarios->getEstados();
        $empresas = $this->Empresas_entes_model->obtener_empresas();
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Empresas registradas"


        ];



        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Empresas/Entes",
            "datatable"             => true,
            "vista_principal"   => "admin/listar_empresas",
            "empresas" => $empresas,
            "estados"  => $estados,


            "librerias_css" => [],


            "librerias_js" => [],


            "ficheros_js" => [recurso("lista_empresas_js")],

            "ficheros_css" => [],


        ];

        $this->load->view("main", $output);
    }
    public function estructuras()
    {
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }




        $estruturas = $this->Estructuras_model->getestructuras();


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"


        ];


        $output = [
            "menu_lateral" => "admin",
            "datatable"      => true,
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "estructuras",
            "vista_principal"   => "admin/estructuras",
            'estruturas' => $estruturas,




            "librerias_css" => [],


            "librerias_js" => [],


            "ficheros_js" => [recurso("listar_estructura_js")],


        ];

        $this->load->view("main", $output);
    }

    public function editar_empresa()
    {


        if ($this->session->userdata('id_rol') != 2) {
            redirect('admin/login');
        }


        $estados = $this->Musuarios->getEstados();
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        $res = [];
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Empresas_entes_model->obtener_representante_universidad($id__exp_lab);
        }

        $datos['estados'] = $estados;

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de empresas"

        ];

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();




        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
            "vista_principal"   => "admin/registro_empresas",
            "sectorProductivo" => $sectorProductivo,
            "list_empresa" => $res,
            "id_empresa" => $id__exp_lab,
            "datos"            => $res,



            "estados"          => $estados,


            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"),
                recurso("jquery_steps_js"),  recurso("parsleyjs_js"), recurso("jquery_easing_js"), recurso("editar_empresas_admin_js")

            ],


            "ficheros_js" => [recurso("mapa_mabox_js")],


            "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
    }
    public function actualizar_estructuras()
    {
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        $estados = $this->Musuarios->getEstados();

        $responsabilidad_estructuras = $this->Estructuras_model->responsabilidad_estructuras();

        $instruccion_academica = $this->Estructuras_model->instruccion_academica();

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $persona = $this->Estructuras_model->getUsuarioRegistradoPersonal();



        $datos['profesion_oficio'] = $profesion_oficio;
        $res = [];
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Estructuras_model->getEditEstruturaID($id__exp_lab);


            if (empty($res)) {
                redirect('admin/login');
            }
        }




        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Actualizar  estructuras"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Actualizar  estructuras",
            "vista_principal"   => "admin/actualizar_estructuras",
            "responsabilidad_estructuras"   =>  $responsabilidad_estructuras,
            "academica"   =>  $instruccion_academica,
            "estados"          => $estados,
            "sectorProductivo" => $sectorProductivo,
            'profesion_oficio' => $profesion_oficio,
            "datos" => $res,
            "persona" => $persona,
            "id_estructura" => $id__exp_lab,



            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"), recurso("jquery_easing_js")



            ],


            "ficheros_js" => [
                recurso("datospersonales_js"), recurso("validacion_datospersonales_js"),
                recurso("actulizar_estructuras_js"), recurso("mapa_mabox_js")
            ],
            "ficheros_css" => [recurso("mapa_mabox_css"), recurso("estructuras_css")],


        ];

        $this->load->view("main", $output);
    }
    public function  actulizar_empresa()
    {
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //delimitadores de errores
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nombre_representante', 'nombre_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('apellidos_representante', 'apellidos_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local_representante', 'telf telf_local_representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion_empresa', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('razon_social', 'razon_social', 'trim|required|strip_tags');
        



        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }


        $id_empresa = $this->input->post('id_empresas_entes');
        $id_representante = $this->input->post('id_representante');


        $data = array(

            "id_sector_economico"          => $this->input->post('sector_economico'),
            "tlf_celular"   => $this->input->post('telf_movil'),
            "actividad_economica" => $this->input->post('actividad_economica'),
            "rif"  => $this->input->post("rif"),
            "email"  => $this->input->post("email"),
            'direccion' => $this->input->post('direccion_empresa'),


            "instagram"    => $this->input->post('instagram'),
            "twitter"      => $this->input->post('twitter'),
            "facebook"     => $this->input->post('facebook'),

            "codigoestado"      => $this->input->post('cod_estado'),
            "codigomunicipio"   => $this->input->post('cod_municipio'),
            "codigoparroquia"   => $this->input->post('cod_parroquia'),

            "latitud"   => $this->input->post('latitud'),
            "longitud"  => $this->input->post('longitud'),
            "nombre_razon_social"   =>$this->input->post('razon_social')


        );
        if ($this->Empresas_entes_model->update_epresas($data, $id_empresa)) {
            $this->Representante_empresas_entes_model->update_representante([
                //   "nombre"                =>$this->input->post('nombre_representante'),                                                                                                                                                                                                     
                "apellidos"             => $this->input->post('apellidos_representante'),
                "tlf_celular"           => $this->input->post('telf_movil_representante'),
                "tlf_local"             => $this->input->post('telf_local_representante'),
                "email"                => $this->input->post('email_representante'),
                "cargo "     => $this->input->post('cargo')

            ], $id_representante);
        }


        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }
    //post_actualizar_estructuras
    public function post_estructuras()
    {
        $this->form_validation->set_rules('nombres', 'nombres', 'trim|required|strip_tags');

        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_nivel_academico', 'academico', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local', 'telf local', 'trim|required|strip_tags');
        $this->form_validation->set_rules('correo1', 'email', 'trim|required|strip_tags');

        $this->form_validation->set_rules('fecha_nac', 'fecha_nac', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('cod_responsabilidad', 'cod_responsabilidad', 'trim|required|strip_tags');

        $this->form_validation->set_rules('edad', 'Edad', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('id_profesion_oficio', 'id_profesion_oficio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_estructura', 'estructura_responsabilidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_usuario_estructura', 'id_usuario_estructura', 'trim|required|strip_tags');


        //otener el id de la estructura
        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
        } else {
            $datas = array(
                'nombre' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                'email' => $this->input->post('correo1'),
                'tlf_celular' => $this->input->post('telf_movil'),
                'tlf_coorparativo' => $this->input->post('telf_local'),
                'cedula' => $this->input->post('cedula'),
                'fecha_nac' => $this->input->post('fecha_nac'),
                'edad' => $this->input->post('edad'),
                'id_profesion_oficio' => $this->input->post('id_profesion_oficio'),
                'id_nivel_academico' => $this->input->post('id_nivel_academico'),
                'codigoestado' => $this->input->post('cod_estado'),
                'codigomunicipio' => $this->input->post('cod_municipio'),
                'codigoparroquia' => $this->input->post('cod_parroquia'),
                'direccion' => $this->input->post('direccion_empresa'),
                'id_responsabilidad_estructura' => $this->input->post('cod_responsabilidad'),
                'tipo_estructura' => $this->input->post('id_estructura'),
                'talla_pantalon' => $this->input->post('talla_pantalon'),
                'talla_camisa' => $this->input->post('talla_camisa'),
                'latitud' => $this->input->post('latitud'),
                'longitud' => $this->input->post('longitud'),





            );

            $this->Estructuras_model->update_Estructura($datas, $this->input->post('id_usuario_estructura'));
            echo  json_encode(["resultado" => true, "mensaje" => "Datos guardados correctamente."]);
        }
    }




    public function registro_universidades()
    {
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;


        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de universidades"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
            "vista_principal"   => "admin/registro_universidades",
            "estados"          => $estados,
            "empresas"         => $empresas,


            "sectorProductivo" => $sectorProductivo,


            "ficheros_js" => [],


            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"),
                recurso("mapa_mabox_js"),
                recurso("universidades_js"),

            ],


            "ficheros_js" => [
                recurso("datospersonales_js"), recurso("validacion_datospersonales_js")

            ],
            "ficheros_css" => [recurso("mapa_mabox_css")],
            recurso("universidades_js"),

        ];

        $this->load->view("main", $output);
    }
    public function crearUniversidades()
    {

        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        $this->form_validation->set_rules('razon_social', 'nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local_representante', 'telf local representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('sector_economico', 'especializacion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email_representante', 'email del representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'Estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|required|strip_tags');


        $this->form_validation->set_error_delimiters('*', '');


        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        //reglas de validación 
        if (!$this->form_validation->run()) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }

        $id_usuario_registro = $this->session->userdata('id_usuario');
        //REGISTRI DE eEMPRESA
        $rif = $this->input->post('rif');
        $nombre_razon_social = $this->input->post('razon_social');
        $rif = $this->input->post('rif');
        $email_empresa = $this->input->post('email');
        $email_representante = $this->input->post('email_representante');
        $cedula_representante = $this->input->post('cedula_representante');

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = array(

            "id_tipo_empresas_universidades" => 2,
            "tipo_empresa"          => 2,
            "id_sector_economico"          => $this->input->post('sector_economico'),
            "id_usuario_registro"   => $id_usuario_registro,
            "nombre_razon_social"   => $nombre_razon_social,
            "rif" => $rif,
            "tlf_celular"   => $this->input->post('tlf_celular'),
            'direccion' => $this->input->post('direccion_empresa'),

            "actividad_economica" => $this->input->post('actividad_economica'),
            "email"        => $email_empresa,

            "instagram"    => $this->input->post('instagram'),
            "twitter"      => $this->input->post('twitter'),
            "facebook"     => $this->input->post('facebook'),

            "codigoestado"      => $this->input->post('cod_estado'),
            "codigomunicipio"   => $this->input->post('cod_municipio'),
            "codigoparroquia"   => $this->input->post('cod_parroquia'),

            "latitud"   => $this->input->post('latitud'),
            "longitud"  => $this->input->post('longitud')


        );


        //comprobar si nombre de la empresa esta registrado
        $exite_razon_social = $this->Empresas_entes_model->verificarSiExiste("nombre_razon_social", $nombre_razon_social);
        if ($exite_razon_social) {
            echo  json_encode(["resultado" => false, "mensaje" => "nombre o razon social  $nombre_razon_social ya se encuentra registrado"]);
            exit;
        }
        //comprobar si el rif existe
        $rifexiste = $this->Empresas_entes_model->verificarSiExiste("rif", $rif);
        if ($rifexiste) {
            echo  json_encode(["resultado" => false, "mensaje" => "El rif nro $rif la empresa ya se encuentra registrado"]);
            exit;
        }
        // comprobar si el correo existe
        $correoexiste = $this->Empresas_entes_model->verificarSiExiste("email", $email_empresa);
        if ($correoexiste) {
            echo  json_encode(["resultado" => false, "mensaje" => "el email  $email_empresa  ya se encuentra registrado"]);
            exit;
        }

        // comprobar si el correo del representante existe
        $correo_r_existe = $this->Representante_empresas_entes_model->verificarSiExiste("email", $email_representante);
        if ($correo_r_existe) {
            echo  json_encode(["resultado" => false, "mensaje" => "el email de representante  $email_representante  ya se encuentra registrado"]);
            exit;
        }

        // comprobar si la cedula del representante existe
        $cedula_r_existe = $this->Representante_empresas_entes_model->verificarSiExiste("cedula", $cedula_representante);
        if ($cedula_r_existe) {
            echo  json_encode(["resultado" => false, "mensaje" => "La cedula del representante  $cedula_representante  ya se encuentra registrado"]);
            exit;
        }
        //registrar usuario **

        $id_usuario = $this->Usuarios_admin_model->post_regitrar([
            "id_rol"  => 5,
            "cedula"  => $cedula_representante,
            "email"   => $email_representante,
            "password" => $password,
        ]);


        //Se registra la empresa o ente
        $id_empresa =  $this->Empresas_entes_model->pos_crearUniversidades($data);


        //registrar representante
        $this->Representante_empresas_entes_model->post_regitrar([
            "id_empresas_entes "    => $id_empresa,
            "id_usuario "           => $id_usuario,
            "cedula "               => $cedula_representante,
            "id_usuario_registro "  => $id_usuario_registro,
            "nombre"                => $this->input->post('nombre_representante'),
            "apellidos"             => $this->input->post('apellidos_representante'),
            "tlf_celular"           => $this->input->post('telf_movil_representante'),
            "tlf_local"             => $this->input->post('telf_local_representante'),
            "email "                => $email_representante,
            "cargo "                => $this->input->post('cargo')

        ]);

        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }



    public function universidades()
    {
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $univerdidade = $this->Empresas_entes_model->obtener_univerdidad();

        // otener el id del usuario 
        $id_empresas = $this->session->userdata('id_empresas');

        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;



        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Listas de Universidades"


        ];


        $output = [
            "menu_lateral" => "admin",
            "datatable"      => true,
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "universidades",
            "vista_principal"   => "admin/universidades",
            'univerdidad' => $univerdidade,
            'datos' => $datos,






            "librerias_css" => [],


            "librerias_js" => [],


            "ficheros_js" => [recurso("lista_empresas_js")],

            "ficheros_css" => [],






        ];

        $this->load->view("main", $output);
    }
    public function editar_universidades()
    {
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();

        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Empresas_entes_model->obtener_representante_universidad($id__exp_lab);
        }

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de universidades"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
            "vista_principal"   => "admin/editar_universidades",
            "estados"          => $estados,
            "empresas"         => $empresas,
            "datos"            => $res,
            "id_empresa" => $id__exp_lab,


            "sectorProductivo" => $sectorProductivo,


            "ficheros_js" => [],


            "librerias_css" => [],


            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"),
                recurso("mapa_mabox_js"),


            ],


            "ficheros_js" => [recurso("editar_universidad_js")],
            "ficheros_css" => [recurso("mapa_mabox_css")],

        ];

        $this->load->view("main", $output);
    }
    public function update_universidad_Representante()
    {
        $this->form_validation->set_rules('razon_social', 'nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil_representante', ' telefono del Representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local_representante', 'telf local representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('sector_economico', 'especializacion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email_representante', 'email del representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'Estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_representante', 'id_representante', 'trim|required|strip_tags');

        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();

            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
        } else {

            $id_empresa = $this->input->post('id_empresas_entes');
            $id_representante = $this->input->post('id_representante');
            $data = array(

                "id_sector_economico"          => $this->input->post('sector_economico'),
                "nombre_razon_social"   => $this->input->post('razon_social'),
                "rif" => $this->input->post('rif'),
                "tlf_celular"   => $this->input->post('tlf_celular'),
                "direccion" => $this->input->post('direccion'),

                "actividad_economica" => $this->input->post('actividad_economica'),
                "email"        => $this->input->post('email'),

                "instagram"    => $this->input->post('instagram'),
                "twitter"      => $this->input->post('twitter'),
                "facebook"     => $this->input->post('facebook'),

                "codigoestado"      => $this->input->post('cod_estado'),
                "codigomunicipio"   => $this->input->post('cod_municipio'),
                "codigoparroquia"   => $this->input->post('cod_parroquia'),

                "latitud"   => $this->input->post('latitud'),
                "longitud"  => $this->input->post('longitud')




            );



            if ($this->Empresas_entes_model->update_Universidades($data, $id_empresa)) {
                $this->Representante_empresas_entes_model->update_representante([
                    //    "cedula"   =>$this->input->post('cedula_representante'),
                    "nombre"                => $this->input->post('nombre_representante'),
                    "apellidos"             => $this->input->post('apellidos_representante'),
                    "tlf_celular"           => $this->input->post('telf_movil_representante'),
                    "tlf_local"             => $this->input->post('telf_local_representante'),
                    "email"                => $this->input->post('email_representante'),
                    "cargo "                => $this->input->post('cargo')

                ], $id_representante);
            } else {

                echo  json_encode(["resultado" => false, "mensaje" => 'No se actuaizaron los registros intente de nuevo']);
            }
            echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
        }
    }



    public function buscar_chambista()
    {

        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Buscar chambistas"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Buscar",
            "vista_principal"   => "admin/buscar_chambista",




            "ficheros_js" => [],


            "librerias_css" => [],


            "librerias_js" => [],

            "ficheros_js" => [recurso("buscar_chambista_js")]


        ];

        $this->load->view("main", $output);
    }

    public function editar_chambista()
    {
        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario
       
       

        $id__exp_lab = strip_tags(trim($this->uri->segment(3)));
       
        $res = [];
        $acausuario=[];
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            
            $res =  $this->Musuarios->getUsuarioChambistaID($id__exp_lab);
            $acausuario = $this->Musuarios->getAcademica_chambistasID($id__exp_lab);
	
       
        } else {
            echo json_encode(["resultado" => false, "mensaje" => "No se encontro el registro"]);
        }
        

         
        $usuarioacademico = $this->Musuarios->AcademicoConsulta($id__exp_lab);
        
      
     

        $estados = $this->Musuarios->getEstados();
        $aborigenes = $this->Musuarios->getAborigenes();
        $datos['estados'] = $estados;
        $datos['aborigenes'] = $aborigenes;
        $ress = [];
        if ($this->session->userdata('id_rol') != 2) {
            $ress = $this->Musuarios->getUsuariosProductivos($id__exp_lab);
           
           
        }else{
            $ress = $this->Musuarios->getUsuariosProductivos($id__exp_lab);

        }
       
        




        
        $movimiento_religioso = $this->Mprofesion_oficio->movimiento_religioso();
        $movimiento_sociales = $this->Mprofesion_oficio->movimiento_sociales();
        $emprendedor= $this->Mprofesion_oficio->emprendedor();
         $SectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
         $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencias($id__exp_lab, $acausuario->codigo);
         $personal = $this->Musuarios->getUsuarioRegistradoPersonale($id__exp_lab, $acausuario->codigo);
         $profesiones = $this->Mprofesion_oficio->getprofesion();
         


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "editar_chambista"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Buscar",
            "vista_principal"   => "admin/editar_chambista",

            "breadcrumb"      =>   $breadcrumb,
            "estados"         => $estados,
            "aborigenes"      => $aborigenes,
            "registroviejo"   =>  $res,
            "profesion_oficio" =>    $profesiones,
            "movimientogeligioso" => $movimiento_religioso,
            "movimientos" => $movimiento_sociales,
            "id_usuario" => $id__exp_lab,
            "acausuario" => $acausuario,
            "usuarioacademico" => $usuarioacademico,
            "areaform"      =>   $this->Musuarios->getAreaForm(),
            "usuarioproductivo"        => $ress,
            'emprendedor' => $emprendedor,
            'SectorProductivo' => $SectorProductivo,
            'usuarioexperiencia' => $usuarioexperiencia,
            'personal' => $personal,
           
           
           

            

            "librerias_js" => [
                recurso("moment_js"), recurso("bootstrap-material-datetimepicker_js"),
                recurso("bootstrap-datepicker_js"), recurso("bootstrap-select_js"),
                recurso("mapa_mabox_js"),


            ],

            
            "ficheros_css" => [recurso("mapa_mabox_css")],

            "ficheros_js" => [recurso("editar_chambista_js")],


        ];

        $this->load->view("main", $output);
    }

    public function update_chambistas()
    {
        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }
        

     


        $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'Estado', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'Parroquia', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'Movil', 'trim|min_length[11]|max_length[11]|numeric|required|strip_tags');
        $this->form_validation->set_rules('telf_local', 'Local', 'trim|min_length[11]|max_length[11]|numeric|required|strip_tags');

        $this->form_validation->set_rules('datepicker', 'Fecha Nacimiento', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'Dirección', 'trim|required|strip_tags');
        $this->form_validation->set_rules('estudio', 'Estudio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('empleo', 'Empleo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cne', 'CNE', 'trim|required|strip_tags');
        $this->form_validation->set_rules('genero', 'Genero', 'trim|required|strip_tags');
        $this->form_validation->set_rules('estcivil', 'Estado Civil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('aborigen', 'Aborigen', 'trim|required|strip_tags');
        $this->form_validation->set_rules('hijo', 'Hijos', 'trim|required|numeric|strip_tags');
        $this->form_validation->set_rules('id_profesion', 'Profesion', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('edad', 'Edad', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_movimiento_religioso', 'Movimiento religioso', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_movimiento_sociales', 'Movimiento Sociales', 'trim|required|strip_tags');

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');


        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');


            $id_usuario = $this->input->post('id_usuario');
            $telf_cel = $this->input->post('telf_movil');
            $telf_cel = (int)$telf_cel;
            $codigoestado = $this->input->post('cod_estado');
            $codigoestado = (int)$codigoestado;
            $codigoparroquia = $this->input->post('cod_parroquia');
            $codigoparroquia = (int)$codigoparroquia;
            $codigomunicipio = $this->input->post('cod_municipio');
            $codigomunicipio = (int)$codigomunicipio;
            $fecha_nac = $this->input->post('datepicker');

            $empleo = $this->input->post('empleo');

        // echo json_encode($fecha_nac );
        // exit();


                $telf_local = $this->input->post('telf_local');
              

            $data = array(
                'nombres' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                'telf_cel' => $telf_cel,
                'telf_local' => $telf_local,
                'codigoestado' => $codigoestado,
                'codigomunicipio'=>$codigomunicipio,
                'codigoparroquia' => $codigoparroquia,               
                'direccion' => $this->input->post('direccion'), 
                'fecha_nac' => $fecha_nac, 
                'estudio' => $this->input->post('estudio'),
                'empleo' => $empleo,
                'id_movimiento_religioso' => $this->input->post('id_movimiento_religioso'),
                'id_movimiento_sociales' => $this->input->post('id_movimiento_sociales'),
                 'latitud' => $this->input->post('latitud'),
                'longitud' => $this->input->post('longitud'),

                'cne' => $this->input->post('cne'),
                'genero' => $this->input->post('genero'),
                'estcivil' => $this->input->post('estcivil'),
                'aborigen' => $this->input->post('aborigen'),
                'hijo' => $this->input->post('hijo'),
                'id_profesion_oficio' => $this->input->post('id_profesion'),
                
                'edad' => $this->input->post('edad'),
              
               
                

            );

          

                if ($this->Musuarios->actualizarChambista($data , $id_usuario)) {
                   
                    echo json_encode(["resultado" => true, "mensaje" => "Datos actualizados correctamente"]);
                } else {
                    echo json_encode(["resultado" => false, "mensaje" => "Error al actualizar los datos"]);
                    
                }
            

            if (!$this->Musuarios->getUsuarioRegistradoPersonal()) {
               
            } 


                
            
            
          
        
        
    }

    public function editar_formacion(){
        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }
       
        


        $id_usu_aca = strip_tags(trim($this->uri->segment(3)));
        $acausuario=[];
        if (isset($id_usu_aca) and $id_usu_aca != "") {
            $acausuario = $this->Musuarios->getAcademi_canbistascaID($id_usu_aca);
    
        }
       
        $id_usuario = $acausuario->id_usuario;
      

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Formacion academica"

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Buscar",
            "vista_principal"   => "chambistas/formacionacademicaform",
            "acausuario" => $acausuario,
            "areaform"      =>   $this->Musuarios->getAreaForm(),
            "id_usu_aca" => $id_usu_aca,
            "id_usuario" => $id_usuario,




            "ficheros_js" => [],


            "librerias_css" => [],


            "librerias_js" => [],

            "ficheros_js" => [recurso("editar_formacion_cade_js")]


        ];

        $this->load->view("main", $output);

    }

    public function registroformacionacademica()
    {
        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }
       
        


       

            $data = array(
                'centro_educ' => $this->input->post('centro_educ'),
                'id_instruccion' => $this->input->post('id_instruccion'),
                'id_estado_inst' =>  $this->input->post('id_estado_inst'),
                'id_area_form' => $this->input->post('id_area_form'),
                'titulo_carrera' => $this->input->post('titulo_carrera'),
                'rango_fecha' => $this->input->post('rango_fecha'),
                'id_usuario' => $this->input->post('id_usuario'),
                'activo' => 1
            );

            $id_usu_aca = $this->input->post('id_usu_aca');
           

            if (isset($id_usu_aca) and $id_usu_aca != "") {
                //actualizar
                $data['id_usu_aca'] = $id_usu_aca;
                if ($this->Musuarios->actualizarAcademicos($data)) {
                    echo json_encode(["resultado" => true, "mensaje" => "Datos actualizados correctamente"]);
                    
                    
                } else {
                    echo json_encode(["resultado" => false, "mensaje" => "Error al actualizar los datos"]);
                    
                   
                }
            } 
        }

        public function registroproductivo()
        {
            if ($this->session->userdata('id_rol') != 2) {
                echo  json_encode([
                    "resultado" => false, "mensaje" => "acceso n  o autorizado",
                    "rol_usuario" => $this->session->userdata('id_rol')
    
                ]);
                exit();
            }
            $id_usuario = strip_tags(trim($this->uri->segment(3)));

           
            // $codigo =  $this->session->userdata('codigo');
            // echo json_encode($id_usuario);
            // exit();
    
           
    
            $this->form_validation->set_rules('tipo_chamba', 'Tipo Chamba', 'trim|min_length[1]|strip_tags');
            $this->form_validation->set_rules('terreno_siembra', 'Terreno Siembra', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('sembrando', 'Sembrando', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('rubro', 'Rubro', 'trim|min_length[2]|max_length[100]|strip_tags');
            $this->form_validation->set_rules('financiamiento', 'Financiamiento', 'trim|min_length[2]|strip_tags');
    
            $this->form_validation->set_rules('pesquera_inspector_pescador', 'Inspector pescador', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('pesquera_pescador', 'Pescador', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('pesquera_financiamiento', 'Financiamiento Pesquera', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('pesquera_refrigeracion', 'Refrigeración', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('emprendimiento', 'Emprendimiento', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('iniciar_emprendimiento', 'Emprendimiento', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('emprendimiento_empresa', 'Empresa', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('financiamiento-emprendimiento', 'Financiamiento emprendimiento', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('agrourbana-terrenos', 'Terrenos', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('agrourbana-patio', 'Patio', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('agrourbana-rubro', 'Rubro', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('financiamiento-agrourbana', 'Agrourbana', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('id_area_desarrollo_emprendedor', 'emprendedor_nombre', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('que_esta_desarrollando', 'queEstaDesarroLLando', 'trim|min_length[2]|strip_tags');
            $this->form_validation->set_rules('id_sector_productivo', 'SectorProductivo', 'trim|min_length[2]|strip_tags');
        
    
            $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
            //delimitadores de errores
    
            //reglas de validación
            $this->form_validation->set_message('required', 'Debe llenar el campo %s');
            //reglas de validación
    
            if ($this->form_validation->run() === FALSE) {
    
                $mensaje_error = validation_errors();
                $datos['mensajeerror'] = $mensaje_error;
    
                $this->session->set_flashdata('mensajeerror', $mensaje_error);
                redirect('admin/editar_chambista/' . $id_usuario);
            } else {
                $codigo = $this->input->post('codigo');
                // echo json_encode($codigo);
                // exit();

                $data = array(
    
                    //Chamba Vuelta al Campo
                    'tipo_chamba' => $this->input->post('tipo_chamba'),
                    'terreno_siembra' => $this->input->post('terreno_siembra'),
                    'sembrando' => $this->input->post('sembrando'),
                    'rubro' => $this->input->post('rubro'),
                    'financiamiento' => $this->input->post('financiamiento'),
                    //Pesquera y Acuicola
                    'pesquera_inspector_pescador' => $this->input->post('pesquera_inspector_pescador'),
                    'pesquera_pescador' => $this->input->post('pesquera_pescador'),
                    'pesquera_financiamiento' => $this->input->post('pesquera_financiamiento'),
                    'pesquera_refrigeracion' => $this->input->post('pesquera_refrigeracion'),
                    //Pesquera y Acuicola
                    'emprendimiento' => $this->input->post('emprendimiento'),
                    'iniciar_emprendimiento' => $this->input->post('iniciar_emprendimiento'),
                    'emprendimiento_empresa' => $this->input->post('emprendimiento_empresa'),
                    'financiamiento-emprendimiento' => $this->input->post('financiamiento-emprendimiento'),
                    //Chamba Agrourbana
                    'agrourbana-terrenos' => $this->input->post('agrourbana-terrenos'),
                    'agrourbana-patio' => $this->input->post('agrourbana-patio'),
                    'agrourbana-rubro' => $this->input->post('agrourbana-rubro'),
                    'financiamiento-agrourbana' => $this->input->post('financiamiento-agrourbana'),
                    // Emprendedor
                    'id_area_desarrollo_emprendedor' => $this->input->post('emprendedor_nombre'),
                    // queEstaDesarroLLando
                    'que_esta_desarrollando' => $this->input->post('queEstaDesarroLLando'),
                    // desarrollo_proyecto_tecnologico
                    'desarrollo_proyecto_tecnologico' => $this->input->post('proyecto_tecnologico'),
                    // id_servicios_profesionales
                    'id_servicios_profesionales' => $this->input->post('idservicios'),
                    // Sector_Productivo
                    'id_sector_productivo' => $this->input->post('SectorProductivo'),
                    'id_usuario' => $id_usuario,
                    'codigo' => $codigo,
                   
    
                    
                   
                   
                );

                
    
                if (!$this->Musuarios->getUsuariosProductivos($id_usuario)) {
                   
               
    
                    if ($this->Musuarios->registroproductivos($data)) {
                        $this->session->set_flashdata('mensajeexito', 'Registro exitoso');
                       
                        redirect('admin/editar_chambista/' . $id_usuario);
                        
                       
                       
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                        redirect('admin/editar_chambista/' . $id_usuario);
                    }
                } else {
                    
                    $this->session->set_flashdata('mensajeerror', 'Solo puedes registrar una opción, puedes eliminarla y crear una nueva');
                    redirect('admin/editar_chambista/' . $id_usuario);
                }
            }
        }

        public function eliminarchamba()
        {
            if ($this->session->userdata('id_rol') != 2) {
                echo  json_encode([
                    "resultado" => false, "mensaje" => "acceso n  o autorizado",
                    "rol_usuario" => $this->session->userdata('id_rol')
    
                ]);
                exit();
            }
            
            $id_usuario = strip_tags(trim($this->uri->segment(2)));
          
    
            if ($this->Musuarios->eliminarchambas($id_usuario)) {
                $this->session->set_flashdata('mensajeexito', 'Operación Exitosa! ah eliminar la chamba');
                redirect('admin/editar_chambista/' .$id_usuario);
            } else {
                $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
                redirect('admin/editar_chambista/' .$id_usuario);
            }
        }

        public function generate($html, $cedula)
        {
            $dompdf = new Dompdf(); // Instanciamos un objeto de la clase DOMPDF.
            $dompdf->loadHtml($html); // Cargamos el contenido HTML.
            $dompdf->render(); // Renderizamos el documento PDF.
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->stream($cedula . ".pdf", array("Attachment" => 0)); # Enviamos el fichero PDF al navegador.
            return $dompdf->output();
        }

        public function pdfCadmin()
    {
        if ($this->session->userdata('id_rol') != 2) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }
       
        
        $personal = $this->Musuarios->getUsuarioRegistradoPersonal();
        $usuario = $this->Musuarios->getUsuario();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();
        $res = $this->Musuarios->getRedesSociales();
        $imgqr = $this->qr();

        $data['imgqr'] = $imgqr;

        $data['personal'] = $personal;
        $data['usuario'] = $usuario;
        $data['usuarioexperiencia'] = $usuarioexperiencia;
        $data['usuarioacademico'] = $usuarioacademico;
        $data['redesusuario'] = $res;
        $html = $this->load->view('pdf_exports/genera_pdf_muestra', $data, TRUE);
        // Cargamos la librería
        //$this->load->library('pdfgenerator');
        // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $this->generate($html, $usuario->cedula);
    }
    public function qr()
    {
        if ($this->session->userdata('id_rol') != 2) {
            //hacemos configuraciones
            $params['data'] = base_url()."consulta/".$this->session->userdata('codigo');
            $params['level'] = 'L';
            $params['size'] = 5;
            /*L = Baja
            M = Mediana
            Q = Alta
            H= Máxima */
            $params['savename'] = FCPATH . "qr_code/".$this->session->userdata('cedula')."_".$this->session->userdata('codigo').".png";
            //generamos el código qr
            $this->ciqrcode->generate($params);

            $data['img'] = $this->session->userdata('cedula')."_".$this->session->userdata('codigo').".png";
            return $data['img'];
        }
    }
    }
