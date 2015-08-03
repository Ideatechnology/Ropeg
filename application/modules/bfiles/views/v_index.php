
<div class="row-fluid">



					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>File Manager</h3>
							</div>
                            
                            
                            
                            
						  <div class="box-content nopadding">
                            <br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>bfiles/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Add Data</a>
                            </div>
                            
                    
							  <table class="table table-hover table-nomargin dataTable table-bordered">
								  <thead>
									  <tr>
									    <th>Title</th>
									   
									   
										  <th>Keterangan</th>
										  <th>Kategori</th>
										  <th>Files</th>
										  <th>Publish</th>
								         
								          <th>&nbsp;</th>
								    </tr>
								  </thead>
								  <tbody>
                                    
                                    <?php foreach($query->result_array() as $row){ ?>
									  <tr>
									   	  <td><?php echo  $row['judul']; ?></td>
								          
									   	  <td style="width:200px;"><?php echo  $row['keterangan']; ?></td>
								          <td><?php echo  $row['kategori_file']; ?></td>
							              <td><a href="<?php echo base_url();?>filestorage/<?php echo  $row['files_data']; ?>"><?php echo  $row['files_data']; ?></a></td>
							              <td><?php echo $row['publish'];?></td>
					                     
					                      <td>
                            <div align="center">
                            
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-warning " href="<?php echo site_url();?>bfiles/edit/<?php echo  $row['id_files']; ?>" data-original-title="Edit Data"><i class="icon-pencil"></i> Edit</a> 
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('bfiles/submithapus/'.$row['id_files']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            </div>                        </td>
									  </tr>
                                        
                                     <?php } ?>
								  </tbody>
							  </table>
						  </div>
						</div>
					</div>
				</div>



