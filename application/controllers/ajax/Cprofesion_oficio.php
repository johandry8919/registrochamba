<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprofesion_oficio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mprofesion_oficio');
  
    }

    
}