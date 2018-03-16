<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function index() {
    	$this->load->model('Analytics_model');
    	
    	$ip = $this->input->ip_address();
    	$this->Analytics_model->unique_page_visitors($ip);


        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();

        $this->load->model('Cms_model');
        $cms["cms"] = $this->Cms_model->get_cms();

        if($this->session->userdata('customer_logged_in')){
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/home-view',$cms);
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
        }
        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl');
            $this->load->view('customer/includes/sidebar');
            //--------------------------------------------------
            $this->load->view('customer/home-view',$cms);
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
        }
    }
}