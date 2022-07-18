<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        $this->load->library('export_excel');
        $this->load->model('Empresas_entes_model');
        $this->load->model('Estructuras_model');
        $this->load->model('Registro_brigada');
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

	public function empresas_mapa()
	{
        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
      
            $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Reporte Empresas entes"


        ];
    
        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      =>'admin',
            "estados" =>  $estados,
            "breadcrumb"        =>   $breadcrumb,
            "title"             => "Nueva oferta",
            "vista_principal"   => "reportes/rep_empresas_centros",
            "ficheros_js" => [recurso("reportes_js")],
            
     
            "ficheros_css" => [recurso("mapa_mabox_css")]
     
     


        ];

        $this->load->view("main", $output);
        // $this->load->view('layouts/head');
	
	}


    public function exportar_excel_empresas(){

        
        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        

		ini_set('max_execution_time', 2400);
		set_time_limit(2400);
		ini_set('memory_limit', '256M');


        $empresa =$_GET['empresa'];
        $cod_estado =$_GET['cod_estado'];
        $cod_municipio =$_GET['cod_municipio'];
        $cod_parroquia =$_GET['cod_parroquia'];
    
        if($cod_estado=='todos'){
    
            $resultado=   $this->Empresas_entes_model->obtener_empresas($empresa);
    
        }else {
            $resultado=   $this->Empresas_entes_model->obtener_empresas_coord($empresa,$cod_estado,$cod_municipio,$cod_parroquia);
        }

        if($resultado){
            $array = json_decode(json_encode( $resultado ),true);	
            $this->export_excel->to_excel($array, 'Reporte_Empresa_Entes');

        }else{
            echo "No se encontraron datos para exportar";
        }
 


	}


    
    public function exportar_excel_estructuras(){

        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
		ini_set('max_execution_time', 2400);
		set_time_limit(2400);
		ini_set('memory_limit', '256M');


       $id_rol =$_GET['id_rol'];
        $cod_estado =$_GET['cod_estado'];
        $cod_municipio =$_GET['cod_municipio'];
        $cod_parroquia =$_GET['cod_parroquia'];
    
        
 
    if($id_rol == "00"  &&   $cod_estado=='todos'   ){
        $resultado=  $this->Registro_brigada->obtener_todas_brigadas_excel();
    }else {
        $resultado=   $this->Registro_brigada->obtener_brigadas_excel($cod_estado,$cod_municipio,$cod_parroquia,$id_rol);
          }


        if($resultado){
            $array = json_decode(json_encode( $resultado ),true);	
            $this->export_excel->to_excel($array, 'Reporte_Estrucutras');

        }else{
            echo "No se encontraron datos para exportar";
        }
 


	}


    public function etructura_mapa()
	{
        if (!tiene_acceso(['admin','estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

      
            $breadcrumb = (object) [
            "menu" => "Estrucutras",
            "menu_seleccion" => "Reporte Estructuras"


        ];
    
        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      =>'admin',
            "estados" =>  $estados,
            "breadcrumb"        =>   $breadcrumb,
            "roles" =>   $this->Roles_model->obtener_roles('estructura'),
            "title"             => "Nueva oferta",
            "vista_principal"   => "reportes/rep_estructura_centro",
            "ficheros_js" => [recurso("reporte_estruturas_js")],
            
     
            "ficheros_css" => [recurso("mapa_mabox_css")]
     
     


        ];

        $this->load->view("main", $output);
        // $this->load->view('layouts/head');
	
	}
}