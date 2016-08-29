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
<section id="services" style="background-color:#ffffff">
    <div class="container">
       <div class="row">
            <div class="col-md-12">
                 <?php
                     if($single){
                ?>
                <div class="blog">
                     <div class="blog-item" style="border:1px solid #ccc">
                          <div class="blog-content">
                               <h3><?php echo $single->title; ?></h3>
                               <div class="entry-meta">
                                   <span>
                                        <i class="icon-user"></i>
                                        <a href="#"><?php echo $single->organizer?></a>
                                   </span>
                                   <span><i class="icon-calendar"></i> <?php echo $single->start_date; ?></span>
                               </div>
                               <?php echo $single->description; ?>
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
