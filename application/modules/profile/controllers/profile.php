<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	
	var $data = array();
	var $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css'
	);
	
	public function __construct(){
		parent::__construct();
		set_page_title('Profile');
	}
	
	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/profile.js'));
		render_template('profile');
	}

	public function user_certification(){

		$this->load->helper('data_table_helper');
		set_page_title('Riwayat Sertifikasi');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/user_certification.js'));
		
		render_template('user_certification');
	}
	
}