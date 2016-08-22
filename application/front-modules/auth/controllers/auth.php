<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		// if($this->ion_auth->logged_in()){
		// 	redirect(site_url(), 'refresh');
		// }
	}

	// redirect if needed, otherwise display the user list
	function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('home', 'refresh');
		}elseif (!$this->ion_auth->is_admin()){
			return show_error('You must be an administrator to view this page.');
		}else{
			redirect('home', 'refresh');
		}
	}

	// log the user in
	function login(){
		// die('das');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');

			if($this->ion_auth->login($user, $pass)){
				$user = $this->ion_auth->user()->row();
				if($user->id_members){
					$this->load->model('mUser');
					$dtUser = $this->mUser->getByID($user->id_members);
					$newdata = array(
				        'id_members'  => $user->id_members,
					   'groups' => $this->ion_auth->get_users_groups($user->id)->row()->id,
				        'nama'     => $dtUser->name,
				        'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
				}
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('home', 'refresh');
			}else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect(site_url(), 'refresh');
			}

		}else{
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'username',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('username'),
			);

			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->load->view('login', $this->data);
		}
	}


	// change password
	function change_password(){

	}

	// forgot password
	function forgot_password(){

	}

	// reset password - final step for forgotten password
	public function reset_password($code = NULL){

	}


	// activate the user
	function activate($id, $code=false){

	}

	// deactivate the user
	function deactivate($id = NULL){

	}

	// create a new user
	function create_user(){

    }

	// edit a user
	function edit_user($id){

	}

	// create a new group
	function create_group(){

	}

	// edit a group
	function edit_group($id){

	}


	function _get_csrf_nonce(){

	}

	function _valid_csrf_nonce(){

	}

	function _render_page($view, $data=null, $returnhtml=false){

	}

}
