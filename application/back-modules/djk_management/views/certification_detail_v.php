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
                <h2><i class="fa fa-list"></i>&nbsp;<?php echo $certification->title ;?></h2>
				<div class="clearfix"></div>
      		</div>

			<div class="x_content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Rincian</h3>
					</div>
					<div class="panel-body">
					    <div class="row">
					    	<div class="col-md-3">Title</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo $certification->title; ?></div>
					    </div>
					    <br/>
					    <div class="row">
					    	<div class="col-md-3">Organizer</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo $certification->organizer; ?></div>
					    </div>
					    <br/>
					    <div class="row">
					    	<div class="col-md-3">Place</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo $certification->place; ?></div>
					    </div>
					    <br/>
					    <div class="row">
					    	<div class="col-md-3">Deskripsi Acara</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo nl2br($certification->description); ?></div>
					    </div>
					    <br/>
					    <div class="row">
					    	<div class="col-md-3">Start Date</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo $certification->start_date; ?></div>
					    </div>
					    <br/>
					    <div class="row">
					    	<div class="col-md-3">End Date</div>
					    	<div class="col-md-1">:</div>
					    	<div class="col-md-8"><?php echo $certification->end_date; ?></div>
					    </div>

					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Asesor</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
			                        <th width="40%">Nama</th>
			                        <th width="40%">Data Sertifikasi</th>
									<th>Jabatan</th>
			                    </thead>
			                    <tbody>
								<?php
									$table_cert_ass = '';
									if(count($certification_assesor)){
										foreach($certification_assesor as $cert_ass){
											$table_cert_ass .='<tr>';
											$table_cert_ass .=	'<td>';
											$table_cert_ass .=		'<p><b>'.show_assesor_detail($cert_ass['assesor_id'])->name.'</b></p>';
											$table_cert_ass .=		'<p>('.show_assesor_detail($cert_ass['assesor_id'])->instance.')</p>';
											$table_cert_ass .=	'</td>';
											$table_cert_ass .=	'<td>';
											$table_cert_ass .=		'<p>'.show_assesor_detail($cert_ass['assesor_id'])->certificate_number.'</p>';
											$table_cert_ass .=		'<p>'.show_assesor_detail($cert_ass['assesor_id'])->year_of_certificate.'</p>';
											$table_cert_ass .=		'<p>'.show_assesor_detail($cert_ass['assesor_id'])->certificate_publisher.'</p>';
											$table_cert_ass .=		'<p>'.show_assesor_detail($cert_ass['assesor_id'])->expertise.'</p>';
											$table_cert_ass .=	'</td>';
											$table_cert_ass .=	'<td>';
											$table_cert_ass .=		$cert_ass['position']=='leader'?'Ketua':'Anggota';
											$table_cert_ass .=	'</td>';
											$table_cert_ass .='</tr>';
										}
									}
									echo $table_cert_ass;
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Panel Competency-->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Uji Kompetensi</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
			                        <th width="">Nama Kompetensi</th>
			                    </thead>
			                    <tbody>
								<?php
									$table_cert_comp = '';
									if(count($certification_competency)){
										foreach($certification_competency as $cert_comp){
											$table_cert_comp .='<tr>';
											$table_cert_comp .=	'<td>';
											$table_cert_comp .=		competency_detail($cert_comp['competency_id'])->name;
											$table_cert_comp .=	'</td>';
											$table_cert_comp .='</tr>';
										}
									}
									else{
										$table_cert_comp .='<tr>';
										$table_cert_comp .=	'<td colspan="2">';
										$table_cert_comp .=		'Tidak ada kompetensi terdaftar';
										$table_cert_comp .=	'</td>';
										$table_cert_comp .='</tr>';
									}
									echo $table_cert_comp;
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- ENDPanel Competency-->
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

