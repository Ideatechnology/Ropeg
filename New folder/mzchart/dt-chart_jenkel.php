<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ('');

function Search_thn() 
{
	global $fLib;
	$jum = $fLib->getValue ("select count(distinct(thn)) from fact_psex");
	$mulai = 0;
	if ($jum > 5) {$mulai = $jum - 5; $jum=5; }
	$SQL = " select thn, sum(jml) 
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5 " ;
	$ret = $fLib->query ($SQL);
	$i = 1; $thn = "";
	while ($row = $ret->fetch_array () ) {
		if ($row['thn']<2000)	
				$tahun = 2000 + $row['thn'] ;
		else 	$tahun = $row['thn'] ;
			
		$thn = $thn . '"' . $tahun . '"' ;
		if ($i != $jum) { $thn = $thn . ',' ;}
		$i ++;
	}
	return $thn;
}

function Search_value() 
{
	global $fLib;
	$jum = $fLib->getValue ("select count(distinct(thn)) from fact_psex");
	$mulai = 0;
	if ($jum > 5) {$mulai = $jum - 5; $jum=5; }
	$SQL = " select thn, sum(jml) as nilai
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5 " ;
	$ret = $fLib->query ($SQL);
	$i = 1; $nil = "";
	while ($row = $ret->fetch_array () ) {
		$nil = $nil . $row['nilai'];
		if ($i != $jum) { $nil = $nil . ',' ;}
		$i ++;
	}
	return $nil;
}

function Search_desc() 
{
	global $fLib;
	$jum = $fLib->getValue ("select count(distinct(thn)) from fact_psex");
	$mulai = 0;
	if ($jum > 5) {$mulai = $jum - 5; $jum=5; }
	$jum = $jum - 1;
	$SQL = " select thn, sum(jml) as nilai
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5 " ;
	$ret = $fLib->query ($SQL);
	$i = 0; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$desc = $desc . '{"x":' . $i . ',"y":' . $row['nilai'] . '}' ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	return $desc;
}

function Search_minmaxval() 
{
	global $fLib;
	$min = $fLib->getValue ("select sum(jml) as nilai from fact_psex group by thn order by nilai asc limit 1");
	if ($min==''){$min=0;}
	else { $min = $min - 500;}
	
	$min = $min / 500 ;
	$min = floor($min) *500; 
	
	$max = $fLib->getValue ("select sum(jml) as nilai from fact_psex group by thn order by nilai desc limit 1");
	if ($max==''){$max=0;}
	else { $max = $max + 500;}
	
	$minmax = '"min": ' . $min . ', "max": ' . $max . ',"steps": 500' ;
	//$minmax = '"min": 10000, "max": 12500,"steps": 500' ;
	return $minmax;
}

function Search_minmaxyear() 
{
	global $fLib;
	$min = $fLib->getValue ("select thn from fact_psex order by thn asc limit 1");
	if ($min==''){$min=0;}
	if (strlen($min)==1){$min = "200" . $min ;}
		else {$min = "20" . $min ;}
	
	$max = $fLib->getValue ("select thn from fact_psex order by thn desc limit 1");
	if ($max==''){$max=0;}
	if (strlen($max)==1){$max = "200" . $max ;}
		else {$max = "20" . $max ;}
		
	$minmax = $min . "-" . $max ;
	return $minmax;
}

function gen_json ( $title )
{
	$str = '{"x_axis":{'.
			'	"offset": false,'.
			'	"labels":{'.
			'		"steps":1,'.
			'		"labels":[' . Search_thn() . '] 
				}
			},'.
			
			'"y_axis": { ' . Search_minmaxval() . ' }, '.
			
			'"bg_colour":"#ffffff",'.
			
			'"elements":['.
				'{'.
				'	"type":			"area",'.
				'	"colour":		"#49a0f9",'.
				'	"line-style":	{"style":"solid","on":4,"off":4},'.
				'	"dot-style":	{"type":"hollow-dot", "width":3, "size":2},'.
				'"values":[' . Search_value() . '],'.
				'	"fill-alpha":0.5,'.
				'	"width":     1,'.
				'	"on-show":	{"type": "mid-slide", "cascade":1, "delay":0.5}'.
			'},
			{
				"type":"tags",
				"values":[ ' . Search_desc() . ' ],
				"font":"Verdana","font-size":10,"colour":"#000000","align-x":"center","text":"#y#"
			}
		],'.
			'}';
	echo $str;

}
?>