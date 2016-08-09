<?php
	
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('render_template')){
	
	function render_template($view, $data=null){
		$ci = &get_instance();
		
		$ci->load->view('header');
		$ci->load->view($view, $data);
		$ci->load->view('footer');
	}
	
}

if(!function_exists('set_title')){
	
	function set_title($title){
		$ci = &get_instance();
		if(!empty($title)){
			$ci->config->set_item('web_title',$title);
		}
	}
	
}

if(!function_exists('get_title')){

	function get_title(){
		$ci = &get_instance();
		return '<title>'.$ci->config->item('web_title').'</title>';
	}
	
}

if(!function_exists('set_favicon')){

	function set_favicon($icon){
		$ci = &get_instance();
		if(!empty($icon)){
			$ci->config->set_item('favicon', $icon);
		}
	}
	
}

if(!function_exists('get_favicon')){

	function get_favicon(){
		$ci = &get_instance();
		return $ci->config->item('favicon');
	}

}

if(!function_exists('set_css')){

	function set_css($css){
		$ci = &get_instance();
		$css_files = $ci->config->item('default_css');
		if($css){
			if(is_array($css)){
				$css_files = array_merge($css_files, $css);
			}else{
				array_push($css_files, $css);
			}
			$ci->config->set_item('default_css', $css_files);
		}
	}
	
}

if(!function_exists('get_css')){

	function get_css(){
		$ci = &get_instance();
		$css = $ci->config->item('default_css');
		$css_out = "";
		
		if($css){
			if(is_array($css)){
				foreach($css as $key=>$val){
					$css_out .= link_tag($val);
				}
			}else{
				$css_out .= link_tag($val);
			}
		}
		
		return $css_out;
	}
	
}

if(!function_exists('set_js')){

	function set_js($js){
		$ci = &get_instance();
		$js_files = $ci->config->item('default_js');
		if($js){
			if(is_array($js)){
				$js_files = array_merge($js_files, $js);
			}else{
				array_push($js_files, $js);
			}
			$ci->config->set_item('default_js', $js_files);
		}
	}

}

if(!function_exists('get_js')){

	function get_js(){
		$ci = &get_instance();
		$js = $ci->config->item('default_js');
		$js_out = "";
		
		if($js){
			if(is_array($js)){
				foreach($js as $key=>$val){
					$js_out .= "<script src=".$ci->config->base_url($val)."></script>";
				}
			}else{
				$js_out .= "<script src=".$ci->config->base_url($val)."></script>";
			}
		}
		
		return $js_out;
	}
	
}

if(!function_exists('set_page_title')){

	function set_page_title($title, $icon=null, $position='left'){
		$ci = &get_instance();
		if($title){
			$ci->config->set_item('page_title', $title);
		}
	}
	
}

if(!function_exists('get_page_title')){

	function get_page_title(){
		$ci = &get_instance();
		return $ci->config->item('page_title');
	}
	
}

if(!function_exists('get_customjs_path')){

	function get_customjs_path($fl=null){
		$ci = &get_instance();
		$pth = $ci->config->item('custom_js');
		if($fl){
			$pth .= $fl;
		}
		return $pth;
	}

}