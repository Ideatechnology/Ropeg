<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dokumen Pemilu - KPU </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets_frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets_frontend/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets_frontend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	 <script src="<?php echo base_url()?>assets_frontend/js/jquery.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.dropdown-submenu {
    position: relative;

}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<?php 
/*

function listCategory($parent_id,$level=0) {



    $query = "SELECT id_menu,nama_menu,id_parrent,url_module,url_posts,url_kategori,url_blank,url_pages,ename_menu,flagsub,url_link FROM bit_tb_menu  WHERE status_tampil=0 and id_parrent=".$parent_id;
    $res = mysql_query($query) or die($query);
    if(mysql_num_rows($res) == 0) return;
    
	echo '<ul>';
	while (list ($id_menu,$nama_menu,$id_parrent,$url_module,$url_posts,$url_kategori,$url_blank,$url_pages,$ename_menu,$flagsub,$url_link) = mysql_fetch_row($res))
    {   
        if ($level==0)
        { ?>
          <li>
		  
		  <?php 
		  echo  $nama_menu;
		  ?>
		  
		  
        <?php }
			
        else
        { ?>
          <li>
          
                   
          <?php 
		
		  
		   echo $nama_menu;
		  
		  
		  ?>
          
          
          
          
          </a>
       <?php }
        listCategory($id_menu,$level+1);
        echo '</li>';
    }
   echo '</ul>';
}
*/
?>
<?php #echo listCategory(0); ?>

 
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!--<div style="background-color:#FFFFFF">xx</div>-->
	 
     
        <div class="container">
        
      
        
            <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>homepage">Dokumen Pemilu</a>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
				
				
				
				<ul class="nav navbar-nav navbar-left" style="font-size:13px;">
                   
					<?php
						make_member();
					?>
					
				
				
                   
				    <li>
                        
						<form action="<?php echo site_url('searching');?>" name="searching" role="search" class="navbar-form" method="get">
        <input type="hidden" name="cx" value="000343848259396136985:sprprt8bkog" />
        
        <div class="input-group">
            <input type="text" style="padding:6px 6px;width:135px;" name="q" placeholder="Search...." class="form-control">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
  
						
                    </li>
                    
                    
                </ul>
				
				
							
				
				
            </div>
            <!-- /.navbar-collapse -->
            
            
          
            
            
        </div>
        <!-- /.container -->
          
         <div style="background-color:#FF9900; color:#FFFFFF; text-align:center;">
	<marquee>
	 <?php 
											  $q2=$this->db->query("select * from running_text where publish='Y' order by id_running_text asc limit 3");
											  foreach($q2->result() as $rq2){
											  
											  echo $rq2->running_text_desc." # ";
											  ?>
											  
											  <?php } ?>
											  
	
	</marquee>
	</div>
    </nav>


<?php
					ini_set('memory_limit', '512M');
					echo $contents;
				?>
                            