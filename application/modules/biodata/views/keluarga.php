

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Keluarga</li>
    </ol>

</div>



<div id="page-content" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
<?php include "header.php"; ?>


<h3>Orang Tua</h3>



<table class="table table-bordered">
<tr class="dtlheader" align="center">
	<th align="center" width="30px">No</th>
	<th>Nama </th>
	<th>Tempat dan Tgl. Lahir</th>
	<th>Pekerjaan</th>
</tr>
   
<?php
	
	$idx_ortu = 1;
	foreach($res_ortu as $row_ortu) {
		
?>
	<tr>
		<td align='center'><?php echo $idx_ortu; ?> </td>
		<td><?php echo $row_ortu['nayah']; ?> </td>
		<td><?php echo $row_ortu['tlahir'] . ', ' . date("d M Y",strtotime($row_ortu['tgllahir'])); ?></td>
		<td><?php echo $row_ortu['nkerja']; ?></td>
	</tr>
<?php						
		$idx_ortu++;
	}	
?>
</table> 


<h3>Anak</h3>


<table class="table table-bordered">
    
	<tr class="dtlheader" align="center">
		<th align="center" width="30px">No</th>
		<th>Nama</th>
		<th>Tempat dan Tgl. Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Pekerjaan</th>
	</tr>
   
<?php
	$idx_anak = 1;
	foreach($res_anak as $row_anak) {
		
		if ($row_anak['kjkel']=="1")
			{$kelamin="LAKI-LAKI";}
		else
			{$kelamin="PEREMPUAN";}
?>					
		<tr>
			<td align='center'><?php echo $idx_anak; ?> </td>
			<td><?php echo $row_anak['nanak']; ?> </td>
			<td><?php echo $row_anak['tlahir'] . ', ' . 
						date("d M Y",strtotime($row_anak['tgllahir'])); ?>
			</td>
			<td><?php echo $kelamin; ?></td>
			<td><?php echo $row_anak['nkerja']; ?></td>
		</tr>

<?php						
			$idx_anak++;
		}	// end if
	//}
?>	


</table> 

<h3>Istri</h3>

<table class="table table-bordered">
    
	<tr class="dtlheader" align="center">
		<th align="center" width="30px">No</th>
		<th>Nama</th>
		<th>Tempat dan Tgl. Lahir</th>
		<th>Tgl. Nikah</th>
		<th>Pekerjaan</th>
	</tr>
   
<?php
	
	$idx_istri = 1;
	foreach($res_istri as $row_istri) {
?>					
		<tr>
			<td align='center'><?php echo $idx_istri; ?> </td>
			<td><?php echo $row_istri['nisua']; ?></td>
			<td><?php echo $row_istri['ktlahir']  . ', ' . date("d M Y",strtotime($row_istri['tlahir'])); ?></td>
			<td><?php echo date("d M Y",strtotime($row_istri['tkawin'])); ?></td>
			<td><?php echo $row_istri['nkerja']; ?></td>
		</tr>

<?php						
		$idx_istri++;
	}	// end if
?>	


</table> 

                	</div>
                </div>
            </div>
        </div>
 </div>