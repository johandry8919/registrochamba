<?php

    class Empresas_entes_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar_empresa($data){
        
    
            $this->db->insert('tbl_empresas_entes', $data);
            if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
            $insert_id = $this->db->insert_id();

            return  $insert_id;
		}

        
        }
            //pos_crearUniversidades
    public function pos_crearUniversidades($data) {

      
        $this->db->insert('tbl_empresas_entes', $data);
        if ($this->db->trans_status() === FALSE)
    {
        $this->db->trans_rollback();
        return false;
    }
    else
    {
        $insert_id = $this->db->insert_id();

            return  $insert_id;
    }

    }
		
    public function Estructura_crearUniversidades($data) {

      
        $this->db->insert('tbl_estructuras', $data);
        if ($this->db->trans_status() === FALSE)
    {
        $this->db->trans_rollback();
        return false;
    }
    else
    {
        $insert_id = $this->db->insert_id();

            return  $insert_id;
    }

    }
		

        public function verificarSiExiste($campo,$valor){

            $this->db->where($campo, $valor);
            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = false;
    

            return $valor;
        }

        public function obtener_empresas($id_tipo_empresa = 1){
           

            $this->db->select(' distinct(tbl_empresas_entes.id_empresas), 
            tbl_empresas_entes.id_tipo_empresas_universidades, 
            tbl_empresas_entes.id_usuario_registro, 
            tbl_empresas_entes.nombre_razon_social, tbl_empresas_entes.rif, 
            tbl_empresas_entes.email, tbl_empresas_entes.actividad_economica, 
            tbl_empresas_entes.instagram, tbl_empresas_entes.twitter,
            tbl_empresas_entes.facebook,  tbl_empresas_entes.created_on,
            tbl_empresas_entes.latitud, tbl_empresas_entes.longitud,
            re.id_usuario,  re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,
            
      
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, re.cargo, productivo,
            re.id_representantes,estado.nombre as nombre_estado ,tbl_empresas_entes.direccion,
            
            count(tbl_ofertas_empleo.id_oferta) as cantidad_oferta,  
            municipio.nombre as municipio,parroquia.nombre as parroquia, tbl_empresas_entes.latitud, tbl_empresas_entes.longitud
  
                    
            ');
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_empresas_entes.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_empresas_entes.codigoparroquia');  
            $this->db->join('tbl_ofertas_empleo', 'tbl_ofertas_empleo.id_empresa_ente = tbl_empresas_entes.id_empresas','left');
            $this->db->group_by(' 
        
            id_empresas, 
            id_tipo_empresas_universidades, 
             
            nombre_razon_social, rif, 
            tbl_empresas_entes.email, tbl_empresas_entes.actividad_economica, 
            instagram, twitter,
            facebook,  tbl_empresas_entes.created_on,
             id_usuario,  cedula,  noombre_representante, 
             apellido_representante,  celular_representante,tbl_empresas_entes.direccion,
             tlf_local_representante, email_representante, re.cargo, productivo,
             re.id_representantes, nombre_estado, 
             cantidad_oferta,  municipio, parroquia
            ');
            $this->db->order_by("tbl_empresas_entes.id_empresas", "desc");
            $query = $this->db->get("tbl_empresas_entes");
       
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }

        public function obtener_universidades($id_tipo_empresa = 2){
           

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,tbl_empresas_entes.direccion,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, re.cargo, productivo,
            re.id_representantes,estado.nombre as nombre_estado ,re.direccion,            
            count(tbl_solicitudes_estudios.id_solicitud) as cantidad_oferta,
            municipio.nombre as municipio,parroquia.nombre as parroquia
  
                    
            ');
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_empresas_entes.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_empresas_entes.codigoparroquia');  
            $this->db->join('tbl_solicitudes_estudios', 'tbl_solicitudes_estudios.id_empresa_entes = tbl_empresas_entes.id_empresas','left');
            $this->db->group_by('tbl_empresas_entes.id_empresas, 
            tbl_empresas_entes.id_tipo_empresas_universidades,
             tipo_empresa,  nombre_razon_social, tbl_empresas_entes.rif, tbl_empresas_entes.tlf_celular, tbl_empresas_entes.tlf_local, tbl_empresas_entes.email, actividad_economica, id_sector_economico, instagram, twitter, facebook, 
             tbl_empresas_entes.codigoestado, tbl_empresas_entes.codigomunicipio,
             tbl_empresas_entes.codigoparroquia, tbl_empresas_entes.latitud, tbl_empresas_entes.longitud, tbl_empresas_entes.direccion,
             re.id_usuario,re.id_usuario_registro,re.cedula,re.nombre,re.apellidos,re.tlf_celular,re.tlf_local,re.email,re.cargo,
             sp.productivo,re.id_representantes,estado.nombre, municipio, parroquia
           
            ');
            $this->db->order_by("tbl_empresas_entes.id_empresas", "desc");
            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }
        
        public function obtener_empresas_coord($id_tipo_empresa,$cod_estado,$cod_municipio,$cod_parroquia){

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,tbl_empresas_entes.direccion,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, re.cargo, productivo,
            re.id_representantes,estado.nombre as nombre_estado ,re.direccion,
            count(tbl_ofertas_empleo.id_oferta) as cantidad_oferta
                    
            ');
          

            if($cod_municipio==01){
                $this->db->where("estado.codigoestado", $cod_estado);
            }else if($cod_parroquia==01){
                $this->db->where("tbl_empresas_entes.codigomunicipio",$cod_municipio);
            }else{
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("tbl_empresas_entes.codigomunicipio",$cod_municipio);
                $this->db->where("tbl_empresas_entes.codigoparroquia",$cod_parroquia);
            }
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);

            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_empresas_entes.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_empresas_entes.codigoparroquia');  
            $this->db->join('tbl_ofertas_empleo', 'tbl_ofertas_empleo.id_empresa_ente = tbl_empresas_entes.id_empresas','left');

            $this->db->group_by('tbl_empresas_entes.id_empresas, 
            tbl_empresas_entes.id_tipo_empresas_universidades,
             tipo_empresa,  nombre_razon_social, tbl_empresas_entes.rif, tbl_empresas_entes.tlf_celular, tbl_empresas_entes.tlf_local, tbl_empresas_entes.email, actividad_economica, id_sector_economico, instagram, twitter, facebook, 
             tbl_empresas_entes.codigoestado, tbl_empresas_entes.codigomunicipio,
             tbl_empresas_entes.codigoparroquia, tbl_empresas_entes.latitud, tbl_empresas_entes.longitud, tbl_empresas_entes.direccion, tbl_ofertas_empleo,

             re.id_usuario, re.id_usuario_registro, re.cedula,  noombre_representante, 
             apellido_representante,  celular_representante,tbl_empresas_entes.direccion,
             tlf_local_representante, email_representante, re.cargo, productivo,
             re.id_representantes, nombre_estado, re.direccion,
             cantidad_oferta
            ');
            $this->db->order_by("tbl_empresas_entes.id_empresas", "desc");
            $query = $this->db->get("tbl_empresas_entes");
    
            //print_r($this->db->last_query());

            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }








        public function obtener_empresa($id_tipo_empresa= 1,$id_empresa){

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, cargo, productivo,
            re.id_representantes, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,tbl_empresas_entes.direccion
  
                    
            ');
            $this->db->where("tbl_empresas_entes.id_empresas", $id_empresa);
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_empresas_entes.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_empresas_entes.codigoparroquia');
           
            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];
    

            return $valor;
        }

        

        public function obtener_univerdidad($id_tipo_empresa = 2){
        

            $this->db->select(' tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante,estado.nombre as nombre_estado,
            
            re.tlf_local as tlf_local_representante, re.email as email_representante, re.cargo, productivo,

            count(tbl_ofertas_empleo.id_oferta) as cantidad_oferta
  
                    
            ');
            $this->db->where("id_tipo_empresas_universidades", $id_tipo_empresa);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');
            $this->db->join('tbl_ofertas_empleo', 'tbl_ofertas_empleo.id_empresa_ente = tbl_empresas_entes.id_empresas','left');
            $this->db->group_by('tbl_empresas_entes.id_empresas, 
            tbl_empresas_entes.id_tipo_empresas_universidades,
             tipo_empresa,  nombre_razon_social, tbl_empresas_entes.rif, tbl_empresas_entes.tlf_celular, tbl_empresas_entes.tlf_local, tbl_empresas_entes.email, actividad_economica, id_sector_economico, instagram, twitter, facebook, 
             tbl_empresas_entes.codigoestado, tbl_empresas_entes.codigomunicipio,
             tbl_empresas_entes.codigoparroquia, tbl_empresas_entes.latitud, tbl_empresas_entes.longitud, tbl_empresas_entes.direccion, tbl_ofertas_empleo,

             re.id_usuario, re.id_usuario_registro, re.cedula,  noombre_representante, 
             apellido_representante,  celular_representante,tbl_empresas_entes.direccion,
             tlf_local_representante, email_representante, re.cargo, productivo,
             re.id_representantes, nombre_estado, re.direccion,
             cantidad_oferta
            ');
            $this->db->order_by("tbl_empresas_entes.id_empresas", "desc");
            $query = $this->db->get("tbl_empresas_entes");
            
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }
        public function obtener_representante_universidad($id){
        

            $this->db->select('tbl_empresas_entes.*,
            re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
            re.apellidos as apellido_representante, re.tlf_celular as celular_representante, re.id_usuario,  re.id_empresas_entes,
            tbl_empresas_entes.tlf_celular as tlf_celular_empresa, re.id_representantes,tbl_empresas_entes.direccion,
         
            re.tlf_local as tlf_local_representante, re.email as email_representante, cargo, productivo,re.tlf_celular,
            estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia , re.direccion
                    
            ');
            $this->db->where("id_empresas", $id);
            $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_empresas_entes.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_empresas_entes.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_empresas_entes.codigoparroquia');
            $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
      
            // traer la direccion = tbl_representantes_empresas_entes
 

            $query = $this->db->get("tbl_empresas_entes");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];
    

            return $valor;
        }



    public function update_Universidades($datos,$id){
        //actualizar tbl_empresas_entes
        //por la id_empresa 
       
        $this->db->where('id_empresas', $id);
        $this->db->update('tbl_empresas_entes', $datos);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }


}
    public function update_epresas($datos,$id){
        //actualizar tbl_empresas_entes
        //por la id_empresa 
       
        $this->db->where('id_empresas', $id);
        $this->db->update('tbl_empresas_entes', $datos);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }


}

public function pos_EstructuraUniversidades($data) {

      
    $this->db->insert('tbl_estructuras', $data);
    if ($this->db->trans_status() === FALSE)
{
    $this->db->trans_rollback();
    return false;
}
else
{
    $insert_id = $this->db->insert_id();

        return  $insert_id;
}

}


public function obtener_Estructuras($id = 3){
        

    $this->db->select(' tbl_empresas_entes.*,
    re.id_usuario, re.id_usuario_registro, re.cedula, re.nombre as noombre_representante, 
    re.apellidos as apellido_representante, re.tlf_celular as celular_representante,
    
    re.tlf_local as tlf_local_representante, re.email as email_representante, cargo, productivo

            
    ');
    $this->db->where("id_tipo_empresas_universidades", $id);
    $this->db->join('tbl_representantes_empresas_entes re', 're.id_empresas_entes = tbl_empresas_entes.id_empresas');
    $this->db->join('tbl_sector_productivo sp', 'sp.id = tbl_empresas_entes.id_sector_economico');
    $this->db->order_by("tbl_empresas_entes.id_empresas", "desc");
    $query = $this->db->get("tbl_empresas_entes");

    if ($query->num_rows()) $valor = $query->result();
    else $valor = [];


    return $valor;
}


    }
