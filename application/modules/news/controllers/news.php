<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function News(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->model('news_model');
		
	}
	
	public function index()
	{

		 
		 $this->load->library('pagination');
		 
		 $qry = "select a.*,b.news_category from news a,news_category b where a.publish='Y' and a.id_news_category=b.id_news_category order by a.create_time desc";

$limit = 10;
$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

$config['base_url'] = base_url().'/index.php/news/index/';
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

$data['news'] = $this->db->query($qry)->result_array();
	
		$this->template->load('template_header','news',$data);
		$this->template->load('template_footer','news',$data);
	}
	
	public function category($id){


		 $this->load->library('pagination');
		 
		 $qry = "select a.*,b.news_category from news a,news_category b where a.publish='Y' and a.id_news_category=b.id_news_category and a.id_news_category='".$id."' order by a.create_time desc";

$limit = 6;
$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4):0);

$config['base_url'] = base_url().'/index.php/news/category/';
$config['total_rows'] = $this->db->query($qry)->num_rows();
$config['uri_segment'] = 4;
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

		$data['news'] = $this->db->query($qry)->result_array();

		$kategori = $this->db->where("id_news_category",$id)->get("news_category")->row();
		$data["kategori"] = $kategori;

		$this->template->load('template_header','category',$data);
		$this->template->load('template_footer','category',$data);

	}

	public function read()
	{
		$id=explode("-",$this->uri->segment('3'));
		
		//Query Event
		$sql = "select * from news where id_news=".$id[0]."";
		$news = $this->db->query($sql)->row_array();
		
		$data['detnews'] = $news;
	
		$this->template->load('template_header','detnews',$data);
		$this->template->load('template_footer','detnews',$data);
	}
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */