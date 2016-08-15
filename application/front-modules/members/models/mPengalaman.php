<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MPengalaman extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getAllByID($id){
         $this->db->select('*');
         $this->db->from('user_experience');
         $this->db->where('id_members', $id);
         $query = $this->db->get();
         return $query->result();
    }

    public function save($data){
         $this->db->insert('user_experience',$data);
         return $this->db->affected_rows();
    }
}
