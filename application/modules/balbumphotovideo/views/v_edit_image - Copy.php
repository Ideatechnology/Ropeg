
<div class="row-fluid">
<div class="span12">
<div class="box box-color box-bordered">
<div class="box-title">
								<h3><i class=" icon-plus-sign"></i>Upload Images Gallery Photo & Video : <?php echo $albumphotovideo_name; ?></h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content">
 
								<!-- <form action="#" method="POST" class='form-horizontal form-validate' id="bb"> -->
								<?php echo form_open('balbumphotovideo/submiteditimage',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
									
									
									<?php if (isset($pesan)) { 
									echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
									}
									?>
									
									
									<div class="control-group">
											<label for="textfield" class="control-label">Name</label>
											<div class="controls">
												<input type="hidden" name="id_albumphotovideo" id="id_albumphotovideo" value="<?php echo $id_albumphotovideo; ?>"> 
                                                <input type="text" name="albumphotovideo_gallery_name" id="albumphotovideo_gallery_name" class="input-xxlarge" data-rule-required="true" value=""> 
												
											</div>
										</div>
									    
										<div class="control-group">
										<label for="textfield" class="control-label">Desc</label>
									    <div class="controls">
										<textarea name="albumphotovideo_gallery_desc" rows="3" style="width:500px;"></textarea>
										</div>
										</div>
                                    
                                    	<div class="control-group">
										<label class="control-label" for="textfield">Publish</label>
										
										<div class="controls">
                                        <select name="publish">
                                          <option value="Y" >Yes</option>
                                          <option value="N" >No</option>
                                        </select>
										</div></div>
                                        
                                             <div class="control-group">
											<label for="textfield" class="control-label">Position Number</label>
											<div class="controls">
												
                                                <input type="text" name="sort_number" id="sort_number" class="input-xxlarge"  value=""> 
												
											</div>
										</div>
										
										
								
								 <div class="control-group">
								<label class="control-label" for="textfield">Type</label>
										
										<div class="controls">
                                        <select name="publish">
                                          <option value="0" >Photo</option>
                                          <option value="1" >Video</option>
                                        </select>
										</div></div>
									
									<div id="screen3">
									
									 <div class="control-group">
											<label for="textfield" class="control-label">Link Youtube</label>
											<div class="controls">
												
                                                <input type="text" name="link_youtube" id="link_youtube" class="input-xxlarge"  value=""> 
												
											</div>
										</div>
									
										
										
									 <div class="control-group">
											<label for="textfield" class="control-label">Image Link Youtube</label>
											<div class="controls">
												
                                                <input type="text" name="file_foto_youtube" id="file_foto_youtube" class="input-xxlarge"  value=""> 
												
											</div>
										</div>
										
									</div>
                                   

								   <div id="screen4">
								   <div class="control-group">
										<label class="control-label" for="textfield">File Photo</label>
										
										<div class="controls">
											<input type="file" name="userfile"  data-rule-required="true"/>
											Maximal : 1024 x 768 pixels. Under 1 Mb.
										</div>
									</div>
                                    </div>
                                    	
									
                                    
									<hr>
                                    
									
									
									
                                    
									
									
									<div class="form-actions">
										<button class="btn btn-primary" type="submit">Save</button>
                                        <a class="btn btn-danger"  href="<?php echo site_url();?>balbumphotovideo/">Back</a>
										
									</div>
								</form>
							</div>       
 
 
</div>


</div>
</div>


<div class="row-fluid">








<div class="span12">





<div class="box box-color box-bordered">
<div class="box-title">
								<h3>Details <?php echo $albumphotovideo_name; ?></h3>
								<div class="actions">
									<!--<a class="btn btn-mini content-refresh" href="#"><i class="icon-refresh"></i></a>
									<a class="btn btn-mini content-remove" href="#"><i class="icon-remove"></i></a>-->
									<a class="btn btn-mini content-slideUp" href="#"><i class="icon-angle-down"></i></a>
								</div>
							</div>
                            
 <div class="box-content ">
 
 
 
  <table class="table table-hover table-nomargin dataTable table-bordered">
								  <thead>
									  <tr>
									    <th>Name</th>
										  <th>Images</th>
										  <th>Publish</th>
										  <th>Position</th>
										  <th>&nbsp;</th>
								    </tr>
								  </thead>
								  <tbody>
                                    
                                    <?php 
									
									$sql = "select  * from albumphotovideo_gallery where id_albumphotovideo='".$this->uri->segment(3)."' order by id_albumphotovideo_gallery";
									$query = $this->db->query($sql);
									
									foreach($query->result_array() as $row){ 
									
									$linksArray=explode('.', $row['file_foto']);
 				$data= array_filter($linksArray);
				if(!empty($data)){
				  $the = $data[0]."_thumb.".$data[1];	
				}else{
				   $the ='';	
				}
									
									
									?>
									  <tr>
									    <td><?php echo  $row['albumphotovideo_gallery_name']; ?></td>
										  <td><a href="#">
												<img src="<?=base_url()?>uploads/albumphotovideo/<?php echo $the; ?>" alt="">
											</a>										                                    </td>
									      <td><?php echo  $row['publish']; ?>
                                          
                                                           
                                          </td>
								          <td><?php echo  $row['sort_number']; ?></td>
								          <td>
                            <div align="center">
                            
                          
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('balbumphotovideo/submithapusimage/'.$row['id_albumphotovideo_gallery'].'/'.$row['id_albumphotovideo']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            
                            &nbsp;
                            
                            <?php if ($row['publish']=="Y") { ?>
                                          <a title="" rel="tooltip" class="btn btn-mini btn-success" href="<?php echo site_url('balbumphotovideo/submitpublishimage/'.$row['id_albumphotovideo_gallery'].'/'.$row['id_albumphotovideo'].'/'.'N');?>" onclick="return confirm('Not Publish?'); "><i class="icon-delete"></i>Unpublish</a> <?php } else { ?>
                   
                   <a title="" rel="tooltip" class="btn btn-mini btn-success" href="<?php echo site_url('balbumphotovideo/submitpublishimage/'.$row['id_albumphotovideo_gallery'].'/'.$row['id_albumphotovideo'].'/'.'Y');?>" onclick="return confirm('Publish?'); "><i class="icon-delete"></i>Publish</a> 
                   
                   <?php } ?>      
                            
                            
                            </div>                        </td>
									  </tr>
                                        
                                     <?php } ?>
								  </tbody>
							  </table>
					

</div>

</div>




							
</div>


<script language="javascript">

									$(function(){

									$("#screen3").hide();
									$("#screen4").hide();

									/*$('input[type="checkbox"]').click(function(){
									   if($(this).prop("checked") == true){
												//    alert("Anda Setuju Dengan Memenuhi Syarat dan Ketentuan Berlaku");
													$("#screen3").show(500);
													$("#selanjutnya").show(500);
												}
												else if($(this).prop("checked") == false){
												  $("#screen3").hide(500);
												  $("#selanjutnya").hide(500);
												}
									   
									   
									   
									  });
									  */
									  
									});


									</script>