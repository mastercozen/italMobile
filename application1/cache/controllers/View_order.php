<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class view_order extends CI_Controller {
    public function index() {
       
        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();

        $user_sess=$this->session->userdata('customer_logged_in');
        if(!isset($_GET['id'])||empty($_GET['id'])||$_GET['id']!=$user_sess['id']){
            redirect('shop', 'refresh');

        }
        if($this->session->userdata('customer_logged_in')){
                $this->load->model('Order_model');
                $data["orders"] = $this->Order_model->getOrderByUser($this->input->get('id'));


                $this->load->view('customer/includes/header');
                $this->load->view('customer/includes/navbar');
                $this->load->view('customer/includes/sidebar');
                //--------------------------------------------------
                $this->load->view('customer/order-history-view',$data);
                //--------------------------------------------------
                $this->load->view('customer/includes/footer',$footer);
                $this->load->view('customer/includes/modal-view-order');
        }
        
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/order-history-view');
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
        }
    }
}