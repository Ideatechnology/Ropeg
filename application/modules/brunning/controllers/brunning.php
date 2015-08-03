<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brunning extends CI_Controller {

	function Brunning(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
	    $this->load->helper('url');
		$this->load->library('pagination');
		//$this->load->model('brunning_model');
		
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
	
	$sql = "SELECT a.*  FROM running_text a  ORDER BY a.id_running_text ASC";
	$data['query'] = $this->db->query($sql);
		
	$this->template->load('template_backend','v_index',$data);
		
	}
	
	public function add()
	{
		
		
		$this->template->load('template_backend','v_add');
		
		
	}
	
	
	
	 public function submit()
{
try
{


 
 $data = array('running_text_desc' => $this->input->post('running_text_desc'),'publish' => $this->input->post('publish'));
			
			

			$this->db->insert('running_text', $data);
			
			
			$data['pesan']="Data Berhasil Ditambahkan";
			$this->template->load('template_backend','v_add',$data);




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function edit()
	{
		$id = $this->uri->segment(3);
		$sql = "select * from running_text  where id_running_text = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_running_text'] = $row['id_running_text'];
		$data['running_text_desc'] = $row['running_text_desc'];
		$data['publish'] = $row['publish'];
		
		
		$this->template->load('template_backend','v_edit',$data);
		
		
	}
	
	
	
	
	
	
public function submitedit()
{
try
{




 
  $data = array('running_text_desc' => $this->input->post('running_text_desc'),'publish' => $this->input->post('publish'));
			
			
			
			 $this->db->where('id_running_text', $this->input->post('id_running_text'));
            $this->db->update('running_text', $data);
			
			
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('brunning');



}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	
	
	
	
	
	
	

	
	
		
	
	
	
	
	
	
	public function submithapus()
{
try
{


			$id = $this->uri->segment(3);
			
			 $this->db->where('id_running_text', $id);
			 $this->db->delete('running_text');
			 

			redirect('brunning');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}



	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


