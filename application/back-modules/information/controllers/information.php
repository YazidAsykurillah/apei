<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends BackendController {

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
		set_page_title('Informasi');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/information.js'));
		render_template('information');
	}

	public function certification_procedure(){
		set_page_title('Prosedur Sertifikasi');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/certification_procedure.js'));
		render_template('certification_procedure');
	}


	public function schedule(){
		set_page_title('Jadwal Uji Kompetensi');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/schedule.js'));
		render_template('schedule');

	}


	public function news_event(){
		set_page_title('Berita dan Kegiatan');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/news_event.js'));
		render_template('news_event');
	}

}
