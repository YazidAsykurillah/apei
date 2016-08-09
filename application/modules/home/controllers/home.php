<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	var $data = array();
	
	public function __construct(){
		parent::__construct();
		set_page_title('Dashboard');
	}
	
	public function index(){
		
		render_template('home');

	}
	
}