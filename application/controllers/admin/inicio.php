<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->library('bcrypt');
        if($this->auth->is_logged() == FALSE)
        {
            redirect(base_url('login'));            
        }
       //$this->output->enable_profiler(TRUE);		
	}

	public function index(){

		$data['active'] = "administrador";
        $data['sub_active'] = "usuarios";

		$this->display('admin/inicio',$data);
	}

}