<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if($this->ion_auth->logged_in()){
			redirect(site_url(), 'refresh');
		}
	}

	// redirect if needed, otherwise display the user list
	function index(){
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}elseif (!$this->ion_auth->is_admin()){
			return show_error('You must be an administrator to view this page.');
		}else{
			redirect('home', refresh);
		}
	}

	// log the user in
	function login(){
	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == true){
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			
			if($this->ion_auth->login($user, $pass)){
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('home', 'refresh');
			}else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); 
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

	// log the user out
	function logoutr(){
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
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
