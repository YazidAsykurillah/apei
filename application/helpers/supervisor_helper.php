<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('show_supervisor_detail')){
	function show_supervisor_detail($id){
		$ci =& get_instance();
		$ci->load->database();
		$supervisor = $ci->db->get_where('users', array('id'=>$id))->row();
		return $supervisor;
	}
}

