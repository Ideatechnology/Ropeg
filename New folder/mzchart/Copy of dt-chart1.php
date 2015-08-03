<?php


gen_json ('Jumlah PNS Periode 2005-2012');

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
			'		"labels":["2005","2006","2007","2008","2009","2010","2011"]
				}
			},'.
			
			'"y_axis": { "min": 4600, "max": 5000, "steps": 200 }, '.
			
			'"bg_colour":"#ffffff",'.
			
			'"elements":['.
				'{'.
				'	"type":			"area",'.
				'	"colour":		"#49a0f9",'.
				'	"line-style":	{"style":"solid","on":4,"off":4},'.
				'	"dot-style":	{"type":"hollow-dot", "width":3, "size":2},'.
				'"values":[4953,4821,4750,4745,4942,4878,4884],'.
				'	"fill-alpha":0.5,'.
				'	"width":     1,'.
				'	"on-show":	{"type": "mid-slide", "cascade":1, "delay":0.5}'.
			'}],'.
			'}';
	echo $str;

}
?>