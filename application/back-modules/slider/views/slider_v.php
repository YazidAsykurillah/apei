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
					<input type="hidden" id="slider-id" value="" />
					<form name="form-slider" id="form-slider" class="form-horizontal" method="post" action="<?php echo base_url();?>slider/save" enctype="multipart/form-data">
						<div class="form-group">
						    <label for="" class="col-sm-2 control-label">Foto</label>
						    <div class="col-sm-6">
						    	<div id="original_photo"></div>
						    	<input type="file" name="fileToUpload" id="fileToUpload">
						    </div>
						</div>

						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Title</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title">
						    </div>
						</div>
						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Deskripsi</label>
						    <div class="col-sm-6">
						    	<textarea name="description" id="description" class="form-control"></textarea>
						    </div>
						</div>
						<div class="form-group">
						    <label for="display_status" class="col-sm-2 control-label">Status Display</label>
						    <div class="col-sm-6">
						    	<select name="display_status" id="display_status" class="form-control">
						    		<option value="active">Aktif</option>
						    		<option value="inactive">Tidak Aktif</option>
						    	</select>
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
        		<div id="dtSlider">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th width="25%;">Foto</th>
	                        <th>Title</th>
	                        <th>Description</th>
	                        <th width="10%;">Display Status</th>
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

<!--Delete Slider modal-->
<div id="modal-delete-slider" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-slider" name="form-delete-slider" class="form-horizontal" method="post" action="slider/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>
      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus Slider</p>
			<input type="text" name="slider_id" id="slider_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END delete Slider modal-->