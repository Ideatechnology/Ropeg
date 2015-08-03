<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function Homepage(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->model('homepage_model');
		
	}
	
	public function index()
	{
		$data['test']="";
		
		$slider = $this->db->query("select * from slider where publish='Y' order by id_slider desc limit 5")->result();
		$data["slider"] = $slider;	

		$banner1 = $this->db->query("select * from banner where publish='Y' order by id_banner limit 0,7")->result();
		$data["banner1"] = $banner1;

		$banner2 = $this->db->query("select * from banner where publish='Y' order by id_banner limit 7,10")->result();
		$data["banner2"] = $banner2;	

		$gallery_foto = $this->db->query("select * from albumphotovideo_gallery where publish='Y' and type=0 order by id_albumphotovideo_gallery desc limit 4")->result();
		$data["gallery_foto"] = $gallery_foto;

		$berita = $this->db->query("select * from news where publish='Y' order by id_news desc limit 3")->result();
		$data["berita"] = $berita;
		
		$this->template->load('template_header','homepage',$data);
		$this->template->load('template_footer','homepage',$data);
	}
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
                            
                            
                            