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

<script type="text/javascript">
$(document).ready(function(){ 
<?php
	echo (jsgenMenu());
	echo (jsgenDefMzfrm());
?>
}); 

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
	<div class="header">Distribusi PNS</div>

<table width="100%">
<tr><td width="40">&nbsp;</td>
<td class="field-caption">
	Penyebaran Pegawai Negeri Sipil relatif tidak merata diseluruh unit kerja, 
	hal ini dapat digambarkan seperti pada tabel-tabel berikut. Persentasi jumlah PNS ini 
	menggambarkan kekuatan dari personil untuk setiap unit kerja di lingkungan Kementerian Dalam Negeri.
</td>

<tr>
<td width="40">&nbsp;</td>
<td>
	<br />
	<h3>Pertumbuhan PNS Menurut Jenis Kelamin</h3>
	<?php include "./tab_jenkel.php";?>
	
	<br />
	<h3>Distribusi PNS Menurut Kelompok Umur</h3>
	<?php include "./tab_kelum.php";?>

	<br />
	<h3>Distribusi PNS Menurut Tingkat Pendidikan</h3>
	<?php include "./tab_pendum.php";?>

	<br />
	<h3>Distribusi PNS Menurut Golongan Kepangkatan</h3>
	<?php include "./tab_dist_pangkat.php";?>

	<br />
	<h3>Pertumbuhan PNS Menurut Golongan Kepangkatan</h3>
	<?php include "./tab_pangkat.php";?>

	<br />
	<h3>Distribusi PNS Menurut Jabatan Fungsional</h3>
	<?php include "./tab_fung.php";?>

	<br />
	<h3>7</h3>
	<?php include "./ctab7.php";?>

	<br />
	<h3>Distribusi PNS Menurut Unit Kerja</h3>
	<?php include "./tab_unker.php";?>

	<br />
	<h3>Distribusi PNS Menurut Kelompok Umur dan Golongan Kepangkatan</h3>
	<?php include "./tab_umurpang.php";?>

	<br />
	<h3>Distribusi PNS Menurut Kelompok Umur dan Pendidikan</h3>
	<?php include "./tab_umurpend.php";?>

	<br />
	<h3>Distribusi PNS Menurut Jabatan Struktural</h3>
	<?php include "./tab_struk.php";?>

	<br />
	<h3>12</h3>
	<?php include "./ctab12.php";?>

	<br />
	<h3>13</h3>
	<?php include "./ctab13.php";?>

	<br />
	<h3>14</h3>
	<?php include "./ctab14.php";?>

	<br />
	<h3>15</h3>
	<?php include "./ctab15.php";?>

</td>
<td width="40">&nbsp;</td>
</tr>
</table>
	
</div>

<?php
	include "../mzfooter.php";
?>

</div>
</div>
</body>

</html>
