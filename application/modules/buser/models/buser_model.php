<?php
class Buser_model extends CI_Model {

	public function __construct()
    {
            parent::__construct();
	}
	
	function user_list($dipaging=0,$limit=10,$offset=1,$id=null,$cari=null)
	{
		$sql =  "select * from sis_pengguna
				where (1=1) ";
		if($cari!='' || $cari !=null) $sql .= " $cari";
		if($id!='' || $id !=null) $sql .= " AND binary nama_pengguna = '".$id."' ";
		
		if (isset($dipaging) && $dipaging ==1) $sql .= " limit $offset, $limit ";
		
		$query = $this->db->query($sql);
		return $query;
	}
}
