<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DynamicMenu {
     private $ci;

     function __construct(){
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
     }

     private function getParentMenu(){
          $query = $this->ci->db->query("select * from menu WHERE parent=0 AND status='active' ORDER BY position ASC");
          return $query->result();
     }

     public function profile_menu(){
          $query = $this->ci->db->query("select id,title,slug from page_profiles ORDER BY page_order ASC");
          return $query->result();
     }

     public function ruang_lingkup(){
          $query = $this->ci->db->query("select id,title,slug from scopes ORDER BY page_order ASC");
          return $query->result();
     }

     public function theMenu(){
          $parent = $this->getParentMenu();
          $mn = array();
          $i = 0;
          foreach ($parent as $par) {
               $query = $this->ci->db->query("select * from menu WHERE parent=".$par->id." AND status='active' ORDER BY position ASC");
               $mn[$i]['menu_nm'] = $par->menuName;
               $mn[$i]['menu_link'] = $par->link;
               $mn[$i]['menu_page'] = $par->page;
               $mn[$i]['menu_position'] = $par->position;
               $mn[$i]['menu_parent'] = $par->parent;
               $mn[$i]['menu_child'] = array();
               $j = 0;
               foreach ($query->result() as $child) {
                    $mn[$i]['menu_child'][$j] = array(
                         'child_nm' => $child->menuName,
                         'child_link' => $child->link,
                         'child_page' => $child->page,
                         'child_position' => $child->position,
                         'child_parent' => $child->parent,
                    );
                    $j++;
               }
               $i++;
          }
          return $mn;
     }
}
