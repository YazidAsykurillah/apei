<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends FrontendController {

	var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		$this->load->model('mHome');
		$this->data['news_event'] = $this->mHome->getNewsEvent();
		$this->data['slider'] = $this->mHome->getSlider();
		$this->data['acara'] = $this->mHome->getAcara();
		// var_dump($this->session->userdata);
		set_front_js($this->mainJs);
		render_front_template('home', $this->data);
	}

}
