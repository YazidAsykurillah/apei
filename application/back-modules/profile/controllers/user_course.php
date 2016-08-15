<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_course extends BackendController {

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
		set_page_title('Riwayat Diklat / Kursus ');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/user_course.js'));
		render_template('user_course_v');
	}

	public function get_user_course(){
		//ini_set('error_reporting', E_STRICT);
		$this->Crud_m->table = 'user_course';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save_user_course(){
		$this->load->library('form_validation');

		$postData = $this->input->post();
		$this->form_validation->set_rules('start_date', 'Tahun Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tahun Selesai', 'required');
		$this->form_validation->set_rules('institution_name', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('description', 'Keterangan', 'required');
      
        if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }
        else{
        	$user_course_data = [
        	    'user_id' => 1,
        		'start_date'=>date_format(date_create($postData['start_date']), "Y-m-d"),
        		'end_date' => date_format(date_create($postData['end_date']), "Y-m-d"),
        		'institution_name' => $postData['institution_name'],
        		'description' => $postData['description'],
        	];
        	$save_user_course = $this->db->insert('user_course',$user_course_data);
        	if($save_user_course === TRUE){
        		$json['msg'] = 'success';
	        	echo json_encode($json);
	        	exit();	
        	}
        	$json['msg'] = $save_user_course;
        	echo json_encode($json);
        	exit();
        }
	}


	public function update_user_course(){
		$postData = $this->input->post();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'required|integer');
		$this->form_validation->set_rules('start_date', 'Tahun Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tahun Selesai', 'required');
		$this->form_validation->set_rules('institution_name', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('description', 'Keterangan', 'required');
		if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }

        $update_user_course = $this->db
        							 ->set('start_date', date_format(date_create($postData['start_date']), "Y-m-d"))
        							 ->set('end_date', date_format(date_create($postData['end_date']), "Y-m-d"))
        							 ->set('institution_name', $postData['institution_name'])
        							 ->set('description', $postData['description'])
        							 ->where('id', $postData['id'])
        							 ->update('user_course');
        if($update_user_course === TRUE){
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