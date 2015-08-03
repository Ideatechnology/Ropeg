<?php
class Bakses_model extends CI_Model {

	public function __construct()
    {
            parent::__construct();
	}
	
	function user_list($dipaging=0,$limit=10,$offset=1,$id=null,$cari=null)
	{
		$sql =  "select x.rolename
				from tb_roles x
				";
		if($cari!='' || $cari !=null) $sql .= " $cari";
		if($id!='' || $id !=null) $sql .= " WHERE binary x.rolename = '".$id."' ";
		
		if (isset($dipaging) && $dipaging ==1) $sql .= " limit $offset, $limit ";
		
		$query = $this->db->query($sql);
		
		//echo $sql;
		
		return $query;
	}
}

/* , y.nama_menus  left join (
						select a.rolename, group_concat(distinct b.nama_menu order by b.id separator ', ') as nama_menus
						from tb_menu_user a   
						left join tb_menu b on a.id_menu = b.id
						group by a.rolename
					) y ON (x.rolename = y.rolename)
				where (1=1)*/