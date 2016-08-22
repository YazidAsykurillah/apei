<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MProfile extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getLatar(){
         $this->db->select('background');
         $this->db->from('company_profile');
         $this->db->where('id', 1);
         $query = $this->db->get();
         return $query->row();
    }

    public function getVisiMisi(){
         $this->db->select('vission_mission');
         $this->db->from('company_profile');
         $this->db->where('id', 1);
         $query = $this->db->get();
         return $query->row();
    }

    public function getStruktur(){
         $this->db->select('org_structure');
         $this->db->from('company_profile');
         $this->db->where('id', 1);
         $query = $this->db->get();
         return $query->row();
    }

    public function getFungsi(){
         $this->db->select('functions');
         $this->db->from('company_profile');
         $this->db->where('id', 1);
         $query = $this->db->get();
         return $query->row();
    }
}
