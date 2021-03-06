<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MInformasi extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getProsedur(){
         $this->db->select('*');
         $this->db->from('pages');
         $this->db->where('slug', 'certification-procedure');
         $query = $this->db->get();
         return $query->row();
    }

    public function getNewsEvent($limit,$start){
         $this->db->select('
               news_event.id AS neId,
               news_event.category,
               news_event.title,
               news_event.content,
               news_event.posted_date,
               news_event.feature_image,
               users.first_name,
               users.last_name
          ');
         $this->db->from('news_event');
         $this->db->join('users','users.id = news_event.posted_by');
         $this->db->order_by('posted_date','DESC');
         $this->db->limit($limit,$start);
         $query = $this->db->get();
         return $query->result();
    }

    public function newsEventCount(){
         $this->db->select('*');
         $this->db->from('news_event');
         $query = $this->db->get();
         return $query->num_rows();
    }

    public function getAcara($limit,$offset){
         $this->db->select('*');
         $this->db->from('certification_v');
         $this->db->order_by('start_date','DESC');
         $this->db->limit($limit,$offset);
         $query = $this->db->get();
         return $query->result();
    }
    public function acaraCount(){
         $this->db->select('*');
         $this->db->from('certification_v');
         $query = $this->db->get();
         return $query->num_rows();
    }

    public function getSingleNewsEvent($id){
         $this->db->select('*');
         $this->db->from('news_event');
         $this->db->join('users','users.id = news_event.posted_by');
         $this->db->where('news_event.id', $id);
         $query = $this->db->get();
         return $query->row();
    }

    public function getSingleAcara($id){
         $this->db->select('*');
         $this->db->from('certification_v');
         $this->db->where('id', $id);
         $query = $this->db->get();
         return $query->row();
    }
}
