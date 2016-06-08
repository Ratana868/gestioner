<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Auth
{
	
	protected $ci;
	
	//creamos una instancia del super objeto de codeigniter
	//en el constructor para poder tenerlo disponible las veces
	//que necesitemos sin repetir la misma línea
	public function __construct()
	{
		
		$this->ci =& get_instance();
		
	}

	public function is_logged()
	{
		
		return $this->ci->session->userdata('username') !== FALSE ? TRUE : FALSE;
			
	}



}
/*
 * end libraries/auth.php
 */