<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backpage extends CI_Controller {

	function Backpage(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
		$this->auth->check_user_authentification();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		$this->is_logged_in();
		
	}
	
	
	function is_logged_in(){
		if(!$this->session->userdata('is_logged_in')){
			redirect('ijinmasuk');
		}
    }
	
	public function index()
	{
		$sql = "select b.* from tb_menu_user a,tb_menu b
where a.rolename='".$this->session->userdata('sesi_rolename')."' and a.id_menu=b.id and b.parrent <> '0'
order by b.parrent  ";
		$data['query'] = $this->db->query($sql);
		$this->template->load('template_backend','backpage',$data);
	}
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */