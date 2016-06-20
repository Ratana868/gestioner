<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends MY_Controller {

	function __construct() {
		parent::__construct();

        if($this->auth->is_logged() == FALSE)
        {
            redirect(base_url('login'));            
        }
       //$this->output->enable_profiler(TRUE);		
	}

	public function index(){

		$data['active'] = "administrador";
        $data['sub_active'] = "usuarios";

		$this->load->view('admin/calendario',$data);
	}


}