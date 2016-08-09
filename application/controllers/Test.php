<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function coba(){
		$this->load->library('calendar');

		$data = array(
				3  => 'http://example.com/news/article/2006/06/03/',
				7  => 'http://example.com/news/article/2006/06/07/',
				13 => 'http://example.com/news/article/2006/06/13/',
				26 => 'http://example.com/news/article/2006/06/26/'
		);

		echo $this->calendar->generate(2006, 6, $data);
	}
	
	public function anchor_pop(){
		$atts = array(
				'width'       => 800,
				'height'      => 600,
				'scrollbars'  => 'yes',
				'status'      => 'yes',
				'resizable'   => 'yes',
				'screenx'     => 0,
				'screeny'     => 0,
				'window_name' => '_blank'
		);

		echo anchor_popup('auth', 'Click Me!', $atts);
	}
}