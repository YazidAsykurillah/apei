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
		        <form name="form-company-functions" id="form-company-functions" action="company_profile/save_functions" method="post">
		          <div class="form-group">
		            <label for="functions">Fungsi dan Peranan</label>
		            <textarea class="form-control" id="functions" name="functions" rows="17">
		            	<?php print_r($functions);?>
		            </textarea>
		          </div>
		          <button type="submit" class="btn btn-default" id="btn-save-company-functions">Save</button>
		        </form>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>