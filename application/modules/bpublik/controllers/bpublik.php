<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpublik extends CI_Controller {
	private $limit = 10;
	function Bpublik(){
		parent::__construct();
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->library('mypagination' );
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
		$this->template->load('template_backend','display');
	}
	
	function simpan()
	{
		$dataIn = array(
				'nama_menu' => $this->input->post('nama_menu'),
				'link' => $this->input->post('link'),
				'parrent' => $this->input->post('parrent'),
				'description' => $this->input->post('description')
				);
		$id = $this->input->post('id');
		$f_foto = $this->input->post('f_file');
		$conf = array (		
						array(
							'field'=>'parrent',
							'label'=>'Parrent Menu',
							'rules'=>'trim|required'
							),
						array(
							'field'=>'nama_menu',
							'label'=>'Nama Menu',
							'rules'=>'trim|required'
							)
					);
		$this->form_validation->set_rules($conf); 
		$this->form_validation->set_message('required', '%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric', '%s harus berisi angka.');
		$this->form_validation->set_message('min_length', '%s minimal 6 digit.');
		$this->form_validation->set_message('max_length', '%s maksimal 5 digit.');
		$this->form_validation->set_message('matches', '%s tidak sesuai.');
		$this->form_validation->set_message('valid_email', '%s tidak valid.');
		$this->load->helper('uploadut');
		$this->load->library('image_lib');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp|tif|tiff';
		$config['max_size'] = 51200;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('userfile') && $this->input->post('userfile2')!='')
		{
			$dataIn['id'] = $this->input->post('id');
			$dataIn['file'] = $this->input->post('f_file');
			$dataIn['nama_parrent'] = $this->input->post('nama_parrent');
			$data['field'] = $dataIn;
			$data['pesan'] = $this->upload->display_errors('','');
			$this->template->load('template_backend','form',$data);
		}else if ($this->form_validation->run() === FALSE){
			$dataIn['id'] = $this->input->post('id');
			$dataIn['file'] = $this->input->post('f_file');
			$dataIn['nama_parrent'] = $this->input->post('nama_parrent');
			$data['field'] = $dataIn;
			$data['pesan'] = validation_errors();
			$this->template->load('template_backend','form',$data);
		}else{
			if($this->input->post('userfile2')!='') {
				$file = $this->upload->data();
				$fotoku = $file['file_name'];
				if($f_foto!=''){
					$df = end(explode('.',$f_foto));
					@unlink($config['upload_path'].$f_foto);
					@unlink($config['upload_path'].str_replace('.'.$df,'_thumb',$f_foto).'.'.$df);
				}
				$width=600;
				$height=300;
				create_thumb($file['full_path']);
				resize_image($file['full_path'], $width, $height);
			}else{ 
				$fotoku=$f_foto; 
			}
			if($id=='' || $id==null){
				$dataIn['file'] = $fotoku;
				$dataIn['tgl_entry'] = date('Y-m-d H:i:s');
				$dataIn['author'] = $this->session->userdata('sesi_nama_pengguna');
				$this->db->insert('tb_menu_member',$dataIn);
			}else{
				$dataIn['file'] = $fotoku;
				$dataIn['tgl_entry'] = date('Y-m-d H:i:s');
				$dataIn['author'] = $this->session->userdata('sesi_nama_pengguna');
				$this->db->where('id',$id);
				$this->db->update('tb_menu_member',$dataIn);
			}
			echo '<script>
					alert("Data berhasil disimpan.");
					window.location="'.site_url('bpublik').'";
				</script>';
		}
	}
	
	function open_form()
	{
		$id=$this->uri->segment(3);
		if($id!='' && $id!=null){
			$sql = "select a.*,if(a.parrent='0','ROOT',b.nama_menu) as nama_parrent from tb_menu_member a left join tb_menu_member b on (a.parrent = b.id) where a.id='".str_replace('%20',' ',$id)."'";
			$query = $this->db->query($sql);
			$data['field'] = $query->row_array();
			$this->template->load('template_backend','form',$data);
		}else{
			$this->template->load('template_backend','form');
		}
	}
	
	function cari_menu()
	{
		$this->load->view('list');
	}
	
	function ambil_child()
	{
		$data['id_tr'] = $this->uri->segment(3);
		$this->load->view('tree',$data);
	}
	
	function delete()
	{
		$id = $this->uri->segment('3');
		$this->db->where('id',$id);
		$this->db->delete('tb_menu_member');
		echo '<script>
					alert("Data berhasil dihapus.");
					window.location="'.site_url('bpublik').'";
				</script>';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */