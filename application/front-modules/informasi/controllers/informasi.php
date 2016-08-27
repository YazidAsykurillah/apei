<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends FrontendController {

	var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		$this->prosedur();
	}

     public function prosedur(){
		$this->load->model('mInformasi');
		$this->data['prosedur'] = $this->mInformasi->getProsedur();
          set_front_js($this->mainJs);
		render_front_template('prosedur', $this->data);
     }

     public function acara(){
		$this->load->model('mInformasi');
		$this->data['acara'] = $this->mInformasi->getAcara();
          set_front_js($this->mainJs);
		render_front_template('acara',$this->data);
     }

     public function berita(){
		$this->load->model('mInformasi');
		$this->data['news_event'] = $this->mInformasi->getNewsEvent();
          set_front_js($this->mainJs);
		render_front_template('berita', $this->data);
     }

	public function single_berita($id){
		$this->load->model('mInformasi');
		$this->data['single'] = $this->mInformasi->getSingleNewsEvent($id);
		set_front_js($this->mainJs);
		render_front_template('single-berita', $this->data);
	}

	public function single_acara($id){
		$this->load->model('mInformasi');
		$this->data['single'] = $this->mInformasi->getSingleAcara($id);
		set_front_js($this->mainJs);
		render_front_template('single-acara', $this->data);
	}
}
