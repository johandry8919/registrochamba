<?php
/**
* 
*/
class Mprofesion_oficio extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


    public function getprofesion(){



		$this->db->select('*');
		$this->db->from('tbl_profesion_oficio');
		$this->db->order_by('tbl_profesion_oficio', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}

}