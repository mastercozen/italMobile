<?php defined('BASEPATH') OR exit('No direct script access allowed');

    Class Analytics_model extends CI_Model {

        function unique_page_visitors($ip) {
            $this->db->select('*');
            $this->db->from('analytics');
            $this->db->where('unique_page_visitors', $ip);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return false;
            } else {
            	$ip = array(
            		'unique_page_visitors' => $ip
            	);
                $this->db->insert('analytics', $ip);
            }
        }
        
        public function page_visits(){
            $this->db->select('*');
            $this->db->from('analytics');
            $query = $this->db->get();
            return $query->num_rows();
        }
        
    }