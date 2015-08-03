<?php echo form_open($this->uri->uri_string(),array('name'=>'inputForm', 'id'=>'inputForm', 'class'=>'form-horizontal'));?>
	<div class="row-fluid">
		<div class="span12">
			<div class="box box-color box-bordered">
				<div class="box-title">
					<h3>Daftar Menu</h3>
				</div>
				<div class="box-content padding">
					<input type="text" value="<?php echo $username?>" name="username" id="username" readonly>
					<ol>
						<?php
							make_cek();
						?>
					</ol>
				</div>
			</div>
		</div>
	</div>	
<?php echo form_close();?>
<script>
function save_form(){
	$.ajax({
		url     : '<?php echo site_url('bakses/simpan');?>',
		dataType: 'json',
		type    : 'POST',
		data    : $("#inputForm").serialize(),
		success : function(data){
			if(data.status!="error"){
				modal_keluar();
				bootbox.dialog(data.msg, [{
					"label" : "OK!",
					"class" : "btn-small btn-success",
					"callback": function() {
						User_list();
					}
					}]
				);
			}else{
				bootbox.alert(data.msg);
			}
		}
	});
}

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

function modal_keluar()
{
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	$('.table-header').empty(); 
	$('#detail-table').empty();
}
</script>