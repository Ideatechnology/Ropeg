<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bkatfile extends CI_Controller {

	function bkatfile(){
		
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
    	$sql = "select * from kategori_file order by id_kategori_files desc";
		$data['query'] = $this->db->query($sql);
		
		$this->template->load('template_backend','v_index',$data);
    }

    function add(){

    	$data = array(); 

    	$this->template->load('template_backend','v_add',$data);

    }

    function edit(){

    	$id = $this->uri->segment(3);
		$sql = "select * from kategori_file  where id_kategori_files= '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_kategori_files'] = $row['id_kategori_files'];
		$data['kategori_file'] = $row['kategori_file'];
		
		
		$this->template->load('template_backend','v_edit',$data);
		
    }


public function submitedit()
{
try
{




 
 $data = array( 'kategori_file' => $this->input->post('kategori_file'),
 
			);

		
			
			 $this->db->where('id_kategori_files', $this->input->post('id_kategori_files'));
            $this->db->update('kategori_file', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bkatfile');



}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	

    public function submit(){
	try
	{


 
 			$data = array( 'kategori_file' => $this->input->post('kategori_name'));
			$this->db->insert('kategori_file', $data);
		
			$data['pesan']="Data Berhasil Ditambahkan";
			$this->template->load('template_backend','v_add',$data);




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
			
			 $this->db->where('id_kategori_files', $id);
            $this->db->delete('kategori_file');


			redirect('bkatfile');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	
	


  }

  ?>