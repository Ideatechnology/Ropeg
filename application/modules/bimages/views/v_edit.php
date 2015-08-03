
<div class="row-fluid">
<div class="span12">&nbsp;</div>
</div>


<div class="row-fluid">


<div class="span12">





<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class=" icon-plus-sign"></i>Edit News</h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content">
 
								<!-- <form action="#" method="POST" class='form-horizontal form-validate' id="bb"> -->
								<?php echo form_open('bnews/submitedit',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
									
									
									<?php if (isset($pesan)) { 
									echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
									}
									?>
                                    
                                    
                                    <?php #echo $id_news; ?>
                                    
                                    <input type="hidden" name="id_news" id="id_news" class="input-large" data-rule-required="true" value="<?php echo $id_news; ?>"> 
                                    
                                    							
                                  
									  <div class="control-group">
											<label for="textfield" class="control-label">Category</label>
											<div class="controls">
												 <select name="id_news_category" id="id_news_category" data-rule-required="true" >
                                              <option >-Category-</option>
                                              <?php 
											  $q2=$this->db->query("select * from news_category order by news_category asc");
											  foreach($q2->result() as $rq2){
											  ?>
                                              <option value="<?php echo $rq2->id_news_category; ?>" <?php if ($rq2->id_news_category==$id_news_category) { echo "selected";} ?>><?php echo $rq2->news_category; ?></option>
                                              <?php } ?>
                                              
                                            </select>
												
											</div>
										</div>
									
									<div class="control-group">
											
											<label for="textfield" class="control-label">Title</label>
											<div class="controls">
												
                                                <input type="text" name="news_name" id="news_name" class="input-xxlarge" data-rule-required="true" value="<?php echo $news_name; ?>"> 
												
											</div>
										</div>
                                        
									
												<div class="controls">
											
                                            
                                            
									
										<textarea name="news_desc" class='ckeditor span12' rows="7"><?php echo $news_desc; ?></textarea>
								
							
									
										
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
											<input type="file" name="userfile"  />(jpg,jpeg,png) 1920 x 760 px
											<img src="<?=base_url()?>photostorage/news/<?php echo $the; ?>" alt="">
										</div>
									</div>
									
                                    
									<hr>
                                    
                                    
									
									
									<div class="form-actions">
										<button class="btn btn-primary" type="submit">Save</button>
                                        <a class="btn btn-danger"  href="<?php echo site_url();?>bnews/">Back</a>
										
									</div>
								</form>
							</div>       
 
 
</div>



</div>

							
</div>