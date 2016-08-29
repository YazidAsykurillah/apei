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
		'assets/js/summernote/summernote.css',
		'assets/css/alertify/alertify.css',
		'assets/css/select2/select2.css',
	);
	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
		'assets/js/summernote/summernote.min.js',
		'assets/js/tiny_mce/tiny_mce.js',
		'assets/js/select2/select2.full.js',

	);

	protected $uploaded_file_name = '';

	protected $file_names = [];

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


	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title','Nama Album', 'required');
		$this->form_validation->set_rules('description','Deskripsi', 'required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}else{
			$this->Crud_m->setTableName('albums');
			$data = [
				'title' =>$postData['title'],
				'description'=>$postData['description']
			];
			$insert = $this->Crud_m->insert($data);
			if($insert === TRUE){
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
		$this->form_validation->set_rules('title','Nama Album', 'required');
		$this->form_validation->set_rules('description','Deskripsi', 'required');
		$this->form_validation->set_rules('id','Album ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}else{
			$data = [
				'title'=>$postData['title'],
				'description'=>$postData['description']
			];
			$this->db->where('id', $postData['id']);
			$update = $this->db->update('albums', $data);
			if($update == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $db_errors = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);

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

	protected function delete_photos_of_the_albums(){
		$this->load->helper('file');
		$this->load->helper('path');
		$dir = set_realpath('../uploads');
		if(count($this->file_names) == 0 ){
			return TRUE;
		}
		else{
			foreach($this->file_names as $file){
				$file_to_delete = $dir.$file;
				unlink($file_to_delete);
				return TRUE;	
			}
			
		}

	}
	public function delete(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$id = $postData['album_id'];
		$this->form_validation->set_rules('album_id','ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			//get all of the photos where album id is going to be deleted
			$photos = $this->db->select('id, file_name')->from('photos')->where('album_id',$id)->get()->result();
			if(count($photos) > 0){
				foreach($photos as $photo){
					$this->file_names[] = $photo->file_name;
				}
				$delete_photos_table = $this->db->delete('photos',['album_id'=>$id]);
				if($delete_photos_table == TRUE){
					//delete file from the server.
					$delete_photos_of_the_albums = $this->delete_photos_of_the_albums();
				}
				
			}
			
			//now delete the album it self;
			$delete_album = $this->db->delete('albums', ['id'=>$id]);
			if($delete_album == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}

		}
		echo json_encode($this->jsonResponse);

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
        $config['max_size']      = 30000;
        $config['max_width']     = 20000;
        $config['max_height']    = 10000;
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


	//Delete photo from the album
	public function delete_photo(){
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->load->helper('path');
		$postData = $this->input->post();

		$this->form_validation->set_rules('photo_id', 'ID Foto', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$file_name = $this->db->select('file_name')->from('photos')->where('id', $postData['photo_id'])->get()->row()->file_name;
			$delete = $this->db->delete('photos', array('id'=>$postData['photo_id']));
			if($delete == TRUE){
				$dir = set_realpath('../uploads');
				$file_to_delete = $dir.$file_name;
				unlink($file_to_delete);
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $this->db->error();
			}
		}
		echo json_encode($this->jsonResponse);
	}



}
