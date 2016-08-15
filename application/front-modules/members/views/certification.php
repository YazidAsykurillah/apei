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
                             <li role="presentation">
                                  <?php echo anchor('members/biografi/'. $members->id, 'Data Pribadi', 'Data Pribadi'); ?>
                             </li>
                             <li role="presentation">
                                  <?php echo anchor('members/pendidikan/'. $members->id, 'Riwayat Pendidikan', 'Pendidikan'); ?>
                             </li>
                             <li role="presentation" class="active">
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
                                     <h4 class="pull-left" style="margin:0;padding-top:7px;">Riwayat Sertifikasi</h4>
                                     <a class="btn btn-sm btn-success pull-right" id="btn-add">Tambah</a>
                                </div>
                           </div>
                           <!-- <div class="panel-body" style="display:none"> -->
                           <div class="panel-body collapse" id="form-container">
                                <form class="form-horizontal" id="the-form">
                                     <div class="row" style="margin-top:20px">
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Pelaksana</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="pelaksana">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Tempat</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="tempat">
                                                    </div>
                                               </div>
                                          </div>
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Tanggal Mulai</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="position">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Tanggal Selesai</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="position">
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                     <hr>
                                     <div class="row">
                                          <div class="col-sm-12">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-7">
                                                         <button type="button" class="btn btn-sm btn-danger" id="reset">Batal</button>
                                                         <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </form>
                           </div>
                           <?php if($members_sertifikat){ ?>
                           <table class="table">
                                <thead>
                                     <tr>
                                          <th>Pelaksana</th>
                                          <th>Tempat</th>
                                          <th>Tgl. Mulai</th>
                                          <th>Tgl. Selesai</th>
                                          <th></th>
                                     </tr>
                                </thead>
                                <tbody>
                                     <?php
                                             foreach ($members_sertifikat as $sertifikat) {
                                   ?>
                                     <tr>
                                          <td><?php echo $sertifikat->organizer; ?></td>
                                          <td><?php echo $sertifikat->place; ?></td>
                                          <td><?php echo $sertifikat->start_date; ?></td>
                                          <td><?php echo $sertifikat->end_date; ?></td>
                                          <td>
                                               <div class="btn-group pull-right" role="group">
                                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="http://localhost/apei/registrasi" class="btn btn-sm btn-danger">Hapus</a>
                                               </div>
                                          </td>
                                     </tr>
                                     <?php
                                               }
                                       ?>
                                </tbody>
                           </table>
                           <?php }else{ ?>
                                <div class="panel-body">
                                     Tidak ada data ditemukan.
                                </div>
                           <?php } ?>
                         </div>
                   </div>
              </div>
        </div>
</section>
