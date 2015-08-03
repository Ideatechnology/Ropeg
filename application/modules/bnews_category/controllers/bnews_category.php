<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bnews_category extends CI_Controller {

	function Bnews_category(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
	    $this->load->helper('url');
		$this->load->library('pagination');
		//$this->load->model('bnews_category_model');
		
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
	
	$sql = "SELECT a.*  FROM news_category a  ORDER BY a.news_category ASC";
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


 
 $data = array('news_category' => $this->input->post('news_category'));
			
			

			$this->db->insert('news_category', $data);
			
			
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
		$sql = "select * from news_category  where id_news_category = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_news_category'] = $row['id_news_category'];
		$data['news_category'] = $row['news_category'];
		
		
		$this->template->load('template_backend','v_edit',$data);
		
		
	}
	
	
	
	
	
	
public function submitedit()
{
try
{




 
  $data = array('news_category' => $this->input->post('news_category'));
			
			
			
			 $this->db->where('id_news_category', $this->input->post('id_news_category'));
            $this->db->update('news_category', $data);
			
			
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bnews_category');



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
			
			 $this->db->where('id_news_category', $id);
			 $this->db->delete('news_category');
			 

			redirect('bnews_category');




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


