<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active"><?php echo $kategori->news_category;?></li>
    </ol>

</div>

<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section class="blog-listing" id="blog-listing" style="padding:0px 30px 0px 30px;">


                        <header><h1><?php echo $kategori->news_category;?></h1></header>
                          <hr style="border:solid 1px #FF3300">

                           <?php 
                           $no=1;
                           foreach($news as $news2){ ?>
                    <?php $linksArray=explode('.', $news2['file_foto']);
                            $data= array_filter($linksArray);
                            if(!empty($data)){
                            $thumb = $data[0]."_thumb.".$data[1];   
                                }else{
                            $thumb =''; 
                }?>

<?php if($no==1): ?>
                          <h4>
<a href="<?php echo site_url(); ?>news/read/<?php echo $news2['id_news']; ?>-<?php echo str_replace(" ","-",$news2['news_name']); ?>">
<?php echo $news2['news_name']; ?>
</a>
</h4>
 <p style="color:#999999">
<span class="course-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $news2['create_time']; ?></span>
                                            <span class="category">&nbsp;<i class="fa fa-bookmark-o"></i>&nbsp; <?php echo $news2['news_category']; ?></span>
</p>

<a class="pull-left" href="<?php echo site_url(); ?>news/read/<?php echo $news2['id_news']; ?>-<?php echo str_replace(" ","-",$news2['news_name']); ?>">
<img src="<?php echo base_url()?>photostorage/news/<?php echo $thumb; ?>" style="width:200px;margin:10px;" class="img-thumbnail" alt=""></a>

<?php echo substr($news2['news_desc'],0,300); ?>...

 <a href="<?php echo site_url(); ?>news/read/<?php echo $news2['id_news']; ?>-<?php echo str_replace(" ","-",$news2['news_name']); ?>">Selengkapnya</a>
 <div style="clear:both"></div>

<h4>Post Lainnya</h4>

<hr style="border:solid 1px #FF3300">
<ul class="media-list">
<?php else: ?>

 <li class="media">
<!--  untuk image -->
<a class="pull-left" href="<?php echo site_url(); ?>news/read/<?php echo $news2['id_news']; ?>-<?php echo str_replace(" ","-",$news2['news_name']); ?>">
<img src="<?php echo base_url()?>photostorage/news/<?php echo $thumb; ?>" style="width:200px;" class="img-thumbnail" alt=""></a>
<div class="media-body">
<h4 class="media-heading"><a title="<?php echo $news2['news_name']; ?>" href="<?php echo site_url(); ?>news/read/<?php echo $news2['id_news']; ?>-<?php echo str_replace(" ","-",$news2['news_name']); ?>">
<?php echo $news2['news_name']; ?>
</a>
</h4>
<span class="course-date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $news2['create_time']; ?></span>
<span class="category">&nbsp;<i class="fa fa-bookmark-o"></i>&nbsp; <?php echo $news2['news_category']; ?></span><br>
<p><?php echo substr($news2['news_desc'],0,100); ?>...</p>
</div>
</li>

<?php endif; ?>


 <?php if($news2===end($news)): ?>

</ul>
<?php endif; ?>

<?php 
$no++;
} ?>


    
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