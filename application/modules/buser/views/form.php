	<?php echo form_open($this->uri->uri_string(),array('name'=>'inputForm', 'id'=>'inputForm', 'class'=>'form-horizontal'));?>

	<div class="row-fluid">
		<div class="span12">
			<div class="box box-color box-bordered">
				<div class="box-title">
					<h3>Form Management User</h3>
				</div>
				<div class="box-content padding">
					<table width="100%" cellpadding="3">
						<tr>
							<td>Username</td>
							<td>
								<input name="nama_pengguna" id="nama_pengguna" type="text" class="input" value="<?php echo isset($field['nama_pengguna'])?$field['nama_pengguna']:''?>"> 
								<input name="nama_pengguna2" id="nama_pengguna2" type="hidden" class="input" value="<?php echo isset($field['nama_pengguna'])?$field['nama_pengguna']:''?>">							</td>
						</tr>
						<?php
						if(isset($field['kunci_masuk'])){
							echo '<input name="kunci_masuk" id="kunci_masuk" type="hidden" class="input" value="ada">';
						}else{
						?>
						<tr>
							<td>Password</td>
							<td>
								<input name="kunci_masuk" id="kunci_masuk" type="password" class="input" value="">							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>Nama Lengkap</td>
							<td>
								<input name="nama_lengkap" id="nama_lengkap" type="text" class="input" value="<?php echo isset($field['nama_lengkap'])?$field['nama_lengkap']:''?>" style="width:100%">							</td>
						</tr>
						<tr>
							<td>Email </td>
					  <td>
								<input name="email_pengguna" id="email_pengguna" type="text" class="input" style="width:100%" value="<?php echo isset($field['email_pengguna'])?$field['email_pengguna']:''?>">							</td>
						</tr>
						<tr>
							<td>Telepon </td>
					  <td>
								<input name="telp_pengguna" id="telp_pengguna" type="text" class="input" style="width:100%" value="<?php echo isset($field['telp_pengguna'])?$field['telp_pengguna']:''?>">							</td>
						</tr>
						<tr>
						  <td>Departemen</td>
						  <td>
						    <select name="id_cabang" id="id_cabang" data-rule-required="true" >
                             
                              <?php 
											  $q2=$this->db->query("select * from tb_cabang order by nama_cabang asc");
											  foreach($q2->result() as $rq2){
											  ?>
                              <option value="<?php echo $rq2->id_cabang; ?>" <?php if (isset($field['id_cabang'])==$rq2->id_cabang) { echo "selected";} ?>>
							  <?php echo $rq2->nama_cabang; ?></option>
                              <?php } ?>
                            </select>						</td>
					  </tr>
						<tr>
						  <td>Role</td>
						  <td><select name="rolename" id="rolename" data-rule-required="true" >
                             
                              <?php 
											  $q2=$this->db->query("select * from tb_roles order by rolename asc");
											  foreach($q2->result() as $rq3){
											  ?>
                              <option value="<?php echo $rq3->rolename; ?>" <?php if (isset($field['rolename'])==$rq3->rolename) { echo "selected";} ?>>
							  <?php echo $rq3->rolename; ?></option>
                              <?php } ?>
                            </select></td>
					  </tr>
					</table>
			  </div>
			</div>
		</div>
	</div>	
<p>&nbsp;</p>
<center><button id="simpan" class="btn btn-danger" style="width:350px;" onClick="save_form();">Simpan Data</button></center>
<?php echo form_close();?>
<script>
$(document).ready(function(){
	$("#inputForm").validate({
		errorElement: 'span',
		errorClass: 'help-inline',
		focusInvalid: false,
		rules: 
		{
			nama_pengguna: 
				{				
					required: true
				},
			kunci_masuk: 
				{				
					required: true
				},
			email_pengguna: 
				{				
					email: true
				}
		},
			
      	messages: 
		{ 
		},
         
        highlight: function (e) {
			$(e).closest('.controls').removeClass('info').addClass('error');
		},

		success: function (e) {
			$(e).closest('.controls').removeClass('error').addClass('info');
			$(e).remove();
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
				
 });

function save_form(){
	if(($("#nama_pengguna").val()!="") && ($("#kunci_masuk").val()!=""))
	{
		$("#inputForm").validate({
		errorElement: 'span',
		errorClass: 'help-inline',
		focusInvalid: false,
		rules: 
		{
			nama_pengguna: 
				{				
					required: true
				},
			kunci_masuk: 
				{				
					required: true
				},
			email_pengguna: 
				{				
					email: true
				}
		},
			
      	messages: 
		{ 
		},
         
        highlight: function (e) {
			$(e).closest('.controls').removeClass('info').addClass('error');
		},

		success: function (e) {
			$(e).closest('.controls').removeClass('error').addClass('info');
			$(e).remove();
		},

		submitHandler: function (form) {
		},
		invalidHandler: function (form) {
		}
	});
		$.ajax({
			url     : '<?php echo site_url('buser/simpan');?>',
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
	}else{
		bootbox.alert("Penyimpanan Gagal !!<br>Harap cek kembali inputannya ??");
	}
}

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

function modal_keluar()
{
	document.getElementById('modal_jabatan').style.display='none';
	document.getElementById('lyar-mask').style.display='none';
	$('.table-header').empty(); 
	$('#detail-table').empty();
}
</script>