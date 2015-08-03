<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
	
gen_json ();


function CariNilai()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_ese order by thn desc limit 0,1");
	if ($thn == '') {$thn = 0;}
	$jum = $fLib->getValue ("select count(distinct(eselon)) from dim_eselon");
	$tot = $fLib->getValue ("select sum(jml) from fact_ese where thn=$thn");
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select eselon, name from dim_eselon
			order by eselon asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$eselon = $row['eselon'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_ese where eselon='$eselon' and thn=$thn");
		if ($val == '') { $val = 0;}
		
		$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	
	return $desc;
}

function gen_json ()
{
	$str = 
		'{ "elements" : ['.
			'{'.
				'"tip" : "#val# of #total#<br>#percent#",'.
				'"colours" : [
					"0xc33bf6", "0x296ae1", "0x23c34d", "0xf66b3b",
					"0xffe90d", "0x006666", "0x3399FF", "0x993300"],'.
			  '"alpha" : 0.7,
			  "start_angle" : 135,
			  "radius":120,
			  "no-labels":false,
			  "ani--mate" : true,
			  //"label-colour":0,  // leave out or set to null for auto-colour labels
			   "values" : [ ' . CariNilai() . ' ],
			  "type" : "pie",
			  "border" : "2"
		}
	  ],
	  "bg_colour" : "#FFFFFF"
	}';
	echo $str;

}
?>