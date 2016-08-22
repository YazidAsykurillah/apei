<?php
	//print_r($certification_procedure);
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
        <div class="nav navbar-right"></div>
        <div class="clearfix"></div>
      </div>

			<div class="x_content">
        		<form id="form-certification_procedure" name="form-certification_procedure" class="form-horizontal" method="post" action="<?php echo base_url();?>information/certification_procedure/update">

                    <div class="form-group">
					    <label for="title" class="col-sm-2 control-label">Judul</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $page->title;?>">
					    </div>
					</div>
					<div class="form-group">
					    <label for="content" class="col-sm-2 control-label">Isi</label>
					    <div class="col-sm-6">
					    	<textarea id="content" name="content" class="form-control" placeholder="Type the content" style="width:100%;">
					    		<?php echo $page->content; ?>
					    	</textarea>
					    </div>
					</div>
					<div class="form-group">
					    <label for="slug" class="col-sm-2 control-label">Slug</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $page->slug;?>" disabled />
					    </div>
					</div>
					<div class="form-group">
                    	<label for="" class="col-sm-2 control-label"></label>
                      	<div class="col-md-6">
                      		<input id="id" name="id" type="hidden" value="<?php echo $page->id;?>" />
                        	<button type="submit" class="btn btn-success">Update</button>
                        	<a id="btnReset" href="<?php echo base_url();?>information/news_event" class="btn btn-primary">Cancel</a>
                      	</div>
                    </div>
				</form>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>