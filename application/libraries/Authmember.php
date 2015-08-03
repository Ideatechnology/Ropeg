<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authmember {

    function check_user_authentification($admin_only = 0)
    {
		$CI =& get_instance();
		$CI->load->library('session');
		if(!$CI->session->userdata('sesi_email_member'))
		{
			//echo 'ada disini';
			$data = array(
				'SESS_LOGIN_STATEMENT' => 'Akses Ditolak ;)',
				'error_msg' => 'Anda harus login terlebih dahulu !'
			);
			$CI->session->set_userdata($data);
			redirect('signin');
 		}
 		elseif($admin_only && (!$CI->session->userdata('s_admin')))
 		{
			$data = array(
				'SESS_LOGIN_STATEMENT' => 'Akses Ditolak ;)',
				'error_msg' => 'Anda harus login sebagai admin untuk dapat mengakses bagian management'
			);
			$CI->session->set_userdata($data);
			redirect('signin');
		}
    }
	
	
}

?>
