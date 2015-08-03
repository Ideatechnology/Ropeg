<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "900", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/json_pangkat";?>"}
  );

});

</script>
<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Distribusi PNS menurut Tingkat Pendidikan</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Distribusi PNS menurut Tingkat Pendidikan</h1>

<table class="table table-bordered">
<tbody><tr class="brheader_tabular" align="center">
	<td align="center" width="130"><b>PENDIDIKAN</b></td>
	<td align="center"><b>PRIA</b></td>
	<td align="center"><b>%</b></td>
	<td align="center"><b>WANITA</b></td>
	<td align="center"><b>%</b></td>
	<td align="center"><b>JUMLAH</b></td>
	<td align="center"><b>%</b></td>
</tr>
<tr class="brheader_tabular" align="center">
	<td align="center"><b>(1)</b></td>
	<td align="center"><b>(2)</b></td>
	<td align="center"><b>(3)</b></td>
	<td align="center"><b>(4)</b></td>
	<td align="center"><b>(5)</b></td>
	<td align="center"><b>(6)</b></td>
	<td align="center"><b>(7)</b></td>
</tr>

<?php foreach($pendidikan as $pendidikan_row): 

	//male
		if ($pendidikan_row['male'] == '') { $mal = 0; } 
		else { $mal = $pendidikan_row['male']; }
		if ($male["jumlah"] == 0 or $mal == 0) { $vmal = 0; }
		else {$vmal = ($mal/$male["jumlah"]) * 100 ; $vmal = number_format($vmal,2);}
		
		//female
		if ($pendidikan_row['fema'] == '') { $fem = 0; } 
		else { $fem = $pendidikan_row['fema']; }
		if ($fema["jumlah"] == 0 or $fem == 0) { $vfem = 0; }
		else {$vfem = ($fem/$fema["jumlah"]) * 100 ; $vfem = number_format($vfem,2);}
		
		//total
		if ($pendidikan_row['tot'] == '') { $tot = 0; } 
		else { $tot = $pendidikan_row['tot']; }
		if (@$tota["jumlah"] == 0 or $tot == 0) { $vtot = 0; }
		else {$vtot = ($tot/$tota["jumlah"]) * 100 ; $vtot = number_format($vtot,2);}

		$dim_edu = $this->database_two->query("select name from dim_edu where 
			edu='" . $pendidikan_row['edu'] . "'")->row_array(); 		

?>
<tr class="brdata2">
	<td align="center"> <?php echo $dim_edu["name"];?> </td>
	<td align="right"> <?php echo number_format($pendidikan_row['male']);?></td>
	<td align="right"> <?php echo $vmal;?></td>
	<td align="right"> <?php echo number_format($pendidikan_row['fema']);?> </td>
	<td align="right"> <?php echo $vfem;?> </td>
	<td align="right"> <?php echo number_format($pendidikan_row['tot']);?> </td>
	<td align="right"> <?php echo $vtot ;?> </td>
</tr>
<?php endforeach; ?>

<tr class="brheader" align="center">
	<td align="center"><b>Jumlah</b></td>
	<td align="right"><b><?php echo number_format($male["jumlah"]); ?></b></td>
	<td align="right"><b>100.00</b></td>
	<td align="right"><b><?php echo number_format($fema["jumlah"]); ?></b></td>
	<td align="right"><b>100.00</b></td>
	<td align="right"><b><?php echo number_format(@$tota["jumlah"]); ?></b></td>
	<td align="right"><b>100.00</b></td>
</tr>
</tbody></table>

<div id="my_chart"></div>

		</div>

				</div>


   	</div>
   </div>
</div>