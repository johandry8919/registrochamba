<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CofertaUniversidades extends CI_Controller
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
        $this->load->model('Oferta_universida_model');
        $this->load->model('Ofertas_chambistas_model');
        $this->load->model('Estatus_oferta_model');
        $this->load->model('Oferta_empleo_model');

        


        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }


    public function index()
    {


        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
    }

    public function universidad_oferta_admin(){
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        $id_area_formacion = strip_tags(trim($this->uri->segment(3)));
        $ruta = strip_tags(trim($this->uri->segment(1)));
        // $oferta = $this->Oferta_empleo_model->obtener_oferta($id_area_formacion);
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Ver oferta"
        ];
       
        $output = [
            
            "menu_lateral"      =>$ruta,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Universidade  oferta",
            "vista_principal"   => "admin/oferta_universidad",
            "constantes_js" => ["ruta"=>$ruta],
            "areaform"     =>   $this->Musuarios->getAreaForm(),
            
            "librerias_js" => [recurso("admin_nueva_oferta_uner_js"),recurso("admin_nueva_oferta_uner")],
            
            "id_area_formacion" => $id_area_formacion,
           
    
        ];
        $this->load->view("main", $output);
    
    }

    public function crear_oferta(){

        $permitidos = [2,3];        
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

        if ( !$tiene_acceso) {
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
      
        $this->form_validation->set_rules('cantidad', 'cantidad ', 'trim|required|strip_tags|numeric');
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
        "cantidad" =>  $this->input->post('cantidad'),
        "titularidad" =>  $this->input->post('titularidad'),
         "edad" =>  $this->input->post('edad'),
       
      ]);
    // echo json_encode($this->input->post('cantidad'));
    // exit();

      if ($registro) {
    
        echo  json_encode(["resultado" => true, "mensaje" =>  'Registro exitoso']);
     
    }else{
        echo  json_encode(["resultado" => false, "mensaje" => 'Ocurrio un error']);
    }

    }
    public function  editar_oferta(){

        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
    
        $id_oferta = strip_tags(trim($this->uri->segment(3)));
        // echo json_encode($id_oferta);
        // exit();
        $oferta = $this->Oferta_universida_model->obtener_oferta($id_oferta);
        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Ver oferta"
    
    
        ];
      
      $estatus=  $this->Estatus_oferta_model->obtener_estatus_oferta();
        $chambista_ofertas = $this->Ofertas_chambistas_model->obtener_chambista_oferta($id_oferta);
    
        $profesion_oficio = $this->Estructuras_model->profesion_oficio();
    
      
        $output = [
            "menu_lateral"      => "admin",
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Editar  oferta",
            "vista_principal"   => "admin/editar_oferta_uner",
            "estatus"=>$estatus,
            "librerias_js" => [recurso("accordion_js")],
            "oferta" => $oferta,
            "profesion_oficio" => $profesion_oficio,
            "chambista_ofertas" => $chambista_ofertas,
            "id_oferta" => $id_oferta,
            "areaform"     =>   $this->Musuarios->getAreaForm(),
    
            "ficheros_js" => [recurso("editar_oferta_uner_js")],
        
     
     
    
    
        ];
    
        $this->load->view("main", $output);
    
    
    }

    public function listar_oferta_admin(){
        if (!$this->session->userdata('id_rol')) {
            redirect('admin/login');
        }
        $id_rol = $this->session->userdata('id_rol');

          
        $permitidos = array(2,3);        
        $tiene_acceso=in_array(2,$permitidos,false);

        if ( !$tiene_acceso) {
           
            
            json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
          
        }

        $ofertas = $this->Oferta_universida_model->obtener_ofertas();
        $breadcrumb = (object) [
            "menu" => "Admin",
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
public function ver_oferta(){

          
    $permitidos = [2,3];        
    $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);

    if ( !$tiene_acceso) {
        echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
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


   
   $ruta = strip_tags(trim($this->uri->segment(1)));
    $output = [
        "menu_lateral"      =>   $ruta,
        "breadcrumb"        =>   $breadcrumb,
        "title"             => "Oferta de emplo ".$oferta->nombre_razon_social,
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
    
 
 


    ];

    $this->load->view("main", $output);

}


public function update_oferta(){
    $permitidos = [2,3];        
        $tiene_acceso=in_array($this->session->userdata('id_rol'),$permitidos,false);
    if ( !$tiene_acceso) {
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
  
    $this->form_validation->set_rules('cantidad', 'cantidad ', 'trim|required|strip_tags|numeric');
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



}