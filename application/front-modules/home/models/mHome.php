<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MHome extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function getNewsEvent($limit=4,$offset=null){
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
         if($limit){
              if($offset){
                   $this->db->limit($limit,$offset);
              }else{
                    $this->db->limit($limit);
              }
         }
         $this->db->join('users','users.id = news_event.posted_by');
         $this->db->order_by('posted_date','DESC');
         $query = $this->db->get();
         return $query->result();
    }

    public function getAcara($limit=4,$offset=null){
         $this->db->select('*');
         $this->db->from('certification_v');
         if($limit){
              if($offset){
                   $this->db->limit($limit,$offset);
              }else{
                    $this->db->limit($limit);
              }
         }
         $this->db->order_by('start_date','DESC');
         $query = $this->db->get();
         return $query->result();
    }
}
