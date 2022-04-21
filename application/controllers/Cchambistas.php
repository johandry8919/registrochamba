<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Qrcode\QRcode;

class Cchambistas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->library('ciqrcode');
        $this->load->model('Mprofesion_oficio');
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
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

    public function pdf()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $personal = $this->Musuarios->getUsuarioRegistradoPersonal();
        $usuario = $this->Musuarios->getUsuario();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();
        $res = $this->Musuarios->getRedesSociales();
        $imgqr = $this->qr();

        $data['imgqr'] = $imgqr;

        $data['personal'] = $personal;
        $data['usuario'] = $usuario;
        $data['usuarioexperiencia'] = $usuarioexperiencia;
        $data['usuarioacademico'] = $usuarioacademico;
        $data['redesusuario'] = $res;
        $html = $this->load->view('pdf_exports/genera_pdf_muestra', $data, TRUE);
        // Cargamos la librería
        //$this->load->library('pdfgenerator');
        // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $this->generate($html, $usuario->cedula);
    }

    public function vpdf()
    {
        $personal = $this->Musuarios->getUsuarioRegistradoPersonal();
        $usuario = $this->Musuarios->getUsuario();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();

        $data['personal'] = $personal;
        $data['usuario'] = $usuario;
        $data['usuarioexperiencia'] = $usuarioexperiencia;
        $data['usuarioacademico'] = $usuarioacademico;


        $this->load->view('pdf_exports/genera_pdf_muestra', $data);
    }

    public function qr()
    {
        if ($this->session->userdata('id_usuario')) {
            //hacemos configuraciones
            $params['data'] = base_url()."consulta/".$this->session->userdata('codigo');
            $params['level'] = 'L';
            $params['size'] = 5;
            /*L = Baja
            M = Mediana
            Q = Alta
            H= Máxima */
            $params['savename'] = FCPATH . "qr_code/".$this->session->userdata('cedula')."_".$this->session->userdata('codigo').".png";
            //generamos el código qr
            $this->ciqrcode->generate($params);

            $data['img'] = $this->session->userdata('cedula')."_".$this->session->userdata('codigo').".png";
            return $data['img'];
        }
    }

    public function consulta($codigo) {

        if (!is_null($codigo)) {

            $personal = $this->Musuarios->getUsuarioRegistradoPersonalConsulta($codigo);
            $usuario = $this->Musuarios->getUsuarioConsulta($codigo);
            $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperienciaConsulta($codigo);
            $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademicoConsulta($codigo);
            $res = $this->Musuarios->getRedesSocialesConsulta($codigo);


            $data['personal'] = $personal;
            $data['usuario'] = $usuario;
            $data['usuarioexperiencia'] = $usuarioexperiencia;
            $data['usuarioacademico'] = $usuarioacademico;
            $data['redesusuario'] = $res;

                $this->load->view('chambistas/Vconsulta', $data);


        }else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
            redirect('inicio');
        }
    }      

    public function index()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        redirect('inicio');
    }

    public function VcambiarClave()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $this->load->view('layouts/head');
        $this->load->view('chambistas/VcambiarClave');
    }

    public function Vviviendajoven()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $res = $this->Musuarios->getUsuariosVivienda();
        $data['viviendajoven'] = $res;
        $output = [
            "title"             => "Viviendajoven",
             "vista_principal"   => "chambistas/Viviendajoven",
             "viviendajoven" => $res,
           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")]


        ];

        $this->load->view("main", $output);
    }


    public function eliminarexp()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $id_exp_lab = strip_tags(trim($this->uri->segment(2)));

        if ($this->Musuarios->eliminarexp($id_exp_lab)) {
            $this->Musuarios->actualizarPorcentajePerfil();
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa!');
            redirect('experiencialaboral');
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('experiencialaboral');
        }
    }

    public function eliminarchamba()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $id_chamba = strip_tags(trim($this->uri->segment(2)));

        if ($this->Musuarios->eliminarchamba($id_chamba)) {
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa!');
            redirect('inicio');
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('productivo');
        }
    }

    public function eliminarbrigada()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $id_brigada = strip_tags(trim($this->uri->segment(2)));

        if ($this->Musuarios->eliminarbrigada($id_brigada)) {
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa!');
            redirect('inicio');
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('brigadas');
        }
    }

    public function eliminarvivienda()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $vivienda = strip_tags(trim($this->uri->segment(2)));

        if ($this->Musuarios->eliminarVivienda($vivienda)) {
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa!');
            redirect('inicio');
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('viviendajoven');
        }
    }

    public function eliminaracademico()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $id_usu_aca = strip_tags(trim($this->uri->segment(2)));

        if ($this->Musuarios->eliminaracademico($id_usu_aca)) {
            $this->Musuarios->actualizarPorcentajePerfil();
            $this->session->set_flashdata('mensajeexito', 'Operación Exitosa!');
            redirect('formacionacademica');
        } else {
            $this->session->set_flashdata('mensajeerror', 'Ocurrió un error intente de nuevo!');
            redirect('formacionacademica');
        }
    }

    public function Vdatospersonales()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }


        $estados = $this->Musuarios->getEstados();
        $aborigenes = $this->Musuarios->getAborigenes();
        $datos['estados'] = $estados;
        $datos['aborigenes'] = $aborigenes;



        //if($registroviejo){
        $registronuevo = $this->Musuarios->getUsuarioRegistradoPersonal();
        if ($registronuevo) {
            //$this->session->set_flashdata('mensaje', 'Datos Personales');                    
            $datos['registroviejo'] = $registronuevo;
        } else {
            $registroviejo = $this->Mpcj->getUsuarioRegistradoPcjViejo();
            $datos['registroviejo'] = $registroviejo;
            if ($registroviejo) {
                $this->session->set_flashdata('mensaje', 'Usted ya se encontraba registrado previamente por favor complete sus datos para poder ser tomado en cuenta');
            }
        }
        //}

        $profesiones= $this->Mprofesion_oficio->getprofesion();

    
 

        //$this->load->view('layouts/head');
        //$this->load->view('chambistas/Vdatospersonales', $datos);
     $breadcrumb =(object) [
                "menu" => "Registro y actualizacion",
                "menu_seleccion" => "Datos Personales"
     
                    ];
        
                  
        $output = [
            "title"            => "Datos personales",
             "vista_principal" => "chambistas/datos_personales",
             "breadcrumb"      =>   $breadcrumb,
             "estados"         => $estados,
             "aborigenes"      => $aborigenes,
             "registroviejo"   =>  $datos['registroviejo'],
             "profesion_oficio" =>    $profesiones,
            
            
             "librerias_css" => [recurso("mapbox_css")],

          
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"),
            recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js"),
            recurso("mapbox_js"), recurso("mapa_mabox_js"),
        ],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")],
           "ficheros_css" => [recurso("mapa_mabox_css")],

           

        ];

        $this->load->view("main", $output);
    }

    public function Vredessociales()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $res = $this->Musuarios->getRedesSociales();
        $data['redesusuario'] = $res;
        //var_dump($data['redesusuario']);exit;

        $this->load->view('layouts/head');
        $this->load->view('chambistas/Vredessociales', $data);
    }

    public function Vbrigadas()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $res = $this->Musuarios->getBrigadasUsuario();
        $data['brigadas'] = $res;

        $output = [
            "title"            => "brigadas",
             "vista_principal" => "chambistas/brigadas",
             "brigadas"        => $data['brigadas'] = $res,



        ];
         $this->load->view("main", $output);
    }

    public function Vproductivo()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $res = $this->Musuarios->getUsuariosProductivo();
        $data['usuarioproductivo'] = $res;
        //var_dump($data['redesusuario']);exit;

        // $this->load->view('layouts/head');
        // $this->load->view('chambistas/Vproductivo', $data);

        $output = [
            "title"            => "productivo",
             "vista_principal" => "chambistas/productivo",
             "usuarioproductivo"        => $data['usuarioproductivo'],
             


        ];
         $this->load->view("main", $output);
    }
    public function Vinsercion()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        /*         $res = $this->Musuarios->getRedesSociales();
        $data['redesusuario'] = $res; */
        //var_dump($data['redesusuario']);exit;

        $this->load->view('layouts/head');
        $this->load->view('chambistas/Vinsercion');
    }

    public function Vcv()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $personal = $this->Musuarios->getUsuarioRegistradoPersonal();
        $usuario = $this->Musuarios->getUsuario();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();
        $redessociales = $this->Musuarios->getRedesSociales();

        $data['personal'] = $personal;
        $data['usuario'] = $usuario;
        $data['usuarioexperiencia'] = $usuarioexperiencia;
        $data['usuarioacademico'] = $usuarioacademico;
        $data['redessociales'] = $redessociales;

        $this->load->view('layouts/head');
        $this->load->view('chambistas/Vcv', $data);
    }

    public function registrobrigadas()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $this->form_validation->set_rules('id_brigada', 'Tipo Brigada', 'trim|required|strip_tags');


        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('brigadas');
        } else {
            $data = array(

                //Chamba Vuelta al Campo
                'id_brigada' => $this->input->post('id_brigada'),
                'codigo' => $this->session->userdata('codigo'),
              'id_usuario' => $this->session->userdata('id_usuario')

                
            );
            print_r($data);

            if (!$this->Musuarios->getBrigadasUsuario($data)) {

                if ($this->Musuarios->registrobrigadas($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('brigadas');
                }
            } else {

                $data = array(
                    'id_brigada' => $this->input->post('id_brigada'),
                    'codigo' => $this->session->userdata('codigo'),
           
                );
                $this->Musuarios->udapteUsuariosbrigadas($data);
                $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
            }
        }
    }

    public function registrovivienda()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $this->form_validation->set_rules('vivienda', 'Vivienda', 'trim|required|strip_tags');


        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('viviendajoven');
        } else {
            $data = array(
                'vivienda' => $this->input->post('vivienda'),
                'codigo' => $this->session->userdata('codigo'),
                'id_usuario' => $this->session->userdata('id_usuario')
            );

            if (!$this->Musuarios->getUsuariosVivienda($data)) {

                if ($this->Musuarios->registroVivienda($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('viviendajoven');
                }

                //actuaiza
            } else {

                $data = array(
                    'vivienda' => $this->input->post('vivienda'),
                    'codigo' => $this->session->userdata('codigo'),
           
                );
                $this->Musuarios->udapteUsuariosVivienda($data);
                $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
            }
        }
    }


    public function registroproductivo()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

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

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('productivo');
        } else {
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

                'codigo' => $this->session->userdata('codigo'),
                'id_usuario' => $this->session->userdata('id_usuario')
            );

            if (!$this->Musuarios->getUsuariosProductivo($data)) {

                if ($this->Musuarios->registroproductivo($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('productivo');
                }
            } else {
                $this->session->set_flashdata('mensajeerror', 'Solo puedes registrar una opción, puedes eliminarla y crear una nueva');
                redirect('productivo');
            }
        }
    }

    public function redessociales()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $this->form_validation->set_rules('instagram', 'Instagram', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|min_length[2]|strip_tags');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim|min_length[2]|strip_tags');

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación

        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('redessociales');
        } else {

            $data = array(
                'instagram' => $this->input->post('instagram'),
                'facebook' => $this->input->post('facebook'),
                'twitter' => $this->input->post('twitter'),
                'codigo' => $this->session->userdata('codigo'),
                'id_usuario' => $this->session->userdata('id_usuario')
            );

            if (!$this->Musuarios->getRedesSociales()) {

                if ($this->Musuarios->insertRedesSociales($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('redessociales');
                }
            } else {
                if($data['instagram']=="" and $data['facebook']=="" and $data['twitter']==""){
                    if ($this->Musuarios->deleteRedesSociales()) {
                        $this->session->set_flashdata('mensajeexito', 'Datos actualizados correctamente.');
                        redirect('inicio');
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error actualizando intente de nuevo.');
                        redirect('redessociales');
                    }
                }else{
                    if ($this->Musuarios->UpdateRedesSociales($data)) {
                        $this->session->set_flashdata('mensajeexito', 'Datos actualizados correctamente.');
                        redirect('inicio');
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error actualizando intente de nuevo.');
                        redirect('redessociales');
                    }
                }
            

            }
        }
    }


    public function datospersonales()
    {

        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|strip_tags');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cod_estado', 'Estado', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('cod_municipio', 'Municipio', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('cod_parroquia', 'Parroquia', 'trim|numeric|required|strip_tags');
        $this->form_validation->set_rules('telf_movil', 'Movil', 'trim|min_length[11]|max_length[11]|numeric|required|strip_tags');
        $this->form_validation->set_rules('telf_local', 'Local', 'trim|min_length[11]|max_length[11]|numeric|required|strip_tags');
        /* $this->form_validation->set_rules('correo', 'Correo', 'trim|required|valid_email|strip_tags'); */
        /*         $this->form_validation->set_rules('cedula', 'Cédula', 'trim|min_length[7]|max_length[8]|strip_tags');
        $this->form_validation->set_rules('nac', 'Nacionalidad', 'trim|max_length[1]|required|strip_tags'); */
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

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('datospersonales');
        } else {


            $data = array(
                'nombres' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                /*'nac' => $this->input->post('nac'), 
            'cedula' => $this->input->post('cedula'), */
                'datepicker' => $this->input->post('datepicker'),/* 
			'correo' => $this->input->post('correo'), */
                'telf_movil' => $this->input->post('telf_movil'),
                'telf_local' => $this->input->post('telf_local'),
                'cod_estado' => $this->input->post('cod_estado'),
                'cod_municipio' => $this->input->post('cod_municipio'),
                'cod_parroquia' => $this->input->post('cod_parroquia'),
                'direccion' => $this->input->post('direccion'),
                'estudio' => $this->input->post('estudio'),
                'empleo' => $this->input->post('empleo'),
                /* 			'instruccion' => $this->input->post('instruccion'),
			'estado_inst' => $this->input->post('estado_inst'), */
                /* 			'organizacion' => $this->input->post('organizacion'),
			'profesion' => $this->input->post('profesion'), */
                'cne' => $this->input->post('cne'),
                'genero' => $this->input->post('genero'),
                'estcivil' => $this->input->post('estcivil'),
                'aborigen' => $this->input->post('aborigen'),
                'hijo' => $this->input->post('hijo'),
                'id_profesion_oficio' => $this->input->post('id_profesion'),
                'edad' => $this->input->post('edad'),
                /* 			'id_productiva' => $this->input->post('productiva'),
			'id_subproductiva' => $this->input->post('id_subact_productiva'),
			'sembrar' => $this->input->post('sembrar'),
			'financiamiento' => $this->input->post('financiamiento'),						
			'produccion' => $this->input->post('produccion'),
			'recibido_financiamiento' => $this->input->post('recibido_financiamiento'),
			'tipo_institucion' => $this->input->post('tipo_institucion'),
			'nombre_inst' => $this->input->post('nombre_inst') */
            );

            if (!$this->Musuarios->getUsuarioRegistradoPersonal()) {

                if ($this->Musuarios->registrarPersonales($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('datospersonales');
                }
            } else {
                if ($this->Musuarios->actualizarPersonales($data)) {
                    $this->session->set_flashdata('mensajeexito', 'Datos actualizados correctamente.');
                    redirect('inicio');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error actualizando intente de nuevo.');
                    redirect('datospersonales');
                }
            }
        }
    }

    public function Vexperiencialaboral()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();

        $data['usuarioexperiencia'] = $usuarioexperiencia;


        // $this->load->view('layouts/head');
        // $this->load->view('chambistas/Vexperiencialaboral', $data);
        $output = [
            "title"            => "experiencialaboral",
             "vista_principal" => "chambistas/experiencialaboral",
             "usuarioexperiencia"        => $data['usuarioexperiencia'],
             


        ];
         $this->load->view("main", $output);
    }

    public function Vexperiencialaboral_form()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $data = [];
        $id__exp_lab = strip_tags(trim($this->uri->segment(2)));
        if (isset($id__exp_lab) and $id__exp_lab != "") {
            $res = $this->Musuarios->getExpLaboralID($id__exp_lab);
            $data['expusuario'] = $res;
        }
        // var_dump($data['expusuario']);exit;

        // $this->load->view('layouts/head');
        // $this->load->view('chambistas/Vexperiencialaboral_form', $data);
        
        $output = [
            "title"            => "experiencialaboral",
             "vista_principal" => "chambistas/experiencialaboralform",
             "expusuario"        =>$data,
             


        ];
         $this->load->view("main", $output);
    }


    public function Vformacionacademica()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();

        // $data['usuarioacademico'] = $usuarioacademico;


        // $this->load->view('layouts/head');
        // $this->load->view('chambistas/Vformacionacademica', $data);
        $output = [
            "title"            => "formacionacademica",
             "vista_principal" => "chambistas/formacionacademica",
             "usuarioacademico"      =>  $usuarioacademico,
             
            


          
           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"), recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js")],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")]


        ];

        $this->load->view("main", $output);
    }

    public function Vformacionacademica_form()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        $data = [];
        $id_usu_aca = strip_tags(trim($this->uri->segment(2)));
        if (isset($id_usu_aca) and $id_usu_aca != "") {
            $res = $this->Musuarios->getAcademicaID($id_usu_aca);
            $data['acausuario'] = $res;
        }
        $res2 = $this->Musuarios->getAreaForm();
        $data['areaform'] = $res2;
        //var_dump($data['acausuario']);exit;

        // $this->load->view('layouts/head');
        // $this->load->view('chambistas/Vformacionacademica_form', $data);

        $output = [
            "title"            => "formacionacademicaform",
             "vista_principal" => "chambistas/formacionacademicaform",
             "areaform"      => $data['areaform'] = $res2,

           "librerias_js" => [recurso("moment_js"),recurso("bootstrap-material-datetimepicker_js"), recurso("bootstrap-datepicker_js"),recurso("bootstrap-select_js")],


           "ficheros_js" => [recurso("datospersonales_js"), recurso("validacion_datospersonales_js")]


        ];

        $this->load->view("main", $output);
    }


    public function registroexperiencialaboral()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        

        $this->form_validation->set_rules('empresa', 'Empresa', 'trim|required|strip_tags');
        $this->form_validation->set_rules('cargo', 'Cargo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('area', 'Area', 'trim|required|strip_tags');
        $this->form_validation->set_rules('funciones', 'Funciones', 'trim|required|strip_tags');
        $this->form_validation->set_rules('rango_fecha', 'Periodo inicio', 'trim|required|strip_tags');

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('experiencialaboral');
        } else {

            $data = array(
                'empresa' => $this->input->post('empresa'),
                'cargo' => $this->input->post('cargo'),
                'area' => $this->input->post('area'),
                'funciones' => $this->input->post('funciones'),
                'rango_fecha' => $this->input->post('rango_fecha'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'codigo' => $this->session->userdata('codigo'),
                'activo' => 1
            );

            $id__exp_lab = $this->input->post('id__exp_lab');
            if (isset($id__exp_lab) and $id__exp_lab != "") {
                //actualizar
                $data['id__exp_lab'] = $id__exp_lab;
                if ($this->Musuarios->actualizarExperiencia($data)) {
                    $this->Musuarios->actualizarPorcentajePerfil();
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('experiencialaboral');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('experiencialaboral');
                }
            } else {
                //registrar
                if($this->Musuarios->getExpLab()){//retorna true si hay opciones menor a 5 agregada x usuario
                    if ($this->Musuarios->registrarExperiencia($data)) {
                        $this->Musuarios->actualizarPorcentajePerfil();
                        $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                        redirect('experiencialaboral');
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                        redirect('experiencialaboral');
                    }
                }else{
                    $this->session->set_flashdata('mensajeerror', 'Ya agregaste 5 veces la información.');
                    redirect('experiencialaboral');                    
                }
            }
        }
    }

    public function registroformacionacademica()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }


        $this->form_validation->set_rules('id_area_form', 'Área Formación', 'trim|required|strip_tags');
        $this->form_validation->set_rules('titulo_carrera', 'Título Carrera', 'trim|required|strip_tags');
        $this->form_validation->set_rules('rango_fecha', 'Rango Fecha', 'trim|required|strip_tags');
        $this->form_validation->set_rules('centro_educ', 'Centro educativo', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_instruccion', 'Nivel estudio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('id_estado_inst', 'Estado estudio', 'trim|required|strip_tags');
        /*         $this->form_validation->set_rules('start', 'Periodo inicio', 'trim|required|strip_tags');
        $this->form_validation->set_rules('end', 'Periodo inicio', 'trim|required|strip_tags'); */

        $this->form_validation->set_error_delimiters('<p class="red">', '</p>');
        //delimitadores de errores

        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {

            $mensaje_error = validation_errors();
            $datos['mensajeerror'] = $mensaje_error;

            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('formacionacademica');
        } else {

            $data = array(
                'centro_educ' => $this->input->post('centro_educ'),
                'id_instruccion' => $this->input->post('id_instruccion'),
                'id_estado_inst' => $this->input->post('id_estado_inst'),
                'id_area_form' => $this->input->post('id_area_form'),
                'titulo_carrera' => $this->input->post('titulo_carrera'),
                'rango_fecha' => $this->input->post('rango_fecha'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'codigo' => $this->session->userdata('codigo'),
                'activo' => 1
            );

            $id_usu_aca = $this->input->post('id_usu_aca');

            if (isset($id_usu_aca) and $id_usu_aca != "") {
                //actualizar
                $data['id_usu_aca'] = $id_usu_aca;
                if ($this->Musuarios->actualizarAcademico($data)) {
                    $this->Musuarios->actualizarPorcentajePerfil();
                    $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                    redirect('formacionacademica');
                } else {
                    $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                    redirect('formacionacademica');
                }
            } else {
                //registrar
                if($this->Musuarios->getAcademico()){//retorna true si hay opciones menor a 5 agregada x usuario
                    if ($this->Musuarios->registrarAcademico($data)) {
                        $this->Musuarios->actualizarPorcentajePerfil();
                        $this->session->set_flashdata('mensajeexito', 'Datos guardados correctamente.');
                        redirect('formacionacademica');
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error guardando intente de nuevo.');
                        redirect('formacionacademica');
                    }
                }else{
                    $this->session->set_flashdata('mensajeerror', 'Ya agregaste 5 veces la información.');
                    redirect('formacionacademica');                    
                }

            }
        }
    }

    public function getMunicipios()
    {
        sleep(rand(1,4));
        $data = array(
            'codigoestado' => $this->input->post('codigoestado'),
        );

        $municipios = $this->Musuarios->getMunicipios($data);

        $html1 = '<option value="">Seleccione un municipio</option>';
        for ($i = 0; $i < count($municipios, 0); $i++) {
            $html1 .= "<option value=" . $municipios[$i]->codigomunicipio . ">" . ucwords(mb_strtolower($municipios[$i]->nombre)) . "</option>";
        }
        $respuesta1 = array("htmloption1" => $html1);
        echo json_encode($respuesta1);
    }

    public function getParroquias()
    {
	sleep(rand(1,4));
        $data = array(
            'codigoestado' => $this->input->post('codigoestado'),
            'codigomunicipio' => $this->input->post('codigomunicipio'),
        );

        $parroquias = $this->Musuarios->getParroquias($data);

        $html2 = '<option value="">Seleccione una parroquia</option>';
        for ($i = 0; $i < count($parroquias, 0); $i++) {
            $html2 .= "<option value=" . $parroquias[$i]->codigoparroquia . ">" . ucwords(mb_strtolower($parroquias[$i]->nombre)) . "</option>";
        }
        $respuesta2 = array("htmloption2" => $html2);
        echo json_encode($respuesta2);
    }

    public function cambiarClave()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }
        $this->form_validation->set_rules('clave_actual', 'Contraseña actual', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        $this->form_validation->set_rules('password', 'Contraseña nueva', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        $this->form_validation->set_rules('new_password', 'Repetir Contraseña nueva', 'trim|strip_tags|matches[password]|required');

        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

        $this->form_validation->set_message('required', 'Debe llenar el campo %s');

        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
            $this->session->set_flashdata('mensajeerror', $mensaje_error);
            redirect('cambiarclave');
        } else {

            $datos['clave_actual'] = $this->input->post('clave_actual');
            $datos['password'] = $this->input->post('password');
            $datos['new_password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);

            $resultado = $this->Musuarios->consultarJovenSession($datos);

            if ($resultado) {

                if (password_verify($datos['clave_actual'], $resultado[0]->password)) {


                    $resultado = $this->Musuarios->cambiarPasswordJoven($datos);

                    if ($resultado) {

                        $this->session->set_flashdata('mensajeexito', 'Contraseña cambiada correctamente');
                        redirect('cambiarclave');
                    } else {
                        $this->session->set_flashdata('mensajeerror', 'Error no se pudo cambiar la contraseña');
                        redirect('cambiarclave');
                    }
                } else {

                    $this->session->set_flashdata('mensajeerror', 'Contraseña actual no coincide');
                    redirect('cambiarclave');
                }
            } else {
                $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
                redirect('cambiarclave');
            }
        }
    }
}
