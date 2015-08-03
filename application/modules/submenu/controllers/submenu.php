<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submenu extends CI_Controller {

	function Submenu(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		//$this->load->model('berita_kesehatan_model');
		
	}
	
	function index()
	{
	
	}
	
	function display()
	{
		$id = $this->uri->segment(3);
		$sql = $this->db->query("select * from tb_menu_member where id='".$id."'");
		$data['field'] = $sql->row_array();
		$data['id_menu'] = $id;
		$this->template->load('template_header','v_submenu',$data);
		$this->template->load('template_footer','v_submenu',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */