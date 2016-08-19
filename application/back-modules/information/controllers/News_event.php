<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_event extends BackendController {

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
		set_page_title('Berita dan Kegiatan');
	}

	public function index(){
		set_page_title('Berita dan Kegiatan');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/news_event.js'));
		render_template('news_event_v');
	}

	public function get_news_event(){
		$this->Crud_m->table = 'news_event';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

}