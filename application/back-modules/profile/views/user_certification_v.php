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
                <div class="nav navbar-right">
					<div class="btn-group">
						<button id="btn-add" class="btn btn-sm btn-success" href="#"><i class="fa fa-plus"></i> Add</button>
					</div>
                </div>
				<div class="clearfix"></div>
            </div>

			<div class="x_content">
        		<div id="form-container" class="collapse">
        			<input type="hidden" id="user-certification-id" value="" />
					<form id="form-user-certification" name="form-user-certification" class="form-horizontal" method="post" action="profile/save_user_certification">

                    <div class="form-group">
					    <label for="registration_number" class="col-sm-2 control-label">Nomor Registrasi</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Registration number">
					    </div>
					</div>
					<div class="form-group">
					    <label for="certificate_number" class="col-sm-2 control-label">Nomor Sertifikat</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="certificate_number" name="certificate_number" placeholder="Certificate number">
					    </div>
					</div>
					<div class="form-group">
					    <label for="division_id" class="col-sm-2 control-label">ID Bidang</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="division_id" name="division_id" placeholder="Division ID">
					    </div>
					</div>
					<div class="form-group">
					    <label for="subdivision_id" class="col-sm-2 control-label">ID Sub-bagian</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="subdivision_id" name="subdivision_id" placeholder="Subdivision ID">
					    </div>
					</div>
					<div class="form-group">
					    <label for="competence_unit" class="col-sm-2 control-label">Unit Kompetensi</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="competence_unit" name="competence_unit" placeholder="Competence Unit">
					    </div>
					</div>
					<div class="form-group">
					    <label for="level" class="col-sm-2 control-label">Level</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="level" name="level" placeholder="Level">
					    </div>
					</div>
					<div class="form-group">
					    <label for="validity_period" class="col-sm-2 control-label">Masa Berlaku</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="validity_period" name="validity_period" placeholder="Validity Period">
					    </div>
					</div>
                    <div class="form-group">
                    	<label for="" class="col-sm-2 control-label"></label>
                      	<div class="col-md-6">
                        	<button type="submit" class="btn btn-success">Submit</button>
                        	<button id="btnReset" type="reset" class="btn btn-primary">Cancel</button>
                      	</div>
                    </div>
                    
                  </form>
				  
					<div class="clearfix"></div>
				  <hr>
				</div>
				<div id="dtUserCertification">
					<table id="datatable-buttons" class="table table-striped table-bordered">
	                    <thead>
	                      <tr>
	                        <th>#</th>
	                        <th>Nomor Registrasi</th>
	                        <th>Nomor Sertifikat</th>
	                        <th>ID Bidang</th>
	                        <th>ID Sub-bidang</th>
	                        <th>Unit Kompetensi</th>
	                        <th>Level</th>
	                        <th>Masa Berlaku</th>
							<th style="width: 50px;">Aksi</th>
	                      </tr>
	                    </thead>

	                    <tbody> </tbody>
	                </table>
                </div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>