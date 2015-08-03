<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Data Running Text
								</h3>
							</div>
							<div class="box-content nopadding">
							
							<br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>brunning/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Tambah Data</a>
                            </div>
							
							
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>ID</th>
											<th>Running Text</th>
											
											<th>Publish</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($query->result_array() as $row){ ?>
										<tr>
											<td><?php echo  $row['id_running_text']; ?></td>
											<td><?php echo  $row['running_text_desc']; ?></td>
											
											<td><?php echo  $row['publish']; ?></td>
											<td><a title="" rel="tooltip" class="btn btn-warning " href="<?php echo site_url();?>brunning/edit/<?php echo  $row['id_running_text']; ?>" data-original-title="Edit Data">Ubah</a></td>
											<td><a title="" rel="tooltip" class="btn btn-danger" href="<?php echo site_url('brunning/submithapus/'.$row['id_running_text']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i>Hapus</a></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
						  </div>
						</div>
					</div>
				</div>

                





                            