<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "600", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/gen_json_kelumur";?>"}
  );

});

</script>

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Distribusi PNS Menurut Kelompok Umur</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Distribusi PNS Menurut Kelompok Umur</h1>

<table class="table table-bordered">
<tbody><tr class="brheader_tabular" align="center">
	<td align="center" width="100px"><b>KEL.UMUR</b></td>
	<td align="center" width="80px"><b>PRIA</b></td>
	<td align="center" width="50px"><b>%</b></td>
	<td align="center" width="80px"><b>WANITA</b></td>
	<td align="center" width="50px"><b>%</b></td>
	<td align="center" width="80px"><b>JUMLAH</b></td>
	<td align="center" width="50px"><b>%</b></td>
</tr>
<tr class="brheader_tabular" align="center">
	<td align="center" width="50px"><b>(1)</b></td>
	<td align="center" width="80px"><b>(2)</b></td>
	<td align="center" width="50px"><b>(3)</b></td>
	<td align="center" width="80px"><b>(4)</b></td>
	<td align="center" width="50px"><b>(5)</b></td>
	<td align="center" width="80px"><b>(6)</b></td>
	<td align="center" width="50px"><b>(7)</b></td>
</tr>

<?php foreach($kelompok_umur as $kelompok_umur_row):
		//male
		if ($kelompok_umur_row['male'] == '') { $mal = 0; } 
		else { $mal = $kelompok_umur_row['male']; }
		if ($male["jml"] == 0 or $mal == 0) { $vmal = 0; }
		else {$vmal = ($mal/$male["jml"]) * 100 ; $vmal = number_format($vmal,2);}
		
		//female
		if ($kelompok_umur_row['fema'] == '') { $fem = 0; } 
		else { $fem = $kelompok_umur_row['fema']; }
		if ($fema["jml"] == 0 or $fem == 0) { $vfem = 0; }
		else {$vfem = ($fem/$fema["jml"]) * 100 ; $vfem = number_format($vfem,2);}
		
		//total
		if ($kelompok_umur_row['tot'] == '') { $tot = 0; } 
		else { $tot = $kelompok_umur_row['tot']; }
		if ($tota["jml"] == 0 or $tot == 0) { $vtot = 0; }
		else {$vtot = ($tot/$tota["jml"]) * 100 ; $vtot = number_format($vtot,2);}

		$dim_age = $this->database_two->query("select name from dim_age where age='" . $kelompok_umur_row['age'] . "'")->row_array();

 ?>
<tr class="brdata2">
<td align="center"> <?php echo $dim_age["name"];?> </td>
<td align="right"> <?php echo number_format($kelompok_umur_row['male']); ?></td>
<td align="right"> <?php echo $vmal;?></td>
<td align="right"> <?php echo number_format($kelompok_umur_row['fema']);?></td>
<td align="right"> <?php echo $vfem;?></td>
<td align="right"> <?php echo number_format($kelompok_umur_row['tot']);?></td>
<td align="right"> <?php echo  $vtot;?> </td>
</tr>
<?php 



endforeach; ?>

<tr class="brheader" align="center">
	<td align="center" width="50px"><b>Jumlah</b></td>
	<td align="right" width="80px"><b><?php echo number_format($male["jml"]); ?></b></td>
	<td align="right" width="50px"><b>100.00</b></td>
	<td align="right" width="80px"><b><?php echo number_format($fema["jml"]); ?></b></td>
	<td align="right" width="50px"><b>100.00</b></td>
	<td align="right" width="80px"><b><?php echo number_format($tota["jml"]); ?></b></td>
	<td align="right" width="50px"><b>100.00</b></td>
</tr>
</tbody></table>



<div id="my_chart"></div>

		</div>

				</div>


   	</div>
   </div>
</div>