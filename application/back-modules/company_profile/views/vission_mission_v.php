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
		        <form name="form-company-vission_mission" id="form-company-vission_mission" action="company_profile/save_vission_mission" method="post">
		          <div class="form-group">
		            <label for="vission_mission">Visi &amp; Misi</label>
		            <textarea class="form-control" id="vission_mission" name="vission_mission" rows="17">
		            	<?php print_r($vission_mission);?>
		            </textarea>
		          </div>
		          <button type="submit" class="btn btn-default" id="btn-save-company-vission_mission">Save</button>
		        </form>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
