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
		$this->load->model('mInformasi');
		$this->data['prosedur'] = $this->mInformasi->getProsedur();
          set_front_js($this->mainJs);
		render_front_template('prosedur', $this->data);
     }

     public function acara(){
		$this->load->library('pagination');
		$this->load->model('mInformasi');

		$config['base_url'] = base_url().'informasi/acara';
		$config['total_rows'] = $this->mInformasi->acaraCount();
		$config['per_page'] = '10';
		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->data['acara'] = $this->mInformasi->getAcara($config['per_page'],$page);
		$this->data['page'] = $this->pagination->create_links();

          set_front_js($this->mainJs);
		render_front_template('acara',$this->data);
     }

     public function berita(){
		$this->load->library('pagination');
		$this->load->model('mInformasi');

		$config['base_url'] = base_url().'informasi/berita';
		$config['total_rows'] = $this->mInformasi->newsEventCount();
		$config['per_page'] = '8';
		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// var_dump($page);
		$this->data['news_event'] = $this->mInformasi->getNewsEvent($config['per_page'],$page);
		$this->data['page'] = $this->pagination->create_links();

          set_front_js($this->mainJs);
		render_front_template('berita', $this->data);
     }

	public function single_berita($id){
		$this->load->model('mInformasi');
		$this->data['single'] = $this->mInformasi->getSingleNewsEvent($id);
		set_front_js($this->mainJs);
		render_front_template('single-berita', $this->data);
	}

	public function single_acara($id){
		$this->load->model('mInformasi');
		$this->data['single'] = $this->mInformasi->getSingleAcara($id);
		set_front_js($this->mainJs);
		render_front_template('single-acara', $this->data);
	}
}
