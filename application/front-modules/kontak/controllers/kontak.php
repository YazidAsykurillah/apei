<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends FrontendController {

	var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
          set_front_js($this->mainJs);
		render_front_template('kontak');
	}
}
