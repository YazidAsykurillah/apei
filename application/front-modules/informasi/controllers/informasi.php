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
          set_front_js($this->mainJs);
		render_front_template('prosedur');
     }

     public function acara(){

          set_front_js($this->mainJs);
		render_front_template('acara');
     }

     public function berita(){

          set_front_js($this->mainJs);
		render_front_template('berita');
     }
}
