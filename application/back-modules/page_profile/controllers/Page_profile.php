<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_profile extends BackendController {

	protected $data = array();
	protected $uploaded_file_name=NULL;
	protected $file_to_be_deleted = NULL;
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
		'assets/js/tiny_mce/tiny_mce.js',

	);

	

	public function __construct(){
		parent::__construct();
		set_page_title('Halaman Profile');
	}

	public function index(){
		set_page_title('Halaman Profile');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('page_profile/page_profile.js'));
		render_template('page_profile_v');
	}

	public function get_page_profile(){
		$this->Crud_m->table = 'page_profiles';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	//Block to upload file
	public function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']      = 20480;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['file_name']    = 'page_type_files_'.$uploaded_time;
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
        	$this->uploaded_file_name = $config['file_name'].$data['upload_data']['file_ext'];
            return TRUE;
        }
	}
	//ENDBlock to upload file

	public function save_page_as_file(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$do_upload = $this->do_upload();
			$data = [
				'title'=>$postData['title'],
				'slug'=>$postData['slug'],
				'type'=>'files',
				'file_name'=>$this->uploaded_file_name,
			];
			$this->Crud_m->table ='page_profiles';
			$saveData = $this->Crud_m->insert($data);
			if($saveData === TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}

		}
		echo json_encode($this->jsonResponse);
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		if($postData['type'] == 'files'){ //if the file page type is file, then throw the action to save page as file type
			$this->save_page_as_file();
			exit();
		}
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('type', 'Type Halaman', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$this->Crud_m->table = 'page_profiles';
			$data = [
				'title'=>$postData['title'],
				'slug'=>$postData['slug'],
				'content'=>$postData['content'],
				'type'=>'texts',
			];
			$saveData = $this->Crud_m->insert($data);
			if($saveData === TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}

	protected function check_page_type ($id){
		$page_type = $this->db->select('type')->from('page_profiles')->where('id', $id)->get()->row()->type;
		if($page_type == 'texts'){
			return 'texts';
		}
		else{
			return 'files';
		}
	}

	public function edit_page_as_file(){
		$getData = $this->input->get();
		$id = $getData['id'];
		$this->Crud_m->table = 'page_profiles';
		$page_profiles = $this->Crud_m->getById($id);
		$data['page_profiles'] = $page_profiles;
		if($page_profiles != NULL){
			set_page_title('Edit Halaman Profile');
			$this->load->helper('data_table_helper');
			set_css($this->cust_css);
			set_js(get_datatables_js());
			set_js($this->cust_js);
			set_js(get_customjs_path('page_profile/edit_page_profile_file.js'));
			$page_profile = $data['page_profiles'];
			render_template('edit_page_profile_file_v', $data);
		}
		else{
			echo "Not Found, please go back";
		}
	}
	public function edit(){
		$getData = $this->input->get();
		$id = $getData['id'];
		if($id == NULL){
			die('Tidak ada ID');
		}
		else{
			$check_page_type = $this->check_page_type($id);
			if($check_page_type == 'files'){
				$this->edit_page_as_file();
			}
			else{
				$this->Crud_m->table = 'page_profiles';
				$page_profiles = $this->Crud_m->getById($id);
				$data['page_profiles'] = $page_profiles;
				if($page_profiles != NULL){
					set_page_title('Edit Halaman Profile');
					$this->load->helper('data_table_helper');
					set_css($this->cust_css);
					set_js(get_datatables_js());
					set_js($this->cust_js);
					set_js(get_customjs_path('page_profile/edit_page_profile.js'));
					$page_profile = $data['page_profiles'];
					render_template('edit_page_profile_v', $data);
				}
				else{
					echo "Not Found, please go back";
				}	
			}
			
		}
		
	}

	protected function delete_the_old_file(){
		$this->load->helper('file');
		$this->load->helper('path');
		$dir = set_realpath('../uploads');
		if($this->file_to_be_deleted == NULL){
			return TRUE;
		}
		else{
			$file_to_delete = $dir.$this->file_to_be_deleted;

			unlink($file_to_delete);

			return TRUE;
		}
	}

	public function update_page_file_type(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//get the old file_name in case we'll delete that.
			$this->file_to_be_deleted = $this->db->select('file_name')->from('page_profiles')
			                               ->where('id', $postData['id'])->get()->row()->file_name;
			$data = [
				'title'=>$postData['title'],
				'slug'=>$postData['slug'],
				'type'=>'files'
			];
			if(!empty($_FILES['fileToUpload']['name'])){
				$do_upload = $this->do_upload();
				//add uploaded file name to data array.
				$data['file_name'] = $this->uploaded_file_name;
			}
			
			$this->db->where('id', $postData['id']);
			$update = $this->db->update('page_profiles',$data);
			if($update == TRUE){
				//now delete the old file
				$this->delete_the_old_file();
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
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$data = [
				'title'=>$postData['title'],
				'slug'=>$postData['slug'],
				'content'=>$postData['content']
			];
			$this->db->where('id', $postData['id']);
			$update = $this->db->update('page_profiles',$data);
			if($update == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}

	public function delete_page_profile_files_type(){

		$this->jsonResponse['msg'] = 'Deleting page profile files type';
		echo json_encode($this->jsonResponse);
	}

	public function delete(){
		$postData = $this->input->post();
		$id = $postData['page_profile_id'];
		$getPageType = $this->db->select('type')->from('page_profiles')->where('id', $id)->get()->row()->type;
		if($getPageType == 'files'){
			$this->delete_page_profile_files_type();
			exit();
		}
		else{
			$delete = $this->db->delete('page_profiles',['id'=>$id]);
			if($delete == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}

}