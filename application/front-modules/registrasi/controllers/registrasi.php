<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends FrontendController {

	var $data = array();
     var $mainJs = array(
          'assets/front/js/momen.js',
          'assets/front/js/bootstrap-datetime-picker.js',
          'assets/front/js/fileinput.min.js',
          'assets/front/js/main.js'
     );

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
          $this->load->helper('form');
          set_front_js($this->mainJs);
		render_front_template('registrasi');
	}

     public function save(){
          $this->load->model('mRegistrasi');

          $nm = '';
          $id_file = '';
          $foto_file = '';

          if($_FILES["identitas_file"]['size'] != 0){
               $nm = 'identitas';
          }
          if($_FILES["foto_file"]['size'] != 0){
               $nm = 'avatar';
          }

          $config['upload_path']   = './uploads/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']      = 100;
          $config['max_width']     = 1024;
          $config['max_height']    = 768;
          $config['file_name']    = md5($nm+"q1w2"+$this->input->post('name')+"dt"+$this->input->post('identitas_no'));
          $this->load->library('upload', $config);

          if($_FILES["identitas_file"]['size'] != 0){
               if ( ! $this->upload->do_upload('identitas_file')) {
                    $error = array('error' => $this->upload->display_errors());
                    $id_file = '';
               }else {
                    $data = array('upload_data' => $this->upload->data());
                    $id_file = $data['upload_data']['file_name'];
               }
          }

          if($_FILES["foto_file"]['size'] != 0){
               if ( ! $this->upload->do_upload('foto_file')) {
                    $error = array('error' => $this->upload->display_errors());
                    $foto_file = '';
               }else {
                    $data = array('upload_data' => $this->upload->data());
                    $foto_file = $data['upload_data']['file_name'];
               }
          }

          $dt_members = array(
               'name' => $this->input->post('name'),
               'identitas' => $this->input->post('identitas'),
               'identitas_no' => $this->input->post('identitas_no'),
               'identitas_file' => $id_file, // Ini upload
               'birth_place' => $this->input->post('birth_place'),
               'birth_date' => $this->input->post('birth_date'),
               'phone_1' => $this->input->post('phone_1'),
               'phone_2' => $this->input->post('phone_2'),
               'email' => $this->input->post('email'),
               'website' => $this->input->post('website'),
               'foto_file' => $foto_file, // Ini upload
               'home_address' => $this->input->post('home_address'),
               'home_rt' => $this->input->post('home_rt'),
               'home_rw' => $this->input->post('home_rw'),
               'home_kelurahan' => $this->input->post('home_kelurahan'),
               'home_kecamatan' => $this->input->post('home_kecamatan'),
               'home_kabupaten' => $this->input->post('home_kabupaten'),
               'home_propinsi' => $this->input->post('home_propinsi'),
               'home_negara' => $this->input->post('home_negara'),
               'office_address' => $this->input->post('office_address'),
               'office_rt' => $this->input->post('office_rt'),
               'office_rw' => $this->input->post('office_rw'),
               'office_kelurahan' => $this->input->post('office_kelurahan'),
               'office_kecamatan' => $this->input->post('office_kecamatan'),
               'office_kabupaten' => $this->input->post('office_kabupaten'),
               'office_propinsi' => $this->input->post('office_propinsi'),
               'office_negara' => $this->input->post('office_negara')
          );

          if($this->mRegistrasi->save($dt_members)>0){
               redirect('registrasi', 'refresh');
          }
     }

     public function do_upload(){

     }
}
