<div class="page-title">
	<div class="title_left">
	  <h3><?php echo get_page_title(); ?></h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
                <h2><?php echo $information['title']; ?></h2>
                <div class="nav navbar-right">
					<div class="btn-group">
						<a class="btn btn-sm btn-link" href="<?php echo base_url().'information';?>" title="Kembali ke daftar informasi">
							<i class="fa fa-reply"></i> Back
						</a>
						<a class="btn btn-sm btn-link" href="<?php echo base_url().'information/edit/?id='.$information['id'];?>" title="Edit informasi ini">
							<i class="fa fa-cog"></i> Edit
						</a>
					</div>
                </div>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-8">
						<?php echo $information['content'];?>
					</div>
					<div class="col-md-4">
						<?php
							$feature_image_display = '';
							if($information['feature_image'] == NULL){

							}
							else{
								$feature_image_display.='<div class="thumbnail">';
								$feature_image_display.=	'<img src="'.base_url().'../uploads/'.$information['feature_image'].'" alt="...">';
								$feature_image_display.='</div>';
							}
							echo $feature_image_display;
						?>
					</div>
				</div>
				<div class="row">
					<span class="label label-default" title="Posted by">
						<i class="fa fa-user" ></i>&nbsp;<?php echo $information['poster_name'];?>
					</span>&nbsp;
					<span class="label label-default" title="Created at">
						<i class="fa fa-calendar-check-o"></i>&nbsp;<?php echo $information['created_at'];?>
					</span>&nbsp;
					<span class="label label-default" title="Display status">
						<?php
							$display_status_display = '';
							if($information['display_status'] == 'displayed'){
								$display_status_display = 'Displayed';
							}
							else{
								$display_status_display = 'Hidden';
							}
						?>
						<i class="fa fa-desktop"></i>&nbsp;<?php echo $display_status_display ;?>
					</span>
				</div>

			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
