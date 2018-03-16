<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {
    public function add_feedback($data){
        $this->db->insert('feedbacks', $data);
    }
    public function get_feedbacks(){
        $x=$this->db->get('feedbacks');
        
        return $x->result();
    }
    public function get_feedbacks_by_id($id){
        $x = $this->db->get_where('feedbacks', array('feedback_id' => $id));
        return $x->result();
        
    }
}