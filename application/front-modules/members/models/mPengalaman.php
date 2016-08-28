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

    public function getByID($id){
         $this->db->select('*');
         $this->db->from('user_experience');
         $this->db->where('id', $id);
         $query = $this->db->get();
         return $query->row();
    }

    public function save($data){
         $this->db->insert('user_experience',$data);
         return $this->db->affected_rows();
    }

    public function update($data, $id){
         $this->db->where('id', $id);
         $this->db->update('user_experience', $data);
         return $this->db->affected_rows();
    }

    public function deleteByID($id){
         $this->db->where('id',$id);
         $this->db->delete('user_experience');
         return $this->db->affected_rows();
    }
}
