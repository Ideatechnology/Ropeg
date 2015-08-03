<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bbanner extends CI_Controller {

	function Bbanner(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
			$this->load->helper('url');
		$this->load->model('bbanner_model');
		
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
	
		$sql = "select b.* from  banner b order by b.id_banner desc";
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
 'create_author' => $this->session->userdata('sesi_nama_lengkap'),
			   'banner_desc' => $this->input->post('banner_desc'),
			   'banner_name' => $this->input->post('banner_name'),
			   'banner_link' => $this->input->post('banner_link'),
			   'create_time' => date("Y-m-d H:i:s")
			);
			
			
			
			$this->load->helper('uploadut');
		   $this->load->library('image_lib');
		    #TIpe File Upload
			$attachment='';
 			$config['upload_path'] = './photostorage/reklame/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
			   $width=84;
			   $height=46;
			   create_thumb($files['full_path']);
  			   resize_image($files['full_path'], $width, $height);
			   
   			endif;
			$data['file_foto'] = $attachment; 
			
			
			

			$this->db->insert('banner', $data);
		
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
		$sql = "select * from banner  where id_banner = '".$id."'";
		$row = $this->db->query($sql)->row_array();
		
		$data['id_banner'] = $row['id_banner'];
		$data['banner_name'] = $row['banner_name'];
		$data['banner_desc'] = $row['banner_desc'];
		$data['publish'] = $row['publish'];
		$data['file_foto'] = $row['file_foto'];
		$data['banner_link'] = $row['banner_link'];
		
		$this->template->load('template_backend','v_edit',$data);
		
		
	}
	
	
	
	
	
	
public function submitedit()
{
try
{




 
 $data = array( 'publish' => $this->input->post('publish'),
 'create_author' => $this->session->userdata('sesi_nama_lengkap'),
			   'banner_desc' => $this->input->post('banner_desc'),
			   'banner_name' => $this->input->post('banner_name'),
			   'banner_link' => $this->input->post('banner_link')
			   //,'create_time' => date("Y-m-d H:i:s")
			);
$this->load->helper('uploadut');
		   $this->load->library('image_lib');
			
			#Upload Images
			if (@$_FILES['userfile']['name'] != '') { 
 			$config['upload_path'] = './photostorage/reklame/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
		   $width=84;
			   $height=46;
			   create_thumb($imgs['full_path']);
  			   resize_image($imgs['full_path'], $width, $height);
		
			   
  			endif;
			$data['file_foto'] = $attachment1;
			}
			
			
			
			
			
			 $this->db->where('id_banner', $this->input->post('id_banner'));
            $this->db->update('banner', $data);
		
		$data['pesan']="Data Berhasil Diubah";
			

			
redirect('bbanner');



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
			
			 $this->db->where('id_banner', $id);
            $this->db->delete('banner');


			redirect('bbanner');




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
