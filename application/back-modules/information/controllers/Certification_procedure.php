<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification_procedure extends BackendController {

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

	public function __construct(){
		parent::__construct();
		set_page_title('Prosedur Sertifikasi');
	}

	public function index(){
		$this->Crud_m = 'pages';
		$slug = 'certification-procedure';
		$data['page'] = $this->db->get_where('pages', array('slug'=>$slug))->row();
		set_css($this->cust_css);
		set_js($this->cust_js);
		set_js(get_customjs_path('information/certification_procedure.js'));
		render_template('certification_procedure_v', $data);
	}

	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]|max_length[1000]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{

			$data = [
				'title'=>$postData['title'],
				'content'=>$postData['content'],
			];
			$update = $this->db->where('id', $postData['id'])->update('pages', $data);
			if($update == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}

	

}