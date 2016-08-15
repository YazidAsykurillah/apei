<section id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>TENTANG PT. APEI</h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
                    <p>Pellentesque habitant morbi tristique senectus.</p>
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
                    <div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="<?php echo base_url(get_front_images_path('blog/thumb1.jpg'))?>" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 17 Aug 2013</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="<?php echo base_url(get_front_images_path('blog/thumb2.jpg'))?>" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 13 Sep 2013</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <img src="<?php echo base_url(get_front_images_path('blog/thumb3.jpg'))?>" alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                                <small class="muted">Posted 11 Jul 2013</small>
                            </div>
                        </div>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>GALERI VIDEO</h4>
                    <address>
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                    <h4>Newsletter</h4>
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebotstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <div id="mdl-login" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel">
         <div class="modal-dialog" role="document">
              <div class="modal-content">
                   <form class="form-horizontal" method="post" action="<?php echo base_url('auth/login')?>">
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
                                       <input type="text" class="form-control" name="username">
                                  </div>
                             </div>
                             <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                                  <div class="col-sm-8">
                                       <input type="password" class="form-control col-sm-9" name="password">
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
         echo get_front_js();
    ?>
    <!-- <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script> -->
</body>
</html>
