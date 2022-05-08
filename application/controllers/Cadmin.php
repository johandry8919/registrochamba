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
        $this->load->model('Empresas_entes_model');
        $this->load->model('Representante_empresas_entes_model');
        $this->load->model('Usuarios_admin_model');
      

        
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

      $estados = $this->Musuarios->getEstados();
        $responsabilidad_estructuras= $this->Estructuras_model->responsabilidad_estructuras();
        $instruccion_academica= $this->Estructuras_model->instruccion_academica();
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $profesion_oficio= $this->Estructuras_model->profesion_oficio();
        $persona= $this->Estructuras_model->getUsuarioRegistradoPersonal();
        
       
        
        $datos['profesion_oficio'] = $profesion_oficio;
        $res =[];
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
          $res =  $this->Estructuras_model->getEditEstruturaID($id__exp_lab);
           json_encode($res);
           
         
        }
       
      
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
            "datos" => $res,
            "persona" => $persona,
            

            
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
        $this->form_validation->set_rules('correo1', 'email', 'trim|required|strip_tags');
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


 
    // $datos_usuario['codigo'] = generar_uuid();
    $datos_usuario['cedula'] = strtoupper('V'.$this->input->post('cedula'));
    $datos_usuario['email'] = strtoupper($this->input->post('correo1'));
    //encriptacion
    $pass_cifrado = password_hash($this->input->post('pass'),PASSWORD_DEFAULT);
    $datos_usuario['password'] = $pass_cifrado;
    $datos_usuario['activo'] = 0;
    // $datos_usuario['registro_anterior'] = 0;
    $datos_usuario['id_rol'] = 3;

 


   
   //REGISTRo de usuario DE ESTRUCTURA en la tabla usuario
       $id_usuario_registro= $this->Musuarios->registrarUsuario($datos_usuario);
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
        'id_usuario' =>  $id_usuario_registro,
      
    );

      
       
      

        
        
        if ($this->Estructuras_model->getUsuarioRegistradoPersonal()) {

            if ($this->Estructuras_model->post_crearEstructura($datas)) {
                $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                echo  json_encode(["resultado" =>true,"mensaje"=> "Datos guardados correctamente."]);
                
                
            } else {
                $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');

                echo  json_encode(["resultado" =>false,"mensaje"=> "Ocurrio un error guardando intente de nuevo."]);
            }
        } else {
            if ($this->Estructuras_model->actualizarPersonales($datas)) {
                $this->session->set_flashdata('mensajeexito', 'Datos actualizados correctamente.');
                echo  json_encode(["resultado" =>true,"mensaje"=> "Datos actualizados correctamente."]);
                
            } else {
                $this->session->set_flashdata('mensajeerror', 'Ocurrio un error actualizando intente de nuevo.');
               
            }
        }
     
    }
}
        
         
   


    public function crearEmpresas(){
   
   
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
         
             echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
             exit;
        }

        
           $id_usuario_registro=1;
          //REGISTRI DE eEMPRESA
          $rif = $this->input->post('rif');
          $nombre_razon_social = $this->input->post('razon_social');
          $rif = $this->input->post('rif');
          $email_empresa =$this->input->post('email');
          $email_representante = $this->input->post('email_representante');
          $cedula_representante = $this->input->post('cedula_representante');
      
          $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
          $data = array(

            "id_tipo_empresas_universidades"=>1,
            "tipo_empresa"          => $this->input->post('sector_economico'),
            "id_usuario_registro"   =>$id_usuario_registro,
            "nombre_razon_social"   =>$nombre_razon_social,
            "rif"=>$rif,
            "tlf_celular"   =>$this->input->post('telf_movil'),

            "actividad_economica"=> $this->input->post('actividad_economica'),
            "email"        =>$email_empresa ,

            "instagram"    =>$this->input->post('instagram'),
            "twitter"      => $this->input->post('twitter'),
            "facebook"     =>$this->input->post('facebook'),

            "codigoestado"      =>$this->input->post('cod_estado'),
            "codigomunicipio"   =>$this->input->post('cod_municipio'),
            "codigoparroquia"   =>$this->input->post('cod_parroquia'),

            "latitud"   =>$this->input->post('latitud'),
            "longitud"  =>$this->input->post('longitud')

   
          );

          
          //comprobar si nombre de la empresa esta registrado
          $exite_razon_social=$this->Empresas_entes_model->verificarSiExiste("nombre_razon_social", $nombre_razon_social);
          if($exite_razon_social){
            echo  json_encode(["resultado" =>false,"mensaje"=> "nombre o razon social  $nombre_razon_social ya se encuentra registrado"]);
            exit;
          }      
          //comprobar si el rif existe
          $rifexiste=$this->Empresas_entes_model->verificarSiExiste("rif",$rif);
          if($rifexiste){
            echo  json_encode(["resultado" =>false,"mensaje"=> "El rif nro $rif la empresa ya se encuentra registrado"]);
            exit;
          }
          // comprobar si el correo existe
          $correoexiste=$this->Empresas_entes_model->verificarSiExiste("email", $email_empresa );
          if($correoexiste){
            echo  json_encode(["resultado" =>false,"mensaje"=> "el email  $email_empresa  ya se encuentra registrado"]);
            exit;
          }

          // comprobar si el correo del representante existe
          $correo_r_existe=$this->Representante_empresas_entes_model->verificarSiExiste("email", $email_representante  );
          if($correo_r_existe){
            echo  json_encode(["resultado" =>false,"mensaje"=> "el email de representante  $email_representante  ya se encuentra registrado"]);
            exit;
          }

        // comprobar si la cedula del representante existe
        $cedula_r_existe=$this->Representante_empresas_entes_model->verificarSiExiste("cedula",$cedula_representante);
        if($cedula_r_existe){
            echo  json_encode(["resultado" =>false,"mensaje"=> "La cedula del representante  $cedula_representante  ya se encuentra registrado"]);
            exit;
        }
          //registrar usuario **

          $id_usuario =$this->Usuarios_admin_model->post_regitrar([
              "id_rol"  =>5,
              "cedula"  =>$cedula_representante,
              "email"   =>$email_representante,
              "password"=>$password,
          ]);


          //Se registra la empresa o ente
         $id_empresa=  $this->Empresas_entes_model->post_regitrar_empresa($data);

         
        //registrar representante
        $this->Representante_empresas_entes_model->post_regitrar([
            "id_empresas_entes "    =>$id_empresa,
            "id_usuario "           =>$id_usuario,
            "cedula "               =>$cedula_representante,
            "id_usuario_registro "  =>$id_usuario_registro,
            "nombre"                =>$this->input->post('nombre_representante'),
            "apellidos"             =>$this->input->post('apellidos_representante'),
            "tlf_celular"           =>$this->input->post('telf_movil_representante'),
            "tlf_local"             =>$this->input->post('telf_local_representante'),
            "email "                =>$email_representante,
            "cargo "                =>$this->input->post('cargo')

        ]);

             echo  json_encode(["resultado" =>true,"mensaje"=> 'registro exitoso, presione OK para continuar']);
           
    }

    public function listar_empresas_entes(){

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Empresas registradas"
        
 
                ];

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "estructuras",
            "vista_principal"   => "admin/listar_empresas",
            
            
           "librerias_css" => [],

         
           "librerias_js" => [],


           "ficheros_js" => [recurso("lista_empresas_js")],
         
           "ficheros_css" => [],


        ];

        $this->load->view("main", $output);

    }
    public function estructuras(){
        // if (!$this->session->userdata(59049)) {
        //     redirect('iniciosesion');
        // 

       


        $estruturas = $this->Estructuras_model->getestructuras();
      

        $breadcrumb =(object) [
            "menu" => "Admin",
            "menu_seleccion" => "Registro de estructuras"
        
 
                ];

     
        $output = [
            "menu_lateral"=>"admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "estructuras",
            "vista_principal"   => "admin/estructuras",
            'estruturas' => $estruturas,
            
            
            
            
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