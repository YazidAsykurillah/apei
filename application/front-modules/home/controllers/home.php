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
		// var_dump($this->session->userdata);
		set_front_js($this->mainJs);
		render_front_template('home');
	}

}
