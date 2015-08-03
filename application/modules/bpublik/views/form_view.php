<div class="row-fluid">
	<div class="span12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3><i class=" icon-search"></i>View Data File Dokumen - Tahun Pemilu <?php echo $tahun; ?></h3>
                			</div>
                            
			<div class="box-content">
            <?php printbreadcrumb($field['id']); ?>
          <hr />
            <form name="inputForm" id="inputForm" class="form-horizontal form-validate" enctype="multipart/form-data" method="post" action="<?php echo site_url(); ?>bpublik/open_form_view/<?php echo $field['id'];?>/<?php echo $tahun;?>">
				<?php 
					#echo form_open('bpublik/open_form_view/',array('name'=>'inputForm', 'id'=>'inputForm','class'=>'form-horizontal form-validate','enctype'=>'multipart/form-data'));
				
					if (isset($pesan)) { 
						echo '<div class="alert alert-error"><button class="close" data-dismiss="alert" type="button">&times;</button>'.$pesan.'</div>';
					}
				?>
				
                 <?php
			   $query = $this->db->query("SELECT * FROM tb_setting_form WHERE id_menu='".$field['id']."'")->row();
			   //echo $query->flag_blok;
			   ?>
                <input type="hidden" name="flag_blok" id="flag_blok" class="input-xxlarge"  value="<?php echo $query->flag_blok;?>">
               <?php  if ($query->flag_blok==1) { ?> 
                <div class="control-group">
					<label class="control-label" for="textfield">Provinsi</label>
					<div class="controls">
						
                       <select name="id_provinsi_dapil" id="id_provinsi_dapil" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_provinsi=$this->db->query("select * from tb_provinsi order by nama_provinsi asc");
											  foreach($Q_id_provinsi->result() as $rQ_id_provinsi){
											  ?>
                                              <option value="<?php echo $rQ_id_provinsi->kode_prov; ?>" <?php if ($rQ_id_provinsi->kode_prov==$this->input->post('id_provinsi_dapil')) { echo "selected";} ?>><?php echo $rQ_id_provinsi->nama_provinsi; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <div class="control-group">
					<label class="control-label" for="textfield">Dapil</label>
					<div class="controls">
						
                        <select name="id_dapil" id="id_dapil" data-rule-required="true">
                                             
                                              
                                            </select>

					</div>
				</div>
                
                <?php } elseif ($query->flag_blok==2) { ?> 
                
                  <div class="control-group">
					<label class="control-label" for="textfield">Provinsi</label>
					<div class="controls">
						
                       <select name="id_provinsi" id="id_provinsi" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_provinsi=$this->db->query("select * from tb_provinsi order by nama_provinsi asc");
											  foreach($Q_id_provinsi->result() as $rQ_id_provinsi){
											  ?>
                                              <option value="<?php echo $rQ_id_provinsi->kode_prov; ?>" <?php if ($rQ_id_provinsi->kode_prov==$this->input->post('id_provinsi')) { echo "selected";} ?>><?php echo $rQ_id_provinsi->nama_provinsi; ?></option>
                                              <?php } ?>
                                              
                                            </select>

					</div>
				</div>
                
                <div class="control-group">
					<label class="control-label" for="textfield">Kab/Kota</label>
					<div class="controls">
						
                          <select name="id_kabkot" id="id_kabkot" data-rule-required="true">
                                              
                                            </select>

					</div>
				</div>
                
                <?php } elseif ($query->flag_blok==3) { ?> 
                
                    <div class="control-group">
					<label class="control-label" for="textfield">Kantor Perwakilan</label>
					<div class="controls">
						
                          <select name="id_kantor_perwakilan" id="id_kantor_perwakilan" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_kantor_perwakilan=$this->db->query("select * from tb_kantor_perwakilan order by nama_kantor_perwakilan asc");
											  foreach($Q_id_kantor_perwakilan->result() as $rQ_id_kantor_perwakilan){
											  ?>
                                              <option value="<?php echo $rQ_id_kantor_perwakilan->id_kantor_perwakilan; ?>" <?php if ($rQ_id_kantor_perwakilan->id_kantor_perwakilan==$this->input->post('id_kantor_perwakilan')) { echo "selected";} ?>><?php echo $rQ_id_kantor_perwakilan->nama_kantor_perwakilan; ?></option>
                                              <?php } ?>
                                              
                                            </select>
                                            
                                            
                                            
                                            

					</div>
				</div>
                
                <?php } ?>
                
                
                
                 <?php  if ($query->flag_param_formulir==1) { ?> 
				 <input type="hidden" name="flag_param_formulir" id="flag_param_formulir" class="input-xxlarge"  value="<?php echo $query->flag_param_formulir;?>">
				<div class="control-group">
					<label class="control-label" for="textfield">Formulir</label>
					<div class="controls"><!--class='ckeditor span12' -->
						
                        <select name="id_formulir" id="id_formulir" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_formulir=$this->db->query("select * from tb_formulir order by nama_formulir asc");
											  foreach($Q_id_formulir->result() as $rQ_id_formulir){
											  ?>
                                              <option value="<?php echo $rQ_id_formulir->id_formulir; ?>" <?php if ($rQ_id_formulir->id_formulir==$this->input->post('id_formulir')) { echo "selected";} ?>><?php echo $rQ_id_formulir->nama_formulir; ?></option>
                                              <?php } ?>
                                              
                                            </select>
                        
					</div>
				</div>
                
                <?php } ?>
                
                
                   <?php  if ($query->flag_param_parpol==1) { ?> 
				<input type="hidden" name="flag_param_parpol" id="flag_param_parpol" class="input-xxlarge"  value="<?php echo $query->flag_param_parpol;?>">
				<div class="control-group">
					<label class="control-label" for="textfield">Parpol</label>
					<div class="controls"><!--class='ckeditor span12' -->
						
                        <select name="id_parpol" id="id_parpol" data-rule-required="true">
                                              <option >-Pilih-</option>
                                              <?php 
											  $Q_id_parpol=$this->db->query("select * from tb_parpol order by nama_parpol asc");
											  foreach($Q_id_parpol->result() as $rQ_id_parpol){
											  ?>
                                              <option value="<?php echo $rQ_id_parpol->id_parpol; ?>" <?php if ($rQ_id_parpol->id_parpol==$this->input->post('id_parpol')) { echo "selected";} ?>><?php echo $rQ_id_parpol->nama_parpol; ?></option>
                                              <?php } ?>
                                              
                                            </select>
                        
					</div>
				</div>
                
                <?php } ?>
                
                	
                
                
	
				<div class="form-actions">
                	<?php if ($query->flag_blok!=4) { ?> 
					<input type="submit" class="btn btn-primary" name="submit" value="Cari">
					<?php } ?>
                    <a class="btn btn-danger"  href="<?php echo site_url('bpublik/index/'.$tahun);?>">Kembali</a>
					
				</div>
                
                
              
                
                
                
                
                
                <div class="box box-color box-bordered">
							<div class="box-title">
								<h3>File Dokumen</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>Nama File</th>
											<th>Keterangan</th>
										<!--	<th>Aksi</th> -->
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
                                       <?php 
		
				$sql = "select  * from tb_dokumen  where id_menu= '".$field['id']."'";		
				
				if ($this->input->post("submit")) {
				
					
					// blok 1
					if ($query->flag_blok==1 && $query->flag_param_formulir!=1 && $query->flag_param_parpol!=1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi_dapil")."' and id_dapil='".$this->input->post("id_dapil")."' ";
					
					}
					elseif ($query->flag_blok==1 && $query->flag_param_formulir==1 && $query->flag_param_parpol!=1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi_dapil")."' and id_dapil='".$this->input->post("id_dapil")."' 
						and id_formulir='".$this->input->post("id_formulir")."' ";
					
					}
					elseif ($query->flag_blok==1 &&  $query->flag_param_formulir!=1 && $query->flag_param_parpol==1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi_dapil")."' and id_dapil='".$this->input->post("id_dapil")."' 
						and id_parpol='".$this->input->post("id_parpol")."' ";
					
					}
					elseif ($query->flag_blok==1 && $query->flag_param_formulir==1 && $query->flag_param_parpol==1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi_dapil")."' and id_dapil='".$this->input->post("id_dapil")."' 
						and id_formulir='".$this->input->post("id_formulir")."' and id_parpol='".$this->input->post("id_parpol")."' ";
					
					}
					
					//blok 2
					elseif ($query->flag_blok==2 && $query->flag_param_formulir!=1 && $query->flag_param_parpol!=1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi")."' and id_kabkot='".$this->input->post("id_kabkot")."' ";
					
					}
					elseif ($query->flag_blok==2 && $query->flag_param_formulir==1 && $query->flag_param_parpol!=1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi")."' and id_kabkot='".$this->input->post("id_kabkot")."' 
						and id_formulir='".$this->input->post("id_formulir")."' ";
					
					}
					elseif ($query->flag_blok==2 && $query->flag_param_formulir!=1 && $query->flag_param_parpol==1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi")."' and id_kabkot='".$this->input->post("id_kabkot")."' 
						and id_parpol='".$this->input->post("id_parpol")."' ";
					
					}
					elseif ($query->flag_blok==2 && $query->flag_param_formulir==1 && $query->flag_param_parpol==1) {
					
						$sql .= " and   id_provinsi='".$this->input->post("id_provinsi")."' and id_kabkot='".$this->input->post("id_kabkot")."' 
						and id_formulir='".$this->input->post("id_formulir")."' and id_parpol='".$this->input->post("id_parpol")."' ";
					
					} 
					//blok 3
					elseif ($query->flag_blok==3 && $query->flag_param_formulir!=1 && $query->flag_param_parpol!=1 ) {
					
						$sql .= " and   id_kantor_perwakilan='".$this->input->post("id_kantor_perwakilan")."' ";
					
					}
					elseif ($query->flag_blok==3 && $query->flag_param_formulir==1 && $query->flag_param_parpol!=1 ) {
					
						$sql .= " and   id_kantor_perwakilan='".$this->input->post("id_kantor_perwakilan")."' 
						and id_formulir='".$this->input->post("id_formulir")."' ";
					}
					elseif ($query->flag_blok==3 && $query->flag_param_formulir!=1 && $query->flag_param_parpol==1 ) {
					
						$sql .= " and   id_kantor_perwakilan='".$this->input->post("id_kantor_perwakilan")."' 
						and id_parpol='".$this->input->post("id_parpol")."' ";					
					}
					elseif ($query->flag_blok==3 && $query->flag_param_formulir==1 && $query->flag_param_parpol==1 ) {
					
						$sql .= " and   id_kantor_perwakilan='".$this->input->post("id_kantor_perwakilan")."' 
						and id_formulir='".$this->input->post("id_formulir")."' and id_parpol='".$this->input->post("id_parpol")."' ";
					
					}
				
				}
				
				 $sql .= " order by id_dokumen desc";

				
				$query= $this->db->query($sql);		
				foreach($query->result_array() as $row){ 
		?>
                                    
                                   
                                    
										<tr>
											<td><?php echo  $row['path']; ?></td>
											<td><?php echo  $row['ket']; ?></td>
											<!--<td>Edit</td>-->
											<td><a title="" rel="tooltip" class="btn btn-danger" href="<?php echo site_url('bpublik/delete_detail/'.$row['id_dokumen'].'/'.$row['id_menu'].'/'.$tahun);?>" onclick="return confirm('Anda Yakin ingin Menghapus?'); "><i class="icon-delete"></i>Hapus</a></td>
										</tr>
                                        
                                         <?php } ?>
                                        
                                        
                                        
									</tbody>
								</table>
				  </div>
						</div>
               

                
                
                
                
				</form>
			</div>       
		</div>
	</div>
</div>


<script>
$(document).ready(function(){



  $("#id_provinsi").change(function(){
    var id_provinsi = $("#id_provinsi").val();
    $.ajax({
        url: "<?php echo site_url();?>bpublik/getSub/"+id_provinsi,
        //data: "id_kategori="+id_kategori,
        cache: false,
        success: function(msg){
      
            $("#id_kabkot").html(msg);
        }
    });
  });
  
    $("#id_provinsi_dapil").change(function(){
    var id_provinsi_dapil = $("#id_provinsi_dapil").val();
    $.ajax({
        url: "<?php echo site_url();?>bpublik/getSubDapil/"+id_provinsi_dapil,
        //data: "id_kategori="+id_kategori,
        cache: false,
        success: function(msg){
      
            $("#id_dapil").html(msg);
        }
    });
  });
  
  
/*    $("#id_negara").change(function(){
    var id_negara = $("#id_negara").val();
    $.ajax({
        url: "<?php echo site_url();?>bpublik/getSubWakil/"+id_negara,
        //data: "id_kategori="+id_kategori,
        cache: false,
        success: function(msg){
      
            $("#id_kantor_perwakilan").html(msg);
        }
    });
  });*/
  
   <?php if ($this->input->post("submit") && ($this->input->post("flag_blok")==2)) { ?>
    var id_provinsi = $("#id_provinsi").val();
	
	
	
    $.ajax({
        url: "<?php echo site_url();?>bpublik/getSub/"+id_provinsi+"/"+<?php echo $this->input->post("id_kabkot"); ?>,
        cache: false,
        success: function(msg){
      
            $("#id_kabkot").html(msg);
        }
    });
	
	
	<?php } elseif ($this->input->post("submit") && ($this->input->post("flag_blok")==1)) {  ?>
	var id_provinsi_dapil = $("#id_provinsi_dapil").val();
	$.ajax({
        url: "<?php echo site_url();?>dokumentasi/getSubDapil/"+id_provinsi_dapil+"/"+<?php echo $this->input->post("id_dapil"); ?>,
        cache: false,
        success: function(msg){
      
            $("#id_dapil").html(msg);
        }
    });
	 <?php } ?>
 
	
	
	 
 
  
   });
  </script>