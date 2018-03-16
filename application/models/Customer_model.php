<?php

class Customer_model extends CI_Model {

    public function add_customer($customer) {
        
        $this->load->helper('string');
        $key=  random_string('alnum',20);
        
        $customer = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name'),
            'status_key' => $key
        );
        
        $this->db->insert('customer', $customer);

        
        $this->load->library('email');
        
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'janvincent689@gmail.com';
        $config['smtp_pass']    = '#ASK ME FOR THIS: imnii@outlook.com#';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; 

        $this->email->initialize($config);
        
        $this->email->from('janvincent689@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
        $this->email->to($this->input->post('email'));

        $this->db->where('email', $this->input->post('email'));
        $this->db->select('customer_id');
        $id = $this->db->get('customer')->row()->customer_id;

        
        $this->email->subject('Email Verification');
        $this->email->message("Greetings! from Italiannis : Pasta, Pizza and Wings. You may now click the confirmation Link below to complete your registration."
                            . "".base_url()."/Register/updateStatus/$id/$key");

        $this->email->send();
    }

    public function updateStatus($id,$key) {
        $query = $this->db->get_where('customer', array('customer_id' => $id,'status_key' => $key));
        
        if($query->num_rows() == 1){
            $this->db->query("update customer set status = 1 where customer_id = $id and status_key ='$key'");
            redirect('register/success_100', 'refresh');
        }
        else{
            redirect('register/verify_failed', 'refresh');
        }
         
    }
    
    
    public function login($email, $password) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('status',1);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();

        $query2 = $this->db->get_where('customer', array('status' => 0, 'email' => $this->input->post('email'), 'password' => $this->input->post('password')));
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        else if($query2->num_rows() == 1){
            redirect('register/not_verified', 'refresh');
        }
    }
    
    public function getCustomers() {
        $x = $this->db->get('customer');
        return $x->result();
    }
    
    public function getCustomersById($id) {
        $x = $this->db->get_where('customer', array('customer_id' => $id));
        return $x->result();
    }
    
    public function getCustomersByIdArray($id) {
        $x = $this->db->get_where('customer', array('customer_id' => $id));
        return $x->result_array();
    }
    
    public function getCustomersByDesign($id) {
        $x = $this->db->get_where('shirt_design', array('design_id' => $id));
        return $x->result_array();
    }
    
    public function update_customer($customer_password,$id){
        $this->db->update('customer',$customer_password,array('customer_id'=>$id));
    }
   
    public function getAddressById($id) {
        $x = $this->db->get_where('address_book', array('customer_id' => $id));
        return $x->result();
    }
    
    public function add_address_book($customer_address){
        $this->db->insert('address_book',$customer_address);
    }
   
    public function getProductsByAddressId($id){
        $x = $this->db->get_where('address_book', array('address_id' => $id));
        return $x->result();
    }

    public function update_address_book($customer_address,$id){
        $this->db->update('address_book',$customer_address,array('address_id'=>$id));
    }
    public function delete_address($aid){
        $this->db->delete('address_book',array('address_id'=>$aid));
    }
    public function update_customer_status($customer,$id){
        $this->db->update('customer',$customer,array('customer_id'=>$id));
    }
    public function check_customer_vote_status($id){

        
        
        $this->db->select('vote_status');
        $this->db->from('customer');
        $this->db->where('customer_id',$id);

        $x = $this->db->get();
        
        return $x->result_array();
        
    }
    
}
