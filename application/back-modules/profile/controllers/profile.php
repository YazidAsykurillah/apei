<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends BackendController {

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

		//die();
		$this->load->helper('data_table_helper');
		set_page_title('Riwayat Sertifikasi');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_datatables_js());
		set_js(get_customjs_path('profile/user_certification.js'));

		render_template('user_certification');
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
		$this->form_validation->set_rules('registration_number', 'Nomor Registrasi', 'required');
		$this->form_validation->set_rules('certificate_number', 'Nomor Sertifikat', 'required');
		$this->form_validation->set_rules('division_id', 'ID Bidang', 'required');
		$this->form_validation->set_rules('subdivision_id', 'ID Sub-bidang', 'required');
		$this->form_validation->set_rules('competence_unit', 'Unit Kompetensi', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('validity_period', 'Masa Berlaku', 'required');
      
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
        		'validity_period'=>$postData['validity_period']
        	];
        	$save_user_certification = $this->db->insert('user_certification',$user_certification_data);
        	if($save_user_certification === TRUE){
        		$json['msg'] = 1;
	        	echo json_encode($json);
	        	exit();	
        	}
        	$json['msg'] = $save_user_certification;
        	echo json_encode($json);
        	exit();
        	
        }
	}

}
