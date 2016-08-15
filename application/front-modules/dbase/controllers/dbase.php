<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbase extends FrontendController {

	var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		// set_front_js($this->mainJs);
		// render_front_template('home');
	}

     public function dt_kompetensi(){

          set_front_js($this->mainJs);
		render_front_template('kompetensi');
     }

     public function dt_asesor(){

          set_front_js($this->mainJs);
		render_front_template('asesor');
     }

     public function dt_tenaga_teknik(){

          set_front_js($this->mainJs);
		render_front_template('tenaga_teknik');
     }
}
