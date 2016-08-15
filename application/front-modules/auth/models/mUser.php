<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MUser extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getByID($id){
         $this->db->select('*');
         $this->db->from('members');
         $this->db->where('id', $id);
         $query = $this->db->get();
         return $query->row();
    }
}
