<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ijinmasuk extends CI_Controller {

	function Ijinmasuk(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->load->model('ijinmasuk_model');
		 // load the session library
				$this->load->library('session');
		//$this->is_logged_in();
	}
	
	public function index()
	{	
	
	
		
				//$this->load->library('image_lib');
				$this->load->helper(array('captcha','url'));
	
		if($this->session->userdata('is_logged_in')){
		redirect('backpage');
		} else {
		
		
		
		// load codeigniter captcha helper
            $this->load->helper('captcha');
			
			
	    $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 4);
 
            $vals = array(
				'word' => strtoupper($captcha),
				'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
				'font_path' => base_url() . 'system/fonts/arial.ttf',
                'img_width'	 => '120',
                'img_height' => 30,
                'border' => 1, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
			$data['word'] = $cap['word'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
		
		
		$this->template->load('template_backend','v_ijinmasuk',$data);		
		}
	}
	
	
	
	function validate(){
		if (!$this->_user_validation())
		{
			$this->session->set_userdata('error_msg', validation_errors());
			$this->index();
		}
		else
		{
		
		
		
		
		if ( strtoupper($this->input->post('secutity_code')) ==  strtoupper($this->session->userdata('mycaptcha'))) { 
		
						$this->load->model('ijinmasuk_model');
						$nama_pengguna = $this->input->post('nama_pengguna');
						$password = $this->input->post('kunci_masuk');
						$query = $this->ijinmasuk_model->validation($nama_pengguna, $password);

						if($query->num_rows == 1)
						{
							$row = $query->row();
							
							
							
							
							$data = array(
								'sesi_nama_pengguna' => $row->nama_pengguna,
								'sesi_email_pengguna' =>$row->email_pengguna,
								'sesi_nama_lengkap' =>$row->nama_lengkap,
								'sesi_telp_pengguna' =>$row->telp_pengguna,
								'sesi_rolename' =>$row->rolename,
								'sesi_id_cabang' =>$row->id_cabang,
								'sesi_nama_cabang' =>$row->nama_cabang,
								'is_logged_in' => TRUE
							);
							$this->session->set_userdata($data);
							
							
							
							
							
							redirect('backpage');
						}else{
							$data = array(
								'error_msg' => "Username dan/atau Password salah !"
							);
							$this->session->set_userdata($data);
							redirect('ijinmasuk');
						}
			
			} else {
				
				$data['pesan'] = "Kode Keamanan Yang Anda Masukan Salah !!!";
				
				// load codeigniter captcha helper
            $this->load->helper('captcha');
 
             $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $captcha = substr(str_shuffle($original_string), 0, 4);
 
            $vals = array(
				'word' => strtoupper($captcha),
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '200',
                'img_height' => 30,
                'border' => 1, 
                'expiration' => 7200
            );
 
            // create captcha image
            $cap = create_captcha($vals);
 
            // store image html code in a variable
            $data['image'] = $cap['image'];
 
            // store the captcha word in a session
            $this->session->set_userdata('mycaptcha', $cap['word']);
				
				$data = array(
								'error_msg' => "Kode Keamanan Salah !!!"
							);
							$this->session->set_userdata($data);
				
				redirect('ijinmasuk');
				}
			
			
			
        }
	}

	
	function _user_validation(){
		$this->form_validation->set_rules('nama_pengguna', 'Username', 'trim|required');
		$this->form_validation->set_rules('kunci_masuk', 'Password', 'trim|required');

		return $this->form_validation->run();
	}

	function keluar(){
		$nama_pengguna = $this->session->userdata('s_nama_pengguna');
		$this->session->sess_destroy();
        redirect('ijinmasuk');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */