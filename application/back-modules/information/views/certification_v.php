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
					<input type="hidden" id="certification-id" value="" />
					<form name="form-certification" class="form-horizontal" id="form-certification" method="post" action="certification/save">
						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Title</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title">
						    </div>
						</div>
	                    <div class="form-group">
						    <label for="organizer" class="col-sm-2 control-label">Organizer</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="organizer" name="organizer" placeholder="Organizer">
						    </div>
						</div>
						<div class="form-group">
						    <label for="place" class="col-sm-2 control-label">Place</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="place" name="place" placeholder="Place">
						    </div>
						</div>
						<div class="form-group">
						    <label for="start_date" class="col-sm-2 control-label">Start Date</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start date">
						    </div>
						</div>
						<div class="form-group">
						    <label for="end_date" class="col-sm-2 control-label">End Date</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="end_date" name="end_date" placeholder="End date">
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
        		<div id="dtCertification">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th>Title</th>
	                        <th>Organizer</th>
	                        <th>Place</th>
	                        <th>Start Date</th>
	                        <th>End Date</th>
							<th width="10%">Aksi</th>
	                    </thead>
	                    <tbody></tbody>
	                </table>
                </div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>


<!--Delete news event modal-->
<div id="modal-delete-certification" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-certification" name="form-delete-certification" class="form-horizontal" method="post" action="certification/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>
      
      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus Acara sertifikasi</p>
			<input type="hidden" name="certification_id" id="certification_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END delete news and event modal-->