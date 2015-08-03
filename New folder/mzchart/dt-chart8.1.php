<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
	
gen_json ('Distribusi Menurut Jabatan Struktural ' . tahun() );

function tahun()
{
	global $fLib;
	$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 1,1");
	if ($thn == '') {$thn = 0;}
	if (strlen($thn)==1){$thn = "200" . $thn ;}
		else {$thn = "20" . $thn ;}
	return $thn;
}

function CariNilai()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(yr) from fact_peg order by yr desc limit 1,1");
	if ($thn == '') {$thn = 0;}
	$jum = $fLib->getValue ("select count(distinct(eselon)) from dim_eselon");
	$tot = $fLib->getValue ("select sum(jml) from fact_peg where yr=$thn");
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select eselon, name from dim_eselon
			order by eselon asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$eselon = $row['eselon'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_peg where eselon='$eselon' and yr=$thn");
		if ($val == '') { $val = 0;}
		
		if ($tot == 0 or $val == 0) {
			$nil = 0;
		} else {
			$nil = ($tot / $val) * 100;
		}
		
		$desc = $desc . '{"value" : ' . $nil . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	
	return $desc;
}

function gen_json ( $title )
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
	  "bg_colour" : "#FFFFFF",
	  "title" : {
		"text" : "'. $title. '",
		"style" : "{font-size: 18px; color:#0000ff; font-family: bold; font-family: Verdana; text-align: left;}"
	  }
	}';
	echo $str;

}
?>