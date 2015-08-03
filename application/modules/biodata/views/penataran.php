

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Penataran</li>
    </ol>

</div>



<div id="page-content" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
<?php include "header.php"; ?>



<table class="table table-bordered">
    <tr class="dtlheader" align="center">
		<th colspan="5"><h4>RIWAYAT PENATARAN</h4></th>
	</tr>
	<tr class="dtlheader" align="center">
		<th align="center" width="30px">No</th>
		<th>Nama Penataran</th>
		<th>Tahun</th>
		<th>Tempat</th>
		<th>Panitia Penyenggara</th>		
	</tr>
   <?php 
	
	$idx_penataran = 1;
	foreach($res_penataran as $row_penataran) {
	?>				
		<tr>
			<td align="center"><?php echo $idx_penataran;?> </td>
			<td><?php echo $row_penataran['ntatar'];?></td>
			<td><?php echo $row_penataran['thn'];?></td>
			<td><?php echo $row_penataran['tempat'];?></td>
			<td><?php echo $row_penataran['pan'];?></td>
						
		</tr>';
<?php 
		$idx_penataran++;
	}
?>
</table> 


	</div>
                </div>
            </div>
        </div>
 </div>