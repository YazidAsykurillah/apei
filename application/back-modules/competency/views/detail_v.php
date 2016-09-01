<?php
	
	$competency_name = '';
	$competency_description = '';
	foreach($competency as $comp){
		
		$competency_name = $comp->name;
		$competency_description = $comp->description;
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
                <h2><i class="fa fa-list"></i> <?php echo $competency_name; ?></h2>
                <div class="nav navbar-right">
					<div class="btn-group">
						<a id="btn-back" class="btn btn-sm btn-link" href="<?php echo base_url().'competency';?>"><i class="fa fa-reply"></i> Back</a>
					</div>
                </div>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<?php echo $competency_description; ?>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

