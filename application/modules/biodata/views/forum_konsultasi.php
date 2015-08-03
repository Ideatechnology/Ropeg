
<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Forum Konsultasi</li>
    </ol>

</div>




<div id="page-content" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">



<?php include "header.php"; ?>

  <div class="row">
            <!--MAIN Content-->
            <div class="col-md-3">
<h4>Kategori Pertanyaan</h4>
<hr />
<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
  <li> <a href="<?php echo site_url("biodata/forum_konsultasi");?>">Semua Kategori</a>
   </li>
    <?php foreach($kategori as $kategori_row): ?>
      <li >
<?php if($level_user==1): ?>
    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $kategori_row->kategori;?>  <span class="caret pull-right" ></span></a>
<ul class="dropdown-menu pull-right">
      <li><a href="<?php echo site_url("biodata/forum_konsultasi/");?>?kategori=<?php echo $kategori_row->id_kategori_forum;?>&status=belum"><span class="glyphicon glyphicon-search"> Lihat</a></li>
      <li><a href="javascript:void(0)" onclick="edit(<?php echo $kategori_row->id_kategori_forum;?>)"><span class="glyphicon glyphicon-pencil"> Edit</a></li>
      <li><a href="javascript:void(0)" onclick="hapusKategori(<?php echo $kategori_row->id_kategori_forum;?>)"><span class="glyphicon glyphicon-trash"> Hapus</a></li>
    </ul>
     </li>
     <?php else: ?>
   <a href="<?php echo site_url("biodata/forum_konsultasi");?>?kategori=<?php echo $kategori_row->id_kategori_forum;?>"><?php echo $kategori_row->kategori;?></a> </li>
 
   <?php endif; ?>
      <?php endforeach; ?>
      <li>
      <?php if($level_user==1): ?>
        <hr />
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#myModalTambah" class="btn btn-default">Tambah <span class="glyphicon glyphicon-plus"> </span></a></li>
      <?php endif; ?>
    </ul>

</div>

 <div class="col-md-9">

<div class="col-lg-6 pull-right">

<form action="<?php echo site_url("biodata/forum_konsultasi");?>" method="get">
<input type="hidden" name="kategori" value="<?php echo $this->input->get("kategori");?>">
<input type="hidden" name="status" value="<?php echo $this->input->get("status");?>">
  
<div class="input-group">
      <input type="text" name="keyword" class="form-control" value="<?php echo $this->input->get("keyword");?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Cari</button>
      </span>
    </div><!-- /input-group -->
</form>

</div>

<div class="btn-group pull-left">
    <button type="button" class="btn btn-default <?php echo $this->input->get("status")=="belum" || $this->input->get("status")==""?"active":"";?>" onclick="window.location='<?php echo site_url("biodata/forum_konsultasi/");?>?kategori=<?php echo $this->input->get("kategori");?>&status=belum'">Belum di Jawab <span class="badge"><?php echo $jumlah_tidak_jawab;?></span></button>
  <button type="button" class="btn btn-default <?php echo $this->input->get("status")=="sudah"?"active":"";?>" onclick="window.location='<?php echo site_url("biodata/forum_konsultasi/");?>?kategori=<?php echo $this->input->get("kategori");?>&status=sudah'">Sudah di jawab <span class="badge "><?php echo $jumlah_jawab;?></span></button>

<button class="btn btn-default" onclick="window.location='<?php echo site_url("biodata/export_excell/");?>?kategori=<?php echo $this->input->get("kategori");?>&status=sudah'"><span class="glyphicon glyphicon-print"></span> Export Excell</button>
</div>



<br /><br />
<div class="list-group">
     <?php foreach($forum as $forum_row): 
     if($forum_row->akses==0)
      $status="Internal";
     elseif($forum_row->akses==1)
     $status="External";
     else
      $status="Publik";

 //   $bacajawab = $this->db->query("select * from tb_")->row();


     ?>
      <a href="javascript:void(0)" onclick="lihat(<?php echo $forum_row->id_forum;?>)" class="list-group-item ">

        <h6 class="list-group-item-heading pull-right">
  
          Kategori : <?php echo $forum_row->kategori;?> | 
        
          <span class="glyphicon glyphicon-calendar"></span> <?php echo date("d M Y H:i:s",strtotime($forum_row->tanggal_kirim));?>

        </h6>
        <p class="list-group-item-text">
        #<?php echo $forum_row->id_forum;?>
          Pertanyaan Dari : <?php echo $forum_row->name;?></p>
        <span class="label label-info"> Status : <?php echo $status;?></span>  &nbsp; 
        
        <?php if(@$forum_row->status_baca==1): ?>
        <span class="label label-info">Sudah dibaca</span> &nbsp; 
        <?php endif; ?>

        <?php if($forum_row->status_print==1): ?>
        <span class="label label-info">Sudah diprint</span> &nbsp;
        <?php endif; ?>

        <?php if($forum_row->status_kaitannya==1): ?>
        <span class="label label-info">Tidak Ada Kaitannya</span> &nbsp;
        <?php endif; ?>
        <?php if($forum_row->status_ditanyakan==1): ?>
        <span class="label label-info">Sudah ditanyakan</span>
        <?php endif; ?>
       
        <br />
        <p> <?php echo character_limiter($forum_row->pertanyaan,55);?></p>
        
      </a>
    <?php endforeach; ?>


     
    </div>
    <?php echo $this->pagination->create_links();?>
</div>
</div>

                	</div>
                </div>
            </div>
        </div>
 </div>

 <script>

   $('#jawabanLihat2').wysihtml5({
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": true, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "color": true, //Button to change color of font
    "size": 'sm' //Button size like sm, xs etc.
});

function lihat(id){


  $("#id_forum").val(id);
  $('#myModalLihat').modal('show');
  $("#loading").show();

       
  $.ajax({
      type:"POST",
      dataType:"json",
      data:{id_forum:id},
      url:"<?php echo site_url("biodata/lihatforum");?>",
      success:function(response){

          $("#loading").hide();
          $("div#pertanyaanLihat").text(response.pertanyaan);
          $("div#tanggal_kirimLihat").text(response.tanggal_post);
          $("#jawabanLihat2").val(response.jawaban);
          $("div#jawabanLihat").html(response.jawaban);
          $("div#nameLihat2").text(response.namePenanya);
          $("#id_forum").val(response.id_forum);
          $("#link_print").attr("href","<?php echo site_url('biodata/export_word');?>/"+id);



      }
  });



}

function sendJawaban(){

  $("#loading").show();
var jawabanLihat2 = $("#jawabanLihat2").val();

if(jawabanLihat2==""){
  alert("jawaban harus diisi");
  $("#loading").hide();
}else{

$.ajax({
    type:"POST",
    dataType:"json",
    data:$("#send_jawaban").serialize(),
    url:$("#send_jawaban").attr("action"),
    success:function(response){
        $("#loading").hide();
        alert(response.message);

        if(response.success==1){
           location.reload(true);
        }

    } 

});

}


return false;

}

function edit(id){

$("#id_kategori").val(id);
$('#myModalTambah').modal('show');
$("#loading").show();

  $.ajax({
    type:"POST",
    dataType:"json",
    data:{id_kategori:id},
    url:"<?php echo site_url("biodata/editkategori");?>",
    success:function(response){
        $("#loading").hide();
        $("#kategori2").val(response.kategori);

    } 

});    

}

function hapusKategori(id){

if(confirm("Apakah Yakin Akan di Hapus ?")){
    $.ajax({
    type:"POST",
    dataType:"json",
    data:{id_kategori:id},
    url:"<?php echo site_url("biodata/hapuskategori");?>",
    success:function(response){
        $("#loading").hide();
        alert(response.message);

        if(response.success==1){
           window.location = '<?php echo site_url("biodata/forum_konsultasi");?>';
        }

    } 

});    

    }

}

function sendTambahKategori(){

$("#loading").show();
var kategori2 = $("#kategori2").val();

if(kategori2==""){
  alert("Semua form harus diisi");
  $("#loading").hide();
}else{

$.ajax({
    type:"POST",
    dataType:"json",
    data:$("#send_tambah").serialize(),
    url:$("#send_tambah").attr("action"),
    success:function(response){
        $("#loading").hide();
        alert(response.message);

        if(response.success==1){
           window.location = '<?php echo site_url("biodata/forum_konsultasi");?>';
        }

    } 

});

}

return false;

}

 </script>