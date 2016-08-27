<section id="title" class="asbestos" style="padding:20px 0 10px;">
        <div class="container">
           <div class="row">
                <div class="col-sm-6">
                    <h1>Foto</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li>Galeri</li>
                        <li class="active">Foto</li>
                    </ul>
                </div>
           </div>
        </div>
    </section>
    <?php
     if($photo){
          $the_photo = array();
    ?>
    <section id="portfolio" class="container">
         <div class="row">
             <div class="col-md-3">
                   <div class="list-group portfolio-filter">
                        <a href="#" class="list-group-item active" data-filter="*">Semua</a>
                         <?php
                              $i = 0;
                              foreach ($photo as $pt) {
                                   $the_photo[$i] = $pt['galeri'];
                         ?>
                              <a href="#" class="list-group-item" data-filter=".<?php echo "the-filter-".$pt['id']?>"><?php echo $pt['title'];?></a>
                         <?php
                                   $i++;
                              }
                        ?>
                  </div>
             </div>
             <div class="col-md-9">
                  <?php //var_dump($photo);?>
                   <ul class="portfolio-items col-3">
                        <?php
                              if($the_photo){
                                   foreach ($the_photo as $tp) {
                                        foreach ($tp as $tphoto) {


                         ?>
                              <li class="portfolio-item <?php echo "the-filter-".$tphoto['albums'];?>">
                                 <div class="item-inner">
                                      <!-- <div class="embed-responsive embed-responsive-4by3">
                                           <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/S8RNgeNcQSU"></iframe>
                                      </div> -->
                                     <img src="<?php echo base_url('uploads/'.$tphoto['file_name']);?>" alt="<?php echo $tphoto['title'];?>">
                                     <h5><?php echo $tphoto['title'];?></h5>
                                     <div class="overlay">
                                         <a class="preview btn btn-danger" href="<?php echo base_url('uploads/'.$tphoto['file_name']);?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                     </div>
                                 </div>
                              </li>
                         <?php
                                        }
                                   }
                              }
                        ?>
                  </ul>
             </div>
         </div>
    </section>
<?php } ?>
