<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");


gen_json ('Distribusi PNS menurut Tingkat Pendidikan');

function tahun1()
{
	global $fLib;
	$thn1 = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 0,1");
	if (strlen($thn1)==1){$thn1 = "200" . $thn1 ;}
		else {$thn1 = "20" . $thn1 ;}
	return $thn1;
}

function nilai1()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(edu)) from dim_edu");
	
	$SQL = " select edu, name from dim_edu
			order by edu asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$edu = $row['edu'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_ageedusex where edu='$edu' and yr=$thn ");
		
		$desc = $desc .  $nilai   ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function tahun2()
{
	global $fLib;
	$thn2 = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 1,1");
	if (strlen($thn2)==1){$thn2 = "200" . $thn2 ;}
		else {$thn2 = "20" . $thn2 ;}
	return $thn2;
}

function nilai2()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(yr) from fact_ageedusex order by yr desc limit 1,1");
	$jum = $fLib->getValue ("select count(distinct(edu)) from dim_edu");
	
	$SQL = " select edu, name from dim_edu
			order by edu asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$edu = $row['edu'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_ageedusex where edu='$edu' and yr=$thn ");
		
		$desc = $desc .  $nilai   ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function education()
{
	global $fLib;
	
	$jum = $fLib->getValue ("select count(distinct(edu)) from dim_edu");
	
	$SQL = " select edu, name from dim_edu
			order by edu asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $educ = "";
	while ($row = $ret->fetch_array () ) {
		$edu = $row['name'];
		
		$educ = $educ . '"' . $edu . '"' ;
		if ($i != $jum) { $educ = $educ . ',' ;}
		
		$i ++;
	}
	
	return $educ;
}

function gen_json ( $title )
{
	$str = '{'.
		'"bg_colour" : "#FFFFFF",'.
		'"title":{'.
		'	"text":  "' . $title .'",'.
		'	"style": "{font-size: 15px; color:#0000ff; font-weight: bold; font-family: Verdana; text-align: left;}"
		  },'.

		' "y_legend":{
			"text": "Jumlah",
			"style": "{color: #909090; font-size: 12px;}"
		  },

		"elements":[
			{
			  "type":      "bar_glass",
			  "alpha":     0.5,
			  "colour":    "#3434da",
			  "text":      "' . tahun2() . '",
			  "font-size": 10,
			  "on-show":	{"type": "pop", "cascade":1, "delay":2},
			  "values" :   [' . nilai2() . ']
			},
			
			{
			  "type":      "bar_glass",
			  "alpha":     0.5,
			  "colour":    "#f11c44",
			  "text":       "' . tahun1() . '",
			  "font-size": 10,
			  "on-show":	{"type": "drop", "cascade":0.9},
			  "values" :   [' . nilai1() . ']
			}
			
		],

		"x_axis":{
			"stroke":2,
			"colour":"#909090",
			"grid_colour":"#00ff00",
			"labels":{
				"labels": [' . education() . ']
		    }
		},

		"y_axis":{
			"stroke":      4,
			"tick_length": 3,
			"colour":      "#909090",
			"grid_colour": "#d0d0d0",
			"offset":      0,
			"max":         5500
		}
	}';
	echo $str;

}
?>