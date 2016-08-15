<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('render_front_template')){

	function render_front_template($view, $data=null){
		$ci = &get_instance();

		$ci->load->view('front/header');
		$ci->load->view($view, $data);
		$ci->load->view('front/footer');
	}

}

// if(!function_exists('set_front_title')){
//
// 	function set_front_title($title){
// 		$ci = &get_instance();
// 		if(!empty($title)){
// 			$ci->config->set_item('web_title',$title);
// 		}
// 	}
//
// }
//
// if(!function_exists('get_front_title')){
//
// 	function get_front_title(){
// 		$ci = &get_instance();
// 		return '<title>'.$ci->config->item('web_title').'</title>';
// 	}
//
// }
//
// if(!function_exists('set_favicon')){
//
// 	function set_favicon($icon){
// 		$ci = &get_instance();
// 		if(!empty($icon)){
// 			$ci->config->set_item('favicon', $icon);
// 		}
// 	}
//
// }
//
// if(!function_exists('get_favicon')){
//
// 	function get_favicon(){
// 		$ci = &get_instance();
// 		return $ci->config->item('favicon');
// 	}
//
// }

if(!function_exists('set_front_css')){

	function set_front_css($css){
		$ci = &get_instance();
		$css_files = $ci->config->item('default_css_front');
		if($css){
			if(is_array($css)){
				$css_files = array_merge($css_files, $css);
			}else{
				array_push($css_files, $css);
			}
			$ci->config->set_item('default_css_front', $css_files);
		}
	}

}

if(!function_exists('get_front_css')){

	function get_front_css(){
		$ci = &get_instance();
		$css = $ci->config->item('default_css_front');
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

if(!function_exists('set_front_js')){

	function set_front_js($js){
		$ci = &get_instance();
		$js_files = $ci->config->item('default_js_front');
		if($js){
			if(is_array($js)){
				$js_files = array_merge($js_files, $js);
			}else{
				array_push($js_files, $js);
			}
			$ci->config->set_item('default_js_front', $js_files);
		}
	}

}

if(!function_exists('get_front_js')){

	function get_front_js(){
		$ci = &get_instance();
		$js = $ci->config->item('default_js_front');
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
if(!function_exists('get_js_path')){

	function get_js_path($fl=null){
		$ci = &get_instance();
		$pth = $ci->config->item('js_front_path');
		if($fl){
			$pth .= $fl;
		}
		return $pth;
	}

}
if(!function_exists('get_front_images_path')){

	function get_front_images_path($fl=null){
		$ci = &get_instance();
		$pth = $ci->config->item('img_front_path');
		if($fl){
			$pth .= $fl;
		}
		return $pth;
	}

}

if(!function_exists('get_customjs_path')){

	function get_customjs_path($fl=null){
		$ci = &get_instance();
		$pth = $ci->config->item('custom_front_js');
		if($fl){
			$pth .= $fl;
		}
		return $pth;
	}

}
