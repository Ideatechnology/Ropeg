<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class=" icon-search"></i>View Data : <?php echo $field['nama_parrent']; ?> -  <?php echo $field['nama_menu']; ?> </h3>
			</div>
                            
			<div class="box-content">
				<?php 
					echo form_open('bpublik/simpan_setting',array('name'=>'inputForm', 'id'=>'inputForm','class'=>'form-horizontal form-validate','enctype'=>'multipart/form-data'));
				
					if (isset($pesan)) { 
						echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
					}
				?>
				<input type="hidden" name="id" id="id" class="input-xxlarge"  value="<?php echo isset($field['id'])?$field['id']:''?>">
				
                
				
                
                <?php
			   $query = $this->db->query("SELECT * FROM tb_setting_form WHERE id_menu='".$field['id']."'")->row();
			   //echo $query->flag_blok;
			   ?>
                
               <?php  if ($query->flag_blok==1) { ?> 
                <div class="control-group">
					<label class="control-label" for="textfield">Provinsi</label>
					<div class="controls">
						
                        <select name="id_provinsi_dapil" id="id_provinsi_dapil" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_provinsi=$this->db->query("select * from tb_provinsi order by nama_provinsi asc");
											  foreach($Q_id_provinsi->result() as $rQ_id_provinsi){
											  ?>
                                              <option value="<?php echo $rQ_id_provinsi->id_provinsi; ?>" <?php if ($rQ_id_provinsi->id_provinsi==$this->input->post('id_provinsi')) { echo "selected";} ?>><?php echo $rQ_id_provinsi->nama_provinsi; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <div class="control-group">
					<label class="control-label" for="textfield">Dapil</label>
					<div class="controls">
						
                        <select name="id_dapil" id="id_dapil" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_dapil=$this->db->query("select * from tb_dapil order by nama_dapil asc");
											  foreach($Q_id_dapil->result() as $rQ_id_dapil){
											  ?>
                                              <option value="<?php echo $rQ_id_dapil->id_dapil; ?>" <?php if ($rQ_id_dapil->id_dapil==$this->input->post('id_dapil')) { echo "selected";} ?>><?php echo $rQ_id_dapil->nama_dapil; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <?php } elseif ($query->flag_blok==2) { ?> 
                
                  <div class="control-group">
					<label class="control-label" for="textfield">Provinsi</label>
					<div class="controls">
						
                       <select name="id_provinsi" id="id_provinsi" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_provinsi=$this->db->query("select * from tb_provinsi order by nama_provinsi asc");
											  foreach($Q_id_provinsi->result() as $rQ_id_provinsi){
											  ?>
                                              <option value="<?php echo $rQ_id_provinsi->id_provinsi; ?>" <?php if ($rQ_id_provinsi->id_provinsi==$this->input->post('id_provinsi')) { echo "selected";} ?>><?php echo $rQ_id_provinsi->nama_provinsi; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <div class="control-group">
					<label class="control-label" for="textfield">Kab/Kota</label>
					<div class="controls">
						
                          <select name="id_provinsi" id="id_provinsi" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_provinsi=$this->db->query("select * from tb_provinsi order by nama_provinsi asc");
											  foreach($Q_id_provinsi->result() as $rQ_id_provinsi){
											  ?>
                                              <option value="<?php echo $rQ_id_provinsi->id_provinsi; ?>" <?php if ($rQ_id_provinsi->id_provinsi==$this->input->post('id_provinsi')) { echo "selected";} ?>><?php echo $rQ_id_provinsi->nama_provinsi; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <?php } elseif ($query->flag_blok==3) { ?> 
                
                   <div class="control-group">
					<label class="control-label" for="textfield">Negara</label>
					<div class="controls">
						
                       <select name="id_negara" id="id_negara" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_negara=$this->db->query("select * from tb_negara order by nama_negara asc");
											  foreach($Q_id_negara->result() as $rQ_id_negara){
											  ?>
                                              <option value="<?php echo $rQ_id_negara->id_negara; ?>" <?php if ($rQ_id_negara->id_negara==$this->input->post('id_negara')) { echo "selected";} ?>><?php echo $rQ_id_negara->nama_negara; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <div class="control-group">
					<label class="control-label" for="textfield">Kantor Wilayah</label>
					<div class="controls">
						
                        <select name="id_kantor_perwakilan" id="id_kantor_perwakilan" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_kantor_perwakilan=$this->db->query("select * from tb_kantor_perwakilan order by nama_kantor_perwakilan asc");
											  foreach($Q_id_kantor_perwakilan->result() as $rQ_id_kantor_perwakilan){
											  ?>
                                              <option value="<?php echo $rQ_id_kantor_perwakilan->id_kantor_perwakilan; ?>" <?php if ($rQ_id_kantor_perwakilan->id_kantor_perwakilan==$this->input->post('id_kantor_perwakilan')) { echo "selected";} ?>><?php echo $rQ_id_kantor_perwakilan->nama_kantor_perwakilan; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <?php } ?>
                
                
                
                 <?php  if ($query->flag_param_formulir==1) { ?> 
				
				<div class="control-group">
					<label class="control-label" for="textfield">Formulir</label>
					<div class="controls"><!--class='ckeditor span12' -->
						
                        <select name="id_formulir" id="id_formulir" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_formulir=$this->db->query("select * from tb_formulir order by nama_formulir asc");
											  foreach($Q_id_formulir->result() as $rQ_id_formulir){
											  ?>
                                              <option value="<?php echo $rQ_id_formulir->id_formulir; ?>" <?php if ($rQ_id_formulir->id_formulir==$this->input->post('id_formulir')) { echo "selected";} ?>><?php echo $rQ_id_formulir->nama_formulir; ?></option>
                                              <?php } ?>
                                              
                                            </select>
                        
					</div>
				</div>
                
                <?php } ?>
                
                
                   <?php  if ($query->flag_param_parpol==1) { ?> 
				
				<div class="control-group">
					<label class="control-label" for="textfield">Parpol</label>
					<div class="controls"><!--class='ckeditor span12' -->
						
                        <select name="id_parpol" id="id_parpol" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_parpol=$this->db->query("select * from tb_parpol order by nama_parpol asc");
											  foreach($Q_id_parpol->result() as $rQ_id_parpol){
											  ?>
                                              <option value="<?php echo $rQ_id_parpol->id_parpol; ?>" <?php if ($rQ_id_parpol->id_parpol==$this->input->post('id_parpol')) { echo "selected";} ?>><?php echo $rQ_id_parpol->nama_parpol; ?></option>
                                              <?php } ?>
                                              
                                            </select>
                        
					</div>
				</div>
                
                <?php } ?>
                
                
                	
                
                
                <hr>	
				<div class="form-actions">
					<button class="btn btn-primary" type="submit" onclick="cek();">Cari</button>
					<a class="btn btn-danger"  href="<?php echo site_url('bpublik');?>">Kembali</a>
					
				</div>
                
                <div class="box box-color box-bordered">
							<div class="box-title">
								<h3>File Dokumen</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>Nama File</th>
											<th>Keterangan</th>
											<th class='hidden-350'>Aksi</th>
											<th class='hidden-480'>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Trident</td>
											<td>
												Internet
													Explorer 4.0											</td>
											<td class='hidden-350'>Edit</td>
											<td class='hidden-480'>Delete</td>
										</tr>
										<tr>
										  <td>KPU</td>
										  <td>Test</td>
										  <td class='hidden-350'>Edit</td>
										  <td class='hidden-480'>Delete</td>
									  </tr>
									</tbody>
								</table>
							</div>
						</div>
                
                
                
				<?php echo form_close();?>
			</div>       
		</div>
	</div>
</div>


