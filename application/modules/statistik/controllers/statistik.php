<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistik extends CI_Controller {

	function Statistik(){
		parent::__construct();
        // Your own constructor code
		$this->load->helper('utility');
		$this->load->helper('tool');
		$this->database_two = $this->load->database('simpeg',TRUE);
		
	}

	public function index(){

		$data = array();



		$query_jenkel = $this->database_two->query("select thn, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select thn, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_psex 
					   group by thn) as dt
					   group by thn
		order by thn asc
		limit 0,5")->result_array();


		$data["query_jenkel"] = $query_jenkel;

		$this->template->load('template_header','index',$data);
		$this->template->load('template_footer','index',$data);


	}

	public function kelompok_umur(){

		$data = array();

		$thn = $this->database_two->query("select distinct(thn) from fact_agesex order by thn desc limit 0,1")->row_array();
		$male = $this->database_two->query("select sum(jml) as jml from fact_agesex where sex=1 and thn=".@$thn["thn"]."")->row_array();
		$fema = $this->database_two->query("select sum(jml) as jml from fact_agesex where sex=2 and thn=".@$thn["thn"]."")->row_array();
		$tota = $this->database_two->query("select sum(jml) as jml from fact_agesex where thn=".@$thn["thn"]."")->row_array();

		$data["thn"] = $thn; 
		$data["male"] = $male; 
		$data["fema"] = $fema; 
		$data["tota"] = $tota; 

		$kelompok_umur = $this->database_two->query("select age, sum(male) as male, sum(fema) as fema, sum(tot) as tot
			from (select age, 
					sum((case when sex=1 then jml end)) as male,
					sum((case when sex=2 then jml end)) as fema,
					sum(jml) as tot
				   from fact_agesex 
				   where thn=".@$thn["thn"]."
				   group by age) as dt
				   group by age")->result_array();

		$data["kelompok_umur"] = $kelompok_umur; 

		$this->template->load('template_header','kelompok_umur',$data);
		$this->template->load('template_footer','kelompok_umur',$data);

	}

	public function pendidikan(){

		$data = array();

		$thn = $this->database_two->query("select distinct(thn) from fact_edu order by thn desc limit 0,1")->row_array();
		$male = $this->database_two->query("select sum(jml) as jumlah from fact_edu where sex=1 and thn=".$thn["thn"]."")->row_array();
		$fema = $this->database_two->query("select sum(jml) as jumlah from fact_edu where sex=2 and thn=".$thn["thn"]."")->row_array();
		$tota = $this->database_two->query("select sum(jml) as jumlah from fact_edu where thn=".$thn["thn"]."")->row_array();

		$data["thn"] = $thn;
		$data["male"] = $male;
		$data["fema"] = $fema;
		$tota["tota"] = $tota;

		$pendidikan =  $this->database_two->query("select edu, sum(male) as male, sum(fema) as fema, sum(tot) as tot
			from (select edu, 
					sum((case when sex=1 then jml end)) as male,
					sum((case when sex=2 then jml end)) as fema,
					sum(jml) as tot
				   from fact_edu 
				   where thn=".$thn["thn"]."
				   group by edu) as dt
				   group by edu")->result_array();

		$data["pendidikan"] = $pendidikan;

		$this->template->load("template_header","pendidikan",$data);
		$this->template->load("template_footer","pendidikan",$data);
	
	}

	public function pangkat(){

		$data = array();

		//tahun1
		$thn1 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 0,1")->row_array();
		$v_thn1 = $this->database_two->query("select sum(jml) as jml from fact_golru where thn=".$thn1["thn"]."")->row_array();
		
		//tahun2
		$thn2 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 1,1")->row_array();
		$v_thn2 = $this->database_two->query("select sum(jml) as jml from fact_golru where thn=".$thn2["thn"]."")->row_array();
	

		$data["thn1"] = $thn1["thn"];
		$data["v_thn1"] = $v_thn1["jml"];
		$data["thn2"] = $thn2["thn"];
		$data["v_thn2"] = $v_thn2["jml"];

		$thn_d_1 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 0,1")->row_array();
		$thn_d_2 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 1,1")->row_array();
		
		$data["thn_d_1"] = $thn_d_1["thn"];
		$data["thn_d_2"] = $thn_d_2["thn"];

		$pangkat = $this->database_two->query("select gol, name from dim_gol order by gol asc")->result_array();
		$data["pangkat"] = $pangkat; 
		$this->template->load("template_header","pangkat",$data);
		$this->template->load("template_footer","pangkat",$data);

	}

	public function jabatan_fungsional(){

		$data= array();

		$thn = $this->database_two->query("select distinct(thn) from fact_funk order by thn desc limit 0,1")->row_array();
		$male = $this->database_two->query("select sum(jml) as jumlah from fact_funk where sex=1 and thn=".$thn["thn"]."")->row_array();
		$fema = $this->database_two->query("select sum(jml) as jumlah from fact_funk where sex=2 and thn=".$thn["thn"]."")->row_array();
		$tota = $this->database_two->query("select sum(jml) as jumlah from fact_funk where thn=".$thn["thn"]."")->row_array();

		$data["thn"]= $thn["thn"];
		$data["male"]= $male["jumlah"];
		$data["fema"]= $fema["jumlah"];
		$data["tota"]= $tota["jumlah"];

		$jabatan_fungsional = $this->database_two->query("select funk, sum(male) as male, sum(fema) as fema, sum(tot) as tot
			from (select funk, 
					sum((case when sex=1 then jml end)) as male,
					sum((case when sex=2 then jml end)) as fema,
					sum(jml) as tot
				   from fact_funk 
				   where thn=".$thn["thn"]."
				   group by funk) as dt
				   group by funk")->result_array();

		$data["jabatan_fungsional"] = $jabatan_fungsional;

		$this->template->load("template_header","jabatan_fungsional",$data);
		$this->template->load("template_footer","jabatan_fungsional",$data);

	}

	public function struktural(){

		$data = array();

		$thn = $this->database_two->query("select distinct(thn) from fact_ese order by thn desc limit 0,1")->row_array();
		$male = $this->database_two->query("select sum(jml) as jumlah from fact_ese where sex=1 and thn=".$thn["thn"]."")->row_array();
		$fema = $this->database_two->query("select sum(jml) as jumlah from fact_ese where sex=2 and thn=".$thn["thn"]."")->row_array();
		$tota = $this->database_two->query("select sum(jml) as jumlah from fact_ese where thn=".$thn["thn"]."")->row_array();

		$data["thn"] = $thn["thn"];
		$data["male"] = $male["jumlah"];
		$data["fema"] = $fema["jumlah"];
		$data["tota"] = $tota["jumlah"];

		$data["struktural"] = $this->database_two->query("select eselon, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select eselon, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_ese 
					   where thn=".$thn["thn"]."
					   group by eselon) as dt
					   group by eselon ")->result_array();



		$this->template->load("template_header","struktural",$data);
		$this->template->load("template_footer","struktural",$data);

	}

	public function unit_kerja(){

		$data = array();

		$thn = $this->database_two->query("select distinct(thn) from fact_uker order by thn desc limit 0,1")->row_array();
		$male = $this->database_two->query("select sum(jml) as jumlah from fact_uker where sex=1 and thn=".$thn["thn"]."")->row_array();
		$fema =$this->database_two->query("select sum(jml) as jumlah from fact_uker where sex=2 and thn=".$thn["thn"]."")->row_array();
		$tota = $this->database_two->query("select sum(jml) as jumlah from fact_uker where thn=".$thn["thn"]."")->row_array();

		$data["thn"] = $thn["thn"];
		$data["male"] = $male["jumlah"];
		$data["fema"] = $fema["jumlah"];
		$data["tota"] = $tota["jumlah"];

		$unit_kerja = $this->database_two->query("select uker, sum(male) as male, sum(fema) as fema, sum(tot) as tot
				from (select uker, 
						sum((case when sex=1 then jml end)) as male,
						sum((case when sex=2 then jml end)) as fema,
						sum(jml) as tot
					   from fact_uker 
					   where thn=".$thn["thn"]."
					   group by uker) as dt
					   group by uker")->result_array();

		$data["unit_kerja"] = $unit_kerja;

		$this->template->load("template_header","unit_kerja",$data);
		$this->template->load("template_footer","unit_kerja",$data);

	}

	//get json statistik jenkel
	public function gen_json($tipe)
{

	if($tipe=="jenkel"){
		$search_thn = $this->Search_thn_jengkel();
		$search_minmak = $this->Search_minmaxval();
		$search_value= $this->Search_value_jengkel();
		$search_desc= $this->search_desc();
	}elseif($tipe=="kelompok_umur"){
		$search_thn = $this->Search_thn_jengkel();
		$search_minmak = $this->Search_minmaxval();
		$search_value= $this->Search_value_jengkel();
		$search_desc= $this->search_desc();
	}

	$str = '{"x_axis":{'.
			'	"offset": false,'.
			'	"labels":{'.
			'		"steps":1,'.
			'		"labels":[' . $search_thn . '] 
				}
			},'.
			
			'"y_axis": { ' . $search_minmak . ' }, '.
			
			'"bg_colour":"#ffffff",'.
			
			'"elements":['.
				'{'.
				'	"type":			"area",'.
				'	"colour":		"#49a0f9",'.
				'	"line-style":	{"style":"solid","on":4,"off":4},'.
				'	"dot-style":	{"type":"hollow-dot", "width":3, "size":2},'.
				'"values":[' . $search_value. '],'.
				'	"fill-alpha":0.5,'.
				'	"width":     1,'.
				'	"on-show":	{"type": "mid-slide", "cascade":1, "delay":0.5}'.
			'},
			{
				"type":"tags",
				"values":[ ' . $search_desc . ' ],
				"font":"Verdana","font-size":10,"colour":"#000000","align-x":"center","text":"#y#"
			}
		],'.
			'}';
	echo $str;

}



function Search_thn_jengkel() 
{

	$jum = $this->database_two->query("select count(distinct(thn)) as thn_sum from fact_psex")->row_array();
	$mulai = 0;
	if ($jum["thn_sum"] > 5) {$mulai = $jum["thn_sum"] - 5; $jum["thn_sum"]=5; }
	$SQL = " select thn, sum(jml) 
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5" ;
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $thn = "";
	foreach ($ret as $row) {
		if ($row['thn']<2000)	
				$tahun = 2000 + $row['thn'] ;
		else 	$tahun = $row['thn'] ;
			
		$thn = $thn . '"' . $tahun . '"' ;
		if ($i != $jum["thn_sum"]) { $thn = $thn . ',' ;}
		$i ++;
	}
	return $thn;
}

function Search_value_jengkel() 
{

	$jum = $this->database_two->query("select count(distinct(thn)) as jml_sum from fact_psex")->row_array();
	$mulai = 0;
	if ($jum["jml_sum"] > 5) {$mulai = $jum["jml_sum"] - 5; $jum["jml_sum"]=5; }
	$SQL = " select thn, sum(jml) as nilai
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5 " ;
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $nil = "";
	foreach ($ret as $row) {
		$nil = $nil . $row['nilai'];
		if ($i != $jum["jml_sum"]) { $nil = $nil . ',' ;}
		$i ++;
	}
	return $nil;
}

function Search_desc() 
{
	
	$jum = $this->database_two->query("select count(distinct(thn))  as jml_sum from fact_psex")->row_array();
	$mulai = 0;
	if ($jum["jml_sum"] > 5) {$mulai = $jum["jml_sum"] - 5; $jum["jml_sum"]=5; }
	$jum["jml_sum"] = $jum["jml_sum"] - 1;
	$SQL = " select thn, sum(jml) as nilai
			from fact_psex 
			group by thn
			order by thn asc
			limit $mulai,5 " ;
	$ret =  $this->database_two->query($SQL)->result_array();
	$i = 0; $desc = "";
	foreach($ret as $row) {
		$desc = $desc . '{"x":' . $i . ',"y":' . $row['nilai'] . '}' ;
		if ($i != $jum["jml_sum"]) { $desc = $desc . ',' ;}
		$i ++;
	}
	return $desc;
}

function Search_minmaxval() 
{

	$min1 =  $this->database_two->query("select sum(jml) as nilai from fact_psex group by thn order by nilai asc limit 1")->row_array();
	$min = $min1["nilai"]; 
	if ($min==''){$min=0;}
	else { $min = $min - 500;}
	
	$min = $min / 500 ;
	$min = floor($min) *500; 
	
	$max1 =  $this->database_two->query("select sum(jml) as nilai from fact_psex group by thn order by nilai desc limit 1")->row_array();
	$max = $max1["nilai"]; 
	if ($max==''){$max=0;}
	else { $max = $max + 500;}
	
	$minmax = '"min": ' . $min . ', "max": ' . $max . ',"steps": 500' ;
	
	return $minmax;
}


function CariNilai()
{
	
	$thn = $this->database_two->query("select distinct(thn) from fact_agesex order by thn desc limit 0,1")->row()->thn;
	$jum = $this->database_two->query("select count(distinct(age)) as age_jml from dim_age")->row()->age_jml;
	$tot = $this->database_two->query("select sum(jml) as fact_jml from fact_agesex where thn=".$thn."")->row()->fact_jml;
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select age, name from dim_age order by age asc ";
	$ret =  $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = "";
	foreach($ret as $row) {
		$age = $row['age'];
		
		$val = $this->database_two->query("select sum(jml) as jml_sum from fact_agesex where age='$age' and thn=$thn")->row()->jml_sum;

		$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	
	return $desc;
}



function gen_json_kelumur ()
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
			  "values" : [ ' . $this->CariNilai() . ' ],
			  "type" : "pie",
			  "border" : "2"
		}
	  ],
	  "bg_colour" : "#FFFFFF"
	}';
	echo $str;

}

function gen_json_pendum(){




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
      "values": ['. $this->gen_edu() . ']
    }
  ],

  "x_axis":{
    "max":9,
    "steps": 1,
    "labels": {
      "labels": [ ' . $this->education() . ']
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

function education()
{
	
	$jum = $this->database_two->query("select count(distinct(edu)) as jml from dim_edu")->row()->jml;
	
	$SQL = " select edu, name from dim_edu
			order by edu asc ";
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $educ = "";
	foreach($ret as $row) {
		
		$edu = $row['name'];
		
		$educ = $educ . '"' . $edu . '"' ;
		if ($i != $jum) { $educ = $educ . ',' ;}
		
		$i ++;
	}
	
	return $educ;
}

function gen_edu()
{
	
	$thn = $this->database_two->query("select distinct(thn) from fact_edu order by thn desc limit 0,1")->row()->thn;
	$jum = $this->database_two->query("select count(distinct(edu)) as edu from dim_edu")->row()->edu;
	
	$SQL = " select edu, name from dim_edu order by edu asc ";
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = "";
	foreach($ret as $row) {
		$edu = $row['edu'];
		
		$pria = $this->database_two->query("select sum(jml) as jml from fact_edu where edu='$edu' and sex=1 and thn=$thn")->row()->jml;
		$wanita = $this->database_two->query("select sum(jml) as jml from fact_edu where edu='$edu' and sex=2 and thn=$thn")->row()->jml;
		
		$rinc = '[{"val":'.$pria.',"colour":"#0044ff","tip": "pria: '.$pria.'"},' .
				'{"val":'.$wanita.',"colour":"#ff00ff","tip": "wanita: '.$wanita.'"}]';
		 
		$desc = $desc .  $rinc   ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}

	function json_pangkat(){


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
			  "text":      "' . $this->tahun2_pangkat() . '",
			  "font-size": 10,
			  "on-show":	{"type": "pop", "cascade":1, "delay":2},
			  "values" :   [' . $this->nilai2_pangkat() . ']
			},
			
			{
			  "type":      "bar_glass",
			  "alpha":     0.5,
			  "colour":    "#f11c44",
			  "text":       "' . $this->tahun1_pangkat() . '",
			  "font-size": 10,
			  "on-show":	{"type": "drop", "cascade":0.9},
			  "values" :   [' . $this->nilai1_pangkat() . ']
			}
			
		],

		"x_axis":{
			"stroke":2,
			"colour":"#909090",
			"grid_colour":"#00ff00",
			"labels":{
				"labels": [' . $this->pangkat_pangkat() . ']
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


function tahun1_pangkat()
{
	
	$thn1 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 0,1")->row()->thn;
	return $thn1;
}

function tahun2_pangkat()
{

	$thn2 = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 1,1")->row()->thn;
	return $thn2;
}

function pangkat_pangkat()
{

	$jum = $this->database_two->query("select count(distinct(pangkat)) as pangkat from dim_pangkat")->row()->pangkat;
	
	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $educ = "";
	foreach($ret as $row) {
		$pangkat = $row['name'];
		
		$educ = $educ . '"' . $pangkat . '"' ;
		if ($i != $jum) { $educ = $educ . ',' ;}
		
		$i ++;
	}
	
	return $educ;
}

function nilai1_pangkat()
{
	
	$thn = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 0,1")->row()->thn;
	$jum = $this->database_two->query("select count(distinct(pangkat)) as pangkat from dim_pangkat")->row()->pangkat;
	
	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";

	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = 0;
	
	foreach($ret as $row) {
		
		$pangkat = $row['pangkat'];
		
		$nilai = $this->database_two->query("select sum(jml) as jml from fact_golru where pangkat='$pangkat' and thn=$thn ")->row()->jml;
		
		$desc = $desc .  $nilai ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}


function nilai2_pangkat()
{

	$thn = $this->database_two->query("select distinct(thn) from fact_golru order by thn desc limit 1,1")->row()->thn;
	$jum = $this->database_two->query("select count(distinct(pangkat)) as jumlah from dim_pangkat")->row()->jumlah;
	

	$SQL = " select pangkat, name from dim_pangkat
			order by pangkat asc ";
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = "";
	foreach($ret as $row) {

		$pangkat = $row['pangkat'];
		
		$nilai = $this->database_two->query("select sum(jml) as jml from fact_golru where pangkat='$pangkat' and thn=$thn ")->row()->jml;
		
		$desc = $desc .  $nilai ;
		if ($i != $jum) { $desc = $desc . ',' ;}
		
		$i ++;
	}
	
	return $desc;
}


	function json_fungsional(){

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
				  "values" : [ ' . $this->CariNilai_fungsional() . ' ],
				  "type" : "pie",
				  "border" : "2"
			}
		  ],
		  "bg_colour" : "#FFFFFF"
		}';
		echo $str;

	}

	function CariNilai_fungsional(){

		$thn = $this->database_two->query("select distinct(thn) from fact_funk order by thn desc limit 0,1")->row()->thn;
	$jum = $this->database_two->query("select count(distinct(funk)) as jumlah from dim_funk")->row()->jumlah;
	$tot = $this->database_two->query("select sum(jml) as jml from fact_funk where thn=$thn")->row()->jml;
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select funk, name from dim_funk
			order by funk asc ";
	$ret = $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = "";
	foreach($ret as $row) {
		$funk = $row['funk'];
		
		$val = $this->database_two->query("select sum(jml) as jml from fact_funk where funk='$funk' and thn=$thn")->row()->jml;
		if ($val == '') { $val = 0;}
		
		$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	
	return $desc;

	}

	function json_struktural(){

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
			   "values" : [ ' . $this->CariNilai_struktural() . ' ],
			  "type" : "pie",
			  "border" : "2"
		}
	  ],
	  "bg_colour" : "#FFFFFF"
	}';
	echo $str;

	}

	function CariNilai_struktural(){

	$thn =  $this->database_two->query("select distinct(thn) from fact_ese order by thn desc limit 0,1")->row()->thn;
	if ($thn == '') {$thn = 0;}
	$jum =  $this->database_two->query("select count(distinct(eselon)) as eselon from dim_eselon")->row()->eselon;
	$tot = $this->database_two->query("select sum(jml) as jumlah from fact_ese where thn=$thn")->row()->jumlah;
	if ($tot == '') { $tot = 0;}
	
	$SQL = " select eselon, name from dim_eselon
			order by eselon asc ";
	$ret =  $this->database_two->query($SQL)->result_array();
	$i = 1; $desc = "";
	foreach($ret as $row) {
		
		$eselon = $row['eselon'];
		$val =  $this->database_two->query("select sum(jml) as jumlah from fact_ese where eselon='$eselon' and thn=$thn")->row()->jumlah;
		if ($val == '') { $val = 0;}
		
		$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['name'] . '","animate":[{"type":"bounce","distance":5}]}';
		if ($i != $jum) { $desc = $desc . ',' ;}
		$i ++;
	}
	
	return $desc;

	}

	function json_unitkerja(){

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
			  "values" : [ ' . $this->CariNilai_Unker() . ' ],
			  "type" : "pie",
			  "border" : "2"
		}
	  ],
	  "bg_colour" : "#FFFFFF"
	}';
	echo $str;

	}

	function CariNilai_Unker(){

		$thn = $this->database_two->query("select distinct(thn) from fact_uker order by thn desc limit 0,1")->row()->thn;
		$jum = $this->database_two->query("select count(distinct(uker)) as jumlah from dim_uker")->row()->jumlah;
		$tot = $this->database_two->query("select sum(jml) as jumlah from fact_uker where thn=$thn")->row()->jumlah;
		if ($tot == '') { $tot = 0;}
	
		$SQL = " select uker, nick from dim_uker
			order by uker asc ";
		$ret = $this->database_two->query($SQL)->result_array();
		$i = 1; $desc = "";
		foreach($ret as $row) {
			$uker = $row['uker'];
			
			$val = $this->database_two->query("select sum(jml) as jumlah from fact_uker where uker='$uker' and thn=$thn")->row()->jumlah;
			if ($val == '') { $val = 0;}
			
			$desc = $desc . '{"value" : ' . $val . ',"label" : "' . $row['nick'] . '","animate":[{"type":"bounce","distance":5}]}';
			if ($i != $jum) { $desc = $desc . ',' ;}
			$i ++;
		}
		
		return $desc;
	}


}