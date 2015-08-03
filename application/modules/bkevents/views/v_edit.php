
<div class="row-fluid">
<div class="span12">&nbsp;</div>
</div>


<div class="row-fluid">


<div class="span12">





<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class=" icon-plus-sign"></i>Edit Events</h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content">
 
								<!-- <form action="#" method="POST" class='form-horizontal form-validate' id="bb"> -->
								<?php echo form_open('bkevents/submitedit',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
									
									
									<?php if (isset($pesan)) { 
									echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
									}
									?>
									
									
									
                                      <input type="hidden" name="id_events" id="id_events" class="input-large" data-rule-required="true" value="<?php echo $id_events; ?>"> 
                                    
									
                                    
                                    
                                    <div class="control-group">
											<label for="textfield" class="control-label">Judul</label>
											<div class="controls">
												<input type="text" name="judul" value="<?php echo $judul; ?>" id="judul" class="input-xxlarge" data-rule-required="true">
												
											</div>
										</div>

										 <div class="control-group">
											<label for="textfield" class="control-label">Tanggal</label>
											<div class="controls">
												<input type="text" name="tanggal" value="<?php echo $tanggal; ?>" id="tanggal" class="input-xxsmall datepick" data-date-format="yyyy-mm-dd" data-rule-required="true">
												
											</div>
										</div>

										<div class="controls">
											
                                            
                                            
									
										<textarea name="desc" class='ckeditor span12' rows="10"><?php echo $keterangan; ?></textarea>
								
									
										
									</div>
									
												
                                    
                                    
									<hr>
                                    
                                    
									
									
									<div class="form-actions">
										<button class="btn btn-primary" type="submit">Save</button>
                                        <a class="btn btn-danger"  href="<?php echo site_url();?>bkevents/">Back</a>
										
									</div>
								</form>
							</div>       
 
 
</div>



</div>

							
</div>