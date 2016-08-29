<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1>Acara Sertifikasi</h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="<?php echo base_url();?>">Home</a></li>
                   <li>Informasi</li>
                   <li class="active">Acara Sertifikasi</li>
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
           if($acara){
                // var_dump($news_event);
                $no = 0;
                foreach($acara as $ac){
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
