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
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
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
            
            echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
      

        } 

            $email = strtoupper($this->input->post('email'));
            //encriptamos clave codeigniter

            $password = trim($this->input->post('password'));
            $id_rol=5;
            $resultado = $this->Usuarios_admin_model->validarEmailUsuario($email, $id_rol);
        
     
            if ($resultado) {
          
                if (password_verify($password,$resultado->password) && $resultado->id_rol=5) {

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

    public function index()
    {
        
        $breadcrumb =(object) [
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


    public function nuevaoferta(){
        $estados = $this->Musuarios->getEstados();
        $profesion_oficio= $this->Mprofesion_oficio->getprofesion();
        $areaform = $this->Musuarios->getAreaForm();

        $datos['estados'] = $estados;

        $breadcrumb =(object) [
            "menu" => "Empresas",
            "menu_seleccion" => "Oferta de empleo"
 
                ];
    


     
        $output = [
            "menu_lateral"=>"empresas",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Registro  de empresas",
            "areaform"    => $areaform,
             "vista_principal"   => "empresas/oferta_empleo",
             "profesion_oficio" =>$profesion_oficio,
     
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
}