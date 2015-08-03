<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");


gen_json ( );

function tahun1()
{
	global $fLib;
	$thn1 = $fLib->getValue ("select distinct(thn) from fact_uker order by thn desc limit 0,1");
	if (strlen($thn1)==1){$thn1 = "200" . $thn1 ;}
		else {$thn1 = "20" . $thn1 ;}
	return $thn1;
}

function nilai1()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_uker order by thn desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(uker)) from dim_uker");
	
	$SQL = " select uker, name from dim_uker
			order by uker asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$uker = $row['uker'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_uker where uker='$uker' and thn=$thn ");
		
		$desc = $desc .  fldNumber($nilai)  ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function tahun2()
{
	global $fLib;
	$thn2 = $fLib->getValue ("select distinct(thn) from fact_uker order by thn desc limit 1,1");
	if (strlen($thn2)==1){$thn2 = "200" . $thn2 ;}
		else {$thn2 = "20" . $thn2 ;}
	return $thn2;
}

function nilai2()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_uker order by thn desc limit 1,1");
	$jum = $fLib->getValue ("select count(distinct(uker)) from dim_uker");
	
	$SQL = " select uker, name from dim_uker
			order by uker asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$uker = $row['uker'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_uker where uker='$uker' and thn=$thn ");
		
		$desc = $desc .  fldNumber($nilai)  ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function uker()
{
	global $fLib;
	
	$jum = $fLib->getValue ("select count(distinct(uker)) from dim_uker");
	
	$SQL = " select uker, nick from dim_uker
			order by uker asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $educ = "";
	while ($row = $ret->fetch_array () ) {
		$uker = $row['nick'];
		
		$educ = $educ . '"' . $uker . '"' ;
		if ($i != $jum) { $educ = $educ . ',' ;}
		
		$i ++;
	}
	
	return $educ;
}

function gen_json (  )
{
	$str = '{'.
		'"bg_colour" : "#FFFFFF",'.
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
				"labels": [' . uker() . ']
		    }
		},

		"y_axis":{
			"stroke":      4,
			"tick_length": 3,
			"colour":      "#909090",
			"grid_colour": "#d0d0d0",
			"offset":      0,
			"max":         500
		}
	}';
	echo $str;

}
?>