

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Pendidikan</li>
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
		<th>Tingkat Pendidikan</th>
		<th>Pendidikan / Fakultas / Jurusan</th>
		<th>Nama Sekolah / PT / Univ.</th>
		<th>Tahun Lulus</th>
	</tr>
   
<?php
	// SQL Detail		
	$idx_formaledu = 1;
	foreach($res_formaledu as $rowUmum) {

		
?>					
	<tr>
		
		<td align='center'><?php echo $idx_formaledu; ?> </td>
		<td><?php echo $rowUmum['ntpu']; ?></td>
		<td><?php echo $rowUmum['njur']; ?></td>
		<td><?php echo $rowUmum['nsek']; ?></td>
		<td align="center"><?php echo $rowUmum['thn']; ?></td>
	</tr>

<?php						
		$idx_formaledu++;
	}	// end if
?>	


</table> 

                	</div>
                </div>
            </div>
        </div>
 </div>