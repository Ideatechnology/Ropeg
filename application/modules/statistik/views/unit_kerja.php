<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "900", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/json_unitkerja";?>"}
  );

});

</script>

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Distribusi PNS Menurut Unit Kerja</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Distribusi PNS Menurut Unit Kerja</h1>

<table class="table table-bordered">
	<tbody>
	<tr class="brheader" align="center">
		<td align="center" width="350px"><b>UNIT KERJA</b></td>
		<td align="center" width="80px"><b>PRIA</b></td>
		<td align="center" width="50px"><b>%</b></td>
		<td align="center" width="80px"><b>WANITA</b></td>
		<td align="center" width="50px"><b>%</b></td>
		<td align="center" width="80px"><b>JUMLAH</b></td>
		<td align="center" width="50px"><b>%</b></td>
	</tr>
	
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="50px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="50px"><b>(5)</b></td>
		<td align="center" width="80px"><b>(6)</b></td>
		<td align="center" width="50px"><b>(7)</b></td>
	</tr>

	<?php foreach($unit_kerja as $unit_kerja_row): 

	//male
			if ($unit_kerja_row['male'] == '') { $mal = 0; } 
			else { $mal = $unit_kerja_row['male']; }
			if ($male == 0 or $mal == 0) { $vmal = 0; }
			else {$vmal = ($mal/$male) * 100 ; $vmal = number_format($vmal,2);}
			
			//female
			if ($unit_kerja_row['fema'] == '') { $fem = 0; } 
			else { $fem = $unit_kerja_row['fema']; }
			if ($fema == 0 or $fem == 0) { $vfem = 0; }
			else {$vfem = ($fem/$fema) * 100 ; $vfem = number_format($vfem,2);}
			
			//total
			if ($unit_kerja_row['tot'] == '') { $tot = 0; } 
			else { $tot = $unit_kerja_row['tot']; }
			if ($tota == 0 or $tot == 0) { $vtot = 0; }
			else {$vtot = ($tot/$tota) * 100 ; $vtot = number_format($vtot,2);}
			
			$dim_uker = $this->database_two->query("select name from dim_uker where uker='" . $unit_kerja_row['uker'] . "'")->row_array();

	?>
	<tr class="brdata2">
		<td > <?php echo $dim_uker["name"];?> </td>
		<td align="right"> <?php echo number_format($mal);?> </td>
		<td align="right"> <?php echo $vmal;?></td>
		<td align="right"> <?php echo number_format($fem);?> </td>
		<td align="right"> <?php echo $vfem;?> </td>
		<td align="right"> <?php echo number_format($tot) ;?> </td>
		<td align="right"> <?php echo $vtot;?> </td>
	</tr>
	<?php endforeach; ?>

	<tr class="brheader" align="center">
		<td align="center"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($male); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($fema); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($tota); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
	</tr>
</tbody></table>
<div id="my_chart"></div>

		</div>

				</div>


   	</div>
   </div>
</div>