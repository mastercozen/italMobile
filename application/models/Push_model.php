<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Push_model extends CI_Model {
    public function get_messages(){
        $x=$this->db->get('push_notifications');
        return $x->result();
    }
    public function push_new($message){
    	$this->db->insert('push_notifications', $message);
    }
}