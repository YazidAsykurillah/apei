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
					<form name="form-assesor" class="form-horizontal" id="form-assesor" method="post" action="assesor/save" enctype="multipart/form-data">

						<div class="form-group">
						    <label for="name" class="col-sm-2 control-label">Nama</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="name" name="name" placeholder="Assesor name">
						    </div>
						</div>
						<div class="form-group">
						    <label for="instance" class="col-sm-2 control-label">Instansi</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="instance" name="instance" placeholder="Instance name">
						    </div>
						</div>
						<div class="form-group">
						    <label for="certificate_number" class="col-sm-2 control-label">Nomor Sertifikat</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="certificate_number" name="certificate_number" placeholder="Certificate Number">
						    </div>
						</div>
						<div class="form-group">
						    <label for="year_of_certificate" class="col-sm-2 control-label">Tahun Serifikasi</label>
						    <div class="col-sm-9">
						    	<select name="year_of_certificate" id="year_of_certificate" class="form-control">
						    		<option value="">--Select Year--</option>
						    		<?php for($i=1970;$i<=date('Y');$i++){ ?>

						    			<option value="<?php echo $i ?>">
						    				<?php echo $i;?>
						    			</option>
						    		<?php } ?>
						    	</select>
						    </div>
						</div>
						<div class="form-group">
						    <label for="certificate_publisher" class="col-sm-2 control-label">Instansi Penerbit</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="certificate_publisher" name="certificate_publisher" placeholder="Certificate publisher">
						    </div>
						</div>
						<div class="form-group">
						    <label for="expertise" class="col-sm-2 control-label">Bidang/Sub Bidang</label>
						    <div class="col-sm-9">
						    	<input type="text" class="form-control" id="expertise" name="expertise" placeholder="Expertise">
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
        		<div id="dtassesor">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th>Name</th>
	                        <th>Instansi</th>
	                        <th>Nomor Sertifikat</th>
	                        <th>Tahun Sertifikasi</th>
	                        <th>Penerbit</th>
	                        <th>Bidang/Sub-Bidang</th>
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
<div id="modal-delete-assesor" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-assesor" name="form-delete-assesor" class="form-horizontal" method="post" action="assesor/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>

      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus Assesor Ini</p>
       		<p>atau klik Cancel untuk membatalkan</p>
			<input type="hidden" name="assesor_id" id="assesor_id" value="">
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
