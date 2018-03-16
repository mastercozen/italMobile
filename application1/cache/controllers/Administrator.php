<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Administrator extends CI_Controller{
        function index(){
            if ($this->session->userdata('admin_logged_in')) {
                redirect('administrator_page', 'refresh');
            } 
            else {
                $this->load->view('administrator/login-view');
            }
            
        }   
        
        function verify_login() {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('administrator/login-view');
            } else {
                redirect('Administrator_page', 'refresh');
            }
        }
         
        function check_database($password){
            $this->load->model('Admin_model');
            $username = $this->input->post('username');
            $result = $this->Admin_model->login($username, $password);

            if($result){
                $sess_array = array();

                foreach($result as $row){
                    $sess_array = array(
                        'id' => $row->admin_id,
                        'username' => $row->username
                    );
                    
                    $this->session->set_userdata('admin_logged_in', $sess_array);
                }
                return TRUE;
            }
            else{
                $this->form_validation->set_message('check_database', 'Invalid username or password');
                return false;
            }
        }
        
        
    }
 