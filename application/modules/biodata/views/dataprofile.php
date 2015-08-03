

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Data Biodata</li>
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
        			<tr>
        				<td style="width:200px;">Nip</td>
        				<td>: <?php echo @$biodata_pegawai->nip;?></td>
        				</tr>
        			<tr>
        				<td>Nama</td>
        				<td>: <?php echo @$biodata_pegawai->namapeg;?></td>
        				</tr>
        				<tr>
        				<td>Tempat Tanggal Lahir</td>
        				<td>: <?php echo @$biodata_pegawai->ktlahir;?>  <?php echo @$biodata_pegawai->tlahir!=""?", ".date("d M Y",strtotime(@$biodata_pegawai->tlahir)):"";?></td>
        				</tr>
        				<tr>
        				<td>Agama</td>
        				<td>: <?php echo @$biodata_pegawai->nagama;?> </td>
        				</tr>

        				<tr>
        				<td>Pangkat Sekrang</td>
        				<td>: <?php echo @$biodata_pegawai->pangkat;?> <?php @$biodata_pegawai->ngolru!=""?"(".@$biodata_pegawai->ngolru.")":"";?>  </td>
        				</tr>


        				<tr>
        				<td>Pendidikan Terakhir</td>
        				<td>: <?php echo @$pendidikan_terakhir->ntpu;?> <?php echo @$pendidikan_terakhir->npdum;?></td>
        				</tr>
        				<tr>
        				<td>Jabatan Sekarang</td>
        				<td>: <?php echo @$biodata_pegawai->njab;?></td>
        				</tr>
        				<tr>
        				<td>Alamat</td>
        				<td>: <?php echo @$biodata_pegawai->aljalan;?></td>
        				</tr>
        				<tr>
        				<td>Unit Kerja</td>
        				<td>: <?php echo @$biodata_pegawai->nunker;?></td>
        				</tr>
        	</table>
        		
    




                	</div>
                </div>
            </div>
        </div>
 </div>