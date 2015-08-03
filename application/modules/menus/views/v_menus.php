
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1><?php echo $field["nama_menu"]; ?></h1>
					</div>
					
				</div>
				
				
				
				
				
				<!--<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-sidebar-hidden.html">Layouts</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="layouts-sidebar-hidden.html">Sidebar hidden</a>
						</li>
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>-->
				
				
				
				<div class="row-fluid">
				
				
					<div class="span12">
						<ul class="tiles">
						
						<?php foreach($query->result_array() as $row){ ?>
							<li class="<?php echo $row['class']; ?>">
								<a href="<?php echo site_url();?><?php echo $row['link'];?>"><span><i class="icon-cogs"></i></span><span class='name'><?php echo $row['nama_menu']; ?></span></a>
							</li>
						<?php } ?>
						
							
					
						</ul>
					</div>
				</div>
				
				
			</div>

	