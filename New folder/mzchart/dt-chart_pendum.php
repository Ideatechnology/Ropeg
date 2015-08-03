<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");	
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");

gen_json ();


function gen_value ($pria, $wanita)
{
    return '[{"val":'.$pria.',"colour":"#0044ff","tip": "pria: '.$pria.'"},' .
		 '{"val":'.$wanita.',"colour":"#ff00ff","tip": "wanita: '.$wanita.'"}]';
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

function gen_edu()
{
	global $fLib;
	
	$thn = $fLib->getValue ("select distinct(thn) from fact_edu order by thn desc limit 0,1");
	$jum = $fLib->getValue ("select count(distinct(edu)) from dim_edu");
	
	$SQL = " select edu, name from dim_edu order by edu asc ";
	$ret = $fLib->query ($SQL);
	$i = 1; $desc = "";
	while ($row = $ret->fetch_array () ) {
		$edu = $row['edu'];
		
		$pria = $fLib->getValue ("select sum(jml) from fact_edu where edu='$edu' and sex=1 and thn=$thn");
		$wanita = $fLib->getValue ("select sum(jml) from fact_edu where edu='$edu' and sex=2 and thn=$thn");
		
		$rinc = '[{"val":'.$pria.',"colour":"#0044ff","tip": "pria: '.$pria.'"},' .
				'{"val":'.$wanita.',"colour":"#ff00ff","tip": "wanita: '.$wanita.'"}]';
		 
		$desc = $desc .  $rinc   ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

function gen_json ()
{
$str = 
'
{
  "bg_colour" : "#FFFFFF",
  "elements":[
    {
      "type":      "bar_stack",
      "keys": [
        {"colour":"#0044ff", "text": "pria", "font-size": 14},
        {"colour":"#ff00ff", "text": "wanita", "font-size": 14}
      ],
	  "on-show":	{"type": "drop", "delay":0.5, "cascade":0.6},
      "tip":       "#x_label# : #val#",
      "values": ['. gen_edu() . ']
    }
  ],

  "x_axis":{
    "max":9,
    "steps": 1,
    "labels": {
      "labels": [ ' . education() . ']
    },
    "stroke": 2,
    "tick-height": 6
  },

  "y_axis":{
    "max": 2500
  },

  "tooltip":{
    "mouse": 2,
    "stroke":1
  }
}
';

	echo $str;

}
?>