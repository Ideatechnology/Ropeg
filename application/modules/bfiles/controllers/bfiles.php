<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bfiles extends CI_Controller {

	function bfiles(){
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

    	$sql = "select * from files a inner join kategori_file b on a.id_kategori=b.id_kategori_files order by a.id_files desc";
		$data['query'] = $this->db->query($sql);
		
		$this->template->load('template_backend','v_index',$data);
    }

    function add(){

    	$data = array();

    	$kategori = $this->db->query("select * from kategori_file order by id_kategori_files desc")->result();
    	$data["kategori"] = $kategori; 
    	$this->template->load("template_backend",'v_add',$data);

    }

    	public function edit()
	{
		$id = $this->uri->segment(3);
		$sql = "select * from files  where id_files = '".$id."'";
		$row = $this->db->query($sql)->row_array();


    	$kategori = $this->db->query("select * from kategori_file order by id_kategori_files desc")->result();
    	$data["kategori"] = $kategori; 
		
		$data['id_files'] = $row['id_files'];
		$data['judul'] = $row['judul'];
		$data['keterangan'] = $row['keterangan'];
		$data['id_kategori'] = $row['id_kategori'];
		$data['files_data'] = $row['files_data'];
		$data['publish'] = $row['publish'];

		$this->template->load('template_backend','v_edit',$data);
		
		
	}
	

     public function submit()
{
try
{
 
 $data = array( 'publish' => $this->input->post('publish'),
 				'judul' => $this->input->post('judul'),
			   'keterangan' => $this->input->post('desc'),
			   'id_kategori' => $this->input->post('kategori'),
			   'create_time' => date("Y-m-d H:i:s")
			);
			
			
			
			$this->load->helper('uploadut');
		   $this->load->library('image_lib');
		    #TIpe File Upload
			$attachment='';
 			$config['upload_path'] = './filestorage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx';
 			/*$config['max_width']  = '1024';
			$config['max_height']  = '768';*/
 			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('userfile');
			
			
			 
			if($upload==FALSE):
			   //die();
			   echo $this->upload->display_errofacility();
			else:
			   $files = $this->upload->data();
  		       $attachment = $files['file_name'];
			   
			   
   			endif;
			$data['files_data'] = $attachment; 
			
			
			

			$this->db->insert('files', $data);
		
			$data['pesan']="Data Berhasil Ditambahkan";
			$this->template->load('template_backend','v_add',$data);


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
 				'keterangan' => $this->input->post('desc'),
			    'id_kategori' => $this->input->post('kategori'),
			    'publish' => $this->input->post('publish'),
			);
$this->load->helper('uploadut');
		   $this->load->library('image_lib');
			
			#Upload Images
			if (@$_FILES['userfile']['name'] != '') { 
 			$config['upload_path'] = './filestorage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx';
 			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';
  			$this->load->library('upload', $config);
			$this->upload->initialize($config);
  			$upload = $this->upload->do_upload('userfile');
			
			echo $this->upload->display_errors();
 			if($upload==FALSE):
			 // $attachment1 = $edit->file_foto;
			 echo $this->upload->display_errors();
			else:
			   $imgs = $this->upload->data();
   			   $attachment1 = $imgs['file_name'];
		  
			   
  			endif;
			$data['files_data'] = $attachment1;
			}
			
			
			$this->db->where('id_files', $this->input->post('id_files'));
            $this->db->update('files', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bfiles');



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
			
			 $this->db->where('id_files', $id);
            $this->db->delete('files');


			redirect('bfiles');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	
	

}

?>