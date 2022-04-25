<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CusuariosAdmin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Musuarios');
        $this->load->model('Mpcj');
        $this->load->library('email');
        $this->load->library('form_validation'); 
        //$this->load->library('security');
        //$this->output->enable_profiler(TRUE);
    }

	public function index()
	{
        if ($this->session->userdata('id_usuario')) {
            redirect('inicio');
        }        
        // $this->load->view('layouts/head');
		$this->load->view('admin/inicio');
	}
}