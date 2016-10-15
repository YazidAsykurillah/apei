<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends BackendController {
	
	protected $data = array();

	protected $cust_css = array(
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

	protected $jsonResponse;

	public function __construct(){
		parent::__construct();
	}


	public function index(){
		$this->load->helper('data_table_helper');
		set_page_title('Member terdaftar');
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

	public function send_activation_code(){
		$activation_code = '';
		$id_members = $this->input->post('member_id');
		$member_email = $this->db->select('email')->from('members')->where('id', $id_members)->get()->row()->email;
		if($member_email != NULL){
			$activation_code = sha1($member_email).time();
			//set the activation code for this user
			$set_activation_code = $this->db->set('activation_code', $activation_code)->where('id_members', $id_members)->update('users');
			if($set_activation_code == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
			
		}
		else{
			$this->jsonResponse['msg'] = 'Email member kosong';
		}
		echo json_encode($this->jsonResponse);

	}


	protected function register_member_to_table_users(){
		$data_to_register = [];
		$member_id = $this->input->post('member_id');
		$this->jsonResponse['msg'] = $member_id;
		$member_columns = $this->db->select('id, email')->from('members')->where('id', $member_id)->get()->result();
		foreach($member_columns as $mc){
			$data_to_register['id_members'] = $mc->id;
			$data_to_register['email'] = $mc->email;
		}
		//now register this member to table users
		if(count($data_to_register) < 1){
			exit('Kosong');
		}
		else{
			//check if member is already registered to table user or not,
			//if user is already exist yes, we dont need to insert it.
			$user_exists = $this->db->select('id')->from('users')->where('id_members', $member_id)->get()->result();
			if(count($user_exists) < 1){ //user is not exist yet
				$register_member_to_table_users = $this->db->insert('users', $data_to_register);
				if($register_member_to_table_users == TRUE){
					return TRUE;
				}
				else{
					$this->jsonResponse['msg'] = $this->db->error();
					exit();
				}
			}
			else{
				return TRUE;
			}
			
		}
	}

	public function approve(){

		$this->load->library('form_validation');
		$this->load->model('Member_m');
		$postData = $this->input->post();
		$this->form_validation->set_rules('member_id', 'ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		$approve = $this->Member_m->approve($postData['member_id']);
		if($approve == TRUE){
			//register this member to table users;
			$this->register_member_to_table_users();
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $approve;
		}
		echo json_encode($this->jsonResponse);
	}

	public function disapprove(){

		$this->load->library('form_validation');
		$this->load->model('Member_m');
		$postData = $this->input->post();
		$this->form_validation->set_rules('disapproved_member_id', 'ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		$disapprove = $this->Member_m->disapprove($postData['disapproved_member_id']);
		if($disapprove == TRUE){
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $disapprove;
		}
		echo json_encode($this->jsonResponse);
	}


}