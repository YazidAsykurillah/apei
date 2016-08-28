<section id="title" class="asbestos" style="padding:20px 0 10px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Berita & Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li>Informasi</li>
                        <li class="active">Berita & Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="services" style="background-color:#ffffff">
        <div class="container">
           <div class="row">
                <div class="col-md-12">
                     <?php
                         if($single){
                    ?>
                    <div class="blog">
                         <div class="blog-item" style="border:1px solid #ccc">
                              <?php
                                   if(isset($single->feature_image)){
                              ?>
                              <div style="height:350px;background: url(<?php echo base_url('uploads/'.$single->feature_image);?>) 50% / cover;"></div>

                              <?php
                                   }
                              ?>
                              <div class="blog-content">
                                   <h3><?php echo $single->title; ?></h3>
                                   <div class="entry-meta">
                                       <span>
                                            <i class="icon-user"></i>
                                            <a href="#"><?php echo $single->first_name ." ". $single->last_name?></a>
                                       </span>
                                       <span><i class="icon-folder-close"></i> <a href="#"><?php echo ucfirst($single->category);?></a></span>
                                       <span><i class="icon-calendar"></i> <?php echo $single->posted_date; ?></span>
                                   </div>
                                   <?php echo $single->content; ?>
                              </div>
                         </div>
                   </div>
                    <?php
                         }
                     ?>

               </div>
           </div>
     </div>
 </section>
