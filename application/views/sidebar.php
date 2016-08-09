<div class="left_col scroll-view">

	<div class="navbar nav_title" style="border: 0;">
		<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Empty!</span></a>
	</div>
	<div class="clearfix"></div>

	<!-- menu prile quick info -->
	<div class="profile">
		<div class="profile_pic">
		<?php 
			echo img(array('src'=>'assets/images/img.jpg','alt'=>'','class'=>'img-circle profile_img')); 
		?>
		</div>
		<div class="profile_info">
			<span>Welcome,</span>
			<h2>Empty user</h2>
		</div>
	</div>
	<!-- /menu prile quick info -->

	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<h3>General</h3>
			<ul class="nav side-menu">
				<li>
					<?php echo anchor('home', '<i class="fa fa-home"></i> Dashboard'); ?>
				</li>
				<li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<li><?php echo anchor('dokter', 'Dokter'); ?></li>
						<li><?php echo anchor('pasien', 'Pasien'); ?></li>
						<li><?php echo anchor('jenis', 'Jenis Pemeriksaan'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('hasil', '<i class="fa fa-home"></i>Hasil Pemeriksaan'); ?>
				</li>
			</ul>
		</div>
	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
		<a data-toggle="tooltip" data-placement="top" title="Settings">
			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="FullScreen">
			<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Lock">
			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
		</a>
		<a data-toggle="tooltip" data-placement="top" title="Logout">
			<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
		</a>
	</div>
	<!-- /menu footer buttons -->
</div>