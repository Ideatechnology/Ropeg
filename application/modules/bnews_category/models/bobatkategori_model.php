<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Bobatkategori_model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function cari_data($limit,$offset,$nama)
{
	$q = $this->db->query("SELECT a.* , b.obatkategori_category  FROM obatkategori a, obatkategori_category b WHERE a.id_obat_kategori_category=b.id_obat_kategori_category 
	AND (a.obat_kategori like '%$nama%' or b.obatkategori_category like '%$nama%' ) LIMIT $offset,$limit");
	
	return $q;
}
function tot_hal($tabel,$field,$kata)
{
	$q = $this->db->query("select * from $tabel where $field like '%$kata%'");
	return $q;
}


	



	
}