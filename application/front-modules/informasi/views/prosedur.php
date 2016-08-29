<section id="title" class="asbestos" style="padding:20px 0 10px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Prosedur Sertifikasi</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li>Informasi</li>
                        <li class="active">Prosedur Sertifikasi</li>
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
                              if($prosedur){
                                   echo $prosedur->content;
                              }
                        ?>
                        </div>
                   </div>
              </div>
         </div>
    </section>
