
<div class="row-fluid">



					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>Kategori File</h3>
							</div>
                            
                            
                            
                            
						  <div class="box-content nopadding">
                            <br />
                            
                            
                            
                          
                            <div align="center">
                            <a title="" rel="tooltip" class="btn btn-green" href="<?php echo site_url();?>bkatfile/add" data-original-title="New Data"><i class="icon-plus-sign"></i> Add Data</a>
                            </div>
                            
                    
							  <table class="table table-hover table-nomargin dataTable table-bordered">
								  <thead>
									  <tr>
									    <th>Kategori</th>
									    
								          <th>&nbsp;</th>
								    </tr>
								  </thead>
								  <tbody>
                                    
                                    <?php foreach($query->result_array() as $row){ ?>
									  <tr>
									   							                                    </td>
									      <td><?php echo  $row['kategori_file']; ?></td>
								          <td>
                            <div align="center">
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-primary" onclick="kopi('<?php echo "files/category/".$row['id_kategori_files']; ?>')">Get Url</a>
                          
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-warning " href="<?php echo site_url();?>bkatfile/edit/<?php echo  $row['id_kategori_files']; ?>" data-original-title="Edit Data"><i class="icon-pencil"></i> Edit</a> &nbsp;
                            
                            <a title="" rel="tooltip" class="btn btn-mini btn-danger" href="<?php echo site_url('bkatfile/submithapus/'.$row['id_kategori_files']);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i> Delete</a>                            </div>                        </td>
									  </tr>
                                        
                                     <?php } ?>
								  </tbody>
							  </table>
						  </div>
						</div>
					</div>
				</div>



<script type="text/javascript">

function kopi(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}

</script>