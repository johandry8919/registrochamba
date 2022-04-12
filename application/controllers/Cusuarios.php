<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cusuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

	public function index()
	{
        if ($this->session->userdata('id_usuario')) {
            redirect('inicio');
        }        
        // $this->load->view('layouts/head');
		$this->load->view('usuarios/NuevoRegistro');
	}

    public function Vinicio()
    {
        if (!$this->session->userdata('id_usuario')) {
            redirect('iniciosesion');
        }

        
        $personal = $this->Musuarios->getUsuarioRegistradoPersonal();
        $usuario = $this->Musuarios->getUsuario();
        $usuarioexperiencia = $this->Musuarios->getUsuarioRegistradoExperiencia();
        $usuarioacademico = $this->Musuarios->getUsuarioRegistradoAcademico();
        $redessociales = $this->Musuarios->getRedesSociales();

        //
        $usuarioproductivo = $this->Musuarios->getUsuariosProductivo();
        $usuariovivienda = $this->Musuarios->getUsuariosVivienda();
        $usuariobrigada = $this->Musuarios->getBrigadasUsuario();


        $data['personal']= $personal;
        $data['usuario']= $usuario;
        $data['usuarioexperiencia']= $usuarioexperiencia;
        $data['usuarioacademico']= $usuarioacademico;
        $data['redessociales']= $redessociales;
        //
        $data['usuarioproductivo']= $usuarioproductivo;
        $data['usuariovivienda']= $usuariovivienda;
        $data['usuariobrigada']= $usuariobrigada;
        //var_dump($data);exit;
        $data['porcentaje_perfil'] = $this->Musuarios->actualizarPorcentajePerfil();

        if($data['porcentaje_perfil']==0){
            $registroviejo = $this->Mpcj->getUsuarioRegistradoPcjViejo();
            if ($registroviejo) {
                $this->session->set_flashdata('mensaje', 'Usted ya se encontraba registrado previamente por favor complete sus datos para poder ser tomado en cuenta');
            }
        }


        //if($data['porcentaje_perfil']){
            $this->load->view('layouts/head');     
            $this->load->view('chambistas/Vinicio',$data);
        //}
    }

    public function VvalidarCuenta()
    {
        $this->load->view('usuarios/VvalidarCuenta');
    }

	public function VinicioSesion()
	{
        //$this->load->view('layouts/head');
		$this->load->view('usuarios/VinicioSesion');
	}

	public function VrecuperarClave()
	{
        // $this->load->view('layouts/head');
		$this->load->view('usuarios/recuperaClave_N');
	}

    public function VregistroExito()
    {
        $this->load->view('layouts/head');
        $this->load->view('usuarios/VregistroExito');
    }



    public function validarCuenta(){

        if ($this->session->userdata('activo')==0) {

            $this->form_validation->set_rules('codigo', 'Código', 'min_length[25]|max_length[30]|required');

            $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

            $this->form_validation->set_message('required', 'Debe llenar el campo %s');

            if ($this->form_validation->run() === FALSE) {
                $datos['mensaje'] = "Formulario incorrecto";
                $this->load->view('usuarios/VvalidarCuenta', $datos);
            } else {
                $datos['codigo'] = strtoupper($this->input->post('codigo'));
                
                $resultado = $this->Musuarios->validarCuenta($datos);

                if ($resultado) {

                        $s_usuario = array(
                            'activo' => 1,
                        );

                        $this->session->set_userdata($s_usuario);

                        $this->session->set_flashdata('mensaje', 'Cuenta activada correctamente');
                        redirect('Cusuarios/Vinicio');

                }else{
                    $datos['mensaje'] = "Código no coincide con el usuario";
                    $this->load->view('usuarios/VvalidarCuenta', $datos);                

                }
            }
        }else{
            redirect('Cusuarios/VinicioSesion');
        }

    }

    public function recuperarClave(){

        $this->form_validation->set_rules('email', 'Email', 'valid_email|min_length[3]|max_length[60]|required');

        //delimitadores de errores
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        //delimitadores de errores
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        $this->form_validation->set_message('valid_email', 'El campo %s no posee un email válido');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('mensajeerror', 'Formulario incorrecto');
            redirect('registro');
        } else {
            $datos['email'] = strtoupper($this->input->post('email'));
            
            $resultado = $this->Musuarios->consultarJovenEmail($datos);

            if ($resultado) {
                $datos['keypass'] = md5(time());
                $datos['new_pass'] = substr(sha1(time()),0,8);

                $link = base_url()."reiniciarclavelink/" .$datos['keypass']."/".$resultado[0]->cedula;


                if($this->enviarEmailRecuperacion($datos,$resultado,$link)){

                    if($this->Musuarios->agregarKeyPassNewPass($datos,$resultado)){

                    $this->session->set_flashdata('mensajeexito', 'Por favor revise la bandeja de entrada o Spam de su correo para continuar con el proceso de recuperación de contraseña.');
                    redirect('iniciosesion');

                    }else{
                        $this->session->set_flashdata('mensajeerror', 'Ocurrio un error intente de nuevo');
                        redirect('recuperarclave');
                    }

                }else{
                    $this->session->set_flashdata('mensajeerror', 'Error no se pudo enviar el correo, intente de nuevo');
                    redirect('recuperarclave');    
                }
            }else{
                $this->session->set_flashdata('mensajeerror', 'Error el Email no existe en el sistema');
                redirect('recuperarclave');                
            }
        }
    }

    public function enviarEmailRecuperacion($datos,$resultado,$link) {

      /*  $config = array(
           'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'desarrollotestingweb@gmail.com',
            'smtp_pass' => 'pruebas123',
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl', 
            'smtp_timeout' => '7',
            'mailtype' => 'html',
            'wordwrap' => TRUE, 
            'charset' => 'utf-8'
    );*/

    $config = array();
       
        //$config['mailpath']     = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']     = "smtp"; 
        $config['smtp_host']    = "smtp.gmail.com";
        $config['smtp_user']    =  'desarrollotestingweb@gmail.com';
        $config['smtp_pass']    = "pruebas123";
        $config['smtp_port']    =  465;
        $config['smtp_crypto']  = 'ssl';
     
        $config['mailtype']     = "html";
        $config['charset']      = "utf-8";
        $config['newline']      = "\r\n";
        $config['wordwrap']     = TRUE;
        $config['validate']     = FALSE;

    
        //envio de email de verificación
        $asunto = "Chamba Juvenil - Recuperar Contraseña'";

        $mensaje = "<p>El dia <strong>".date('d/m/Y H:i:s')."</strong> se ha generado una Solicitud de cambio de contraseña</p>";
        $mensaje.= "<p> Si no has solicitado esto, has caso omiso a este mensaje, en cambio si deseas modificar tu contraseña debes hacer click en el enlace de abajo</p>";


        $mensaje.= "<table><tr><th> Contraseña nueva generada</th><td>".$datos['new_pass']."</td></tr></table>";

        $mensaje.= "<table><tr><th> Si deseas utilizar la contraseña generada debes presionar </th><td><a href='".$link."'>AQUI</a></td></tr> </table>";

        $mensaje.="<p> <br>Sino a solicitado un cambio de contraseña no necesitas hacer nada.</p>";
        $mensaje.="<p> No debe responder este Correo.</p>";


        $this->email->initialize($config);
        $this->email->from('desarrollotestingweb@gmail.com', 'Chamba Juvenil');
        $this->email->to($datos['email']);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

     /*$this->email->send();
        echo $this->email->print_debugger(); 
        echo "enviado";
         
        exit; */
        if($this->email->send()) {
            return true;        
        } else {
            return false;
        }    

    }    

	public function registro()
	{

        //validaciones
        $this->form_validation->set_rules('nac', 'Nacionalidad', 'trim|strip_tags|trim|required|strip_tags');
        $this->form_validation->set_rules('cedula', 'Cedula', 'trim|strip_tags|trim|required|numeric|min_length[7]|max_length[8]|strip_tags');
        $this->form_validation->set_rules('email', 'Email', 'trim|strip_tags|valid_email|min_length[3]|max_length[60]|required');
        $this->form_validation->set_rules('emailr', 'Repetir Correo', 'trim|strip_tags|valid_email|required|matches[email]');
        $this->form_validation->set_rules('password', 'Clave', 'trim|strip_tags|min_length[6]|max_length[16]|required');
        $this->form_validation->set_rules('passwordr', 'Repetir Clave', 'trim|strip_tags|matches[password]|required');
        //validaciones
        //delimitadores de errores
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
        //delimitadores de errores
        //reglas de validación
        $this->form_validation->set_message('required', 'Debe llenar el campo %s');
        $this->form_validation->set_message('valid_email', 'El campo %s no posee un email válido');
        //reglas de validación


        if ($this->form_validation->run() === FALSE) {
            $mensaje_error = validation_errors();
            $this->session->set_flashdata('mensajeerror', $mensaje_error);

            redirect('registro');
        } else {
            
            $codigo = $this->generarCodigoUnicoUsuario();
            if ($codigo!="") {
                $datos['codigo'] = $codigo;                  
            }else{
                $this->session->set_flashdata('mensajeerror', 'Error al generar código por favor intente de nuevo');
                redirect('registro');
            }
            
            $datos['cedula'] = strtoupper($this->input->post('nac').$this->input->post('cedula'));
            $datos['email'] = strtoupper($this->input->post('email'));

            //encriptacion
            $pass_cifrado = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

            $datos['password'] = $pass_cifrado;
            $datos['activo'] = 0;
            $datos['registro_anterior'] = 0;
            
            if($this->Mpcj->getJovenCedula($datos)){
                $datos['registro_anterior'] = 1;
            }

            	$validacion2 = $this->Musuarios->verificarCedulaRegistroSistema($datos);//verificar si el usuario esta registrado en el sistema por la cedula
            	//var_dump($validacion2);exit;
            	if (!$validacion2) {//si es TRUE esta registrado en el sistema
            		
            		$validacion3 = $this->Musuarios->verificarEmailRegistroSistema($datos);//validar que el email no se encuentre registrado en el sistema

	            	if (!$validacion3) {//si es TRUE el email esta registrado en el sistema
	            		
	            		//$resultado = $this->enviarEmailVerificacion($datos['codigo_verificacion'], $datos['email'], $datos['cedula']);//reponde TRUE si se envio el email
                        $resultado=true;
	            		if ($resultado) {

	            			$resultado2 = $this->Musuarios->registrarUsuario($datos);//metodo para registrar un usuario

	            			if ($resultado2) {

                                $resultado3 = $this->Musuarios->ingresarUsuario($datos);
                                $s_usuario = array(
                                    'id_usuario' => $resultado3->id_usuario,
                                    'cedula' => $resultado3->cedula,
                                    'email' => $resultado3->email,
                                    'activo' => $resultado3->activo,
                                    'fecha_reg' => $resultado3->fecha_reg,
                                    'codigo' => $resultado3->codigo
                                );

                                $this->session->set_userdata($s_usuario);
                                /*if ($this->session->userdata('activo')==0) {
                                    //$this->session->set_flashdata('mensaje', 'Debes completar tus datos para poder realizar una publicación');
                                    //redirect('Cusuarios/VvalidarCuenta');
                                    redirect('inicio');
            
                                }else{
                                    redirect('inicio');
                                } */
                                if($datos['registro_anterior']==1){
                                    $this->session->set_flashdata('mensajeexito', 'Registro Exitoso! Usted ya se habia registrado en nuestro sistema anteriormente, ingresa para completar tu Perfil Chambista');
                                }else{
                                    $this->session->set_flashdata('mensajeexito', 'Registro Exitoso! Ingresa para completar tu Perfil Chambista');
                                }
                                redirect("registroexito");
                                
	            			}else{
                                $this->session->set_flashdata('mensajeerror', 'ERROR no se pudo registrar el usuario intente de nuevo');
								redirect();			
	            			}

	            		}else{
                            $this->session->set_flashdata('mensajeerror', 'ERROR no se pudo enviar el email');
							redirect(); 	            			
	            		}

	            	}else{
                        $this->session->set_flashdata('mensajeerror', 'El Correo ya se encuentra registrada en el sistema intente con otro');
                        redirect(); 
	            	}

            	}else{
                    $this->session->set_flashdata('mensajeerror', 'Su cedula ya se encuentra registrada en el sistema');
                    redirect(); 
            	}

        } 
        
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
            redirect('iniciosesion');

        } else {

            $datos['email'] = strtoupper($this->input->post('email'));
            //encriptamos clave codeigniter

            $datos['password'] = $this->input->post('password');

            $resultado = $this->Musuarios->ingresarUsuario($datos);

            if ($resultado) {
            //verificar que el usuario este verificado para poder realizar el ingreso              

                //$desencrytado = $this->encrypt->decode($resultado->password);



                if (password_verify($datos['password'],$resultado->password)) {

                    $s_usuario = array(
                        'id_usuario' => $resultado->id_usuario,
                        'cedula' => $resultado->cedula,
                        'email' => $resultado->email,
                        'activo' => $resultado->activo,
                        'fecha_reg' => $resultado->fecha_reg,
                        'codigo' => $resultado->codigo
                    );

                    $this->session->set_userdata($s_usuario);
                    //SI ES IGUAAL A CERO MUESTRA VISTA DONDE ACTIVA LA CUENTA A TRAVES DEL CODIGO O PERMITE REENVIAR EMAIL

                    //SINO ENVIA A LA VISTA DE CHAMBA
                    if ($this->session->userdata('activo')==0) {
                        //$this->session->set_flashdata('mensaje', 'Debes completar tus datos para poder realizar una publicación');
                        //redirect('Cusuarios/VvalidarCuenta');
                        redirect('inicio');

                    }else{
                        redirect('inicio');
                    }

                } else {
                    //mando a la vista de error
                    $this->session->set_flashdata('mensajeerror', 'Email o Clave incorrectas');
                    redirect('iniciosesion');
                }
            } else {
                $this->session->set_flashdata('mensajeerror', 'Credenciales incorrectas');
                redirect('iniciosesion');
            }
        }
    }

    public function cerrar_session() {
        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('cedula');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('activo');
        $this->session->unset_userdata('fecha_reg');
        $this->session->unset_userdata('codigo_verificacion');

        redirect("iniciosesion");
    }

    public function enviarEmailVerificacion($codigo_verificacion, $email, $cedula) {

      
                $config = array();
            
            //$config['mailpath']     = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
            $config['protocol']     = "smtp"; 
            $config['smtp_host']    = "smtp.gmail.com";
            $config['smtp_user']    =  'desarrollotestingweb@gmail.com';
            $config['smtp_pass']    = "pruebas123";
            $config['smtp_port']    =  465;
            $config['smtp_crypto']  = 'ssl';
        
            $config['mailtype']     = "html";
            $config['charset']      = "utf-8";
            $config['newline']      = "\r\n";
            $config['wordwrap']     = TRUE;
            $config['validate']     = FALSE;

        //envio de email de verificación
        $asunto = "Activación de cuenta Chamba Juvenil";

        $mensaje = "<h1>Gracias por registrarte en Chamba Juvenil</h1><br>";
        $mensaje.= "<h3>Antes de que activemos tu cuenta un último paso debe tomarse para completar tu registro!<br> 
	        Por favor ten en cuenta que debes completar este último paso para convertirte en usuario registrado.<br> Solo necesitas iniciar sesión y pegar el codigo a continuación para verificar tu cuenta.<br></h3><br>";



        $mensaje.= "<table><tr><th>Código de Verificación</th><td>".$codigo_verificacion."</td></tr></table>";


        $this->email->initialize($config);
        $this->email->from('romel174gl@gmail.com', 'Chamba Juvenil');
        $this->email->to($email);
        $this->email->subject($asunto);
        $this->email->message($mensaje);

	    if($this->email->send()) {
	        return true;        
	    } else {
	        return false;
	    }    

    }



    public function reiniciarclavelink($keypass,$cedula) {

        if (!is_null($keypass) AND !is_null($cedula)) {

            $new_pass = $this->Musuarios->reiniciarClave($keypass,$cedula);

            if ($new_pass) {
                $this->session->set_flashdata('mensajeexito', 'Contraseña cambiada correctamente intente Iniciar Sesión con ella:<h4>'.$new_pass.'</h4>');
                redirect('iniciosesion');
            }else{
                $this->session->set_flashdata('mensajeerror', 'No se pudo reiniciar la contraseña intente nuevamente');
            	redirect('recuperarclave');          	
            }


        }else {
            redirect("Cusuarios");
        }
    }    


    public function cedula_check($cedula) {
        $resultado = $this->Musuarios->verificarCedula($cedula);
        if ($resultado) {
            return FALSE;
        } else {
            return TRUE;
        }
    }    

    public function email_check($email) {
        $resultado = $this->Musuarios->verificarEmail($email);
        if ($resultado) {
            $this->form_validation->set_message('email_check', 'El email ' . $email . ' ya se encuentra registrado');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function generarCodigo($longitud) {
        
        $key = '';
        $pattern = 'B08D08FA975390232334A4DA03B';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++)
            {$key .= $pattern[mt_rand(0, $max)];}
        return $key;

    }

    public function generarCodigoUnicoUsuario(){
        $aux = true;
        while ($aux) {
            $codigo = $this->generarCodigo(30);
            if($this->Musuarios->verificarCodigoUsuario($codigo)){
                $aux = false;
            }
        }
        return $codigo;        
    }    


}
