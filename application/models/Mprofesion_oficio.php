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


	public function emprendedor(){



		$this->db->select('*');
		$this->db->from('tbl_desarrollo_emprendedor');
		$this->db->order_by('tbl_desarrollo_emprendedor', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}
	public function SectorProductivo(){



		$this->db->select('*');
		$this->db->from('tbl_sector_productivo');
		$this->db->order_by('tbl_sector_productivo', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}
	public function movimiento_religioso(){



		$this->db->select('*');
		$this->db->from('tbl_movimiento_religioso');
		$this->db->order_by('tbl_movimiento_religioso', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}
	public function movimiento_sociales(){



		$this->db->select('*');
		$this->db->from('tbl_movimiento_sociales');
		$this->db->order_by('tbl_movimiento_sociales', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}
	public function especializacion(){



		$this->db->select('*');
		$this->db->from('tbl_sector_de_especializacion');
		$this->db->order_by('tbl_sector_de_especializacion', 'ASC');
		$query = $this->db->get();

		if ($query->num_rows() > 0) 
			return $query->result();
		else
			return [];
	}

}