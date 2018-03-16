<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_page extends CI_Controller {
//Constructor
    public function __construct(){
        parent::__construct();

        //LIBRARIES
        $this->load->library('image_lib');

        //HELPERS
        $this->load->helper('string');
    }
   public function index(){
        $this->load->model('Product_model');
        $this->load->model('Dashboard_model');
        if ($this->session->userdata('staff_logged_in')) {
            $data['online']=$this->Product_model->get_all_products_and_its_online_stocks();
            $data['walkin']=$this->Product_model->get_all_products_and_its_walkin_stocks();
            $data['total_customers']=$this->Dashboard_model->total_customers();
            $data['active_products']=$this->Dashboard_model->total_active_products();
            $data['feedbacks']=$this->Dashboard_model->total_feedbacks();
            $data['new_orders']=$this->Dashboard_model->total_new_orders();
            $data['new_contest_designs']=$this->Dashboard_model->total_new_contest_designs();

            $data['message_count']=0;
            foreach($data['online'] as $x){
                if($x->sizing=="Multi"){
                    if( $x->xs <= 5 ){ $data['message_count']++; }
                    if( $x->sm <= 5 ){ $data['message_count']++; }
                    if( $x->md <= 5 ){ $data['message_count']++; }
                    if( $x->lg <= 5 ){ $data['message_count']++; }
                    if( $x->xl <= 5 ){ $data['message_count']++; }
                    if( $x->xxl <= 5 ){ $data['message_count']++; }
                    if( $x->xxxl <= 5 ){ $data['message_count']++; }
                }
                elseif($x->sizing=="One"){
                    if( $x->one <= 5 ){ $data['message_count']++; }
                }
            }
            foreach($data['walkin'] as $x){
                if($x->sizing=="Multi"){
                    if( $x->xs <= 5 ){ $data['message_count']++; }
                    if( $x->sm <= 5 ){ $data['message_count']++; }
                    if( $x->md <= 5 ){ $data['message_count']++; }
                    if( $x->lg <= 5 ){ $data['message_count']++; }
                    if( $x->xl <= 5 ){ $data['message_count']++; }
                    if( $x->xxl <= 5 ){ $data['message_count']++; }
                    if( $x->xxxl <= 5 ){ $data['message_count']++; }
                }
                elseif($x->sizing=="One"){
                    if( $x->one <= 5 ){ $data['message_count']++; }
                }
            }

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/dashboard-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }

    /* PRODUCTS---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function manage_product() {
        if ($this->session->userdata('staff_logged_in')) {
            $session_data = $this->session->userdata('staff_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProducts();
            $data['product_type'] = $this->Product_model->getProductType();
            
            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/product-view', $data);
            $this->load->view('staff/includes/footer');
        } else {
            redirect('Staff', 'refresh');
        }
    }

    public function ajax_view_product_by_id($id) {
        $this->load->model('Product_model');
        $data["result"] = $this->Product_model->getProductsById($id);
        echo json_encode($data);
    }
    public function ajax_view_stocks_online_by_id($id) {
        $this->load->model('Product_model');
        $data["result"] = $this->Product_model->getStocksOnlineById($id);
        echo json_encode($data);
    }
    public function ajax_view_stocks_walkin_by_id($id) {
        $this->load->model('Product_model');
        $data["result"] = $this->Product_model->getStocksWalkinById($id);
        echo json_encode($data);
    }

    public function update_product() {
        $product = array(
            'product_name' => $this->input->post('product-name'),
            'type' => $this->input->post('type'),
            'main_ing' => $this->input->post('main_ing'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'price' => $this->input->post('price')
        );
        
        $this->form_validation->set_rules('product-name', 'Product name', 'required|min_length[4]|callback_alpha_spaces_prod_name'); //VALIDATION OKAY |is_unique[products.product_name]
        $this->form_validation->set_rules('type', 'Type', 'required|callback_alpha_spaces_prod_type'); //VALIDATION OKAY
        $this->form_validation->set_rules('main_ing', 'Main Ingredient', 'required|callback_alpha_spaces_prod_main_ing'); //VALIDATION OKAY
        $this->form_validation->set_rules('description', 'Description', 'required|callback_alpha_spaces_prod_desc'); //VALIDATION OKAY
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural'); //VALIDATION OKAY

        if ($this->form_validation->run() == FALSE) {
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $this->Product_model->update_product($product, $this->input->post('product-id'));
            redirect('Staff_page/manage_product', 'refresh');
        }
    }

    public function update_product_image() {
        $config['upload_path'] = 'uploads/products';    //folder na pagssave ng pic
        $config['allowed_types'] = 'jpg|png|jpeg';            //types na pede
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;                   //pag naka FALSE pag my duplicate na filename magkakarun lang ng (1)
        $config['file_name'] = $this->input->post('product-name');
        
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            //$this->load->view('staff/admin_products_view', $error);
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $product = array(
                'upload_data' => $this->upload->data()
            );

            $this->Product_model->update_product_image($product, $this->input->post('product-id'));
            redirect('Staff_page/manage_product', 'refresh');
        }
    }
    public function delete_product() {
        $id = $this->uri->segment(3);
        
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);
        redirect('Staff_page/manage_product', 'refresh');
        
        
    }
    public function alpha_spaces_prod_name($str) {
        if (preg_match('/^[a-z0-9 .\-()]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_prod_name', 'The Product name field may only contain alphabetical,numberical and white-space characters.');
            return false;
        }
    }
    public function alpha_spaces_prod_type($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_prod_type', 'The Product type field may only contain alphabetical,numberical and white-space characters.');
            return false;
        }
    }
    public function alpha_spaces_prod_main_ing($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_prod_main_ing', 'The Product main ingredient field may only contain alphabetical,numberical and white-space characters.');
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


    public function add_product_type() {
        $this->form_validation->set_rules('product-type', 'Product Type', 'required|min_length[3]|callback_alpha_spaces_prod_type');
        if ($this->form_validation->run() == FALSE) {
            $this->manage_product();
        }
        else{
            $this->load->model('Product_model');
            $product_type = array(
                'type' => $this->input->post('product-type')
            );

            $this->Product_model->add_product_type($product_type);
            redirect('Staff_page/manage_product', 'refresh');
        }

    }
    public function delete_product_type($type) {


        $this->load->model('Product_model');
        $check=$this->Product_model->check_product_type($type);


        echo json_encode($check);

    }
    public function add_product() {
        $config['upload_path'] = 'uploads/products';    //folder na pagssave ng pic
        $config['allowed_types'] = 'jpg|png|jpeg';            //types na pede
        $config['max_size'] = '2048000';
        $config['overwrite'] = FALSE;                   //pag naka FALSE pag my duplicate na filename magkakarun lang ng (1)
        $config['file_name'] = $this->input->post('product-name');

        $this->load->library('upload', $config);


        $this->form_validation->set_rules('product-name', 'Product name', 'required|min_length[4]|callback_alpha_spaces_prod_name'); //VALIDATION OKAY |is_unique[products.product_name]
        $this->form_validation->set_rules('type', 'Type', 'required|callback_alpha_spaces_prod_type'); //VALIDATION OKAY
        $this->form_validation->set_rules('main_ing', 'Main Ingredient', 'required|callback_alpha_spaces_prod_main_ing'); //VALIDATION OKAY
        $this->form_validation->set_rules('description', 'Description', 'required|callback_alpha_spaces_prod_desc'); //VALIDATION OKAY
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural'); //VALIDATION OKAY

        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('userfile')) {
            //$this->load->view('staff/admin_products_view', $error);
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $product = array(
                'product_name' => $this->input->post('product-name'),
                'type' => $this->input->post('type'),
                'sizing' => $this->input->post('sizing'),
                'main_ing' => $this->input->post('main_ing'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'price' => $this->input->post('price'),
                'upload_data' => $this->upload->data()
            );

            $this->Product_model->add_product($product);
            redirect('Staff_page/manage_product', 'refresh');
        }
    }
    
    /* Stocks online [OK]---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function stocks_online() {
        if ($this->session->userdata('staff_logged_in')) {
            $session_data = $this->session->userdata('staff_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProductStocksOnline();
            
            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/stocks-online-view',$data);
            $this->load->view('staff/includes/footer');
        } else {
            redirect('Staff', 'refresh');
        }
    }
    
    public function stocks_walkin() {
        if ($this->session->userdata('staff_logged_in')) {
            $session_data = $this->session->userdata('staff_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProductStocksWalkin();
            
            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/stocks-walkin-view',$data);
            $this->load->view('staff/includes/footer');
        } else {
            redirect('Staff', 'refresh');
        }
    }

    public function add_stocks_online(){
        $this->form_validation->set_rules('xs', 'XS', 'required|is_natural');
        $this->form_validation->set_rules('sm', 'SM', 'required|is_natural');
        $this->form_validation->set_rules('md', 'MD', 'required|is_natural');
        $this->form_validation->set_rules('lg', 'LG', 'required|is_natural');
        $this->form_validation->set_rules('xl', 'XL', 'required|is_natural');
        $this->form_validation->set_rules('xxl', 'XXL', 'required|is_natural');
        $this->form_validation->set_rules('xxxl', 'XXXL', 'required|is_natural');
        $this->form_validation->set_rules('one-size', 'One size', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            $this->stocks_online();
        }
        else{
            $this->load->model('Product_model');
            if($this->input->post("prod_sizing")=="Multi"){
                $multi_size_stocks = array(
                    'xs' => $this->input->post('xs'),
                    'sm' => $this->input->post('sm'),
                    'md' => $this->input->post('md'),
                    'lg' => $this->input->post('lg'),
                    'xl' => $this->input->post('xl'),
                    'xxl' => $this->input->post('xxl'),
                    'xxxl' => $this->input->post('xxxl')
                );

                $this->Product_model->add_stocks_online_multisize($multi_size_stocks, $this->input->post('prod-id'));
                redirect('Staff_page/stocks_online', 'refresh');
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->add_stocks_online_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Staff_page/stocks_online', 'refresh');
            }
        }
        
    }
    
    public function add_stocks_walkin(){
        $this->form_validation->set_rules('xs', 'XS', 'required|is_natural');
        $this->form_validation->set_rules('sm', 'SM', 'required|is_natural');
        $this->form_validation->set_rules('md', 'MD', 'required|is_natural');
        $this->form_validation->set_rules('lg', 'LG', 'required|is_natural');
        $this->form_validation->set_rules('xl', 'XL', 'required|is_natural');
        $this->form_validation->set_rules('xxl', 'XXL', 'required|is_natural');
        $this->form_validation->set_rules('xxxl', 'XXXL', 'required|is_natural');
        $this->form_validation->set_rules('one-size', 'One size', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            $this->stocks_walkin();
        }
        else{
            $this->load->model('Product_model');
            if($this->input->post("prod_sizing")=="Multi"){
                $multi_size_stocks = array(
                    'xs' => $this->input->post('xs'),
                    'sm' => $this->input->post('sm'),
                    'md' => $this->input->post('md'),
                    'lg' => $this->input->post('lg'),
                    'xl' => $this->input->post('xl'),
                    'xxl' => $this->input->post('xxl'),
                    'xxxl' => $this->input->post('xxxl')
                );

                $this->Product_model->add_stocks_walkin_multisize($multi_size_stocks, $this->input->post('prod-id'));
                redirect('Staff_page/stocks_walkin', 'refresh');
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->add_stocks_walkin_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Staff_page/stocks_walkin', 'refresh');
            }
        }
    }
    public function decrease_stocks_walkin(){
        $this->form_validation->set_rules('xs', 'XS', 'required|is_natural');
        $this->form_validation->set_rules('sm', 'SM', 'required|is_natural');
        $this->form_validation->set_rules('md', 'MD', 'required|is_natural');
        $this->form_validation->set_rules('lg', 'LG', 'required|is_natural');
        $this->form_validation->set_rules('xl', 'XL', 'required|is_natural');
        $this->form_validation->set_rules('xxl', 'XXL', 'required|is_natural');
        $this->form_validation->set_rules('xxxl', 'XXXL', 'required|is_natural');
        $this->form_validation->set_rules('one-size', 'One size', 'required|is_natural');

        if ($this->form_validation->run() == FALSE) {
            $this->stocks_walkin();
        }
        else{
            $this->load->model('Product_model');
            if($this->input->post("prod_sizing")=="Multi"){
                if( $this->input->post('xs') > $this->input->post('xs-cs') ){
                    redirect('Staff_page/stocks_walkin', 'refresh');
                }
                else{
                    $multi_size_stocks = array(
                        'xs' => $this->input->post('xs'),
                        'sm' => $this->input->post('sm'),
                        'md' => $this->input->post('md'),
                        'lg' => $this->input->post('lg'),
                        'xl' => $this->input->post('xl'),
                        'xxl' => $this->input->post('xxl'),
                        'xxxl' => $this->input->post('xxxl')
                    );
                    
                    $this->Product_model->decrease_stocks_walkin_multisize($multi_size_stocks, $this->input->post('prod-id'));
                    redirect('Staff_page/stocks_walkin', 'refresh');
                }


                
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->decrease_stocks_walkin_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Staff_page/stocks_walkin', 'refresh');
            }
        }
    }
    
    /* LOGOUT---------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function customer_settings() {
        if ($this->session->userdata('staff_logged_in')) {
            $session_data = $this->session->userdata('staff_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Customer_model');
            $data['customers'] = $this->Customer_model->getCustomers();
            
            
            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/customer-view', $data);
            $this->load->view('staff/includes/footer');
        } else {
            redirect('Staff', 'refresh');
        }
    }
    
     public function deactivate_customer() {
         $customer = array(
            'status' => 0
        );
          $this->load->model('Customer_model');
          $this->Customer_model->update_customer_status($customer,$this->input->get("id"));
          redirect('Staff_page/customer_settings', 'refresh');
     }
     
     public function activate_customer() {
         $customer = array(
            'status' => 1
        );
          $this->load->model('Customer_model');
          $this->Customer_model->update_customer_status($customer,$this->input->get("id"));
          redirect('Staff_page/customer_settings', 'refresh');
     }

    /* ORDER VIEW---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function manage_orders() {
       if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getOrders();
           

           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/manage-order-view',$data);
           $this->load->view('staff/includes/footer');
       } else {
           redirect('Staff', 'refresh');
       }
    }

    public function manage_pending_orders() {
       if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getPendingOrders();
           


           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/manage-order-pending-view',$data);
           $this->load->view('staff/includes/footer');
       } else {
           redirect('Staff', 'refresh');
       }
    }

    public function manage_processing_orders() {
       if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getProcessingOrders();
           


           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/manage-order-processing-view',$data);
           $this->load->view('staff/includes/footer');
       } else {
           redirect('Staff', 'refresh');
       }
    }

    public function manage_shipped_orders() {
       if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getShippedOrders();
           


           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/manage-order-shipped-view',$data);
           $this->load->view('staff/includes/footer');
       } else {
           redirect('Staff', 'refresh');
       }
    }




    
    public function update_to_processing(){
        $status=array(
            'order_status' => 'Processing'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));
        $this->Order_model->notify_email_processing($this->input->get('id'));
        redirect('Staff_page/manage_processing_orders');
    }
    public function update_to_pending(){
        $status=array(
            'order_status' => 'Pending'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));
        redirect('Staff_page/manage_pending_orders');
    }
    public function update_to_shipped(){
        
        $status=array(
            'order_status' => 'Shipped'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));


        $this->Order_model->notify_email_shipped($this->input->get('id'));
        
        
        redirect('Staff_page/manage_shipped_orders');
    }

    
    public function view_order(){
        if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Order_model');
           
           
           
           $data["order_details"] = $this->Order_model->getFullOrderDetails($this->input->get('invoice_id'));
           $data["orders"] = $this->Order_model->getOrderByInvoice($this->input->get('invoice_id'));


           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/view-order-view',$data);
           $this->load->view('staff/includes/footer');
       } else {
           redirect('Staff', 'refresh');
       }
    }
    
    //Callback Image Validation
    public function image_check2($str){
        if (!$this->upload->do_upload('userfile')){
            $this->form_validation->set_message('image_check2', $this->upload->display_errors());
            return false;
        } 
    }

    //Image Resize 300x400
    public function image_resize_130x130(){
        /*300x400*/
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/customization_logos/'.$this->upload->file_name;
        $config['new_image'] = 'uploads/customization_logos/'.$this->upload->file_name;
        $config['maintain_ratio'] = TRUE;
        $config['height'] = 400;
        $config['width'] = 300;
        $this->image_lib->initialize($config);
        $this->image_lib->resize(); 
        $this->image_lib->clear();
    }


    public function delete_logo(){
        $this->load->model('Contest_model');
        $this->Contest_model->delete_logo($this->uri->segment(3));
        redirect('Staff_page/manage_customization_logo','refresh');
    }

    /*MANAGE FEEDBACKS*/
    public function view_feedbacks(){
        if ($this->session->userdata('staff_logged_in')) {
           $this->load->model('Feedback_model');
           
           $data["results"] = $this->Feedback_model->get_feedbacks();
           
           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/manage-feedback-view',$data);
           $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    
    public function getFeedbackById($id){
        $this->load->model('Feedback_model');
        
        $data["results"] = $this->Feedback_model->get_feedbacks_by_id($id);
        echo json_encode($data);
    }
    
    /*SALES REPORTS*/
    public function reports(){
        $this->load->model('Order_model');
        if ($this->session->userdata('staff_logged_in')) {
           $this->load->view('staff/includes/header');
           $this->load->view('staff/includes/topbar');
           $this->load->view('staff/includes/sidebar');
           $this->load->view('staff/reports-view');
           $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    
    public function reports_specific_date(){
        $this->load->model('Order_model');

        if ($this->session->userdata('staff_logged_in')) {
            
           $this->form_validation->set_rules('input-date', 'Date', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->reports();
            }
            else{
                $sdate = date('Y-m-d',strtotime($this->input->post('input-date')));
                $data['results']=$this->Order_model->getReportsCurrentDay($sdate);
                $data['header']=date("F j, Y",strtotime($this->input->post('input-date')));

                $this->load->view('staff/includes/header');
                $this->load->view('staff/includes/topbar');
                $this->load->view('staff/includes/sidebar');
                $this->load->view('staff/reports-specific-date-view',$data);
                $this->load->view('staff/includes/footer');
            }
            
           
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    
    public function reports_specific_m_y(){
        $this->load->model('Order_model');

        if ($this->session->userdata('staff_logged_in')) {
            
            $this->form_validation->set_rules('month', 'Month', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required|is_natural');

            if ($this->form_validation->run() == FALSE) {
                $this->reports();
            } 
            
            else{
                $data['results']=$this->Order_model->getReportsMonth($this->input->post('month'),$this->input->post('year'));
                
                $month="";
                if($this->input->post('month')==1){
                    $month="January";
                }
                elseif($this->input->post('month')==2){
                    $month="February";
                }
                elseif($this->input->post('month')==3){
                    $month="March";
                }
                elseif($this->input->post('month')==4){
                    $month="April";
                }
                elseif($this->input->post('month')==5){
                    $month="May";
                }
                elseif($this->input->post('month')==6){
                    $month="June";
                }
                elseif($this->input->post('month')==7){
                    $month="July";
                }
                elseif($this->input->post('month')==8){
                    $month="August";
                }
                elseif($this->input->post('month')==9){
                    $month="September";
                }
                elseif($this->input->post('month')==10){
                    $month="October";
                }
                elseif($this->input->post('month')==11){
                    $month="November";
                }
                elseif($this->input->post('month')==12){
                    $month="December";
                }
                
                $data['header']=$month." ".$this->input->post('year');
                
                $this->load->view('staff/includes/header');
                $this->load->view('staff/includes/topbar');
                $this->load->view('staff/includes/sidebar');
                $this->load->view('staff/reports-specific-m-y-view',$data);
                $this->load->view('staff/includes/footer');
            }
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    
    public function reports_specific_year(){
        $this->load->model('Order_model');

        if ($this->session->userdata('staff_logged_in')) {
            
            $this->form_validation->set_rules('year', 'Year', 'required|is_natural');

            if ($this->form_validation->run() == FALSE) {
                $this->reports();
            } 
            else{
                $data['results']=$this->Order_model->getReportsYear($this->input->post('year'));
                $data['header']=$this->input->post('year');

                $this->load->view('staff/includes/header');
                $this->load->view('staff/includes/topbar');
                $this->load->view('staff/includes/sidebar');
                $this->load->view('staff/reports-specific-year-view',$data);
                $this->load->view('staff/includes/footer');
            }

        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    

    /*STOCK ALERT NOTIFICATION*/
    public function stock_alert(){
        $this->load->model('Product_model');
        if ($this->session->userdata('staff_logged_in')) {

            $data['online']=$this->Product_model->get_all_products_and_its_online_stocks();
            $data['walkin']=$this->Product_model->get_all_products_and_its_walkin_stocks();

            $data['message_count']=0;
            foreach($data['online'] as $x){
                if($x->sizing=="Multi"){
                    if( $x->xs <= 5 ){ $data['message_count']++; }
                    if( $x->sm <= 5 ){ $data['message_count']++; }
                    if( $x->md <= 5 ){ $data['message_count']++; }
                    if( $x->lg <= 5 ){ $data['message_count']++; }
                    if( $x->xl <= 5 ){ $data['message_count']++; }
                    if( $x->xxl <= 5 ){ $data['message_count']++; }
                    if( $x->xxxl <= 5 ){ $data['message_count']++; }
                }
                elseif($x->sizing=="One"){
                    if( $x->one <= 5 ){ $data['message_count']++; }
                }
            }
            foreach($data['walkin'] as $x){
                if($x->sizing=="Multi"){
                    if( $x->xs <= 5 ){ $data['message_count']++; }
                    if( $x->sm <= 5 ){ $data['message_count']++; }
                    if( $x->md <= 5 ){ $data['message_count']++; }
                    if( $x->lg <= 5 ){ $data['message_count']++; }
                    if( $x->xl <= 5 ){ $data['message_count']++; }
                    if( $x->xxl <= 5 ){ $data['message_count']++; }
                    if( $x->xxxl <= 5 ){ $data['message_count']++; }
                }
                elseif($x->sizing=="One"){
                    if( $x->one <= 5 ){ $data['message_count']++; }
                }
            }

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/stock-alert-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }




    /* INVENTORY---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function inventory_in_online(){
        if ($this->session->userdata('staff_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_in_online();

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/inventory-in-online-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }

    public function inventory_out_online(){
        if ($this->session->userdata('staff_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_out_online();

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/inventory-out-online-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }

    public function inventory_in_walkin(){
        if ($this->session->userdata('staff_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_in_walkin();

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/inventory-in-walkin-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }

    public function inventory_out_walkin(){
        if ($this->session->userdata('staff_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_out_walkin();

            $this->load->view('staff/includes/header');
            $this->load->view('staff/includes/topbar');
            $this->load->view('staff/includes/sidebar');
            $this->load->view('staff/inventory-out-walkin-view',$data);
            $this->load->view('staff/includes/footer');
        } 
        else {
           redirect('Staff', 'refresh');
        }
    }
    
    /* LOGOUT---------------------------------------------------------------------------------------------------------------------------------------------------- */
    
    public function logout() {
        $this->session->unset_userdata('staff_logged_in');
        redirect('Staff', 'refresh');
    }

}

?>
