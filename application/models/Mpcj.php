<?php
/**
* 
*/
class Mpcj extends CI_Model
{
	
	function __construct()
	{
        parent::__construct();
		$this->db2 = $this->load->database('pcj', TRUE);
	}

	public function getJovenCedula($datos){
		
		$this->db2->limit(1);
		$this->db2->select('count(*) AS cantidad');
		$this->db2->from('tbl_jovenes');
		$this->db2->where('cedula',$datos['cedula']);
		
		$resultado = $this->db2->get();

		$fila = $resultado->row();

		if ($fila->cantidad > 0) {
			return TRUE;
		}else{
			return FALSE;
		}
	}	

	public function getUsuarioRegistradoPcjViejo(){

		$this->db2->limit(1);
		$this->db2->where('cedula',$this->session->userdata('cedula'));
		//$this->db2->where('cedula','V16435179');
		$resultado = $this->db2->get('public.tbl_jovenes');


		if ($resultado->result() > 0) {
			return $resultado->row();
		}else{
			return FALSE;
		}
	}



}