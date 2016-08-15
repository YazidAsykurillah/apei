<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MRegistrasi extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function save($data){
         $this->db->insert('members',$data);
         return $this->db->affected_rows();
    }
}
