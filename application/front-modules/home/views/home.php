<section id="main-slider" class="no-margin">
   <div class="carousel slide wet-asphalt">
       <ol class="carousel-indicators">
           <li data-target="#main-slider" data-slide-to="0" class="active"></li>
           <li data-target="#main-slider" data-slide-to="1"></li>
           <li data-target="#main-slider" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
           <div class="item active" style="background-image: url(<?php echo get_front_images_path('slider/bg1.jpg');?>)">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-12">
                           <div class="carousel-content centered">
                               <h2 class="animation animated-item-1"></h2>
                               <p class="animation animated-item-2"></p>
                           </div>
                       </div>
                   </div>
               </div>
           </div><!--/.item-->
           <div class="item" style="background-image: url(<?php echo get_front_images_path('slider/bg2.jpg');?>)">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-12">
                           <!-- <div class="carousel-content center centered">
                               <h2 class="boxed animation animated-item-1"></h2>
                               <p class="boxed animation animated-item-2"></p>
                               <br>
                               <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                           </div> -->
                       </div>
                   </div>
               </div>
           </div><!--/.item-->
           <div class="item" style="background-image: url(<?php echo get_front_images_path('slider/bg3.jpg');?>)">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-6">
                           <!-- <div class="carousel-content centered">
                               <h2 class="animation animated-item-1">Powerful and Responsive Web Design Theme</h2>
                               <p class="animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames</p>
                               <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                           </div> -->
                       </div>
                       <div class="col-sm-6 hidden-xs animation animated-item-4">
                           <!-- <div class="centered">
                               <div class="embed-container">
                                   <iframe src="//player.vimeo.com/video/69421653?title=0&amp;byline=0&amp;portrait=0&amp;color=a22c2f" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                               </div>
                           </div> -->
                       </div>
                   </div>
               </div>
           </div><!--/.item-->
       </div><!--/.carousel-inner-->
   </div><!--/.carousel-->
   <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
       <i class="icon-angle-left"></i>
   </a>
   <a class="next hidden-xs" href="#main-slider" data-slide="next">
       <i class="icon-angle-right"></i>
   </a>
</section><!--/#main-slider-->

<section id="about-us" class="container">
   <div class="row">
       <div class="col-sm-5">
            <div class="center gap">
               <h2>PESERTA UJI KOMPETENSI</h2>
            </div>
            <div class="list-group">
                 <a href="#" class="list-group-item">I KADEK SUWECA WIJAYA</a>
                 <a href="#" class="list-group-item">WAHYU PUSPA PERDANA</a>
                 <a href="#" class="list-group-item">NURCAHYO ANDI FIRMANTO</a>
                 <a href="#" class="list-group-item">SUWITO WALUYO</a>
                 <a href="#" class="list-group-item">KADEK JONIHARTAWAN</a>
                 <a href="#" class="list-group-item">I GUSTI AGUNG MADE AGUNG</a>
                 <a href="#" class="list-group-item">MADE FANDY DARMADI</a>
                 <a href="#" class="list-group-item">NURCAHYO ANDI FIRMANTO</a>
            </div>
      </div><!--/.col-sm-6-->
       <div class="col-sm-7">
           <div class="center gap">
              <h2>ACARA SERTIFIKASI</h2>
           </div>
           <?php
               if($acara){
                    foreach ($acara as $ac) {
          ?>
          <div class="blog">
              <div class="blog-item" style="border:1px solid #ccc">
                   <div class="blog-content">
                        <a href="<?php echo base_url('acara/'.$ac->id);?>">
                             <h3><?php echo $ac->title; ?></h3>
                        </a>
                        <div class="entry-meta">
                            <span>
                                 <i class="icon-user"></i>
                                 <a href="#"><?php echo $ac->organizer?></a>
                            </span>
                            <span><i class="icon-calendar"></i> <?php echo $ac->start_date; ?></span>
                        </div>
                        <?php echo $ac->description; ?>
                        <a class="btn btn-default" href="<?php echo base_url('acara/'.$ac->id);?>">Read More <i class="icon-angle-right"></i></a>
                   </div>
              </div>
         </div>
          <?php
                    }
               }
           ?>

       </div><!--/.col-sm-6-->
   </div><!--/.row-->
</section><!--/#about-us-->

    <section id="services" style="background-color:#ffffff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap">
                        <h2>BERITA & KEGIATAN</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                     <div class="blog">
           <?php
               if($news_event){
                    // var_dump($news_event);
                    $no = 0;
                    foreach($news_event as $ne){
                         if($no % 2 >= 0 && $no != 0){
          ?>
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="blog">
          <?php
                         }
                         $no++;
          ?>
                    <div class="blog-item" style="border:1px solid #ccc">
                         <?php
                              if(isset($ne->feature_image)){
                         ?>
                         <div style="height:230px;background: url(<?php echo base_url('uploads/'.$ne->feature_image);?>) 50% / cover;"></div>

                         <?php
                              }
                         ?>
                         <div class="blog-content">
                              <a href="<?php echo base_url('berita-kegiatan/'.$ne->neId);?>">
                                   <h3><?php echo $ne->title; ?></h3>
                              </a>
                              <div class="entry-meta">
                                  <span>
                                       <i class="icon-user"></i>
                                       <a href="#"><?php echo $ne->first_name ." ". $ne->last_name?></a>
                                  </span>
                                  <span><i class="icon-folder-close"></i> <a href="#"><?php echo ucfirst($ne->category);?></a></span>
                                  <span><i class="icon-calendar"></i> <?php echo $ne->posted_date; ?></span>
                              </div>
                              <?php
                                   $ctn = strip_tags($ne->content);
                                   $ctn = explode(" ",trim($ctn));
                                   $i = 0;
                                   if(count($ctn) <= 40){
                                        $content = implode(" ",$ctn);
                                   }else{
                                        $cont = array();
                                        foreach($ctn as $ct){
                                             if($i <= 40){
                                                  $cont[$i] = $ct;
                                             }else{
                                                  break;
                                             }
                                             $i++;
                                        }
                                        $content = implode(" ",$cont);
                                   }
                                   echo "<p style='min-height:110px'>".$content."...</p>";
                              ?>
                              <a class="btn btn-default" href="<?php echo base_url('berita-kegiatan/'.$ne->neId);?>">Read More <i class="icon-angle-right"></i></a>
                         </div>
                    </div>
          <?php
                    }
               }
           ?>
                     </div>
               </div>
           </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="center gap">
                        <h2>DEWAN PENGURUS</h2>
                    </div>
                </div>
            </div>
            <div id="meet-the-team" class="row">
               <div class="col-md-3 col-xs-6">
                   <div class="center">
                       <!-- <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo get_front_images_path('team-member.jpg');?>" alt="" ></p>
                       <h5>David J. Robbins<small class="designation muted">Senior Vice President</small></h5>
                       <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                       <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a> -->
                   </div>
               </div>

               <div class="col-md-3 col-xs-6">
                   <div class="center">
                       <!-- <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo get_front_images_path('team-member.jpg');?>" alt="" ></p>
                       <h5>David J. Robbins<small class="designation muted">Senior Vice President</small></h5>
                       <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                       <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a> -->
                   </div>
               </div>
               <div class="col-md-3 col-xs-6">
                   <div class="center">
                       <!-- <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo get_front_images_path('team-member.jpg');?>" alt="" ></p>
                       <h5>David J. Robbins<small class="designation muted">Senior Vice President</small></h5>
                       <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                       <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a> -->
                   </div>
               </div>
               <div class="col-md-3 col-xs-6">
                   <div class="center">
                       <!-- <p><img class="img-responsive img-thumbnail img-circle" src="<?php echo get_front_images_path('team-member.jpg');?>" alt="" ></p>
                       <h5>David J. Robbins<small class="designation muted">Senior Vice President</small></h5>
                       <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor.</p>
                       <a class="btn btn-social btn-facebook" href="#"><i class="icon-facebook"></i></a> <a class="btn btn-social btn-google-plus" href="#"><i class="icon-google-plus"></i></a> <a class="btn btn-social btn-twitter" href="#"><i class="icon-twitter"></i></a> <a class="btn btn-social btn-linkedin" href="#"><i class="icon-linkedin"></i></a> -->
                   </div>
               </div>
           </div>
        </div>
    </section>
