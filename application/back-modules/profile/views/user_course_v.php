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
        			<input type="hidden" id="user-course-id" value="" />
					<form id="form-user-course" name="form-user-course" class="form-horizontal" method="post" action="user_course/save_user_course">

                    <div class="form-group">
					    <label for="start_date" class="col-sm-2 control-label">Tahun Mulai</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
					    </div>
					</div>
					<div class="form-group">
					    <label for="end_date" class="col-sm-2 control-label">Tahun Selesai</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
					    </div>
					</div>
					<div class="form-group">
					    <label for="institution_name" class="col-sm-2 control-label">Nama Lembaga</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="institution_name" name="institution_name" placeholder="Intstitution name">
					    </div>
					</div>
					<div class="form-group">
					    <label for="description" class="col-sm-2 control-label">Keterangan</label>
					    <div class="col-sm-6">
					    	<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
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
				<div id="dtUserCourse">
					<table id="datatable-buttons" class="table table-striped table-bordered">
	                    <thead>
	                      <tr>
	                        <th width="5%;">#</th>
	                        <th width="15%;">Tahun Mulai</th>
	                        <th width="15%;">Tahun Selesai</th>
	                        <th width="30%;">Nama Lembaga</th>
	                        <th width="25%;">Keterangan</th>
							<th width="10%;">Aksi</th>
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