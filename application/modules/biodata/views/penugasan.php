

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Penugasan</li>
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
		<th colspan="4"><h4>RIWAYAT PENUGASAN DALAM DAN LUAR NEGERI</h4></th>
		
	</tr>
    
	<tr class="dtlheader" align="center">
		<th align="center" width="30px">No</th>
		<th>Negara Tujuan</th>
		<th>Tujuan Penugasan</th>
		<th>Masa Penugasan</th>
	</tr>
	<?php 

	$idx_tugas = 1;
	foreach($res_tugas as $row_tugas) {
	?>
		<tr>
			<td align="center"><?php echo $idx_tugas;?></td>
			<td><?php echo $row_tugas['nneg'];?></td>
			<td><?php echo $row_tugas['tujuan'];?></td>
			<td><?php echo date("d M Y",strtotime($row_tugas['tmulai'])).' / '. date("d M Y",strtotime($row_tugas['takhir']));?></td>
		</tr>
	<?php 
		$idx_tugas++;
	}

	?>
</table>

                	</div>
                </div>
            </div>
        </div>
 </div>