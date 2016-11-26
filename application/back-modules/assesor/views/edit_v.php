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
					<form name="form-edit-assesor" class="form-horizontal" id="form-edit-assesor" method="post" action="assesor/update" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="form-group">
							    <label for="name" class="col-sm-2 control-label">Nama</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="name" name="name" value="<?php echo $assesor['name'];?>" placeholder="Assesor name">
							    </div>
							</div>
							<div class="form-group">
							    <label for="instance" class="col-sm-2 control-label">Instansi</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="instance" name="instance" value="<?php echo $assesor['instance'];?>" placeholder="Instance name">
							    </div>
							</div>
							<div class="form-group">
							    <label for="certificate_number" class="col-sm-2 control-label">Nomor Sertifikat</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="certificate_number" name="certificate_number" value="<?php echo $assesor['certificate_number'];?>" placeholder="Certificate Number">
							    </div>
							</div>
							<div class="form-group">
							    <label for="year_of_certificate" class="col-sm-2 control-label">Tahun Serifikasi</label>
							    <div class="col-sm-9">
							    	<select name="year_of_certificate" id="year_of_certificate" class="form-control">
							    		<option value="<?php echo $assesor['year_of_certificate'];?>" selected="selected"><?php echo $assesor['year_of_certificate']; ?></option>
							    		<?php for($i=1970;$i<=date('Y');$i++){ ?>

							    			<option value="<?php echo $i ?>" >
							    				<?php echo $i;?>
							    			</option>
							    		<?php } ?>
							    	</select>
							    </div>
							</div>
							<div class="form-group">
							    <label for="certificate_publisher" class="col-sm-2 control-label">Instansi Penerbit</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="certificate_publisher" name="certificate_publisher" value="<?php echo $assesor['certificate_publisher'];?>" placeholder="Certificate publisher">
							    </div>
							</div>
							<div class="form-group">
							    <label for="expertise" class="col-sm-2 control-label">Bidang/Sub Bidang</label>
							    <div class="col-sm-9">
							    	<input type="text" class="form-control" id="expertise" name="expertise" value="<?php echo $assesor['expertise'];?>" placeholder="Expertise">
							    </div>
							</div>
							<div class="form-group">
		                    	<label for="" class="col-sm-2 control-label"></label>
		                      	<div class="col-md-6">
		                      		<input type="hidden" id="assesor_id" name="assesor_id" value="<?php echo $assesor['id'];?>">
		                        	<button type="submit" class="btn btn-success">Submit</button>
		                        	<a href="<?php echo base_url().'assesor/';?>" class="btn btn-primary">Cancel</a>
		                      	</div>
		                    </div>
		                </div>

					</form>
				</div>
				<div class="clearfix"></div>
				<hr>
				
        		
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>


