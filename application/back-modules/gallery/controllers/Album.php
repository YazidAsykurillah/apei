<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends BackendController {

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

	protected $uploaded_file_name = '';

	public function __construct(){
		parent::__construct();
		set_page_title('Album');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('album/album.js'));
		render_template('album_v');
	}


	public function get_album(){
		$this->Crud_m->table = 'albums';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function detail($id = NULL){
		if(is_null($id)){
			redirect('/');
		}else{
			$check_if_exists = $this->get_album_detail($id);
			if(count($check_if_exists)){
				set_page_title('Album Detail');
				set_css($this->cust_css);
				set_js($this->cust_js);
				set_js(get_customjs_path('album/album_detail.js'));
				$data['album_detail'] = $this->get_album_detail($id);
				$data['photos_of_album'] = $this->photos_of_album($id);
				render_template('album_detail_v', $data);
			}
			else{
				redirect('/');
			}
		}
		
	}

	protected function get_album_detail($id){
		$result = $this->db->get_where('albums', ['id'=>$id])->row();
		return $result;
	}

	protected function photos_of_album($album_id){
		$result = $this->db->get_where('photos', ['album_id'=>$album_id])->result_array();
		return $result;
	}

	public function upload_photo(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$do_upload = $this->do_upload();
			//upload success, now time to insert data to the table photos
			if($do_upload == TRUE){
				$data_photos = [
					'album_id'=>$postData['album_id'],
					'title'=>$postData['title'],
					'file_name'=>$this->uploaded_file_name,
				];
				$this->Crud_m->table = 'photos';
				$insert = $this->Crud_m->insert($data_photos);
				$this->jsonResponse['msg'] = 'success';

			}
		}
		echo json_encode($this->jsonResponse);

	}

	public function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;
        $config['file_name']    = 'photo_'.$uploaded_time;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('fileToUpload'))
        {
                $error = $this->upload->display_errors();
                $this->jsonResponse['msg'] = $error;
                return FALSE;
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
        	$this->uploaded_file_name = $config['file_name'].$data['upload_data']['file_ext'];
            return TRUE;
        }
	}

	


}