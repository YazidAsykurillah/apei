<?php
	$display_photo = '';
	if(count($photos_of_album)){
		foreach($photos_of_album as $poa){
			$display_photo .='<div class="col-sm-6 col-md-3">';
			$display_photo .=	'<div class="thumbnail" style="height:265px;">';
			$display_photo .=		'<img src="http://localhost/apei/uploads/'.$poa['file_name'].'" alt="'.$poa['file_name'].'" style="min-height:165.19px;">';
			$display_photo .=		'<div class="caption">';
			$display_photo .=			'<p>'.$poa['title'].'</p>';
			$display_photo .=			'<p>';
			$display_photo .=				'<a href="#" class="btn btn-danger btn-sm btn-delete-photo" data-id="'.$poa['id'].'">';
			$display_photo .=					'<i class="fa fa-trash"></i>';
			$display_photo .=				'</a>';
			$display_photo .=			'</p>';
			$display_photo .=		'</div>';
			$display_photo .=	'</div>';
			$display_photo .='</div>';
		}
	}
	else{
		$display_photo.='<p class="alert alert-info">Tidak ada foto dalam album ini, silahkan tambahkan dengan klik tombol Upload Foto</p>';
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
						<button id="btn-add" class="btn btn-sm btn-success" href="#" title="Klik untuk upload foto pada album ini"><i class="fa fa-plus"></i> Upload Foto</button>
					</div>
                </div>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<div id="form-container" class="collapse">
					<form name="form-upload-photo" class="form-horizontal" id="form-upload-photo" method="post" action="<?php echo base_url();?>gallery/album/upload_photo" enctype="multipart/form-data">
						<div class="form-group">
						    <label for="title" class="col-sm-2 control-label">Judul Foto</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" id="title" name="title" placeholder="Title of the photo">
						    </div>
						</div>
						<div class="form-group">
						    <label for="" class="col-sm-2 control-label"></label>
						    <div class="col-sm-6">
						    	<input type="file" name="fileToUpload" id="fileToUpload">
						    </div>
						</div>
						<div class="form-group">
	                    	<label for="" class="col-sm-2 control-label"></label>
	                      	<div class="col-md-6">
	                      		<input type="hidden" id="album_id" name="album_id" value="<?php echo $album_detail->id;?>">
	                        	<button type="submit" class="btn btn-success">Submit</button>
	                        	<button id="btnReset" type="reset" class="btn btn-primary">Cancel</button>
	                      	</div>
	                    </div>
					</form>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title"><?php echo $album_detail->title; ?></h3>
					</div>
					<div class="panel-body">
					 	<?php echo $display_photo; ?>
					</div>
				</div>

			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!--Delete news event modal-->
<div id="modal-delete-photo" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="form-delete-photo" name="form-delete-photo" class="form-horizontal" method="post" action="album/delete_photo">
    	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title">Konfirmasi</h4>
      	</div>

      	<div class="modal-body">
       		<p>Klik tombol Delete untuk menghapus foto pada album</p>
			<input type="text" name="photo_id" id="photo_id" value="">
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
