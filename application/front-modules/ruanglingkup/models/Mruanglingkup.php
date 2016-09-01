<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Mruanglingkup extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getDataBySlug($slug){
         $this->db->select('*');
         $this->db->from('scopes');
         $this->db->where('slug', $slug);
         $this->db->or_where('id', $slug);
         $query = $this->db->get();
         return $query->row();
    }
}
