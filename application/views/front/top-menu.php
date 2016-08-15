<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
   <div class="container">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="index.html"><img style="height:30px" src="<?php echo base_url(get_front_images_path('logo.png'));?>" alt="logo"></a>
       </div>
       <div class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right">
               <li class="<?php echo $this->uri->segment(1) == 'home' ? 'active':''; ?>"><?php echo anchor('home', 'Home', 'title="Home"'); ?></li>
               <li class="dropdown <?php echo $this->uri->segment(1) == 'profile' ? 'active':''; ?>">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <i class="icon-angle-down"></i></a>
                   <ul class="dropdown-menu">
                       <li><?php echo anchor('profile/latar_belakang', 'Latar Belakang', 'title="Latar Belakang"'); ?></li>
                       <li><?php echo anchor('profile/visi_misi', 'Visi & Misi', 'title="Visi & Misi"'); ?></li>
                       <li><?php echo anchor('profile/struktur', 'Struktur Organisasi', 'title="Struktur Organisasi"'); ?></li>
                       <li><?php echo anchor('profile/fungsi', 'Fungsi & Peranan', 'title="Fungsi & Peranan"'); ?></li>
                   </ul>
               </li>
               <li class="dropdown <?php echo $this->uri->segment(1) == 'informasi' ? 'active':''; ?>">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi <i class="icon-angle-down"></i></a>
                   <ul class="dropdown-menu">
                       <li><?php echo anchor('informasi/prosedur', 'Prosedur Sertifikasi', 'title="Prosedur Sertifikasi"'); ?></li>
                       <li><?php echo anchor('informasi/acara', 'Acara Sertifikasi', 'title="Acara Sertifikasi"'); ?></li>
                       <li><?php echo anchor('informasi/berita', 'Berita & Kegiatan', 'title="Berita & Kegiatan"'); ?></li>
                   </ul>
               </li>
               <li class="dropdown <?php echo $this->uri->segment(1) == 'dbase' ? 'active':''; ?>">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Database <i class="icon-angle-down"></i></a>
                   <ul class="dropdown-menu">
                       <li><?php echo anchor('dbase/dt_kompetensi', 'Data Kompetensi', 'title="Data Kompetensi"'); ?></li>
                       <li><?php echo anchor('dbase/dt_asesor', 'Data Asesor', 'title="Data Asesor"'); ?></li>
                       <li><?php echo anchor('dbase/dt_tenaga_teknik', 'Data Tenaga Teknik', 'title="Data Tenaga Teknik"'); ?></li>
                   </ul>
               </li>
               <li class="dropdown <?php echo $this->uri->segment(1) == 'galeri' ? 'active':''; ?>">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeri <i class="icon-angle-down"></i></a>
                   <ul class="dropdown-menu">
                       <li><?php echo anchor('galeri/produk_hukum', 'Produk Hukum', 'title="Produk Hukum"'); ?></li>
                       <li><?php echo anchor('galeri/foto', 'Foto', 'title="Foto"'); ?></li>
                       <li><?php echo anchor('galeri/video', 'Video', 'title="Video"'); ?></li>
                   </ul>
               </li>
               <li class="<?php echo $this->uri->segment(1) == 'kontak' ? 'active':''; ?>"><?php echo anchor('kontak', 'Hubungi Kami', 'title="Hubungi Kami"'); ?></li>
               <?php
                    if($this->ion_auth->logged_in()){
               ?>
               <li style="margin-left:10px;">
                    <div class="btn-group" role="group" aria-label="...">
                         <a href="#" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata['nama'] ?>  <i class="icon-angle-down"></i></a>
                         <ul class="dropdown-menu">
                             <li><?php echo anchor('members', 'My Profile', 'title="My Profile"'); ?></li>
                             <li><?php echo anchor('auth/logout', 'Logout', 'title="Logout"'); ?></li>
                         </ul>
                    </div>
               </li>
               <?php
                    }else{
               ?>

               <li style="margin-left:10px;">
                    <div class="btn-group" role="group" aria-label="...">
                         <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#mdl-login" data-backdrop="static">Login</a>
                         <?php echo anchor('registrasi', 'Register', array('title' => 'Register','class' => 'btn btn-sm btn-primary')); ?>
                    </div>
               </li>
               <?php } ?>
           </ul>
       </div>
   </div>
</header>
