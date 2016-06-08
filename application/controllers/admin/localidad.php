<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localidad extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model("localidades");
		
         if($this->auth->is_logged() == FALSE)
         {
             redirect(base_url('admin/login'));            
         }
       //$this->output->enable_profiler(TRUE);		
	}

	public function index()
	{

	}

	public function get_locali()
	{

        $id_provincia= $this->input->post('id_provincia');
        
        $localidad_provincia= $this->localidades->read_by("id_provincia", $id_provincia, "id, localidad");
        
        $html = "<option value=''>Seleccionar Localidad</option>";
        
        foreach ($localidad_provincia as $l) {
            $html .= "<option value='".$l->id."'>".$l->localidad."</option>";
        }
     
        echo $html;
	}


}