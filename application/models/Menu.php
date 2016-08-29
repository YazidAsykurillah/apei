<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Menu extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function getParent(){
         $this->db->select('*');
         $this->db->from('menu');
         $this->db->where('parent', 0);
         $this->db->order_by('position', 'asc');
         $query = $this->db->get();
         return $query->result();
    }
}
