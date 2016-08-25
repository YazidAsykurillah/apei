<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_event extends BackendController {

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

	protected $uploaded_file_name=NULL;

	public function __construct(){
		parent::__construct();
		set_page_title('Berita dan Kegiatan');
	}

	public function index(){
		set_page_title('Berita dan Kegiatan');
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('information/news_event.js'));
		render_template('news_event_v');
	}

	public function get_news_event(){
		$this->Crud_m->table = 'news_event_v';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	//Block save news event
	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('category', 'Kategori', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//if we have a feature image uploaded, call function to upload to server,
			if(!empty($_FILES['fileToUpload']['name'])){
				$do_upload = $this->do_upload();
			}
			//otherwise we should continue to insert
			//news event table, it means without feature image
			$this->Crud_m->table = 'news_event';
			$this->data = [
				'title'=>$postData['title'],
				'content'=>$postData['content'],
				'category'=>$postData['category'],
				'posted_by'=>$this->ion_auth->get_user_id(),
				'posted_date'=>date('Y-m-d'),
				'feature_image'=>$this->uploaded_file_name
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
	//ENDBlock save news event

	//Block to upload file
	public function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $config['file_name']    = 'feature_img'.$uploaded_time;
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


	public function edit($id=NULL){
		if($id == NULL){
			exit("what are you gonna do?");
		}
		else{
			$this->Crud_m->table = 'news_event';
			$news_event = $this->Crud_m->getById($id);
			$data['news_event'] = $news_event;
			if($news_event != NULL){
				set_page_title('Edit Berita dan Kegiatan');
				set_css($this->cust_css);
				set_js($this->cust_js);
				set_js(get_customjs_path('information/edit_news_event.js'));
				render_template('edit_news_event_v', $data);
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
		$this->form_validation->set_rules('content', 'Isi', 'required|min_length[3]');
		$this->form_validation->set_rules('category', 'Kategori', 'required');
		$this->form_validation->set_rules('id', 'ID News Event', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$data = [
				'title'=>$postData['title'],
				'content'=>$postData['content'],
				'category'=>$postData['category']
			];
			$this->db->where('id', $postData['id']);
			$update = $this->db->update('news_event', $data);
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
		$id = $postData['news_event_id'];
		$delete = $this->db->delete('news_event', array('id' => $id));
		if($delete == TRUE){
			$this->jsonResponse['msg'] = 'success';	
		}
		else{
			$this->jsonResponse['msg'] = $delete;
		}
		echo json_encode($this->jsonResponse);
	}

}