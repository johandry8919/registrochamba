<?php
	
	function existen_posiciones_array ($array, $posiciones_array) {
		
		$todos_existen = true;
		
		foreach ($posiciones_array as $posicion) {
			
			if (!isset($array[$posicion])) $todos_existen = false;
			
		}
		
		return $todos_existen;
		
	}
	
	function comprobar_propiedades_objeto ($objeto, $propiedades) {
		
		$correcto = true;
		
		// Recorremos las propiedades que debe de tener
		foreach ($propiedades as $propiedad) {
			
			// Si no tiene una de las propiedades, lo marcamos como incorrecto
			if ( ! property_exists($objeto, $propiedad)) $correcto = false;
			
		}
		
		return $correcto;
		
	}
	
	function respuesta_json ($respuesta) {
		
		header('Content-Type: application/json');
		echo json_encode($respuesta);
		
	}
	
	function redireccion ($url) {
		
		header("Location: ".$url);
		die;
		
	}

	function error_404 () {

		echo "404"; die;

	}
	
	function recurso ($nombre_recurso) {
		
		$ci = & get_instance();
		
		$recursos = $ci->config->item("recursos");

		if (isset($recursos[$nombre_recurso])) $recurso = $recursos[$nombre_recurso];
		else $recurso = "";

		return $recurso;
		
	}

	function oberner_menu() {
		
		$ci = & get_instance();
		
		if (!$ci->session->userdata('id_rol')) {
            redirect('admin/login');
        }
		$id_rol= $ci->session->userdata('id_rol');
		$menus = $ci->Menu_model->obtener_menu($id_rol);
		$array_menu=[];
		foreach ($menus as $menu){
			$menu->sub_menu=$ci->Menu_model->obtener_sub_menu($menu->id_menu,$id_rol);
	

		
		}


		return $menus;
		
	}
function ruta_actual(){
	$ci = & get_instance();
	$ruta = strip_tags(trim($ci->uri->segment(1)));

	return $ruta;
}

function codigo_brigada_estructura(){
	$ci = & get_instance();
	$id_brigada=$ci->Brigadas_estructuras_model->obtener_id_brigada();
     return date("dmYs").'-'. $id_brigada;     
}
 function tiene_acceso($perfil){


	     //verificar acceso
		 $ci = & get_instance();
		 $permitidos =  obtener_roles($perfil); 

		 $tiene_acceso=in_array($ci->session->userdata('id_rol'),$permitidos,false);
	 return 	 $tiene_acceso;

		 
 }


function tiene_permiso($nombre_permiso){
	$ci = & get_instance();
	return $ci->session->userdata($nombre_permiso);
}

	function obtener_roles($perfil) {
		
		$ci = & get_instance();
		$roles=[];

		if(is_array($perfil)){

			

			foreach($perfil as $p){

				if(is_string($p)){
									
			
				$roles=array_merge($roles,$ci->Roles_model->obtener_roles($p));
					

				}else{
					$roles[]=(object)["id_rol"=>$p];
				}
				


			}


		}else{

			$roles =  $ci->Roles_model->obtener_roles($perfil);

		}

	
	
	
		$array_rol=[];
		foreach ($roles as $rol){
		 $array_rol[]=$rol->id_rol;
 
		}
 
	


		return $array_rol;
		
	}
	
	function obtener_configuracion ($nombre_configuracion) {
		
		$ci = & get_instance();
		
		$configuraciones = $ci->config->item("configuracion");

		if (isset($configuraciones[$nombre_configuracion])) $configuracion = $configuraciones[$nombre_configuracion];
		else $configuracion = false;

		return $configuracion;
		
	}
	
	function generar_uuid (){
		
		$uuid = sprintf('%04X%04X-%04X-%04X-%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
		
		$uuid = strtolower($uuid);

		return $uuid;
		
	}

	function now ($hours=true) {

		// Obtenemos la fecha, dependiendo si es con horas o sin ellas
		if ($hours) $now = date("Y-m-d H:i:s");
		else $now = date("Y-m-d");

		return $now;

	}
	
	function fecha_bonita ($fecha_sql, $con_horas=true) {
		
		// Obtenemos el dia de hoy y el de ayer
		$hoy = date("Y-m-d");
		$ayer = date("Y-m-d", strtotime("-1 days"));
		
		// Obtenemos el dia de la fecha
		$dia = date("Y-m-d", strtotime($fecha_sql));
		
		// Si el dia es hoy
		if ($dia == $hoy) $dia_string = "Hoy";
		
		// Si el dia es ayer
		elseif ($dia == $ayer)  $dia_string = "Ayer";
		
		// Si es cualquier otro dia
		else $dia_string = date("d/m/Y", strtotime($fecha_sql));

		// Si hay que añadir las horas
		if ($con_horas) {
		
			// Obtenemos la hora
			$hora_string = date("H:i", strtotime($fecha_sql));
			
			// Construimos la fecha
			$fecha_string = $dia_string . " a las ". $hora_string;

		}
		// Si no hay que añadir las horas
		else $fecha_string = $dia_string;
		
		return $fecha_string;
		
	} 

	function fecha_to_sql ($fecha_europea, $con_horas=true) {
		
		$fecha_europea = str_replace("/", "-", $fecha_europea);
		
		if ($con_horas) {
	
			$fecha_sql = date("Y-m-d H:i:s", strtotime($fecha_europea));

		}
		else {

			$fecha_sql = date("Y-m-d", strtotime($fecha_europea));

		}
		
		return $fecha_sql;

	}
	
	function fecha_europea ($fecha_sql) {

		// Por defecto
		$fecha_europea = $fecha_sql;
	
		// Obtenemos el valor time de la fecha SQL, para transformar la fecha
		$time_fecha_sql = strtotime($fecha_sql);
	
		// Si es fecha solo
		if (preg_match("/^(\d){4}(\-)(\d){2}(\-)(\d){2}$/", $fecha_sql)) {
	
			// Obtenemos la nueva fecha
			$fecha_europea = date("d/m/Y", $time_fecha_sql);
	
		}
	
		// Si es fecha y hora (con segundos)
		elseif (preg_match("/^(\d){4}(\-)(\d){2}(\-)(\d){2}(\s)(\d){2}(\:)(\d){2}(\:)(\d){2}$/", $fecha_sql)) {
	
			// Obtenemos la nueva fecha 
			$fecha_europea = date("d/m/Y H:i:s", $time_fecha_sql);
	
		}
	
		// Si es fecha y hora (sin segundos)
		elseif (preg_match("/^(\d){4}(\-)(\d){2}(\-)(\d){2}(\s)(\d){2}(\:)(\d){2}$/", $fecha_sql)) {
	
			// Obtenemos la nueva fecha 
			$fecha_europea = date("d/m/Y H:i", $time_fecha_sql);
	
		}
	
		return $fecha_europea;
	
	}

	function fecha_dias_ha ($fecha_sql) {
		
		// Obtenemos el timestamp de la fecha actual y la recibida
		$now = strtotime(date("Y-m-d"));
		$fecha = strtotime($fecha_sql);

		// Realizamos la operación para hayar los dias de diferencia
		$diferencia = $now - $fecha;
		$dias_ha = round($diferencia / (60 * 60 * 24));

		// Dependiendo de los días de diferencia, pondremos una cosa u otra
		if ($dias_ha == 0) $dias_ha = "Hoy";
		elseif ($dias_ha == 1) $dias_ha = "Ayer";
		else $dias_ha = "Hace " . number_format($dias_ha, 0, "'", ".") . " días"; 
		
		return $dias_ha;
		
	} 

	function generarClaveTemporal() {
		
		$clave = "";
		
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 		$max = strlen($pattern)-1;
		
		for ($i=0; $i<6; $i++) {
			$clave .= $pattern[mt_rand(0,$max)];
		}
		
		return $clave;
	}

	function validar_email($email){

		$valido = filter_var($email, FILTER_VALIDATE_EMAIL);

		return $valido;
	}

	function validar_fecha($fecha){

		$arr_fecha = explode("-", $fecha);

		$valida = true;

		if(count($arr_fecha) != 3) $valida = false;
		
		elseif(!checkdate($arr_fecha[1], $arr_fecha[0], $arr_fecha[2])) $valida = false;

		return $valida;
	}

	function existen_caracteres_string($string, $caracteres){

        $valido = true;

        foreach($caracteres as $caracter){

            if(strpos($string, $caracter)) $valido = false;

        }

        return $valido;

    }

	// Sirve para pasar de fecha sql a fecha normal y viceversa
	function invertir_orden_fecha ($fecha){

		$arr_fecha = explode("-", $fecha);

		$fecha_invertida = $arr_fecha[2]."-".$arr_fecha[1]."-".$arr_fecha[0];

		return $fecha_invertida;

	}

	function obtener_extension_archivo ($archivo) {

		$extension = explode(".", $archivo);
		$extension = array_pop($extension);
		
		return $extension;

	}

	function comprobar_sesion_iniciada ($tipo_usuario_requerido=false) {
    
		$ci = & get_instance();
		
		// Si hay sesion
		if ($ci->session->login) $sesion_iniciada = true;
	
		// Si no hay sesion
		else $sesion_iniciada = false;
		
		return $sesion_iniciada;
		
	}

	function comprobaciones_sesion ($tipos_usuario=false) {
		
		// Mandamos al login si no hay sesion
		mandar_al_login_si_no_hay_sesion();
	
		// Si recibimos tipos de usuario requeridos
		if ($tipos_usuario) {
	
			// Comprobamos que el tipo de usuario sea correcto
			comprobar_tipo_usuario($tipos_usuario, true);
	
		}
	
	}

	function comprobaciones_sesion_ajax ($tipos_usuario=false) {
	
		$sesion_correcta = true;
	
		// Si la sesion esta iniciada
		if (comprobar_sesion_iniciada()) {
	
			// Si recibimos tipos de usuario requeridos
			if ($tipos_usuario) {
	
				// Si el tipo de usuario es incorrecto
				if (comprobar_tipo_usuario($tipos_usuario) == false) $sesion_correcta = false;
		
			}
	
		}
		// Si la sesion no esta iniciada
		else $sesion_correcta = false;
	
		return $sesion_correcta;
	
	}
	
	function mandar_al_login_si_no_hay_sesion () {
		
		if (comprobar_sesion_iniciada() == false) redireccion("/login");
		
	}

	function comprobar_tipo_usuario ($tipos_usuario_permitidos, $mostrar_404=false) {
    
		$ci = & get_instance();
	
		// Por defecto
		$tipo_usuario_permitido = false;
	
		// Si los tipos de usuario permitidos es un array
		if (is_array($tipos_usuario_permitidos)) {
	
			// Comprobamos que el usuario actual tiene un tipo de usuario permitido
			if (in_array($ci->session->tipo_usuario, $tipos_usuario_permitidos)) {
		
				$tipo_usuario_permitido = true;
		
			}
	
		}
		// Si el tipo de usuario no es un array
		else {
	
			// Comprobamos que el tipo de usuario recibido es el tipo del usuario logeado
			if ($ci->session->tipo_usuario == $tipos_usuario_permitidos) {
		
				$tipo_usuario_permitido = true;
		
			}
	
		}
		
		// Si el usuario es erroneo, mostramos 404, si es que se ha definido la funcion como tal
		if ($tipo_usuario_permitido == false && $mostrar_404) error_404();
	
		return $tipo_usuario_permitido;
	
	}

	function date_to_sql ($european_date, $with_hours=true) {
    
        $european_date = str_replace("/", "-", $european_date);
        
        if ($with_hours) {
    
            $sql_date = date("Y-m-d H:i:s", strtotime($european_date));
    
        }
        else {
    
            $sql_date = date("Y-m-d", strtotime($european_date));
    
        }
        
        return $sql_date;
    
	}
	
	function singular_o_plural ($cantidad, $singular, $plural) {
    
		if ($cantidad == 1) {
	
			$eleccion = $singular;
	
		}
		else {
	
			$eleccion = $plural;
	
		}
	
		return $eleccion;
	
	}
		
	function obtener_paginacion ($total_registros, $pagina_actual) {
		
		$paginacion = false;
		
		// Obtenemos los registros por pagina
		$registros_pagina = obtener_configuracion("registros_por_pagina");
		
		// Solo calculamos la paginacion en el caso de que haya mas de un registro
		if ($total_registros > 0) {
			
			// Realizamos los calculos para las paginas
			$primera_pagina = 1;
			$pagina_anterior = $pagina_actual > 1 ? $pagina_actual - 1 : 1;
			$ultima_pagina = ceil($total_registros / $registros_pagina);
			$pagina_siguiente = $ultima_pagina != 1 ? $pagina_actual + 1 : 1;
			
			// Definimos si los botones de atras y adelante deben estas deshabilitados
			$atras_deshabilitado = $pagina_actual == 1 ? true : false;
			$adelante_deshabilitado = $pagina_actual == $ultima_pagina ? true : false;
			
			// Definimos el objeto paginacion
			$paginacion = (object) Array(
				"primera_pagina" => $primera_pagina,
				"pagina_anterior" => $pagina_anterior,
				"ultima_pagina" => $ultima_pagina,
				"pagina_siguiente" => $pagina_siguiente,
				"atras_deshabilitado" => $atras_deshabilitado,
				"adelante_deshabilitado" => $adelante_deshabilitado
			);
			
		}
		// Definimos la paginacion para cuando hay 0 registros
		else {
			
			// Definimos el objeto paginacion
			$paginacion = (object) Array(
				"primera_pagina" => 1,
				"pagina_anterior" => 1,
				"ultima_pagina" => 1,
				"pagina_siguiente" => 1,
				"atras_deshabilitado" => true,
				"adelante_deshabilitado" => true
			);
			
		}
		
		return $paginacion;
			
	}

	function encriptar ($string) {

		$output = FALSE;

		$key = hash('sha256', obtener_configuracion("secret_key_encriptacion"));
		$iv = substr(hash('sha256', obtener_configuracion("secret_iv_encriptacion")), 0, 16);
		$output = openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
		$output = base64_encode($output);

		return $output;

	}

	function desencriptar ($string) {

		$key = hash('sha256', obtener_configuracion("secret_key_encriptacion"));
		$iv = substr(hash('sha256', obtener_configuracion("secret_iv_encriptacion")), 0, 16);
		$output = openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);

		return $output;

	}
	
    function curl ($url, $post=Array(), $respuesta_json=false) {
                
        // Iniciamos CURL
        $ch = curl_init();
        
        // Definimos la peticion
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        
        // Recibimos la respuesta
		$respuesta = curl_exec($ch);
		
        // Si recibimos una respuesta, y deberia ser en json, la decodificamos
		if ($respuesta && $respuesta_json) $respuesta = json_decode($respuesta);
        
        // Cerramos curl
        curl_close ($ch);
        
        return $respuesta;
        
	}
	
	function comprobar_llamada_localhost () {
        
        if (isset($_SERVER['REMOTE_ADDR'])) {

            $whitelist = ["127.0.0.1", "::1", "localhost"];
            
            $es_localhost = comprobar_llamada_whitelist($whitelist);

        }
        else $es_localhost = true;
        
        return $es_localhost;
        
    }
	
	function comprobar_llamada_whitelist ($whitelist = []) {
		
		$es_localhost = false;
		
		if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) $es_localhost = true;
		
		return $es_localhost;
		
	}

	function tiene_valor ($variable) {

		if ($variable == null || $variable == false || $variable == "") {

			$tiene_valor = false;

		}
		else {

			$tiene_valor = true;

		}

		return $tiene_valor;

	}

	function definir_select_filtro ($valores, $campo_value, $campo_texto) {

		$select = [];

		// Nos recorremos los valores
		foreach ($valores as $valor) {

			// Definimos la option
			$option = (object) [
				"value" => $valor->{$campo_value},
				"texto" => $valor->{$campo_texto}
			];

			// Añadimos la option al select
			$select[] = $option;

		}

		return $select;

	}



	function obtener_tipo_usuario(){

		$ci = & get_instance();
	 return	$ci->session->tipo_usuario;
	}

	function definir_select_filtro_si_no () {

		$select = [
			(object) ["value" => "1", "texto" => "Sí"],
			(object) ["value" => "0", "texto" => "No"]
		];

		return $select;

	}

	function __ ($string) {
		
		$ci = & get_instance();
		$texto = $ci->lang->line($string);
		if($texto == false) $texto = $string;
		return $texto;
	}


	function _e ($string) {
		echo __($string);
	}
	
?>