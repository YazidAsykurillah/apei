<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends FrontendController {

	var $data = array();
     var $mainJs = array(
          'assets/front/js/main.js',
          'assets/front/js/jquery.isotope.min.js'
     );

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		// set_front_js($this->mainJs);
		// render_front_template('home');
	}

     public function produk_hukum(){

          set_front_js($this->mainJs);
		render_front_template('produk_hukum');
     }

     public function foto(){

          set_front_js($this->mainJs);
		render_front_template('foto');
     }

     public function video(){

          set_front_js($this->mainJs);
		render_front_template('video');
     }
}
