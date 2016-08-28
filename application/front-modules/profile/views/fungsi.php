<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
      <div class="row">
           <div class="col-sm-6">
               <h1>Fungsi & Peranan</h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="<?php echo base_url();?>">Home</a></li>
                   <li>Profile</li>
                   <li class="active">Fungsi & Peranan</li>
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
                              if(isset($fungsi)){
                                   echo $fungsi->functions;
                              }
                        ?>
                   </div>
              </div>
         </div>
    </div>
</section>
