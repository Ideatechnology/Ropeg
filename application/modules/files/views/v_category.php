<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active"><?php echo $kategori->kategori_file;?></li>
    </ol>

</div>

<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section class="blog-listing" id="blog-listing" style="padding:0px 30px 0px 30px;">


                        <header><h1><?php echo $kategori->kategori_file;?></h1></header>
                          <hr style="border:solid 1px #FF3300">
                          <ul class="list-group">
    
                           <?php 
                           $no=1;
                           
 	                          foreach($files as $files2){ ?>

	  <li class="list-group-item">
        <span class="badge" style="cursor:pointer" onclick="window.location='<?php echo base_url();?>filestorage/<?php echo $files2["files_data"];?>'">Download</span>
        <h4><?php echo $files2["judul"];?></h4>
        <p><?php echo $files2["keterangan"];?></p>
      </li>     

							<?php 
							$no++;
										} ?>

					</ul>						
    
                    <?php echo $this->pagination->create_links(); ?>


                    </section><!-- /.blog-listing -->
                    <div class="center">
				
                       <!-- <ul class="pagination">
						
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul> -->
                    </div>
                </div><!-- /#page-main -->
            </div><!-- /.col-md-8 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->