<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends BackendController {

	var $data = array();
	var $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		'assets/js/datatables/select.datatable.css'
	);

	public function __construct(){
		parent::__construct();
		set_page_title('Data Dokter');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('dokter/dokter.js'));
		render_template('dokter');
	}

}
