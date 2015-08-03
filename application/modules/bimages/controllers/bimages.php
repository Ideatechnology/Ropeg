<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bimages extends CI_Controller {

	function Bimages(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('auth');
			$this->load->helper('url');
		$this->load->model('bnews_model');
		
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

		 
		 $this->load->library('pagination');
		 
		 $qry = "select * from images order by id desc";

$limit = 20;
$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

$config['base_url'] = base_url().'/index.php/bimages/index/';
$config['total_rows'] = $this->db->query($qry)->num_rows();
$config['uri_segment'] = 3;
$config['per_page'] = $limit;
$config['num_links'] = 20;


$this->pagination->initialize($config);

$qry .= " limit {$limit} offset {$offset} ";

$data['news'] = $this->db->query($qry)->result_array();;
	
					$this->template->load('template_backend','v_index',$data);

	}
	
		
	
	
	 public function submit()
{
try
{


 
 $data = array( 
 'create_author' => $this->session->userdata('sesi_nama_lengkap'),
			  
			   'create_time' => date("Y-m-d H:i:s")
			);
			
			
			
			$this->load->helper('uploadut');
		   $this->load->library('image_lib');
		    #TIpe File Upload
			$attachment='';
 			$config['upload_path'] = './photostorage/images/';
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
			  $width=200;
			   $height=150;
			   create_thumb($files['full_path']);
  			   resize_image($files['full_path'], $width, $height);
			   
   			endif;
			$data['file_foto'] = $attachment; 
			
			
			

			$this->db->insert('images', $data);
		
			$data['pesan']="Data Berhasil Ditambahkan";
			//$this->template->load('template_backend','v_index',$data);
			redirect('bimages');




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
			
			 $this->db->where('id', $id);
            $this->db->delete('images');


			redirect('bimages');




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
