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
                                <form class="form-horizontal" id="the-form" action="<?php echo base_url('members/saveSertifikat')?>" method="post">
                                     <div class="row" style="margin-top:20px">
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">No. Registrasi</label>
                                                    <div class="col-sm-7">
                                                         <input type="hidden" class="form-control" name="act">
                                                         <input type="hidden" class="form-control" name="id_sertifikat">
                                                         <input type="hidden" class="form-control" name="id_members" value="<?php echo $members->id; ?>">
                                                         <input type="text" class="form-control" name="no_reg">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">No. Sertifikat</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="no_sert">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Bidang</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="bidang">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Sub Bidang</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="sub_bidang">
                                                    </div>
                                               </div>
                                          </div>
                                          <div class="col-sm-6">
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Unit Kompetensi</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="unit_kompetensi">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Level</label>
                                                    <div class="col-sm-7">
                                                         <input type="text" class="form-control" name="level">
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Masa Berlaku</label>
                                                    <div class="col-sm-7">
                                                         <div class='input-group date datepick'>
                                                              <input type="text" class="form-control datepick" name="masa_berlaku">
                                                              <span class="input-group-addon">
                                                                   <span class="glyphicon glyphicon-calendar"></span>
                                                              </span>
                                                         </div>
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
                                          <th>No. Reg</th>
                                          <th>No. Sertifikat</th>
                                          <th>Bidang</th>
                                          <th>Sub Bidang</th>
                                          <th>Unit</th>
                                          <th>Level</th>
                                          <th>Masa Berlaku</th>
                                          <th></th>
                                     </tr>
                                </thead>
                                <tbody>
                                     <?php
                                             foreach ($members_sertifikat as $sertifikat) {
                                   ?>
                                     <tr>
                                          <td><?php echo $sertifikat->registration_number; ?></td>
                                          <td><?php echo $sertifikat->certificate_number; ?></td>
                                          <td><?php echo $sertifikat->division_id; ?></td>
                                          <td><?php echo $sertifikat->subdivision_id; ?></td>
                                          <td><?php echo $sertifikat->competence_unit; ?></td>
                                          <td><?php echo $sertifikat->level; ?></td>
                                          <td><?php echo $sertifikat->validity_period; ?></td>
                                          <td>
                                               <div class="btn-group pull-right" role="group">
                                                    <button class="btn btn-sm btn-warning btn-edit-sert" data-id="<?php echo $sertifikat->id; ?>" data-url="<?php echo base_url('members/getSert'); ?>">Edit</button>
                                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#mdl-pend-confirm" data-backdrop="static" data-idmembers="<?php echo $sertifikat->id_members; ?>" data-id="<?php echo $sertifikat->id; ?>" data-url="<?php echo base_url('members/delSertifikat'); ?>">Hapus</a>
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
<div id="mdl-pend-confirm" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                         <h3 class="modal-title" id="myLargeModalLabel">Konfirmasi</h3>
                         <hr>
                    </div>
                    <div class="modal-body">
                         <p>Anda yakin akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-danger btn-del-pend">Ya</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                    </div>
          </div>
     </div>
</div>
