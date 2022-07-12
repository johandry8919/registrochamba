<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
  
        $this->load->model('Usuarios_admin_model');
        $this->load->model('Menu_model');
        $this->load->library('form_validation'); 
    }


    public function index()
    {
        
      
    
        $perfil =isset($_GET['p']) ? 'estructuras' : 'admin';
     
        if(isset($_GET['p'])){
          if($_GET['p'] == "estructuras"){
              $perfil = "estructura";
  
          }else if($_GET['p'] == "admin"){
  
              $perfil = "admin";
  
          }else{
              $perfil = "admin";
          };
        }




       $roles =  $this->Roles_model->obtener_roles($perfil);


       $breadcrumb =(object) [
        "menu" => "Admin",
        "menu_seleccion" => " $perfil"
             ];
 
        $output = [
            "menu_lateral" => "admin",
            "breadcrumb"      =>   $breadcrumb,
            "title"             => "Inicio",
            "vista_principal"   => "admin/roles",
            "roles" =>$roles,
        
            "librerias_js" => [],
             "ficheros_js" => [recurso("roles_js")],
            "ficheros_css" => [],


        ];
        $this->load->view("main", $output);
    }

    public function guardar_menu_rol(){

        $permitidos =  obtener_roles('admin'); 
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

        if ( !$tiene_acceso) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }

        $this->form_validation->set_rules('id_rol', 'id_rol', 'trim|required|strip_tags');  
     //   $this->form_validation->set_rules('array_menu', 'array_menu', 'trim|required');  
        $this->form_validation->set_error_delimiters('*', '');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if (!$this->form_validation->run()) {
        $mensaje_error = validation_errors();
        echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
        exit;
        }



        //Menu_model
        $array_menu = $_POST['array_menu'];
        $id_rol = $_POST['id_rol'];
        $resultado =false;
        foreach($array_menu as $sub_menu){
            $activo = 0;
           if($sub_menu['activo']=='true'){
            $activo = 1;
            }


            $rol_menu_existe =   $this->Menu_model->comprobar_rol_submenu($id_rol,$sub_menu['id_submenu']);
        if( $rol_menu_existe){
          $resultado =  $this->Menu_model->actualizar_rol_submenu($id_rol,$sub_menu['id_submenu'],
            [
                'activo' =>$activo
            ]);

       
        }else{

            $resultado =    $this->Menu_model->regitrar_rol_submenu([
                'id_rol' =>$id_rol,
                'id_submenu' =>$sub_menu['id_submenu'],
                'activo' =>$activo
            ]


            );

        }
          

        
 
        }
      


        if ($resultado ) {

            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
        } else {
            echo  json_encode(["resultado" => false, "mensaje" => 'No se completo el registro']);
        }
    }

//guardar_permiso_rol


public function guardar_permiso_rol(){

    $permitidos =  obtener_roles('admin'); 
    $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

    if ( !$tiene_acceso) {
    echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
    exit();
    }

    $this->form_validation->set_rules('id_rol', 'id_rol', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('guardar_permiso', 'guardar_permiso', 'trim|required|strip_tags');  
    $this->form_validation->set_rules('editar_permiso', 'editar_permiso', 'trim|required|strip_tags');  

 //   $this->form_validation->set_rules('array_menu', 'array_menu', 'trim|required');  
    $this->form_validation->set_error_delimiters('*', '');
    $this->form_validation->set_message('required', 'El campo %s es requerido');
    if (!$this->form_validation->run()) {
    $mensaje_error = validation_errors();
    echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
    exit;
    }



    //Menu_model
    $id_rol = $_POST['id_rol'];
    $editar_permiso = $_POST['editar_permiso'];
    $guardar_permiso = $_POST['guardar_permiso'];
    $vincular_permiso_rol = $_POST['vincular_permiso_rol'];
    $eliminar_permiso = $_POST['eliminar_permiso'];
    $resultado =false;



    $resultado=$this->Roles_model->actualizar_rol($id_rol,[
        'crear'=>  $guardar_permiso,
        'modificar'=>  $editar_permiso,
        'eliminar'=>   $eliminar_permiso,
        'vincular'=> $vincular_permiso_rol 
    ]);

    if ($resultado ) {

        echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
    } else {
        echo  json_encode(["resultado" => false, "mensaje" => 'No se realizo la actualización']);
    }
}

    public function guardar_rol(){

        $permitidos =  obtener_roles('admin'); 
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

        if ( !$tiene_acceso) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
        exit();
        }

        $this->form_validation->set_rules('nombre_rol', 'nombre_rol', 'trim|required|strip_tags');  
     //   $this->form_validation->set_rules('array_menu', 'array_menu', 'trim|required');  
        $this->form_validation->set_error_delimiters('*', '');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if (!$this->form_validation->run()) {
        $mensaje_error = validation_errors();
        echo  json_encode(["resultado" =>false,"mensaje"=> $mensaje_error]);
        exit;
        }



        $nombre_rol = $_POST['nombre_rol'];
  
       
      
        $resultado=$this->Roles_model->post_regitrar([
            'nombre' => $nombre_rol,
            'perfil' =>'admin'
        ]);
      


        if ($resultado ) {

            echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
        } else {
            echo  json_encode(["resultado" => false, "mensaje" => 'No se completo el registro']);
        }
    }


}