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
    <section id="blog">
        <div class="container">
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
                         <!-- <img class="img-responsive img-blog" src="<?php echo base_url('uploads/'.$ne->feature_image);?>" width="100%" alt=""> -->
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
           <?php echo $page;?>
      </div>
 </section>
