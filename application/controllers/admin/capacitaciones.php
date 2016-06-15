<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capacitaciones extends MY_Controller {

	function __construct() {
		parent::__construct();
        $this->output->enable_profiler(TRUE);
        $this->load->model("empresas");
        $this->load->model("capacitacion");
        $this->load->model("estados");
        $this->load->model("tipos_capacit");
        $this->load->model("programacion_capacitaciones");
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
        
        $data['capacitacion'] = $this->capacitacion->get_capacit_emp($id_empresa);



        $this->display('admin/capacitaciones/listado',$data);  
    }

    public function agregar($id_empresa)
    {
        $empresa = $this->empresas->get_emp($id_empresa);
        $data = object2array($empresa);
        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";

        $data['tipos'] = $this->tipos_capacit->read("id, tipo", "tipo","ASC");
        
        $this->form_validation->set_rules('empresa', 'Empresa', 'required|trim');
        $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim');
        $this->form_validation->set_rules('mail', 'Email Responsable', 'valid_email');
        $this->form_validation->set_rules('id_tipo', 'Tipo', 'required|trim');
        $this->form_validation->set_rules('temas', 'Temas', 'required|trim');
        $this->form_validation->set_rules('costo', 'Costo', 'required');
        $this->form_validation->set_rules('alcance', 'Alcance', 'required');

        if ($this->form_validation->run()) {


            $post = array("id_empresa" => $id_empresa, "id_tipo" => $this->input->post('id_tipo'),
                "responsable" => $this->input->post('responsable'),"temas" => $this->input->post('temas'), 
                "alcance" => $this->input->post('alcance'), "costo" => $this->input->post('costo'), "mail_responsable" => $this->input->post('mail'));

            $res = $this->capacitacion->create($post);

            
            if($res){
                redirect("admin/capacitaciones/listado/".$id_empresa);
            }



        }  
        
        $this->display('admin/capacitaciones/agregar', $data);

    }

    public function programar($id_empresa,$id_capacitacion)
    {
        //$empresa = $this->empresas->get_emp($id_empresa);
        
        $capacitacion = $this->capacitacion->get_capacit($id_capacitacion);
        $data = object2array($capacitacion);

        //$capacitacion = $this->capacitacion->get_capacit();
        $data['active'] = "capacitacion";
        $data['sub_active'] = "";
        $data['estados'] = $this->estados->read("id, tipo", "tipo","ASC");
        $data['programacion'] = $this->programacion_capacitaciones->read("id,id_capacitacion, fecha, observaciones, id_estado","fecha","DESC");
        $data['programacion_capac'] = $this->programacion_capacitaciones->get_programacion($id_capacitacion);
        
        
        $this->display('admin/capacitaciones/programar', $data);

    }

    public function agregar_programacion($id_capacitacion='')
    {

        $fecha= $this->input->post('fecha');
        $nueva_fecha= fecha_to_mysql($fecha);

        $post = array("fecha" => $nueva_fecha, "id_capacitacion" => $this->input->post("id_capacitacion"), "observaciones" => $this->input->post("observaciones"), "id_estado" => $this->input->post("id_estado"));
        print_r($post);


        $res = $this->programacion_capacitaciones->create($post);
        echo json_encode($res);
    }

    public function enviar_notificacion()
    {
        echo "Entraaaaaaaaaaaa";
    }


}