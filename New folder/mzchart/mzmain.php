<?php
	$MZAllowPublic = true;
	require_once ("../MZLib/MZPublic.php");
	require_once ("../MZSetup/MZconstDB.php");
	require_once ("../MZLib/MZFungsi.php");
	require ("./mzsetting.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

<head>
<title><?php echo $fLib->PageTitle; ?></title>	
<link rel="stylesheet" type="text/css" href="../css/mz.css" /> 
<link rel="stylesheet" type="text/css" href="../jquery/themes/base/ui.all.css" />
<link rel="stylesheet" type="text/css" href="../css/superfish.css" media="screen">

<script type="text/javascript" src="../MZLib/MZScript.js"></script>

<script type="text/javascript" src="../jquery/jquery-1.4.js"></script>
<script type="text/javascript" src="../jquery/validate.min.js"></script>
<script type="text/javascript" src="../jquery/superfish.js"></script>
<script type="text/javascript" src="../jquery/supersubs.js"></script>
<script type="text/javascript" src="../jquery/ui/ui.datepicker.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 
<?php
	echo (jsgenMenu());
	echo (jsgenDefMzfrm());
	?>
}); 

swfobject.embedSWF(
  "../open-flash-chart.swf", "my_chart", "450", "300",
  "9.0.0", "expressInstall.swf",
  {"data-file":"dt-chart_jenkel.php"}
  );
  
</script>	
</head>

<body>
<div id="MZContainer" align="center">
	<div id="MZCore">

	<?php
		include "../mzheader.php";
		include "../mztopmenu.php";
	?>

	<div id="MZContent">
	<div id="my_chart"></div>	
	</div>

	<?php
		include "../mzfooter.php";
	?>

	</div>
</div>
</body>

</html>
