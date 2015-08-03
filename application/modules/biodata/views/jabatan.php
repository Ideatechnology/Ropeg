

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
		<th>Jabatan</th>
		<th >Eselon</th>
		<th >TMT. Jabatan</th>
	</tr>
   
<?php
		$idx_jabatan = 1;
	foreach($sqlJabatan as $row_jabatan) {
		//$eselon  = $fLib->getValue ("Select neselon from ref_eselon where keselon='" . $row_jabatan['keselon'] . "'");
?>					
	<tr>
		<td align='center'><?php echo $idx_jabatan; ?> </td>
		<td><?php echo $row_jabatan['njab']; ?></td>
		<td><?php echo $row_jabatan["neselon"];?></td>
		<td align="center"><?php echo $row_jabatan['tmtjabat']; ?></td>
	</tr>

<?php						
		$idx_jabatan++;
	}	// end if
?>	

</table> 
                	</div>
                </div>
            </div>
        </div>
 </div>