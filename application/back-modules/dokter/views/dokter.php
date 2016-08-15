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
					<form class="form-horizontal form-label-left input_mask" id="form-dokter">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control" id="inputSuccess3" placeholder="Last Name">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                      <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" class="form-control" id="inputSuccess5" placeholder="Phone">
                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <button id="reset" type="reset" class="btn btn-primary pull-right">Cancel</button>
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                      </div>
                    </div>

                  </form>

					<div class="clearfix"></div>
				  <hr>
				</div>
				<table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
						<th style="width: 50px;">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
						<td>
							<div class="btn-group">
								<button class="btn btn-sm btn-warning" onclick="edit_form()"><i class="fa fa-edit"></i></button>
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</td>
                      </tr>
                      <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
						<td>
							<div class="btn-group">
								<button class="btn btn-sm btn-warning" onclick="edit_form()"><i class="fa fa-edit"></i></button>
								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</td>
                      </tr>

                    </tbody>
                  </table>
					</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
