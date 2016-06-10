<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("empresas");
        $this->load->model("provincias");
        $this->load->model("localidades");

        $this->output->enable_profiler(TRUE);
         if($this->auth->is_logged() == FALSE)
         {
             redirect(base_url('admin/login'));            
         }

		
	}

	public function index()
	{

		$data['active'] = "empresa";
        $data['sub_active'] = "";

        $data['empresas'] = $this->empresas->get_empresas("id","ASC");
               
        
		$this->display("admin/empresas/listado-empresas",$data);

	}

	public function agregar()
	{
        $data['provincias'] = $this->provincias->read('id, provincia', 'provincia', 'ASC');

		$data['active'] = "empresa";
        $data['sub_active'] = "";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim');
        $this->form_validation->set_rules('id_localidad', 'Localidad', 'required|trim');
        $this->form_validation->set_rules('id_provincia', 'Provincia', 'required|trim');
        $this->form_validation->set_rules('cuit', 'CUIT', 'trim');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
       
        



        if ($this->form_validation->run()) {

        	$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'),
                "id_localidad" => $this->input->post('id_localidad'), "id_provincia" => $this->input->post('id_provincia'),
                "direccion" => $this->input->post('direccion'),"cuit" => $this->input->post('cuit'), 
                "descripcion" => $this->input->post('descripcion'));

            
               
            $res = $this->empresas->create($post);

            
            if($res){
                redirect("admin/empresa");
            }
                
            
            
        }

		$this->display("admin/empresas/agregar",$data);
	}

	public function editar($id_empresa = '')
	{
		$empresa = $this->empresas->get_emp($id_empresa);
        $prov = $empresa->id_provincia;

		$data = object2array($empresa);
        $data['id_empresa'] = $id_empresa;
        $data['active'] = "empresa";
        $data['sub_active'] = "";


        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim');
        $this->form_validation->set_rules('id_localidad', 'Localidad', 'required|trim');
        $this->form_validation->set_rules('id_provincia', 'Provincia', 'required|trim');
        $this->form_validation->set_rules('cuit', 'CUIT', 'trim');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

        if ($this->form_validation->run()) {
			$post = array("nombre" => $this->input->post('nombre'),"responsable" => $this->input->post('responsable'),
                "id_localidad" => $this->input->post('id_localidad'), "id_provincia" => $this->input->post('id_provincia'),
                "direccion" => $this->input->post('direccion'),"cuit" => $this->input->post('cuit'), 
                "descripcion" => $this->input->post('descripcion'));

            $result = $this->empresas->update_empresa_id($id_empresa, $post);

            if ($result) {
                redirect("admin/empresa");
            }
        }
        $data['provincias'] = $this->provincias->read('id, provincia', 'provincia', 'ASC');
        $data['localid'] = $this->localidades->get_provincia('localidad', 'ASC', $prov);

        $this->display("admin/empresas/editar", $data);

	}

	public function eliminar($id_empresa)
	{
        
        $result = $this->empresas->delete('id',$id_empresa);

        echo json_encode($result);

	}

    public function panel($id_empresa)
    {
        $emp = $this->empresas->get_emp($id_empresa);
        $data = object2array($emp);
        $data['active'] = "empresa";
        $data['sub_active'] = "";

        $this->display("admin/empresas/panel", $data);
    }


}