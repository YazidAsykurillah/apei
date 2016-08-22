<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends FrontendController {

	var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		$this->latar_belakang();
	}

     public function latar_belakang(){
		$this->load->model('mProfile');
		$this->data['latar'] = $this->mProfile->getLatar();
          set_front_js($this->mainJs);
		render_front_template('latar', $this->data);
     }

     public function visi_misi(){
		$this->load->model('mProfile');
		$this->data['visi_misi'] = $this->mProfile->getVisiMisi();
          set_front_js($this->mainJs);
		render_front_template('visi_misi', $this->data);
     }

     public function struktur(){
		$this->load->model('mProfile');
		$this->data['struktur'] = $this->mProfile->getStruktur();
          set_front_js($this->mainJs);
		render_front_template('struktur', $this->data);
     }

     public function fungsi(){
		$this->load->model('mProfile');
		$this->data['fungsi'] = $this->mProfile->getFungsi();
          set_front_js($this->mainJs);
		render_front_template('fungsi', $this->data);
     }
}
