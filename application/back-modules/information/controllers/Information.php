<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends BackendController {

	protected $data = array();

	protected $uploaded_feature_image = NULL;

	protected $old_feature_image = NULL;

	protected $slug_to_be_inserted = '';

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
		set_page_title('Informasi');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('information/information.js'));
		render_template('information_v');
	}

	

	public function get_information(){
		$this->Crud_m->table = 'informations_v';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function detail(){
		$id = $this->input->get('id');
		if($id == NULL){
			redirect($this->index());
		}
		else{
			$this->Crud_m->table = 'informations_v';
			$information = $this->Crud_m->getById($id);
			echo count($information);
		}
	}
	public function save(){

		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//if we have a feature image uploaded, call function to upload to server,
			if(!empty($_FILES['fileToUpload']['name'])){
				$do_upload = $this->do_upload();
			}
			//build the slug to be inserted to the table
			$this->build_slug();
			$this->Crud_m->table = 'informations';
			$this->data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'created_at'=>date('Y-m-d'),
				'posted_by'=>$this->ion_auth->get_user_id(),
				'feature_image'=>$this->uploaded_feature_image
			];
			$save = $this->Crud_m->insert($this->data);
			if($save === TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}

		}
		echo json_encode($this->jsonResponse);

	}

	public function edit(){
		$id = $this->input->get('id');
		if($id == NULL){
			redirect($this->index());
		}
		else{
			$this->Crud_m->table = 'informations';
			$information = $this->Crud_m->getById($id);
			$data['information'] = $information;
			if($information != NULL){
				set_page_title('Edit Informasi');
				set_css($this->cust_css);
				set_js($this->cust_js);
				set_js(get_customjs_path('information/edit_information.js'));
				render_template('edit_information_v', $data);
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
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('information_id', 'ID', 'integer|required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//get the feature image
			$this->old_feature_image_name = $this->db->select('feature_image')->from('informations')
			                               ->where('id', $postData['information_id'])->get()->row()->feature_image;
			//if we have a feature image uploaded, call function to upload to server,
			if(!empty($_FILES['fileToUpload']['name'])){
				$do_upload = $this->do_upload();
				//delete old feature image from the server
				$this->delete_old_feature_image();
			}
			else{
				$this->uploaded_feature_image = $this->old_feature_image_name;
			}
			//build the slug to be inserted to the table
			$this->build_slug();
			$updateData = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'feature_image'=>$this->uploaded_feature_image
			];
			$this->db->where('id', $postData['information_id']);
			$update = $this->db->update('informations', $updateData);
			
			$this->jsonResponse['msg'] = 'success';
		}

		echo json_encode($this->jsonResponse);
	}

	public function delete(){
		$id = $this->input->post('information_id');
		$delete = $this->db->delete('informations', ['id'=>$id]);
		if($delete == TRUE){
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg']= $this->db->error();
		}
		echo json_encode($this->jsonResponse);
	}


	//Function to build slug
	protected function build_slug(){
		$posted_slug = preg_replace('/\s+/', '-', $this->input->post('slug'));
		$slug_is_exist = $this->db->select('id')->from('informations')
						->where('slug',$posted_slug)->where('id !=', $this->input->post('information_id'))->get()->row();
		if(count($slug_is_exist) > 0){
			$this->jsonResponse['msg']='Slug sudah ada, silahkan ganti';
			echo json_encode($this->jsonResponse);
			exit();
		}
		else{
			$this->slug_to_be_inserted = trim($posted_slug);
			return TRUE;
		}
	}
	//ENDFunction to build slug

	//Function to upload file
	public function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20480;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['file_name']    = 'information_img'.$uploaded_time;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileToUpload'))
        {
                $error = $this->upload->display_errors();
                $this->jsonResponse['msg'] = $error;
                echo json_encode($this->jsonResponse);
                exit();
                //return FALSE;
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
        	$this->uploaded_feature_image = $config['file_name'].$data['upload_data']['file_ext'];
            return TRUE;
        }
	}
	//ENDFunction to upload file

	protected function delete_old_feature_image(){
		$this->load->helper('file');
		$this->load->helper('path');
		$dir = set_realpath('../uploads');
		if($this->old_feature_image_name == NULL){
			return TRUE;
		}
		else{
			$file_to_delete = $dir.$this->old_feature_image_name;
			unlink($file_to_delete);
			return TRUE;
		}
	}

	public function schedule(){
		set_page_title('Jadwal Uji Kompetensi');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js(get_customjs_path('information/schedule.js'));
		render_template('schedule');

	}


	

}
