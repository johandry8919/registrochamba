<?php
/**
* 
*/
class Madministrador extends CI_Model
{
	
	function __construct()
	{
        parent::__construct();
		$this->db2 = $this->load->database('pcj', TRUE);
	}

	public function cantidadJovenDataVieja(){
		
		$this->db2->select('count(*) AS cantidad');
		$this->db2->from('tbl_jovenes');
		
		$resultado = $this->db2->get();
		return $resultado->row();

	}
	public function cantidadJovenActualizada(){
		$this->db->select('count(*) AS cantidad');
		$this->db->where('registro_anterior',1);
		$this->db->from('tbl_usuarios');
		
		$resultado = $this->db->get();
		return $resultado->row();

	}

	public function cantidadJovenporPorcentajePerfil(){

		$query = $this->db->query("
		select porcentaje_perfil, count(*) as cantidad
		from tbl_usuarios
		group by porcentaje_perfil");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;			
	}
	public function genero(){

		$query = $this->db->query("
		select genero, count(*) as cantidad
		from tbl_usuarios_personales
		group by genero;");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;			
	}
	public function empleo(){

		$query = $this->db->query("
		select empleo, count(*) as cantidad
		from tbl_usuarios_personales
		group by empleo;");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;			
	}
	///
	public function cantidadDatosPersonales(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_personales
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}
	public function cantidadFormacionAcademica(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_academicos
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}
	public function cantidadExpLaboral(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_experiencia_laboral
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}

	public function cantidadRedesSociales(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_redessociales
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}

	public function cantidadProductivo(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_productivos
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}
	public function cantidadOrganizativoBrigadas(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_brigadas
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}	
	public function cantidadVivienda(){
		$query = $this->db->query("
		select count(*) as cantidad
		from tbl_usuarios_viviendas
		");

		if ($query->result() > 0) 
			return $query->row();
		else
			return false;	
	}
	public function datosVivienda(){
		$query = $this->db->query("
		select count(*) as cantidad, tbl_viviendas.tipo_vivienda
		from tbl_usuarios_viviendas
		left join tbl_viviendas
		on tbl_viviendas.vivienda = tbl_usuarios_viviendas.vivienda
		group by tbl_viviendas.tipo_vivienda
		");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;	
	}
	
	////
		
	public function cantidadJovenDataNueva(){
		
		$this->db->select('count(*) AS cantidad');
		$this->db->from('tbl_usuarios');
		
		$resultado = $this->db->get();
		return $resultado->row();

	}

	public function ingresarUsuario($datos){
		$email = $datos['email'];

		$this->db->limit(1);
		$this->db->where('email',$email);
		$resultado = $this->db->get('public.tbl_administradores');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}

	public function countUsuariosPublicacion(){

		$query = $this->db->query("
		SELECT count(*) as cantidad, tbl_usuarios.nombres|| ' ' || apellidos as Usuario 
		FROM usuario.tbl_usuarios 
		INNER JOIN vehiculo.tbl_publicaciones
		ON usuario.tbl_usuarios.id_usuario = vehiculo.tbl_publicaciones.id_usuario2
		group by tbl_usuarios.id_usuario
		order by cantidad DESC");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;	

	}


}