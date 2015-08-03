<?php 

class forumkonsultasi extends CI_Controller{

	function forumkonsultasi(){
		parent::__construct();
			$this->load->helper('utility');
		$this->load->helper('tool');
		$this->database_two = $this->load->database('simpeg',TRUE);
	}

	public function index(){
		$data= array();
		
		
		$kategori_get = "";
		if($this->input->get("kategori")!="")
		$kategori_get = "and a.id_kategori='".$this->input->get("kategori")."'";

		$keyword = "";
		if($this->input->get("keyword")!="")
		$keyword = "and a.pertanyaan like '%".$this->input->get("keyword")."%'";

		
		$total = $this->db->query("select count(*) as jumlah from tb_forum_konsultasi a where a.akses=2 and a.jawaban!='' ".$kategori_get." ".$keyword."")->row();	
		
		
		

		$query = $this->db->query("select * from tb_forum_konsultasi a inner join tb_kategori_forum b on a.id_kategori=b.id_kategori_forum
		 inner join simpeg.tr_user c on c.user_id=a.id_petanya	
		 where a.akses=2 and a.jawaban!='' ".$kategori_get." ".$keyword." order by a.id_forum desc")->result();
		$data["query"] = $query;

		$kategori = $this->db->query("select * from tb_kategori_forum order by kategori asc")->result();
		$data["kategori"] = $kategori;

		$this->template->load('template_header','index',$data);
		$this->template->load('template_footer','index',$data);

	}


}


?>