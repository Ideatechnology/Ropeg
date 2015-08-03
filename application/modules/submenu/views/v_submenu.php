 <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $field['nama_menu']?>
                    <small></small>
                </h1>
				<!----
                <ol class="breadcrumb">
                    <li><a href="#">Beranda</a>
                    </li>
                    <li class="active">Berita </li>
                </ol>
				------>
            </div>
        </div>
        <!-- /.row -->

        
		
	 <!-- Content Row -->
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">


                <!-- Date/Time -->
                <p><i class="fa fa-clock-o"></i> Posted on <?php echo $field['tgl_entry']; ?></p>


                <hr>




<?php 
if($field['file']!=""):
$linksArray=explode('.', $field['file']);
							$data= array_filter($linksArray);
							if(!empty($data)){
							$thumbgallery = $data[0]."_thumb.".$data[1];	
							}else{
							$thumbgallery ='';	
							}

?>
                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo base_url()?>uploads/<?php echo $thumbgallery;?>" alt="">

                <hr>
            <?php endif; ?>

                <!-- Post Content -->
                <?php echo $field['description'] ?>
                <hr>

             

            </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>