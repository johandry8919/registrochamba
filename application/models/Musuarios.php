<?php
/**
* 
*/
class Musuarios extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function getAreaForm(){
		$this->db->from('tbl_areas_formacion');
		$this->db->order_by('nombre', 'ASC');
		$query = $this->db->get();

			if ($query->num_rows() > 0) 
				return $query->result();
			else
				return false;	
	}

	public function getEstados(){

		$this->db->from('tbl_estado');
		$this->db->where('activo','1');		
		$this->db->where('codigoestado !=','26');
		$query = $this->db->get();

			if ($query->num_rows() > 0) 
				return $query->result();
			else
				return false;			
	}
	public function getUsuarioRegistradoPersonal(){

		$this->db->select(' tbl_usuarios_personales.*,
							tbl_estado.nombre AS estado, 
							tbl_municipio.nombre AS municipio, 
							tbl_parroquia.nombre AS parroquia							
							');
		$this->db->limit(1);
/* 		$this->db2->where('cedula',$this->session->userdata('cedula')); */
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_usuarios_personales.codigoestado');
		$this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_usuarios_personales.codigomunicipio');
		$this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_usuarios_personales.codigoparroquia');
		$resultado = $this->db->get('tbl_usuarios_personales');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}

	public function getUsuarioRegistradoPersonalConsulta($codigo){

		$this->db->select(' tbl_usuarios_personales.*,
							tbl_estado.nombre AS estado, 
							tbl_municipio.nombre AS municipio, 
							tbl_parroquia.nombre AS parroquia							
							');
		$this->db->limit(1);
		$this->db->where('codigo',$codigo);
		$this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_usuarios_personales.codigoestado');
		$this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_usuarios_personales.codigomunicipio');
		$this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_usuarios_personales.codigoparroquia');
		$resultado = $this->db->get('tbl_usuarios_personales');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}


	
	public function getUsuarioChambistaCedula($cedula){

		$this->db->select(' tbl_usuarios_personales.*,
							tbl_estado.nombre AS estado, 
							tbl_municipio.nombre AS municipio, 
							tbl_parroquia.nombre AS parroquia,cedula							
							');
		$this->db->limit(1);
		$this->db->where('cedula',$cedula);
		$this->db->join('tbl_usuarios', 'tbl_usuarios.id_usuario = tbl_usuarios_personales.id_usuario');
		$this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_usuarios_personales.codigoestado');

		$this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_usuarios_personales.codigomunicipio');
		$this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_usuarios_personales.codigoparroquia');
		$query = $this->db->get('tbl_usuarios_personales');

		if ($query->num_rows()) $valor = $query->row();
		else $valor = false;
		return $valor;
	}

		
	public function getUsuarioChambistaID($id){

		$this->db->select(' tbl_usuarios_personales.*,
							tbl_estado.nombre AS estado, 
							tbl_municipio.nombre AS municipio, 
							tbl_parroquia.nombre AS parroquia,cedula,							
							');
		$this->db->limit(1);
		$this->db->where('tbl_usuarios.id_usuario',$id);
		$this->db->join('tbl_usuarios', 'tbl_usuarios.id_usuario = tbl_usuarios_personales.id_usuario');
		$this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_usuarios_personales.codigoestado');
		$this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_usuarios_personales.codigomunicipio');
		$this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_usuarios_personales.codigoparroquia');
		$query = $this->db->get('tbl_usuarios_personales');

		if ($query->num_rows()) $valor = $query->row();
		else $valor = false;
		return $valor;
	}
	public function getUsuarioRegistradoAcademico(){

		$this->db->select('*');

		$this->db->where('activo', 1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$resultado = $this->db->get('tbl_usuarios_academicos');
		


		if ($resultado->result() > 0) {

			return $resultado->result();
		}else{
			return FALSE;
		}
	}

	public function getUsuarioRegistradoAcademicoConsulta($codigo){

		$this->db->select(' *');

		$this->db->where('activo', 1);
		$this->db->where('codigo',$codigo);
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$resultado = $this->db->get('tbl_usuarios_academicos');
		


		if ($resultado->result() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}
	}
	public function AcademicoConsulta($id__exp_lab){

		$this->db->select(' *');

		$this->db->where('activo', 1);

		$this->db->where('id_usuario',$id__exp_lab);
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$resultado = $this->db->get('tbl_usuarios_academicos');
		


		if ($resultado->result() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}
	}

	public function getUsuarioRegistradoExperiencia(){

		$this->db->select(' *');

		$this->db->where('activo',1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->join('tbl_sector_empresas', 'tbl_sector_empresas.id_sector_empresa = tbl_usuarios_experiencia_laboral.area');
		$resultado = $this->db->get('tbl_usuarios_experiencia_laboral');


		if ($resultado->result() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}
	}

	public function getUsuarioRegistradoExperienciaConsulta($codigo){

		$this->db->select(' *');

		$this->db->where('activo',1);
		$this->db->where('codigo',$codigo);
		$this->db->join('tbl_sector_empresas', 'tbl_sector_empresas.id_sector_empresa = tbl_usuarios_experiencia_laboral.area');
		$resultado = $this->db->get('tbl_usuarios_experiencia_laboral');


		if ($resultado->result() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}
	}

	public function getExpLaboralID($id__exp_lab){

		$this->db->select(' *');

		$this->db->limit(1);
		$this->db->where('id__exp_lab',$id__exp_lab);
		$this->db->where('activo',1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->join('tbl_sector_empresas', 'tbl_sector_empresas.id_sector_empresa = tbl_usuarios_experiencia_laboral.area');
		$resultado = $this->db->get('tbl_usuarios_experiencia_laboral');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}	

	public function getAcademicaID($id_usu_aca){

		$this->db->select(' *');

		$this->db->limit(1);
		$this->db->where('id_usu_aca',$id_usu_aca);
		$this->db->where('activo',1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$resultado = $this->db->get('tbl_usuarios_academicos');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}	
	public function getAcademi_canbistascaID($id_usu_aca){

		$this->db->select(' *');

		$this->db->limit(1);
		$this->db->where('id_usu_aca',$id_usu_aca);
		$this->db->where('activo',1);
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$resultado = $this->db->get('tbl_usuarios_academicos');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}	
	public function getAcademica_chambistasID($id){

		$this->db->select('tbl_usuarios_academicos. *');

		$this->db->limit(1);
		$this->db->where('id_usuario',$id);
		$this->db->where('activo',1);
		$this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = tbl_usuarios_academicos.id_instruccion');
		$this->db->join('tbl_estado_inst', 'tbl_estado_inst.id_estado_inst = tbl_usuarios_academicos.id_estado_inst');
		$query = $this->db->get('tbl_usuarios_academicos');


		if ($query->num_rows()) $valor = $query->row();
		else $valor = false;
		return $valor;
	}	

	public function registroproductivo($data){

		$this->db->trans_begin();
		
		$this->db->insert('tbl_usuarios_productivos',$data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}
	public function registroproductivos($data){

		$this->db->trans_begin();
		$this->db->where('id_usuario',$data['id_usuario']);


		$this->db->insert('tbl_usuarios_productivos',$data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}

	public function registroVivienda($data){

		$this->db->trans_begin();

		$this->db->insert('tbl_usuarios_viviendas',$data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}


	public function registrobrigadas($data){

		$this->db->trans_begin();

		$this->db->insert('tbl_usuarios_brigadas',$data);


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}

	public function registrarPersonales($data){
		$latitud = $data['latitud'];
			$longitud = $data['longitud'];
		
			$latitud = number_format($latitud,18, '.', '.');
			$longitud = number_format($longitud, 18, '.', '.');

		$jovenes = array(
				/* 'nac' => $data['nac'], */
				'nombres' => $data['nombres'],
				'apellidos' => $data['apellidos'],
				'fecha_nac' => $data['datepicker'],
				'telf_cel' => $data['telf_movil'],
				'telf_local' => $data['telf_local'],
				'empleo' => $data['empleo'],
				'codigoestado' => $data['cod_estado'],
				'codigomunicipio' => $data['cod_municipio'],
				'codigoparroquia' => $data['cod_parroquia'],                
				'direccion' => $data['direccion'],
				'cne' => $data['estudio'],
				'estudio' => $data['cne'],
				'genero' => $data['genero'],
				'estcivil' => $data['estcivil'],
				'aborigen' => $data['aborigen'],
				'hijo' => $data['hijo'],
				'hijo' => $data['hijo'],
				'id_movimiento_religioso' => $data['id_movimiento_religioso'],
				'id_movimiento_sociales' => $data['id_movimiento_sociales'],
				'longitud' => $longitud,
				'latitud' => $latitud,
				'codigo' => $this->session->userdata('codigo'),
				'id_usuario' => $this->session->userdata('id_usuario'),
				 'id_profesion_oficio' => $data['id_profesion_oficio'],
				 
				 'edad' => $data['edad']
		);

/* 		$profesion = array(
				'id_joven' => $data['cedula'],
				'id_profesiones' => $data['profesion'],
				'fase' => $fase                                                                  
		);

		$organizacion = array(
				'id_joven' => $data['cedula'],
				'id_organizacion' => $data['organizacion'],
				'fase' => $fase                        
		); 

		$ambito = array(
				'id_joven' => $data['cedula'],
				'id_ambito' => $data['ambito1'],
				'id_subambito' => $data['subambito1'],
				'eleccion' => 1,
				'fase' => $fase                                                                   
		);

		$instruccion = array(
				'id_joven' => $data['cedula'],
				'id_instruccion' => $data['instruccion'],
				'id_estado_inst' => $data['estado_inst'],
				'fase' => $fase
		); */                                              


		$this->db->trans_begin();

		$this->db->insert('tbl_usuarios_personales',$jovenes);
/* 		$this->db->insert('tbl_profesiones_joven',$profesion);
		$this->db->insert('tbl_organizacion_joven',$organizacion);
		$this->db->insert('tbl_ambito_eleccion',$ambito);
		$this->db->insert('tbl_instruccion_joven',$instruccion); */

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}


	}

	public function registrarAcademico($data){

		$this->db->trans_begin();

		$this->db->insert('tbl_usuarios_academicos',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}

	}

	public function getAcademico(){

		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->where('activo',1);
		$resultado = $this->db->get('tbl_usuarios_academicos');
		
		if($resultado->result()[0]->count >= 5){
			return false;
		}else{
			return true;
		}	

	}
	public function getExpLab(){

		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->where('activo',1);
		$resultado = $this->db->get('tbl_usuarios_experiencia_laboral');
		
		if($resultado->result()[0]->count >= 5){
			return false;
		}else{
			return true;
		}	

	}

	public function registrarExperiencia($data){

		$this->db->trans_begin();

		$this->db->insert('tbl_usuarios_experiencia_laboral',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
	public function actualizarExperiencia($data){

		$this->db->where('id__exp_lab', $data['id__exp_lab']);
		$this->db->where('codigo', $data['codigo']);
		$this->db->where('id_usuario', $data['id_usuario']);
		$this->db->update('tbl_usuarios_experiencia_laboral', $data);
			
		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function actualizarAcademico($data){

		$this->db->where('id_usu_aca', $data['id_usu_aca']);
		$this->db->where('codigo', $data['codigo']);
		$this->db->where('id_usuario', $data['id_usuario']);
		$this->db->update('tbl_usuarios_academicos', $data);
			
		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	public function actualizarAcademicos($data){

		$this->db->where('id_usu_aca', $data['id_usu_aca']);
		$this->db->where('id_usuario', $data['id_usuario']);
		$this->db->update('tbl_usuarios_academicos', $data);
			
		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function actualizarPersonales($data){
			// 		guardar una latitud, por ejemplo, tomada del Google Maps, 
			$latitud = $data['latitud'];
			$longitud = $data['longitud'];
		
			
			$jovenes = array(
				/* 'nac' => $data['nac'], */
				'nombres' => $data['nombres'],
				'apellidos' => $data['apellidos'],
				'fecha_nac' => $data['datepicker'],
				'telf_cel' => $data['telf_movil'],
				'telf_local' => $data['telf_local'],
				'empleo' => $data['empleo'],
				'codigoestado' => $data['cod_estado'],
				'codigomunicipio' => $data['cod_municipio'],
				'codigoparroquia' => $data['cod_parroquia'],                
				'direccion' => $data['direccion'],
				'cne' => $data['estudio'],
				'estudio' => $data['cne'],
				'genero' => $data['genero'],
				'estcivil' => $data['estcivil'],
				'aborigen' => $data['aborigen'],
				'id_movimiento_religioso' => $data['id_movimiento_religioso'],
				'id_movimiento_sociales' => $data['id_movimiento_sociales'],
				'hijo' => $data['hijo'],
				'longitud' => $longitud,
				'latitud' => $latitud,
				'codigo' => $this->session->userdata('codigo'),
				'id_usuario' => $this->session->userdata('id_usuario'),
				'id_profesion_oficio' => $data['id_profesion_oficio'],
			
				'edad' => $data['edad']
		);

		$this->db->where('codigo', $jovenes['codigo']);
		$this->db->where('id_usuario', $jovenes['id_usuario']);
		$this->db->update('tbl_usuarios_personales', $jovenes);
			
		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}

	}
	public function actualizarChambista($data,$id){
			// 		guardar una latitud, por ejemplo, tomada del Google Maps, 
		
		
		$this->db->where('id_usuario', $id);
		$this->db->update('tbl_usuarios_personales', $data);
			
		if ($this->db->affected_rows()) {
			return true;
		}else {
			return false;
		}

	}

	public function update_chambista($datos,$id){
        
		$this->db->where('id_usuario_personal', $id);
        $this->db->update('public.tbl_usuarios_personales', $datos);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }


}

	public function actualizarPorcentajePerfil(){
		$porcentaje_perfil = 0;
		//////////////////////////////////////////////////////////////////////////
		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('tbl_usuarios_personales');
			if($resultado->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 30;
			}

			
		/* 		
		$this->db->select('count(*)');
		$this->db->limit(1);
		$this->db->where('activo',1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado2 = $this->db->get('tbl_usuarios_experiencia_laboral');
			if($resultado2->result()[0]->count == 1){
				$porcentaje_perfil = $porcentaje_perfil + 15;
			} 
		*/
		$this->db->select('count(*)');
		$this->db->where('activo',1);
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado3 = $this->db->get('tbl_usuarios_academicos');
			if($resultado3->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 15;
			}
		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado4 = $this->db->get('tbl_redessociales');
			if($resultado4->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 10;
			}
		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado5 = $this->db->get('tbl_usuarios_productivos');
			if($resultado5->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 15;
			}
		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado6 = $this->db->get('tbl_usuarios_viviendas');
			if($resultado6->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 15;
			}
		$this->db->select('count(*)');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado7 = $this->db->get('tbl_usuarios_brigadas');
			if($resultado7->result()[0]->count >= 1){
				$porcentaje_perfil = $porcentaje_perfil + 15;
			}
		/////////////////////////////////////////////////////////////////////////

		$data = array(
			'porcentaje_perfil' => $porcentaje_perfil
		);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->update('tbl_usuarios', $data);
			
		if ($this->db->affected_rows()) {
			return $porcentaje_perfil;
		}else {
			return FALSE;
		}
	}

	public function getRedesSociales(){
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('tbl_redessociales');

		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}
	public function deleteRedesSociales(){

		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_redessociales');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}		
	}

	public function getRedesSocialesConsulta($codigo){
		$this->db->where('codigo',$codigo);
		$resultado = $this->db->get('tbl_redessociales');

		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}

	public function insertRedesSociales($data){

		$this->db->trans_begin();

			$this->db->insert('tbl_redessociales',$data);

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return FALSE;
		}
		else
		{
		        $this->db->trans_commit();
		        return TRUE;
		}	
	}

	public function UpdateRedesSociales($data){
		$this->db->where('codigo', $data['codigo']);
		$this->db->where('id_usuario', $data['id_usuario']);
		$this->db->update('tbl_redessociales', $data);
			
		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}	

	public function eliminarexp($id_exp_lab){

		$jovenes['activo'] = 0;

		$this->db->where('id__exp_lab', $id_exp_lab);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_usuarios_experiencia_laboral');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}
	public function eliminarchamba($id_chamba){

		$this->db->where('tipo_chamba', $id_chamba);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_usuarios_productivos');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}

	public function eliminarchambas($id_usuario){

		$this->db->where('id_usuario', $id_usuario);
		// $this->db->where('codigo', $this->session->userdata('codigo'));
		
		$this->db->delete('tbl_usuarios_productivos');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}

	public function eliminarbrigada($id_brigada){

		$this->db->where('id_brigada', $id_brigada);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_usuarios_brigadas');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}

	public function eliminarVivienda($vivienda){

		$this->db->where('vivienda', $vivienda);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_usuarios_viviendas');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}	

	public function eliminaracademico($id_usu_aca){

		$jovenes['activo'] = 0;

		$this->db->where('id_usu_aca', $id_usu_aca);
		$this->db->where('codigo', $this->session->userdata('codigo'));
		$this->db->where('id_usuario', $this->session->userdata('id_usuario'));
		$this->db->delete('tbl_usuarios_academicos');

		if ($this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}			
	}
	

	public function getAborigenes(){

		$this->db->from('tbl_aborigenes');
		$this->db->order_by('id_aborigen', 'ASC');
		$query = $this->db->get();

			if ($query->num_rows() > 0) 
				return $query->result();
			else
				return false;			
	}	


	public function consultarJovenSession($datos){

		$this->db->from('public.tbl_usuarios');
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$resultado = $this->db->get();

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}			
	}
	public function cambiarPasswordJoven($datos){

		$data = array(
		        'password' => $datos['new_password'],
		);

		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->update('public.tbl_usuarios', $data);

		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
			}

	}


	public function ingresarUsuario($datos){
		$email = $datos['email'];

		$this->db->limit(1);
		$this->db->where('email',$email);
		$resultado = $this->db->get('public.tbl_usuarios');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}

	public function validarCuenta($datos){


			$data = array(
			        'activo' => 1
			);
			$this->db->where('codigo_verificacion',$datos['codigo']);
			$this->db->where('email',$_SESSION['email']);
			$this->db->update('public.tbl_usuarios', $data);

		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function consultarJovenEmail($datos){

		$this->db->from('public.tbl_usuarios');
		$this->db->where('email',$datos['email']);
		$resultado = $this->db->get();

		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}else{
			return FALSE;
		}			
	}

	public function verificarDatosCarnetPatria($datos){
		$this->db->select('count(*) AS cantidad');
		$this->db->from('public.carnetfull');
		$this->db->where('cedula_identidad',$datos['cedula']);
		$this->db->where('codigo_carnet',$datos['codigo']);
		
		$resultado = $this->db->get();

		$fila = $resultado->row();


		if ($fila->cantidad > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function agregarKeyPassNewPass($datos,$resultado){
		$this->db->trans_begin();

			$data = array(
			        'keypass' => $datos['keypass'],
			        'new_pass' => $datos['new_pass']
			);
			$this->db->where('cedula', $resultado[0]->cedula);
			$this->db->update('public.tbl_usuarios', $data);

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return FALSE;
		}
		else
		{
		        $this->db->trans_commit();
		        return TRUE;
		}	
	}

	public function reiniciarClave($keypass,$cedula){	
	
		$this->db->trans_begin();

			$this->db->limit(1);
			$this->db->where('cedula', $cedula);
			$this->db->where('keypass', $keypass);
			$resultado = $this->db->get('public.tbl_usuarios');

			$resultado = $resultado->result();
			if($resultado){
				$data = array(
				        'password' => password_hash($resultado[0]->new_pass,PASSWORD_DEFAULT),
				        'cedula' => $cedula,
				        'keypass'=> "",
				        'new_pass'=> ""
				);
				$this->db->where('cedula', $cedula);
				$this->db->where('keypass', $keypass);
				$this->db->update('public.tbl_usuarios', $data);
				$new_pass = $resultado[0]->new_pass;			
			}else{
		        $this->db->trans_rollback();
		        return FALSE;				
			}




		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return FALSE;
		}
		else
		{
		        $this->db->trans_commit();
		        return $new_pass;
		}		

	}	

	public function verificarEmailRegistroSistema($datos){

		$this->db->limit(1);
		$this->db->select('count(*) AS cantidad');
		$this->db->from('public.tbl_usuarios');
		$this->db->where('email',$datos['email']);
		
		$resultado = $this->db->get();

		$fila = $resultado->row();

		if ($fila->cantidad > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getUsuariosProductivo(){
		$this->db->limit(1);
		$this->db->join('tbl_chambas', 'tbl_chambas.id_chamba = tbl_usuarios_productivos.tipo_chamba',"LEFT");
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('public.tbl_usuarios_productivos');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}
	public function getUsuariosProductivos($id_usuario){
		$this->db->limit(1);
		$this->db->join('tbl_chambas', 'tbl_chambas.id_chamba = tbl_usuarios_productivos.tipo_chamba',"LEFT");
		$this->db->where('id_usuario',$id_usuario);
		// $this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('public.tbl_usuarios_productivos');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}

	public function getUsuariosVivienda(){
		$this->db->limit(1);
		$this->db->join('tbl_viviendas', 'tbl_viviendas.vivienda = tbl_usuarios_viviendas.vivienda',"LEFT");
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('public.tbl_usuarios_viviendas');

		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}
	public function udapteUsuariosVivienda($data){

		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
	
		$this->db->update('public.tbl_usuarios_viviendas', $data);
		  
		if ($this->db->affected_rows()) {
		  return TRUE;
		}else {
		  return FALSE;
		}
	  }
	  public function udapteUsuariosbrigadas($data){

		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
	
		$this->db->update('public.tbl_usuarios_brigadas', $data);
		  
		if ($this->db->affected_rows()) {
		  return TRUE;
		}else {
		  return FALSE;
		}
	  }
		

	  

	public function getBrigadasUsuario(){
		$this->db->limit(1);
		$this->db->join('tbl_brigadas', 'tbl_brigadas.id_brigada = tbl_usuarios_brigadas.id_brigada',"LEFT");
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$resultado = $this->db->get('public.tbl_usuarios_brigadas');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}

	public function verificarCedulaRegistroSistema($datos){

		$this->db->limit(1);
		$this->db->select('count(*) AS cantidad');
		$this->db->from('public.tbl_usuarios');
		$this->db->where('cedula',$datos['cedula']);
		
		$resultado = $this->db->get();

		$fila = $resultado->row();

		if ($fila->cantidad > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function registrarUsuario($datos){

		$this->db->trans_begin();

			$this->db->insert('public.tbl_usuarios',$datos);

		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		        return FALSE;
		}
		else
		{
		        $this->db->trans_commit();
	            $insert_id = $this->db->insert_id();

				return  $insert_id;
		}		
	}


	public function getMunicipios($data){

		$codigoestado = $data['codigoestado'];

		$this->db->select('codigomunicipio, nombre');
		$this->db->from('tbl_municipio');
		$this->db->order_by('nombre', 'ASC');
		$this->db->where('codigoestado', $codigoestado);
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}

	public function getParroquias($data){

		$codigoestado = $data['codigoestado'];
		$codigomunicipio = $data['codigomunicipio'];

		$this->db->select('*');
		$this->db->from('tbl_parroquia');
		$this->db->order_by('nombre', 'ASC');
		$this->db->where('codigoestado', $codigoestado);
		$this->db->where('codigomunicipio', $codigomunicipio);
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}

	public function verificarCodigoUsuario($codigo){
		//devuelve true sino existe la publicacion
		$this->db->where('codigo',$codigo);
		$resultado = $this->db->get('tbl_usuarios');

		if ($resultado->num_rows() > 0) 
			return false;
		else
			return true;		
	}

	public function getUsuario(){

		$this->db->limit(1);
		$this->db->where('codigo',$this->session->userdata('codigo'));
		$this->db->where('id_usuario',$this->session->userdata('id_usuario'));
		$resultado = $this->db->get('public.tbl_usuarios');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}

	public function getUsuarioConsulta($codigo){

		$this->db->limit(1);
		$this->db->where('codigo',$codigo);
		$resultado = $this->db->get('public.tbl_usuarios');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}	
	}

}