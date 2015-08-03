<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Events</li>
    </ol>

</div>

<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section class="blog-listing" id="blog-listing" style="padding:0px 30px 0px 30px;">


                        <header><h1>Events</h1></header>
                          <hr style="border:solid 1px #FF3300">

   <ul class="media-list">
<?php 
$no=1;
foreach($events as $events_row){ ?>

<li class="media">
<h4 class="media-heading">                  
<a title="<?php echo $events_row['judul']; ?>" 
href="<?php echo site_url(); ?>events/read/<?php echo $events_row['id_events']; ?>">
<?php echo $events_row['judul']; ?>
</a>
</h4>
<span class="glyphicon glyphicon-calendar"></span>  Tanggal : <?php echo $events_row["tanggal"]; ?>
&nbsp;&nbsp;&nbsp;
<span class="glyphicon glyphicon-user"></span> Author : <?php echo $events_row["author"]; ?> 
<br /><br />
<p><?php echo word_limiter(strip_tags($events_row["keterangan"]),50);?></p>
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