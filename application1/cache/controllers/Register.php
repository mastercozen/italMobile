<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
       

        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();

        if($this->session->userdata('customer_logged_in')){
            redirect('shop', 'refresh');
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $data = array(
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            );
            $this->load->view('customer/register-view', $data);
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
            $this->load->view('customer/includes/modal-forgot-password');
        }
    }


   
    
    
    
    /*-----Login-----*/
    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            redirect('shop', 'refresh');
        }
    }

    public function login_mobile() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            redirect('shop', 'refresh');
        }
    }

    public function check_database($password) {
        $this->load->model('Customer_model');
        $email = $this->input->post('email');
        $result = $this->Customer_model->login($email, $password);

        if ($result) {
            $sess_array = array();

            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->customer_id,
                    'email' => $row->email,
                    'first_name' => $row->first_name
                );

                $this->session->set_userdata('customer_logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid Email or password');
            return false;
        }
    }
    
    public function registration() {
        
        $customer = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name')
        );
        
        $this->form_validation->set_rules('first-name', 'First name', 'required|callback_alpha_spaces_fn');
        $this->form_validation->set_rules('middle-name', 'Middle name', 'required|callback_alpha_spaces_mn');
        $this->form_validation->set_rules('last-name', 'Last name', 'required|callback_alpha_spaces_ln');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customer.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]|alpha_numeric');
        
        $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->load->model('Customer_model');
            $this->Customer_model->add_customer($customer);
            redirect('register/success_50', 'refresh');
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
//    public function password_pre($str) {
//        if (preg_match('/^[a-zA-Z-]+$/i', $str)) {
//            return true;
//        }
//        else{
//            $this->form_validation->set_message('password_pre', 'The Password field should contain atleast one Capital letter, Small letter and Number).');
//            return false;
//        }
//    }

    public function recaptcha(){
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
        if (isset($response['success']) and $response['success'] === true) {
            return true;
        }
        else{
            $this->form_validation->set_message('recaptcha', 'ReCaptcha failed. Shall we give it another try?');
            return FALSE; 
        }
    }


    public function updateStatus() {
        $this->load->model('Customer_model');
        $id = $this->uri->segment(3);
        $key = $this->uri->segment(4);
        $this->Customer_model->updateStatus($id,$key);
    }
    
    public function success_50(){
       
        if($this->session->userdata('customer_logged_in')){
            redirect('shop', 'refresh');
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/notifications/registration-success');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer');
        }
        
    }
    
    public function success_100(){
   
        if($this->session->userdata('customer_logged_in')){
            redirect('shop', 'refresh');
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/notifications/email-verified');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer');
        }
        
    }
    public function verify_failed(){

        if($this->session->userdata('customer_logged_in')){
            redirect('shop', 'refresh');
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/notifications/verify-failed');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer');
        }
        
    }
    public function not_verified(){
        
  
        if($this->session->userdata('customer_logged_in')){
            redirect('shop', 'refresh');
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/notifications/email-not-verified');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer');
        }
        
    }
    
}