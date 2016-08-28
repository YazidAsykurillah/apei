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
					<form name="form-page_profile" class="form-horizontal" id="form-page_profile" method="post" action="page_profile/save" enctype="multipart/form-data">

						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Judul</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title">
						    </div>
						</div>
	                    <div class="form-group">
						    <label for="slug" class="col-sm-2 control-label">Slug</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
						    </div>
						</div>
						<div class="form-group">
						    <label for="type" class="col-sm-2 control-label">Type</label>
						    <div class="col-sm-9">
						    	<select name="type" id="type" class="form-control">
						    		<option value="texts">Text</option>
						    		<option value="files">File</option>
						    	</select>
						    </div>
						</div>
						<div class="form-group" id="content-display">
						    <label for="content" class="col-sm-2 control-label">Isi</label>
						    <div class="col-sm-9">
						    	<textarea id="content" name="content" class="form-control" placeholder="Type the content" style="width:100%;"></textarea>
						    </div>
						</div>
						<div class="form-group" id="file-to-upload-display">
						    <label for="fileToUpload" class="col-sm-2 control-label">File</label>
						    <div class="col-sm-9">
						    	<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
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
        		<div id="dtPageProfile">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th>Title</th>
	                        <th>Slug</th>
	                        <th>Type</th>
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
<div id="modal-delete-page_profile" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-page_profile" name="form-delete-page_profile" class="form-horizontal" method="post" action="page_profile/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>

      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus Halaman Ini</p>
       		<p>atau klik Cancel untuk membatalkan</p>
			<input type="hidden" name="page_profile_id" id="page_profile_id" value="">
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
