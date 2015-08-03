<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class=" icon-cogs"></i>Setting Form & Filter - Tahun Pemilu <?php echo $this->uri->segment(4); ?></h3>
			</div>
                            
			<div class="box-content">
            <?php printbreadcrumb($field['id']); ?><hr />
				<?php 
					echo form_open('bpublik/simpan_setting',array('name'=>'inputForm', 'id'=>'inputForm','class'=>'form-horizontal form-validate','enctype'=>'multipart/form-data'));
				
					if (isset($pesan)) { 
						echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
					}
				?>
				<div class="control-group">
					<label class="control-label" for="textfield">Parrent Menu</label>
				  <div class="controls">
						<input type="text" name="nama_parrent" id="nama_parrent" class="input-xxlarge" data-rule-required="true" readonly="true" value="<?php echo isset($field['nama_parrent'])?$field['nama_parrent']:''?>">
						<input type="hidden" name="parrent" id="parrent" class="input-xxlarge"  value="<?php echo isset($field['parrent'])?$field['parrent']:''?>">
						<input type="hidden" name="id" id="id" class="input-xxlarge"  value="<?php echo isset($field['id'])?$field['id']:''?>">
						<input type="hidden" name="tahun" id="tahun" class="input-xxlarge"  value="<?php echo $this->uri->segment(4); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="textfield">Nama Menu</label>
					<div class="controls">
						<input type="text"  readonly="readonly" name="nama_menu" id="nama_menu" class="input-xxlarge" data-rule-required="true"  value="<?php echo isset($field['nama_menu'])?$field['nama_menu']:''?>">
					</div>
				</div>
				
				
				<?php 
			/*	$sql = "select * from tb_setting_form where id_menu='".$field['id']."'";
			    $row = $this->db->query($sql)->row_array();
				if ($row['flag_blok']==1) { echo "checked"; }
				if ($row['flag_blok']==2) { echo "checked"; }
				if ($row['flag_blok']==3) { echo "checked"; }
			*/	
				?>
				
				
				<div class="control-group">
					<label class="control-label" for="textfield">Blok Form &amp; Filter</label>
					<div class="controls">
						<input name="flag_blok" type="radio" value="1" data-rule-required="true" /> Provinsi - Dapil<br />
                        <input name="flag_blok" type="radio" value="2" data-rule-required="true" /> Provinsi - KabKot<br />
                        <input name="flag_blok" type="radio" value="3" data-rule-required="true" /> Negara - Kantor Perwakilan<br />
                        <input name="flag_blok" type="radio" value="4" data-rule-required="true" /> Tidak Memakai Blok Form & Filter<br />
                        

					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="textfield">Blok Parameter</label>
					<div class="controls"><!--class='ckeditor span12' -->
						<input name="flag_param_formulir" type="checkbox" value="1" /> Formulir<br />
                        <input name="flag_param_parpol" type="checkbox" value="1" /> Parpol
					</div>
				</div>
                <hr>	
				<div class="form-actions">
					<button class="btn btn-primary" type="submit" onclick="cek();">Simpan</button>
					<a class="btn btn-danger"  href="<?php echo site_url('bpublik/index/'.$this->uri->segment(4));?>">Kembali</a>
					
				</div>
				<?php echo form_close();?>
			</div>       
		</div>
	</div>
</div>


