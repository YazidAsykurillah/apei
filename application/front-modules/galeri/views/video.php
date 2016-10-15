<section id="title" class="asbestos" style="padding:20px 0 10px;">
        <div class="container">
           <div class="row">
                <div class="col-sm-6">
                    <h1>Video</h1>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="<?php echo base_url();?>">Home</a></li>
                        <li>Galeri</li>
                        <li class="active">Video</li>
                    </ul>
                </div>
           </div>
        </div>
    </section>

    <section id="portfolio" class="container">
        <?php
          $videos_display ='<div class="row">';
          if(count($videos)){
            $row_dispatcher = 0;
            foreach($videos->result() as $video){
              $row_dispatcher++;
              $videos_display .='<div class="col-md-4">';
              $videos_display .=  '<div class="panel panel-default">';
              $videos_display .=    '<div class="panel-heading">';
              $videos_display .=      '<h3 class="panel-title">'.$video->title.'</h3>';
              $videos_display .=    '</div>';
              $videos_display .=    '<div class="panel-body">';
              $videos_display .=      $video->embed_code;
              $videos_display .=    '</div>';
              $videos_display .=    '<div class="panel-footer">';
              $videos_display .=      '<button class="btn btn-xs btn-primary" data-toggle="collapse" data-target="#description_'.$video->id.'" aria-expanded="false" aria-controls="description_'.$video->id.'">';
              $videos_display .=        'Deskripsi';
              $videos_display .=      '</button><br/><br/>';
              $videos_display .=      '<div id="description_'.$video->id.'" class="collapse">';
              $videos_display .=        $video->description;
              $videos_display .=      '</div>';
              $videos_display .=    '</div>';
              $videos_display .=  '</div>';
              $videos_display .='</div>';

              if($row_dispatcher % 3 == 0){
              $videos_display .='</div>';
              $videos_display .='<div class="row">';
              }
            }
          }
          
          else{
            $videos_display .= '<p class="alert alert-info">';
            $videos_display .=   'Tidak ada video yang ditampilkan';
            $videos_display .= '</p>';
          }
          $videos_display .='</div>';
          echo $videos_display;
        ?>
    </section>
