<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    function check_user_authentification($admin_only = 0)
    {
		$CI =& get_instance();
		$CI->load->library('session');
		if(!$CI->session->userdata('sesi_nama_pengguna'))
		{
			//echo 'ada disini';
			$data = array(
				'SESS_LOGIN_STATEMENT' => 'Akses Ditolak ;)',
				'error_msg' => 'Anda harus login terlebih dahulu !'
			);
			$CI->session->set_userdata($data);
			redirect('ijinmasuk');
 		}
 		elseif($admin_only && (!$CI->session->userdata('s_admin')))
 		{
			$data = array(
				'SESS_LOGIN_STATEMENT' => 'Akses Ditolak ;)',
				'error_msg' => 'Anda harus login sebagai admin untuk dapat mengakses bagian management'
			);
			$CI->session->set_userdata($data);
			redirect('ijinmasuk');
		}
    }
	
	function hak_permission($id_user_group,$url){
		$CI =& get_instance();
		$urlfix = str_replace('/index_list','',$url);
	//	echo $urlfix;
		$sql = "select a.*, b.*
				from tbl_group_menu a
				left join tbl_menu b
				on (a.id_menu = b.id_menu)
				where a.id_user_group = $id_user_group
				and b.linkaction = '$urlfix'
				";
		//		echo $sql;
		$query = $CI->db->query($sql);
		if($query->num_rows() > 0){
			return TRUE;
		}
		else
		{
			//redirect('main');
			return false;
		}
	}
}

?>
