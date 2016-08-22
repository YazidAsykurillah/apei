<section id="bottom" class="wet-asphalt hidden-sm hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>TENTANG PT. APEI</h4>
                    <p></p>
                    <p></p>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>RUANG LINGKUP</h4>
                    <div>
                        <ul class="arrow">
                            <li><a href="#">Pembangkitan Tenaga Listrik</a></li>
                            <li><a href="#">Transmisi Tenaga Listrik</a></li>
                            <li><a href="#">Distribusi Tenaga Listrik</a></li>
                            <li><a href="#">Instalasi Pemanfaatan Tenaga Listrik</a></li>
                        </ul>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>GALERI FOTO</h4>
                    <div class="row">
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg1.jpg'))?>" rel="prettyPhoto">
                                   <img src="<?php echo base_url(get_front_images_path('galeri/bg1.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4  col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg2.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg2.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4  col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg3.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg3.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg4.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg4.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg5.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg5.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg6.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg6.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg7.jpg'))?>" rel="prettyPhoto">
                                   <div class="col-xs-4 col-md-4">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg7.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg8.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg8.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>
                         <div class="col-xs-4 col-md-4">
                              <a href="<?php echo base_url(get_front_images_path('galeri/bg9.jpg'))?>" rel="prettyPhoto">
                              <img src="<?php echo base_url(get_front_images_path('galeri/bg9.jpg'))?>" alt="" style="width: 60px;height:60px;">
                              </a>
                         </div>

                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>GALERI VIDEO</h4>
                    <div>
                         <iframe style="width:100%" src="https://www.youtube.com/embed/S8RNgeNcQSU" frameborder="0" allowfullscreen=""></iframe>
                         <small class="muted">Presiden Berharap AKLI & APEI Terlibat Proyek 35 Ribu MW</small>
                    </div>
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    &copy; 2013 <a target="_blank" href="#" title="Free Twitter Bootstrap WordPress Themes and HTML templates">PT. APEI</a>. All Rights Reserved.
                <!-- </div> -->
                <!-- <div class="col-sm-6"> -->
                    <ul class="pull-right">
                        <!-- <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li> -->
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <?php
         if($this->ion_auth->logged_in()){
              if(isset($this->session->userdata['groups']) && $this->session->userdata['groups'] != 1){
              }else{
     ?>
    <div id="mdl-login" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
         <div class="modal-dialog" role="document">
              <div class="modal-content">
                   <form id="login-form" class="form-horizontal" method="post" action="<?php echo base_url('auth/login')?>">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                             </button>
                             <h3 class="modal-title" id="myLargeModalLabel">Login Panel</h3>
                             <hr>
                        </div>
                        <div class="modal-body">
                             <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                  <div class="col-sm-8">
                                       <input type="text" class="form-control" name="username" required>
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                  <div class="col-sm-8">
                                       <input type="password" class="form-control col-sm-9" name="password" required>
                                  </div>
                             </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                           <button type="submit" class="btn btn-success">Login</button>
                        </div>
                   </form>
              </div>
         </div>
    </div>
    <?php
               }
          }else{
     ?>
     <div id="mdl-login" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <form id="login-form" class="form-horizontal" method="post" action="<?php echo base_url('auth/login')?>">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">×</span>
                              </button>
                              <h3 class="modal-title" id="myLargeModalLabel">Login Panel</h3>
                              <hr>
                         </div>
                         <div class="modal-body">
                              <div class="form-group">
                                   <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                   <div class="col-sm-8">
                                        <input type="text" class="form-control" name="username" id="username" required>
                                   </div>
                              </div>
                              <div class="form-group">
                                   <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                   <div class="col-sm-8">
                                        <input type="password" class="form-control col-sm-9" name="password" id="password" required>
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Login</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <?php
          }
     ?>
    <?php
         echo get_front_js();
    ?>
    <!-- <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script> -->
</body>
</html>
