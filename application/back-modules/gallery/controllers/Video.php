<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends BackendController {

	protected $data = array();
	
	protected $yt_iframe_width = '300px';
	protected $yt_iframe_heigth = '300px';

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
		'assets/js/summernote/summernote.min.js'

	);

	public function __construct(){
		parent::__construct();
		set_page_title('Video');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('video/video.js'));
		render_template('video_v');
	}

	public function get_video(){
		$this->Crud_m->table = 'videos';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	protected function build_yt_embed_code(){
		$yt_url = $this->input->post('yt_url');
		preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $yt_url, $matches);
    	$embed_code = $matches[1];
		return $embed_code;
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title','Judul Video', 'required');
		$this->form_validation->set_rules('description','Deskripsi video', 'required|min_length[3]');
		$this->form_validation->set_rules('yt_url','URL Video', 'required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}else{
			$embed_code = $this->build_yt_embed_code();

			$this->Crud_m->setTableName('videos');
			$data = [
				'title'=>$postData['title'],
				'description'=>$postData['description'],
				'youtube_url'=>$postData['yt_url'],
				'embed_code'=>'<iframe style="width:100%;" src="https://www.youtube.com/embed/'.$embed_code.'" frameborder="0" allowfullscreen></iframe>',
			];
			$save = $this->Crud_m->insert($data);
			if($save == TRUE){
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
		$this->form_validation->set_rules('title','Judul Video', 'required');
		$this->form_validation->set_rules('description','Deskripsi video', 'required|min_length[3]');
		$this->form_validation->set_rules('yt_url','URL Video', 'required|min_length[3]');
		$this->form_validation->set_rules('id','ID', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}else{
			$embed_code = $this->build_yt_embed_code();
			$data = [
				'title'=>$postData['title'],
				'description'=>$postData['description'],
				'youtube_url'=>$postData['yt_url'],
				'embed_code'=>'<iframe style="width:100%;" src="https://www.youtube.com/embed/'.$embed_code.'" frameborder="0" allowfullscreen></iframe>',
			];
			$this->db->where('id', $postData['id']);
			$update = $this->db->update('videos', $data);
			if($update == TRUE){
				$this->jsonResponse['msg'] = 'success';
			}
			else{
				$this->jsonResponse['msg'] = $db_errors = $this->db->error();
			}
		}		
		echo json_encode($this->jsonResponse);
	}

	public function delete(){
		$id = $this->input->post('video_id');
		$delete = $this->db->delete('videos',['id'=>$id]);
		$this->jsonResponse['msg'] = 'success';
		echo json_encode($this->jsonResponse);
	}

}

