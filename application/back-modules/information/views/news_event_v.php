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
        		<div id="dtNewsEvent">
					<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%;">
	                    <thead>
	                      	<tr>
		                        <th width="5%;">#</th>
		                        <th>Title</th>
		                        <th>Category</th>
		                        <th>Posted By</th>
		                        <th>Date Posted</th>
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


<!--Delete news event modal-->
<div id="modal-delete-news_event" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-news_event" name="form-delete-news_event" class="form-horizontal" method="post" action="news_event/delete">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>
      
      	<div class="modal-body">
       		<p>Klik delete untuk melakukan persetujuan</p>
			<input type="text" name="news_event_id" id="news_event_id" value="">
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--END delete news and event modal-->