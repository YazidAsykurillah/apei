<div class="left_col scroll-view">

	<div class="navbar nav_title" style="border: 0;">
		<a href="<?php echo base_url();?>" class="site_title">
			<?php echo img(array('src'=>'assets/images/logo.png','alt'=>'','class'=>'img-responsive','style'=>'width:80%;margin: 10px auto 0'));?>
		</a>
	</div>
	<div class="clearfix"></div>

	<!-- menu prile quick info -->
	<!-- <div class="profile">
		<div class="profile_pic">
		<?php
			echo img(array('src'=>'assets/images/img.jpg','alt'=>'','class'=>'img-circle profile_img'));
		?>
		</div>
		<div class="profile_info">
			<span>Welcome,</span>
			<h2>Empty user</h2>
		</div>
	</div> -->
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
				<li><a><i class="fa fa-book"></i> Master Data <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<li><?php echo anchor('page_profile', 'Halaman Profile'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('member', '<i class="fa fa-users"></i>Member'); ?></li>
				<!-- <li>
					<a><i class="fa fa-home"></i> Profil Perusahaan <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<li><?php echo anchor('company_profile/background', 'Latar Belakang'); ?></li>
						<li><?php echo anchor('company_profile/vission_mission', 'Visi dan Misi'); ?></li>
						<li><?php echo anchor('company_profile/org_structure', 'Struktur Organisasi'); ?></li>
						<li><?php echo anchor('company_profile/functions', 'Fungsi dan Peranan'); ?></li>
					</ul>
				</li> -->
				<li>
					<a><i class="fa fa-bookmark"></i> Informasi <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<!-- <li><?php echo anchor('information/', 'Informasi'); ?></li> -->
						<li><?php echo anchor('information/certification_procedure', 'Prosedur Sertifikasi'); ?></li>
						<li><?php echo anchor('information/news_event', 'Berita dan Kegiatan'); ?></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-cog"></i> Manajemen DJK <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<!-- <li><?php echo anchor('djk_management/', 'Manajemen DJK'); ?></li> -->
						<li><?php echo anchor('djk_management/certification', 'Acara Sertifikasi'); ?></li>
					</ul>
				</li>
				<li>
					<a><i class="fa fa-desktop"></i> Galeri <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<!-- <li><?php echo anchor('gallery/', 'Galeri'); ?></li> -->
						<li><?php echo anchor('gallery/album', 'Album Foto'); ?></li>
					</ul>
				</li>
				<!-- <li><a><i class="fa fa-user"></i> Profile <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<li><?php echo anchor('profile/user_certification', 'Riwayat Sertifikasi'); ?></li>
						<li><?php echo anchor('profile/user_education', 'Riwayat Pendidikan'); ?></li>
						<li><?php echo anchor('profile/user_course', 'Riwayat Diklat&nbsp;/&nbsp;Kursus'); ?></li>
						<li><?php echo anchor('profile/user_experience', 'Riwayat Pekerjaan'); ?></li>
					</ul>
				</li> -->
				<li>
					<a><i class="fa fa-cogs"></i> Pengaturan <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu" style="display: none">
						<li><?php echo anchor('slider', 'Slider'); ?></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<!-- <div class="sidebar-footer hidden-small">
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
	</div> -->
	<!-- /menu footer buttons -->
</div>
