<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadministrador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->model('Madministrador');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

    public function inicio()
	{
        if (!$this->session->userdata('id_adm')) {
            redirect('adm');
        }
        //$resultado1 = $this->Madministrador->cantidadJovenDataVieja();
        $resultado2 = $this->Madministrador->cantidadJovenDataNueva();
        $resultado3 = $this->Madministrador->cantidadJovenActualizada();
        $resultado4 = $this->Madministrador->cantidadJovenporPorcentajePerfil();
        $resultado5 = $this->Madministrador->genero();
        $resultado6 = $this->Madministrador->empleo();

        //
        $resultado7 = $this->Madministrador->cantidadDatosPersonales();
        $resultado8 = $this->Madministrador->cantidadFormacionAcademica();
        $resultado9 = $this->Madministrador->cantidadRedesSociales();
        $resultado10 = $this->Madministrador->cantidadProductivo();
        $resultado11 = $this->Madministrador->cantidadOrganizativoBrigadas();
        $resultado12 = $this->Madministrador->cantidadVivienda();
        $resultado13 = $this->Madministrador->cantidadExpLaboral();


        //$datos['cantidadusuariosviejo'] = $resultado1;
        $datos['cantidadusuariosnuevo'] = $resultado2;
        $datos['cantidadusuariosactualizado'] = $resultado3;
        $datos['cantidadusuariosporcentajeperfil'] = $resultado4;
        $datos['genero'] = $resultado5;
        $datos['empleo'] = $resultado6;

        $datos['personales'] = $resultado7;
        $datos['Academica'] = $resultado8;
        $datos['redessociales'] = $resultado9;
        $datos['productivo'] = $resultado10;
        $datos['brigadas'] = $resultado11;
        $datos['vivienda'] = $resultado12;
        $datos['explaboral'] = $resultado13;

        $this->load->view('chambistas/administrador/VinicioAdm2',$datos);
	}

    public function VviviendaAdm(){
        if (!$this->session->userdata('id_adm')) {
            redirect('adm');
        }
        $resultado = $this->Madministrador->cantidadVivienda();
        $resultado2 = $this->Madministrador->datosVivienda();


        $datos['vivienda'] = $resultado;
        $datos['datosvivienda'] = $resultado2;
        $this->load->view('chambistas/administrador/VviviendaAdm',$datos);
    }

	public function index()
	{
        if (!$this->session->userdata('id_adm')) {
            redirect('adm');
        }      
        $this->load->view('chambistas/administrador/VinicioAdm2');
	}

	public function VinicioSesion()
	{
        if ($this->session->userdata('id_adm')) {
            redirect('inicioadm');
        }
		$this->load->view('chambistas/administrador/VinicioSesionAdm');
	}

    public function ingresarUsuario() {
        //validaciones
        $this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|valid_email|min_length[3]|max_length[60]|required');
        $this->form_validation->set_rules('password', 'Clave', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        //validaciones
        //delimitadores de errores
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        //delimitadores de errores
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        $this->form_validation->set_message('valid_email', 'El campo %s no posee un email válido');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {

            $this->session->set_flashdata('mensajeerror', 'Inicio de Sesión incorrecto, intente de nuevo.');
            redirect('adm');

        } else {

            $datos['email'] = $this->input->post('email');
            //encriptamos clave codeigniter

            $datos['password'] = $this->input->post('password');

            $resultado = $this->Madministrador->ingresarUsuario($datos);

            if ($resultado) {
            //verificar que el usuario este verificado para poder realizar el ingreso              

                //$desencrytado = $this->encrypt->decode($resultado->password);

                if (password_verify($datos['password'],$resultado->password)) {

                    $s_usuario = array(
                        'id_adm' => $resultado->id_adm,
                        'nombreAdm' => $resultado->nombreAdm,
                        'emailAdm' => $resultado->email,
                        'apellidoAdm' => $resultado->apellidoAdm,
                        'perfilAdm' => $resultado->perfil,
                        'fecha_regAdm' => $resultado->fecha_reg,
                        'activoAdm' => $resultado->activo
                    );

                    $this->session->set_userdata($s_usuario);

                    redirect('inicioadm');


                } else {
                    //mando a la vista de error
                    $this->session->set_flashdata('mensajeerror', 'Email o Clave incorrectas');
                    redirect('adm');
                }
            } else {
                $this->session->set_flashdata('mensajeerror', 'Credenciales incorrectas');
                redirect('adm');
            }
        }
    }    

    public function cerrar_session() {
        $this->session->unset_userdata('id_adm');
        $this->session->unset_userdata('nombreAdm');
        $this->session->unset_userdata('apellidoAdm');
        $this->session->unset_userdata('perfil');
        $this->session->unset_userdata('fecha_reg');
        $this->session->unset_userdata('activo');
        $this->session->unset_userdata('emailAdm');

        redirect("adm");
    }

 


}
