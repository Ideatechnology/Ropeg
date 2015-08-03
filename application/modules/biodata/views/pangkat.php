

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Pangkat</li>
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
		<th align="center" width="30px">No</th>
		<th>Pangkat / Gol. Ruang</th>
		<th>No. SK</th>
		<th>Tgl. SK</th>
		<th>TMT Pangkat</th>
	</tr>
   
<?php
	
	

	$idx_pangkat = 1;
	//echo $sqlPangkat;
	foreach($res_pangkat as $row_pangkat) {
?>					
	<tr>
		<td align='center'><?php echo $idx_pangkat; ?> </td>
		<td><?php echo $row_pangkat['pangkat'] . ' (' . $row_pangkat['ngolru'] . ')'; ?></td>
		<td><?php echo $row_pangkat['nskpang']; ?></td>
		<td align="center"><?php echo $row_pangkat['tskpang']; ?></td>
		<td align="center"><?php echo $row_pangkat['tmtpang']; ?></td>
	</tr>

<?php						
		$idx_pangkat++;
	}	// end if
?>	


</table> 

                	</div>
                </div>
            </div>
        </div>
 </div>