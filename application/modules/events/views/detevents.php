<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Events</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
           
            <!--MAIN Content-->
            <div class="col-sm-12 col-md-12">
                
				
				
				<div id="page-main" style="padding:30px;">
                    <section id="blog-detail">
                       <!-- <header><h1>News</h1></header>-->
                        <article class="blog-detail">
                            <header class="blog-detail-header">
                                <h2><?php echo $events['judul'] ?></h2>
                            <span class="glyphicon glyphicon-calendar"></span> Tanggal : <?php echo date_format(date_create($events["tanggal"]),"d M Y");?>
                             &nbsp;&nbsp;&nbsp; 
                            <span class="glyphicon glyphicon-user"></span> Author : <?php echo $events["author"]; ?>
                        </header>
                        
                            <hr>
                            <?php echo $events['keterangan'] ?>
                            
                        </article>
                    </section><!-- /.blog-detail -->

                </div>
				
				
				
				
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->








