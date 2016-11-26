<?php
	$supervisor_options = '<option value="">-- Pilih Asesor --</option>';
	if(count($supervisors) != 0){
		foreach($supervisors->result() as $supervisor){
			$supervisor_options .='<option value="'.$supervisor->id.'">'.$supervisor->first_name.'</option>';
		}
	}
	else{
		$supervisor_options = '<option value="">Tidak terdapat data pengawas</option>';
	}
?>
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
                
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<form name="form-certification" class="form-horizontal" id="form-certification" method="post" action="<?php echo base_url().'djk_management/certification/save';?>">
					<div id="form-certification-wizard">
						<div class="navbar">
						  <div class="navbar-inner">
						    <div class="container">
						<ul>
						  	<li><a href="#tabMain" data-toggle="tab">1. General</a></li>
						  	<li><a href="#tabPlaceAndTime" data-toggle="tab">2. Waktu dan Tempat</a></li>
							<li><a href="#tabAssesor" data-toggle="tab">3. Daftar Asesor</a></li>
						</ul>
						 </div>
						  </div>
						</div>
						<div class="tab-content">
						    <div class="tab-pane" id="tabMain">
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
								    <label for="description" class="col-sm-2 control-label">Deskripsi Acara</label>
								    <div class="col-sm-6">
								    	<textarea id="description" name="description" class="form-control" placeholder="Description" style="width:100%;"></textarea>
								    </div>
								</div>
								<div class="form-group">
								    <label for="supervisor_id" class="col-sm-2 control-label">Pengawas</label>
								    <div class="col-sm-6">
								    	<select id="supervisor_id" name="supervisor_id" class="form-control" style="width:100%;">
								    		<?php echo $supervisor_options; ?>
								    	</select>
								    </div>
								</div>
						    </div>
						    <div class="tab-pane" id="tabPlaceAndTime">
						    	
								<div class="form-group">
								    <label for="place" class="col-sm-2 control-label">Tempat</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="place" name="place" placeholder="Place">
								    </div>
								</div>
								<div class="form-group">
								    <label for="start_date" class="col-sm-2 control-label">Tanggal Mulai</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start date">
								    </div>
								</div>
								<div class="form-group">
								    <label for="end_date" class="col-sm-2 control-label">Tanggal Selesai</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="end_date" name="end_date" placeholder="End date">
								    </div>
								</div>
						    </div>
						    <div class="tab-pane" id="tabAssesor">
						    	<a href="#" id="btn-display-assesor-datatables" class="btn btn-link" title="Select assesors to be added">
						            <i class="fa fa-list"></i>&nbsp;Select assesors
						        </a>
						        <br/>
						        <div class="table-responsive">
						            <table class="table" id="table-selected-assesors">
						              <tr>
						                <th style="width:20%">Nama</th>
						                <th style="width:10%">Instansi</th>
						                <th style="width:20%">Nomor Sertifikat</th>
						                <th>Penerbit</th>
						                <th>Bidang/Sub Bidang</th>
						                <th>Jabatan</th>
						              </tr>
						              <tr id="tr-no-assesor-selected">
						                <td colspan="7">No assesor selected</td>
						              </tr>
						            </table>
						        </div>
						    </div>

						    <div class="form-group">
		                    	<label for="" class="col-sm-2 control-label"></label>
		                      	<div class="col-md-6">
		                        	<button type="submit" class="btn btn-success">Save</button>
		                        	<a href="<?php echo base_url().'djk_management/certification';?>" class="btn btn-primary">Cancel</a>
		                      	</div>
		                    </div>

							<ul class="pager wizard">
								<li class="previous first" style="display:none;"><a href="#">First</a></li>
								<li class="previous"><a href="#">Previous</a></li>
								<li class="next last" style="display:none;"><a href="#">Last</a></li>
							  	<li class="next"><a href="#">Next</a></li>
							</ul>

						</div>
					</div>
				</form>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!--Modal Display assesors datatables-->
  <div class="modal fade" id="modal-display-assesors" tabindex="-1" role="dialog" aria-labelledby="modal-display-assesorsLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-display-assesorsLabel">Assesors list</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            
				<table id="datatable" class="table table-bordered">

                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Instansi</th>
                        <th>Nomor Sertifikat</th>
                        <th>Tahun Sertifikasi</th>
                        <th>Penerbit</th>
                        <th>Bidang/Sub-Bidang</th>
                    </thead>
                    <tbody></tbody>
                </table>
            
          </div>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-info" id="btn-set-assesors">Set selected assesors</button>
        </div>
      
      </div>
    </div>
  </div>
<!--ENDModal Display assesors datatables-->