<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_Profile extends BackendController {

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
		'assets/js/tiny_mce/tiny_mce.js',
	);

	protected $jsonResponse;

	public function __construct(){
		parent::__construct();
		set_page_title('Profil Perusahaan');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('company_profile/company_profile.js'));
		render_template('company_profile');
	}


	//## Background --
	public function background(){
		set_page_title('Latar Belakang');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_customjs_path('company_profile/background.js'));
		$background = $this->db->select('background')->from('company_profile')->where('id', 1)->get()->row();
		render_template('background_v', $background );
	}

	public function save_background(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
	
		$this->form_validation->set_rules('background','Latar Belakang', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$save_background = $this->db
							->set('background', $postData['background'])
							->where('id', 1)
							->update('company_profile');
			if($save_background == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save_background;
			}
		}
		
		echo json_encode($this->jsonResponse);

	}

	//##END Background --

	//## Vission and Mission --
	public function vission_mission(){
		set_page_title('Visi dan Misi');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_customjs_path('company_profile/vission_mission.js'));
		$vission_mission = $this->db->select('vission_mission')->from('company_profile')->where('id', 1)->get()->row();
		render_template('vission_mission_v', $vission_mission );
	}

	public function save_vission_mission(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
	
		$this->form_validation->set_rules('vission_mission','Visi dan Misi', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$save_vission_mission = $this->db
							->set('vission_mission', $postData['vission_mission'])
							->where('id', 1)
							->update('company_profile');
			if($save_vission_mission == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save_vission_mission;
			}
		}
		
		echo json_encode($this->jsonResponse);

	}
	//##END Vission and Mission --


	//## Organization Structure --
	public function org_structure(){
		set_page_title('Struktur Organisasi');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_customjs_path('company_profile/org_structure.js'));
		$org_structure = $this->db->select('org_structure')->from('company_profile')->where('id', 1)->get()->row();
		render_template('org_structure_v', $org_structure );
	}

	public function save_org_structure(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
	
		$this->form_validation->set_rules('org_structure','Struktur Organisasin', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$save_org_structure = $this->db
							->set('org_structure', $postData['org_structure'])
							->where('id', 1)
							->update('company_profile');
			if($save_org_structure == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save_org_structure;
			}
		}
		
		echo json_encode($this->jsonResponse);

	}
	//##END Organization structure --


	//## Functions --
	public function functions(){
		set_page_title('Struktur Organisasi');
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_customjs_path('company_profile/functions.js'));
		$functions = $this->db->select('functions')->from('company_profile')->where('id', 1)->get()->row();
		render_template('functions_v', $functions );
	}

	public function save_functions(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
	
		$this->form_validation->set_rules('functions','Fungsi dan Peranan', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$save_functions = $this->db
							->set('functions', $postData['functions'])
							->where('id', 1)
							->update('company_profile');
			if($save_functions == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save_functions;
			}
		}
		
		echo json_encode($this->jsonResponse);

	}
	//##END Organization structure --




}
