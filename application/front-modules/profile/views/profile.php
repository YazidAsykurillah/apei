<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1><?php echo $profile->title ? $profile->title : ''; ?></h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="<?php echo base_url();?>">Home</a></li>
                   <li>Profile</li>
                   <li class="active"><?php echo $profile->title ? $profile->title : ''; ?></li>
               </ul>
           </div>
       </div>
   </div>
</section>
<?php if($profile->content || $profile->file_name): ?>
<section id="about-us" class="container">
    <div class="row">
         <div class="blog">
              <div class="blog-item" style="margin-bottom:0;">
                   <div class="blog-content">
                        <?php
                              if($profile->type == 'texts'){
                                   echo $profile->content;
                              }else{
                                   $file = $profile->file_name;
                                   $file = explode(".", $file);
                                   if(end($file) == 'png' || end($file) == 'jpg' || end($file) == 'gif'){
                         ?>
                         <div class="text-center">
                              <img style="width:100%" src="<?php echo base_url('uploads/'.$profile->file_name);?>">
                         </div>
                         <?php
                                   }else{

                                   }
                              }
                        ?>
                   </div>
              </div>
         </div>
    </div>
</section>
<?php endif; ?>
