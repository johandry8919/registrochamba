<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Creportes extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->library('export_excel');
        $this->load->model('Empresas_entes_model');
        $this->load->model('Estructuras_model');
        $this->load->model('Brigadas_estructuras_model');
        $this->load->model('Mreportes');

        ini_set('max_execution_time', 500);
        set_time_limit(1200);
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

    public function empresas_mapa()
    {
        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }

        $breadcrumb = (object) [
            "menu" => "Admin",
            "menu_seleccion" => "Reporte Empresas entes"


        ];

        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      => 'admin',
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


    public function exportar_excel_empresas()
    {


        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        ini_set('max_execution_time', 2400);
        set_time_limit(2400);
        ini_set('memory_limit', '256M');


        $empresa = $_GET['empresa'];
        $cod_estado = $_GET['cod_estado'];
        $cod_municipio = $_GET['cod_municipio'];
        $cod_parroquia = $_GET['cod_parroquia'];

        if ($cod_estado == 'todos') {

            $resultado =   $this->Empresas_entes_model->obtener_empresas($empresa);
        } else {
            $resultado =   $this->Empresas_entes_model->obtener_empresas_coord($empresa, $cod_estado, $cod_municipio, $cod_parroquia);
        }

        if ($resultado) {
            $array = json_decode(json_encode($resultado), true);
            $this->export_excel->to_excel($array, 'Reporte_Empresa_Entes');
        } else {
            echo "No se encontraron datos para exportar";
        }
    }



    public function exportar_excel_estructuras()
    {

        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        ini_set('max_execution_time', 2400);
        set_time_limit(2400);
        ini_set('memory_limit', '256M');


        $id_rol = $_GET['id_rol'];
        $cod_estado = $_GET['cod_estado'];
        $cod_municipio = $_GET['cod_municipio'];
        $cod_parroquia = $_GET['cod_parroquia'];



        if ($id_rol == "00"  &&   $cod_estado == 'todos') {
            $resultado =  $this->Brigadas_estructuras_model->obtener_todas_brigadas_excel();
        } else {
            $resultado =   $this->Brigadas_estructuras_model->obtener_brigadas_excel($cod_estado, $cod_municipio, $cod_parroquia, $id_rol);
        }


        if ($resultado) {
            $array = json_decode(json_encode($resultado), true);
            $this->export_excel->to_excel($array, 'Reporte_Estrucutras');
        } else {
            echo "No se encontraron datos para exportar";
        }
    }


    public function etructura_mapa()
    {
        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        $breadcrumb = (object) [
            "menu" => "Estrucutras",
            "menu_seleccion" => "Reporte Estructuras"


        ];

        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      => 'admin',
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


    public function chambistas()
    {
        if (!tiene_acceso(['admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }


        $breadcrumb = (object) [
            "menu" => "admin",
            "menu_seleccion" => "Reporte Chambista"


        ];




        /* $limit=50;
        $pagina=1300;
         $total_registros= $this->Mreportes->get_total();
         $offset = ($pagina - 1) * $limit;
    $paginas    = ceil( $total_registros / $limit);
    $datos_personales=[];
    for ($x = 1; $x <= $paginas; $x++){
        $offset = ($x - 1) * $limit;
        $datos_personales[]= $this->Mreportes->obtener_chambistas_por_pagina($limit, $offset) ;

    }*/



        $estados = $this->Musuarios->getEstados();

        $output = [
            "menu_lateral"      => 'admin',
            "estados" =>  $estados,
            "breadcrumb"        =>   $breadcrumb,

            "datatable" =>true,
            "title"             => "Nueva oferta",
            "vista_principal"   => "reportes/reporte_chambista",
            "ficheros_js" => [recurso("reporte_chambista_js")],

            "ficheros_css" => [recurso("mapa_mabox_css")]




        ];

        $this->load->view("main", $output);
        // $this->load->view('layouts/head');

    }

    public function  obtener_reporte_chambista()
    {
        if (!tiene_acceso(['admin', 'estructura'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
        //reglas de validación
        $this->form_validation->set_rules('cod_estado', 'estados', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'municipio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'parroquia', 'trim|required|strip_tags');
        $this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('fecha_fin', 'fecha_fin', 'trim|required|strip_tags');
        $this->form_validation->set_error_delimiters('*', '');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
            echo  json_encode(["resultado" => false, "mensaje" => $mensaje_error,"tipo"=>"error de validacion"]);
            exit;
        }


        $estados = $_REQUEST['cod_estado'];
        $municipio = $_REQUEST['cod_municipio'];
        $parroquia = $_REQUEST['cod_parroquia'];
        $fecha_inicio = fecha_to_sql($_REQUEST['fecha_inicio']);
        $fecha_fin = fecha_to_sql($_REQUEST['fecha_fin']);

        $datetime1 = new DateTime($fecha_inicio);
        $datetime2 = new DateTime($fecha_fin);

        # obtenemos la diferencia entre las dos fechas
        $interval = $datetime2->diff($datetime1);

        # obtenemos la diferencia en meses
        $intervalMeses = $interval->format("%m");
        # obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
        $intervalAnos = $interval->format("%y") * 12;

        $diferencia_meses = $intervalMeses + $intervalAnos;

        if ($diferencia_meses > 1) {

            echo  json_encode(["resultado" => false, "mensaje" => 'Solo pude seleccionar maximo un mes']);
            exit;
        }



        $datos_personales = $this->Mreportes->obtener_datos_personales($estados, $municipio, $parroquia, $fecha_inicio, $fecha_fin);

        if ($datos_personales) {

            foreach ($datos_personales as $key => $persona) {

                $formacion =   $this->Mreportes->obtener_formacion_academica_chambista($persona->id_usuario);

                $persona->centro_educ = '';
                $persona->desea_continuar_estudio = '';
                $persona->nivel_academico = '';
                $persona->titulo_carrera = '';
                $persona->estado_instruccion = '';
                $persona->area_formacion = '';
                if ($formacion) {

                    $persona->centro_educ = $formacion->centro_educ;
                    $persona->desea_continuar_estudio = $formacion->desea_continuar_estudio;
                    $persona->nivel_academico = $formacion->nivel_academico;
                    $persona->titulo_carrera = $formacion->titulo_carrera;
                    $persona->estado_instruccion = $formacion->estado_instruccion;
                    $persona->area_formacion = $formacion->nombre;
                }
            }



            $array = json_decode(json_encode( $datos_personales ),true);	
          $excel=$this->export_excel->crear_excel($array, 'Reporte_Estrucutras');



            echo  json_encode([
                "resultado" => true, "mensaje" => 'datos encontrados',
                'res' =>$datos_personales,
                'excel'=> $excel

            ]);
        } else {

            echo  json_encode(["resultado" => false, "mensaje" => 'No se encontraron resultados']);
            exit;
        }
    }

    public function excel_chambistas(){

        if (!tiene_acceso(['admin'])) {
            echo  json_encode(["resultado" => false, "mensaje" => "acceso no autorizado"]);
            exit();
        }
      


        $estados = $_REQUEST['cod_estado'];
        $municipio = $_REQUEST['cod_municipio'];
        $parroquia = $_REQUEST['cod_parroquia'];
        $fecha_inicio = fecha_to_sql($_REQUEST['fecha_inicio']);
        $fecha_fin = fecha_to_sql($_REQUEST['fecha_fin']);

        $datetime1 = new DateTime($fecha_inicio);
        $datetime2 = new DateTime($fecha_fin);

        # obtenemos la diferencia entre las dos fechas
        $interval = $datetime2->diff($datetime1);

        # obtenemos la diferencia en meses
        $intervalMeses = $interval->format("%m");
        # obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
        $intervalAnos = $interval->format("%y") * 12;

        $diferencia_meses = $intervalMeses + $intervalAnos;

        if ($diferencia_meses > 1) {

            echo  json_encode(["resultado" => false, "mensaje" => 'Solo pude seleccionar maximo un mes']);
            exit;
        }



        $datos_personales = $this->Mreportes->obtener_datos_personales($estados, $municipio, $parroquia, $fecha_inicio, $fecha_fin);

        if ($datos_personales) {

            foreach ($datos_personales as $key => $persona) {

                $formacion =   $this->Mreportes->obtener_formacion_academica_chambista($persona->id_usuario);

                $persona->centro_educ = '';
                $persona->desea_continuar_estudio = '';
                $persona->nivel_academico = '';
                $persona->titulo_carrera = '';
                $persona->estado_instruccion = '';
                $persona->area_formacion = '';
                if ($formacion) {

                    $persona->centro_educ = $formacion->centro_educ;
                    $persona->desea_continuar_estudio = $formacion->desea_continuar_estudio;
                    $persona->nivel_academico = $formacion->nivel_academico;
                    $persona->titulo_carrera = $formacion->titulo_carrera;
                    $persona->estado_instruccion = $formacion->estado_instruccion;
                    $persona->area_formacion = $formacion->nombre;
                }
            }



            $array = json_decode(json_encode( $datos_personales ),true);	
          $excel=$this->export_excel->to_excel($array, 'Reporte_Estrucutras');



            echo  json_encode([
                "resultado" => true, "mensaje" => 'datos encontrados',
                'res' =>$datos_personales,
                'excel'=> $excel

            ]);
        } else {

            echo  json_encode(["resultado" => false, "mensaje" => 'No se encontraron resultados']);
            exit;
        }
    }
}
