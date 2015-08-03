<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Manggu Framework
 * Simple PHP Application Development
 * Kusnassriyanto S. Bahri
 * kusnassriyanto@gmail.com
 * 
 */

function getArrayDef($array, $index, $default=null){
    if (isset($array[$index])){
        return $array[$index];
    } else {
        return $default;
    }
}

function getKode($awal,$select,$from)
{
	$CI =& get_instance();
	$sql = "select ".$select." as kode from ".$from;
	$query = $CI->db->query($sql);
	$thn = substr(date('Y'),2,2);
	$bln = date('m');
	$tgl = date('d');
	if((int)$tgl==1){
		$hasil=$awal.$thn.$bln.'00001';
	}else{
		if($query->num_rows() > 0){
			$field = $query->row();
			$inc = (int)substr($field->kode,-5,5);
			$inc = $inc + 1;
			$hasil = $awal.$thn.$bln. sprintf("%05s", $inc);
		}else{
			$hasil=$awal.$thn.$bln.'00001';
		}
	}
	
	return $hasil;
}



?>
