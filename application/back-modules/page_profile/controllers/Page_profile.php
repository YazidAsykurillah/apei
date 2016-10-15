<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_profile extends BackendController {

	protected $data = array();
	protected $uploaded_file_name=NULL;
	protected $file_to_be_deleted = NULL;
	protected $wanted_page_order = NULL;
	protected $highest_page_order = '';

	protected $slug_to_be_inserted = '';
	
	protected $page_order_to_be_inserted = '';

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

	public function save_page_as_file(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//build the slug to be inserted to the table
			$this->build_slug();

			$do_upload = $this->do_upload();

			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('page_profiles')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order

			$data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'type'=>'files',
				'file_name'=>$this->uploaded_file_name,
				'page_order'=>$this->page_order_to_be_inserted
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
		$this->form_validation->set_rules('page_order', 'Page Order', 'integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{

			//build the slug to be inserted to the table
			$this->build_slug();

			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('page_profiles')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order

			$this->Crud_m->table = 'page_profiles';
			$data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'type'=>'texts',
				'page_order'=>$this->page_order_to_be_inserted
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


	//Function update page profile
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
			//build the slug to be inserted to the table
			$this->build_slug();

			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('page_profiles')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order
			$data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'type'=>'texts',
				'page_order'=>$this->page_order_to_be_inserted
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
	//ENDFunction update page profile


	//Function update page profile FILE TYPE
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
			
			if(!empty($_FILES['fileToUpload']['name'])){ //theres an uploaded file
				$do_upload = $this->do_upload();
				//now delete the old file
				$this->delete_the_old_file();
			}
			else{									//there's no file uploaded, so keep the file name
				//keep the original file name
				$this->uploaded_file_name = $this->file_to_be_deleted;
			}

			//build the slug
			$this->build_slug();
			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('page_profiles')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order
			$data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'type'=>'files',
				'file_name'=>$this->uploaded_file_name,
				'page_order'=>$this->page_order_to_be_inserted
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
	//ENDFunction update page profile FILE TYPE

	//Function to build slug
	protected function build_slug(){
		$posted_slug = preg_replace('/\s+/', '-', $this->input->post('slug'));
		$slug_is_exist = $this->db->select('id')->from('page_profiles')
						->where('slug',$posted_slug)->where('id !=', $this->input->post('id'))->get()->row();
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

	//Function to build page order
	protected function build_page_order(){
		$posted_page_oder = $this->input->post('page_order');
		//check page order existance in the table
		$check = $this->db->select('id')->from('page_profiles')->where('page_order', $posted_page_oder)->get()->row();
		if(count($check) < 1){ //if the posted page order is not ordered yet, set the page_order_to_be isnserted to the posted value.
			$this->page_order_to_be_inserted = $posted_page_oder;
		}
		else{ //page order is already ordered, now lets re-create the page order of the page_profiles table
			$page_profiles_to_reordered = [];
			//select all page_profiles id that has the bigger than and the same as the posted page order
			$page_profiles = $this->db->select('id')->from('page_profiles')->where('page_order =', $posted_page_oder)
					->or_where('page_order >', $posted_page_oder)->get()->result();
			foreach($page_profiles as $scope){
				$page_profiles_to_reordered[] = $scope->id;
			}
			//it's time to re-create the scope order
			$starting = $posted_page_oder;
			foreach($page_profiles_to_reordered as $sto){
				$new_page_order = $starting++;
				$this->db->set('page_order', $new_page_order+1)->where('id', $sto)->update('page_profiles');
			}
			$this->page_order_to_be_inserted = $posted_page_oder;
		}

	}
	//ENDFunctions to build page order


	protected function repopulate_page_order(){
		$ids_to_repopulate = $this->db->select('id, page_order')->from('page_profiles')
							->where('page_order >',$this->wanted_page_order)->or_where('page_order =', $this->wanted_page_order)
							->get()->result();
		foreach($ids_to_repopulate as $ids){
			$new_page_order = $ids->page_order+1;
			$plus_1 = $this->db->set('page_order',$new_page_order)->where('id',$ids->id)->update('page_profiles');
		}
		
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

	

	

	public function delete_page_profile_files_type(){
		$postData = $this->input->post();
		$id = $postData['page_profile_id'];
		$delete = $this->db->delete('page_profiles', ['id'=>$id]);
		if($delete == TRUE){
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $this->db->error();
		}
		
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

}