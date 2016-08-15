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
          set_front_js($this->mainJs);
		render_front_template('latar');
     }

     public function visi_misi(){

          set_front_js($this->mainJs);
		render_front_template('visi_misi');
     }

     public function struktur(){

          set_front_js($this->mainJs);
		render_front_template('struktur');
     }

     public function fungsi(){

          set_front_js($this->mainJs);
		render_front_template('fungsi');
     }
}
