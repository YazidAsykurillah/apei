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

    public function getNewsEvent($limit=null,$offset=null){
         $this->db->select('*');
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

    public function getAcara($limit=null,$offset=null){
         $this->db->select('*');
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
}
