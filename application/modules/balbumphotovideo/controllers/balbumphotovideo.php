<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Balbumphotovideo extends CI_Controller {

	function Balbumphotovideo(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
			$this->load->helper('url');
		$this->load->model('balbumphotovideo_model');
		
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
	
		$sql = "select  a.* from albumphotovideo a order by a.id_albumphotovideo desc";
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


 
 $data = array( 'publish' => $this->input->post('publish'),
 'create_author' => $this->session->userdata('s_sys_name'),
			   'albumphotovideo_desc' => $this->input->post('albumphotovideo_desc'),
			   'albumphotovideo_name' => $this->input->post('albumphotovideo_name'),
			   'sort_number' => $this->input->post('sort_number'),
			   'create_time' => date("Y-m-d H:i:s")
			);

			$this->db->insert('albumphotovideo', $data);
		
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
		$sql = "select * from albumphotovideo  where id_albumphotovideo = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_albumphotovideo'] = $row['id_albumphotovideo'];
		$data['albumphotovideo_name'] = $row['albumphotovideo_name'];
		$data['albumphotovideo_desc'] = $row['albumphotovideo_desc'];
		$data['publish'] = $row['publish'];
		$data['sort_number'] = $row['sort_number'];
		
		$this->template->load('template_backend','v_edit',$data);
		
		
	}
	
	
	
	
	
	
public function submitedit()
{
try
{


$this->db->query("UPDATE albumphotovideo_gallery SET publish='".$this->input->post('publish')."' WHERE id_albumphotovideo='".$this->input->post('id_albumphotovideo')."'");


 
 $data = array( 'publish' => $this->input->post('publish'),
 'create_author' => $this->session->userdata('s_sys_name'),
			   'albumphotovideo_desc' => $this->input->post('albumphotovideo_desc'),
			   'albumphotovideo_name' => $this->input->post('albumphotovideo_name'),
			   'sort_number' => $this->input->post('sort_number'),
			   
			   'create_time' => date("Y-m-d H:i:s")
			);

			
			 $this->db->where('id_albumphotovideo', $this->input->post('id_albumphotovideo'));
            $this->db->update('albumphotovideo', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('balbumphotovideo');



}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}
	
	
	
	
	
	
	
	public function edit_image()
	{
		$id = $this->uri->segment(3);
		
		$sql = "select * from albumphotovideo  where id_albumphotovideo = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		$data['id_albumphotovideo'] = $row['id_albumphotovideo'];
		$data['albumphotovideo_name'] = $row['albumphotovideo_name'];
		
		
		$this->template->load('template_backend','v_edit_image',$data);
		
		
	}
	
	
		 public function submiteditimage()
{
try
{

	if ($this->input->post('type')==0) {
	
	 $data = array( 'id_albumphotovideo' => $this->input->post('id_albumphotovideo'),
			 'publish' => $this->input->post('publish'),
			 'create_author' => $this->session->userdata('sesi_nama_lengkap'),
						   'albumphotovideo_gallery_desc' => $this->input->post('albumphotovideo_gallery_desc'),
						   'albumphotovideo_gallery_name' => $this->input->post('albumphotovideo_gallery_name'),
						   'sort_number' => $this->input->post('sort_number'),
						   'create_time' => date("Y-m-d H:i:s")
						);
			
		
			
		
			
			$this->load->helper('uploadut');
		   $this->load->library('image_lib');
		    #TIpe File Upload
			$attachment='';
 			$config['upload_path'] = './photostorage/albumphotovideo/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
 			/*$config['max_width']  = '1024';
			$config['max_height']  = '768';*/
 			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('userfile');
			
			
			 
			if($upload==FALSE):
			   //die();
			   echo $this->upload->display_errors();
			else:
			   $files = $this->upload->data();
  		       $attachment = $files['file_name'];
			   $width=270;
			   $height=202;
			   create_thumb($files['full_path']);
  			   resize_image($files['full_path'], $width, $height);
			   
   			endif;
			$data['file_foto'] = $attachment; 
			
			

			$this->db->insert('albumphotovideo_gallery', $data);
	
	
	} else {
	
	 $data = array( 'id_albumphotovideo' => $this->input->post('id_albumphotovideo'),
			 'publish' => $this->input->post('publish'),
			 'create_author' => $this->session->userdata('sesi_nama_lengkap'),
						   'albumphotovideo_gallery_desc' => $this->input->post('albumphotovideo_gallery_desc'),
						   'albumphotovideo_gallery_name' => $this->input->post('albumphotovideo_gallery_name'),'sort_number' => $this->input->post('sort_number'),
						   
						   'type' => $this->input->post('type'),
						   'link_youtube' => $this->input->post('link_youtube'),
						   'file_foto_youtube' => $this->input->post('file_foto_youtube'),
						   'create_time' => date("Y-m-d H:i:s")
						);
			
			$this->db->insert('albumphotovideo_gallery', $data);
	
	}
 
			  
			
			
		
			$data['pesan']="Data Berhasil Ditambahkan";
			
	
redirect('balbumphotovideo/edit_image/'.$this->input->post('id_albumphotovideo').'',$data);


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
			
			 $this->db->where('id_albumphotovideo', $id);
            $this->db->delete('albumphotovideo');


			redirect('balbumphotovideo');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}




public function submithapusimage()
{
try
{


			$id = $this->uri->segment(3);
			$idx = $this->uri->segment(4);
			
			 $this->db->where('id_albumphotovideo_gallery', $id);
            $this->db->delete('albumphotovideo_gallery');


			redirect('balbumphotovideo/edit_image/'.$idx.'');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}



public function submitpublishimage()
{
try
{


			$id = $this->uri->segment(3);
			$idx = $this->uri->segment(4);
			$idy = $this->uri->segment(5);
			
			$this->db->query("UPDATE albumphotovideo_gallery SET publish='".$idy."' WHERE id_albumphotovideo_gallery='".$id."'");
			//echo "UPDATE albumphotovideo_gallery SET publish='".$idy."' WHERE id_albumphotovideo_gallery='".$id."'";
			
			
			redirect('balbumphotovideo/edit_image/'.$idx.'');




}
catch(Exception $err)
{
log_message("error",$err->getMessage());
return show_error($err->getMessage());
}
}









	
	
}

/* End of file welcome.php */
/* Location: ./application/controllealbumphotovideo/welcome.php */
