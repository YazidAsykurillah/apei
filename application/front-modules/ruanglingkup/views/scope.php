<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1><?php echo $ruangs->title ? $ruangs->title : ''; ?></h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="<?php echo base_url();?>">Home</a></li>
                   <li class="active">Ruang Lingkup</li>
               </ul>
           </div>
       </div>
   </div>
</section>
<?php if($ruangs->content): ?>
<section id="about-us" class="container">
    <div class="row">
         <div class="col-md-12">
               <?php
                    if($ruangs):
               ?>
               <div class="blog">
                    <div class="blog-item" style="border:1px solid #ccc">
                         <?php
                              if(isset($ruangs->feature_image)){
                         ?>
                         <div style="height:350px;background: url(<?php echo base_url('uploads/'.$ruangs->feature_image);?>) 50% / cover;"></div>

                         <?php
                              }
                         ?>
                        <div class="blog-content">
                             <h3><?php echo $ruangs->title; ?></h3>
                             <?php echo $ruangs->content; ?>
                        </div>
                   </div>
              </div>
              <?php
                    endif;
              ?>
         </div>
    </div>
</section>
<?php endif; ?>
