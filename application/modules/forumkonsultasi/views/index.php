
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
<div class="col-md-3">
         <h4>Kategori Pertanyaan</h4>
         <hr />
<ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
          
  <?php foreach($kategori as $kategori_row): ?>
    <li>
    <a href="<?php echo site_url("forumkonsultasi?kategori=".$kategori_row->id_kategori_forum);?>"><?php echo $kategori_row->kategori;?></a>
     </li>
   <?php endforeach; ?>
   <li><a href="<?php echo site_url("forumkonsultasi");?>">Semua Kategori</a></li>
             
           </ul>


            </div>


            <div class="col-md-9">
                <div id="page-main">

<div class="col-lg-6 pull-right">

<form action="<?php echo site_url("forumkonsultasi");?>" method="get">
<input name="kategori" value="<?php echo $this->input->get("kategori");?>" type="hidden">
  
<div class="input-group">
      <input name="keyword" class="form-control" value="<?php echo $this->input->get("keyword");?>" type="text">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Cari</button>
      </span>
    </div><!-- /input-group -->
</form>

</div>

<br /><br />

<div class="list-group">
          
        <?php if($query): ?>
          <?php $no=1; ?>
          <?php foreach($query as $query_row):
          

           ?>
        <a href="javascript:void(0)" onclick="lihat(12)" class="list-group-item ">

        <h6 class="list-group-item-heading pull-right">
  
          Kategori : <?php echo $query_row->kategori;?>  | 
        
          <span class="glyphicon glyphicon-calendar"></span>  <?php echo date("d M Y H:i:s",strtotime($query_row->tanggal_kirim));?>
        </h6>
        <p class="list-group-item-text">
        #12 Pertanyaan Dari : <?php echo $query_row->name;?></p>
        
         <p><?php echo $query_row->pertanyaan;?></p>
         <p class="text-primary" aria-expanded="true" data-toggle="collapse" href="#collapseExample-<?php echo $query_row->id_forum;?>" style="cursor:pointer">Lihat Jawaban</p>
         <div class="collapse panel-collapse"  id="collapseExample-<?php echo $query_row->id_forum;?>">
          <div class="well">
            <?php echo $query_row->jawaban;?>
          </div>
        </div>
      </a>
      <?php $no++; ?>
         <?php endforeach; ?>
         <?php else: ?> 
          <div class="alert alert-warning">Data tidak di temukan ...</div>
         <?php endif; ?>

     
    </div>



                	</div>
                </div>

            </div>

        </div>
    </div>
