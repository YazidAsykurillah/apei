<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Member_m extends MY_Model{

	protected $table = 'members';

	public function __construct(){

		parent::__construct();
	}


	public function approve($id){

		$approve = $this->db
					->set('status', 'ak')
					->where('id', $id)
					->update('members');
		if($approve ){
			return TRUE;
		}
		return FALSE;
	}
	

}