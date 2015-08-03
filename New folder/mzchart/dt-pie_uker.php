<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ();

function CariNilai()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_uker order by thn desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(uker)) from dim_uker");
	$tot = $fLib->getValue ("select sum(jml) from fact_uker where thn=$thn");
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select uker, nick from dim_uker
			order by uker asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$uker = $row['uker'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_uker where uker='$uker' and thn=$thn");
		if ($val == '') { $val = 0;}
		
		$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['nick'] . '","animate":[{"type":"bounce","distance":5}]}';
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