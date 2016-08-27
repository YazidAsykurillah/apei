<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class MGaleri extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    function getPhoto(){
         $this->db->select('*');
         $this->db->from('albums');
         $q = $this->db->get();
         $result = array();
         if($q->result()){
              $j = 0;
              foreach ($q->result() as $res) {
                  $result[$j] = array();
                  $result[$j]['id'] = $res->id;
                  $result[$j]['title'] = $res->title;
                  $result[$j]['description'] = $res->description;
                  $result[$j]['galeri'] = array();

                  $this->db->select('*');
                  $this->db->from('photos');
                  $this->db->where('album_id', $res->id);
                  $r = $this->db->get();
                  if($r->result()){
                       $i = 0;
                       foreach ($r->result() as $rg) {
                            $result[$j]['galeri'][$i] = array(
                                 'id' => $rg->id,
                                 'albums' => $res->id,
                                 'title' => $rg->title,
                                 'file_name' => $rg->file_name
                            );
                            $i++;
                       }
                  }
                  $j++;
             }
             return $result;
        }else{
             return false;
        }
    }

}
