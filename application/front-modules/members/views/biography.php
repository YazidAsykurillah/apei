<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1><?php echo $members->name; ?></h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="<?php echo base_url();?>">Home</a></li>
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
                                <div class="form-horizontal">
                                     <div class="row">
                                          <div class="col-sm-12">
                                               <h3>Data Pribadi</h3><hr>
                                          </div>
                                          <div class="col-sm-8">
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Nama Lengkap :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->name; ?></label>
                                               </div>
                                               <!-- <div class="form-group">
                                                    <label class="col-sm-4 control-label">Identitas :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->identitas."(".$members->identitas_no.")"; ?></label>
                                               </div> -->
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Identitas :</label>
                                                    <div class="col-sm-6">
                                                         <div class="portfolio-item">
                                                         <div class="item-inner" style="margin:0">
                                                              <img src="<?php echo base_url('uploads/'.$members->identitas_file);?>" alt="<?php echo $members->identitas_no; ?>">
                                                              <h5><?php echo ucfirst($members->identitas)." (". $members->identitas_no.")"; ?></h5>
                                                              <div class="overlay">
                                                                   <a class="preview btn btn-danger" href="<?php echo base_url('uploads/'.$members->identitas_file);?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                              </div>
                                                         </div>
                                                    </div>
                                                    </div>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Tempat Lahir :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->birth_place; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Tanggal Lahir :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->birth_date; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">No. HP :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo ($members->phone_1 ? $members->phone_1 : '-')."".($members->phone_2 ? "/".$members->phone_2 : ''); ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Email :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->email; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Website :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->website ? $members->website : '-'; ?></label>
                                               </div>
                                          </div>
                                          <div class="col-sm-4">

                                               <div class="form-group">
                                                    <label class="col-sm-12 control-label" style="text-align:left;margin-bottom:5px;">Foto</label>
                                                    <div class="col-sm-12">
                                                         <div class="portfolio-item">
                                                         <div class="item-inner">
                                                              <img src="<?php echo base_url('uploads/'.$members->foto_file);?>" alt="<?php echo $members->identitas_no; ?>">
                                                              <h5>No : <?php echo $members->identitas_no; ?></h5>
                                                              <div class="overlay">
                                                                   <a class="preview btn btn-danger" href="<?php echo base_url('uploads/'.$members->foto_file);?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                              </div>
                                                         </div>
                                                    </div>
                                                    </div>
                                               </div>
                                          </div>
                                     </div>
                                     <div class="row" style="margin-top:10px">
                                          <div class="col-sm-12">
                                               <h3>Data Tempat Tinggal</h3><hr>
                                          </div>
                                          <div class="col-sm-8">
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Alamat :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_address; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">RT / RW :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo ($members->home_rt ? $members->home_rt : '-')."".($members->home_rw ? '/'.$members->home_rw : '-'); ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kelurahan :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_kelurahan; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kecamatan :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_kecamatan; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kabupaten :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_kabupaten; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Propinsi :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_propinsi; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Negara :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->home_negara; ?></label>
                                               </div>
                                          </div>
                                     </div>
                                     <div class="row" style="margin-top:10px">
                                          <div class="col-sm-12">
                                               <h3>Data Kantor</h3><hr>
                                          </div>
                                          <div class="col-sm-8">
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Alamat :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_address; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">RT / RW :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo ($members->office_rt ? $members->office_rt : '-')."".($members->office_rw ? '/'.$members->office_rw : '-'); ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kelurahan :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_kelurahan; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kecamatan :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_kecamatan; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Kabupaten :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_kabupaten; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Propinsi :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_propinsi; ?></label>
                                               </div>
                                               <div class="form-group">
                                                    <label class="col-sm-4 control-label">Negara :</label>
                                                    <label class="col-sm-8 control-label" style="text-align:left"><?php echo $members->office_negara; ?></label>
                                               </div>
                                          </div>
                                     </div>
                                </div>
                           </div>
                         </div>
                   </div>
              </div>
        </div>
</section>
