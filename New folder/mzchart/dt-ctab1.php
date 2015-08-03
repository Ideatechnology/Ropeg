<?php
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ('Pertumbuhan PNS Menurut Jenis Kelamin, ' . Search_minmaxyear() . '');

function Search_yr() 
{
	global $fLib;
	$jum = $fLib->getValue ("select count(distinct(yr)) from fact_agesexgol");
	$SQL = " select yr, sum(jml) 
			from fact_agesexgol 
			group by yr   " ;
	$ret = $fLib->query ($SQL);
	$i = 1; $thn = "";
	while ($row = $ret->fetch_array () ) {
		if (strlen($row['yr'])==1){$tahun = "200" . $row['yr'] ;}
		else {$tahun = "20" . $row['yr'] ;}
		$thn = $thn . '"' . $tahun . '"' ;
		if ($i != $jum) { $thn = $thn . ',' ;}
		$i ++;
	}
	return $thn;
}

function Search_value() 
{
	global $fLib;
	$jum = $fLib->getValue ("select count(distinct(yr)) from fact_agesexgol");
	$SQL = " select yr, sum(jml) as nilai
			from fact_agesexgol 
			group by yr   " ;
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
	$jum = $fLib->getValue ("select count(distinct(yr)) from fact_agesexgol");
	$jum = $jum - 1;
	$SQL = " select yr, sum(jml) as nilai
			from fact_agesexgol 
			group by yr  " ;
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
	$min = $fLib->getValue ("select sum(jml) as nilai from fact_agesexgol group by yr order by nilai asc limit 1");
	if ($min==''){$min=0;}
	else { $min = $min - 500;}
	
	$min = $min / 500 ;
	$min = floor($min) *500; 
	
	$max = $fLib->getValue ("select sum(jml) as nilai from fact_agesexgol group by yr order by nilai desc limit 1");
	if ($max==''){$max=0;}
	else { $max = $max + 500;}
	
	$minmax = '"min": ' . $min . ', "max": ' . $max . ',"steps": 500' ;
	return $minmax;
}

function Search_minmaxyear() 
{
	global $fLib;
	$min = $fLib->getValue ("select yr from fact_agesexgol order by yr asc limit 1");
	if ($min==''){$min=0;}
	if (strlen($min)==1){$min = "200" . $min ;}
		else {$min = "20" . $min ;}
	
	$max = $fLib->getValue ("select yr from fact_agesexgol order by yr desc limit 1");
	if ($max==''){$max=0;}
	if (strlen($max)==1){$max = "200" . $max ;}
		else {$max = "20" . $max ;}
		
	$minmax = $min . "-" . $max ;
	return $minmax;
}

function gen_json ( $title )
{
	$str = '{"title":{ '. 
			'	"text":"' . $title .'", '.		
			'	"style":"font-size: 18px; font-weight: bold; font-family: Verdana; text-align: left;"'.
			'},'.
			
			'"x_axis":{'.
			'	"offset": false,'.
			'	"labels":{'.
			'		"steps":1,'.
			'		"labels":[' . Search_yr() . '] 
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