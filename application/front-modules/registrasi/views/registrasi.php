<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1>Registrasi</h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="index.html">Home</a></li>
                   <li class="active">Registrasi</li>
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
                        <?php
                              $attributes = array('class' => 'form-horizontal');
                              echo form_open_multipart('registrasi/save',$attributes);
                         ?>
                             <h3>Data Pribadi</h3>
                             <hr>
                             <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="name">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Identitas</label>
                                  <div class="col-sm-1">
                                       <div class="radio">
                                            <label>
                                                 <input type="radio" name="identitas" id="optionsRadios1" value="ktp">
                                                 KTP
                                            </label>
                                       </div>
                                  </div>
                                  <div class="col-sm-1">
                                       <div class="radio">
                                            <label>
                                                 <input type="radio" name="identitas" id="optionsRadios1" value="passport" >
                                                 Passport
                                            </label>
                                       </div>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label"></label>
                                  <div class="col-sm-6">
                                       <input type="text" class="form-control" name="identitas_no" placeholder="No. Identitas">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label"></label>
                                  <div class="col-sm-6">
                                       <input type="file" class="form-control" name="identitas_file" id="identitas_file">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Tempat Lahir</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="birth_place" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Tanggal Lahir</label>
                                  <div class="col-sm-4">
                                       <div class='input-group date datepick'>
                                            <input type="text" class="form-control datepick" name="birth_date">
                                            <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                       </div>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Nomor HP.</label>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="phone_1" >
                                  </div>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="phone_2" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Email</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="email" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Website</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="website" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Foto</label>
                                  <div class="col-sm-7">
                                       <input type="file" class="form-control" name="foto_file" id="foto_file">
                                  </div>
                             </div>
                             <br>
                             <!-- <div class="form-group"> -->
                             <h3>Data Tempat Tinggal</h3>
                             <hr>
                             <!-- </div> -->
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Alamat</label>
                                  <div class="col-sm-7">
                                       <textarea class="form-control" rows="2" name="home_address"></textarea>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">RT / RW</label>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="home_rt" placeholder="RT">
                                  </div>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="home_rw" placeholder="RW">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kelurahan</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="home_kelurahan" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kecamatan</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="home_kecamatan" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kabupaten</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="home_kabupaten" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Propinsi</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="home_propinsi" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Negara</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="home_negara" >
                                  </div>
                             </div>
                             <br>
                             <h3>Data Kantor</h3>
                             <hr>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Alamat</label>
                                  <div class="col-sm-7">
                                       <textarea class="form-control" rows="2" name="office_address"></textarea>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">RT / RW</label>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="office_rt" placeholder="RT">
                                  </div>
                                  <div class="col-sm-3">
                                       <input type="text" class="form-control" name="office_rw" placeholder="RW">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kelurahan</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="office_kelurahan" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kecamatan</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="office_kecamatan" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Kabupaten</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="office_kabupaten" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Propinsi</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="office_propinsi" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label">Negara</label>
                                  <div class="col-sm-7">
                                       <input type="text" class="form-control" name="office_negara" >
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label class="col-sm-3 control-label"></label>
                                  <div class="col-sm-7">
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                             </div>
                        <?php echo form_close(); ?>
                   </div>
              </div>
        </div>
</section>
