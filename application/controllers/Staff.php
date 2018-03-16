<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Staff extends CI_Controller{
        function index(){
            if ($this->session->userdata('staff_logged_in')) {
                redirect('staff_page', 'refresh');
            } 
            else {
                $this->load->view('staff/login-view');
            }
            
        }   
        
        function verify_login() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('staff/login-view');
            } else {
                redirect('staff_page', 'refresh');
            }
        }
         
        function check_database($password){
            $this->load->model('Staff_model');
            $username = $this->input->post('username');
            $result = $this->Staff_model->login($username, $password);

            if($result){
                $sess_array = array();

                foreach($result as $row){
                    $sess_array = array(
                        'id' => $row->staff_id,
                        'username' => $row->username
                    );
                    
                    $this->session->set_userdata('staff_logged_in', $sess_array);
                }
                return TRUE;
            }
            else{
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return false;
            }
        }
        
        
    }
 