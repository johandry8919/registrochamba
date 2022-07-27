<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estructuras extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('Mprofesion_oficio');
        $this->load->model('Estructuras_model');
        $this->load->model('Empresas_entes_model');
        $this->load->model('Representante_empresas_entes_model');
        $this->load->model('Usuarios_admin_model');
        $this->load->model('Oferta_universida_model');
        $this->load->model('Estatus_oferta_model');
        $this->load->model('Ofertas_chambistas_model');
        $this->load->model('Oferta_empleo_model');
    }

    public function index()
    {
        
        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Inicio"
                 ];
    
        $output = [
            "menu_lateral" => "estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Inicio",
            "vista_principal"   => "estructuras/inicio",
            "librerias_js" => [],
             "ficheros_js" => [],
            "ficheros_css" => [],


        ];
        $this->load->view("main", $output);
    }

    public function registro()
    {
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb = (object) [
            "menu" => "Estructura",
            "menu_seleccion" => "Registro"

        ];

      




        $output = [
            "menu_lateral" => "estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro de estructuras",
            "vista_principal"   => "estructuras/registro_estructura",
            "estados"          => $estados,

            
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
            
            echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
            redirect('iniciosesion');
      

        } 

            $email = strtoupper($this->input->post('email'));
            //encriptamos clave codeigniter
            $password = trim($this->input->post('password'));

            

           $roles= obtener_roles('estructura');
            $resultado = $this->Usuarios_admin_model->validarEmailUsuarioRol($email, $roles);
        
          
          
            if ($resultado) {
          
                if (password_verify($password,$resultado->password)) {

                $estructura=$this->Estructuras_model->obtener_estructura_id_usuario($resultado->id_usuarios_admin);

                    $s_usuario = array(
                        'id_usuario' => $resultado->id_usuarios_admin,
                        'cedula' => $resultado->cedula,
                        'email' => $resultado->email,
                        'activo' => $resultado->activo,
                        'fecha_reg' => $resultado->created_on,
                        'id_rol' => $resultado->id_rol,
                        'permiso_guardar' =>$resultado->crear,
                        'permiso_modificar'=>$resultado->modificar,
                        'permiso_eliminar'=>$resultado->eliminar,
                        'permiso_vincular'=>$resultado->vincular,
                        'codigoestado'=>$estructura->codigoestado,
                        'codigomunicipio'=>$estructura->codigomunicipio,
                        'codigoparroquia'=>$estructura->codigoparroquia
                        
                    );

               
              
                    if ($resultado->activo==0) {
                        //$this->session->set_flashdata('mensaje', 'Debes completar tus datos para poder realizar una publicación');
                        //redirect('Cusuarios/VvalidarCuenta');
                                 
                    echo  json_encode(["resultado" =>false,"mensaje"=> "La Cuenta de usuario no se encuenta activa"]);
                    exit;

                    }else{
                        $this->session->set_userdata($s_usuario);
                        echo  json_encode(["resultado" =>true,"mensaje"=>' Ingreso exitoso']);
                        exit;

                    }

                } else {
                    //mando a la vista de error
           
                        echo  json_encode(["resultado" =>false,"mensaje"=>'Email o Clave incorrectas']);
                        exit;
                
                }
            } else {
           
                echo  json_encode(["resultado" =>false,"mensaje"=>'Email o Clave incorrectas']);
                exit;
            }
        
	}

       
    public function registro_empresas()
  
	{
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
            redirect('iniciosesion');
            exit();
        }
        $estados = $this->Musuarios->getEstados();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Registro de empresas"
 
                ];
    
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $rango_edad = $this->Estructuras_model->rango_Edad();
       
        

     
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
             "sectorProductivo" => $sectorProductivo,
             "rangoedad" => $rango_edad,
             
     
           
           "estados"          => $estados,

            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("jquery_steps_js"),  recurso("parsleyjs_js"),recurso("jquery_easing_js")
        ],


           "ficheros_js" => [   recurso("resgistro_epres_estruct_js"),recurso("mapa_mabox_js")],

           
           "ficheros_css" => [recurso("mapa_mabox_css")],


        ];

        $this->load->view("main", $output);
       
	}

    //crear empresas 
    public function crearEmpresas(){
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
            redirect('iniciosesion');
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
         
             echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
             exit;
        }

        
         $id_usuario_registro=$this->session->userdata('id_usuario');
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
            "tipo_empresa"          => 1,
            "id_sector_economico"          => $this->input->post('sector_economico'),
            "id_usuario_registro"   =>$id_usuario_registro,
            "nombre_razon_social"   =>$nombre_razon_social,
            "rif"=>$rif,
            "tlf_celular"   =>$this->input->post('telf_movil'),
            'direccion' => $this->input->post('direccion_empresa'),

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
              "password"=>$password
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

    public function listar_empresas(){


        if (!$this->session->userdata('id_rol')) {
            redirect('iniciosesion');
        }
        $estados = $this->Musuarios->getEstados();

       
      

       $empresas = $this->Empresas_entes_model->obtener_empresas();
        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Empresas registradas"
        
 
                ];

              
     
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Empresas/Entes",
            "datatable"             => true,
            "vista_principal"   => "estructuras/listar_empresas",
            "empresas" =>$empresas,
            "estado" =>  $estados ,
            
            
            
           "librerias_css" => [],

         
           "librerias_js" => [],


           "ficheros_js" => [recurso("lista_empresas_js")],
         
           "ficheros_css" => [],


        ];

        $this->load->view("main", $output);

    }

    public function editar_empresas(){
        if (!$this->session->userdata('id_rol')) {
                echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
                redirect('iniciosesion');
                exit();
            }
        $estados = $this->Musuarios->getEstados();
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
            $res = [];
            if (isset($id__exp_lab) and $id__exp_lab != "") {
              $res =  $this->Empresas_entes_model->obtener_representante_universidad($id__exp_lab);
               
             
            }
    
        $datos['estados'] = $estados;
    
        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Registro de empresas"
    
                ];
    
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $rango_edad = $this->Estructuras_model->rango_Edad();
       
        
    
     
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
             "sectorProductivo" => $sectorProductivo,
             "list_empresa" => $res,
             "id_empresa" => $id__exp_lab,
             "datos"            =>$res,
             "rangoedad" => $rango_edad,
             
     
           
           "estados"          => $estados,
    
            
           "librerias_css" => [],
    
         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("jquery_steps_js"),  recurso("parsleyjs_js"),recurso("jquery_easing_js")
        ],
    
    
           "ficheros_js" => [   recurso("update_epres_estruct_js"),recurso("mapa_mabox_js")],
    
           
           "ficheros_css" => [recurso("mapa_mabox_css")],
    
    
        ];
    
        $this->load->view("main", $output);
    
    }

public function  update_empresas_representante(){
    if (!$this->session->userdata('id_rol')) {
        echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
        redirect('iniciosesion');
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

    

   
    $this->form_validation->set_error_delimiters('*', '');


    //reglas de validación
    $this->form_validation->set_message('required', 'Debe llenar el campo %s');

    //reglas de validación 
    if (!$this->form_validation->run()) {
         $mensaje_error = validation_errors();
     
         echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
         exit;
    }


    $id_empresa=$this->input->post('id_empresas_entes');
    $id_representante =$this->input->post('id_representante');
  
    
    $data = array(

      "id_sector_economico"          => $this->input->post('sector_economico'),
      "tlf_celular"   =>$this->input->post('telf_movil'),
      "actividad_economica"=> $this->input->post('actividad_economica'),
      "rif"  => $this->input->post("rif"),
      "email"  => $this->input->post("email"),
      'direccion' => $this->input->post('direccion_empresa'),
     
 
      "instagram"    =>$this->input->post('instagram'),
      "twitter"      => $this->input->post('twitter'),
      "facebook"     =>$this->input->post('facebook'),

      "codigoestado"      =>$this->input->post('cod_estado'),
      "codigomunicipio"   =>$this->input->post('cod_municipio'),
      "codigoparroquia"   =>$this->input->post('cod_parroquia'),

      "latitud"   =>$this->input->post('latitud'),
      "longitud"  =>$this->input->post('longitud')


    );
    if(  $this->Empresas_entes_model->update_epresas($data, $id_empresa)){
          $this->Representante_empresas_entes_model->update_representante([          
                //   "nombre"                =>$this->input->post('nombre_representante'),                                                                                                                                                                                                     
                  "apellidos"             =>$this->input->post('apellidos_representante'),
                  "tlf_celular"           =>$this->input->post('telf_movil_representante'),
                  "tlf_local"             =>$this->input->post('telf_local_representante'),
                  "email"                =>$this->input->post('email_representante'),
                  "cargo "     =>$this->input->post('cargo')
        
              ],$id_representante);
        
                     

    }


    echo  json_encode(["resultado" =>true,"mensaje"=> 'registro exitoso, presione OK para continuar']);

 

}

    public function registro_universidades(){
        if (!$this->session->userdata('id_rol')) {
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
            redirect('iniciosesion');
            exit();
        }
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
       
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();
        $rango_edad = $this->Estructuras_model->rango_Edad();


       
        
        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Registro de universidades"
 
                ];
    
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
             "vista_principal"   => "admin/registro_universidades",
             "estados"          => $estados,
            "sectorProductivo" => $sectorProductivo,
            "empresas" => $empresas,
            "rangoedad" => $rango_edad,
               
               
     
           "ficheros_js" => [],
       
            
           "librerias_css" => [],

         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
             recurso("mapa_mabox_js"),
            recurso("Universidad_estrutura_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],
           recurso("Universidad_estrutura_js"),


        ];

        $this->load->view("main", $output);

    }

    

    public function crearUniversidades(){
        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);


            redirect('iniciosesion');
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
        $this->form_validation->set_rules('direccion','direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado','Estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|required|strip_tags');

        
        $this->form_validation->set_error_delimiters('*', '');
    
 
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
   
        //reglas de validación 
      if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
            exit();
        }


        $id_usuario_registro=$this->session->userdata('id_usuario');
          //REGISTRI DE eEMPRESA
          $rif = $this->input->post('rif');
          $nombre_razon_social = $this->input->post('razon_social');
          $rif = $this->input->post('rif');
          $email_empresa =$this->input->post('email');
          $email_representante = $this->input->post('email_representante');
          $cedula_representante = $this->input->post('cedula_representante');
      
          $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
          $data = array(

            "id_tipo_empresas_universidades"=>2,
            "tipo_empresa"          => 2,
            "id_sector_economico"          => $this->input->post('sector_economico'),
            "id_usuario_registro"   =>$id_usuario_registro,
            "nombre_razon_social"   =>$nombre_razon_social,
            "rif"=>$rif,
            "tlf_celular"   =>$this->input->post('tlf_celular'),
            "direccion" => $this->input->post('direccion'),

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
              "id_rol"  =>4,
              "cedula"  =>$cedula_representante,
              "email"   =>$email_representante,
              "password"=>$password,
          ]);


          //Se registra la Estrutura
        $id_empresa=  $this->Empresas_entes_model->pos_crearUniversidades($data);
        
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
            exit;
       
         
     
    
        
    }



    public function listar_oferta_universidades()
  
    {

    
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        
        $id_empresa = strip_tags(trim($this->uri->segment(3)));

     
        // $id_empresa = $this->session->userdata('id_empresa');

    

        $ofertas = $this->Oferta_universida_model->obtener_ofertas_unirversidad($id_empresa);

        // echo json_encode($id_empresa);
        // exit;

        $breadcrumb = (object) [
            "menu" => "Centros de estudios",
            "menu_seleccion" => "Listar ofertas"


        ];


        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      => "estructuras",
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


    public function lista_universidad(){
        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
            exit();
        }

       
    
       
       
        $univerdidade = $this->Empresas_entes_model->obtener_universidades(2);
        
        $estados = $this->Musuarios->getEstados();
            $datos['estados'] = $estados;
        
      
    
        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Registro de universidades"
        
    
                ];
    
     
        $output = [
            "menu_lateral"=>"estructuras",
            "datatable"      =>true,
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "universidades",
            "vista_principal"   => "estructuras/lista_universidad",
            'univerdidad' => $univerdidade,
            'datos' => $datos,
           
           
           
            
            
            
            "librerias_css" => [],
    
             
            "librerias_js" => [],
    
    
            "ficheros_js" => [recurso("lista_empresas_js")],
          
            "ficheros_css" => [],
    
    
    
           
    
    
        ];

    
        $this->load->view("main", $output);
        
    }

    public function editar_universidades(){
                         //verificar acceso
     if ( !tiene_acceso('estructura')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }
        //optener el id id_usu_aca hidden del formulario
       //verificar si tiene permiso
          if(!tiene_permiso('permiso_modificar')){
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
            exit();
            }
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
       
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();
       
        $id_universidad = strip_tags(trim($this->uri->segment(4)));
        $res = [];
        if (isset($id_universidad) and $id_universidad != "") {
          $res =  $this->Empresas_entes_model->obtener_representante_universidad($id_universidad);
                                   
        }
        

        // echo json_encode($res);
        // exit;
        $rango_edad = $this->Estructuras_model->rango_Edad();
        $breadcrumb =(object) [
            "menu" => "estructuras",
            "menu_seleccion" => "Registro de universidades"
    
                ];
    
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de universidades",
             "vista_principal"   => "admin/editar_universidades",
             "estados"          => $estados,
             "empresas"         => $empresas,
             "datos"            =>$res,
             "id_empresa" => $id_universidad,
             "rangoedad" => $rango_edad,
             "id_rol" => $this->session->userdata('id_rol'),
             
            
                "sectorProductivo" => $sectorProductivo,
             
     
           "ficheros_js" => [],
       
            
           "librerias_css" => [],
    
         
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
             recurso("mapa_mabox_js"),
             recurso("edit_universidad_js"),
             
            
             
             
             
        ],
    
    
           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css"),
          
          
        ],
        

        
          
    
        ];
    
        $this->load->view("main", $output);
    
    }

    public function update_universidad_Representante(){
        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
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
        $this->form_validation->set_rules('direccion','direccion', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado','Estado', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_representante', 'id_representante', 'trim|required|strip_tags');
        
        $this->form_validation->set_error_delimiters('*', '');
        //delimitadores de errores
 
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
        
            echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);

    }else{

       $id_empresa=$this->input->post('id_empresas_entes');
       $id_representante =$this->input->post('id_representante');
        $data = array(
       
            "id_sector_economico"          => $this->input->post('sector_economico'),
            "nombre_razon_social"   =>$this->input->post('razon_social'),
            "rif"=>$this->input->post('rif'),
            "tlf_celular"   =>$this->input->post('tlf_celular'),
            "direccion" => $this->input->post('direccion_empresa'),
    
            "actividad_economica"=> $this->input->post('actividad_economica'),
            "email"        =>$this->input->post('email'),
    
            "instagram"    =>$this->input->post('instagram'),
            "twitter"      => $this->input->post('twitter'),
            "facebook"     =>$this->input->post('facebook'),
    
            "codigoestado"      =>$this->input->post('cod_estado'),
            "codigomunicipio"   =>$this->input->post('cod_municipio'),
            "codigoparroquia"   =>$this->input->post('cod_parroquia'),
    
            "latitud"   =>$this->input->post('latitud'),
            "longitud"  =>$this->input->post('longitud')
    
    
    
    
          );
    

    
          if($this->Empresas_entes_model->update_Universidades($data,$id_empresa)){
            $this->Representante_empresas_entes_model->update_representante([          
                                //    "cedula"   =>$this->input->post('cedula_representante'),
                  "nombre"                =>$this->input->post('nombre_representante'),                                                                                                                                                                                                     
                  "apellidos"             =>$this->input->post('apellidos_representante'),
                  "tlf_celular"           =>$this->input->post('telf_movil_representante'),
                  "tlf_local"             =>$this->input->post('telf_local_representante'),
                  "email"                =>$this->input->post('email_representante'),
                  "cargo "                =>$this->input->post('cargo'),
                  "direccion" => $this->input->post("direccion")
        
              ],$id_representante);
              
    
          }else{

            echo  json_encode(["resultado" =>false,"mensaje"=> 'No se actuaizaron los registros intente de nuevo']);

          }
          echo  json_encode(["resultado" =>true,"mensaje"=> 'registro exitoso, presione OK para continuar']);
          
    }
    
    
    
    }





    public function universidad_oferta_admin(){
        if ( !tiene_acceso('estructura')) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
            }
           
                

        $id_area_formacion = strip_tags(trim($this->uri->segment(3)));
        $ruta = strip_tags(trim($this->uri->segment(1)));
        $oferta = $this->Oferta_universida_model->obtener_oferta($id_area_formacion);
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Ver oferta"
        ];
         //id del id_rol
        $id_rol = $this->session->userdata('id_rol');
        $rango_edad = $this->Estructuras_model->rango_Edad();
       
        $output = [
            
            "menu_lateral"      =>$ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Universidade  oferta",
            "vista_principal"   => "admin/oferta_universidad",
            "constantes_js" => ["ruta"=>$ruta],
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            "oferta" => $oferta,
            "id_rol" => $id_rol,
            "rangoedad" => $rango_edad,
            
            "librerias_js" => [recurso("admin_nueva_oferta_uner_js"),recurso("admin_nueva_oferta_uner")],
            
            "id_area_formacion" => $id_area_formacion,
           
    
        ];
        $this->load->view("main", $output);
    
    }

    public function crear_ofertas(){

        $permitidos = [2,3];        
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
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
            echo  json_encode(["resultado" => false, "mensaje" => "Campo solo numerico"]);{
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
    


      $registro = $this->Oferta_universida_model->post_regitrar([
        "mencion" => $this->input->post('mencion'),
        "duracion" => $this->input->post('duracion'),
        "cupos_disponibles" => $this->input->post('cupos_disponibles'),
        "id_estatus" => 1,
        "id_area_formacion" => $this->input->post('id_area_formacion'),        
        "descripcion_solicitud" =>  $this->input->post('descripcion'),
       
        "sexo" =>  $this->input->post('sexo'),
       
        "titularidad" =>  $this->input->post('titularidad'),
         "edad" =>  $this->input->post('edad'),
       
      ]);
   
      if ($registro) {
    
        echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
     
    }else{
        echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
    }

    }
    public function  editar_oferta(){

        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
            exit();
        }

    
        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        
        $oferta = $this->Oferta_universida_model->obtener_oferta($id_oferta);
        $breadcrumb = (object) [
            "menu" => "Estructura",
            "menu_seleccion" => "Ver oferta"
    
    
        ];
        $id_rol = $this->session->userdata('id_rol');
      
      $estatus=  $this->Estatus_oferta_model->obtener_estatus_oferta();
        $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);
    
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $rango_edad = $this->Estructuras_model->rango_Edad();
    
      
        $output = [
            "menu_lateral"      => "estructuras",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Editar  oferta",
            "vista_principal"   => "admin/editar_oferta_uner",
            "estatus"=>$estatus,
            "librerias_js" => [recurso("accordion_js"),recurso("ver_oferta_js")],
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

    public function listar_ofertas_estructura(){
        if (!$this->session->userdata('id_rol')) {
            // motra un alert con bootstrap
            echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

            
            redirect('iniciosesion');
            exit();
        }

        $id_rol = $this->session->userdata('id_rol');

          
        $permitidos = array(2,3);        
        $tiene_acceso=in_array(2,$permitidos,false);

        if ( !$tiene_acceso) {
           
            
            json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
          
        }

        $ofertas = $this->Oferta_universida_model->obtener_ofertas();
        $breadcrumb = (object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Listar oferta"


        ];
    

        $ruta = strip_tags(trim($this->uri->segment(1)));
        $output = [
            "menu_lateral"      =>$ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/listar_ofertas_uner",
            "ficheros_js" => [recurso("listar_oferta_js")],
            "ofertas" => $ofertas,
            "constantes_js" => ["ruta"=>$ruta]
        
     
     


        ];

        $this->load->view("main", $output);
    
}
public function ver_ofertas_universidad(){


          


    if ( !$this->session->userdata('id_rol')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        redirect('admin/login');
        exit();
       
    }

    $id_oferta = strip_tags(trim($this->uri->segment(3)));
    $oferta =  $this->Oferta_universida_model->obtener_oferta($id_oferta);
    $breadcrumb = (object) [
        "menu" => "Admin",
        "menu_seleccion" => "Ver oferta"


    ];

    $chambista_ofertas = $this->Oferta_universida_model->obtener_solicitud_chambista($id_oferta);

    $profesion_oficio = $this->Estructuras_model->profesion_oficio();
   $estatus_oferta_chambista= $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();
   $rango_edad = $this->Estructuras_model->rango_Edad();


   
   $ruta = strip_tags(trim($this->uri->segment(1)));
    $output = [
        "menu_lateral"      =>   $ruta,
        "breadcrumb"        =>   $breadcrumb,
        "title"             => "Oferta universitaria ".$oferta->nombre_razon_social,
        "vista_principal"   => "admin/ver_oferta_univerdidad",
        "ficheros_js" => [recurso("accordion_js"),recurso("ver_oferta_universidad_js")],
        "oferta" => $oferta,
        "estatus_oferta_chambista"=>$estatus_oferta_chambista,
        "profesion_oficio" => $profesion_oficio,
        "chambista_ofertas" => $chambista_ofertas,
        "id_oferta" => $id_oferta,
        "constantes_js" => ["ruta"=>$ruta],
        "datatable"             => true,
        "areaform"     =>   $this->Musuarios->getAreaForm(),
        "rangoedad" => $rango_edad,
    
 
 


    ];

    $this->load->view("main", $output);

}




public function update_ofertas(){
    $permitidos = [2,3];        
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);
    if ( !$tiene_acceso) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        redirect('iniciosesion');
        
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
        echo  json_encode(["resultado" => false, "mensaje" => "Campo solo numerico"]);{
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
        "cantidad" =>  $this->input->post('cantidad'),
        "titularidad" =>  $this->input->post('titularidad'),
        
  ]);

  if ($registro) {

    echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
 
}else{
    echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
}

}




public function publicar_oferta_admin(){

    $permitidos = [2,3];        
    $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

    if ( !$tiene_acceso) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        redirect('iniciosesion');
        exit();
    }
      
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }


        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => " nueva oferta"


        ];
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
        $id_empresa = strip_tags(trim($this->uri->segment(3)));

       $ruta = strip_tags(trim($this->uri->segment(1)));
   
    $empresa= $this->Empresas_entes_model->obtener_empresa(1,$id_empresa);

        $output = [
            "menu_lateral"      =>$ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "admin/oferta_laboral",
            "ficheros_js" => [recurso("admin_nueva_oferta_js")],
            "profesion_oficio"=> $profesion_oficio,
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            "id_empresa"   => $id_empresa,
            "constantes_js" => ["ruta"=>$ruta],
            "empresa"  => $empresa,




        ];

        $this->load->view("main", $output);
    
}


public function listar_oferta_admin(){

      
    $permitidos = array(2,3);        
    $tiene_acceso=in_array(2,$permitidos,false);

    if ( !$tiene_acceso) {
       
        
        json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        redirect('iniciosesion');
        
      
    }

    $ofertas = $this->Oferta_empleo_model->obtener_ofertas();
    $breadcrumb = (object) [
        "menu" => "Empresas",
        "menu_seleccion" => "Listar oferta"


    ];


    $ruta = strip_tags(trim($this->uri->segment(1)));
    $output = [
        "menu_lateral"      =>$ruta,
        "breadcrumb"        =>   $breadcrumb,
        "title"             => "Nueva oferta",
        "vista_principal"   => "admin/listar_ofertas",
        "ficheros_js" => [recurso("listar_oferta_js")],
        "ofertas" => $ofertas,
        "constantes_js" => ["ruta"=>$ruta]
    
 
 


    ];

    $this->load->view("main", $output);

}

public function crear_oferta(){

    if ( !tiene_acceso('estructura')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }
        //optener el id id_usu_aca hidden del formulario
       //verificar si tiene permiso
          if(!tiene_permiso('permiso_guardar')){
            echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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

public function ver_oferta_empresas(){

      
    if ( !tiene_acceso('estructura')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }

    $id_oferta = strip_tags(trim($this->uri->segment(3)));
    $oferta = $this->Oferta_empleo_model->obtener_oferta($id_oferta);
    $breadcrumb = (object) [
        "menu" => "Empresas",
        "menu_seleccion" => "Ver oferta"


    ];

    $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);

    $profesion_oficio = $this->Estructuras_model->profesion_oficio();
   $estatus_oferta_chambista= $this->Estatus_oferta_model->obtener_estatus_oferta_chambista();
   $rango_edad = $this->Estructuras_model->rango_Edad();


   
   $ruta = strip_tags(trim($this->uri->segment(1)));
    $output = [
        "menu_lateral"      =>   $ruta,
        "breadcrumb"        =>   $breadcrumb,
        "title"             => "Oferta de emplo ".$oferta->nombre_razon_social,
        "vista_principal"   => "admin/ver_oferta",
        "ficheros_js" => [recurso("accordion_js"),recurso("ver_oferta_js")],
        "oferta" => $oferta,
        "estatus_oferta_chambista"=>$estatus_oferta_chambista,
        "profesion_oficio" => $profesion_oficio,
        "chambista_ofertas" => $chambista_ofertas,
        "id_oferta" => $id_oferta,
        "constantes_js" => ["ruta"=>$ruta],
        "datatable"             => true,
        "areaform"     =>   $this->Musuarios->getAreaForm(),
        "rangoedad" => $rango_edad,
    
 
 


    ];

    $this->load->view("main", $output);

}
public function  editar_oferta_empresas(){

    if (!$this->session->userdata('id_rol')) {
        // motra un alert con bootstrap
        echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

        
        redirect('iniciosesion');
        exit();
    }


$id_oferta = strip_tags(trim($this->uri->segment(3)));
// echo json_encode($id_oferta);
// exit();
$oferta = $this->Oferta_empleo_model->obtener_oferta($id_oferta);
$breadcrumb = (object) [
    "menu" => "Empresas",
    "menu_seleccion" => "Ver oferta"


];
$id_rol = $this->session->userdata('id_rol');

$estatus=  $this->Estatus_oferta_model->obtener_estatus_oferta();
$chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);

$profesion_oficio = $this->Estructuras_model->profesion_oficio();
$rango_edad = $this->Estructuras_model->rango_Edad();


$output = [
    "menu_lateral"=>"estructuras",
    "breadcrumb"        =>   $breadcrumb,
    "title"             => "Editar  ofertas",
    "vista_principal"   => "admin/editar_oferta",
    "estatus"=>$estatus,
    // "librerias_js" => [recurso("accordion_js"),recurso("ver_oferta_js")],
    "oferta" => $oferta,
    "profesion_oficio" => $profesion_oficio,
    "chambista_ofertas" => $chambista_ofertas,
    "id_oferta" => $id_oferta,
    "areaform"     =>   $this->Musuarios->getAreaForm(),
    "id_rol"=>$id_rol,
    "rangoedad" => $rango_edad,


    "ficheros_js" => [recurso("editar_oferta_js")],





];

$this->load->view("main", $output);


}

public function update_oferta(){
   
    

    if ( !tiene_acceso('estructura')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }
       
    if(!tiene_permiso('permiso_modificar')){
    echo  json_encode(["resultado" => false, "mensaje" => "No tienes permiso para ejecutatar esta accion"]);
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
$this->form_validation->set_rules('estatus', 'estatus', 'trim|required|strip_tags');




$this->form_validation->set_error_delimiters('*', '');


//reglas de validación
$this->form_validation->set_message('required', 'Debe llenar el campo %s');

//reglas de validación 
if (!$this->session->userdata('id_rol')) {
    // motra un alert con bootstrap
    echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);

    
    redirect('iniciosesion');
    exit();
}



$registro = $this->Oferta_empleo_model->update_oferta([
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
"id_oferta" => $this->input->post('id_oferta'),
"id_estatus_oferta"=> $this->input->post('estatus')
]);

if ($registro) {

echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);

}else{
echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
}

}

public function cambiarClave()
{

    if ( !tiene_acceso('estructura')) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }

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
