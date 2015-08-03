<div class="page-header">
					<div class="pull-left">
						<h1>Menu Utama</h1>
					</div>
					<div class="pull-right">
						
						<ul class="stats">
							
							<li class="lightred">
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">January 21, 2015</span>
									<span>Wednesday, 18:17</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				
				

				
				
				
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
					