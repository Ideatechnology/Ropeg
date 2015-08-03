<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buser extends CI_Controller {
	private $limit = 10;
	function Buser(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('mypagination' );
		$this->load->model('buser_model','buser');
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
		$query = $this->buser->user_list(1,$this->limit,$offset,null,null);
		$jum_data = $this->buser->user_list(0,null,null,null,null);
		$this_url = 'buser/pagging/';
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
			$sqlCari .= " AND (nama_pengguna LIKE '%".str_replace('%20',' ',$cr)."%' OR nama_lengkap LIKE '%".str_replace('%20',' ',$cr)."%' OR email_pengguna LIKE '%".str_replace('%20',' ',$cr)."%' OR telp_pengguna LIKE '%".str_replace('%20',' ',$cr)."%')";
		}
		
		$query = $this->buser->user_list(1,$limited,$offset,null,$sqlCari);
		$jum_data = $this->buser->user_list(0,null,null,null,$sqlCari);
		$this_url = 'buser/pagging/';
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
		$nama_pengguna = $this->input->post('nama_pengguna');
		$nama_pengguna2 = $this->input->post('nama_pengguna2');
		$kunci_masuk = $this->input->post('kunci_masuk');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$email_pengguna = $this->input->post('email_pengguna');
		$telp_pengguna = $this->input->post('telp_pengguna');
		$id_cabang = $this->input->post('id_cabang');
		$rolename = $this->input->post('rolename');

		$conf = array (		
						array(
							'field'=>'nama_pengguna',
							'label'=>'',
							'rules'=>'trim|required|'
							),
						array(
							'field'=>'kunci_masuk',
							'label'=>'',
							'rules'=>'trim|required'
							),
						array(
							'field'=>'email_pengguna',
							'label'=>'',
							'rules'=>'trim|valid_email'
							)
					);
		$this->form_validation->set_rules($conf); 
		$this->form_validation->set_message('required', '%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric', '%s harus berisi angka.');
	//	$this->form_validation->set_message('min_length', '%s minimal 6 digit.');
		//$this->form_validation->set_message('max_length', '%s maksimal 5 digit.');
		$this->form_validation->set_message('matches', '%s tidak sesuai.');
		$this->form_validation->set_message('valid_email', '%s tidak valid.');
		
		if ($this->form_validation->run() === FALSE){
			$data['status'] = 'error';
			$data['msg'] = "Penyimpanan Gagal !!<br>Harap cek kembali inputannya ??";
		}else{
			$dataIn= array(
					'nama_pengguna' => $nama_pengguna,
					'email_pengguna' => $email_pengguna,
					'nama_lengkap' => $nama_lengkap,
					'telp_pengguna' => $telp_pengguna,
					'id_cabang' => $id_cabang,
					'rolename' => $rolename
				);
		
				
			if($nama_pengguna2=='' || $nama_pengguna2==null){
				$sql = $this->db->query("select * from sis_pengguna where binary nama_pengguna ='".$nama_pengguna."'");
				if($sql->num_rows() > 0){
					$data['status'] = 'error';
					$data['msg'] = "Maaf, Nama Pengguna tersebut telah ada!!";
				}else{
					$dataIn['kunci_masuk'] = sha1(md5($kunci_masuk));
					$this->db->insert('sis_pengguna',$dataIn);
					$data['msg'] = 'Data berhasil di simpan.';
					$data['status'] = 'succes';
				}
			}else{
				if($nama_pengguna==$nama_pengguna2){
					$this->db->where('nama_pengguna',$nama_pengguna2);
					$this->db->update('sis_pengguna',$dataIn);
					$data['msg'] = 'Data berhasil di ubah.';
					$data['status'] = 'succes';
				}else{
					$sql = $this->db->query("select * from sis_pengguna where binary nama_pengguna = '".$nama_pengguna."' and binary nama_pengguna <> '".$nama_pengguna2."'");
					if($sql->num_rows() > 0){
						$data['status'] = 'error';
						$data['msg'] = "Maaf, Nama Pengguna tersebut telah ada!!";
					}else{
						$this->db->where('nama_pengguna',$nama_pengguna2);
						$this->db->update('sis_pengguna',$dataIn);
						$data['msg'] = 'Data berhasil di ubah.';
						$data['status'] = 'succes';
					}
				}
			}
		}
		echo json_encode($data);
	}
	
	function user_edit()
	{
		$id=$this->uri->segment(3);
		if($id=='' || $id==null){
			$this->load->view('form');	
		}else{
			$query = $this->buser->user_list(0,null,null,str_replace('%20',' ',$id),null);
			$data['field'] = $query->row_array();
			$this->load->view('form',$data);
		}
	}
	
	function user_delete()
	{
		$id=$this->uri->segment(3);
		$this->db->where('nama_pengguna', str_replace('%20',' ',$id));
		$this->db->delete('sis_pengguna');
		$data['msg'] = 'Data berhasil dihapus.';
		$data['status'] = 'succes';
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */