<?php
	$assesors_options = '<option value="">-- Pilih Asesor --</option>';
	if(count($assesors) != 0){
		foreach($assesors->result() as $assesors){
			$assesors_options .='<option value="'.$assesors->id.'">'.$assesors->name.'</option>';
		}
	}
	else{
		$assesors_options = '<option value="">Tidak terdapat data asesor</option>';
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
                <div class="nav navbar-right">
					<div class="btn-group">
						<a title="Create new Certification" href="<?php echo base_url().'djk_management/certification/create';?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>Add</a>
					</div>
                </div>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				
        		<div id="dtCertification">
					<table id="datatable" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                        <th width="5%;">#</th>
	                        <th width="15%;">Title</th>
	                        <th>Pengawas</th>
	                        <th>Organizer</th>
	                        <th>Place</th>
	                        <th>Start Date</th>
	                        <th>End Date</th>
							<th width="15%">Aksi</th>
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