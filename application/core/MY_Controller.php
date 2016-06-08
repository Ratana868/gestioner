<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
	parent::__construct();
        log_message('debug', 'MY_Controller Initialized');
    }

    public function index()
    {
    }

	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}

    protected function display($pagina, $data = array(), $web = false , $dataHeader = array(), $dataSidebar = array()) {

        //print_r($data);
            //$this->load->view('admin/includes/head', $data);
            $this->load->view('admin/includes/header', $data);
            $this->load->view('admin/includes/sidebar', $data);
            
            $this->load->view($pagina, $data);
            
            $this->load->view('admin/includes/footer');
        }
    

}
?>
