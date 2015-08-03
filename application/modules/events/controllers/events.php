<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class events extends CI_Controller {

	function events(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->helper('text');
		
		
	}

	public function index(){


		 $this->load->library('pagination');
		 
		 $qry = "select * from events order by tanggal desc";

		$limit = 6;
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);

		$config['base_url'] = base_url().'/index.php/events/index/';
		$config['total_rows'] = $this->db->query($qry)->num_rows();
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit;
		$config['num_links'] = 20;

		$config['full_tag_open' ] = '<ul class="pagination">' ;
		$config['full_tag_close' ] = '</ul>' ;
		$config['cur_tag_open' ] = '<li class="active"><a href="javascript:void(0);">' ;
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

		$data['events'] = $this->db->query($qry)->result_array();
	
		$this->template->load('template_header','events',$data);
		$this->template->load('template_footer','events',$data);

	}

	public function read(){

		$id=$this->uri->segment('3');
		
		//Query Event
		$sql = "select * from events where id_events=".$id."";
		$events = $this->db->query($sql)->row_array();
		
		$data['events'] = $events;
	
		$this->template->load('template_header','detevents',$data);
		$this->template->load('template_footer','detevents',$data);


	}

}