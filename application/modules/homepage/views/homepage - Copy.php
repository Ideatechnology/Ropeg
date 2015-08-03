	
		<style>
		
		.list_paper {
    font-family: Arial;
    font-size: 12px;
    list-style: outside none none;
    margin: 0;
    padding: 0 3px 5px;
}
.list_paper li {
border-bottom: 1px dotted #ccc1a4;
padding: 5px 0;
}

.list_paper li span.name {
    color: #fa8200;
}

.list_paper li h6 a {
    color: #654d0f;
    display: block;
    font: bold 12px CartoGothic,arial,Georgia,"Times New Roman",Times,serif;
}

		
        /* tab color */
.nav-tabs>li>a {
  background-color: #333333; 
  border-color: #777777;
  color:#fff;
}

/* active tab color */
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
  color: #fff;
  background-color: #666;
  border: 1px solid #888888;
}

/* hover tab color */
.nav-tabs>li>a:hover {
  border-color: #000000;
  background-color: #111111;
}
        
        </style>
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            
			<?php 
			$i=0;
			foreach($slider->result_array() as $row_slider){ 
			if ($i==0) { $class1 = "active";}
			?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $class1; ?>"></li>
            <!-- <li data-target="#myCarousel" data-slide-to="1"></li>-->
            <?php $i++; } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            
			<?php 
			$i=0;
			foreach($slider->result_array() as $row_slider){ 
			if ($i==0) { $class2 = "item active";} else { $class2="item"; }
			?>
			<div class="<?php echo $class2; ?>">
                <div class="fill" style="background-image:url(<?php echo base_url()?>uploads/slider/<?php echo $row_slider['file_foto']; ?>);"></div>
                <div class="carousel-caption">
                    <!--<h2>Caption 1</h2>-->
                </div>
            </div>
            <?php $i++; } ?>
			
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        
		
		<br>
		<div class="row">
            <div class="col-md-3 img-portfolio">
            <div style="background-color:#FF9900; color:#FFFFFF; text-align:center; font-weight:bold; padding:5px;">BERITA KESEHATAN</div>
                
				 <?php if ($sql_berita_kes->num_rows() > 0) { $row_berita_kes = $sql_berita_kes->row(); 
				 
				 $linksArray=explode('.', $row_berita_kes->file_foto);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumb = $data[0]."_thumb.".$data[1];	
								}else{
							$thumb ='';	
				}
				 
				 ?>
				<a href="<?php echo site_url();?>berita_kesehatan/detil/<?php echo $row_berita_kes->id_news; ?>">
                    <img alt="" src="<?php echo base_url()?>uploads/news/<?php echo $thumb; ?>" class="img-responsive img-hover">
                </a>
                <h5>
                   <span style="color:#FF9900; font-weight:bold;"><?php echo $row_berita_kes->news_title; ?></span>
                </h5>
                <p align="justify">
				<span style="color:#999999; font-size:9px;"><?php echo $row_berita_kes->create_time; ?></span>
				<?php echo substr($row_berita_kes->news_desc,0,200); ?>...</p>
				<a class="btn btn-warning " href="<?php echo site_url();?>berita_kesehatan/detil/<?php echo $row_berita_kes->id_news; ?>" role="button" >Selengkapnya</a>
				
				<?php } ?>
				
				
            </div>
            <div class="col-md-3 img-portfolio">
            <div style="background-color:#FF9900; color:#FFFFFF; text-align:center; font-weight:bold; padding:5px;">BERITA FARMASI</div>
               
			    <?php if ($sql_berita_farmasi->num_rows() > 0) { $row_berita_farmasi = $sql_berita_farmasi->row();
				
				$linksArray=explode('.', $row_berita_farmasi->file_foto);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumb = $data[0]."_thumb.".$data[1];	
								}else{
							$thumb ='';	
				}

				?>
				<a href="<?php echo site_url();?>berita_farmasi/detil/<?php echo $row_berita_farmasi->id_news; ?>">
                    <img alt="" src="<?php echo base_url()?>uploads/news/<?php echo $thumb; ?>" class="img-responsive img-hover">
                </a>
                <h5>
                   <span style="color:#FF9900; font-weight:bold;"><?php echo $row_berita_farmasi->news_title; ?></span>
                </h5>
                <p align="justify">
				<span style="color:#999999; font-size:9px;"><?php echo $row_berita_farmasi->create_time; ?></span>
				<?php echo substr($row_berita_farmasi->news_desc,0,200); ?>...</p>
				<a class="btn btn-warning " href="<?php echo site_url();?>berita_farmasi/detil/<?php echo $row_berita_farmasi->id_news; ?>" role="button" >Selengkapnya</a>
				
				<?php } ?>
			   
            </div>
			
			<div class="col-md-3 img-portfolio">
            <div style="background-color:#FF9900; color:#FFFFFF; text-align:center; font-weight:bold; padding:5px;">HEALTH TRAVEL</div>
            
			     <?php if ($sql_berita_travel->num_rows() > 0) { $row_berita_travel = $sql_berita_travel->row();

						$linksArray=explode('.', $row_berita_travel->file_foto);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumb = $data[0]."_thumb.".$data[1];	
								}else{
							$thumb ='';	
				}
				
				 ?>
				<a href="<?php echo site_url();?>health_travel/detil/<?php echo $row_berita_travel->id_news; ?>">
                    <img alt="" src="<?php echo base_url()?>uploads/news/<?php echo $thumb; ?>" class="img-responsive img-hover">
                </a>
                <h5>
                   <span style="color:#FF9900; font-weight:bold;"><?php echo $row_berita_travel->news_title; ?></span>
                </h5>
                <p align="justify">
				<span style="color:#999999; font-size:9px;"><?php echo $row_berita_travel->create_time; ?></span>
				<?php echo substr($row_berita_travel->news_desc,0,200); ?>...</p>
				<a class="btn btn-warning " href="<?php echo site_url();?>health_travel/detil/<?php echo $row_berita_travel->id_news; ?>" role="button" >Selengkapnya</a>
				
				<?php } ?>
			
            </div>
			
            <div class="col-md-3 img-portfolio">
            <div style="background-color:#FF9900; color:#FFFFFF; text-align:center; font-weight:bold; padding:5px;">TIPS KESEHATAN</div>
             
			    <?php if ($sql_berita_tips->num_rows() > 0) { $row_berita_tips = $sql_berita_tips->row(); 
				$linksArray=explode('.', $row_berita_tips->file_foto);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumb = $data[0]."_thumb.".$data[1];	
								}else{
							$thumb ='';	
				}
				?>
				<a href="<?php echo site_url();?>tips_kesehatan/detil/<?php echo $row_berita_tips->id_news; ?>">
                    <img alt="" src="<?php echo base_url()?>uploads/news/<?php echo $thumb; ?>" class="img-responsive img-hover">
                </a>
                <h5>
                   <span style="color:#FF9900; font-weight:bold;"><?php echo $row_berita_tips->news_title; ?></span>
                </h5>
                <p align="justify">
				<span style="color:#999999; font-size:9px;"><?php echo $row_berita_tips->create_time; ?></span>
				<?php echo substr($row_berita_tips->news_desc,0,200); ?>...</p>
				<a class="btn btn-warning " href="<?php echo site_url();?>tips_kesehatan/detil/<?php echo $row_berita_tips->id_news; ?>" role="button" >Selengkapnya</a>
				
				<?php } ?>
					
					
                
            </div>
            
			
        </div>
		
		
		<div class="row">
		
		<div class="col-md-4">
		
		<span style="color:#FF9900; font-weight:bold; font-size:14px;">AGENDA</span>
        <div style=" background-color:#ecd492;border-top:solid #FF9900 5px; padding:2px;">
		
		<?php if ($sql_agenda->num_rows() > 0) { $row_agenda = $sql_agenda->row(); 
		$linksArray=explode('.', $row_agenda->file_foto);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumb = $data[0]."_thumb.".$data[1];	
								}else{
							$thumb ='';	
				}
		?>
		
		<img alt="" src="<?php echo base_url()?>uploads/promo/<?php echo $thumb; ?>" class="img-responsive img-hover"><br>
		 <p align="center"><strong><?php echo $row_agenda->promo_name; ?></strong>
		 </p>
		 <div align="center">
		 <a href="<?php echo site_url(); ?>registrasiseminar/detil/<?php echo $row_agenda->id_promo; ?>" class="btn btn-warning">Registrasi</a> 
		 </div>
		 
		 <?php } ?>
		 
		 <br>
		 
		
		</div>
		
		</div>
		
		<div class="col-md-4">
		
		<span style="color:#FF9900; font-weight:bold; font-size:14px;">KONSULTASI</span>
        <div style=" background-color:#ecd492;border-top:solid #FF9900 5px; padding:2px;">
		
		<ul class="list_paper">  
		
		<?php 
			
			foreach($konsultasi->result_array() as $row_konsultasix){ 
			
			?>
		
     <li>
         
         <h6>
		 <span class="name">Dari : <?php echo $row_konsultasix['nama_member']; ?>  </span>
		 <a href="<?php echo site_url(); ?>konsultasi_kesehatan/detil/<?php echo $row_konsultasix['id_konsultasi']; ?>"><?php echo $row_konsultasix['subjek_pertanyaan']; ?> </a>
		 </h6>  
    </li>
       <?php } ?>
         
         
       </ul>
               <div align="center"><a href="<?php echo site_url(); ?>konsultasi/kirim/" class="btn btn-warning">Kirim konsultasi</a></div><br>	
		
		</div>
		
		</div>
		
		
		<div class="col-md-4">
		
		<span style="color:#FF9900; font-weight:bold; font-size:14px;">INFORMASI OBAT</span>
        <div style=" background-color:#ecd492;border-top:solid #FF9900 5px; padding:20px;">
		
		<form name="myForm" action="<?php echo site_url();?>obat/pencarian_obat" onsubmit="return validateForm()" method="post" class="form-horizontal">
		 <div class="form-group">
  <label for="id_obat_kategori">Kategori Obat :</label>
  <select class="form-control" name="id_obat_kategori" id="id_obat_kategori">
                                              <option value="">-Pilih-</option>
                                              <?php 
											  $q2=$this->db->query("select * from ref_obat_kategori order by obat_kategori asc");
											  foreach($q2->result() as $rq2){
											  ?>
                                              <option value="<?php echo $rq2->id_obat_kategori; ?>"><?php echo $rq2->obat_kategori; ?></option>
                                              <?php } ?>
                                              
                                            </select>
</div>

 <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Obat:</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo  $this->input->post('nama_obat'); ?>" >
                        </div>
                    </div>
					
					<div class="control-group form-group">
					<div class="controls">
                    <div align="center"><button type="submit" class="btn btn-warning">  Cari  </button></div>
					</div>
					</div>
		</form>
		
       
		
		</div>
		
		</div>
		
		
		
		
		
		
		
		</div>
		
		
		
		
		<br>
	
		
		<div class="row">
            
           
		   <div class="col-lg-8">
		   
		   

                <ul class="nav nav-tabs nav-justified" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#service-one"><i class="fa fa-download"></i> <strong>Undang-Undang & Peraturan</strong></a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#service-two"><i class="fa fa-download"></i> <strong>Textbook</strong></a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#service-three"><i class="fa fa-download"></i> <strong>Naskah Lainnya</strong></a>
                    </li>
                   
                </ul>

                <div class="tab-content" id="myTabContent"><div style="border-top:solid #FF9900 5px; padding:2px;"></div>
                    <div id="service-one" class="tab-pane fade active in">
                       
					   <ul class="list_paper">  
   <?php 
			
			foreach($sql_uu->result_array() as $row_uu){ 
			
			?>
   <li> 
	<h6>
	<span class="name"><?php echo $row_uu['create_time1']; ?></span>
	<a href="<?php echo site_url(); ?>undang_undang/detil/<?php echo $row_uu['id_docs']; ?>"> <?php echo $row_uu['docs_title']; ?>	</a>
	</h6>  
    </li>
   <?php } ?>
         
         
       </ul>
					   
                    </div>
                    <div id="service-two" class="tab-pane fade">
                         
						 
						 <ul class="list_paper">  
   <?php 
			
			foreach($sql_tb->result_array() as $row_tb){ 
			
			?>
   <li> 
	<h6>
	<span class="name"><?php echo $row_tb['create_time1']; ?></span>
	<a href="<?php echo site_url(); ?>textbook/detil/<?php echo $row_tb['id_docs']; ?>"> <?php echo $row_tb['docs_title']; ?>	</a>
	</h6>  
    </li>
   <?php } ?>
         
         
       </ul>
						 
						 
						 
                    </div>
                    <div id="service-three" class="tab-pane fade">
                         <ul class="list_paper">  
   <?php 
			
			foreach($sql_naskah->result_array() as $row_naskah){ 
			
			?>
   <li> 
	<h6>
	<span class="name"><?php echo $row_naskah['create_time1']; ?></span>
	<a href="<?php echo site_url(); ?>naskah/detil/<?php echo $row_naskah['id_docs']; ?>"> <?php echo $row_naskah['docs_title']; ?>	</a>
	</h6>  
    </li>
   <?php } ?>
         
         
       </ul>
                    </div>
                    
                </div>

            </div>
			
			
			<div class="col-md-4">
		
       
		
		<ul class="nav nav-tabs nav-justified" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#service-x"><i class="fa fa-download"></i> <strong>Buletin</strong></a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#service-y"><i class="fa fa-download"></i> <strong>Jurnal Ilmiah</strong></a>
                    </li>
                    
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div id="service-x" class="tab-pane fade active in">
                        <ul class="list_paper">  
   <?php 
			
			foreach($sql_bulletin->result_array() as $row_bulletin){ 
			
			?>
   <li> 
	<h6>
	<span class="name"><?php echo $row_bulletin['create_time1']; ?></span>
	<a href="<?php echo site_url(); ?>bulletin/detil/<?php echo $row_bulletin['id_docs']; ?>"> <?php echo $row_bulletin['docs_title']; ?>	</a>
	</h6>  
    </li>
   <?php } ?>
         
         
       </ul>
                    </div>
                    <div id="service-y" class="tab-pane fade">
                         <ul class="list_paper">  
                <li>
         
         <ul class="list_paper">  
   <?php 
			
			foreach($sql_ilmiah->result_array() as $row_ilmiah){ 
			
			?>
   <li> 
	<h6>
	<span class="name"><?php echo $row_ilmiah['create_time1']; ?></span>
	<a href="<?php echo site_url(); ?>ilmiah/detil/<?php echo $row_ilmiah['id_docs']; ?>"> <?php echo $row_ilmiah['docs_title']; ?>	</a>
	</h6>  
    </li>
   <?php } ?>
         
         
       </ul>
                    </div>
                    
                    
                </div>	
		
		</div>
			
			
			
			
		</div>
		
		<div class="row">
		
		<div class="col-md-4">
                
            </div>
		
		</div>