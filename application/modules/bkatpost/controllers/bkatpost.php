<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bkatpost extends CI_Controller {

	function bkatpost(){
		
		
		parent::__construct();
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

    function index(){
    	
    	$data = array();
    	$sql = "select * from news_category order by id_news_category desc";
		$data['query'] = $this->db->query($sql);
		
		$this->template->load('template_backend','v_index',$data);
    }

     function add(){

    	$data = array(); 

    	$this->template->load('template_backend','v_add',$data);

    }


    public function submit(){
	try
	{


 
 			$data = array( 'news_category' => $this->input->post('kategori_name'));
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


	
    function edit(){

    	$id = $this->uri->segment(3);
		$sql = "select * from news_category  where id_news_category= '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_news_category'] = $row['id_news_category'];
		$data['news_category'] = $row['news_category'];
		
		
		$this->template->load('template_backend','v_edit',$data);
		
    }

    public function submitedit()
{
try
{




 
 $data = array( 'news_category' => $this->input->post('news_category'),
 
			);

		
			
			 $this->db->where('id_news_category', $this->input->post('id_news_category'));
            $this->db->update('news_category', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bkatpost');



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


			redirect('bkatpost');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}



}

?>