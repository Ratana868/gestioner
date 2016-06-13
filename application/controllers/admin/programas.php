<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends MY_Controller {

	function __construct() {
		parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->model("empresas");
        $this->load->model("tipos_prog");
        $this->load->model("program");
         if($this->auth->is_logged() == FALSE)
         {
             redirect(base_url('admin/login'));            
         }

		
	}

    public function index()
    {

    }

    public function listado($id_empresa)
    {
        $empresa = $this->empresas->get_emp($id_empresa);
        $data = object2array($empresa);
        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";
        
        $data['program_seguridad'] = $this->program->get_prog_emp($id_empresa);

        $this->display('admin/programas/listado',$data);  
    }

    public function agregar($id_empresa)
    {
        $empresa = $this->empresas->get_emp($id_empresa);
        $data = object2array($empresa);
        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";

        $data['tipos'] = $this->tipos_prog->read("id, tipo", "id","ASC");  


        $this->display('admin/programas/agregar', $data);


    }



}
