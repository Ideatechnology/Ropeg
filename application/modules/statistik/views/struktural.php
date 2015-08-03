<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "900", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/json_struktural";?>"}
  );

});

</script>

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Distribusi PNS Menurut Jabatan Struktural</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Distribusi PNS Menurut Jabatan Struktural</h1>

<table class="table table-bordered">
	<tbody><tr class="brheader" align="center">
		<td align="center" width="100px"><b>JABATAN PNS</b></td>
		<td align="center" width="80px"><b>PRIA</b></td>
		<td align="center" width="50px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b>WANITA</b></td>
		<td align="center" width="50px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b>JUMLAH</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="50px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="50px"><b>(5)</b></td>
		<td align="center" width="80px"><b>(6)</b></td>
	</tr>
	
	<?php foreach($struktural as $struktural_row): 

		//male
			if ($struktural_row['male'] == '') { $mal = 0; } 
			else { $mal = $struktural_row['male']; }
			if ($male == 0 or $mal == 0) { $vmal = 0; }
			else {$vmal = ($mal/$male) * 100 ; $vmal = number_format($vmal,2);}
			
			//female
			if ($struktural_row['fema'] == '') { $fem = 0; } 
			else { $fem = $struktural_row['fema']; }
			if ($fema == 0 or $fem == 0) { $vfem = 0; }
			else {$vfem = ($fem/$fema) * 100 ; $vfem = number_format($vfem,2);}
			
			//total
			if ($struktural_row['tot'] == '') { $tot = 0; } 
			else { $tot = $struktural_row['tot']; }
			if ($tota == 0 or $tot == 0) { $vtot = 0; }
			else {$vtot = ($tot/$tota) * 100 ; $vtot = number_format($vtot,2);}

			$dim_eselon = $this->database_two->query("select name from dim_eselon where eselon='" . $struktural_row['eselon'] . "'")->row_array();

	?>

	<tr>
		<td align="center"> <?php echo $dim_eselon["name"];?></td>
		<td align="right"> <?php echo number_format($struktural_row['male']);?> </td>
		<td align="right"> <?php echo $vmal;?></td>
		<td align="right"> <?php echo number_format($struktural_row['fema']);?> </td>
		<td align="right"> <?php echo $vfem;?> </td>
		<td align="right"> <?php echo number_format($struktural_row['tot']);?> </td>
	</tr>

	<?php endforeach; ?>

	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($male); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($fema); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($tota); ?></b></td>
	</tr>
</tbody></table>

<div id="my_chart"></div>

		</div>

				</div>


   	</div>
   </div>
</div>