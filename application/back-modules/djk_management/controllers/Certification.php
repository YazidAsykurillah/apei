<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification extends BackendController {

	protected $data = array();
	protected $cust_css = array(
		//'assets/js/datatables/jquery.dataTables.min.css',
		
		'assets/js/datatables/buttons.bootstrap.min.css',
		//'assets/js/datatables/jquery.dataTables.min.css',
		//'assets/css/datatables/jquery.dataTables_1_10_12.min.css',
		'https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		'assets/js/summernote/summernote.css',
		'assets/css/alertify/alertify.css',
		'assets/css/select2/select2.css',
	);
	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
		'assets/js/summernote/summernote.min.js',
		'assets/js/tiny_mce/tiny_mce.js',
		'assets/js/select2/select2.full.js',
		'assets/js/jquery_steps/jquery.bootstrap.wizard.js',
		

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
		$data['assesors'] = $this->getAssesors();
		render_template('certification_v', $data);
	}

	protected function getAssesors() {
        $this->db->select('id,name');
        $result = $this->db->get('assesors');
        return $result;
    }

    protected function getSupervisors()
    {
    	$this->db->select('id,first_name,last_name');
        $result = $this->db->get('users');
        return $result;
    }

	public function get_certification(){
		$this->Crud_m->table = 'certification_v';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function create()
	{
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('djk_management/create_certification.js'));
		set_page_title('Buat Acara Sertifikasi');
		$data['supervisors'] = $this->getSupervisors();
		render_template('add_certification_v', $data);
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('supervisor_id', 'Pengawas', 'required|integer');
		$this->form_validation->set_rules('organizer', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('place', 'Tempat', 'required');
		$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('assesor_id[]', 'Asesor', 'required');
		$this->form_validation->set_rules('position[]', 'Jabatan', 'required');
		$this->form_validation->set_rules('competency_id[]', 'Kompetensi', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$this->Crud_m->table = 'certifications';

			$this->data = [
				'title'=>$postData['title'],
				'supervisor_id'=>$postData['supervisor_id'],
				'organizer'=>$postData['organizer'],
				'description'=>$postData['description'],
				'place'=>$postData['place'],
				'start_date'=>date_format(date_create($postData['start_date']), "Y-m-d"),
				'end_date'=>date_format(date_create($postData['end_date']), "Y-m-d")
			];
			$save = $this->db->insert('certifications', $this->data);
			$certification_id = $this->db->insert_id();
			if($save === TRUE){
				$this->sync_certification_assesor($certification_id);
				$this->sync_certification_competency($certification_id);
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $save;
			}
		}
		echo json_encode($this->jsonResponse);
	}

	//Function to synchronize certification and competency
	protected function sync_certification_competency($certification_id)
	{
		
		$postData = $this->input->post();

		$row_certification_competency = [];
		
		foreach($postData['competency_id'] as $key=>$value){

			array_push($row_certification_competency, [
				'certification_id'=>$certification_id,
				'competency_id'=>$postData['competency_id'][$key],
			]);
		}

		$insert = $this->db->insert_batch('certification_competency', $row_certification_competency);
		return TRUE;

	}
	//ENDFunction to synchronize certification and competency

	//Function to synchronize certification and assesor
	protected function sync_certification_assesor($certification_id)
	{
		
		$postData = $this->input->post();

		$row_certification_assesor = [];
		
		foreach($postData['assesor_id'] as $key=>$value){

			array_push($row_certification_assesor, [
				'certification_id'=>$certification_id,
				'assesor_id'=>$postData['assesor_id'][$key],
				'position'=>$postData['position'][$key],
			]);
		}

		$insert = $this->db->insert_batch('certification_assesor', $row_certification_assesor);
		return TRUE;

	}
	//ENDFunction to synchronize certification and assesor





	public function detail($id =NULL)
	{
		$this->load->helper('assesor_helper');
		$this->load->helper('competency_helper');
		if(is_null($id)){
			redirect('/');
		}else{
			$certification = $this->db->get_where('certifications', ['id'=>$id])->row();
			if(count($certification)){
				set_page_title('Detail Sertifikasi');
				set_css($this->cust_css);
				set_js($this->cust_js);
				$data['certification_assesor'] = $this->db->get_where('certification_assesor',['certification_id'=>$id])->result_array();
				$data['certification_competency'] = $this->db->get_where('certification_competency',['certification_id'=>$id])->result_array();
				$data['certification'] = $certification;
				render_template('certification_detail_v', $data);
			}
			else{
				redirect('/');
			}
		}
	}

	
	public function edit($id=NULL)
	{
		if(is_null($id)){
			redirect('/');
		}else{
			$this->load->helper('assesor_helper');
			$this->load->helper('competency_helper');
			$certification = $this->db->get_where('certifications', ['id'=>$id])->row();
			if(count($certification)){
				$this->load->helper('data_table_helper');
				$this->load->helper('supervisor_helper');
				set_css($this->cust_css);
				set_js(get_datatables_js());
				set_js($this->cust_js);
				set_js(get_customjs_path('djk_management/edit_certification.js'));
				set_page_title('Edit Acara Sertifikasi');
				$data['supervisors'] = $this->getSupervisors();
				$data['certification_assesor'] = $this->db->get_where('certification_assesor',['certification_id'=>$id])->result_array();
				$data['certification_competency'] = $this->db->get_where('certification_competency',['certification_id'=>$id])->result_array();
				$data['certification'] = $certification;
				render_template('certification_edit_v', $data);
			}
			else{
				redirect('/');
			}
		}
	}
	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('description', 'Rincian acara', 'required|min_length[3]');
		$this->form_validation->set_rules('organizer', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('supervisor_id', 'Pengawas', 'required|integer');
		$this->form_validation->set_rules('place', 'Tempat', 'required');
		$this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('end_date', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('assesor_id[]', 'Asesor', 'required');
		$this->form_validation->set_rules('position[]', 'Jabatan', 'required');
		$this->form_validation->set_rules('competency_id[]', 'Kompetensi', 'required');

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
				//Block update certification_assesor relation
					//first delete it for convenience
					$del_cert_ass = $this->db->delete('certification_assesor', array('certification_id'=>$postData['id']));
					//now sync it
					$this->sync_certification_assesor($postData['id']);
				//ENDBlock update certification_assesor relation
					//delete relation
					$del_cert_comp = $this->db->delete('certification_competency', array('certification_id'=>$postData['id']));
					//sync
					$this->sync_certification_competency($postData['id']);
				//Block update certifcation competency relation

				//ENDBlock update certifcation competency relation
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
			//delete the certification relation to the assesor
			$del_cert_ass = $this->db->delete('certification_assesor', array('certification_id'=>$id));
			//delete certification relationto the competency
			$del_cert_comp = $this->db->delete('certification_competency', array('certification_id'=>$id));
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $this->db->error();
		}
		echo json_encode($this->jsonResponse);
	}


}
