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
				<input type="hidden" id="album-id" value="" />
				<div id="form-container" class="collapse">
					<form name="form-album" class="form-horizontal" id="form-album" method="post" action="album/save">
						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Nama Album</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title of the album">
						    </div>
						</div>
						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Deskripsi</label>
						    <div class="col-sm-6">
						    	<textarea name="description" id="description" class="form-control" style="width:100%;"></textarea>
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
				<div id="dtAlbum">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th>Title</th>
	                        <th>Description</th>
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


