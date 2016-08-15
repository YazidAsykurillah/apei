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
					<form id="form-user-education" name="form-user-education" class="form-horizontal" method="post" action="user_eduation/save_user_education">

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
					    <label for="school_name" class="col-sm-2 control-label">Nama Sekolah</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="school_name" name="school_name" placeholder="School name">
					    </div>
					</div>
					<div class="form-group">
					    <label for="title" class="col-sm-2 control-label">Gelar</label>
					    <div class="col-sm-6">
					    	<input type="text" class="form-control" id="title" name="title" placeholder="Title">
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
				<div id="dtMember">
					<table id="datatable-buttons" class="table table-striped table-bordered">
	                    <thead>
	                      <tr>
	                        <th>#</th>
	                        <th>Nama</th>
	                        <th>Email</th>
	                        <th>Foto</th>
							<th width="5%">Aksi</th>
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