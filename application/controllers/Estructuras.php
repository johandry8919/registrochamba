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
      

        } 

            $email = strtoupper($this->input->post('email'));
            //encriptamos clave codeigniter

            $password = trim($this->input->post('password'));

            $resultado = $this->Usuarios_admin_model->validarEmailUsuario($email);
     
            if ($resultado) {
          
                if (password_verify($password,$resultado->password) && $resultado->id_rol=3) {

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
        $estados = $this->Musuarios->getEstados();
     
        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Estructuras",
            "menu_seleccion" => "Registro de empresas"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"estructuras",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
             "vista_principal"   => "admin/registro_empresas",
     
           "ficheros_js" => [],
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

    public function registro_universidades(){
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
       
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();


       
        
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

       
        
        // if (!$this->session->userdata('id_rol')) {
        //     echo  json_encode(["resultado" =>false,"mensaje"=> "acceso no autorizado"]);
        //     exit();
        // }
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
              "id_rol"  =>6,
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
    public function lista_universidad(){
        $univerdidade = $this->Empresas_entes_model->obtener_univerdidad();
    
        // otener el id del usuario 
        $id_empresas = $this->session->userdata('id_empresas');
        
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
        $estados = $this->Musuarios->getEstados();
        $datos['estados'] = $estados;
       
        $sectorProductivo= $this->Mprofesion_oficio->SectorProductivo();
        $empresas = $this->Empresas_entes_model->obtener_univerdidad();
       
        $id__exp_lab = strip_tags(trim($this->uri->segment(4)));
        $res = [];
        if (isset($id__exp_lab) and $id__exp_lab != "") {
          $res =  $this->Empresas_entes_model->obtener_representante_universidad($id__exp_lab);
          
        
          
           
         
        }
        
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
    
            $this->form_validation->set_error_delimiters('*', '');
           
            $this->form_validation->set_message('required', 'Debe llenar el campo %s');
    
            if ($this->form_validation->run() === FALSE) {
                $mensaje_error = validation_errors();
            
                echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
    
        }else{
            $data = array(
           
                "id_sector_economico"          => $this->input->post('sector_economico'),
                // "nombre_razon_social"   =>$this->input->post('nombre_razon_social'),
                "rif"=>$this->input->post('rif'),
                "tlf_celular"   =>$this->input->post('tlf_celular'),
                "direccion" => $this->input->post('direccion'),
        
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
        
    
        
              if($this->Empresas_entes_model->update_Universidades($data)){
                $this->Representante_empresas_entes_model->update_representante([
                    "id_empresas_entes" =>trim($this->input->post('id_empresas_entes')),
                     
                      "cedula"   =>$this->input->post('cedula_representante'),
                      "nombre"                =>$this->input->post('nombre_representante'),                                                                                                                                                                                                     
                      "apellidos"             =>$this->input->post('apellidos_representante'),
                      "tlf_celular"           =>$this->input->post('telf_movil_representante'),
                      "tlf_local"             =>$this->input->post('telf_local_representante'),
                      "email"                =>$this->input->post('email_representante'),
                      "cargo "                =>$this->input->post('cargo')
            
                  ]);
                  
        
              }
              echo  json_encode(["resultado" =>true,"mensaje"=> 'registro exitoso, presione OK para continuar']);
              
        }
       
        
    
           
          
    
    
    
    }
}
