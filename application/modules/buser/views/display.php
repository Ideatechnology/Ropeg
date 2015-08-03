&nbsp;<br>
<div class="row-fluid">
	<div class="span12">
		<span id="open_add" class="btn btn-success" onClick="Open_add();">
			<i class="icon-plus bigger-110"></i>
			Tambah Data
		</span>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class="icon-table"></i> Daftar Pengguna</h3>
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
</div><!--PAGE CONTENT ENDS-->
<div id="lyar-mask" class="modal-backdrop" style="display:none;"></div>

<div id="loadings" class="modal-backdrop" style="background-color:#fff;display:none;">
	<div style="padding-top:15%;"><center><img src="<?php echo base_url()?>assets/img/loading.gif" width="100px"></center></div>
</div>
<script>
function User_list()
{
	$.ajax({
		url     : '<?php echo site_url('buser/pagging/0/10/cr');?>',
		dataType: 'html',
		success : function(data){
			$('#list-data').html(data);
		}
	});
}

function Delete(a)
{
	bootbox.confirm("Yakin data akan menghapus data ini?", function(result) {
		if(result) {
			$.getJSON('<?php echo site_url('buser/user_delete')?>'+'/'+a,
				function(respon) {
					bootbox.dialog(respon.msg, [{
						"label" : "OK",
						"class" : "btn-small btn-success",
						"callback": function() {
							User_list();
						}
						}]
					);
				}
			);
		}
	});
}

function Open_add()
{
	$('#loadings').css('display','block');
	$('#detail-table').empty();
	$('.table-header').empty(); 
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	var url = '<?php echo site_url('buser/user_edit')?>';
	document.getElementById('lyar-mask').style.display='block';
	$('.table-header').append('<button type="button" class="close" data-dismiss="modal" onClick="modal_keluar();">&times;</button><h3 id="myModalLabel">Form Isian</h3>'); 
	$('#detail-table').html('').load(url);
	$('#modal_jabatan').slideDown('slow');
	document.getElementById('modal_jabatan').style.display='block';
	$('#loadings').css('display','none');
}

function Edit(a)
{
	$('#loadings').css('display','block');
	$('#detail-table').empty();
	$('.table-header').empty(); 
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	var url = '<?php echo site_url('buser/user_edit')?>'+'/'+a;
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