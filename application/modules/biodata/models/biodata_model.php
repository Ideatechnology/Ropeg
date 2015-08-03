<?php 

class Biodata_model extends CI_Model{

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database('simpeg',TRUE);
    }

    function jumlahForum($kategori,$status,$level,$user,$keyword){

		if($this->input->get("kategori")!="")
		$this->db->where("id_kategori",$kategori);
		
		if($status=="sudah")
		$this->db->where("baca_jawab",1);
		else
		$this->db->where("baca_jawab",0);
		
		if($level!=1)	
			$this->db->where("id_petanya",$user);
		
		if($this->input->get("keyword")){
			$this->db->like('id_forum', $keyword, 'before')->or_like('pertanyaan', $keyword)->or_like('jawaban', $keyword);
		}

		$this->db->join("ropeg.tb_kategori_forum","ropeg.tb_kategori_forum.id_kategori_forum=tb_forum_konsultasi.id_kategori");
		$this->db->join("simpeg.tr_user","simpeg.tr_user.user_id=tb_forum_konsultasi.id_petanya");
		$forum = $this->db->get("tb_forum_konsultasi")->num_rows();

		return $forum;

    }

    function getFoto(){
    			$dataprofile = $this->session->userdata('logged_in');
    	$v_pegawai = $this->database_two->query("select file_bmp from v_pegawai 
			where  nip='".$dataprofile["employ_front"]."'")->row();
    		return @$v_pegawai->file_bmp;
    
    }

}

?>