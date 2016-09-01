<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competency extends BackendController {

	protected $data = array();

	protected $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		'assets/js/summernote/summernote.css',
		'assets/css/alertify/alertify.css',
	);
	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
		'assets/js/summernote/summernote.min.js',

	);

	

	public function __construct(){
		parent::__construct();
		set_page_title('Uji Kompetensi');
	}

	public function index(){
		set_page_title('Uji Kompetensi');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('competency/competency.js'));
		render_template('index_v');
	}

	public function get_competency(){
		$this->Crud_m->table = 'competencies';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();

		$this->form_validation->set_rules('name', 'Nama Kompetensi', 'required|min_length[3]');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$this->Crud_m->table = 'competencies';
			$data = [
				'name' => $postData['name'],
				'description' => $postData['description']
			];
			$save = $this->Crud_m->insert($data);
			if($save === TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}

	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();

		$this->form_validation->set_rules('name', 'Nama Kompetensi', 'required|min_length[3]');
		$this->form_validation->set_rules('description', 'Deskripsi', 'required|min_length[3]');
		$this->form_validation->set_rules('id', 'ID Kompetensi', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$update = $this->db
					->set('name', $postData['name'])
					->set('description', $postData['description'])
					->where('id', $postData['id'])
					->update('competencies');
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
		$id = $postData['id_to_delete'];
		$delete = $this->db->delete('competencies', array('id'=>$id));
		if($delete == TRUE){
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $this->db->error();
		}
		echo json_encode($this->jsonResponse);
	}

}