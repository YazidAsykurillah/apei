<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruanglingkup extends FrontendController {
     var $data = array();
     var $mainJs = 'assets/front/js/main.js';

	public function __construct(){
		parent::__construct();
		set_page_title('');
	}

	public function index(){
		$getData = $this->input->get();
		if(isset($getData['slug']) && $getData['slug']!=''){
			$slug = preg_replace('~[^-\w]+~', '', $getData['slug']);
			$this->load->model('Mruanglingkup');
			$this->data['ruangs'] = $this->Mruanglingkup->getDataBySlug($slug);
			set_front_js($this->mainJs);
			render_front_template('ruanglingkup', $this->data);	
		}
		else{
			redirect(base_url());
		}
	}
}
