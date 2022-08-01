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



    public function obtener_datos_personales($estado,$municipio,$parroquia,$fecha_inicio,$fecha_fin ,$id_nivel_academico,$id_area_form){

        $this->db->select(' distinct(tbl_usu.id_usuario), tbl_usu.cedula,
      
        
        tbl_usu.email,  tbl_usu.porcentaje_perfil, tbl_usu.registro_anterior,
        tbl_dp.nombres, tbl_dp.apellidos, tbl_dp.fecha_nac, tbl_dp.telf_cel, tbl_dp.telf_local, 
         empleo, direccion, cne,
        tbl_dp.estudio, tbl_dp.genero, tbl_dp.estcivil, tbl_dp.aborigen, tbl_dp.hijo,  
         profesion.desc_profesion, edad, tbl_movimiento_religioso.religion, 
          tbl_movimiento_sociales.sociales, tipo_usuario,
          tbl_dp.latitud, tbl_dp.longitud,tbl_estado.nombre AS estado, tbl_dp.creado AS fecha_creacion_usuario,
        nombre_brigadas, tbl_municipio.nombre as municipio,tbl_parroquia.nombre as parroquia,
	 terreno_siembra, sembrando, rubro, financiamiento,  pesquera_inspector_pescador, pesquera_pescador, pesquera_refrigeracion, pesquera_financiamiento, emprendimiento, iniciar_emprendimiento, emprendimiento_empresa,
	 "financiamiento-emprendimiento", "agrourbana-terrenos",
	 "agrourbana-patio", "agrourbana-rubro", "financiamiento-agrourbana", nombre_chamba

  

	
                
        ');
      //  $this->db->limit($limit, $start);

      if($estado !='todos'){
        $this->db->where('tbl_estado.codigoestado', $estado);
      }


      if($municipio !='01'){
        $this->db->where('tbl_municipio.codigomunicipio ', $municipio);
      }

      if($parroquia !='01'){
        $this->db->where('tbl_parroquia.codigoparroquia ',$parroquia);
      }
      if($id_nivel_academico !='02'){
        $this->db->where("tbl_acade.id_instruccion" ,$id_nivel_academico);
      }
      if($id_area_form !='02'){
        $this->db->where("tbl_acade.id_area_form" ,$id_area_form);
      }
  



 
      
      $this->db->where(" tbl_dp.creado >='$fecha_inicio'");
      $this->db->where(" to_char(tbl_dp.creado,'YYYY-MM-DD') <='$fecha_fin'");
        $this->db->join('tbl_usuarios tbl_usu', ' tbl_usu.id_usuario=tbl_dp.id_usuario');

        $this->db->join('tbl_usuarios_academicos tbl_acade', ' tbl_acade.id_usuario=tbl_dp.id_usuario','left');


        $this->db->join('tbl_estado ', ' tbl_estado.codigoestado = tbl_dp.codigoestado ');
        $this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_dp.codigomunicipio');
        $this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_dp.codigoparroquia ');
        $this->db->join('tbl_movimiento_religioso', 'tbl_movimiento_religioso.id_religion = tbl_dp.id_movimiento_religioso ','left');
        $this->db->join('tbl_movimiento_sociales', 'tbl_movimiento_sociales.id_movimiento = tbl_dp.id_movimiento_sociales','left');
        $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = tbl_dp.id_profesion_oficio','left');
        $this->db->join('tbl_usuarios_brigadas', 'tbl_usuarios_brigadas.id_usuario = tbl_usu.id_usuario','left');
        $this->db->join('tbl_brigadas', 'tbl_usuarios_brigadas.id_brigada = tbl_brigadas.id_brigada','left');
        $this->db->join('tbl_usuarios_productivos', 'tbl_usuarios_productivos.id_usuario = tbl_usu.id_usuario','left');
        $this->db->join('tbl_chambas', 'tbl_chambas.id_chamba = tbl_usuarios_productivos.tipo_chamba','left');

    

        $query = $this->db->get("tbl_usuarios_personales tbl_dp");
   // echo $this->db->last_query();
        if ($query->num_rows() ) 
        {
            
             
            return $query->result();
        }
 
        return [];
    }

    public function get_total() 
    {
      //  return $this->db->count_all_results("tbl_usuarios_personales");
      $query = $this->db->query('SELECT COUNT(*) AS numrows
      FROM tbl_usuarios_personales tbl_dp
      JOIN "tbl_usuarios" "tbl_usu" ON "tbl_usu"."id_usuario"="tbl_dp"."id_usuario"
JOIN "tbl_estado" ON "tbl_estado"."codigoestado" = "tbl_dp"."codigoestado"
JOIN "tbl_municipio" ON "tbl_municipio"."codigomunicipio" = "tbl_dp"."codigomunicipio"
JOIN "tbl_parroquia" ON "tbl_parroquia"."codigoparroquia" = "tbl_dp"."codigoparroquia"
LEFT JOIN "tbl_movimiento_religioso" ON "tbl_movimiento_religioso"."id_religion" = "tbl_dp"."id_movimiento_religioso"
LEFT JOIN "tbl_movimiento_sociales" ON "tbl_movimiento_sociales"."id_movimiento" = "tbl_dp"."id_movimiento_sociales"
LEFT JOIN "tbl_profesion_oficio" "profesion" ON "profesion"."id_profesion" = "tbl_dp"."id_profesion_oficio"
LEFT JOIN "tbl_usuarios_brigadas" ON "tbl_usuarios_brigadas"."id_usuario" = "tbl_usu"."id_usuario"
LEFT JOIN "tbl_brigadas" ON "tbl_usuarios_brigadas"."id_brigada" = "tbl_brigadas"."id_brigada"
LEFT JOIN "tbl_usuarios_productivos" ON "tbl_usuarios_productivos"."id_usuario" = "tbl_usu"."id_usuario"
LEFT JOIN "tbl_chambas" ON "tbl_chambas"."id_chamba" = "tbl_usuarios_productivos"."tipo_chamba"
      
      ');

            if ($query->num_rows()) 
            return $query->row()->numrows;
            else
            return 0;	


    }
    
    public function obtener_chambistas_por_pagina($limit, $start) 
    {

        $this->db->select(' distinct(tbl_usu.id_usuario), tbl_usu.cedula, tbl_usu.email,  tbl_usu.porcentaje_perfil, tbl_usu.registro_anterior,
        tbl_dp.nombres, tbl_dp.apellidos, tbl_dp.fecha_nac, tbl_dp.telf_cel, tbl_dp.telf_local, 
         empleo, direccion, cne,
        tbl_dp.estudio, tbl_dp.genero, tbl_dp.estcivil, tbl_dp.aborigen, tbl_dp.hijo,  
         profesion.desc_profesion, edad, tbl_movimiento_religioso.religion, 
          tbl_movimiento_sociales.sociales, tipo_usuario,
          tbl_dp.latitud, tbl_dp.longitud,tbl_estado.nombre AS estado, tbl_dp.creado AS fecha_creacion_usuario,
        nombre_brigadas, tbl_municipio.nombre as municipio,tbl_parroquia.nombre as parroquia,
	 terreno_siembra, sembrando, rubro, financiamiento,  pesquera_inspector_pescador, pesquera_pescador, pesquera_refrigeracion, pesquera_financiamiento, emprendimiento, iniciar_emprendimiento, emprendimiento_empresa,
	 "financiamiento-emprendimiento", "agrourbana-terrenos",
	 "agrourbana-patio", "agrourbana-rubro", "financiamiento-agrourbana", nombre_chamba,
	 id_area_desarrollo_emprendedor, desarrollo_proyecto_tecnologico, id_sector_productivo, id_servicios_profesionales, que_esta_desarrollando
	
                
        ');
        $this->db->limit($limit, $start);

        $this->db->join('tbl_usuarios tbl_usu', ' tbl_usu.id_usuario=tbl_dp.id_usuario');
        $this->db->join('tbl_estado ', ' tbl_estado.codigoestado = tbl_dp.codigoestado ');
        $this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_dp.codigomunicipio');
        $this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_dp.codigoparroquia ');
        $this->db->join('tbl_movimiento_religioso', 'tbl_movimiento_religioso.id_religion = tbl_dp.id_movimiento_religioso ','left');
        $this->db->join('tbl_movimiento_sociales', 'tbl_movimiento_sociales.id_movimiento = tbl_dp.id_movimiento_sociales','left');
        $this->db->join('tbl_profesion_oficio profesion', 'profesion.id_profesion = tbl_dp.id_profesion_oficio','left');
        $this->db->join('tbl_usuarios_brigadas', 'tbl_usuarios_brigadas.id_usuario = tbl_usu.id_usuario','left');
        $this->db->join('tbl_brigadas', 'tbl_usuarios_brigadas.id_brigada = tbl_brigadas.id_brigada','left');
        $this->db->join('tbl_usuarios_productivos', 'tbl_usuarios_productivos.id_usuario = tbl_usu.id_usuario','left');
        $this->db->join('tbl_chambas', 'tbl_chambas.id_chamba = tbl_usuarios_productivos.tipo_chamba','left');

        $query = $this->db->get("tbl_usuarios_personales tbl_dp");
    // echo $this->db->last_query();
        if ($query->num_rows() ) 
        {
            
             
            return $query->result();
        }
 
        return [];
    }
     



public function obtener_formacion_academica_chambista($id_usuarios){

    $query = $this->db->query("

    SELECT  centro_educ,  titulo_carrera,   desea_continuar_estudio,
    tbl_instruccion.nivel as nivel_academico,titulo_carrera, tbl_estado_inst.nombre as estado_instruccion, tbl_areas_formacion.nombre 
    FROM public.tbl_usuarios_academicos tbl_academico
    INNER JOIN tbl_instruccion ON
    tbl_academico.id_instruccion = tbl_instruccion.id_instruccion
    LEFT JOIN tbl_areas_formacion  ON
    tbl_academico.id_area_form = tbl_areas_formacion.id_area_form
    LEFT JOIN tbl_estado_inst ON
    tbl_estado_inst.id_estado_inst = tbl_academico.id_estado_inst
    WHERE id_usuario=$id_usuarios AND activo=1
    ORDER BY tbl_instruccion.id_instruccion DESC limit 1
    
    
    ");

    if ($query->result() > 0) 
        return $query->row();
    else
        return [];			
}
}