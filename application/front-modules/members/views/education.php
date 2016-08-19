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
                             <li role="presentation"  class="active">
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
                                     <h4 class="pull-left" style="margin:0;padding-top:7px;">Riwayat Pendidikan</h4>
                                     <a class="btn btn-sm btn-success pull-right" id="btn-add">Tambah</a>
                                </div>
                           </div>
                           <!-- <div class="panel-body" style="display:none"> -->
                           <div class="panel-body collapse" id="form-container">
                                <form method="post" class="form-horizontal" id="the-form" action="<?php echo base_url('members/savePendidikan')?>">
                                     <div class="row" style="margin-top:20px">
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Nama Sekolah</label>
                                                    <div class="col-sm-7">
                                                         <input type="hidden" class="form-control" name="act">
                                                         <input type="hidden" class="form-control" name="id_pendidikan">
                                                         <input type="hidden" class="form-control" name="id_members" value="<?php echo $members->id; ?>">
                                                         <input type="text" class="form-control" name="sekolah">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Gelar</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="gelar">
                                                    </div>
                                               </div>
                                          </div>
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Mulai Tahun</label>
                                                    <div class="col-sm-6">
                                                         <input type="text" class="form-control" name="tgl_mulai">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Selesai Tahun</label>
                                                    <div class="col-sm-6">
                                                         <input type="text" class="form-control" name="tgl_selesai">
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
                                                         <button type="reset" class="btn btn-sm btn-danger" id="reset">Batal</button>
                                                         <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                </form>
                           </div>
                           <?php if($members_pendidikan){ ?>
                           <table class="table">
                                <thead>
                                     <tr>
                                          <th>Nama Sekolah</th>
                                          <th>Mulai Tahun</th>
                                          <th>Selesai Tahun</th>
                                          <th>Gelar</th>
                                          <th></th>
                                     </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach ($members_pendidikan as $pendidikan) {
                              ?>
                                             <tr>
                                                 <td><?php echo $pendidikan->school_name; ?></td>
                                                 <td><?php echo $pendidikan->start_date; ?></td>
                                                 <td><?php echo $pendidikan->end_date; ?></td>
                                                 <td><?php echo $pendidikan->title; ?></td>
                                                 <td>
                                                      <div class="btn-group pull-right" role="group">
                                                           <button class="btn btn-sm btn-warning btn-edit-pend" data-id="<?php echo $pendidikan->id; ?>" data-url="<?php echo base_url('members/getPend'); ?>">Edit</button>
                                                           <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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
