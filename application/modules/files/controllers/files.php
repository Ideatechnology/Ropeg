<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {

	function Files(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		
	}

	public function category($id){
		
		$data = array();


		$this->load->library('pagination');
		 
		 $qry = "select * from files where publish='Y' and id_kategori='".$id."' order by create_time desc";

$limit = 6;
$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4):0);

$config['base_url'] = base_url().'/index.php/files/category/'.$id.'/';
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

		$data['files'] = $this->db->query($qry)->result_array();

		$kategori = $this->db->where("id_kategori_files",$id)->get("kategori_file")->row();
		$data["kategori"] = $kategori;

		$this->template->load('template_header','v_category',$data);
		$this->template->load('template_footer','v_category',$data);

	}



}


	