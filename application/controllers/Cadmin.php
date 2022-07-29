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
        $this->load->model('Dasboard_admin_model');
        $this->load->model('Usuarios_admin_model');
        $this->load->model('Oferta_empleo_model');
        $this->load->model('Ofertas_chambistas_model');
        $this->load->model('Estatus_oferta_model');
        $this->load->model('Oferta_universida_model');
        $this->load->library('ciqrcode');
        $this->load->model('Menu_model');
        $this->load->model('Brigadas_estructuras_model');

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


        $id_brigada=0;


            if(isset($_GET['idrol']))
            $id_brigada=$_GET['idrol'];


   



          $resultado_reporte = $this->Brigadas_estructuras_model-> obtener_brigadas_x_estados($id_brigada);
       
          $cabecera = array(); 
          foreach($resultado_reporte as $key=> $row){

              
                      $cabecera['campo'][] = $row->estado;   
                      $cabecera['valor'][] = $row->total;   
              
                        }

          $resultado_reporte =$cabecera;
          
        
        $total_usuarios = $this->Dasboard_admin_model->obtener_total_usuarios_registrados();
        $completados    = $this->Dasboard_admin_model->obtener_registros_completados();
        $total_empresas = $this->Dasboard_admin_model->obtener_empresas_registradas();
        $total_universidades = $this->Dasboard_admin_model->obtener_univesidades_registradas();
        $total_estructuras = $this->Dasboard_admin_model->obtener_estructuras_registradas();

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "admin/inicio",
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "total_usuarios" => $total_usuarios,
            "constantes_js"=> ["reporte_estados"=>json_encode($resultado_reporte)],
            "completados" => $completados,
            "total_empresas" => $total_empresas,
            "total_universidades" => $total_universidades,
            "total_estructuras" => $total_estructuras,
            "ficheros_js" => [recurso("admin_js")],


        ];

        $this->load->view("main", $output);
    }
    public function login()
    {


        //$this->load->view('layouts/head');
        $this->load->view('usuarios/admin/inicioSesionAdmin');
    }

    public function ver_estrutura_brigada(){

  
        if (!tiene_acceso(['estructura','admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $id_estructura_brigada = strip_tags(trim($this->uri->segment(4)));
        if (empty($id_estructura_brigada) || $id_estructura_brigada == "") {
        
            echo  json_encode(["resultado" => false, "mensaje" => "el id es requerido"]);
            exit();
              
        }
        $estructura =  $this->Brigadas_estructuras_model->obtener_brigada_id($id_estructura_brigada);  
        $integrantes = $this->Estructuras_model->obtener_integrantes_estrucutras_id_brigadas($id_estructura_brigada); 
        if(!$estructura ){
            echo  json_encode(["resultado" => false, "mensaje" => "el id de la estructura no se encuentra registrado"]);
            exit;
        }
        
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registrar Estructura / Brigada",

        ];
   

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             =>  $estructura->nombre_rol,
            "vista_principal"   => "admin/ver_estructura_brigada",
            "datatable" =>true,
            "estados"          => $this->Musuarios->getEstados(),
            "id_usuario" => $this->session->userdata('id_usuario'),
            "responsabilidad_estructuras"   =>  $this->Estructuras_model->responsabilidad_estructuras(),
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "estructura"=>$estructura,
            "integrantes"=> $integrantes,
            "ficheros_js" => [recurso("lista_estructura_brigada_js") ],
            "ficheros_css" => [recurso("estructura_brigada.css")],

        ];

        $this->load->view("main", $output);

    }

    public function estructura_brigada(){


          if (!tiene_acceso(['estructura','admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registrar Estructura / Brigada",

        ];

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de usuario",
            "vista_principal"   => "admin/registro_estructura_brigada",
            "estados"          => $this->Musuarios->getEstados(),
            "id_usuario" => $this->session->userdata('id_usuario'),
            "responsabilidad_estructuras"   =>  $this->Estructuras_model->responsabilidad_estructuras(),
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "ficheros_js" => [recurso("admin_estructura_brigada_js") ,recurso("mapa_mabox_js")],
            "ficheros_css" => [recurso("mapa_mabox_css")],

        ];

        $this->load->view("main", $output);

    }

    public function brigada_registro(){

         $this->form_validation->set_rules('nombre_comunidad', 'nombre_comunidad', 'trim|required|strip_tags');
         $this->form_validation->set_rules('nombre_brigada', 'nombre de brigada', 'trim|required|strip_tags');
         $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
         $this->form_validation->set_rules('cod_estado', 'cod_estado', 'trim|required|strip_tags');
         $this->form_validation->set_rules('cod_municipio', 'cod_municipio', 'trim|required|strip_tags');
         $this->form_validation->set_rules('cod_parroquia', 'cod_parroquia', 'trim|required|strip_tags');
         $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');


       if ($this->form_validation->run() === FALSE) {
             $mensaje_error = validation_errors();
            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
       }
        $codigo = codigo_brigada_estructura();
        $id_brigada=$this->Brigadas_estructuras_model->obtener_id_brigada();
        $datos = array(
            "id_brigada" => $id_brigada,
            "nombre_brigada" => $this->input->post("nombre_brigada"),
            "nombre_sector" => $this->input->post("nombre_comunidad"),
            "id_usuario_registro" => $this->session->userdata('id_usuario'),
            "id_rol_estructura" =>$this->input->post("id_estructura"),
            "direccion" => $this->input->post("direccion"),
            "codigoestado" => $this->input->post("cod_estado"),
            "codigomunicipio" => $this->input->post("cod_municipio"),
            "codigoparroquia" => $this->input->post("cod_parroquia"),
            "latitud" => $this->input->post("latitud"),
            "longitud" => $this->input->post("longitud"),
            "codigo" => $codigo,
            "activo" => 1
            

        );


        $respuesta = $this->Brigadas_estructuras_model->post_regitrar($datos);
        if($respuesta){
            
        
            echo  json_encode(["resultado" => true, "id_usuario" => $id_brigada]);

        }else{
            echo  json_encode(["resultado" => false, "mensaje" => $respuesta]);
        }

    }
   
    public function listar_brigada(){

        
        if (!tiene_acceso(['estructura','admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }



        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "listar brigada",

        ];

      
     


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "listar brigada",
            "datatable"=>true,
            "estados"          => $this->Musuarios->getEstados(),
            "datatable" =>  true,
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "vista_principal"   => "admin/listar_brigada",
            "ficheros_css" => [recurso("estructuras_brigadas_css")],
        
            "ficheros_js" => [recurso("filtrar_brigada_js")],
       
        ];

        $this->load->view("main", $output);

    }

    public function editar_brigada(){
      


        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $res = [];
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Brigadas_estructuras_model->obtener_brigada_id($id__exp_lab);
          
              
        }


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Editar / Brigada",

        ];

      


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Editar / Brigada",
            "vista_principal"   => "admin/registro_estructura_brigada",
            "estados"          => $this->Musuarios->getEstados(),
            "id_usuario" => $this->session->userdata('id_usuario'),
            "responsabilidad_estructuras"   =>  $this->Estructuras_model->responsabilidad_estructuras(),
            "brigada" => $res,
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "ficheros_js" => [recurso("admin_editar_brigada_js") ,recurso("mapa_mabox_js")],
            "ficheros_css" => [recurso("mapa_mabox_css")],

        ];

        $this->load->view("main", $output);

    }

    public function brigada_post(){
          $this->form_validation->set_rules('id_estructura', 'estructura', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nombre_brigada', 'nombre de brigada', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nombre_comunidad', 'nombre de comunidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'cod_estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'Parroqui', 'trim|required|strip_tags');
       

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }

        $id_brigada = $this->input->post("id_brigada");

        $datos = array(

            "nombre_brigada" => $this->input->post("nombre_brigada"),
            "nombre_sector" => $this->input->post("nombre_comunidad"),
            "id_usuario_registro" => $this->input->post("id_usuario"),
            "id_brigada" =>$this->input->post('id_brigada'),
            "id_rol_estructura" =>$this->input->post('id_estructura'),
            "direccion" => $this->input->post("direccion"),
            "codigoestado" => $this->input->post("cod_estado"),
            "codigomunicipio" => $this->input->post("cod_municipio"),
            "codigoparroquia" => $this->input->post("cod_parroquia"),
            "latitud" => $this->input->post("latitud"),
            "longitud" => $this->input->post("longitud"),

            
        );

        //      echo json_encode($datos);
        // exit;


      

        $respuesta = $this->Brigadas_estructuras_model->actualizar_brigada($id_brigada,$datos);
        if($respuesta){
            
        
            echo  json_encode(["resultado" => true, "id_usuario" => $respuesta]);

        }else{
            echo  json_encode(["resultado" => false, "mensaje" => $respuesta]);
        }


    }
    public function listar_usuarios_admin()
    {

        $perfil = 'admin';

        if (isset($_GET['p'])) {
            if ($_GET['p'] == "estructura") {
                $perfil = "estructura";
            }
            if  ($_GET['p'] == "universidades") {
                $perfil = "universidades";
            }
            if  ($_GET['p'] == "empresas") {
                $perfil = "empresas";
            }
        }



        $id_roles =  obtener_roles($perfil);
     


        $roles =  $this->Roles_model->obtener_roles($perfil);
        $usuarios = $this->Usuarios_admin_model->obtener_usuarios($id_roles);
        
        // echo json_encode($roles);
        // exit;
        
        

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => $perfil
        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Usuarios",
            "datatable" =>  true,
            "vista_principal"   => "admin/listar_usuarios",
            "usuarios" => $usuarios,
            "id_usuario_admin" => $this->session->userdata('id_usuario'),
            "roles" => $roles,
            "ficheros_js" => [recurso("listar_usuario_admin_js")],
            "ficheros_js" => [recurso("Edit-rol_js"),recurso("rolesUsuarios_js")],
            "constantes_js" => ["ID_USUARIO" => $this->session->userdata('id_usuario')],

         
           

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

        $roles = obtener_roles(['admin','estructura']);
        $resultado = $this->Usuarios_admin_model->validarEmailUsuarioRol($email, $roles);
     
        //crear, modificar, eliminar, vincular
        if ($resultado) {

            if (password_verify($password, $resultado->password)) {

                $s_usuario = array(
                    'id_usuario' => $resultado->id_usuarios_admin,
                    'cedula' => $resultado->cedula,
                    'email' => $resultado->email,
                    'activo' => $resultado->activo,
                    'fecha_reg' => $resultado->created_on,
                    'id_rol' => $resultado->id_rol,
                    'permiso_guardar' => $resultado->crear,
                    'permiso_modificar' => $resultado->modificar,
                    'permiso_eliminar' => $resultado->eliminar,
                    'permiso_vincular' => $resultado->vincular
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

        
        if (!tiene_acceso(['admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registrar usuarios"

        ];
        $roles =  $this->Roles_model->obtener_roles('admin');

        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de usuario",
            "vista_principal"   => "admin/registro_usuarios",
            "roles" => $roles,
            "librerias_js" => [recurso("admin_registrar_usuario_js")]

        ];

        $this->load->view("main", $output);
    }


    public function crear_usuario()
    {


        //verificar acceso
        $permitidos =  obtener_roles('admin');
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //verificar si tiene permiso
        $permiso_g = $this->session->userdata('permiso_guardar');
        if (!$permiso_g) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }


        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('password', 'password', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|strip_tags');


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
            "nombre" => $this->input->post('nombre'),
            "id_rol"  => $this->input->post('id_rol'),
            "cedula"  => $this->input->post('cedula'),
            "cargo"  => $this->input->post('cargo'),
            "email"   => $email,
            "password" => $pass_cifrado
        ]);


        echo  json_encode(["resultado" => true, "mensaje" => "Registro exitoso"]);
    }


    public function registro_estructura()

    {
        //verificar acceso
        $permitidos =  obtener_roles(['admin','estructura']);
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //verificar si tiene permiso
        $permiso_g = $this->session->userdata('permiso_guardar');
        if (!$permiso_g) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }

        $res = [];
        $id_brigada_estructura = strip_tags(trim($this->uri->segment(4)));
        $brigada_estructura =  $this->Brigadas_estructuras_model->obtener_brigada_id($id_brigada_estructura);

 
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de Integrante de estructura"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "admin/registro_estructura",
            "responsabilidad_estructuras"   =>  $this->Estructuras_model->responsabilidad_estructuras(),
            "academica"   => $this->Estructuras_model->instruccion_academica(),
            "estados"          => $this->Musuarios->getEstados(),
            "sectorProductivo" => $this->Mprofesion_oficio->SectorProductivo(),
            'profesion_oficio' => $this->Estructuras_model->profesion_oficio(),
            "id_brigada_estructura" => $id_brigada_estructura,
            "datos" => $res,
            "brigada_estructura" => $brigada_estructura,    
            "persona" => $this->Estructuras_model->getUsuarioRegistradoPersonal(),
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
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



        //verificar acceso
        $permitidos =  obtener_roles(['admin','estructura']);
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
        if (!$tiene_acceso) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //verificar si tiene permiso
        $permiso_g = $this->session->userdata('permiso_guardar');
        if (!$permiso_g) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }

        $this->form_validation->set_rules('nombres', 'nombres', 'trim|required|strip_tags');

        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_nivel_academico', 'academico', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');

        $this->form_validation->set_rules('correo1', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('fecha_nac', 'fecha_nac', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('cod_responsabilidad', 'cod_responsabilidad', 'trim|required|strip_tags');
    
        $this->form_validation->set_rules('id_profesion_oficio', 'id_profesion_oficio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
      
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('pass', 'pass', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_brigada_estructura', 'id_brigada_estructura', 'trim|required|strip_tags');

        
        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores
        //reglas de validación
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error]);
            exit;
        }
        $brigada_estructura =  $this->Brigadas_estructuras_model->obtener_brigada_id($this->input->post('id_brigada_estructura'));

            $rol_usuario =$brigada_estructura->id_rol_estructura;
            //verificar que el usuario no exita. si exite no debes registrarse
            $validacion_usuario = $this->Estructuras_model->verificarSiUsuarioExiste($this->input->post('cedula'), strtoupper(trim($this->input->post('email1'))), $rol_usuario);
      
            // si el cedula de usuario existe 
            if ($validacion_usuario) {
                echo  json_encode(["resultado" => false, "mensaje" => "la cedula o correo ya se  encuentra registrado"]);
                exit;
            }

            if ($this->Estructuras_model->verificarSiUsuarioExisteEstructura($this->input->post('cedula'), $this->input->post('email1'))) {
                echo  json_encode(["resultado" => false, "mensaje" => "la cedula o correo ya se  encuentra registrado en la estructura"]);
                exit;
            }



        // $datos_usuario['codigo'] = generar_uuid();
        $datos_usuario['cedula'] = strtoupper($this->input->post('cedula'));
        $datos_usuario['email'] = strtoupper($this->input->post('correo1'));
        //encriptacion
        $clave = trim($this->input->post('pass'));
        $pass_cifrado = password_hash($clave, PASSWORD_DEFAULT);
        $datos_usuario['password'] = $pass_cifrado;
        $datos_usuario['activo'] = 1;
        // $datos_usuario['registro_anterior'] = 0;
        $datos_usuario['id_rol']  =$brigada_estructura->id_rol_estructura;
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
            'genero' => $this->input->post('genero'),
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
            'id_brigada_estructura' => $this->input->post('id_brigada_estructura'),
            'id_usuario' =>  $id_usuario,
            'id_usuario_registro' => $this->session->userdata('id_usuario')
     

        );
 



        $this->Estructuras_model->post_crearEstructura($datas);
        echo  json_encode(["resultado" => true, 
             "mensaje" => "Datos guardados correctamente.",
             "id_brigada" =>$this->input->post('id_brigada_estructura')
    
    
]);
    }


    public function registro_empresas()

    {

        //verificar acceso
        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //verificar si tiene permiso
        if (!tiene_permiso('permiso_guardar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }


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
            redirect('admin/login');
        }
        

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_guardar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }

        //delimitadores de errores
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        // $this->form_validation->set_rules('nombre_representante', 'nombre_representante', 'trim|required|strip_tags');
        // validar solo strings
        $this->form_validation->set_rules('nombre_representante', 'nombre_empresa', 'trim|required|strip_tags');
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
            "cargo" => $this->input->post('cargo'),
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
            "cargo "                => $this->input->post('cargo'),
            'direccion' => $this->input->post('direccion_empresa'),

        ]);

        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }



    public function listar_empresas_entes()
    {


   //verificar acceso
   $permitidos =  obtener_roles(['admin','estructura']);
   $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
   if (!$tiene_acceso) {
       echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
       exit();
   }

        $ofertas = $this->Oferta_empleo_model->obtener_ofertas();

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
            "ofertas" => $ofertas,



            "librerias_css" => [],


            "librerias_js" => [],


            "ficheros_js" => [recurso("lista_empresas_js")],

            "ficheros_css" => [],


        ];

        $this->load->view("main", $output);
    }
    public function estructuras()
    {
     

   //verificar acceso
   $permitidos =  obtener_roles(['admin','estructura']);
   $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
   if (!$tiene_acceso) {
       echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
       exit();
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


        //verificar si tiene permiso
        //verificar acceso
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
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
      
        
   //verificar acceso
   $permitidos =  obtener_roles(['admin','estructura']);
   $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);
   if (!$tiene_acceso) {
       echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
       exit();
   }
        $estados = $this->Musuarios->getEstados();

        $responsabilidad_estructuras = $this->Estructuras_model->responsabilidad_estructuras();

        $instruccion_academica = $this->Estructuras_model->instruccion_academica();
        $rango_edad = $this->Estructuras_model->rango_Edad();

        $sectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $persona = $this->Estructuras_model->getUsuarioRegistradoPersonal();



        $datos['profesion_oficio'] = $profesion_oficio;
        $res = [];
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res =  $this->Estructuras_model->getEditEstruturaID($id__exp_lab);


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
            "rangoedad" => $rango_edad,



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

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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
            "nombre_razon_social"   => $this->input->post('razon_social')


        );
        if ($this->Empresas_entes_model->update_epresas($data, $id_empresa)) {
            $this->Representante_empresas_entes_model->update_representante([
                //   "nombre"                =>$this->input->post('nombre_representante'),                                                                                                                                                                                                     
                "apellidos"             => $this->input->post('apellidos_representante'),
                "tlf_celular"           => $this->input->post('telf_movil_representante'),
                "tlf_local"             => $this->input->post('telf_local_representante'),
                "email"                => $this->input->post('email_representante'),
                "cargo "     => $this->input->post('cargo'),
                'direccion' => $this->input->post('direccion_empresa'),


            ], $id_representante);
        }


        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }
    //post_actualizar_estructuras
    public function post_estructuras()
    {

        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
        }

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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

        $this->form_validation->set_rules('edad', 'Edad', 'trim|min_length[1]|strip_tags');
        $this->form_validation->set_rules('id_profesion_oficio', 'id_profesion_oficio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        //  $this->form_validation->set_rules('id_estructura', 'estructura_responsabilidad', 'trim|required|strip_tags');
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
                'genero' => $this->input->post('genero'),
                'direccion' => $this->input->post('direccion'),
                'id_profesion_oficio' => $this->input->post('id_profesion_oficio'),
                'id_nivel_academico' => $this->input->post('id_nivel_academico'),
                'codigoestado' => $this->input->post('cod_estado'),
                'codigomunicipio' => $this->input->post('cod_municipio'),
                'codigoparroquia' => $this->input->post('cod_parroquia'),
                'id_responsabilidad_estructura' => $this->input->post('cod_responsabilidad'),
                'tipo_estructura' => $this->input->post('id_estructura'),
                'talla_pantalon' => $this->input->post('talla_pantalon'),
                'talla_camisa' => $this->input->post('talla_camisa'),
                'latitud' => $this->input->post('latitud'),
                'longitud' => $this->input->post('longitud')

            );
            // echo json_encode($datas);
            // exit();

            $this->Estructuras_model->update_Estructura($datas, $this->input->post('id_usuario_estructura'));
            echo  json_encode(["resultado" => true, "mensaje" => "Datos guardados correctamente."]);
        }
    }




    public function registro_universidades()
    {


        if (!tiene_acceso(['estructura','admin'])) {
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
          

            ],


            "ficheros_js" => [
                recurso("datospersonales_js"), recurso("validacion_datospersonales_js"), 
                 recurso("universidades_js")

            ],
            "ficheros_css" => [recurso("mapa_mabox_css")],

        ];

        $this->load->view("main", $output);
    }
    public function crearUniversidades()
    {

        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }



        //verificar si tiene permiso
        if (!tiene_permiso('permiso_guardar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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
            "id_rol"  => 4,
            "cedula"  => $cedula_representante,
            "email"   => $email_representante,
            "password" => $password,
            "cargo" => $this->input->post('cargo'),
            "nombre" => $this->input->post('nombre_representante'),
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
            "cargo "                => $this->input->post('cargo'),
            "direccion" => $this->input->post('direccion'),

        ]);

        echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
    }



    public function universidades()
    {
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        $estados = $this->Musuarios->getEstados();
        $ofertas = $this->Oferta_empleo_model->obtener_ofertas();

        $univerdidade = $this->Empresas_entes_model->obtener_universidades(2);

        // otener el id del usuario 


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
            "ofertas" => $ofertas,

            "librerias_css" => [],

            "librerias_js" => [],

            "ficheros_js" => [recurso("lista_empresas_js")],

            "ficheros_css" => [],






        ];

        $this->load->view("main", $output);
    }
    public function editar_universidades()
    {

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }
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

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }

        $this->form_validation->set_rules('razon_social', 'nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('rif', 'rif', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email', 'email', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_movil_representante', ' telefono del Representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local_representante', 'telf local representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('sector_economico', 'especializacion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('email_representante', 'email del representante', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'cargo', 'trim|required|strip_tags');

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
                // "nombre_razon_social"   => $this->input->post('razon_social'),
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

                    "nombre"                => $this->input->post('nombre_representante'),
                    "apellidos"             => $this->input->post('apellidos_representante'),
                    "tlf_celular"           => $this->input->post('telf_movil_representante'),
                    "tlf_local"             => $this->input->post('telf_local_representante'),
                    "email"                => $this->input->post('email_representante'),
                    "cargo "                => $this->input->post('cargo'),
                    "direccion" => $this->input->post('direccion'),



                ], $id_representante);
            } else {

                echo  json_encode(["resultado" => false, "mensaje" => 'No se actuaizaron los registros intente de nuevo']);
            }
            echo  json_encode(["resultado" => true, "mensaje" => 'registro exitoso, presione OK para continuar']);
        }
    }



    public function buscar_chambista()
    {

        if (!tiene_acceso(['estructura','admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
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



        //verificar acceso
        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }


        $id__exp_lab = strip_tags(trim($this->uri->segment(3)));

        $res = [];
        $acausuario = [];
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
        } else {
            $ress = $this->Musuarios->getUsuariosProductivos($id__exp_lab);
        }




        $movimiento_religioso = $this->Mprofesion_oficio->movimiento_religioso();
        $movimiento_sociales = $this->Mprofesion_oficio->movimiento_sociales();
        $emprendedor = $this->Mprofesion_oficio->emprendedor();
        $SectorProductivo = $this->Mprofesion_oficio->SectorProductivo();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencias($id__exp_lab);
        $personal = $this->Musuarios->getUsuarioRegistradoPersonale($id__exp_lab);
        $profesiones = $this->Mprofesion_oficio->getprofesion();
        //  echo json_encode($res);
        // exit();



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
            'sectorProductivo' => $SectorProductivo,
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
     
         //verificar acceso
         if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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
        $telf_cel = $telf_cel;
        $codigoestado = $this->input->post('cod_estado');
        $codigoestado = $codigoestado;
        $codigoparroquia = $this->input->post('cod_parroquia');

        $codigomunicipio = $this->input->post('cod_municipio');

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
            'codigomunicipio' => $codigomunicipio,
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
            'id_profesion_oficio' => $this->input->post('id_profesion'),
            'hijo' => $this->input->post('hijo'),

            'edad' => $this->input->post('edad')




        );



        if ($this->Musuarios->actualizarChambista($data, $id_usuario)) {

            echo json_encode(["resultado" => true, "mensaje" => "Datos actualizados correctamente"]);
        } else {
            echo json_encode(["resultado" => false, "mensaje" => "Error al actualizar los datos"]);
        }
    }

    public function editar_formacion()
    {



           //verificar acceso
        if (!tiene_acceso(['admin','estructura'])) {
           echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
           exit();
       }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }



        $id_usu_aca = strip_tags(trim($this->uri->segment(3)));
        $acausuario = [];
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
            //verificar acceso
            if (!tiene_acceso(['admin','estructura'])) {
                echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
                exit();
            }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_modificar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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
            //verificar acceso
            if (!tiene_acceso(['admin','estructura'])) {
                echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
                exit();
            }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_guardar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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


            //verificar acceso
        if (!tiene_acceso(['admin','estructura'])) {
           echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
           exit();
       }
        //optener el id id_usu_aca hidden del formulario

        //verificar si tiene permiso
        if (!tiene_permiso('permiso_eliminar')) {
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
        }


        $id_usuario = strip_tags(trim($this->uri->segment(2)));


        if ($this->Musuarios->eliminarchambas($id_usuario)) {
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa! ah eliminar la chamba');
            redirect('admin/editar_chambista/' . $id_usuario);
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('admin/editar_chambista/' . $id_usuario);
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
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }

        // if (!$tiene_acceso) {
        //     echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        //     exit();
        // }
        $id_usuario = strip_tags(trim($this->uri->segment(2)));
        $codigo = $this->Musuarios->getUsuarios($id_usuario);
        $personal = $this->Musuarios->getUsuarioRegistradoPersonale($id_usuario);
        $usuario = $this->Musuarios->getUsuarioConsulta($codigo->codigo);
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencias($id_usuario, $codigo->codigo);
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademicoConsulta($codigo->codigo);
        $res = $this->Musuarios->getRedesSocialesConsulta($codigo->codigo);

        $imgqr = $this->qr($codigo->codigo, $codigo->cedula);


        $data['imgqr'] = $imgqr;

        $data['personal'] = $personal;
        $data['usuario'] = $usuario;
        $data['usuarioexperiencia'] = $usuarioexperiencia;
        $data['usuarioacademico'] = $usuarioacademico;
        $data['redesusuario'] = $res;
        $html = $this->load->view('pdf_exports/genera_pdf_muestra', $data, TRUE);


        $this->generate($html, $usuario->cedula);
    }
    public function qr($codigo, $cedula)
    {


        //hacemos configuraciones
        $params['data'] = base_url() . "consulta/" . $codigo;
        $params['level'] = 'L';
        $params['size'] = 5;
        /*L = Baja
                M = Mediana
                Q = Alta
                H= Máxima */
        $params['savename'] = FCPATH . "qr_code/" . $cedula . "_" . $codigo . ".png";
        //generamos el código qr
        $this->ciqrcode->generate($params);

        $data['img'] = $cedula . "_" . $codigo . ".png";
        return $data['img'];
    }

    public function admin_cambiarClave()
    {

        if (!$this->session->userdata('id_usuario')) {
            echo  json_encode([
                "resultado" => false, "mensaje" => "acceso n  o autorizado",
                "rol_usuario" => $this->session->userdata('id_rol')

            ]);
            exit();
        }

        $id_admin = $this->session->userdata('id_usuario');



        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Cambiar Clave"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "cambiarClave",
            "vista_principal"   => "chambistas/cambiarClave",
            "id_admin"           => $id_admin,

            "ficheros_js" => [recurso("admin_cambiarClave_js")]



        ];


        $this->load->view("main", $output);
    }
    public function estructuras_empresa()
    {

        //verificar acceso
          //verificar acceso
          if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario


        $id_admin = $this->session->userdata('id_usuario');



        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Cambiar Clave"

        ];


        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Buscar",
            "vista_principal"   => "admin/cambiarclaves",




            "ficheros_js" => [],


            "librerias_css" => [],


            "librerias_js" => [],

            "ficheros_js" => [recurso("cambiarclave_estruct_empre_js")]



        ];

        $this->load->view("main", $output);
    }
    public function admin_cambiarClaves()
    {



        // if ($this->session->userdata('id_rol') != 2 || $this->session->userdata('id_rol') != 3) {
        //     echo  json_encode([
        //         "resultado" => false, "mensaje" => "acceso n  o autorizado",
        //         "rol_usuario" => $this->session->userdata('id_rol')

        //     ]);
        //     exit();
        // }

        //verificar acceso
         //verificar acceso
         if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario



        $this->form_validation->set_rules('clave_actual', 'Contraseña actual', 'trim|strip_tags|min_length[3]|max_length[16]|required');
        $this->form_validation->set_rules('password', 'Contraseña nueva', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        $this->form_validation->set_rules('new_password', 'Repetir Contraseña nueva', 'trim|strip_tags|matches[password]|required');
        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');








        if ($this->form_validation->run() === FALSE) {
            echo json_encode([
                $mensaje_error = validation_errors(),

                "resultado" => false,
                "mensaje" => $mensaje_error
            ]);
        } else {


            $datos['clave_actual'] = $this->input->post('clave_actual');
            $datos['password'] = $this->input->post('password');
            $datos['new_password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
            $datos['id_admin'] = $this->input->post('id_admin');






            if ($this->session->userdata('id_rol') == 3) {
                if ($resultado = $this->Musuarios->consultaradmin($datos)) {


                    if (password_verify($datos['clave_actual'], $resultado[0]->password)) {



                        $resultado = $this->Musuarios->cambiarPasswor_admin($datos);


                        if ($resultado) {


                            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
                        } else {

                            echo  json_encode(["resultado" => false, "mensaje" =>  'Error no se pudo cambiar la contraseña']);
                        }
                    } else {

                        $this->session->set_flashdata('mensajeerror', 'Contraseña actual no coincide');
                        echo  json_encode(["resultado" => false, "mensaje" =>  'Contraseña actual no coincide']);
                    }
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
                    echo  json_encode(["resultado" => false, "mensaje" =>  'Ocurrio un error intente de nuevo']);
                }
            } else if ($this->session->userdata('id_rol') == 2) {
                if ($resultado = $this->Musuarios->consultaradmin($datos)) {


                    if (password_verify($datos['clave_actual'], $resultado[0]->password)) {



                        $resultado = $this->Musuarios->cambiarPasswor_admin($datos);


                        if ($resultado) {


                            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
                        } else {

                            echo  json_encode(["resultado" => false, "mensaje" =>  'Error no se pudo cambiar la contraseña']);
                        }
                    } else {

                        $this->session->set_flashdata('mensajeerror', 'Contraseña actual no coincide');
                        echo  json_encode(["resultado" => false, "mensaje" =>  'Contraseña actual no coincide']);
                    }
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
                    echo  json_encode(["resultado" => false, "mensaje" =>  'Ocurrio un error intente de nuevo']);
                }
            } else {
                if ($resultado = $this->Musuarios->consultaradmin($datos)) {


                    if (password_verify($datos['clave_actual'], $resultado[0]->password)) {



                        $resultado = $this->Musuarios->cambiarPasswor_admin($datos);


                        if ($resultado) {


                            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
                        } else {

                            echo  json_encode(["resultado" => false, "mensaje" =>  'Error no se pudo cambiar la contraseña']);
                        }
                    } else {

                        $this->session->set_flashdata('mensajeerror', 'Contraseña actual no coincide');
                        echo  json_encode(["resultado" => false, "mensaje" =>  'Contraseña actual no coincide']);
                    }
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
                    echo  json_encode(["resultado" => false, "mensaje" =>  'Ocurrio un error intente de nuevo']);
                }
            }
        }
    }

    public function limpar_qr()
    {

        //verificar acceso
            //verificar acceso
            if (!tiene_acceso(['admin','estructura'])) {
                echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
                exit();
            }
        //optener el id id_usu_aca hidden del formulario



        $files = glob(FCPATH . "qr_code/*"); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file))
                unlink($file); //elimino el fichero
        }
    }



    public function ver_oferta_admin()
    {


        if (!tiene_acceso( ['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }



           $id_oferta = strip_tags(trim($this->uri->segment(3)));
            $datos = $this->Oferta_empleo_model->obtener_ofertas_empresa($id_oferta);

            




            $nombres = $datos[0]->nombre_razon_social;
            $oferta = $datos[0];

            $breadcrumb = (object) [
                "menu" => "Admin",
                "menu_seleccion" => "Ver oferta"


            ];

            $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($oferta->id_oferta);



            $profesion_oficio = $this->Estructuras_model->profesion_oficio();
            $estatus_oferta_chambista = $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();
            $rango_edad = $this->Estructuras_model->rango_Edad();




            $output = [
                "menu_lateral"      =>   "admin",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Oferta de emplo " . $nombres,
                "vista_principal"   => "admin/ver_oferta",
                "ficheros_js" => [recurso("accordion_js"), recurso("ver_oferta_js")],
                "oferta" => $oferta,
                "estatus_oferta_chambista" => $estatus_oferta_chambista,
                "profesion_oficio" => $profesion_oficio,
                "chambista_ofertas" => $chambista_ofertas,
                "id_oferta" => $id_oferta,
                "datatable"             => true,
                "areaform"     =>   $this->Musuarios->getAreaForm(),
                "rangoedad" => $rango_edad,





            ];

            $this->load->view("main", $output);
        
    }
    public function ver_oferta_unervesidad()
    {


        //verificar acceso
        if (!tiene_acceso('admin')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //optener el id id_usu_aca hidden del formulario




        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        $oferta = $this->Oferta_universida_model->obtener_oferta_uner($id_oferta);

   

            $id_oferta = strip_tags(trim($this->uri->segment(3)));
            $oferta = $this->Oferta_universida_model->obtener_oferta_uner($id_oferta);

            $breadcrumb = (object) [
                "menu" => "Admin",
                "menu_seleccion" => "Ver oferta"


            ];

            $chambista_ofertas = $this->Oferta_universida_model->obtener_solicitud_chambista($oferta->id_solicitud);

        




            $profesion_oficio = $this->Estructuras_model->profesion_oficio();
            $estatus_oferta_chambista = $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();
            $rango_edad = $this->Estructuras_model->rango_Edad();



            $ruta = strip_tags(trim($this->uri->segment(1)));
            $output = [
                "menu_lateral"      =>   $ruta,
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Oferta de emplo " . $oferta->nombre_razon_social,
                "vista_principal"   => "admin/ver_oferta_univerdidad",
                "ficheros_js" => [recurso("accordion_js"), recurso("ver_oferta_universidad_js")],
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


    public function listar_oferta_universidades()

    {


       
        if (!tiene_acceso(['estructura','admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        $id_empresa = strip_tags(trim($this->uri->segment(3)));


        // $id_empresa = $this->session->userdata('id_empresa');



        $ofertas = $this->Oferta_universida_model->obtener_ofertas_unirversidad($id_empresa);

        
        // echo json_encode($id_empresa);
        // exit;

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Listar oferta"


        ];


        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      => "admin",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/listar_ofertas_uner",
            "ficheros_js" => [recurso("listar_oferta_js")],
            "ofertas" => $ofertas,
            "constantes_js" => ["ruta" => $ruta],
            "id_oferta" => $id_empresa,





        ];

        $this->load->view("main", $output);
    }

    public function listar_oferta_admin()
    {

        echo "se modifica este metodo por listar_ofertas_empleo_empresa";
        exit;


        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }

        $permitidos = array(4, 5);
        $tiene_acceso = in_array($this->session->userdata('id_rol'), $permitidos, false);

        if (!$tiene_acceso) {


            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit;
        }

        $id_oferta = strip_tags(trim($this->uri->segment(3)));



        $ofertas = $this->Oferta_empleo_model->obtener_ofertas_empresa($id_oferta);
        if ($ofertas == false) {
            $this->session->set_flashdata('mensajeerror', 'Aun no tiene ofertas ');
            redirect('admin/empresas');

            exit();
        }

        if (!$id_oferta == 3) {
            $breadcrumb = (object) [
                "menu" => "admin",
                "menu_seleccion" => "Listar oferta"


            ];


            $ruta = strip_tags(trim($this->uri->segment(1)));
            $output = [
                "menu_lateral"      => "admin",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/listar_ofertas",
                "ficheros_js" => [recurso("listar_oferta_js")],
                "ofertas" => $ofertas,
                "constantes_js" => ["ruta" => $ruta]





            ];

            $this->load->view("main", $output);
        } else {
            $breadcrumb = (object) [
                "menu" => "Estrucutras",
                "menu_seleccion" => "Listar oferta"


            ];


            $ruta = strip_tags(trim($this->uri->segment(1)));
            $output = [
                "menu_lateral"      => "estructuras",
                "breadcrumb"        =>   $breadcrumb,
                "title"             => "Nueva oferta",
                "vista_principal"   => "admin/listar_ofertas",
                "ficheros_js" => [recurso("listar_oferta_js")],
                "ofertas" => $ofertas,
                "constantes_js" => ["ruta" => $ruta]





            ];

            $this->load->view("main", $output);
        }
    }
}
