<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends FrontendController {

	var $data = array();
     var $mainJs = array(
          'assets/front/js/momen.js',
          'assets/front/js/bootstrap-datetime-picker.js',
          'assets/front/js/fileinput.min.js',
          'assets/front/js/main.js'
     );

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			show_404();
		}
		set_page_title('');
	}

	public function index(){
		$user_id = $this->session->userdata['id_members'];
		$this->biografi($user_id);
	}

	public function biografi($id){

		$this->getMembers($id);
		set_front_js($this->mainJs);
		render_front_template('biography', $this->data);
	}

	public function pendidikan($id){

		$this->getMembers($id);
		$this->data['members_pendidikan'] = $this->getPendidikan($id);
		set_front_js($this->mainJs);
		render_front_template('education', $this->data);
	}

	public function pengalaman($id){

		$this->getMembers($id);
		$this->data['members_pengalaman'] = $this->getPengalaman($id);
		set_front_js($this->mainJs);
		render_front_template('experience', $this->data);
	}

	public function pelatihan($id){

		$this->getMembers($id);
		$this->data['members_pelatihan'] = $this->getPelatihan($id);
		set_front_js($this->mainJs);
		render_front_template('course', $this->data);
	}
	public function sertifikat($id){

		$this->getMembers($id);
		$this->data['members_sertifikat'] = $this->getSertifikat($id);
		set_front_js($this->mainJs);
		render_front_template('certification', $this->data);
	}

	private function getMembers($id){
		$this->load->model('mBiografi');
		$this->data['members'] = $this->mBiografi->getByID($id);
	}

	private function getPelatihan($id){
		$this->load->model('mPelatihan');
		return $this->mPelatihan->getAllByID($id);
	}

	public function getPel(){
		$this->load->model('mPelatihan');
		// if(is_ajax_request()){
			$id = $this->input->post('id');
			echo json_encode($this->mPelatihan->getByID($id));
		// }
		// return $this->mPendidikan->getByID($id);
	}

	public function savePelatihan(){
		$this->load->model('mPelatihan');

		$act = $this->input->post('act');
		$id_members = $this->input->post('id_members');
		$dt_pend = array(
			'institution_name' => $this->input->post('institusi'),
			'description' => $this->input->post('deskripsi'),
			'start_date' => $this->input->post('tgl_mulai'),
			'end_date' => $this->input->post('tgl_selesai'),
			'id_members' => $id_members
		);

		if($act == 'add'){
			if($this->mPelatihan->save($dt_pend) > 0){
				redirect('members/pelatihan/'.$id_members, 'refresh');
			}
		}else{
			if($this->mPelatihan->update($dt_pend, $this->input->post('id_pelatihan')) > 0){
				redirect('members/pelatihan/'.$id_members, 'refresh');
			}
		}
	}

	private function getPendidikan($id){
		$this->load->model('mPendidikan');
		return $this->mPendidikan->getAllByID($id);
	}

	public function getPend(){
		$this->load->model('mPendidikan');
		// if(is_ajax_request()){
			$id = $this->input->post('id');
			echo json_encode($this->mPendidikan->getByID($id));
		// }
		// return $this->mPendidikan->getByID($id);
	}

	public function savePendidikan(){
		$this->load->model('mPendidikan');

		$act = $this->input->post('act');
		$id_members = $this->input->post('id_members');
		$dt_pend = array(
			'school_name' => $this->input->post('sekolah'),
			'title' => $this->input->post('gelar'),
			'start_date' => $this->input->post('tgl_mulai'),
			'end_date' => $this->input->post('tgl_selesai'),
			'id_members' => $id_members
		);

		if($act == 'add'){
			if($this->mPendidikan->save($dt_pend) > 0){
				redirect('members/pendidikan/'.$id_members, 'refresh');
			}
		}else{
			if($this->mPendidikan->update($dt_pend, $this->input->post('id_pendidikan')) > 0){
				redirect('members/pendidikan/'.$id_members, 'refresh');
			}
		}
	}

	private function getPengalaman($id){
		$this->load->model('mPengalaman');
		return $this->mPengalaman->getAllByID($id);
	}

	public function savePengalaman(){
		$this->load->model('mPengalaman');

		$act = $this->input->post('act');
		$id_members = $this->input->post('id_members');
		$dt_pend = array(
			'company_name' => $this->input->post('company_name'),
			'speciality' => $this->input->post('specialis'),
			'position' => $this->input->post('position'),
			'start_date' => $this->input->post('tgl_mulai'),
			'end_date' => $this->input->post('tgl_selesai'),
			'id_members' => $id_members
		);

		if($act == 'add'){
			if($this->mPengalaman->save($dt_pend) > 0){
				redirect('members/pengalaman/'.$id_members, 'refresh');
			}
		}else{
			if($this->mPengalaman->update($dt_pend, $this->input->post('id_pengalaman')) > 0){
				redirect('members/pengalaman/'.$id_members, 'refresh');
			}
		}
	}

	private function getSertifikat($id){
		$this->load->model('mSertifikat');
		return $this->mSertifikat->getAllByID($id);
	}
}
