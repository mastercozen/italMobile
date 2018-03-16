<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
    public function index() {

        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();
        
        if($this->session->userdata('customer_logged_in')){
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/feedback-view');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/feedback-view');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
        }
    }
    public function alpha_spaces_name($str) {
        if (preg_match('/^[a-zA-Z -]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_name', 'The First name field may only contain alphabetical and white-space characters.');
            return false;
        }
    }
    
    public function alpha_spaces_prod_desc($str) {
        if (preg_match('/^[a-zA-Z0-9,.!? ]*$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_prod_desc', 'The Product Description field may only contain letters,numbers,comma,period,? and white-space characters.');
            return false;
        }
    }

    public function send_feedback(){
        $this->load->model('Feedback_model');
        
        $this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_spaces_name');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('message', 'Message', 'required|callback_alpha_spaces_prod_desc');
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            
        } 
        else{
            $data=array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'message' => $this->input->post('message'),
                'date_submitted' => date("Y-m-d H:i:s")
            );
            
            $this->Feedback_model->add_feedback($data);
            
            redirect('feedback','refresh');
        }
    }
}