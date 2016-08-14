<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_certification extends BackendController {

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
		set_page_title('Riwayat Sertifikasi');
	}

	//Block user_certification
	public function index(){
		$this->load->helper('data_table_helper');
		set_page_title('Riwayat Sertifikasi');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/user_certification.js'));

		render_template('user_certification_v');
	}

	public function get_user_certification(){
		//ini_set('error_reporting', E_STRICT);
		$this->Crud_m->table = 'user_certification';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save_user_certification(){
		$this->load->library('form_validation');

		$postData = $this->input->post();
		/*$json['msg'] = date_format(date_create($postData['validity_period']), "Y-m-d");
        echo json_encode( $json );
        exit();*/
		$this->form_validation->set_rules('registration_number', 'Nomor Registrasi', 'required');
		$this->form_validation->set_rules('certificate_number', 'Nomor Sertifikat', 'required');
		$this->form_validation->set_rules('division_id', 'ID Bidang', 'required|integer');
		$this->form_validation->set_rules('subdivision_id', 'ID Sub-bidang', 'required|integer');
		$this->form_validation->set_rules('competence_unit', 'Unit Kompetensi', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
      
        if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }
        else{
        	$user_certification_data = [
        	    'user_id' => 1,
        		'registration_number'=>$postData['registration_number'],
        		'certificate_number'=>$postData['certificate_number'],
        		'division_id'=>$postData['division_id'],
        		'subdivision_id'=>$postData['subdivision_id'],
        		'competence_unit'=>$postData['competence_unit'],
        		'level'=>$postData['level'],
        		'validity_period' => date_format(date_create($postData['validity_period']), "Y-m-d")
        	];
        	$save_user_certification = $this->db->insert('user_certification',$user_certification_data);
        	if($save_user_certification === TRUE){
        		$json['msg'] = 'success';
	        	echo json_encode($json);
	        	exit();	
        	}
        	$json['msg'] = $save_user_certification;
        	echo json_encode($json);
        	exit();
        	
        }
	}


	public function update_user_certification(){
		$postData = $this->input->post();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'required|integer');
		$this->form_validation->set_rules('registration_number', 'Nomor Registrasi', 'required');
		$this->form_validation->set_rules('certificate_number', 'Nomor Sertifikat', 'required');
		$this->form_validation->set_rules('division_id', 'ID Bidang', 'required|integer');
		$this->form_validation->set_rules('subdivision_id', 'ID Sub-bidang', 'required|integer');
		$this->form_validation->set_rules('competence_unit', 'Unit Kompetensi', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		if($this->form_validation->run() == FALSE){
            $json['msg'] = validation_errors();
            echo json_encode( $json );
            exit();
        }

        $update_user_certification = $this->db
        							 ->set('registration_number', $postData['registration_number'])
        							 ->set('certificate_number', $postData['certificate_number'])
        							 ->set('division_id', $postData['division_id'])
        							 ->set('subdivision_id', $postData['subdivision_id'])
        							 ->set('competence_unit', $postData['competence_unit'])
        							 ->set('level', $postData['level'])
        							 ->set('validity_period', date_format(date_create($postData['validity_period']), "Y-m-d"))
        							 ->where('id', $postData['id'])
        							 ->update('user_certification');
        if($update_user_certification === TRUE){
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
	//ENDBlock user_certification


}