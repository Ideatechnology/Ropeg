<?php if ($field['type']==0) { ?>
<img src="<?php echo base_url()?>photostorage/albumphotovideo/<?php echo $field["file_foto"]; ?>" height="480" width="640">
<?php }  else { ?>
 <iframe width="420" height="315"
src="http://www.youtube.com/embed/XGSy3_Czz8k?autoplay=1">
</iframe> 
<?php } ?>
<hr>
<?php echo $field["albumphotovideo_gallery_name"]; ?>
