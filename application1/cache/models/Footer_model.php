<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Footer_model extends CI_Model {
    public function get_footer_info(){
    	$x=$this->db->get('footer');
        return $x->result();
    }

    public function update_social($social){
    	$this->db->update('footer', $social);
    }
    public function update_contact($contact){
    	$this->db->update('footer', $contact);
    }
}