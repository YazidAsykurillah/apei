<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Djk_management extends BackendController {

	protected $data = array();
	protected $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css'
	);

	public function __construct(){
		parent::__construct();
		set_page_title('Manajemen DJK');
	}

	public function index(){
		die("Index of Djk_management");
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('djk_management/djk_management.js'));
		render_template('djk_management_v');
	}


}
