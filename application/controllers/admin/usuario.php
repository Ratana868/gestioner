<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->library('bcrypt');
         if($this->auth->is_logged() == FALSE)
         {
             redirect(base_url('admin/login'));            
         }
       //$this->output->enable_profiler(TRUE);

		
	}

	public function index()
	{
		$data['active'] = "administrador";
        $data['sub_active'] = "usuario";
        

        $data['usuarios'] = $this->user->get_list("id", "ASC");      
        
		$this->display("admin/usuarios/listado-usuarios",$data);
	}

	
    public function agregar()
    {

    	//$data['perfiles'] = $this->user->get_perfiles('perfil');

		$data['active'] = "administrador";
        $data['sub_active'] = "usuario";

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('username', 'Usuario', 'required|trim');        
        $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');        
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');



        if ($this->form_validation->run()) {

		        $password = $this->input->post('password');        
		        $hash = $this->bcrypt->hash_password($password);


		                //comprobamos si el password se ha encriptado
		        if ($this->bcrypt->check_password($password, $hash))
		        {

		            $post = array("username" => $this->input->post('username'),"nombre_apellido" => $this->input->post('nombre'), "password" => $hash, 
		                          "mail" => $this->input->post('email'));

		            $res = $this->user->create($post);
		          if($res)
		          {
		            redirect(base_url().'admin/usuario');
		          }
		        }
		        else
		        {
		            return false;     
		        }             
        }

        $this->display("admin/usuarios/agregar", $data);


    }

	public function editar($id_usuario = '')
	{
		$usuario = $this->user->get_user($id_usuario);
    
        $data = object2array($usuario);
        $data['id_usuario'] = $id_usuario;
        $data['active'] = "administrador";
        $data['sub_active'] = "usuario";


        $data['hash'] = '';
        //$data['hash'] = $this->bcrypt->hash_password($usuario->password);

        //echo $password;
        //$hash = $this->bcrypt->hash_password($usuario->password);

        $this->form_validation->set_error_delimiters('<li> ', '</li>');
        
        $this->form_validation->set_rules('username', 'Usuario', 'required|trim');
        $this->form_validation->set_rules('nombre', 'Nombre y Apellido', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email');


        if ($this->form_validation->run()) {

            $password = $this->input->post('password');        
            $hash = $this->bcrypt->hash_password($password);

            if ($this->bcrypt->check_password($password, $hash))
            {
            $post = array("username" => $this->input->post('username'),"nombre_apellido" => $this->input->post('nombre'), "password" => $hash,  
                            "mail" => $this->input->post('email'));

            $result = $this->user->update_user($id_usuario, $post);

                if ($result) {
                    redirect(base_url().'admin/usuario');
                }
            }
            else
            {
                return false;     
            }     
        }

        $this->display("admin/usuarios/editar", $data);

	}

	public function eliminar($id_usuario)
	{
		$result = $this->user->delete("id",$id_usuario);        

        echo json_encode($result);
	}


}