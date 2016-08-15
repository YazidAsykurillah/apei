<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends BackendController {

	var $data = array();
	var $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		'assets/css/alertify/alertify.css',
	);

	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
	);

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_page_title('Members ');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/member.js'));
		render_template('member_v');
	}

	



}