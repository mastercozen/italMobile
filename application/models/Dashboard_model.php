<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    public function total_customers(){
        $this->db->select('*');
        $this->db->from('customer');
        $x = $this->db->get(); 
        return $x->num_rows();
    }
    public function total_active_products(){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('status', 'Active');
        $x = $this->db->get(); 
        return $x->num_rows();
    }
    public function total_new_orders(){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_status', 'Pending');
        $x = $this->db->get(); 
        return $x->num_rows();
    }
    public function total_new_contest_designs(){
        $this->db->select('*');
        $this->db->from('shirt_design');
        $this->db->where('design_status', 'Pending');
        $x = $this->db->get(); 
        return $x->num_rows();
    }
    public function total_feedbacks(){
        $this->db->select('*');
        $this->db->from('feedbacks');
        $x = $this->db->get(); 
        return $x->num_rows();
    }
}