<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->model('Estructuras_model');
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }


    public function login()
	{
        //$this->load->view('layouts/head');
		$this->load->view('usuarios/admin/inicioSesionAdmin');
	}

	public function index()
	{
       
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Inicio"
           
 
                ];
    


     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "admin/inicio",
             "librerias_js" => [recurso("admin_js") ]
     

     

        ];

        $this->load->view("main", $output);
	}

    public function registro_estructura()
  
	{
    //    if (!$this->session->userdata('id_usuario')) {
    //         redirect('iniciosesion');
    //     } 


       
        $estados = $this->Musuarios->getEstados();
        $responsabilidad_estructuras= $this->Estructuras_model->responsabilidad_estructuras();
        $instruccion_academica= $this->Estructuras_model->instruccion_academica();
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $profesion_oficio= $this->Estructuras_model->profesion_oficio();

        $datos['profesion_oficio'] = $profesion_oficio;
       
      
        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"
        
                 ];

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
             "vista_principal"   => "admin/registro_estructura",
             "responsabilidad_estructuras"   =>  $responsabilidad_estructuras,
             "academica"   =>  $instruccion_academica,
            "estados"          => $estados,
            "sectorProductivo" => $sectorProductivo,
            'profesion_oficio' => $profesion_oficio,

            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
           recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),recurso("jquery_easing_js")

            
     
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js"),
           recurso("estructuras_js"), recurso("mapa_mabox_js")],
           "ficheros_css" => [recurso("mapa_mabox_css"),recurso("estructuras_css")],


        ];

        $this->load->view("main", $output);
       
	}


    public function crearEstructura(){





        $this->form_validation->set_rules('cedula', 'cedula', 'trim|required|strip_tags');
        $this->form_validation->set_rules('nombres', 'nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|strip_tags');

        $this->form_validation->set_rules('email1', 'email', 'trim|required|strip_tags');
       
        $this->form_validation->set_rules('telf_movil', 'telf movil', 'trim|required|strip_tags');
        $this->form_validation->set_rules('telf_local', 'telf local', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_responsabilidad', 'cod_responsabilidad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('edad', 'edad', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_profesion_oficio', 'id_profesion_oficio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_nivel_academico', 'academico', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');

        $this->form_validation->set_rules('direccion', 'direccion', 'trim|required|strip_tags');

        $this->form_validation->set_rules('id_estructura', 'estructura_responsabilidad', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('latitud', 'latitud', 'trim|required|strip_tags');
        $this->form_validation->set_rules('longitud', 'longitud', 'trim|required|strip_tags');
         
 
 
        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores
 
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación
 
        if ($this->form_validation->run() === FALSE) {
             $mensaje_error = validation_errors();
         
             echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
 
     }else{

        $rol_usuario=3;
   //verificar que el usuario no exita. si exite no debes registrarse
   $validacion_usuario = $this->Estructuras_model->verificarSiUsuarioExiste('V'.$this->input->post('cedula'),strtoupper(trim($this->input->post('email1'))),$rol_usuario);
  

     // si el cedula de usuario existe 
    if($validacion_usuario){
        echo  json_encode(["resultado" =>false,"mensaje"=> "la cedula o correo ya se  encuentra registrado"]);
        exit;
    }

    if( $this->Estructuras_model->verificarSiUsuarioExisteEstructura('V'.$this->input->post('cedula'),strtoupper(trim($this->input->post('email1'))))){
        echo  json_encode(["resultado" =>false,"mensaje"=> "la cedula o correo ya se  encuentra registrado en la estructura"]);
        exit;
    }


 
    $datos_usuario['codigo'] = generar_uuid();
    $datos_usuario['cedula'] = strtoupper('V'.$this->input->post('cedula'));
    $datos_usuario['email'] = strtoupper($this->input->post('email1'));
    //encriptacion
    $pass_cifrado = password_hash($this->input->post('pass'),PASSWORD_DEFAULT);
    $datos_usuario['password'] = $pass_cifrado;
    $datos_usuario['activo'] = 0;
    $datos_usuario['registro_anterior'] = 0;
    $datos_usuario['id_rol'] = 3;


   
   //REGISTRo de usuario DE ESTRUCTURA en la tabla usuario
       $id_usuario_registro= $this->Musuarios->registrarUsuario($datos_usuario);
      
       
       $datas = array(
        'nombre' => $this->input->post('nombres'),
        'apellidos' => $this->input->post('apellidos'),
        'email' => $this->input->post('email1'),
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
        'id_usuario' =>  $id_usuario_registro,) ;
        
        
        $datas = $this->Estructuras_model->post_crearEstructura($datas);
         echo  json_encode(["resultado" =>true,"mensaje"=>"registro exitoso"]);
   

             

        

         
         
   
        
     }
    }

    public function estructuras(){

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"
        
 
                ];

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "estructuras",
            "vista_principal"   => "admin/estructuras",
            
            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
           recurso("jquery_steps_js"),  recurso("parsleyjs_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),recurso("jquery_easing_js")

            
     
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js"),
           recurso("estructuras_js"), recurso("mapa_mabox_js")],
           "ficheros_css" => [recurso("mapa_mabox_css"),recurso("estructuras_css")],


        ];

        $this->load->view("main", $output);
        
    }
    public function registro_empresas()
  
	{
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de empresas"
 
                ];
    
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
             "sectorProductivo" => $sectorProductivo,
     
           
           "estados"          => $estados,

            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("jquery_steps_js"),  recurso("parsleyjs_js"),recurso("jquery_easing_js")
        ],


           "ficheros_js" => [   recurso("registro_empresas_admin_js"),recurso("mapa_mabox_js")],

           
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
       
	}

    public function registro_universidades(){
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
        
        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de universidades"
 
                ];
    
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
             "vista_principal"   => "admin/registro_universidades",
             "estados"          => $estados,
     
           "ficheros_js" => [],
       
            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
             recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);

    }
}