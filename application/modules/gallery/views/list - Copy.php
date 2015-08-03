<div class="col-md-12" style="padding:0">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Galeri</li>
    </ol>

</div>
<div class="col-md-12">
    <div class="container">
    <?php foreach($news as $news2){ ?>
	  <h4><?php echo $news2['albumphotovideo_name']; ?></h4>
    <div class="row">
      
	  
	  <?php 
								$sql = "select  * from albumphotovideo_gallery where id_albumphotovideo= '".$news2['id_albumphotovideo']."'";
								$query= $this->db->query($sql);
								foreach($query->result_array() as $row){ 
								$linksArray=explode('.', $row['file_foto']);
								$data= array_filter($linksArray);
								if(!empty($data)){
								$thumb = $data[0]."_thumb.".$data[1];	
								}else{
								$thumb ='';	
								}
								?>
								
								<div class="col-lg-3 col-sm-4 col-xs-6">
								<a title="<?php echo  $row['albumphotovideo_gallery_name']; ?>" href="#">
								<img class="thumbnail img-responsive" src="<?php echo base_url()?>photostorage/albumphotovideo/<?php echo $thumb; ?>">
								</a>
								</div>
								<?php } ?>
	  
     
     <!-- <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/777"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/EEE"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 11" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/DDD"></a></div>
      <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>-->
     
	
	</div><hr>
	<?php 
						}
						?>
	<?php echo $this->pagination->create_links(); ?>
  </div>
    </div> 

<div class="modal" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">x</button>
		<h3 class="modal-title">Judul</h3>
	</div>
	<div class="modal-body">
		<div id="modalCarousel" class="carousel">
          <div class="carousel-inner"></div>
          <a class="carousel-control left" href="#modaCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
   </div>
  </div>
</div>

<style>
.modal-dialog {}
.thumbnail {margin-bottom:6px;}

.carousel-control.left,.carousel-control.right{
  background-image:none;
}
</style>
<script>
/* copy loaded thumbnails into carousel */
$('.row .thumbnail').on('load', function() {
  
}).each(function(i) {
  if(this.complete) {
  	var item = $('<div class="item"></div>');
    var itemDiv = $(this).parents('div');
    var title = $(this).parent('a').attr("title");
    
    item.attr("title",title);
  	$(itemDiv.html()).appendTo(item);
  	item.appendTo('.carousel-inner'); 
    if (i==0){ // set first item active
     item.addClass('active');
    }
  }
});

/* activate the carousel */
$('#modalCarousel').carousel({interval:false});

/* change modal title when slide changes */
$('#modalCarousel').on('slid.bs.carousel', function () {
  $('.modal-title').html($(this).find('.active').attr("title"));
})

/* when clicking a thumbnail */
$('.row .thumbnail').click(function(){
    var idx = $(this).parents('div').index();
  	var id = parseInt(idx);
	alert(id);
  	$('#myModal').modal('show'); // show the modal
    $('#modalCarousel').carousel(id); // slide carousel to selected
  	
});

</script>


