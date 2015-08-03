
<div class="row-fluid">



					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Events</h3>
							</div>
                            
                            
                            
                            
						  <div class="box-content nopadding">
                            <br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>bkevents/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Add Data</a>
                            </div>
                            
                            
                            
                            
                            
                     
							  <table class="table table-hover table-nomargin dataTable table-bordered">
								  <thead>
									  <tr>
									    <th>Judul</th>
									   
									   
										  <th>Tanggal</th>
										  <th>By</th>
								         
								          <th>&nbsp;</th>
								    </tr>
								  </thead>
								  <tbody>
                                    
                                    <?php foreach($query->result_array() as $row){ ?>
									  <tr>
									    <td><?php echo  $row['judul']; ?></td>
									    
                                            
                                          <!--  <a href="#">
												<img src="<?=base_url()?>uploads/999/test.jpg" alt="">
											</a>-->											                                    </td>
									     
								          <td><?php echo  $row['author']; ?></td>
							              <td><?php echo  $row['tanggal']; ?></td>
					                     
					                      <td>
                            <div align="center">
                            
                           
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-warning " href="<?php echo site_url();?>bkevents/edit/<?php echo  $row['id_events']; ?>" data-original-title="Edit Data"><i class="icon-pencil"></i> Edit</a> &nbsp;
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('bkevents/submithapus/'.$row['id_events']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            </div>                        </td>
									  </tr>
                                        
                                     <?php } ?>
								  </tbody>
							  </table>
						  </div>
						</div>
					</div>
				</div>



