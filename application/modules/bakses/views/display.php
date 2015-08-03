<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class="icon-table"></i> Daftar Hak Akses</h3>
			</div>
			<div class="box-content nopadding">
				<div id="list-data">
					<?php include "list.php"; ?>
				</div>
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
		<button type="button" class="btn btn-info" onClick="cek_all();">Cek All</button>
		<button type="button" class="btn btn-success" onClick="save_form();">Simpan</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal" onClick="modal_keluar();">Close</button>
	</div>
</div><!--PAGE CONTENT ENDS-->
<div id="lyar-mask" class="modal-backdrop" style="display:none;"></div>

<div id="loadings" class="modal-backdrop" style="background-color:#fff;display:none;">
	<div style="padding-top:15%;"><center><img src="<?php echo base_url()?>assets/img/loading.gif" width="100px"></center></div>
</div>
<script>
function User_list()
{
	$.ajax({
		url     : '<?php echo site_url('bakses/pagging/0/10/cr');?>',
		dataType: 'html',
		success : function(data){
			$('#list-data').html(data);
		}
	});
}

function Edit(a)
{
	$('#loadings').css('display','block');
	$('#detail-table').empty();
	$('.table-header').empty(); 
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	var url = '<?php echo site_url('bakses/user_edit')?>'+'/'+a;
	document.getElementById('lyar-mask').style.display='block';
	$('.table-header').append('<button type="button" class="close" data-dismiss="modal" onClick="modal_keluar();">&times;</button><h3 id="myModalLabel">Form Isian</h3>'); 
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