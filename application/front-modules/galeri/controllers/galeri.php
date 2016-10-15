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
		$this->load->model('mGaleri');
		$this->data['photo'] = $this->mGaleri->getPhoto();
          set_front_js($this->mainJs);
		render_front_template('foto', $this->data);
     }

     public function video(){
     	$this->load->model('mGaleri');
     	$data['videos'] = $this->mGaleri->getVideos();
        set_front_js($this->mainJs);
		render_front_template('video', $data);
     }
}
