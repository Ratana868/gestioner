<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos_programas extends MY_Controller {

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
        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";

        $data['tipos'] = $this->tipos_prog->read("id, tipo, descripcion", "id","ASC");  

        $this->display('admin/tipos_programas/listado',$data);
    }

    public function agregar()
    {


        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('tipo', 'Nombre', 'required|trim');
  



        if ($this->form_validation->run()) {

            $post = array("tipo" => $this->input->post('tipo'),"descripcion" => $this->input->post('descripcion'));

            
               
            $res = $this->tipos_prog->create($post);

            
            if($res){
                redirect("admin/tipos_programas");
            }
                
            
            
        }

        $this->display("admin/tipos_programas/agregar",$data);

    }

    public function editar($id_tipo = '')
    {

        $tipo = $this->tipos_prog->get_tipo($id_tipo);
    
        $data = object2array($tipo);
        $data['id_tipo'] = $id_tipo;
        $data['active'] = "programa";
        $data['sub_active'] = "seguridad";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('tipo', 'Nombre', 'required|trim');


        if ($this->form_validation->run()) {
            $post = array("tipo" => $this->input->post('tipo'),"descripcion" => $this->input->post('descripcion'));

              $result = $this->tipos_prog->update_tipo_id($id_tipo, $post);

            if ($result) {
                redirect("admin/tipos_programas");
            }    
        }

        $this->display("admin/tipos_programas/editar", $data);

    }

    public function eliminar($id_tipo)
    {
        $result = $this->tipos_prog->delete('id',$id_tipo);

        echo json_encode($result);

    }



}