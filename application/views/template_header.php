<!DOCTYPE html>
<html lang="en">
<head>
  <title>BIRO KEPEGAWAIAN - KEMENDAGRI</title>
  <meta charset="utf-8">
  <meta name="Publisher" content="BIROPEG Kemendagri" />
<meta name="Copyright" content="2015" />
<meta name="Author" content="BIROPEG Kemendagr" />
<meta name="Description" content="BIROPEG Kemendagri" />
<meta name="KEYWORDS" content="biropeg, kepegawaian, kemendagri, statistik pegawai, pensiun, kinerja, pegawai" />  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>assets_frontend/img/favicon.png" >
  <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets_frontend/css/style.css">
  <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets_frontend/js/bootstrap.min.js"></script>
   
       <!-- Owl Carousel Assets -->
<link href="<?php echo base_url()?>assets_frontend/owl_carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets_frontend/owl_carousel/owl-carousel/owl.theme.css" rel="stylesheet"> 
<script src="<?php echo base_url()?>assets_frontend/owl_carousel/owl-carousel/owl.carousel.js"></script>
<link href="<?php echo base_url();?>assets_frontend/scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets_frontend/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>


<style>
    #owl-demo .item{
          margin: 5px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }

.mCSB_inside > .mCSB_container {
    margin-right: 0px;
}


    </style>


    <script>
    $(document).ready(function() {

      var owl = $("#owl-demo");

      owl.owlCarousel({

        navigation : false,
        autoPlay:true

      });



    });


(function($){
      $(window).load(function(){
        
        $("#layanan").mCustomScrollbar({
          autoHideScrollbar:true,
          theme:"rounded"
        });
        
      });
    })(jQuery);

    </script>



</head>

<style>
.navbar-custom {
  background-color: #23334d;
  border-color: #192436;
}
.navbar-custom .navbar-brand {
  color: #ffffff;
}
.navbar-custom .navbar-brand:hover,
.navbar-custom .navbar-brand:focus {
  color: #e6e6e6;
  background-color: transparent;
}
.navbar-custom .navbar-text {
  color: #ffffff;
}
.navbar-custom .navbar-nav > li > a {
  color: #ffffff;
}
.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus {
  color: #bdf6fa;
  background-color: transparent;
}
.navbar-custom .navbar-nav > .active > a,
.navbar-custom .navbar-nav > .active > a:hover,
.navbar-custom .navbar-nav > .active > a:focus {
  color: #bdf6fa;
  background-color: #192436;
}
.navbar-custom .navbar-nav > .disabled > a,
.navbar-custom .navbar-nav > .disabled > a:hover,
.navbar-custom .navbar-nav > .disabled > a:focus {
  color: #cccccc;
  background-color: transparent;
}
.navbar-custom .navbar-toggle {
  border-color: #dddddd;
}
.navbar-custom .navbar-toggle:hover,
.navbar-custom .navbar-toggle:focus {
  background-color: #dddddd;
}
.navbar-custom .navbar-toggle .icon-bar {
  background-color: #cccccc;
}
.navbar-custom .navbar-collapse,
.navbar-custom .navbar-form {
  border-color: #182334;
}
.navbar-custom .navbar-nav > .dropdown > a:hover .caret,
.navbar-custom .navbar-nav > .dropdown > a:focus .caret {
  border-top-color: #bdf6fa;
  border-bottom-color: #bdf6fa;
}
.navbar-custom .navbar-nav > .open > a,
.navbar-custom .navbar-nav > .open > a:hover,
.navbar-custom .navbar-nav > .open > a:focus {
  background-color: #192436;
  color: #bdf6fa;
}
.navbar-custom .navbar-nav > .open > a .caret,
.navbar-custom .navbar-nav > .open > a:hover .caret,
.navbar-custom .navbar-nav > .open > a:focus .caret {
  border-top-color: #bdf6fa;
  border-bottom-color: #bdf6fa;
}
.navbar-custom .navbar-nav > .dropdown > a .caret {
  border-top-color: #ffffff;
  border-bottom-color: #ffffff;
}
@media (max-width: 767) {
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a {
    color: #ffffff;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #bdf6fa;
    background-color: transparent;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #bdf6fa;
    background-color: #192436;
  }
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #cccccc;
    background-color: transparent;
  }
}
.navbar-custom .navbar-link {
  color: #ffffff;
}
.navbar-custom .navbar-link:hover {
  color: #bdf6fa;
}


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
  
 <div class="container" style="background-color:#FFFFFF;-webkit-box-shadow: 0px 0px 12px 0px rgba(50, 50, 50, 0.47);
-moz-box-shadow:    0px 0px 12px 0px rgba(50, 50, 50, 0.47);
box-shadow:         0px 0px 12px 0px rgba(50, 50, 50, 0.47);" >
 <!--<div class="container-fluid">-->
 
   
 
  <div class="row">
<!-- -->
     <div class="col-md-12" style="background-image:url(<?php echo base_url()?>assets_frontend/img/ropeg_bg_header.png); background-repeat:repeat-x;">
    &nbsp;
    </div>
    <div class="col-md-8">
    <img src="<?php echo base_url()?>assets_frontend/img/logo_ropeg.png" class="img-responsive">
    </div>
    
    <div class="col-md-4">
     <form action="<?php echo site_url();?>dokumentasi/pencarian"  method="post" name="formcari">
   <div class="input-group">
       <input type="Search" placeholder="Cari Data..." class="form-control" name="nama" value="" />
       <div class="input-group-btn">
           <button class="btn btn-info">
           <span class="glyphicon glyphicon-search"></span>
           </button>
           </div>
           </div>
           </form>
           
    </div>
    
	<div class="col-md-12" style="padding:0;">
	
	   
		<nav class="navbar-custom navbar-inverse" role="navigation">
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
           <!-- <a class="navbar-brand" href="<?php echo site_url(); ?>homepage"><span style="color:#FF9900;">apotecare</span>.net</a>-->
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
				
				
				
				<ul class="nav navbar-nav navbar-right" style="font-size:13px;">
                   
					<?php
						make_member();
					?>
					
				
                    
                    
                </ul>
				
				
							
				
				
            </div>
            <!-- /.navbar-collapse -->
            
            
          
            
            
        </div>
       
    </nav>
	
	
     <!--<nav class="navbar-custom navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">&nbsp;</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
    </div>
  </div>
</nav>-->
    </div>


<?php 


#printbreadcrumb(44);
?>

<?php
					ini_set('memory_limit', '512M');
					echo $contents;
				?>
                            