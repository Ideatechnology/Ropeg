<div class="row-fluid">
<div class="span3"></div>
					<div class="span6">
						<div class="box"><br />
                        <center>
                        <!--<img src="<?php echo base_url(); ?>/assets/img/logo_kpu.png" />-->
                        </center>
							
							<div class="box-content">
								
								
								
								<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class="icon-user"></i>WEBSITE ROPEG SETJEN KEMENDAGRI</h3>
								<div class="actions">
									
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
								
									<div class="control-group">
										<label class="control-label" for="textfield">Username</label>
										<div class="controls">
											<input name="nama_pengguna" type="text" class="input-xlarge" id="nama_pengguna"  placeholder=""  data-rule-required="true" data-rule-number="false" data-rule-minlength="5">
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
										<!--<label class="control-label"><small><a href="<?=site_url()?>lupapass">Lupa Password?</a></small></label>-->
									</div>	
									</div>
									
								
									
									
										
                                        <button class="btn btn-primary" type="submit"><i class="icon-check"></i>&nbsp;LOGIN</button>
                                    
								</form>
							</div>       
 
 
</div>
								
								
								
								
							</div>
						</div>
					</div>
				</div>