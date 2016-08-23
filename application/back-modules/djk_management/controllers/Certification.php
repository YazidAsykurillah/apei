<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification extends BackendController {

	protected $data = array();
	protected $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		'assets/css/alertify/alertify.css',
		'assets/css/select2/select2.css',
	);
	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
		'assets/js/tiny_mce/tiny_mce.js',
		'assets/js/select2/select2.full.js',
		
	);

	public function __construct(){
		parent::__construct();
		set_page_title('Acara Sertifikasi');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('djk_management/certification.js'));
		$data['accessors'] = $this->getAccessors();
		render_template('certification_v', $data);
	}

	protected function getAccessors() {
        $this->db->select('id,first_name,last_name');
        $result = $this->db->get('users');
        return $result;
    }



	public function get_certification(){
		$this->Crud_m->table = 'certification_v';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('description', 'Rincian acara', 'required|min_length[3]');
		$this->form_validation->set_rules('accessor_id', 'Asesor', 'required|integer');
		$this->form_validation->set_rules('supervisor_id', 'Pengawas', 'required|integer');
		$this->form_validation->set_rules('organizer', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('place', 'Tempat', 'required');
		$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tanggal Mulai', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$this->Crud_m->table = 'certifications';
			
			$this->data = [
				'title'=>$postData['title'],
				'description'=>$postData['description'],
				'accessor_id'=>$postData['accessor_id'],
				'supervisor_id'=>$postData['supervisor_id'],
				'organizer'=>$postData['organizer'],
				'place'=>$postData['place'],
				'start_date'=>date_format(date_create($postData['start_date']), "Y-m-d"),
				'end_date'=>date_format(date_create($postData['end_date']), "Y-m-d")
			];
			$save = $this->Crud_m->insert($this->data);
			if($save === TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save;
			}
		}
		echo json_encode($this->jsonResponse);
	}


	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('description', 'Rincian acara', 'required|min_length[3]');
		$this->form_validation->set_rules('organizer', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('place', 'Tempat', 'required');
		$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('id', 'ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$update = $this->db
					  ->set('title', $postData['title'])
					  ->set('description', $postData['description'])
					  ->set('organizer', $postData['organizer'])
					  ->set('place', $postData['place'])
					  ->set('start_date', date_format(date_create($postData['start_date']), "Y-m-d"))
					  ->set('end_date', date_format(date_create($postData['end_date']), "Y-m-d"))
					  ->where('id', $postData['id'])
					  ->update('certifications');
			if($update == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);

	}

	public function delete(){
		$postData = $this->input->post();
		$id = $postData['certification_id'];
		$delete = $this->db->delete('certifications', array('id'=>$id));
		if($delete == TRUE){
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $this->db->error();
		}
		echo json_encode($this->jsonResponse);
	}


}