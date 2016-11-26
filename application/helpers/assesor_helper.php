<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('show_assesor_detail')){
	function show_assesor_detail($id){
		$ci =& get_instance();
		$ci->load->database();
		$assesor_detail = $ci->db->get_where('assesors', array('id'=>$id))->row();
		return $assesor_detail;
	}
}

