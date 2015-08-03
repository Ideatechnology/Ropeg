<div class="col-md-12" style="padding:0">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Galeri</li>
    </ol>

</div>
<?php foreach($news as $news2){ ?>
<div class="col-md-12" >
	  
	  <hr><h4><?php echo $news2['albumphotovideo_name']; ?></h4><hr>
	
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
			<div class="col-md-3">
			<?php if ($row['type']==0) { ?>
			<img src="<?php echo base_url()?>photostorage/albumphotovideo/<?php echo $thumb; ?>" onclick="doView('<?php echo $row['id_albumphotovideo_gallery']; ?>');" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">
			<?php } else { ?>
			<img src="<?php echo base_url()?>assets_frontend/img/bg_video.jpg" onclick="doView('<?php echo $row['id_albumphotovideo_gallery']; ?>');" data-toggle="modal" data-target="#myModal" style="cursor:pointer;">		
			<?php } ?>
			</div>
			<!--<div class="col-md-2" style="background-color:#CC6666">Test</div>
			<div class="col-md-2" style="background-color:#333366">Test</div>
			<div class="col-md-2" style="background-color:#CCFF00">Test</div>
			<div class="col-md-2" style="background-color:#FF66CC">Test</div>
            <div class="col-md-2" style="background-color:#CC6666">Test</div>
			<div class="col-md-2" style="background-color:#333366">Test</div>
			<div class="col-md-2" style="background-color:#CCFF00">Test</div>
			-->
			
	<?php } 
	
	?>
	<?php echo $this->pagination->create_links(); ?>
		
</div><hr>
<?php } 
	
	?>
<div class="col-md-12" style="padding:0">&nbsp;<div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Galeri</h4>
      </div>
      <div class="modal-body" align="center">
        <div id="txtHint"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
function doView(id_albumphotovideo_gallery) {
 

 
    if (id_albumphotovideo_gallery == "") {
       alert("Gambar Tidak Dapat DiTampilkan");
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            } else {
				document.getElementById("txtHint").innerHTML = "Loading....";
			}
        }
	
		xmlhttp.open("POST", "<?php echo site_url(); ?>gallery/doView", true);
	   xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       xmlhttp.send("id_albumphotovideo_gallery="+id_albumphotovideo_gallery);
	
    }
}

</script>	
 
