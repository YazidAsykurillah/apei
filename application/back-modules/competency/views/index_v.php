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
					
					<form name="form-competency" class="form-horizontal" id="form-competency" method="post" action="competency/save" enctype="multipart/form-data">
						<div class="form-group">
						    <label for="name" class="col-sm-2 control-label">Nama Kompetensi</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="name" name="name" placeholder="Competence name">
						    </div>
						</div>
						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Isi</label>
						    <div class="col-sm-9">
						    	<textarea id="description" name="description" class="form-control" placeholder="Competence descriptions" style="width:100%;"></textarea>
						    </div>
						</div>
						<div class="form-group">
	                    	<label for="" class="col-sm-2 control-label"></label>
	                      	<div class="col-md-6">
	                      		<input type="hidden" name="competency_id" id="competency_id" value="">
	                        	<button type="submit" class="btn btn-success">Submit</button>
	                        	<button id="btnReset" type="reset" class="btn btn-primary">Cancel</button>
	                      	</div>
	                    </div>

					</form>

					<div class="clearfix"></div>
				  	<hr>
				</div>
        		<div id="dtCompetency">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th>Nama Kompetensi</th>
	                        <th>Deskripsi</th>
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


<!--Delete Competency modal-->
<div id="modal-delete-competency" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-competency" name="form-delete-competency" class="form-horizontal" method="post" action="competency/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>

      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus Halaman Ini</p>
       		<p>atau klik Cancel untuk membatalkan</p>
			<input type="hidden" name="id_to_delete" id="id_to_delete" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END delete Competency event modal-->
