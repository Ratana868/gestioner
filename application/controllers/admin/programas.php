<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends MY_Controller {

	function __construct() {
		parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->model("empresas");
        $this->load->model("tipos_prog");
        $this->load->model("program");
        $this->load->model("frecuencias");
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

        $data['tipos'] = $this->tipos_prog->read("id, tipo", "tipo","ASC");  
        $data['frecuencias'] = $this->frecuencias->read("id, frecuencia", "id","ASC");

        $this->form_validation->set_rules('fecha', 'Fecha', 'required|trim');
        $this->form_validation->set_rules('empresa', 'Empresa', 'required|trim');
        $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim');
        $this->form_validation->set_rules('id_tipo', 'Tipo', 'required|trim');
        $this->form_validation->set_rules('acciones', 'Acciones', 'required|trim');
        $this->form_validation->set_rules('id_frecuencia', 'Frecuencia', 'required');
        $this->form_validation->set_rules('observaciones', 'Observaciones', 'required');


        if ($this->form_validation->run()) {

            $fecha= $this->input->post('fecha');
            $nueva_fecha= fecha_to_mysql($fecha);

            $post = array("fecha" => $nueva_fecha, "id_empresa" => $id_empresa, "id_tipo" => $this->input->post('id_tipo'),
                "responsable" => $this->input->post('responsable'),"acciones" => $this->input->post('acciones'), 
                "id_frecuencia" => $this->input->post('id_frecuencia'), "observaciones" => $this->input->post('observaciones'));

            $res = $this->program->create($post);

            
            if($res){
                redirect("admin/programas/listado/".$id_empresa);
            }



        }


        $this->display('admin/programas/agregar', $data);


    }



}
