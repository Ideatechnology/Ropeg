<div id="tabel_data_wrapper" class="dataTables_wrapper form-inline" role="grid">
	<div class="row-fluid">
		<div class="span6">
			<div id="tabel_data_length" class="dataTables_length">
				<label>
					Display
					<?php
						$list_display['10']='10';
						$list_display['25']='25';
						$list_display['50']='50';
						$list_display['100']='100';
						
						$url_pag = "'".site_url('buser/pagging/0')."'";
						$domId ="'#list-data'";
						$selected = '10';
						if(isset($data_display) && trim($data_display) != '')
						$selected = $data_display;
						$js = 'id="data_display" class="input-mini" onChange="load_url('.$url_pag.','.$domId.');" size="1" aria-controls="tabel_data"';							
						echo form_dropdown('tabel_data_length',$list_display,$selected,$js);	
					?>
					records
				</label>
			</div>
		</div>
		<div class="span6">
			<div id="sample_1_filter" class="dataTables_filter">
				<label>
				Search:
					<input class="input-medium" type="text" id="cari_display" onBlur="load_url(<?php echo $url_pag?>,<?php echo $domId?>);" value="<?php echo isset($cari_display)?$cari_display:''?>" aria-controls="tabel_data">
				</label>
			</div>
		</div>
	</div>
	
	<table class="table table-striped table-bordered" id="tabel_data">
		<thead>
			<tr>
				<th style="width:8px;">No.</th>
				<th>Nama Pengguna</th>
				<th>Nama Lengkap</th>
				<th>Email Pengguna</th>
				<th>Telepon</th>
				<th>Departemen</th>
				<th>Role</th>
				<th style="width:80px;"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$jm=0;
			if($jum_data > 0){
				$co=1;
				foreach($result as $row){
					$jm=$co;
			?>
					<tr class="odd gradeX">
						<td><?php echo ($co+$offset)?>.</td>
						<td><?php echo $row->nama_pengguna?></td>
						<td><?php echo $row->nama_lengkap?></td>
						<td><?php echo $row->email_pengguna?></td>
						<td><?php echo $row->telp_pengguna?></td>
						<td><?php echo $row->id_cabang?></td>
						<td><?php echo $row->rolename?></td>
						<td>
							<span onClick="Edit('<?php echo $row->nama_pengguna?>');" class="btn btn-success btn-small" alt="Ubah">
								<i class="icon-pencil"></i>							</span>
							<span onClick="Delete('<?php echo $row->nama_pengguna?>');" class="btn btn-danger btn-small" alt="Hapus">
								<i class="icon-trash"></i>							</span>						</td>
					</tr>
			<?php 
					$co++;
				}
			}else{
			?>
				<tr class="odd gradeX">
					<td colspan="8"><center>Data Empty</center></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
<div class="row-fluid">
		<div class="span6">
			<div id="tabel_data_info" class="dataTables_info">Showing <?php echo (($jum_data>0)?($offset+1):0)?> to <?php echo (($offset+$jm))?> of <?php echo $jum_data?> entries</div>
		</div>
		<div id="pag_suhe" class="span6">
			<div class="dataTables_paginate paging_bootstrap pagination">
				<?php echo $paging;?>
			</div>
		</div>
	</div>
	
	
</div>
									

<script>
$(function(){
   convert_paging("#list-data");
   
   $("#cari_display").keypress(function(e){
		var key = null;
        key = (e.keyCode ? e.keyCode : e.which);
		if(key==13){
			load_url('<?php echo site_url('buser/pagging/0')?>',"#list-data");
		}
	});
});

function convert_paging(domId)
{
   $("#pag_suhe").find("a").each(function(i){
      var thisHref = $(this).attr("href");
      $(this).prop('href','javascript:void(0)');
      $(this).prop('rel',thisHref);
      $(this).bind('click', function(){
         load_url(thisHref,domId);
         return false;
      });
   });
}
function load_url(theurl,div)
{
	var par4 = $('#data_display').val();
	
	if ($('#cari_display').val() != '') 
		par6 = $('#cari_display').val();
	else
		par6 = 'cr';

   $.ajax({
       url: theurl+'/'+par4+'/'+par6,
       success: function(response){
		$(div).html(response);
       },
   dataType:"html"
   });
   return false;
}
</script>