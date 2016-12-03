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
							<li><a href="#tabCompetency" data-toggle="tab">4. Uji Kompetensi</a></li>
						</ul>
						 </div>
						  </div>
						</div>
						<div class="tab-content">
						    <div class="tab-pane" id="tabMain">
						     	<div class="form-group">
								    <label for="title" class="col-sm-2 control-label">Title</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="title" name="title" value="<?php echo $certification->title;?>" placeholder="Title">
								    </div>
								</div>
								<div class="form-group">
								    <label for="organizer" class="col-sm-2 control-label">Organizer</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="organizer" name="organizer" placeholder="Organizer" value="<?php echo $certification->organizer;?>">
								    </div>
								</div>
								<div class="form-group">
								    <label for="description" class="col-sm-2 control-label">Deskripsi Acara</label>
								    <div class="col-sm-6">
								    	<textarea id="description" name="description" class="form-control" placeholder="Description" style="width:100%;">
								    		<?php echo $certification->description;?>
								    	</textarea>
								    </div>
								</div>
								<div class="form-group">
								    <label for="supervisor_id" class="col-sm-2 control-label">Pengawas</label>
								    <div class="col-sm-6">
								    	<select id="supervisor_id" name="supervisor_id" class="form-control" style="width:100%;">
								    		<option value="<?php echo $certification->supervisor_id; ?>"><?php echo show_supervisor_detail($certification->supervisor_id)->first_name; ?></option>
								    		<?php echo $supervisor_options; ?>
								    	</select>
								    </div>
								</div>
						    </div>
						    <div class="tab-pane" id="tabPlaceAndTime">
						    	
								<div class="form-group">
								    <label for="place" class="col-sm-2 control-label">Tempat</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="place" name="place" placeholder="Place" value="<?php echo $certification->place;?>">
								    </div>
								</div>
								<div class="form-group">
								    <label for="start_date" class="col-sm-2 control-label">Tanggal Mulai</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start date" value="<?php echo $certification->start_date;?>">
								    </div>
								</div>
								<div class="form-group">
								    <label for="end_date" class="col-sm-2 control-label">Tanggal Selesai</label>
								    <div class="col-sm-6">
								    	<input type="text" class="form-control" id="end_date" name="end_date" placeholder="End date" value="<?php echo $certification->end_date;?>">
								    </div>
								</div>
						    </div>
						    <div class="tab-pane" id="tabAssesor">
						    	<a href="#" id="btn-display-assesor-datatables" class="btn btn-link" title="Select assesors to be added">
						            <i class="fa fa-list"></i>&nbsp;Select assesors
						        </a>
						        <br/>
						        <div class="table-responsive">

						            <table class="table table-bordered" id="table-selected-assesors">
						              <tr>
						                <th style="width:20%">Nama</th>
						                <th style="width:10%">Instansi</th>
						                <th style="width:20%">Nomor Sertifikat</th>
						                <th>Penerbit</th>
						                <th>Bidang/Sub Bidang</th>
						                <th>Jabatan</th>
						              </tr>
						             	<?php
						             		function get_current_position_display($position){
						             			$option_to_display = '';
						             			if($position == "leader"){
						             				$option_to_display .='<option value="leader" seleted>Ketua</option>';
						             				$option_to_display .='<option value="member">Anggota</option>';
						             			}
						             			else{
						             				$option_to_display .='<option value="leader">Ketua</option>';
						             				$option_to_display .='<option value="member" selected>Anggota</option>';
						             			}
						             			return $option_to_display;
						             		}
											$row_certification_assesor = '';
											if(count($certification_assesor)){
												foreach($certification_assesor as $cert_ass){
													$row_certification_assesor .='<tr class="tr_assesor_'.$cert_ass['assesor_id'].'">';
													$row_certification_assesor .=	'<td>';
													$row_certification_assesor .=	'<input type="hidden" name="assesor_id[]" value="'.$cert_ass['assesor_id'].'" class="selected_assesors" />';
													$row_certification_assesor .=	show_assesor_detail($cert_ass['assesor_id'])->name;
													$row_certification_assesor .=	'</td>';
													$row_certification_assesor .=	'<td>'.show_assesor_detail($cert_ass['assesor_id'])->instance.'</td>';
													$row_certification_assesor .=	'<td>'.show_assesor_detail($cert_ass['assesor_id'])->certificate_number.'</td>';
													$row_certification_assesor .=	'<td>'.show_assesor_detail($cert_ass['assesor_id'])->certificate_publisher.'</td>';
													$row_certification_assesor .=	'<td>'.show_assesor_detail($cert_ass['assesor_id'])->expertise.'</td>';
													$row_certification_assesor .=	'<td>';
													$row_certification_assesor .=		'<select name="position[]" class="form-control">';
													$row_certification_assesor .=			get_current_position_display($cert_ass['position']);
													$row_certification_assesor .=		'</select>';
													$row_certification_assesor .=	'</td>';
													$row_certification_assesor .='</tr>';
												}
											}
											else{
												$row_certification_assesor .='<tr>';
												$row_certification_assesor .=	'<td colspan="6">There are no selected assesor</td>';
												$row_certification_assesor .='</tr>';
											}
											echo $row_certification_assesor;
										?>
						            </table>
						        </div>
						    </div>
						    <div class="tab-pane" id="tabCompetency">
						    	<a href="#" id="btn-display-competency-datatables" class="btn btn-link" title="Select competencys to be added">
						            <i class="fa fa-list"></i>&nbsp;Select Competency
						        </a>
						        <br/>
						        <div class="table-responsive">
						            <table class="table" id="table-selected-competencies" style="width:100%;">
						            	<tr>
						            		<th>Name</th>
						            	</tr>
						            	<?php
						            		$row_certification_competency = '';
						            		if(count($certification_competency)){
						            			foreach($certification_competency as $cert_comp){
						            				$row_certification_competency .='<tr class="tr_competency_'.$cert_comp['competency_id'].'">';
						            				$row_certification_competency .=	'<td>';
						            				$row_certification_competency .=		'<input type="hidden" name="competency_id[]" value="'.$cert_comp['competency_id'].'" class="selected_competencies" />';
						            				$row_certification_competency .=		competency_detail($cert_comp['competency_id'])->name;
						            				$row_certification_competency .=	'</td>';
						            				$row_certification_competency .='</tr>';
						            			}
						            		}
						            		else{
						            			$row_certification_competency .= '<tr>';
						            			$row_certification_competency .=	'<td colspan="2">There are no selected competency</td>';
												$row_certification_competency .='</tr>';
						            		}
						            		echo $row_certification_competency;
						            	?>
						            </table>
						        </div>
						    </div>

						    <div class="form-group">
		                    	<label for="" class="col-sm-2 control-label"></label>
		                      	<div class="col-md-6">
		                      		<input type="hidden" name="id" value="<?php echo $certification->id;?>">
		                        	<button type="submit" class="btn btn-success">Save</button>
		                        	<a href="<?php echo base_url().'djk_management/certification/detail/'.$certification->id;?>" class="btn btn-primary">Cancel</a>
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
            <div id="dtassesor">
				<table id="datatable" class="table table-bordered" style="width:100%;">
                    <thead>
                        <th width="5%;">#</th>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-info" id="btn-set-assesors">Set selected assesors</button>
        </div>
      
      </div>
    </div>
  </div>
<!--ENDModal Display assesors datatables-->

<!--Modal Display competencies datatables-->
  <div class="modal fade" id="modal-display-competencies" tabindex="-1" role="dialog" aria-labelledby="modal-display-competenciesLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-display-competenciesLabel">Competencies list</h4>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            
				<table id="datatableCompetency" class="table table-bordered" style="width:100%;">

                    <thead>
                        <th>#</th>
                        <th>Name</th>
                    </thead>
                    <tbody></tbody>
                </table>
            
          </div>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-info" id="btn-set-competencies">Set selected competencies</button>
        </div>
      
      </div>
    </div>
  </div>
<!--ENDModal Display competencies datatables-->