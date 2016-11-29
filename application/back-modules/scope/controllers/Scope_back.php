<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scope extends BackendController {

	protected $data = array();
	
	protected $uploaded_feature_image=NULL;
	
	protected $file_to_be_deleted = NULL;
	
	protected $slug_to_be_inserted = '';
	
	protected $page_order_to_be_inserted = '';

	protected $old_feature_image_name = NULL;

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
		set_page_title('Ruang Lingkup');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('scope/index.js'));
		render_template('index_v');
	}


	public function get_scope(){
		$this->Crud_m->table = 'scopes';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('page_order', 'Page Order', 'integer');
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

			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('scopes')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order
			$this->Crud_m->table = 'scopes';
			$this->data = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'feature_image'=>$this->uploaded_feature_image,
				'page_order'=>$this->page_order_to_be_inserted
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
			$this->Crud_m->table = 'scopes';
			$scope = $this->Crud_m->getById($id);
			$data['scope'] = $scope;
			if($scope != NULL){
				set_page_title('Edit Ruang Lingkup');
				set_css($this->cust_css);
				set_js($this->cust_js);
				set_js(get_customjs_path('scope/edit.js'));
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
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('slug', 'Slug', 'required');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('page_order', 'Page Order', 'integer');
		$this->form_validation->set_rules('scope_id', 'ID', 'integer|required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//get the feature image
			$this->old_feature_image_name = $this->db->select('feature_image')->from('scopes')
			                               ->where('id', $postData['scope_id'])->get()->row()->feature_image;
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

			//Block build page order
			if($postData['page_order'] != ''){
				//build the page order to be inserted to the table
				$this->build_page_order();	
			}
			else{
				//automatically set the page order to be inserted to highest value plus 1.
				$highest_page_order = $this->db->select_max('page_order')->get('scopes')->row()->page_order;
				$this->page_order_to_be_inserted = $highest_page_order+1;
			}
			//ENDblock build page order
			
			$updateData = [
				'title'=>$postData['title'],
				'slug'=>preg_replace('/\s+/', '-', $this->slug_to_be_inserted),
				'content'=>$postData['content'],
				'feature_image'=>$this->uploaded_feature_image,
				'page_order'=>$this->page_order_to_be_inserted
			];
			$this->db->where('id', $postData['scope_id']);
			$update = $this->db->update('scopes', $updateData);
			
			$this->jsonResponse['msg'] = 'success';
		}
		echo json_encode($this->jsonResponse);

	}

	public function delete(){
		$postData = $this->input->post();
		$id = $postData['scope_id'];
		//get the feature image in case we'll delete that.
		$this->old_feature_image_name = $this->db->select('feature_image')->from('scopes')
										->where('id', $id)->get()->row()->feature_image;

		$delete = $this->db->delete('scopes', array('id' => $id));
		if($delete == TRUE){
			$this->delete_old_feature_image();
			$this->jsonResponse['msg'] = 'success';
		}
		else{
			$this->jsonResponse['msg'] = $delete;
		}
		echo json_encode($this->jsonResponse);
	}

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

	public function remove_feature_image(){
		$postData = $this->input->post();
		$id = $postData['scope_id'];

		//get the feature image in case we'll delete that.
		$this->old_feature_image_name = $this->db->select('feature_image')->from('scopes')
										->where('id', $id)->get()->row()->feature_image;
		$this->db->where('id', $id);
		$this->db->update('scopes', ['feature_image'=>NULL] );
		//now delete the file from the server
		$delete_file = $this->delete_old_feature_image();
		$this->jsonResponse['msg'] = 'success';
		echo json_encode($this->jsonResponse);

	}

	//Function to upload file
	public function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 20480;
        $config['max_width']     = 0;
        $config['max_height']    = 0;
        $config['file_name']    = 'scope_feature_img'.$uploaded_time;
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

	//Function to build slug
	protected function build_slug(){
		$posted_slug = preg_replace('/\s+/', '-', $this->input->post('slug'));
		$slug_is_exist = $this->db->select('id')->from('scopes')
						->where('slug',$posted_slug)->where('id !=', $this->input->post('scope_id'))->get()->row();
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
		$check = $this->db->select('id')->from('scopes')->where('page_order', $posted_page_oder)->get()->row();
		if(count($check) < 1){ //if the posted page order is not ordered yet, set the page_order_to_be isnserted to the posted value.
			$this->page_order_to_be_inserted = $posted_page_oder;
		}
		else{ //page order is already ordered, now lets re-create the page order of the scopes table
			$scopes_to_reordered = [];
			//select all scopes id that has the bigger than and the same as the posted page order
			$scopes = $this->db->select('id')->from('scopes')->where('page_order =', $posted_page_oder)
					->or_where('page_order >', $posted_page_oder)->get()->result();
			foreach($scopes as $scope){
				$scopes_to_reordered[] = $scope->id;
			}
			//it's time to re-create the scope order
			$starting = $posted_page_oder;
			foreach($scopes_to_reordered as $sto){
				$new_page_order = $starting++;
				$this->db->set('page_order', $new_page_order+1)->where('id', $sto)->update('scopes');
			}
			$this->page_order_to_be_inserted = $posted_page_oder;
		}

	}
	//ENDFunctions to build page order



}
