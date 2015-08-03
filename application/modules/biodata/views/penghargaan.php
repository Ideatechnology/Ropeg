

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Penghargaan</li>
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
		<th colspan="4"><h4>RIWAYAT PENGHARGAAN / TANDA JASA</h4></th>
		
	</tr>
    
	<tr class="dtlheader" align="center">
		<th align="center" width="30px">No</th>
		<th>Penghargaan / Tanda Jasa</th>
		<th>Tahun</th>
		<th>Asal Perolehan</th>		
	</tr>
   
<?php 
	$idx_penghargaan = 1;
	foreach($res_penghargaan as $row_penghargaan) {
	?>	
		<tr>
			<td align="center"><?php echo $idx_penghargaan;?></td>
			<td><?php echo $row_penghargaan['nbintang'];?></td>
			<td><?php echo $row_penghargaan['tholeh'];?></td>
			<td><?php echo $row_penghargaan['aoleh'];?></td>
		</tr>
<?php
		$idx_penghargaan++;
	}
?> </table> 

                	</div>
                </div>
            </div>
        </div>
 </div>