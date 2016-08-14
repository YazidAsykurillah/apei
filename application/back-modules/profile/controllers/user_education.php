<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_education extends BackendController {

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
		set_page_title('Riwayat Pendidikan');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/user_education.js'));
		render_template('user_education_v');
	}

	public function get_user_education(){
		//ini_set('error_reporting', E_STRICT);
		$this->Crud_m->table = 'user_education';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save_user_education(){
		$this->load->library('form_validation');

		$postData = $this->input->post();
		$this->form_validation->set_rules('start_date', 'Tahun Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tahun Selesai', 'required');
		$this->form_validation->set_rules('school_name', 'Nama Sekolah', 'required');
		$this->form_validation->set_rules('title', 'Gelar', 'required');
      
        if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }
        else{
        	$user_education_data = [
        	    'user_id' => 1,
        		'start_date'=>date_format(date_create($postData['start_date']), "Y-m-d"),
        		'end_date' => date_format(date_create($postData['end_date']), "Y-m-d"),
        		'school_name' => $postData['school_name'],
        		'title' => $postData['title'],
        	];
        	$save_user_education = $this->db->insert('user_education',$user_education_data);
        	if($save_user_education === TRUE){
        		$json['msg'] = 'success';
	        	echo json_encode($json);
	        	exit();	
        	}
        	$json['msg'] = $save_user_education;
        	echo json_encode($json);
        	exit();
        }
	}

	public function update_user_education(){
		$postData = $this->input->post();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'required|integer');
		$this->form_validation->set_rules('start_date', 'Tahun Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tahun Selesai', 'required');
		$this->form_validation->set_rules('school_name', 'Nama Sekolah', 'required');
		$this->form_validation->set_rules('title', 'Gelar', 'required');
		if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }

        $update_user_education = $this->db
        							 ->set('start_date', date_format(date_create($postData['start_date']), "Y-m-d"))
        							 ->set('end_date', date_format(date_create($postData['end_date']), "Y-m-d"))
        							 ->set('school_name', $postData['school_name'])
        							 ->set('title', $postData['title'])
        							 ->where('id', $postData['id'])
        							 ->update('user_education');
        if($update_user_education === TRUE){
        	$json['msg'] = 'success';
            echo json_encode( $json );
            exit();
        }
        else{
			$json['msg'] = 'Buggy Error';
            echo json_encode( $json );
            exit();        	
        }

	}



}