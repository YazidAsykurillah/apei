<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1>Latar Belakang</h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="index.html">Home</a></li>
                   <li>Profile</li>
                   <li class="active">Latar Belakang</li>
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
                              if(isset($latar)){
                                   echo $latar->background;
                              }
                        ?>
                   </div>
              </div>
         </div>
    </div>
</section>
