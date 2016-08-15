<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends BackendController {
	protected $what = '';
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
		set_js(get_customjs_path('member/member.js'));
		render_template('member_v');
	}

	public function get_member(){
		//ini_set('error_reporting', E_STRICT);
		$this->Crud_m->table = 'members';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}


	public function approve(){

		$this->load->library('form_validation');

		$postData = $this->input->post();
		$this->form_validation->set_rules('member_id', 'ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
		}
		$approve = $this->db
					->set('status', 'ak')
					->where('id', $postData['member_id'])
					->update('members');

		$json['msg'] = 'success';
        echo json_encode( $json );
        exit();

	}


}