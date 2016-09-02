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
				
				<form name="form-information" class="form-horizontal" id="form-information" method="post" action="information/update" enctype="multipart/form-data">

					<div class="form-group">
					    <label for="title" class="col-sm-2 control-label">Judul</label>
					    <div class="col-sm-9">
					    	<input type="text" class="form-control" id="title" name="title" value="<?php print_r($information['title']);?>" placeholder="Title">
					    </div>
					</div>
                    <div class="form-group">
					    <label for="slug" class="col-sm-2 control-label">Slug</label>
					    <div class="col-sm-9">
					    	<input type="text" class="form-control" id="slug" name="slug" value="<?php print_r($information['slug']);?>" placeholder="Slug">
					    </div>
					</div>
					<div class="form-group">
					    <label for="content" class="col-sm-2 control-label">Isi</label>
					    <div class="col-sm-9">
					    	<textarea id="content" name="content" class="form-control" placeholder="Type the content" style="width:100%;">
					    		<?php print_r($information['content']);?>
					    	</textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label for="feature_image" class="col-sm-2 control-label">Feature Image</label>
					    <div class="col-sm-9">
					    	<input type="file" class="form-control" id="fileToUpload" name="fileToUpload"/>
					    </div>
					</div>
					<div class="form-group">
                    	<label for="" class="col-sm-2 control-label"></label>
                      	<div class="col-md-6">
                      		<input type="hidden" class="form-control" id="information_id" name="information_id" value="<?php print_r($information['id']);?>">
                        	<button type="submit" class="btn btn-success">Update</button>
                        	<a href="<?php echo base_url().'information';?>" class="btn btn-primary">Cancel</a>
                      	</div>
                    </div>

				</form>

				<div class="clearfix"></div>
			  	<hr>
				
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
