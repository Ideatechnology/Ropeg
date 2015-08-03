
<div class="row-fluid">



					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Gallery Photo & Video </h3>
							</div>
                            
                            
                            
                            
						  <div class="box-content nopadding">
                            <br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>balbumphotovideo/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Add Data</a>
                            </div>
                            
                            
                            
                            
                            
                     
							  <table class="table table-hover table-nomargin dataTable table-bordered">
								  <thead>
									  <tr>
									   
									    <th>Album Name</th>
										  <th>Desc</th>
										  <th>Publish</th>
										  <th>Create Time</th>
										  <th>By</th>
								          <th>Position</th>
								          <th>&nbsp;</th>
								    </tr>
								  </thead>
								  <tbody>
                                    
                                    <?php foreach($query->result_array() as $row){ ?>
									  <tr>
									   
									    <td><?php echo  $row['albumphotovideo_name']; ?></td>
										  <td><?php echo  $row['albumphotovideo_desc']; ?>
                                            
                                          <!--  <a href="#">
												<img src="<?=base_url()?>uploads/999/test.jpg" alt="">
											</a>-->											                                    </td>
									      <td><?php echo  $row['publish']; ?></td>
								          <td><?php echo  $row['create_time']; ?></td>
							              <td><?php echo  $row['create_author']; ?></td>
					                      <td><?php echo  $row['sort_number']; ?></td>
					                      <td>
                            <div align="center">
                            
                            <a title="" rel="tooltip" class="btn btn-mini " href="<?php echo site_url();?>balbumphotovideo/edit_image/<?php echo  $row['id_albumphotovideo']; ?>" data-original-title="Upload Images"><i class="icon-cloud-upload"></i> Images</a> &nbsp;
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-warning " href="<?php echo site_url();?>balbumphotovideo/edit/<?php echo  $row['id_albumphotovideo']; ?>" data-original-title="Edit Data"><i class="icon-pencil"></i> Edit</a> &nbsp;
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('balbumphotovideo/submithapus/'.$row['id_albumphotovideo']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            </div>                        </td>
									  </tr>
                                        
                                     <?php } ?>
								  </tbody>
							  </table>
						  </div>
						</div>
					</div>
				</div>



