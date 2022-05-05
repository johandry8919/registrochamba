<?php

    class Estructuras_model extends CI_Model {

        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function estruturaregistrado(){

            $this->db->select(' tbl_estructuras.*,
                                tbl_estado.nombre AS estado, 
                                tbl_municipio.nombre AS municipio, 
                                tbl_parroquia.nombre AS parroquia,

                                ');
            $this->db->limit(1);
            // $this->db->where('codigo',$codigo);
            $this->db->join('tbl_estado', 'tbl_estado.codigoestado = tbl_estructuras.codigoestado');
            $this->db->join('tbl_municipio', 'tbl_municipio.codigomunicipio = tbl_estructuras.codigomunicipio');
            $this->db->join('tbl_parroquia', 'tbl_parroquia.codigoparroquia = tbl_estructuras.codigoparroquia');
            $resultado = $this->db->get('tbl_estructuras');
    
    
            if ($resultado->result() > 0 ) {
                return $resultado->row();
            }else{
                return FALSE;

            }
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

      

        public function post_crearEstructura($data) {
            


            $estrutura = array(
                "nombre" => $data['nombre'],
                "apellidos" => $data['apellidos'],
                "email" => $data['email1'],
                "tlf_celular" => $data['telf_movil'],
                "tlf_coorparativo" => $data['telf_local'],
                "cedula" => $data['cedula'],
                "Fecha_nac" => $data['Fecha_nac'],
                "edad" => $data['edad'],
                "id_profesion_oficio" => $data['profesion'],
                "id_nivel_academico" => $data['academico'],
                "codigoestado" => $data['cod_estado'],
                "codigomunicipio" => $data['codigomunicipio'],
                "codigoparroquia" => $data['cod_parroquia'],
                "direccion" => $data['direccion'],
                "id_responsabilidad_estructura" => $data['estructura_res'],
                "talla_pantalon" => $data['talla_pantalon'],
                "talla_camisa" => $data['talla_camisa'],
                "latitud" => $data['latitud'],
                "longitud" => $data['longitud'],
                "id_usuario" => 2,
                "id_usuario_registro" => 2,

            );
            $this->db->trans_begin();
            $this->db->insert('tbl_estructuras', $estrutura);
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

      

 
    }


?>