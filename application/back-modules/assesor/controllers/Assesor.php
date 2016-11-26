<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assesor extends BackendController {

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
		set_page_title('Assesor');
	}

	public function index(){

		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('assesor/index.js'));
		render_template('index_v');
	}


	public function get_assesors(){
		$this->Crud_m->table = 'assesors';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]',
			array('required'=>'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('instance', 'Instansi', 'required', 
			array('required'=>'Instansi tidak boleh kosong'));
		$this->form_validation->set_rules('certificate_number', 'Nomor Sertifikat', 'required', 
			array('required'=>'Nomor sertifikat tidak boleh kosong'));
		$this->form_validation->set_rules('expertise', 'Bidang', 'required',
			array('required'=>'Bidang/Sub Bidang tidak boleh kosong'));
		$this->form_validation->set_rules('year_of_certificate', 'Tahun Sertifikasi', 'required',
			array('required'=>'Tahun sertifikasi tidak boleh kosong'));
		$this->form_validation->set_rules('certificate_publisher', 'Penerbit', 'required',
			array('required'=>'Penerbit tidak boleh kosong'));
		
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			
			$this->Crud_m->table = 'assesors';
			$this->data = [
				'name'=>$postData['name'],
				'instance'=>$postData['instance'],
				'certificate_number'=>$postData['certificate_number'],
				'expertise'=>$postData['expertise'],
				'year_of_certificate'=>$postData['year_of_certificate'],
				'certificate_publisher'=>$postData['certificate_publisher'],
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

	public function edit(){
		$id = $this->input->get('id');
		if($id == NULL){
			exit("what is you gonna do?");
		}
		else{
			$this->Crud_m->table = 'assesors';
			$assesor = $this->Crud_m->getById($id);
			$data['assesor'] = $assesor;
			if($assesor != NULL){
				set_page_title('Edit Assesor');
				set_css($this->cust_css);
				set_js($this->cust_js);
				set_js(get_customjs_path('assesor/edit.js'));
				render_template('edit_v', $data);
			}
			else{
				echo "Not Found";
				exit();
			}
		}
	}

	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]',
			array('required'=>'Nama tidak boleh kosong'));
		$this->form_validation->set_rules('instance', 'Instansi', 'required', 
			array('required'=>'Instansi tidak boleh kosong'));
		$this->form_validation->set_rules('certificate_number', 'Nomor Sertifikat', 'required', 
			array('required'=>'Nomor sertifikat tidak boleh kosong'));
		$this->form_validation->set_rules('expertise', 'Bidang', 'required',
			array('required'=>'Bidang/Sub Bidang tidak boleh kosong'));
		$this->form_validation->set_rules('year_of_certificate', 'Tahun Sertifikasi', 'required',
			array('required'=>'Tahun sertifikasi tidak boleh kosong'));
		$this->form_validation->set_rules('certificate_publisher', 'Penerbit', 'required',
			array('required'=>'Penerbit tidak boleh kosong'));
		$this->form_validation->set_rules('assesor_id', 'ID', 'integer|required');

		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			
			
			$updateData = [
				'name'=>$postData['name'],
				'instance'=>$postData['instance'],
				'certificate_number'=>$postData['certificate_number'],
				'expertise'=>$postData['expertise'],
				'year_of_certificate'=>$postData['year_of_certificate'],
				'certificate_publisher'=>$postData['certificate_publisher'],
			];
			$this->db->where('id', $postData['assesor_id']);
			$update = $this->db->update('assesors', $updateData);
			
			$this->jsonResponse['msg'] = 'success';
		}
		echo json_encode($this->jsonResponse);

	}

	public function delete(){
		$postData = $this->input->post();
		$id = $postData['assesor_id'];

		$delete = $this->db->delete('assesors', array('id' => $id));
		if($delete == TRUE){
			
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $delete;
		}
		echo json_encode($this->jsonResponse);
	}



}
