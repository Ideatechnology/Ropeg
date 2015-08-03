<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");


gen_json ( );

function tahun1()
{
	global $fLib;
	$thn1 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 0,1");
	return fldNumber($thn1);
}

function nilai1()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 0,1");
	$thn = fldNumber($thn);
	$jum = $fLib->getValue ("select count(distinct(pangkat)) from dim_pangkat");
	$jum = fldNumber($jum);
	
	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$pangkat = $row['pangkat'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_golru where pangkat='$pangkat' and thn=$thn ");
		
		$desc = $desc .  fldNumber($nilai) ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function tahun2()
{
	global $fLib;
	$thn2 = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 1,1");
	return fldNumber($thn2);
}

function nilai2()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_golru order by thn desc limit 1,1");
	$thn = fldNumber($thn);
	$jum = $fLib->getValue ("select count(distinct(pangkat)) from dim_pangkat");
	$jum = fldNumber($jum);
	
	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$pangkat = $row['pangkat'];
		
		$nilai = $fLib->getValue ("select sum(jml) from fact_golru where pangkat='$pangkat' and thn=$thn ");
		
		$desc = $desc .  fldNumber($nilai)  ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function pangkat()
{
	global $fLib;
	
	$jum = $fLib->getValue ("select count(distinct(pangkat)) from dim_pangkat");
	
	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $educ = "";
	while ($row = $ret->fetch_array () ) {
		$pangkat = $row['name'];
		
		$educ = $educ . '"' . $pangkat . '"' ;
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
				"labels": [' . pangkat() . ']
		    }
		},

		"y_axis":{
			"stroke":      4,
			"tick_length": 3,
			"colour":      "#909090",
			"grid_colour": "#d0d0d0",
			"offset":      0,
			"max":         2500
		}
	}';
	echo $str;

}
?>