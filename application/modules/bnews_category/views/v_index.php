<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Data News Category
								</h3>
							</div>
							<div class="box-content nopadding">
							
							<br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>bnews_category/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Add Data</a>
                            </div>
							
							
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>ID</th>
											<th>News Category</th>
											
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($query->result_array() as $row){ ?>
										<tr>
											<td><?php echo  $row['id_news_category']; ?></td>
											<td><?php echo  $row['news_category']; ?></td>
											
											<td><a title="" rel="tooltip" class="btn btn-warning " href="<?php echo site_url();?>bnews_category/edit/<?php echo  $row['id_news_category']; ?>" data-original-title="Edit Data">Edit</a></td>
											<td><a title="" rel="tooltip" class="btn btn-danger" href="<?php echo site_url('bnews_category/submithapus/'.$row['id_news_category']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i>Delete</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
						  </div>
						</div>
					</div>
				</div>

                





                            