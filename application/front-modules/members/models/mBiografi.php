<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MBiografi extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getByID($id_members){
         $this->db->select('*');
         $this->db->from('members');
         $this->db->where('id', $id_members);
         $query = $this->db->get();
         return $query->row();
    }
}
