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
					<form id="form-edit-page_profile" name="form-edit-page_profile" class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>page_profile/update_page_file_type" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="form-group">
							    <label for="title" class="col-sm-2 control-label">Judul</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $page_profiles['title'];?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="slug" class="col-sm-2 control-label">Slug</label>
							    <div class="col-sm-10">
							    	<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $page_profiles['slug'];?>">
							    </div>
							</div>
							<div class="form-group" id="file-to-upload-display">
							    <label for="fileToUpload" class="col-sm-2 control-label">File</label>
							    <div class="col-sm-9">
							    	<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
							    </div>
							</div>
							<div class="form-group">
							    <label for="page_order" class="col-sm-2 control-label">Page Order</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="page_order" name="page_order" placeholder="Page Order" value="<?php echo $page_profiles['page_order'];?>">
							    </div>
							</div>
							<div class="form-group">
		                    		<label for="" class="col-sm-2 control-label"></label>
		                      		<div class="col-md-6">
		                      			<input id="id" name="id" type="hidden" value="<?php echo $page_profiles['id'];?>" />
		                        			<button type="submit" class="btn btn-success">Update</button>
		                        			<a id="btnReset" href="<?php echo base_url();?>page_profile" class="btn btn-primary">Cancel</a>
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
