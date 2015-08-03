<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bkevents extends CI_Controller {

	function bkevents(){
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

    	$sql = "select * from events order by id_events desc";
		$data['query'] = $this->db->query($sql);
		
		$this->template->load('template_backend','v_index',$data);
    }

     function add(){

    	$data = array(); 

    	$this->template->load('template_backend','v_add',$data);

    }

    	 public function submit()
		{
		try
		{


 
 $data = array( 'judul' => $this->input->post('judul'),
 				'author' => $this->session->userdata('sesi_nama_lengkap'),
			   'keterangan' => $this->input->post('desc'),
			   'tanggal' => $this->input->post('tanggal'),
			   
			);
			
			
			
			$this->db->insert('events', $data);
		
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
		$sql = "select * from events  where id_events = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_events'] = $row['id_events'];
		$data['judul'] = $row['judul'];
		$data['keterangan'] = $row['keterangan'];
		$data['tanggal'] = $row['tanggal'];
		
		$this->template->load('template_backend','v_edit',$data);
		
		
	}


		public function submithapus(){
		try
		{


			$id = $this->uri->segment(3);
			
			 $this->db->where('id_events', $id);
            $this->db->delete('events');


			redirect('bkevents');




		}
		catch(Exception $err)
		{
		log_message("error",$err->getMessage());
		return show_error($err->getMessage());
		}
	}


	public function submitedit()
{
try
{




 
 $data = array( 'judul' => $this->input->post('judul'),
 				'author' => $this->session->userdata('sesi_nama_lengkap'),
			   'keterangan' => $this->input->post('desc'),
			   'tanggal' => $this->input->post('tanggal'),
			   
			);
			
			 $this->db->where('id_events', $this->input->post('id_events'));
            $this->db->update('events', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bkevents');



}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	



   }