<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bakses extends CI_Controller {
	private $limit = 10;
	function Bakses(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('mypagination' );
		$this->load->model('bakses_model','bakses');
		$this->load->library('auth');
		$this->load->helper('url');
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
	
	function index()
	{
		$this->index_list();
	}
	
	function index_list()
	{
		$uri_segment=4;
		$offset = $this->uri->segment($uri_segment,0);
		$query = $this->bakses->user_list(1,$this->limit,$offset,null,null);
		$jum_data = $this->bakses->user_list(0,null,null,null,null);
		$this_url = 'bakses/pagging/';
		$data2 = $this->mypagination->getPagination($jum_data->num_rows(),$this->limit,$this_url,$uri_segment);
		$data['paging'] = $data2['link'];
		$data['offset'] = $offset;
		$data['jum_data'] = $jum_data->num_rows();
		$data['result'] = $query->result();
		$this->template->load('template_backend','display',$data);
	}
	
	function pagging()
	{
		$uri_segment=3;
		$dis = $this->uri->segment(4);
		$cr = $this->uri->segment(5);
		$limited=((isset($dis) && ($dis!='' || $dis!=null))?$dis:$this->limit);
		$sgmnt = $this->uri->segment(3);
		$offset = ((isset($sgmnt) && ($sgmnt!='' || $sgmnt!=null))?$sgmnt:0);
		$sqlCari="";
		if($cr=='cr'){
			$data['cari_display']='';
		}else{
			$data['cari_display']= str_replace('%20',' ',$cr);
			//$sqlCari .= " AND (x.rolename LIKE '%".str_replace('%20',' ',$cr)."%' OR y.nama_menus LIKE '%".str_replace('%20',' ',$cr)."%')";
			$sqlCari .= " WHERE (x.rolename LIKE '%".str_replace('%20',' ',$cr)."%' )";
		}
		
		$query = $this->bakses->user_list(1,$limited,$offset,null,$sqlCari);
		$jum_data = $this->bakses->user_list(0,null,null,null,$sqlCari);
		$this_url = 'bakses/pagging/';
		$data2 = $this->mypagination->getPagination($jum_data->num_rows(),$limited,$this_url,$uri_segment);
		$data['paging'] = $data2['link'];
		$data['offset'] = $offset;
		$data['data_display'] = $limited;
		$data['jum_data'] = $jum_data->num_rows();
		$data['result'] = $query->result();
		$this->load->view('list',$data);
	}
	
	function simpan()
	{
		$dicek = $this->input->post('dicek');
		$username = $this->input->post('username');
		if($dicek!='' || $dicek!=null){
			$this->db->where('rolename',$username);
			$this->db->delete('tb_menu_user');
			for($i=0;$i<(count($dicek));$i++){
				$dataIn = array(
							'rolename' => $username,
							'id_menu' => $dicek[$i]
						);
				$this->db->insert('tb_menu_user',$dataIn);
			}
			$data['msg'] = 'Data berhasil di simpan.';
			$data['status'] = 'succes';
		}else{
			$data['status'] = 'error';
			$data['msg'] = "Penyimpanan Gagal !!<br>Harap cek yang dipilih ??";
		}
		echo json_encode($data);
	}
	
	function user_edit()
	{
		$this->session->unset_userdata('s_akses_menu');
		$id=$this->uri->segment(3);
		$sql = "select * from tb_menu_user where rolename='".str_replace('%20',' ',$id)."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$dataku[$row->id_menu] = $row->id_menu;
			}
			$this->session->set_userdata('s_akses_menu',$dataku);
		}
		$data['username'] = str_replace('%20',' ',$id);
		$this->load->view('form',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */