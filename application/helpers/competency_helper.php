<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('competency_detail')){
	function competency_detail($id){
		$ci =& get_instance();
		$ci->load->database();
		$assesor_detail = $ci->db->get_where('competencies', array('id'=>$id))->row();
		return $assesor_detail;
	}
}

