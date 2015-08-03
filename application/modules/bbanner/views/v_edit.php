
<div class="row-fluid">
<div class="span12">&nbsp;</div>
</div>


<div class="row-fluid">


<div class="span12">





<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class=" icon-plus-sign"></i>Edit Our Reference</h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content">
 
								<!-- <form action="#" method="POST" class='form-horizontal form-validate' id="bb"> -->
								<?php echo form_open('bbanner/submitedit',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
									
									
									<?php if (isset($pesan)) { 
									echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
									}
									?>
                                    
                                    
                                    <?php #echo $id_banner; ?>
                                    
                                    <input type="hidden" name="id_kategori_files" id="id_kategori_files" class="input-large" data-rule-required="true" value="<?php echo $id_kategori_files; ?>"> 
                                    
                                    
									
									<div class="control-group">
											
											<label for="textfield" class="control-label">Title</label>
											<div class="controls">
												
                                                <input type="text" name="banner_name" id="banner_name" class="input-xxlarge" data-rule-required="true" value="<?php echo $banner_name; ?>"> 
												
											</div>
										</div>
                                        
									
												<div class="controls">
											
                                            
                                            
									
										<textarea name="banner_desc"  class='input-xxlarge' rows="10" placeholder="Description"><?php echo $banner_desc; ?></textarea>
								
							
									
										
									</div>
                                    
                                    		<div class="control-group">
										<label class="control-label" for="textfield">Publish</label>
										
										<div class="controls">
                                        <select name="publish">
                                          <option value="Y" <?php if ($publish=="Y") { echo "selected";}?>>Yes</option>
                                          <option value="N"  <?php if ($publish=="N") { echo "selected";}?>>No</option>
                                        </select>
										</div>
									</div>
                                    
                                    <?php 
									$linksArray=explode('.', $file_foto);
 				$data= array_filter($linksArray);
				if(!empty($data)){
				  $the = $data[0]."_thumb.".$data[1];	
				}else{
				   $the ='';	
				}
									?>
									
									
                                    	<div class="control-group">
										<label class="control-label" for="textfield">File Photo</label>
										
										<div class="controls">
											<input type="file" name="userfile"  />( jpeg,jpg,png 84x46px)
											<img src="<?=base_url()?>photostorage/reklame/<?php echo $the; ?>" alt="">
										</div>
									</div>
									<div class="control-group">
											<label for="textfield" class="control-label">Link</label>
											<div class="controls">
												<input type="text" name="banner_link" id="banner_link" class="input-xxlarge" data-rule-required="true" value="<?php echo $banner_link; ?>">
												
											</div>
										</div>
                                    
									<hr>
                                    
                                    
									
									
									<div class="form-actions">
										<button class="btn btn-primary" type="submit">Save</button>
                                        <a class="btn btn-danger"  href="<?php echo site_url();?>bbanner/">Back</a>
										
									</div>
								</form>
							</div>       
 
 
</div>



</div>

							
</div>