<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model {

    public function getStaffs() {
        $x = $this->db->get('staff');
        return $x->result();
    }

    function getStaffById($id) {
        $x = $this->db->get_where('staff', array('staff_id' => $id));
        return $x->result();
    }

    public function add_staff($staff) {
        $this->db->insert('staff', $staff);
    }

    public function update_staff($staff, $id) {
        $this->db->update('staff', $staff, array('staff_id' => $id));
    }

    public function update_staff_password($staff_password, $id) {
        $this->db->update('staff', $staff_password, array('staff_id' => $id));
    }
    
    function login($username, $password) {
        $this->db->select('staff_id, username, password');
        $this->db->from('staff');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('status', 'Active');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}