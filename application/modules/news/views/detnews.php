<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Berita</li>
    </ol>

</div>


<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--SIDEBAR Content-->
            <div class="col-sm-4 col-md-4">
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <div class="section-content">
                            <img class="img-responsive" src="<?php echo base_url()?>photostorage/news/<?php echo $detnews['file_foto'] ?>">
                        </div><!-- /.section-content -->
                    </aside><!-- /.news-small -->
                </div><!-- /#sidebar -->
            </div><!-- /.col-md-4 -->
            <!--MAIN Content-->
            <div class="col-sm-8 col-md-8">
                
				
				
				<div id="page-main">
                    <section id="blog-detail">
                       <!-- <header><h1>News</h1></header>-->
                        <article class="blog-detail">
                            <header class="blog-detail-header">
                                <h2><?php echo $detnews['news_name'] ?></h2>
                            </header>
                            <hr>
                            <?php echo $detnews['news_desc'] ?>
                            <footer>
                                <section id="share-post">
                                    <div class="icons">
                                        <span>Share:</span>
                                        <a href="#" onclick="popUp=window.open('https://twitter.com/share', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false;"><i class="fa fa-twitter"></i></a>
                                        <a href="#"  onclick="popUp=window.open('https://plus.google.com/share', 'popupwindow', 'scrollbars=yes,width=800,height=400');popUp.focus();return false"><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-pinterest"></i></a>
                                        <a href=""><i class="fa fa-youtube-play"></i></a>
                                    </div><!-- /.icons -->
                                </section><!-- /share -->
                                <hr>
                            </footer>
                        </article>
                    </section><!-- /.blog-detail -->

                </div>
				
				
				
				
            </div><!-- /.col-md-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->








