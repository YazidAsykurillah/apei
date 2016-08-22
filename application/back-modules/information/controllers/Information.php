<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends BackendController {

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
		set_page_title('Informasi');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/information.js'));
		render_template('information');
	}

	public function schedule(){
		set_page_title('Jadwal Uji Kompetensi');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/schedule.js'));
		render_template('schedule');

	}


	

}
