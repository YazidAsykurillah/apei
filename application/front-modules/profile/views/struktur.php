<section id="title" class="asbestos" style="padding:20px 0 10px;">
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h1>Struktur Organisasi</h1>
           </div>
           <div class="col-sm-6">
               <ul class="breadcrumb pull-right">
                   <li><a href="index.html">Home</a></li>
                   <li>Profile</li>
                   <li class="active">Struktur Organisasi</li>
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
                              if(isset($struktur)){
                                   echo $struktur->org_structure;
                              }
                        ?>
                   </div>
              </div>
         </div>
    </div>
</section>
