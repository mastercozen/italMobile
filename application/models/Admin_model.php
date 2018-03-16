<?php defined('BASEPATH') OR exit('No direct script access allowed');

    Class Admin_model extends CI_Model {

        function login($username, $password) {
            $this->db->select('admin_id, username, password');
            $this->db->from('administrator');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);

            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return $query->result();
            } else {
                return false;
            }
        }
        
        public function getAdminInfo(){
            $x = $this->db->get('administrator');
            return $x->result();
        }
        
        public function update_admin_info($admin_info,$id){
             $this->db->update('administrator',$admin_info,array('admin_id'=>$id));
        }
        
        public function update_admin_username($admin_username,$id){
             $this->db->update('administrator',$admin_username,array('admin_id'=>$id));
        }
        
        public function update_admin_password($admin_password,$id){
             $this->db->update('administrator',$admin_password,array('admin_id'=>$id));
        }
    }