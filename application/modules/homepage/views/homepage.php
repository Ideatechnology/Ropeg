

<div class="col-md-12" style="background-color:#0099FF; color:#FFFFFF; padding:0;">
    <marquee>Berita Berjalan </marquee>
    </div>
	
	<div class="col-md-8" style="height:320px; padding:0;">
	
	<?php if($slider): ?>		
	<div id="myCarousel" class="carousel slide" data-ride="carousel"  >
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
		
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			<?php 
			$no_slider =1; 
			foreach($slider as $slider_row):
			?>
			<div class="item <?php echo $no_slider==1?"active":"";?>">
			  <img src="<?php echo base_url()?>photostorage/slider/<?php echo $slider_row->file_foto;?>" alt="<?php echo $slider_row->slider_name;?>" style="height:320px; width:780px;">
			  <div class="carousel-caption">
				<h3><?php echo $slider_row->slider_name;?></h3>
				<p><?php echo $slider_row->slider_desc;?></p>
			  </div>
			</div>
		<?php $no_slider++; ?>			
		<?php endforeach; ?>

		
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
	<?php endif; ?>
	
    </div>
	
	<!--<div class="col-md-4" style="height:320px; padding:0;" >-->
	
	
    	<div class="col-md-2" id="layanan" style="background-color:#666; height:320px;padding:0px;border:0px solid #fff;overflow:auto">
		<?php if($banner1): ?>
		<?php foreach($banner1 as $banner1_row): ?>
		<a href="<?php echo $banner1_row->banner_link;?>"><img src="<?php echo base_url()?>photostorage/reklame/<?php echo $banner1_row->file_foto;?>" style="width:100%" class="img-responsive"  ></a>
		<?php endforeach; ?>
		<?php endif; ?>
    	</div>

        <div class="col-md-2" style="background-image:url(<?php echo base_url()?>assets_frontend/img/bg_video_f.jpg); background-repeat:no-repeat; height:160px;">
		

		<a href="<?php echo site_url();?>gallery" style="color:#FFFFFF;"><h4>Video</h4></a>
		
		
		</div>
        
		<div class="col-md-2" style="background-color:#666666; height:160px; padding:0;">
		
		
		
		<div id="myCarousel1" class="carousel slide" data-ride="carousel"  >
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			
		  <?php 

		  if($gallery_foto): ?>
			<?php $no_gallery =1; ?>
			<?php foreach($gallery_foto as $gallery_foto_row): ?>
			<?php 
				
			?>
			<div class="item <?php echo $no_gallery==1?"active":"";?>">
			  <img src="<?php echo base_url()?>photostorage/albumphotovideo/<?php echo $gallery_foto_row->file_foto;?>" alt="" style="height:160px;">
			  
			  <div class="carousel-caption">
				
              <a href="<?php echo site_url();?>gallery" style="color:#FFFFFF;"><h3><?php echo $gallery_foto_row->albumphotovideo_gallery_name;?></h3></a>
                
			  </div>
			</div>
			<?php $no_gallery++; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		
		  </div>

		</div>
		
		
		
		</div>

    	
	 
<!--    </div>
-->    
  <!--     <div class="col-md-12" style="background-color:#F8F8F8">
   &nbsp;
    </div>-->
    
    <div class="col-md-12" style="background-color:#018fd7; color:#FFFFFF;">
   <p><div align="center"><h3>Kata Pengantar</h3></div>Assalamu ‘alaikum Warakhmatullahi Wabarakatuh Salam sejahtera bagi kita semua. Segala puji bagi Allah SWT, Tuhan Yang Maha Kuasa atas segala rahmat dan karunia-Nya sehingga Biro Kepegawaian Kementerian Dalam Negeri dapat menyediakan layanan Informasi tentang Pembinaan dan Pengelolaan Administrasi Kepegawaian dilingkungan Kementerian Dalam Negeri dan Pemerintah Daerah. Adapun maksud dan tujuan website ini dibangun guna untuk memudahkan para pejabat pengelola kepegawaian di lingkungan Kementerian Dalam Negeri dan Pemerintah Daerah dalam memperoleh informasi Kepegawaian secara baik dan benar.....
<br><font color="#FFCC00">Drs. MUHAMAD NUR, ME</font></p>
    </div>
    
    <div class="col-md-12" style="background-color:#F8F8F8">
   <h3>Berita</h3>
   <?php
   if($berita): 
   	?>
   <?php foreach($berita as $berita_row): 
   $gambar_berita = explode(".",$berita_row->file_foto);
   ?>
   <div class="col-md-4">
    <img src="<?php echo base_url()?>photostorage/news/<?php echo $gambar_berita[0]."_thumb.".$gambar_berita[1];?>" alt="Chania" class="img-responsive">
<p><?php echo $berita_row->news_name;?></p>      <a class="btn btn-info btn-sm" href="<?php echo site_url(); ?>news/read/<?php echo $berita_row->id_news; ?>-<?php echo str_replace(" ","-",$berita_row->news_name); ?>">selengkapanya</a>
    </div>
<?php endforeach; ?>
<?php endif; ?>
    
    </div>
    
       <div class="col-md-12" style="background-color:#F8F8F8">
   &nbsp;
    </div>
	
     <!--<div class="col-md-4" style="background-color:#0b49a7">
    <h3>Pengumuman</h3>
    </div>
       <div class="col-md-4" style="background-color:#F8F8F8">
    <h3>Agenda</h3>
    </div>
        <div class="col-md-4" style="background-color:#0b49a7">
    <h3>Berita</h3>
    </div>-->
    <?php if($banner2): ?>
    <div class="col-md-12" style="background-color:#CCCCCC">


<div id="demo">
        <div id="owl-demo" class="owl-carousel">
          <?php foreach($banner2 as $banner2_row): ?>
          <div class="item">

          <a href="<?php echo $banner2_row->banner_link;?>" target="_blank">
          <img src="<?php echo base_url()?>photostorage/reklame/<?php echo $banner2_row->file_foto;?>
   " class="img-responsive"  >    
          </a>
          </div>
      <?php endforeach; ?>
        </div>
    </div>


    </div>
<?php endif; ?>
    <div class="row-fluid" style="padding:2px;" >

   </div>




