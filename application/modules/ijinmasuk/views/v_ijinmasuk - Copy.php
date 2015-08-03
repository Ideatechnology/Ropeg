<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Apotecare.net - Website Control Panel
								</h3>
							</div>
							<div class="box-content">
								
								
								
								<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class="icon-user"></i>Silahkan Login</h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content">
								<?php echo form_open('ijinmasuk/validate',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate'));?>
								
								<?php
				if($this->session->userdata('error_msg'))
				{
					echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$this->session->userdata('error_msg').'</div>';
					$this->session->unset_userdata('error_msg');
				}
				?>
								Silahkan masukan No.KTP dan Password sesuai dengan data yang sudah anda daftarkan di formulir pendaftaran.<hr />
								
									<div class="control-group">
										<label class="control-label" for="textfield">No.KTP</label>
										<div class="controls">
											<input name="nama_pengguna" type="text" class="input-xlarge" id="nama_pengguna" maxlength="16" placeholder=""  data-rule-required="true" data-rule-number="true" data-rule-minlength="16">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="password">Password</label>
										<div class="controls">
											<input type="password" class="input-xlarge" placeholder="" id="kunci_masuk" name="kunci_masuk" data-rule-required="true">
										</div>
									</div>
									
										<div class="control-group">
										<label class="control-label" for="textfield">Kode Keamanan</label>
										
										<div class="controls">
											<?php #echo $image;?>
											<button class="btn btn-primary" disabled="disabled"><strong><?php echo $word;?></strong></button>
											<input name="secutity_code" type="text" class="input-small" maxlength="4" data-rule-required="true">
									  </div>
									
									<div class="control-group">
									<div class="controls">
										<label class="control-label"><small><a href="<?=site_url()?>/lupapass">Lupa Password?</a></small></label>
									</div>	
									</div>
									
								
									
									<div class="form-actions">
										
                                        <button class="btn btn-primary" type="submit"><i class="icon-check"></i>&nbsp;LOGIN</button>
                                    <a href="<?=site_url()?>/" class="btn btn-danger" type="submit"><i class="icon-reply"></i>&nbsp;KEMBALI</a>
										
									</div>
								</form>
							</div>       
 
 
</div>
								
								
								
								
							</div>
						</div>
					</div>
				</div>


