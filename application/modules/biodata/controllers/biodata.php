<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biodata extends CI_Controller {

	function Biodata(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->model("biodata_model");
		$this->database_two = $this->load->database('simpeg',TRUE);
		
	}
	
	public function index()
	{
		
		if($this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/dataprofile');

   		}

		if($this->input->post("login")){

			if($this->check_login($this->input->post("user_id"),$this->input->post("password"))){
				$this->session->set_flashdata('message_login', 'Selamat Anda Berhasil Masuk');
				redirect('/biodata/dataprofile');
			}else{	
				$this->session->set_flashdata('message_login', 'Maaf User atau Password anda salah');
			}
		
		}

		$data['test']="";

		$this->template->load('template_header','biodata',$data);
		$this->template->load('template_footer','biodata',$data);
	
	}

	public function dataprofile(){

		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}

		$data["test"] = "";
		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$v_pegawai = $this->database_two->query("select a.*,b.nagama,c.pangkat,c.ngolru,d.nunker from v_pegawai a 
			inner join ref_agama b on a.kagama=b.kagama
			inner join ref_golruang c on a.kgolru=c.kgolru
			inner join ref_unkerja d on d.kunker=a.kunker
			where a.nip='".$dataprofile["employ_front"]."'")->row();
		$data["biodata_pegawai"] = $v_pegawai; 

		
		$pendidikan_terakhir = $this->database_two->query("select t.ntpu, p.npdum
			from peg_pdakhir p join ref_tpu t on p.ktpu=t.ktp where p.nip='".@$v_pegawai->nip."'")->row();
		$data["pendidikan_terakhir"] = $pendidikan_terakhir;


    	
		$this->template->load("template_header","dataprofile",$data);
		$this->template->load("template_footer","dataprofile",$data);

	}

	public function export_word($id){

		header("Cache-Control: ");// leave blank to avoid IE errors
		header("Pragma: ");// leave blank to avoid IE errors
		header("Content-type: application/octet-stream");
		header("content-disposition: attachment;filename=print_pertanyaan.doc"); 

		$this->db->where("id_forum",$id)->update("tb_forum_konsultasi",array("status_print"=>1));

		$this->db->join("ropeg.tb_kategori_forum","ropeg.tb_kategori_forum.id_kategori_forum=tb_forum_konsultasi.id_kategori");
		$this->db->join("simpeg.tr_user","simpeg.tr_user.user_id=tb_forum_konsultasi.id_petanya");
		$query =  $this->db->where("id_forum",$id)->get("tb_forum_konsultasi")->row_array();
		
		$data["query"]=$query;
		echo $this->load->view("word",$data,false);

	}

	public function export_excell(){

		
   		// Fungsi header dengan mengirimkan raw data excel
		header("Content-type: application/vnd.ms-excel");
 
			// Mendefinisikan nama file ekspor "hasil-export.xls"
		header("Content-Disposition: attachment; filename=report_forum_konsultasi.xls");

		$this->load->helper("text");
		$dataprofile = $this->session->userdata('logged_in');
		$kategori = $this->db->query("select * from tb_kategori_forum")->result();
		
		if($this->input->get("kategori")!="")
		$this->db->where("id_kategori",$this->input->get("kategori"));
		
		if($this->input->get("status")=="sudah")
		$this->db->where("baca_jawab",1);
		else
		$this->db->where("baca_jawab",0);
		
		if($dataprofile["level_front"]!=1)	
			$this->db->where("id_petanya",$dataprofile["user_front"]);

		if($this->input->get("keyword")){
			$this->db->like('id_forum', $this->input->get("keyword"));
			$this->db->or_like('pertanyaan', $this->input->get("keyword"));
			$this->db->or_like('jawaban', $this->input->get("keyword"));
		}
		
		$this->db->join("ropeg.tb_kategori_forum","ropeg.tb_kategori_forum.id_kategori_forum=tb_forum_konsultasi.id_kategori");
		$this->db->join("simpeg.tr_user","simpeg.tr_user.user_id=tb_forum_konsultasi.id_petanya");
		$forum = $this->db->order_by("id_forum","desc")->get("tb_forum_konsultasi")->result();

		if($dataprofile["level_front"]!=1){
		$jumlah_jawab =$this->db->where('baca_jawab', 1)->where("id_petanya",$dataprofile["user_front"])->from('tb_forum_konsultasi')->count_all_results();
		$jumlah_tidak_jawab = $this->db->where('baca_jawab', 0)->where("id_petanya",$dataprofile["user_front"])->from('tb_forum_konsultasi')->count_all_results();
		}else{
		$jumlah_jawab = $this->db->where('baca_jawab', 1)->from('tb_forum_konsultasi')->count_all_results();
		$jumlah_tidak_jawab = $this->db->where('baca_jawab', 0)->from('tb_forum_konsultasi')->count_all_results();
		}

		$data["jumlah_jawab"] = $jumlah_jawab;
		$data["jumlah_tidak_jawab"] = $jumlah_tidak_jawab;

		$data["forum"] = $forum; 	
		$data["kategori"] = $kategori;
		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		echo $this->load->view("excell",$data,false);
		
		//die;

	}

	public function pangkat(){


		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}

		$data["test"] = "";
		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];
	
		// SQL Detail		
		$sqlPangkat = "Select p.*, gr.ngolru, gr.pangkat from riw_pangkat p join ref_golruang gr on (p.kgolru=gr.kgolru) 
			where nip = '".$dataprofile["employ_front"]."' order by substring(tmtpang,-4) desc";
		$data["res_pangkat"] = $this->database_two->query($sqlPangkat)->result_array();	

		$this->template->load("template_header","pangkat",$data);
		$this->template->load("template_footer","pangkat",$data);


	}


	public function tambahkategori(){

		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}	
		
		$dataprofile = $this->session->userdata('logged_in');
		$id_kategori = $this->input->post("id_kategori");

		try{
			
			$data = array(
			
			   'kategori'=>$this->input->post("kategori2"),
			
			);
			if($id_kategori!=""){
			$this->db->where('id_kategori_forum', $id_kategori);	
			$insert = $this->db->update('tb_kategori_forum', $data);
			}else{

			$insert = $this->db->insert('tb_kategori_forum', $data);
				
			}
			$response["success"] = "1";
			$response["message"] = "Pesan Berhasil Dikirim";
			echo json_encode($response);


		}catch(Exception $e){

			$response["success"] = "0";
    		$response["message"] = "Pesan tidak terkirim :".$e->getMessage();
			echo json_encode($response);


		}


	}

	public function editkategori(){

		$id_kategori = $this->input->post("id_kategori");
		$row= $this->db->query("select * from tb_kategori_forum where id_kategori_forum='".$id_kategori."'")->row();
		$data["kategori"]= $row->kategori;
		echo json_encode($data);

	
	}

	public function hapuskategori(){

		$id_kategori = $this->input->post("id_kategori");

	
		
		try{
			
			$this->db->where('id_kategori_forum', $id_kategori);
			$this->db->delete('tb_kategori_forum'); 
			$response["success"] = "1";
			$response["message"] = "Pesan Berhasil Dihapus";
			echo json_encode($response);


		}catch(Exception $e){

			$response["success"] = "0";
    		$response["message"] = "Pesan tidak Terhapus :".$e->getMessage();
			echo json_encode($response);


		}
		die;

	}

	public function jabatan(){

		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$sqlJabatan = $this->database_two->query("Select a.njab, a.keselon, a.tmtjabat,b.neselon from riw_jabatan a inner join ref_eselon b on a.keselon=b.keselon  where a.nip = '".$dataprofile["employ_front"]."' order by substring(tmtjabat,-4) desc")->result_array();
		$data["sqlJabatan"]=$sqlJabatan;

		$this->template->load("template_header","jabatan",$data);
		$this->template->load("template_footer","jabatan",$data);

	}

	public function pendidikan(){


		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$sqlPendum = "Select a.*, substring(tsttb,-4) as thn,b.ntpu,c.njur from riw_pendum a
		inner join ref_tpu b on b.ktp=a.ktpu
		inner join ref_jurpend c on  c.kjur=concat(a.ktpu,a.kjur)
		where a.nip = '".$dataprofile["employ_front"]."' order by thn desc";
		$res_formaledu = $this->database_two->query($sqlPendum)->result_array();

		$data["res_formaledu"]= $res_formaledu; 

		$this->template->load("template_header","pendidikan",$data);
		$this->template->load("template_footer","pendidikan",$data);

	}

	
	public function penataran(){
			if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$SQLdtl_penataran = "Select *, substring(tmulai, -4) as thn from riw_tatar where nip = '".$dataprofile["employ_front"]."' order by thn desc";
		$res_penataran = $this->database_two->query($SQLdtl_penataran)->result_array();

		$data["res_penataran"] = $res_penataran;

		$this->template->load("template_header","penataran",$data);
		$this->template->load("template_footer","penataran",$data);

	}

	
	public function penghargaan(){
			if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$SQLdtl_penghargaan = "Select * from riw_jasa where nip = '".$dataprofile["employ_front"]."' order by tholeh desc";
		$res_penghargaan = $this->database_two->query($SQLdtl_penghargaan)->result_array();

		$data["res_penghargaan"] = $res_penghargaan ;

		$this->template->load("template_header","penghargaan",$data);
		$this->template->load("template_footer","penghargaan",$data);


	}

	
	public function penugasan(){
			if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];

		$SQLdtl_tugas = "Select *, substring(tmulai, -4) as thn from riw_tugas where nip = '".$dataprofile["employ_front"]."' order by thn desc";
		$res_tugas =$this->database_two->query($SQLdtl_tugas)->result_array();

		$data["res_tugas"] = $res_tugas  ;

		$this->template->load("template_header","penugasan",$data);
		$this->template->load("template_footer","penugasan",$data);

	}

	
	public function keluarga(){


		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}
   		
   		$dataprofile = $this->session->userdata('logged_in');

		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];


		$SQLdtl_ortu = "Select * from riw_akand a inner join ref_pkerjaan b 
		on a.kkerja = b.kkerja
		where a.nip = '".$dataprofile["employ_front"]."' ";
		$res_ortu = $this->database_two->query($SQLdtl_ortu)->result_array();
		$data["res_ortu"] = $res_ortu;


		$SQLdtl_anak = "Select * from riw_anak a inner join 
		ref_pkerjaan b on a.kkerja=b.kkerja
		where a.nip ='".$dataprofile["employ_front"]."'";
		$res_anak = $this->database_two->query($SQLdtl_anak)->result_array();
		$data["res_anak"] = $res_anak;


		$SQLdtl_istri = "Select * from riw_sistri a inner join ref_pkerjaan b 
		on a.kkerja=b.kkerja
		where nip = '".$dataprofile["employ_front"]."' order by substring(tkawin,-4) ";
		$res_istri = $this->database_two->query($SQLdtl_istri)->result_array();
		$data["res_istri"] = $res_istri;


		$this->template->load("template_header","keluarga",$data);
		$this->template->load("template_footer","keluarga",$data);



	}

	public function send_forum(){
		
		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}	
		
		$dataprofile = $this->session->userdata('logged_in');

		try{
			
			$data = array(
			
			   'pertanyaan' => $this->input->post("pertanyaan"),
			   'tanggal_kirim' => date("Y-m-d H:i:s"),
			   'id_petanya'=>$dataprofile["user_front"],
			   'id_kategori'=>$this->input->post("kategori"),
			   'akses' => $this->input->post("akses")

			);

			$insert = $this->db->insert('tb_forum_konsultasi', $data);
			
			$response["success"] = "1";
			$response["message"] = "Pesan Berhasil Dikirim";
			
			echo json_encode($response);


		}catch(Exception $e){

			$response["success"] = "0";
    		$response["message"] = "Pesan tidak terkirim :".$e->getMessage();
			echo json_encode($response);


		}

	}
	
	public function forum_konsultasi(){

		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}

   		$this->load->library('pagination');
   		$limit=10;
   		$offset = $this->input->get("per_page")!=""?$this->input->get("per_page"):"0";

		$this->load->helper("text");
		$dataprofile = $this->session->userdata('logged_in');
		$kategori = $this->db->query("select * from tb_kategori_forum")->result();
		
		if($this->input->get("kategori")!="")
		$this->db->where("id_kategori",$this->input->get("kategori"));
		
		if($this->input->get("status")=="sudah"):
		$this->db->where("baca_jawab",1);
		else:
		$this->db->where("baca_jawab",0);
		endif;

		if($dataprofile["level_front"]!=1)	
			$this->db->where("id_petanya",$dataprofile["user_front"]);
		
		if($this->input->get("keyword")){
			$this->db->like('id_forum', $this->input->get("keyword"), 'before')->or_like('pertanyaan', $this->input->get("keyword"))->or_like('jawaban', $this->input->get("keyword"), 'before');
		}

	
		$this->db->join("ropeg.tb_kategori_forum","ropeg.tb_kategori_forum.id_kategori_forum=tb_forum_konsultasi.id_kategori");
		$this->db->join("simpeg.tr_user","simpeg.tr_user.user_id=tb_forum_konsultasi.id_petanya");
		$forum = $this->db->order_by("id_forum","desc")->get("tb_forum_konsultasi",$limit, $offset)->result();
		
		$jumlah = $this->biodata_model->jumlahForum($this->input->get("kategori"),$this->input->get("status"),$dataprofile["level_front"],$dataprofile["user_front"],$this->input->get("keyword"));


		if($dataprofile["level_front"]!=1){
		$jumlah_jawab =$this->db->where('baca_jawab', 1)->where("id_petanya",$dataprofile["user_front"])->from('tb_forum_konsultasi')->count_all_results();
		$jumlah_tidak_jawab = $this->db->where('baca_jawab', 0)->where("id_petanya",$dataprofile["user_front"])->from('tb_forum_konsultasi')->count_all_results();
		}else{
		$jumlah_jawab = $this->db->where('baca_jawab', 1)->from('tb_forum_konsultasi')->count_all_results();
		$jumlah_tidak_jawab = $this->db->where('baca_jawab', 0)->from('tb_forum_konsultasi')->count_all_results();
		}

		$data["jumlah_jawab"] = $jumlah_jawab;
		$data["jumlah_tidak_jawab"] = $jumlah_tidak_jawab;

		$data["forum"] = $forum; 	
		$data["kategori"] = $kategori;
		$data["nama_user"] = $dataprofile["name_front"];
		$data["level_user"] = $dataprofile["level_front"];
		$data["user_id"] = $dataprofile["user_front"];
		$data["employ_id"] = $dataprofile["employ_front"];



		$config['base_url']     = site_url("biodata/forum_konsultasi/")."?kategori=".$this->input->get("kategori")."&status=".$this->input->get("status")."&keyword=".$this->input->get("keyword");
		$config['total_rows']    = $jumlah;
		$config['per_page']     = $limit;
		$config['page_query_string'] = TRUE;

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
		

		$this->template->load("template_header","forum_konsultasi",$data);
		$this->template->load("template_footer","forum_konsultasi",$data);



	}

	public function lihatforum(){

		$id = $this->input->post("id_forum");
		$datavalue["status_baca"]=1;
		$this->db->where("id_forum",$id)->update("tb_forum_konsultasi",$datavalue);

		$this->db->join("ropeg.tb_kategori_forum","ropeg.tb_kategori_forum.id_kategori_forum=tb_forum_konsultasi.id_kategori");
		$this->db->join("simpeg.tr_user","simpeg.tr_user.user_id=tb_forum_konsultasi.id_petanya");
		$query =  $this->db->where("id_forum",$id)->get("tb_forum_konsultasi")->row_array();
		$data = $query;
		$data["tanggal_post"] = date("d M Y",strtotime($query["tanggal_kirim"]))." Jam ".date("H:i",strtotime($query["tanggal_kirim"]));
		$data["namePenanya"] = $query["name"];
		echo json_encode($data);
		die;
	}

	public function sendjawaban(){

		if(!$this->session->userdata('logged_in'))
   		{
   			redirect('/biodata/index');

   		}	
		
		$dataprofile = $this->session->userdata('logged_in');

		try{
			
			$data = array(
			
			   'jawaban' => $this->input->post("jawabanLihat2"),
			   'tanggal_jawab' => date("Y-m-d H:i:s"),
			   'id_penjawab'=>$dataprofile["user_front"],
			   'baca_jawab'=>1
			
			);

			if($this->input->post("kaitannya"))
			$data["status_kaitannya"] = $this->input->post("kaitannya");
			if($this->input->post("ditanyakan"))
			$data["status_ditanyakan"] = $this->input->post("ditanyakan");

			$this->db->where("id_forum",$this->input->post("id_forum"));
			$update = $this->db->update('tb_forum_konsultasi', $data);
			$response["success"] = "1";
			$response["message"] = "Pesan Berhasil DiJawab";
			echo json_encode($response);


		}catch(Exception $e){

			$response["success"] = "0";
    		$response["message"] = "Pesan tidak terkirim :".$e->getMessage();
			echo json_encode($response);


		}

	}

	public function check_login($username,$password){

			$query_all = $this->database_two->query("select employee_id,user_id,name,level from tr_user where user_id='".$username."' and mzpwd=md5('".$password."')")->row();
			
			if(count($query_all) > 0){
				
				$data["user_front"]  = $query_all->user_id;
				$data["name_front"]  = $query_all->name;
				$data["level_front"] = $query_all->level;
				$data["employ_front"] = $query_all->employee_id;
				$this->session->set_userdata('logged_in', $data);

				return TRUE;
			
			}else{
			
				return FALSE;
			
			}

	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('/biodata/index');

	}

	

}