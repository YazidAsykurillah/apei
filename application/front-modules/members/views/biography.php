<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1><?php echo $members->name; ?></h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="index.html">Home</a></li>
                   <li class="active"><?php echo $members->name; ?></li>
               </ul>
           </div>
       </div>
   </div>
</section>
<section id="about-us" class="container">
    <div class="row">
        <div class="blog">
              <div class="blog-item" style="margin-bottom:0;">
                   <div class="blog-content">
                        <ul class="nav nav-tabs nav-justified" style="margin-bottom: 20px;">
                             <li role="presentation" class="active">
                                  <?php echo anchor('members/biografi/'. $members->id, 'Data Pribadi', 'Data Pribadi'); ?>
                             </li>
                             <li role="presentation">
                                  <?php echo anchor('members/pendidikan/'. $members->id, 'Riwayat Pendidikan', 'Pendidikan'); ?>
                             </li>
                             <li role="presentation">
                                  <?php echo anchor('members/sertifikat/'. $members->id, 'Riwayat Sertifikasi', 'Sertifikat'); ?>
                             </li>
                             <li role="presentation">
                                  <?php echo anchor('members/pelatihan/'. $members->id, 'Riwayat Diklat/Kursus', 'Pelatihan'); ?>
                             </li>
                             <li role="presentation">
                                  <?php echo anchor('members/pengalaman/'. $members->id, 'Riwayat Pekerjaan', 'Pengalaman'); ?>
                             </li>
                        </ul>
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                                <div style="overflow:hidden">
                                     <h4 class="pull-left" style="margin:0;padding-top:7px;">Data Pribadi</h4>
                                     <a class="btn btn-sm btn-warning pull-right">Edit</a>
                                </div>
                           </div>
                           <div class="panel-body">
                             Panel content
                           </div>
                         </div>
                   </div>
              </div>
        </div>
</section>
