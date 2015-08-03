<script type="text/javascript" src="<?php echo base_url();?>assets_frontend/swfobject.js"></script>

<script type="text/javascript">
$(document).ready(function(){ 


swfobject.embedSWF(
  "<?php echo base_url();?>assets_frontend/open-flash-chart.swf", "my_chart", "600", "400",
  "9.0.0", "<?php echo base_url();?>assets_frontend/expressInstall.swf",
  {"data-file":"<?php echo site_url()."statistik/gen_json/jenkel";?>"}
  );

});

</script>

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Statistik Pertumbuhan Per Jenis Kelamin</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">


         <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main">

<h1>Pertumbuhan per Jenis Kelamin</h1>

						<table class="table table-bordered">
	<thead>
	<tr align="center">
		<th style="text-align:center"><strong>TAHUN</strong></th>
		<th style="text-align:center"><strong>PRIA</strong></th>
		<th style="text-align:center"><strong>% PERTUMBUHAN</strong></th>
		<th style="text-align:center"><strong>WANITA</strong></th>
		<th style="text-align:center"><strong>% PERTUMBUHAN</strong></th>
		<th style="text-align:center"><strong>JUMLAH</strong></th>
		<th style="text-align:center"><strong>% PERTUMBUHAN</strong></th>
	</tr>
	</thead>
	<tbody>
	<tr class="brheader_tabular" align="center">
		<td align="center"><b>(1)</b></td>
		<td align="center"><b>(2)</b></td>
		<td align="center"><b>(3)</b></td>
		<td align="center"><b>(4)</b></td>
		<td align="center"><b>(5)</b></td>
		<td align="center"><b>(6)</b></td>
		<td align="center"><b>(7)</b></td>
	</tr>
	
<?php foreach($query_jenkel as $query_jenkel_row): 


		//cari nilai sebelumnya
			if ($query_jenkel_row['thn'] == 0) {$year = 0;}
			else {$year = $query_jenkel_row['thn'] - 1;}
			
			$prevpria = $this->database_two->query("select sum(jml) as jml1 from fact_psex where sex=1 and thn=".$year."")->row()->jml1;
			if ($prevpria == '') { $prevpria = 0; }
			$prevwanita = $this->database_two->query("select sum(jml) as jml1 from fact_psex where sex=2 and thn=".$year."")->row()->jml1;
			if ($prevwanita == '') { $prevwanita = 0; }
			$prevtot = $this->database_two->query("select sum(jml) as jml1 from fact_psex where thn=".$year."")->row()->jml1;
			if ($prevtot == '') { $prevtot = 0; }
			
			//sekarang
			$pria = $query_jenkel_row['male'];
			if ($pria == '') { $pria = 0; }
			$wanita = $query_jenkel_row['fema'];
			if ($wanita == '') { $wanita = 0; }
			$tot = $query_jenkel_row['tot'];
			if ($tot == '') { $tot = 0; }
			
			//mencari nilai pertumbuhan
			if ($prevpria > 0) {
				$spria = (($pria-$prevpria)/$prevpria) * 100; 
				$spria = number_format($spria,2);
			}
			if ($prevwanita > 0) {
				$swanita = (($wanita-$prevwanita)/$prevwanita) * 100; 
				$swanita = number_format($swanita,2);
			}
			if ($prevtot > 0) {
				$stot = (($tot-$prevtot)/$prevtot) * 100; 
				$stot = number_format($stot,2);
			}

?>
	<tr class="brdata">
	<td align="center"><?php echo @$query_jenkel_row["thn"];?></td>
	<td align="right"><?php echo number_format(@$pria);?> </td>
	<td align="right"><?php echo @$spria;?> </td>
	<td align="right"><?php echo number_format(@$wanita);?> </td>
	<td align="right"><?php echo @$swanita;?> </td>
	<td align="right"><?php echo number_format(@$tot);?></td>
	<td align="right"><?php echo @$stot;?></td>
	</tr>
<?php endforeach; ?>
	
	</tbody>
	</table>

<div id="my_chart"></div>


				</div>

				</div>


   	</div>
   </div>
</div>
