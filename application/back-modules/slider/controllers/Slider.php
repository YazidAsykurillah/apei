<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends BackendController {
	
	protected $data = array();
	protected $uploaded_file_name = '';
	protected $old_slider_image_name = NULL;
	protected $cust_css = array(
		'assets/js/datatables/jquery.dataTables.min.css',
		'assets/js/datatables/buttons.bootstrap.min.css',
		'assets/js/datatables/fixedHeader.bootstrap.min.css',
		'assets/js/datatables/responsive.bootstrap.min.css',
		'assets/js/datatables/scroller.bootstrap.min.css',
		//'assets/js/summernote/summernote.css',
		'assets/css/alertify/alertify.css',
		'assets/css/select2/select2.css',
	);
	protected $cust_js = array(
		'assets/js/alertify/alertify.js',
		//'assets/js/summernote/summernote.min.js',
		'assets/js/select2/select2.full.js',
	);

	public function __construct(){
		parent::__construct();
		set_page_title('Slider');
	}

	public function index(){
		$this->load->helper('data_table_helper');
		set_css($this->cust_css);
		set_js(get_datatables_js());
		set_js($this->cust_js);
		set_js(get_customjs_path('slider/slider.js'));
		render_template('slider_v');
	}


	public function get_slider(){
		$this->Crud_m->table = 'sliders';
		$cpData = $this->Crud_m->getDataTableV10();
        $this->Crud_m->outputToJson( $cpData );
	}

	public function save(){
		$this->load->library('form_validation');
		$postData = $this->input->post();
		$this->form_validation->set_rules('title', 'Judul', 'min_length[3]');
		$this->form_validation->set_rules('description', 'Deskripsi', 'min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			$do_upload = $this->do_upload();
			//upload success, now time to insert data to the table slider
			if($do_upload == TRUE){
				$data_slider = [
					'file_name'=>$this->uploaded_file_name,
					'title'=>$postData['title'],
					'description'=>$postData['description'],
					'display_status'=>$postData['display_status'],
				];
				$this->Crud_m->table = 'sliders';
				$insert = $this->Crud_m->insert($data_slider);
				$this->jsonResponse['msg'] = 'success';

			}
		}
		echo json_encode($this->jsonResponse);
	}

	protected function do_upload(){
		$uploaded_time = time();
		$config['upload_path']   = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 30000;
        $config['max_width']     = 20000;
        $config['max_height']    = 10000;
        $config['file_name']    = 'slider'.$uploaded_time;
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


	protected function delete_old_slider_image_name(){
		$this->load->helper('file');
		$this->load->helper('path');
		$dir = set_realpath('../uploads');
		if($this->old_slider_image_name == NULL){
			return TRUE;
		}
		else{
			$file_to_delete = $dir.$this->old_slider_image_name;

			unlink($file_to_delete);

			return TRUE;
		}
	}

	public function update(){
		$this->load->library('form_validation');
		$postData = $this->input->post();

		$this->form_validation->set_rules('title', 'Judul', 'min_length[3]');
		$this->form_validation->set_rules('description', 'Deskripsi', 'min_length[3]');
		$this->form_validation->set_rules('slider_id', 'Slider ID', 'integer|required');
		if($this->form_validation->run() == FALSE){
			$this->jsonResponse['msg'] = validation_errors();
		}
		else{
			if(is_uploaded_file($_FILES['fileToUpload']['tmp_name'])){ //check if there's a uploaded file
				$do_upload = $this->do_upload();
				//get the slider image in case we'll delete that.
				$this->old_slider_image_name = $this->db->select('file_name')->from('sliders')
			                               ->where('id', $postData['slider_id'])->get()->row()->file_name;
				//upload success, now time to update data to the table slider
				if($do_upload == TRUE){
					$data_slider = [
						'file_name'=>$this->uploaded_file_name,
						'title'=>$postData['title'],
						'description'=>$postData['description'],
						'display_status'=>$postData['display_status'],
					];
					$this->db->where('id', $postData['slider_id']);
					$update = $this->db->update('sliders', $data_slider);
					if($update == TRUE){
						//now delete the old slider image name from the server
						$this->delete_old_slider_image_name();
						$this->jsonResponse['msg'] = 'success';
					}
					else{
						$this->jsonResponse['msg'] = $this->db->error();
					}
					
				}
			}
			else{										//if there is no file, update except the file_name column, then

				$data_slider = [
					'title'=>$postData['title'],
					'description'=>$postData['description'],
					'display_status'=>$postData['display_status'],
				];
				$this->db->where('id', $postData['slider_id']);
				$update = $this->db->update('sliders', $data_slider);
				if($update == TRUE){
					$this->jsonResponse['msg'] = 'success';	
				}
				else{
					$this->jsonResponse['msg'] = $this->db->error();
				}	
			}
			
		}
		echo json_encode($this->jsonResponse);
	}


	public function delete(){
		$postData = $this->input->post();
		//get the slider image in case we'll delete that.
		$this->old_slider_image_name = $this->db->select('file_name')->from('sliders')
			                            ->where('id', $postData['slider_id'])->get()->row()->file_name;

	    $delete = $this->db->delete('sliders',['id'=>$postData['slider_id']]);
	    if($delete == TRUE){
	    	//now delete the old slider image name from the server
	    	$this->delete_old_slider_image_name();
	    	$this->jsonResponse['msg'] = 'success';	
	    }
	    else{
	    	$this->jsonResponse['msg'] = $this->db->error();
	    }
	    echo json_encode($this->jsonResponse);

	}

}