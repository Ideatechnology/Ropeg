<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "1150", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/json_pangkat";?>"}
  );

});

</script>

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Distribusi PNS menurut Gol Kepangkatan</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Distribusi PNS menurut Gol Kepangkatan</h1>
<table class="table table-bordered">
	<tr class="brheader" align="center">
		<td align="center" width="100px" rowspan="2"><b>GOLONGAN <br /> KEPANGKATAN</b></td>
		<td align="center" width="320px" colspan="4"><b>TAHUN/PERSEN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="80px"><b><?php echo $thn_d_2 ; ?></b></td>
		<td align="center" width="80px"><b>PERSEN</b></td>
		<td align="center" width="80px"><b><?php echo $thn_d_1 ; ?></b></td>
		<td align="center" width="80px"><b>PERSEN</b></td>
	</tr>
	<tr class="brheader" align="center">
		<td align="center" width="100px"><b>(1)</b></td>
		<td align="center" width="80px"><b>(2)</b></td>
		<td align="center" width="80px"><b>(3)</b></td>
		<td align="center" width="80px"><b>(4)</b></td>
		<td align="center" width="80px"><b>(5)</b></td>
	</tr>
	<?php foreach($pangkat as $pangkat_row):
	$gol = $pangkat_row['gol'];
			
	//tahun1
	$nilai1 = $this->database_two->query("select sum(jml) as jml from fact_golru where gol='".$gol."' and thn=".$thn1."")->row_array();

	if ($nilai1["jml"] == '') { $nilai1 = 0; } 
	if ($nilai1["jml"] == 0 or $v_thn1 == 0) { $v_nila1 = 0; }
	else {$v_nila1 = ($nilai1["jml"]/$v_thn1) * 100 ; $v_nila1 = number_format($v_nila1,2);} 
			
	//tahun2
	$nilai2 = $this->database_two->query("select sum(jml) as jml from fact_golru where gol='".$gol."' and thn=".$thn2."")->row_array();
	if ($nilai2["jml"] == '') { $nilai2 = 0; } 
	if ($nilai2["jml"] == 0 or $v_thn2 == 0) { $v_nila2 = 0; }
	else {$v_nila2 = ($nilai2["jml"]/$v_thn2) * 100 ; $v_nila2 = number_format($v_nila2,2);} 
	

	$dim_gol = $this->database_two->query("select name from dim_gol where gol='" . $gol . "'")->row_array();

	?>
	<tr class="brdata2">
		<td align="center"> <?php echo $dim_gol["name"];?> </td>
		<td align="right"> <?php echo number_format($nilai2["jml"]);?> </td>
		<td align="right"> <?php echo $v_nila1 ;?></td>
		<td align="right"> <?php echo number_format($nilai1["jml"]);?></td>
		<td align="right"> <?php echo $v_nila2;?> </td>
	</tr>
<?php endforeach; ?>
	<tr class="brheader" align="center">
		<td align="center" width="50px"><b>Jumlah</b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn2); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
		<td align="right" width="80px"><b><?php echo number_format($v_thn1); ?></b></td>
		<td align="right" width="50px"><b>100.00</b></td>
	</tr>
</tbody></table>

<div di="my_chart"></div>


<div id="my_chart"></div>

		</div>

				</div>


   	</div>
   </div>
</div>