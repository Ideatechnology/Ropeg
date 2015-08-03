<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class=" icon-plus-sign"></i>Tambah Menu Publik</h3>
			</div>
                            
			<div class="box-content">
				<?php 
					echo form_open('bpublik/simpan',array('name'=>'inputForm', 'id'=>'inputForm','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));
				
					if (isset($pesan)) { 
						echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
					}
				?>
				<div class="control-group">
					<label class="control-label" for="textfield">Parrent Menu</label>
					<div class="controls">
						<input type="text" name="nama_parrent" id="nama_parrent" class="input-xxlarge" data-rule-required="true" readonly="true" onKeyUp="Cari_menu();" OnClick="Cari_menu();" value="<?php echo isset($field['nama_parrent'])?$field['nama_parrent']:''?>">
						<input type="hidden" name="parrent" id="parrent" class="input-xxlarge"  value="<?php echo isset($field['parrent'])?$field['parrent']:''?>">
						<input type="hidden" name="id" id="id" class="input-xxlarge"  value="<?php echo isset($field['id'])?$field['id']:''?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textfield">Nama Menu</label>
					<div class="controls">
						<input type="text" name="nama_menu" id="nama_menu" class="input-xxlarge" data-rule-required="true"  value="<?php echo isset($field['nama_menu'])?$field['nama_menu']:''?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textfield">Link</label>
					<div class="controls">
						<input type="text" name="link" id="link" class="input-xxlarge"  value="<?php echo isset($field['link'])?$field['link']:''?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textfield">File</label>
					<div class="controls">
						<input type="file" name="userfile" id="userfile"/>
						<input type="hidden" name="userfile2" id="userfile2">
						<input type="hidden" name="f_file" id="f_file" class="input-xxlarge"  value="<?php echo isset($field['file'])?$field['file']:''?>">
						<?php
						if(isset($field['file']) && $field['file']!=""){
						?>
						<br>
						<img src="<?php echo base_url()?>uploads/<?php echo $field['file']; ?>" alt="" width="260px" height="200px">
						<?php } ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textfield">Deskripsi</label>
					<div class="controls">
						<textarea name="description" id="description" class='ckeditor span12' rows="10"> <?php echo isset($field['description'])?$field['description']:''?></textarea>
					</div>
				</div>
                <hr>	
				<div class="form-actions">
					<button class="btn btn-primary" type="submit" onclick="cek();">Simpan</button>
					<a class="btn btn-danger"  href="<?php echo site_url('bpublik');?>">Kembali</a>
					
				</div>
				<?php echo form_close();?>
			</div>       
		</div>
	</div>
</div>

<div id="modal_jabatan" class="modal hide fade in" tabindex="-1" style="display:none;">
	<div class="modal-header">
		<div class="table-header">
			<button type="button" class="close" data-dismiss="modal" onClick="modal_keluar();">&times;</button>
			<h3 id="myModalLabel">Tabel</h3>
		</div>
	</div>

	<div class="modal-body">
		<div id="detail-table" class="row-fluid">
			
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal" onClick="modal_keluar();">Close</button>
	</div>
</div><!--PAGE CONTENT ENDS-->
<div id="lyar-mask" class="modal-backdrop" style="display:none;"></div>

<div id="loadings" class="modal-backdrop" style="background-color:#fff;display:none;">
	<div style="padding-top:15%;"><center><img src="<?php echo base_url()?>assets/img/loading.gif" width="100px"></center></div>
</div>
<script>
function cek(){
	var files = document.getElementById('userfile').files;
	if (!files.length) {
		$('#userfile2').val('')
    }else{
		$('#userfile2').val(files.length);
	}
	$('#inputForm').submit();
}
function Cari_menu(){
	$('#loadings').css('display','block');
	$('#detail-table').empty();
	$('.table-header').empty(); 
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	var url = '<?php echo site_url('bpublik/cari_menu')?>';
	document.getElementById('lyar-mask').style.display='block';
	$('.table-header').append('<button type="button" class="close" data-dismiss="modal" onClick="modal_keluar();">&times;</button><h3 id="myModalLabel">Data Menu Publik</h3>'); 
	$('#detail-table').html('').load(url);
	$('#modal_jabatan').slideDown('slow');
	document.getElementById('modal_jabatan').style.display='block';
	$('#loadings').css('display','none');
}

function modal_keluar()
{
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	$('.table-header').empty(); 
	$('#detail-table').empty();
}
</script>