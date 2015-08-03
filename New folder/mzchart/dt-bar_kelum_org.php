<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ('Distribusi PNS Menurut Kelompok Umur dan Jenis Kelamin');
//gen_json ('Distribusi PNS menurut \nTingkat Pendidikan dan Jenis Kelamin');

function age_pria()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(yr) from fact_agesexgol order by yr desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(age)) from dim_age");
	
	$SQL = " select age, name from dim_age
			order by age asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $pria = "";
	while ($row = $ret->fetch_array () ) {
		$age = $row['age'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_agesexgol where age='$age' and sex=1 and yr=$thn");
		if ($val == '') { $val = 0;}
		
		$pria = $pria . $val ;
		if ($i != $jum) { $pria = $pria . ',' ;}
		
		$i ++;
	}
	
	return $pria;
}

function age_wanita()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(yr) from fact_agesexgol order by yr desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(age)) from dim_age");
	
	$SQL = " select age, name from dim_age
			order by age asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $wanita = "";
	while ($row = $ret->fetch_array () ) {
		$age = $row['age'];
		
		$val = $fLib->getValue ("select sum(jml) from fact_agesexgol where age='$age' and sex=2 and yr=$thn");
		if ($val == '') { $val = 0;}
		
		$wanita = $wanita . $val ;
		if ($i != $jum) { $wanita = $wanita . ',' ;}
		
		$i ++;
	}
	
	return $wanita;
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
			  "text":      "pria",
			  "font-size": 10,
			  "on-show":	{"type": "pop", "cascade":1, "delay":2},
			  "values" :   [ ' . age_pria() . ']
			},
			
			{
			  "type":      "bar_glass",
			  "alpha":     0.5,
			  "colour":    "#f11c44",
			  "text":      "wanita",
			  "font-size": 10,
			  "on-show":	{"type": "drop", "cascade":0.9},
			  "values" :   [' . age_wanita() . ']
			}
			
		],

		"x_axis":{
			"stroke":2,
			"colour":"#909090",
			"grid_colour":"#00ff00",
			"labels":{
				"labels": ["0\n20","21\n25","26\n30","31\n35","36\n40","41\n45","46\n50","51\n55","56\n60","61\n65","65+"]
		    }
		},

		"y_axis":{
			"stroke":      4,
			"tick_length": 3,
			"colour":      "#909090",
			"grid_colour": "#d0d0d0",
			"offset":      0,
			"max":         1700
		}
	}';
	echo $str;

}
?>