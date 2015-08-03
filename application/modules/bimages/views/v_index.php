
<div class="row-fluid">



					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Images Library</h3>
							</div>
                            
                            
                            
                            
						  <div class="box-content">
                            <?php echo form_open('bimages/submit',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
									
									
									<?php if (isset($pesan)) { 
									echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
									}
									?>
									
                                    
                                    
                                     <div class="control-group">
										<label class="control-label" for="textfield">File Photo</label>
										
										<div class="controls">
											<input type="file" name="userfile"  data-rule-required="true"/>(jpg,jpeg,png) max. 1024 x 768 pixels
										</div>
									</div>
                                    	
									
                                    
									<hr>
                                    
                                    
									
									
								
										<button class="btn btn-primary" type="submit">Upload</button>
								
								</form>
							
							
							<div class="row-fluid">
<div class="span1"></div>
					<div class="span10">
						<ul class="gallery">
							
							<?php foreach($news as $news2){ 
							$linksArray=explode('.', $news2['file_foto']);
 				$data= array_filter($linksArray);
				if(!empty($data)){
				  $the = $data[0]."_thumb.".$data[1];	
				}else{
				   $the ='';	}
							?>
							
							<li>
							
							
							<a href="#">
												
											
								<img src="<?php echo base_url()?>photostorage/images/<?php echo $the; ?>" width="200" height="150"></a>
							<div class="extras">
							<div class="extras-inner">
							<a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('bimages/submithapus/'.$news2['id']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            
							<a title="" rel="tooltip" class="btn btn-mini btn-primary" href="#" onclick="kopi('<?php echo site_url()."photostorage/images/".$news2['file_foto']; ?>')"><i class="icon-delete"></i> Get URL</a>                            
							</div>
							</div>
							</li>
							 <?php } ?>
							
						</ul>
					</div>
					<div class="span1"></div>
				</div>
							
							
                            
                     
							  
						  </div>
						</div>
					</div>
				</div>


<?php echo $this->pagination->create_links(); ?>
<SCRIPT LANGUAGE="JavaScript">

function kopi1(a)
{
alert(a);
Copied = a;
Copied.execCommand("Copy");
}
function kopi(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}
</SCRIPT>