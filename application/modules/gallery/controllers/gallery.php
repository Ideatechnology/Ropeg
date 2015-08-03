<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function Gallery(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		
	}
	
	public function index()
	{

		 
		 $this->load->library('pagination');
		 
		 $qry = "select * from albumphotovideo where publish='Y' order by id_albumphotovideo desc";

$limit = 3;
$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

$config['base_url'] = base_url().'/index.php/gallery/index/';
$config['total_rows'] = $this->db->query($qry)->num_rows();
$config['uri_segment'] = 3;
$config['per_page'] = $limit;
$config['num_links'] = 20;

$config['full_tag_open' ] = '<ul class="pagination">' ;
		$config['full_tag_close' ] = '</ul>' ;
		$config['cur_tag_open' ] = '<li class="active"><a href="javascript:;">' ;
		$config['cur_tag_close' ] = '</a></li>' ;
		$config['num_tag_open' ] = '<li class="">' ;
		$config['num_tag_close' ] = '</li>' ;
		$config['next_tag_open' ] = '<li class="">' ;
		$config['next_tag_close' ] = '</li>' ;
		$config['prev_tag_open' ] = '<li class="">' ;
		$config['prev_tag_close' ] = '</li>' ;
		$config['first_tag_open' ] = '<li class="">' ;
		$config['first_tag_close' ] = '</li>' ;
		$config['last_tag_open' ] = '<li class="">' ;
		$config['last_tag_close' ] = '</li>' ;
		$config['next_link' ] = 'next &#8250' ;
		$config['prev_link' ] = '&#8249 prev' ;
		$config['first_link'] = '&#171 first';
		$config['last_link'] = 'last &#187;';
$this->pagination->initialize($config);

$qry .= " limit {$limit} offset {$offset} ";

$data['news'] = $this->db->query($qry)->result_array();;
	
		$this->template->load('template_header','list',$data);
		$this->template->load('template_footer','list',$data);
	}
	
	
	
	public function doView()
	{
		
		
		$sql = "select a.* from albumphotovideo_gallery a where a.id_albumphotovideo_gallery='".$_POST["id_albumphotovideo_gallery"]."'";
		$query = $this->db->query($sql);
		$data['field'] = $query->row_array();
		$this->load->view('v_detail',$data);
		
	}

	public function foto(){
		$data= array();

		   $gs = $this->db->query("select albumphotovideo.*,
								albumphotovideo_gallery.albumphotovideo_gallery_name,
								albumphotovideo_gallery.file_foto,
								(select count(*) from 
								bf_galeri_foto where 
								bf_galeri_foto.id_album=bf_m_kategori.id) as jumgaleri
								from bf_m_kategori
								left join bf_galeri_foto on 
								bf_galeri_foto.id_album=bf_m_kategori.id
								where bf_m_kategori.type_kategori='gallery' 
								and title_foto!='' 
								group by bf_m_kategori.id 
								limit ".$offset.",".$config['per_page']."")->result();	

		$this->template->load("template_header","foto",$data);
		$this->template->load("template_footer","foto",$data);

	}

	public function video(){

		$data = array();

		$this->template->load("template_header","video",$data);
		$this->template->load("template_footer","video",$data);

	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */