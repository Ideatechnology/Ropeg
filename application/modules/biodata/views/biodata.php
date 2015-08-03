

<div class="col-md-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>homepage">Beranda</a></li>
        <li class="active">Biodata</li>
    </ol>

</div>

<div id="page-content" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">



<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        	<?php 
        	if($this->session->flashdata("message_login")){
        		?>
        		<div class="alert alert-danger" role="alert">
        			<?php echo $this->session->flashdata('message_login');?>
        		</div>
        		
        		<?php 
        		}
        	?>
            <h1 class="text-center login-title">SILAKAN UNTUK LOGIN</h1>
            <div class="account-wall">
                <img class="profile-img" src="<?php echo base_url();?>assets_frontend/img/photo.png"  alt="">
                <form class="form-signin" method="post" action="<?php echo site_url("biodata/index");?>">
                <input type="text" class="form-control" name="user_id" placeholder="User ID" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Masuk">
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                </form>
            </div>
           
        </div>
    </div>
</div>





                	</div>
                </div>
            </div>
        </div>
 </div>