<?php

    class Brigadas_estructuras_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();

          
        }

        public function post_regitrar($data){

		$this->db->insert('tbl_brigadas_estructuras',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
            

            return  true;
		}

        }


        public function obtener_id_brigada(){

            $this->db->select('max(id_brigada) as id_brigada');
            // $this->db->where('id_usuario_registro', $id);
            // $this->db->where('tbl_roles.activo', 1);
            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->row()->id_brigada+1;
            else $valor = 1;
    

            return $valor;
        }

        public function obtener_brigada_codigo($codigo){

            $this->db->select('tbl_brigadas_estructuras.*');
            $this->db->where('codigo', $codigo);
             $query = $this->db->get("tbl_brigadas_estructuras");
    
          
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];


            return $valor;


        }

        public function obtener_brigada_coord($cod_estado,$cod_municipio,$cod_parroquia,$id_rol_estructura){

            $this->db->select(' count(id_estructura) , tbl_brigadas_estructuras.id_brigada, tbl_brigadas_estructuras.id_usuario_registro, tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.codigoestado, tbl_brigadas_estructuras.codigomunicipio, tbl_brigadas_estructuras.codigoparroquia, 
            tbl_brigadas_estructuras.id_rol_estructura, tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on,
            tbl_brigadas_estructuras.codigo,
                
            

            estado.nombre as nombre_estado,municipio.nombre as municipio,parroquia.nombre as parroquia,roles.nombre as nombre_rol
            ');


            // estructura todos y un estado
            if($id_rol_estructura == "00" && $cod_municipio==01){
               
                $this->db->where("estado.codigoestado", $cod_estado);



            } else if($id_rol_estructura == "00" && $cod_parroquia==01){
               
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);



            }else if ($id_rol_estructura == "00" ){
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("tbl_brigadas_estructuras.codigoparroquia",$cod_parroquia);
                
            }else if ($id_rol_estructura != "00" && $cod_estado=='todos'){
          
                $this->db->where("id_rol_estructura", $id_rol_estructura);
            }
            
            else if  ($id_rol_estructura != "00" && $cod_municipio==01){
               
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("id_rol_estructura", $id_rol_estructura);
                $this->db->where("id_rol_estructura", $id_rol_estructura);


            } else if($id_rol_estructura != "00" && $cod_parroquia==01){
               
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("id_rol_estructura", $id_rol_estructura);


            }
            
            else if($id_rol_estructura != "00" ){
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("tbl_brigadas_estructuras.codigoparroquia",$cod_parroquia);
                $this->db->where("id_rol_estructura", $id_rol_estructura);
            }



            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia'); 
            $this->db->join('tbl_roles roles', 'roles.id_rol = tbl_brigadas_estructuras.id_rol_estructura'); 
            $this->db->join('tbl_estructuras', 'tbl_estructuras.id_brigada_estructura = tbl_brigadas_estructuras.id_brigada','left'); 
            
            $this->db->group_by('tbl_brigadas_estructuras.id_brigada, tbl_brigadas_estructuras.id_usuario_registro, tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.codigoestado, tbl_brigadas_estructuras.codigomunicipio, tbl_brigadas_estructuras.codigoparroquia, 
            tbl_brigadas_estructuras.id_rol_estructura, tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on,
            tbl_brigadas_estructuras.codigo, nombre_estado, municipio, parroquia, nombre_rol');

             $query = $this->db->get("tbl_brigadas_estructuras");
    
          
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];


            return $valor;


        }
        
        public function obtener_todas_brigadas_excel(){

            $this->db->select(' roles.nombre as nombre_rol,tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on as fecha_creacion,
            tbl_brigadas_estructuras.codigo, estado.nombre as estado,municipio.nombre as municipio,parroquia.nombre as parroquia,
              
            tbl_profesion_oficio.desc_profesion as profesion, 
              
              tbl_estructuras.cedula, tbl_estructuras.nombre, tbl_estructuras.apellidos, tbl_estructuras.tlf_celular, 
                            
              tbl_estructuras.tlf_coorparativo,tbl_estructuras.email,  talla_pantalon, talla_camisa,    fecha_nac,
              reponsabilidad.descripcion,
              edad, 
              tbl_instruccion.nivel as nivel_de_instruccion,
               genero

            ');

        

            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia'); 
            $this->db->join('tbl_roles roles', 'roles.id_rol = tbl_brigadas_estructuras.id_rol_estructura'); 
            $this->db->join('tbl_estructuras', 'tbl_estructuras.id_brigada_estructura = tbl_brigadas_estructuras.id_brigada','left'); 
            $this->db->join('tbl_responsabilidad_estructuras reponsabilidad', 'reponsabilidad.id_tipos = id_responsabilidad_estructura','left');
            $this->db->join('tbl_profesion_oficio', 'tbl_profesion_oficio.id_profesion = id_profesion_oficio','left');
            $this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = id_nivel_academico','left');


             $query = $this->db->get("tbl_brigadas_estructuras");
    
          
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];


            return $valor;


        }

        public function obtener_brigadas_excel($cod_estado,$cod_municipio,$cod_parroquia,$id_rol_estructura){

            $this->db->select(' roles.nombre as nombre_rol,tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on as fecha_creacion,
            tbl_brigadas_estructuras.codigo, estado.nombre as estado,municipio.nombre as municipio,parroquia.nombre as parroquia,
              
            tbl_profesion_oficio.desc_profesion as profesion, 
              
              tbl_estructuras.cedula, tbl_estructuras.nombre, tbl_estructuras.apellidos, tbl_estructuras.tlf_celular, 
                            
              tbl_estructuras.tlf_coorparativo,tbl_estructuras.email,  talla_pantalon, talla_camisa,    fecha_nac,
              reponsabilidad.descripcion,
              edad, 
              tbl_instruccion.nivel as nivel_de_instruccion,
               genero

            ');

            // estructura todos y un estado
            if($id_rol_estructura == "00" && $cod_municipio==01){
               
                $this->db->where("estado.codigoestado", $cod_estado);

            } else if($id_rol_estructura == "00" && $cod_parroquia==01){
               
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);

            }else if ($id_rol_estructura == "00" ){
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("tbl_brigadas_estructuras.codigoparroquia",$cod_parroquia);
                
            }else if ($id_rol_estructura != "00" && $cod_estado=='todos'){
          
                $this->db->where("id_rol_estructura", $id_rol_estructura);
            }else if  ($id_rol_estructura != "00" && $cod_municipio==01){
               
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("id_rol_estructura", $id_rol_estructura);
                $this->db->where("id_rol_estructura", $id_rol_estructura);

            } else if($id_rol_estructura != "00" && $cod_parroquia==01){
               
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("id_rol_estructura", $id_rol_estructura);

            }
            
            else if($id_rol_estructura != "00" ){
                $this->db->where("estado.codigoestado", $cod_estado);
                $this->db->where("tbl_brigadas_estructuras.codigomunicipio",$cod_municipio);
                $this->db->where("tbl_brigadas_estructuras.codigoparroquia",$cod_parroquia);
                $this->db->where("id_rol_estructura", $id_rol_estructura);
            }

            $this->db->where('tbl_estructuras.activo',1);
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia'); 
            $this->db->join('tbl_roles roles', 'roles.id_rol = tbl_brigadas_estructuras.id_rol_estructura'); 
            $this->db->join('tbl_estructuras', 'tbl_estructuras.id_brigada_estructura = tbl_brigadas_estructuras.id_brigada','left'); 
            $this->db->join('tbl_responsabilidad_estructuras reponsabilidad', 'reponsabilidad.id_tipos = id_responsabilidad_estructura','left');
            $this->db->join('tbl_profesion_oficio', 'tbl_profesion_oficio.id_profesion = id_profesion_oficio','left');
            $this->db->join('tbl_instruccion', 'tbl_instruccion.id_instruccion = id_nivel_academico','left');


            

             $query = $this->db->get("tbl_brigadas_estructuras");
    
          
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];


            return $valor;


        }

     


        public function obtener_brigadas($cod_estado='todos'){

            $this->db->select(' count(id_estructura) , tbl_brigadas_estructuras.id_brigada, tbl_brigadas_estructuras.id_usuario_registro, tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.codigoestado, tbl_brigadas_estructuras.codigomunicipio, tbl_brigadas_estructuras.codigoparroquia, 
            tbl_brigadas_estructuras.id_rol_estructura, tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on,
            tbl_brigadas_estructuras.codigo, estado.nombre as nombre_estado ,municipio.nombre as municipio,parroquia.nombre as parroquia ,roles.nombre as nombre_rol
            
            ');
        

            if($cod_estado != 'todos')
            $this->db->where("estado.codigoestado", $cod_estado);


            $this->db->join('tbl_roles roles', 'roles.id_rol = tbl_brigadas_estructuras.id_rol_estructura'); 
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia'); 
            $this->db->join('tbl_estructuras', 'tbl_estructuras.id_brigada_estructura = tbl_brigadas_estructuras.id_brigada','left'); 
            
            $this->db->group_by('tbl_brigadas_estructuras.id_brigada, tbl_brigadas_estructuras.id_usuario_registro, tbl_brigadas_estructuras.nombre_brigada, tbl_brigadas_estructuras.nombre_sector,
            tbl_brigadas_estructuras.codigoestado, tbl_brigadas_estructuras.codigomunicipio, tbl_brigadas_estructuras.codigoparroquia, 
            tbl_brigadas_estructuras.id_rol_estructura, tbl_brigadas_estructuras.latitud, tbl_brigadas_estructuras.longitud,
            tbl_brigadas_estructuras.direccion, tbl_brigadas_estructuras.created_on,
            tbl_brigadas_estructuras.codigo, nombre_estado, municipio, parroquia, nombre_rol');


            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


        
        public function obtener_brigadas_x_estados($id_rol){

            $this->db->select(' count(estado.nombre) as total,estado.nombre as estado
            
            ');
              if($id_rol !='0')
                $this->db->where('id_rol_estructura',$id_rol);

               $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
               $this->db->group_by('estado');

            $query = $this->db->get("tbl_brigadas_estructuras");
 
            if ($query->num_rows()) $valor = $query->result();
            else $valor = [];
    

            return $valor;
        }


        public function obtener_brigada_id($id_brigada){

            $this->db->select('tbl_brigadas_estructuras.id_brigada, 
            
            tbl_brigadas_estructuras.id_usuario_registro, 
            tbl_brigadas_estructuras.nombre_brigada, 
            tbl_brigadas_estructuras.nombre_sector, 
            tbl_brigadas_estructuras.id_rol_estructura, tbl_brigadas_estructuras.latitud, 
            
            tbl_brigadas_estructuras.longitud, 
            tbl_brigadas_estructuras.codigoestado, 
            tbl_brigadas_estructuras.codigomunicipio, 
            tbl_brigadas_estructuras.codigoparroquia, 
            tbl_brigadas_estructuras.direccion, 
            tbl_brigadas_estructuras.created_on, tbl_brigadas_estructuras.codigo, 

            estado.nombre as nombre_estado ,municipio.nombre as municipio,parroquia.nombre as parroquia,
            roles.nombre as nombre_rol
            
            ');

            $this->db->where('id_brigada', $id_brigada);
        
            $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_brigadas_estructuras.codigoestado');
            $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_brigadas_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_brigadas_estructuras.codigoparroquia');  
            $this->db->join('tbl_roles roles', 'roles.id_rol = tbl_brigadas_estructuras.id_rol_estructura'); 

            $query = $this->db->get("tbl_brigadas_estructuras");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];
    

            return $valor;
        }



        
        public function actualizar_brigada($id_brigada, $datos){
           

            $this->db->where('id_brigada', $id_brigada);
            $this->db->update('tbl_brigadas_estructuras', $datos);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

}


      

    }