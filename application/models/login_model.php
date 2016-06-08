<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$user = $query->row();
			//print_r($user);
           //en pass guardamos el hash del usuario que tenemos en la base
           //de datos para comprobarlo con el método check_password de Bcrypt
			$pass = $user->password;
 
          //esta es la forma de comprobar si el password del 
          //formulario coincide con el codificado de la base de datos
			if($this->bcrypt->check_password($hash, $pass))
			{
				return $query->row();
			}else{
				$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
				redirect(base_url().'admin/login','refresh');
			}
		}
	}

	public function login($username,$hash)
	{
       //obtenemos los datos del usuario que quiere iniciar sesión
		$this->db->where('username',$username);
		$query = $this->db->get('users');
       //si el nombre de usuario coincide y sólo existe uno procedemos
		if($query->num_rows() == 1)
		{
			$user = $query->row();
           //en pass guardamos el hash del usuario que tenemos en la base
           //de datos para comprobarlo con el método check_password de Bcrypt
			$pass = $user->password;
 
          //esta es la forma de comprobar si el password del 
          //formulario coincide con el codificado de la base de datos
			if($this->bcrypt->check_password($hash, $pass))
			{
				return $query->row();
			}else{
				$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
				redirect(base_url().'admin/login','refresh');
			}
		}
	}

	public function perfiles()
	{
		$query = "SELECT perfil FROM users
        GROUP BY perfil";
        $query = $this->db->query($query);

        if (!empty($query) AND $query->num_rows() > 0)
        {
            $result = $query->row();
            $query->free_result();

            return $result;
        }
        else
        {
            $this->error = mysql_error();
            return false;
        }

        $this->error = 'Invalid selection.';
        return false;
	}
}