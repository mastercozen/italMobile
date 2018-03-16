<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function index() {
      
        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();

        $user_sess=$this->session->userdata('customer_logged_in');
        if($this->session->userdata('customer_logged_in')){
            

            if(!isset($_GET['id'])||empty($_GET['id'])||$_GET['id']!=$user_sess['id']){
                redirect('shop', 'refresh');
            }
            
            $this->load->model('Customer_model');
            $data['customers'] = $this->Customer_model->getCustomersById($this->input->get('id'));
            $data['addresses'] = $this->Customer_model->getAddressById($this->input->get('id'));
            
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            
            $this->load->view('customer/profile-view',$data);
            //--------------------------------------------------
            
            $this->load->view('customer/includes/footer',$footer);
            $this->load->view('customer/includes/modal-address-book',$data);
        }
        else{
            redirect('shop','refresh');
        }
    }
    public function change_password() {
        $this->form_validation->set_rules('old-password', 'Old Password', 'required|callback_oldpassword_check');
        $this->form_validation->set_rules('new-password', 'New Password', 'required|min_length[6]|alpha_numeric');
        $this->form_validation->set_rules('confirm-new-password', 'Confirm Password', 'required|matches[new-password]');

        $customer_password = array(
            'password' => $this->input->post('new-password')
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } 
        else {
            $this->load->model('Customer_model');
            $this->Customer_model->update_customer($customer_password, $this->input->get('id'));
            $this->index();
            
        }
    }
    public function oldpassword_check($oldpassword) {
        $this->load->model('Customer_model');
        $result = $this->Customer_model->getCustomersById($this->input->get('id'));

        foreach ($result as $row) {
            if ($oldpassword == $row->password) {
                return TRUE;
            } else {
                $this->form_validation->set_message('oldpassword_check', 'Invalid Old password');
                return false;
            }
        }
    }
    
    public function change_profile_info() {
        
        $this->form_validation->set_rules('first-name', 'First name', 'required|callback_alpha_spaces_fn');
        $this->form_validation->set_rules('middle-name', 'Middle name', 'required|callback_alpha_spaces_mn');
        $this->form_validation->set_rules('last-name', 'Last name', 'required|callback_alpha_spaces_ln');
        
        $this->form_validation->set_rules('contact', 'Contact number', 'numeric');
        

        $customer_info = array(
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name'),
            'gender' => $this->input->post('gender'),
            'contact' => $this->input->post('contact')
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } 
        else {
            $this->load->model('Customer_model');
            $this->Customer_model->update_customer($customer_info, $this->input->get('id'));
            $this->index();
        }
    }
    public function alpha_spaces_fn($str) {
        if (preg_match('/^[a-zA-Z -]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_fn', 'The First name field may only contain alphabetical and white-space characters.');
            return false;
        }
    }
    public function alpha_spaces_mn($str) {
        if (preg_match('/^[a-zA-Z -]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_mn', 'The Middle name field may only contain alphabetical and white-space characters.');
            return false;
        }
    }
    public function alpha_spaces_ln($str) {
        if (preg_match('/^[a-zA-Z -]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_ln', 'The Last name field may only contain alphabetical and white-space characters.');
            return false;
        }
    }
    
    
    public function alpha_spaces_street($str) {
        if (preg_match('/^[a-zA-Z0-9,.!? ]*$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_street', 'The Street field may only contain letters,numbers,comma,period and white-space characters.');
            return false;
        }
    }
    
    public function alpha_spaces_city($str) {
        if (preg_match('/^[a-zA-Z0-9,.!? ]*$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_city', 'The City field may only contain letters,numbers,comma,period and white-space characters.');
            return false;
        }
    }
    
    public function alpha_spaces_state($str) {
        if (preg_match('/^[a-zA-Z0-9,.!? ]*$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_state', 'The State field may only contain letters,numbers,comma,period and white-space characters.');
            return false;
        }
    }
    public function alpha_spaces_co($str) {
        if (preg_match('/^[a-zA-Z0-9,.!? ]*$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_state', 'The State field may only contain letters,numbers,comma,period and white-space characters.');
            return false;
        }
    }
    

    
    public function add_address_book() {
        
        $this->form_validation->set_rules('street', 'Street', 'required|callback_alpha_spaces_street');
        $this->form_validation->set_rules('city', 'City', 'required|callback_alpha_spaces_city');
        $this->form_validation->set_rules('state', 'State', 'required|callback_alpha_spaces_state');
        $this->form_validation->set_rules('zip', 'Zip code', 'required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'required|callback_alpha_spaces_co');
        

        $customer_address = array(
            'customer_id' => $this->input->get('id'),
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'country' => $this->input->post('country')
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } 
        else {
            $this->load->model('Customer_model');
            $this->Customer_model->add_address_book($customer_address);
            redirect('profile?id='.$this->input->get('id'),'refresh');
        }
    }
    public function ajax_view_address_by_id($id) {
        $this->load->model('Customer_model');
        $data["result"] = $this->Customer_model->getProductsByAddressId($id);
        echo json_encode($data);
    }
    public function update_address_book() {
        
        $this->form_validation->set_rules('street', 'Street', 'required|callback_alpha_spaces_street');
        $this->form_validation->set_rules('city', 'City', 'required|callback_alpha_spaces_city');
        $this->form_validation->set_rules('state', 'State', 'required|callback_alpha_spaces_state');
        $this->form_validation->set_rules('zip', 'Zip code', 'required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'required|alpha_dash');
        

        $customer_address = array(
       
            'street' => $this->input->post('street'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'country' => $this->input->post('country')
        );
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } 
        else {
            $this->load->model('Customer_model');
            $this->Customer_model->update_address_book($customer_address, $this->input->post('address-id'));
            redirect('profile?id='.$this->input->get('id'),'refresh');
        }
    }
     public function delete_address() {
            $this->load->model('Customer_model');
            $this->Customer_model->delete_address($this->input->get('aid'));
            redirect('profile?id='.$this->input->get('uid'),'refresh');
     }
    
}