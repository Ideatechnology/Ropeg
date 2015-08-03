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
	
	
	
	
	
	function simpan_setting()
	{
		
		$this->db->query("DELETE FROM tb_setting_form WHERE id_menu='".$this->input->post('id')."'");
		
		$dataIn = array(
				'id_menu' => $this->input->post('id'),
				'flag_blok' => $this->input->post('flag_blok'),
				'flag_param_formulir' => $this->input->post('flag_param_formulir'),
				'flag_param_parpol' => $this->input->post('flag_param_parpol')
				);
		$this->db->insert('tb_setting_form',$dataIn);
		
			echo '<script>
					alert("Data berhasil disimpan.");
					window.location="'.site_url('bpublik').'";
				</script>';
		
	}
	
	
	function simpan_input()
	{
		
		
		
		try
				{
							
						$file_name = $_FILES['userfile']['name'];
						$file_name_pieces = split('_', $file_name);
									
						$new_file_name = '';
						$count = 1;

						foreach($file_name_pieces as $piece)
						{
							if ($count !== 1)
								{
									$piece = ucfirst($piece);
								}

									$new_file_name .= $piece;
									$count++;
						}
						   
						$config['file_name'] = $new_file_name;
						$config['upload_path'] = './gudangdata/';
						$config['allowed_types'] = 'pdf';
						/*$config['max_size']	= '100';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
						*/

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if ( ! $this->upload->do_upload())
						{
							$error = array('error' => $this->upload->display_errors());
							echo $this->upload->display_errors();
						}
						else
						{ 
							//$data = array('upload_data' => $this->upload->data()); echo $new_file_name;
							 $file_data = $this->upload->data();
							// echo $file_data['file_name'];
					
							 
								if ($this->input->post('flag_param_formulir')==1) { $flag_param_formulir=$this->input->post('id_formulir');} else { $flag_param_formulir=NULL;}
								if ($this->input->post('flag_param_parpol')==1) { $flag_param_parpol=$this->input->post('id_parpol');} else { $flag_param_parpol=NUll;}
								
								if ($this->input->post('flag_blok')==1) {
								
									
									$dataIn = array(
											'id_menu' => $this->input->post('id'),
											'id_provinsi' => $this->input->post('id_provinsi_dapil'),
											'id_dapil' => $this->input->post('id_dapil'),
											'id_formulir' => $flag_param_formulir,
											'id_parpol' => $flag_param_parpol,
											'createtime' => date("Y-m-d H:i:s"),
											'ket' => $this->input->post('ket'),
											'path'=>$file_data['file_name']
											);
									$this->db->insert('tb_dokumen',$dataIn);
								
								
								
								} elseif ($this->input->post('flag_blok')==2) {
								
								
									$dataIn = array(
											'id_menu' => $this->input->post('id'),
											'id_provinsi' => $this->input->post('id_provinsi'),
											'id_kabkot' => $this->input->post('id_kabkot'),
											'id_formulir' => $flag_param_formulir,
											'id_parpol' => $flag_param_parpol,
											'createtime' => date("Y-m-d H:i:s"),
											'ket' => $this->input->post('ket'),
											'path'=>$file_data['file_name']
											);
									$this->db->insert('tb_dokumen',$dataIn);
								
								
								
								} elseif ($this->input->post('flag_blok')==3) { 
								
									$dataIn = array(
											'id_menu' => $this->input->post('id'),
											'id_negara' => $this->input->post('id_negara'),
											'id_kantor_perwakilan' => $this->input->post('id_kantor_perwakilan'),
											'id_formulir' => $flag_param_formulir,
											'id_parpol' => $flag_param_parpol,
											'createtime' => date("Y-m-d H:i:s"),
											'ket' => $this->input->post('ket'),
											'path'=>$file_data['file_name']
											);
									$this->db->insert('tb_dokumen',$dataIn);
								
								}
							 
							 
							 $idlamp= $this->input->post('id');
							 
							 redirect('bpublik/open_form_add/'.$idlamp.'');
							 
							 
							 
						}
					
							
							

							


				}
				catch(Exception $err)
				{
				log_message("error",$err->getMessage());
				return show_error($err->getMessage());
				}
		
		
		
		
		
		
		
		
		
		/*
		
		$dataIn = array(
				'id_menu' => $this->input->post('id'),
				'flag_blok' => $this->input->post('flag_blok'),
				'flag_param_formulir' => $this->input->post('flag_param_formulir'),
				'flag_param_parpol' => $this->input->post('flag_param_parpol')
				);
		$this->db->insert('tb_setting_form',$dataIn);
		
			echo '<script>
					alert("Data berhasil disimpan.");
					window.location="'.site_url('bpublik').'";
					
				</script>';
				
				*/
		
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
	
	function open_form_add()
	{
		$id=$this->uri->segment(3);
		if($id!='' && $id!=null){
			$sql = "select a.*,if(a.parrent='0','ROOT',b.nama_menu) as nama_parrent from tb_menu_member a left join tb_menu_member b on (a.parrent = b.id) where a.id='".str_replace('%20',' ',$id)."'";
			$query = $this->db->query($sql);
			$data['field'] = $query->row_array();
			$this->template->load('template_backend','form_add',$data);
		}else{
			$this->template->load('template_backend','form_add');
		}
	}
	
	
	function open_form_view()
	{
		$id=$this->uri->segment(3);
		if($id!='' && $id!=null){
			$sql = "select a.*,if(a.parrent='0','ROOT',b.nama_menu) as nama_parrent from tb_menu_member a left join tb_menu_member b on (a.parrent = b.id) where a.id='".str_replace('%20',' ',$id)."'";
			$query = $this->db->query($sql);
			$data['field'] = $query->row_array();
			$this->template->load('template_backend','form_view',$data);
		}else{
			$this->template->load('template_backend','form_view');
		}
		
	}
	
	
	
	function open_form_setting()
	{
		$id=$this->uri->segment(3);
		if($id!='' && $id!=null){
			$sql = "select a.*,if(a.parrent='0','ROOT',b.nama_menu) as nama_parrent from tb_menu_member a left join tb_menu_member b on (a.parrent = b.id) where a.id='".str_replace('%20',' ',$id)."'";
			$query = $this->db->query($sql);
			$data['field'] = $query->row_array();
			$this->template->load('template_backend','form_setting',$data);
		}else{
			$this->template->load('template_backend','form_setting');
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
	
	
	function getSub()
	{
		$idx=$this->uri->segment(3);
		$idy=$this->uri->segment(4);
		$r = $this->db->query("select * from tb_kabkot where kode_prov='".$idx."' order by nama_kabkot ASC");

		echo "<option value=''>--Pilih--</option>";
		foreach($r->result()  as $row){ 
		
		?>
			 <option value="<?php echo $row->kode_kabkot; ?>" <?php if ($row->kode_kabkot==$idy) { echo "selected";} ?>><?php echo $row->nama_kabkot; ?></option>
			<?php
        }
		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */