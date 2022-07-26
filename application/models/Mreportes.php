<?php
/**
* 
*/
class Mreportes extends CI_Model
{
	
	function __construct()
	{
        parent::__construct();
	
	}


    public function obtener_datos_personales(){

        $query = $this->db->query("


        SELECT distinct(tbl_usu.id_usuario), tbl_usu.cedula, tbl_usu.email,  tbl_usu.porcentaje_perfil, tbl_usu.registro_anterior,
        tbl_dp.nombres, tbl_dp.apellidos, tbl_dp.fecha_nac, tbl_dp.telf_cel, tbl_dp.telf_local, 
         empleo, direccion, cne,
        tbl_dp.estudio, tbl_dp.genero, tbl_dp.estcivil, tbl_dp.aborigen, tbl_dp.hijo,  
         profesion.desc_profesion, edad, tbl_movimiento_religioso.religion, 
          tbl_movimiento_sociales.sociales, tipo_usuario,
          tbl_dp.latitud, tbl_dp.longitud
        ,
        
        tbl_estado.nombre AS estado, tbl_dp.creado AS fecha_creacion_usuario,
        nombre_brigadas, tbl_municipio.nombre as municipio,tbl_parroquia.nombre as parroquia
        
        FROM tbl_usuarios_personales tbl_dp
        INNER JOIN tbl_usuarios tbl_usu ON
        tbl_usu.id_usuario=tbl_dp.id_usuario
        INNER JOIN tbl_estado ON
        tbl_estado.codigoestado = tbl_dp.codigoestado
        
        INNER JOIN tbl_municipio ON
        tbl_municipio.codigomunicipio = tbl_dp.codigomunicipio
        
        
        INNER JOIN tbl_parroquia ON
        tbl_parroquia.codigoparroquia = tbl_dp.codigoparroquia 
           
        LEFT JOIN tbl_movimiento_religioso  ON
        tbl_movimiento_religioso.id_religion = tbl_dp.id_movimiento_religioso
		
	  LEFT JOIN tbl_movimiento_sociales  ON
        tbl_movimiento_sociales.id_movimiento = tbl_dp.id_movimiento_sociales

        LEFT JOIN tbl_profesion_oficio profesion ON
        profesion.id_profesion = tbl_dp.id_profesion_oficio

 
   
        LEFT JOIN tbl_usuarios_brigadas ON
        tbl_usuarios_brigadas.id_usuario = tbl_usu.id_usuario
        
        LEFT JOIN tbl_brigadas ON
        tbl_usuarios_brigadas.id_brigada = tbl_brigadas.id_brigada
        
        ");

		if ($query->result() > 0) 
			return $query->result();
		else
			return false;			
    }
}