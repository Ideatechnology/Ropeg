<?php
require_once('OFC/OFC_Chart.php');

$title = new OFC_Elements_Title( date("D M d Y") );

$bar = new OFC_Charts_Bar_Glass();
$bar->set_values( array(10,8,6,8,10,0,6,1,1,6,0,1,3,5,7,0,4,5,4,3) );

$chart = new OFC_Chart();
$chart->set_title( $title );
$chart->add_element( $bar );

echo $chart->toString();
?>