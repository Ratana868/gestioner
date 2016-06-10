<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends MY_Controller {

	function __construct() {
		parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->model("tipos_prog");
         if($this->auth->is_logged() == FALSE)
         {
             redirect(base_url('admin/login'));            
         }

		
	}

    public function index()
    {
        
    }


}
