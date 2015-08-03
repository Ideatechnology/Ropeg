
<style>

.navbar-default .navbar-nav > li > a {
    color: #777;
    border-right: 1px solid #EDEAEA;
     border-left: 0px solid #EDEAEA;
}
/*
.navbar-default .navbar-nav > li > a:first-child {
    color: #777;
    border-left: 1px solid #EDEAEA;
}*/
.navbar {
    border-radius: 0px;
}
.container .jumbotron, .container-fluid .jumbotron {
    border-radius: 0px;
}
</style>
   <script src="<?php echo base_url();?>assets_frontend/bootstrap3-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/bootstrap3-wysihtml5/src/bootstrap-wysihtml5.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/bootstrap3-wysihtml5/lib/css/bootstrap3-wysiwyg5-color.css">

<script src="<?php echo base_url();?>assets_frontend/bootstrap3-wysihtml5/src/bootstrap3-wysihtml5.js"></script>

<script>
   $(document).ready(function() {

});
</script>
<nav class="navbar navbar-default" role="navigation">


   
<div class="jumbotron" style="margin-bottom:0px">

  <a href="" style="position:absolute;left:200px;font-size:25px;"><?php echo $nama_user;?></a>


<!--
 <img src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/" style="width:130px;height:130px;position:absolute;left:30px;top:4px;" alt="" class="img-thumbnail">
 -->

 <img src="http://ropeg.setjen.kemendagri.go.id/misekdn2012/data/employee/<?php echo $this->biodata_model->getFoto();?>" style="width:130px;height:130px;position:absolute;left:30px;top:4px;" alt="" class="img-thumbnail">


<div class="btn-group" style="position:absolute;right:10px;">
   <?php if($level_user!=1): ?>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-send"></span> Kirim Pesan</button>
  <?php endif; ?>
  <!--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">...</button>-->
  <a href="<?php echo site_url("biodata/logout");?>" class="btn btn-default"><span class="glyphicon glyphicon-off"></span> Keluar</a>
 <!--<ul class="dropdown-menu">
      <li><a href="#">Ganti Password</a></li>
      <li><a href="<?php echo site_url("biodata/logout");?>">Keluar</a></li>
    </ul>
-->
</div>


</div>


  <div class="container-fluid">

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="margin-left:170px;">
         <li <?php echo $this->uri->segment("2")=="dataprofile"?'class="active"':'';?>><a href="<?php echo site_url("biodata/dataprofile");?>">Profil</a></li>
       <li <?php echo $this->uri->segment("2")=="pangkat"?'class="active"':'';?>><a href="<?php echo site_url("biodata/pangkat");?>">Pangkat</a></li>
       <li <?php echo $this->uri->segment("2")=="jabatan"?'class="active"':'';?>><a href="<?php echo site_url("biodata/jabatan");?>">Jabatan</a></li>
        <li <?php echo $this->uri->segment("2")=="pendidikan"?'class="active"':'';?>><a href="<?php echo site_url("biodata/pendidikan");?>">Pendidikan</a></li>
         <li <?php echo $this->uri->segment("2")=="penataran"?'class="active"':'';?>><a href="<?php echo site_url("biodata/penataran");?>">Penataran</a></li>
         <li <?php echo $this->uri->segment("2")=="penghargaan"?'class="active"':'';?>><a href="<?php echo site_url("biodata/penghargaan");?>">Penghargaan</a></li>
          <li <?php echo $this->uri->segment("2")=="penugasan"?'class="active"':'';?>><a href="<?php echo site_url("biodata/penugasan");?>">Penugasan</a></li>
           <li <?php echo $this->uri->segment("2")=="keluarga"?'class="active"':'';?>><a href="<?php echo site_url("biodata/keluarga");?>">Keluarga</a></li>
       <li <?php echo $this->uri->segment("2")=="forum_konsultasi"?'class="active"':'';?>><a href="<?php echo site_url("biodata/forum_konsultasi");?>"><span class="glyphicon glyphicon-comment"></span> Forum Konsultasi</a></li>
       
      </ul>
     
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <form role="form" id="send_forum" onsubmit="return send()" action="<?php echo site_url("biodata/send_forum");?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Kirim Pertanyaan Anda</h4>
      </div>
      <div class="modal-body">
       

  <div class="form-group">
    <label for="exampleInputEmail1">Kategori *</label>
   <select name="kategori" id="kategori" class="form-control">
      <option value="">--Pilih Kategori--</option>
     <?php 
     $q= $this->db->query("select * from tb_kategori_forum")->result();
     foreach($q as $q_row):
     ?>
      <option value="<?php echo $q_row->id_kategori_forum;?>"><?php echo $q_row->kategori;?></option>
     <?php endforeach; ?>
   </select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" >Akses *</label>
    <select name="akses" id="akses" class="form-control" required="required">
      <option value="">--Pilih--</option>
      <option value="0">Internal</option>
      <option value="1">External</option>
      <option value="2">Public</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Pertanyaan *</label>
    <textarea class="form-control" id="pertanyaan" name="pertanyaan"></textarea>
  </div>
  <div id="loading" style="display:none">Loading..</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>





<div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <form role="form" id="send_tambah" onsubmit="return sendTambahKategori()" action="<?php echo site_url("biodata/tambahkategori");?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Kelola Kategori</h4>
      </div>
      <div class="modal-body">
       
  <div class="form-group">
    <label for="exampleInputPassword1" >Kategori *</label>
    <input type="hidden" id="id_kategori" name="id_kategori" />
    <input type="text" class="form-control" id="kategori2" name="kategori2" />
  </div>
  <div id="loading" style="display:none">Loading..</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
       
         <?php if($level_user==1): ?>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php endif; ?>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModalLihat" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <form role="form" id="send_jawaban" enctype="multipart/form-data" onsubmit="return sendJawaban()" action="<?php echo site_url("biodata/sendjawaban");?>">
      <div class="modal-header">
         <h4 class="modal-title" id="myModalLabel">Jawaban Pertanyaan</h4>
      </div>
      <div class="modal-body">
       <input type="hidden" id="id_forum" name="id_forum">
          <table class="table table-bordered">
            <tr><td style='width:100px;'>Penanya </td><td><div id="nameLihat2">sd</div></td></tr>
            <tr><td style='width:100px;'>Pertanyaan </td><td><div id="pertanyaanLihat"></div></td></tr>
              <tr><td style='width:100px;'>Tanggal </td><td><div id="tanggal_kirimLihat"></div></td></tr>
            <tr><td style='width:100px;'>Jawaban </td><td>
              <div id="jawabanLihat"></div>
            </td></tr>
             <?php if($level_user==1): ?>
            <tr><td></td>
              <td><textarea id="jawabanLihat2" class="form-control" name="jawabanLihat2"></textarea>
                  <input type="file" name="file_upload">
          </td>
            </tr>
            <tr>
              <td>Penandaan Pertanyaan </td>
              <td><input type="checkbox" value="1" name="kaitannya"> Pertanyaan Tidak ada kaitanyya 
                  <input type="checkbox" value="1" name="ditanyakan"> Pertanyaan Sudah Ditanyakan </td>
            </tr>  
          <?php endif; ?>

            </table> 


  <div id="loading" style="display:none">Loading..</div>
      </div>
      <div class="modal-footer">
        <a href="#" id="link_print" class="btn btn-primary">Print</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <?php if($level_user==1): ?>
        <button type="submit" class="btn btn-primary">Balas</button>
         <?php endif; ?>
      </div>
      </form>
    </div>
  </div>
</div>



<script>

function send(){

$("#loading").show();
var pertanyaan = $("#pertanyaan").val(); 
var kategori = $("#kategori").val();
var akses = $("#akses").val();

if(pertanyaan=="" && kategori=="" && akses==""){
  alert("Semua form harus diisi");
  $("#loading").hide();
}else{

$.ajax({
    type:"POST",
    dataType:"json",
    data:$("#send_forum").serialize(),
    url:$("#send_forum").attr("action"),
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