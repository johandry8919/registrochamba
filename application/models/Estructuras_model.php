<?php

    class Estructuras_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();
        }
      

       

        public function profesion_oficio(){



            $this->db->select('*');
            $this->db->from('tbl_profesion_oficio');
            $this->db->order_by('tbl_profesion_oficio', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }
        public function responsabilidad_estructuras(){



            $this->db->select('*');
            $this->db->from('tbl_responsabilidad_estructuras');
            $this->db->order_by('tbl_responsabilidad_estructuras', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }
        public function instruccion_academica(){



            $this->db->select('*');
            $this->db->from('tbl_instruccion');
            $this->db->order_by('tbl_instruccion', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }
        public function rango_Edad(){



            $this->db->select('*');
            $this->db->from('tbl_rango_edad');
            $this->db->order_by('tbl_rango_edad', 'ASC');
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) 
                return $query->result();
            else
                return [];
        }

      

        public function post_crearEstructura($data) {
            

            $this->db->trans_begin();
            $this->db->insert('tbl_estructuras', $data);
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

        public function actualizarPersonales($data){
            $datas = array(

                'nombres' => $data['nombres'],
				'apellidos' => $data['apellidos'],
				'fecha_nac' => $data['datepicker'],
                'cedula' => $data['cedula'],
                'tlf_celular' => $data['tlf_celular'],
                'tlf_fijo' => $data['tlf_fijo'],
                'email' => $data['email'],
                'direccion' => $data['direccion'],
                'id_profesion_oficio' => $data['id_profesion_oficio'],
                'id_responsabilidad_estructuras' => $data['id_responsabilidad_estructuras'],
                'id_instruccion' => $data['id_instruccion'],
                'id_estructura' => $data['id_estructura'],
                'id_usuario' => $data['id_usuario'],
                'id_estructura' => $data['id_estructura'],
              


            );
            $this->db->where('id_usuario', $data['id_usuario']);
            $this->db->update('tbl_estructuras', $datas);
            return true;

            
        }
        

        public function verificarSiUsuarioExiste($cedula,$correo,$rol_usuario){

            $this->db->limit(1);
            $this->db->select('count(*) AS cantidad');
            $this->db->from('public.tbl_usuarios');
            $this->db->where('cedula',$cedula);
            $this->db->or_where('email', $correo);
           // $this->db->where('id_rol', $rol_usuario);
            $resultado = $this->db->get();
    
            $fila = $resultado->row();
    
            if ($fila->cantidad > 0) {
                return TRUE;
            }else{
                return FALSE;
            }
        }

    public function verificarSiUsuarioExisteEstructura($cedula,$correo){

        $this->db->limit(1);
        $this->db->select('count(*) AS cantidad');
        $this->db->from('public.tbl_estructuras');
        $this->db->where('cedula',$cedula);
        $this->db->or_where('email', $correo);
        $this->db->where('tbl_estructuras.activo',1);
       // $this->db->where('id_rol', $rol_usuario);
        $resultado = $this->db->get();

        $fila = $resultado->row();

        if ($fila->cantidad > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function verificarSiUsuarioExisteEstructuras($cedula){

        $this->db->limit(1);
        $this->db->select('count(*) AS cantidad');
        $this->db->from('public.tbl_estructuras');
        $this->db->where('cedula',$cedula);
        $this->db->where('tbl_estructuras.activo',1);
       // $this->db->where('id_rol', $rol_usuario);
        $resultado = $this->db->get();

        $fila = $resultado->row();

        if ($fila->cantidad > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    // hacer un get a tbl_estructuras para  ver todo lo datos de la tabla
    
    public function getestructuras() {
       
        $this->db->select('*,estado.nombre as estado,municipio.nombre as municipio,parroquia.nombre as parroquia,tbl_estructuras.nombre');
        $this->db->from('public.tbl_estructuras');
        $this->db->order_by('tbl_estructuras', 'ASC');
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');

        $query = $this->db->get();

        if ($query->num_rows() > 0) 
            return $query->result();
        else
            return FALSE;

       
    }

   
    public function actualizar_estructura($id_estructura,$datos){
           
        $this->db->where('id_estructura', $id_estructura);
 
        $this->db->update('tbl_estructuras', $datos);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

    }
 
	public function getEditEstruturaID($id){
        $this->db->select('public.tbl_estructuras.*,
        estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,direccion,genero
        ');
       
        $this->db->where('id_estructura',$id);
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');
        $query = $this->db->get("tbl_estructuras");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];
    

            return $valor;

 
    }



     
	public function obtener_estructura_id_usuario($id){
        $this->db->select('public.tbl_estructuras.*,
        estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,direccion,genero
        ');
       
        $this->db->where('id_usuario',$id);
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');
   
        $query = $this->db->get("tbl_estructuras");
    
            if ($query->num_rows()) $valor = $query->row();
            else $valor = [];
    

            return $valor;

 
    }

    public function getUsuarioRegistradoPersonal(){

        $this->db->select('*');
        $this->db->from('public.tbl_estructuras');
    
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            return $query->result();
        else{
            return FALSE;
        }

                                                      
    }
    public function update_Estructura($datos,$id_estructura){
        //actualizar estructura
        //por la cedula del usuario
        $this->db->where('id_estructura',$id_estructura);

        $this->db->update('tbl_estructuras', $datos);

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        


	}
    public function obtener_estrucutras($id=1){
        $this->db->select('public.tbl_estructuras.*,
        estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,direccion
        ');
       
      //  $this->db->where('id_responsabilidad_estructura',$id);
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');
        $query = $this->db->get("tbl_estructuras");
    
        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;

 
    }

    public function obtener_Estructura_coord($cod_estado,$cod_municipio,$cod_parroquia){

        $this->db->select('public.tbl_estructuras.*,
        estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,direccion
        ');
      
        if($cod_municipio==01){
            $this->db->where("estado.codigoestado", $cod_estado);
        }else if($cod_parroquia==01){
            $this->db->where("tbl_estructuras.codigomunicipio",$cod_municipio);
        }else{
            $this->db->where("estado.codigoestado", $cod_estado);
            $this->db->where("tbl_estructuras.codigomunicipio",$cod_municipio);
            $this->db->where("tbl_estructuras.codigoparroquia",$cod_parroquia);
        }

      //  $this->db->where('id_responsabilidad_estructura',$id);
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');

        $query = $this->db->get("tbl_estructuras");

        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;
    }


    public function obtener_integrantes_estrucutras_id_brigadas($id){
        $this->db->select('public.tbl_estructuras.*,
        estado.codigoestado, municipio.nombre as nombre_municipio,parroquia.nombre as nombre_parroquia, municipio.codigomunicipio,parroquia.codigoparroquia,direccion,
        reponsabilidad.descripcion as reponsabilidad
        ');
       
        $this->db->where('tbl_estructuras.activo',1);
        $this->db->where('id_brigada_estructura',$id);
        $this->db->join('tbl_estado estado', 'estado.codigoestado = tbl_estructuras.codigoestado');
        $this->db->join('tbl_municipio municipio', 'municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
        $this->db->join('tbl_parroquia parroquia', 'parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');
        $this->db->join('tbl_responsabilidad_estructuras reponsabilidad', 'reponsabilidad.id_tipos = id_responsabilidad_estructura');

        $query = $this->db->get("tbl_estructuras");
    
        if ($query->num_rows()) $valor = $query->result();
        else $valor = [];


        return $valor;

 
    }

}




    




?>