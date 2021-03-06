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
				<input type="hidden" id="video-id" value="" />
				<div id="form-container" class="collapse">
					<form name="form-video" class="form-horizontal" id="form-video" method="post" action="video/save">
						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Judul Video</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title of the video">
						    </div>
						</div>
						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Deskripsi</label>
						    <div class="col-sm-6">
						    	<textarea name="description" id="description" class="form-control" style="width:100%;"></textarea>
						    </div>
						</div>
						<div class="form-group">
						    <label for="yt_url" class="col-sm-2 control-label">URL Video</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="yt_url" name="yt_url" placeholder="Paste You Tube URL here">
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
				</div>
				<div id="dtVideo">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th width="20%;">Title</th>
	                        <th width="20%;">Description</th>
	                        <th>URL</th>
	                        <th>Embed</th>
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


<!--Delete video modal-->
<div id="modal-delete-video" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-video" name="form-delete-video" class="form-horizontal" method="post" action="galley/video/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>

      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus video</p>
			<input type="hidden" name="video_id" id="video_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END delete video modal-->

