<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ();

function CariNilai()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_agesex order by thn desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(age)) from dim_age");
	$tot = $fLib->getValue ("select sum(jml) from fact_agesex where thn=$thn");
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select age, name from dim_age order by age asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$age = $row['age'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_agesex where age='$age' and thn=$thn");

		$desc = $desc . '{"value" : ' . fldNumber($val) . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
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
					"0xffe90d", "0x006666", "0x3399FF", "0x993300",
					"0xAAAA77", "0xff0d46", "0xFFCC66", "0x6699CC" ],'.
			  '"alpha" : 0.9,
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