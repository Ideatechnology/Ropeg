<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Ijinmasuk_model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
    }
	
	
	 function validation($nama_pengguna, $password)
	{
		$sql =  "SELECT a.*,b.nama_cabang FROM sis_pengguna a, tb_cabang b WHERE a.id_cabang=b.id_cabang AND a.nama_pengguna= '".$nama_pengguna."' and a.kunci_masuk = '". sha1(md5($password)) . "'";
		$query = $this->db->query($sql);
		return $query;
	}	



	
}