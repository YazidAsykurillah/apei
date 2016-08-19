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
		        <form name="form-company-org_structure" id="form-company-org_structure" action="company_profile/save_org_structure" method="post">
		          <div class="form-group">
		            <label for="org_structure">Struktur Organisasi</label>
		            <textarea class="form-control" id="org_structure" name="org_structure" rows="15">
		            	<?php print_r($org_structure);?>
		            </textarea>
		          </div>
		          <button type="submit" class="btn btn-default" id="btn-save-company-org_structure">Save</button>
		        </form>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>