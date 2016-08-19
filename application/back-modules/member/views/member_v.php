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
        		<div id="dtMember">
					<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                      	<tr>
		                        <th>#</th>
		                        <th>Nama</th>
		                        <th>Email</th>
		                        <th>Foto</th>
		                        <th>Tempat, tanggal lahir</th>
		                        <th>Approval Status</th>
								<th width="10%">Aksi</th>
	                      	</tr>
	                    </thead>
	                    <tbody>
	                    </tbody>
	                </table>
                </div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>


<!--Approve modal-->
<div id="modal-approve" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-approve-member" name="form-approve-member" class="form-horizontal" method="post" action="member/approve">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>
      
      	<div class="modal-body">
       		<p>Klik Approve untuk melakukan persetujuan</p>
			<input type="hidden" name="member_id" id="member_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Approve</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--ENDApprove modal-->

<!--Disapprove modal-->
<div id="modal-disapprove" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-disapprove-member" name="form-disapprove-member" class="form-horizontal" method="post" action="member/disapprove">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>
      
      	<div class="modal-body">
       		<p>Klik OK untuk melakukan disapproval</p>
			<input type="hidden" name="disapproved_member_id" id="disapproved_member_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">OK</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--ENDDisapprove modal-->