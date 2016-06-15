<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->library('bcrypt');
        
        //$this->output->enable_profiler(TRUE);
        $this->removeCache();

    }
    
    public function index()
    {   
    
        $data['titulo'] = 'Login con roles de usuario en codeigniter';
        $data['token'] = $this->token();
        $this->load->view('admin/login',$data);
                    
        
    }
 
    public function ingreso()
    {

        //echo "Token=".$this->input->post('token');
        //echo "Token session=".$this->session->userdata('token');
        if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
        {
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|max_length[150]|xss_clean');
            
            //lanzamos mensajes de error si es que los hay

            $this->form_validation->set_message('required', 'El campo es requerido');
            
            if($this->form_validation->run() == FALSE)
            {                                           
                $this->index();
            }else{
                $username = $this->input->post('username');
                //echo $username;
                $password = $this->input->post('password');
                //echo $password;
                $login = $this->login_model->login($username,$password);
                //echo "<br>Login=".print_r($login);
                if($login)
                {
                    //echo "Entra";
                    $data = array(
                    'is_logued_in'  =>      TRUE,
                    'id_usuario'    =>      $login->id,
                    'username'      =>      $login->username,
                    'nombre'        =>      $login->nombre_apellido
                    );      
                    //print_r($data);
                    $this->session->set_userdata($data);
                    redirect(base_url().'admin/empresa');
                }
                else
                {
                   echo " NO Entra"; 
                }
            }
        }else{
            redirect(base_url().'admin/login');
        }
    }
    
    public function token()
    {
        $token = md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;
    }
    
    public function logout_ci()
    {
        $this->session->sess_destroy();
        
        redirect('admin/login');
    }
}