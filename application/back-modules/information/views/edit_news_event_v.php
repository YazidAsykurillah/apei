<?php
	//Block to display category options
	$category_options = '<option value="">--Pilih Kategory--</option>';
	if($news_event['category'] == 'news'){
		$category_options.='<option value="news" selected="selected">News</option>';
		$category_options.='<option value="event">Event</option>';
	}
	else{
		$category_options.='<option value="news">News</option>';
		$category_options.='<option value="event" selected="selected">Event</option>';
	}
?>
<?php
	//Block to display feature image

	$feature_image_display = '';
	$feature_image = $news_event['feature_image'];
	if(!is_null($feature_image)){
		$feature_image_display .='	<div class="thumbnail">';
		$feature_image_display .='		<div class="image view view-first">';
		$feature_image_display .='			<img style="width: 100%; display: block;" src="'.base_url('../uploads/'.$feature_image).'" alt="'.$feature_image.'">';
		$feature_image_display .='			<div class="mask no-caption">';
		$feature_image_display .='				<div class="tools tools-bottom">';
		$feature_image_display .='					<a href="#"><i class="fa fa-pencil"></i></a>';
		$feature_image_display .='					<a href="#" id="btn-remove-feature-image" data-id="'.$news_event['id'].'"><i class="fa fa-times"></i></a>';
		$feature_image_display .='				</div>';
		$feature_image_display .='			</div>';
		$feature_image_display .='		</div>';
		$feature_image_display .='		<div class="caption">';
		$feature_image_display .='			<p><strong>'.$feature_image.'</strong></p>';
		$feature_image_display .='			<p>'.$feature_image.'</p>';
		$feature_image_display .='		</div>';
		$feature_image_display .='	</div>';

		// $feature_image_display .= '<div class="thumbnail">';
		// $feature_image_display .= 	'<img src="http://localhost/apei/uploads/'.$feature_image.'" class="img-responsive" alt="...">';
		// $feature_image_display .=	'<div class="caption">';
		// $feature_image_display .=		'<p>';
		// $feature_image_display .=			'<a id="btn-remove-feature-image" class="btn btn-xs btn-danger" href="#" data-id="'.$news_event['id'].'" title="">';
		// $feature_image_display .=				'<i class="fa fa-trash"></i>';
		// $feature_image_display .=			'</a>';
		// $feature_image_display .=		'</p>';
		// $feature_image_display .=	'</div>';
		// $feature_image_display .= '</div>';
	}
?>
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
                <h2><i class="fa fa-list"></i> <?php echo get_page_title(); ?></h2>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<div class="row">
					<form id="form-edit-news_event" name="form-edit-news_event" class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>information/news_event/update" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="form-group">
							    <label for="title" class="col-sm-2 control-label">Judul</label>
							    <div class="col-sm-10">
							    		<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $news_event['title'];?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="content" class="col-sm-2 control-label">Isi</label>
							    <div class="col-sm-10">
							    	<textarea id="content" name="content" class="form-control" placeholder="Type the content" rows="15" style="width:100%;">
							    		<?php echo $news_event['content'];?>
							    	</textarea>
							    </div>
							</div>
							<div class="form-group">
							    <label for="category" class="col-sm-2 control-label">Kategori</label>
							    <div class="col-sm-10">
							    	<select id="category" name="category" class="form-control">
							    		<?php echo $category_options; ?>
							    	</select>
							    </div>
							</div>
							<div class="form-group">
		                    		<label for="" class="col-sm-2 control-label"></label>
		                      		<div class="col-md-6">
		                      			<input id="id" name="id" type="hidden" value="<?php echo $news_event['id'];?>" />
		                        			<button type="submit" class="btn btn-success">Update</button>
		                        			<a id="btnReset" href="<?php echo base_url();?>information/news_event" class="btn btn-primary">Cancel</a>
		                      		</div>
		                    	</div>
						</div>
						<div class="col-md-4">
		                    	<div class="form-group">

							    <div class="col-sm-8 col-sm-offset-4">
							    		<?php echo $feature_image_display; ?>
							    </div>
							</div>
							<div class="form-group">
								<label for="fileToUpload" class="col-sm-4 control-label">Feature image</label>
								<div class="col-sm-8 ">
									<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
								</div>
							</div>

						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			  	<hr>
			</div>

			<!-- <div class="clearfix"></div> -->
		</div>
	</div>
</div>
<div class="clearfix"></div>
