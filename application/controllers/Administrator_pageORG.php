<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_page extends CI_Controller {
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
        $this->load->model('Analytics_model');
        if ($this->session->userdata('admin_logged_in')) {
            $data['online']=$this->Product_model->get_all_products_and_its_online_stocks();
            $data['walkin']=$this->Product_model->get_all_products_and_its_walkin_stocks();
            $data['total_customers']=$this->Dashboard_model->total_customers();
            $data['active_products']=$this->Dashboard_model->total_active_products();
            $data['feedbacks']=$this->Dashboard_model->total_feedbacks();
            $data['new_orders']=$this->Dashboard_model->total_new_orders();
            $data['new_contest_designs']=$this->Dashboard_model->total_new_contest_designs();
            $data['page_visits']=$this->Analytics_model->page_visits();


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

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/dashboard-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    /* PRODUCTS---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function manage_product() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProducts();
            $data['product_type'] = $this->Product_model->getProductType();
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/product-view', $data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
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
            'color' => $this->input->post('color'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
            'price' => $this->input->post('price')
        );
        
        $this->form_validation->set_rules('product-name', 'Product name', 'required|min_length[4]|callback_alpha_spaces_prod_name'); //VALIDATION OKAY |is_unique[products.product_name]
        $this->form_validation->set_rules('type', 'Type', 'required|callback_alpha_spaces_prod_type'); //VALIDATION OKAY
        $this->form_validation->set_rules('color', 'Color', 'required|callback_alpha_spaces_prod_color'); //VALIDATION OKAY
        $this->form_validation->set_rules('description', 'Description', 'required|callback_alpha_spaces_prod_desc'); //VALIDATION OKAY
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural'); //VALIDATION OKAY

        if ($this->form_validation->run() == FALSE) {
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $this->Product_model->update_product($product, $this->input->post('product-id'));
            redirect('administrator_page/manage_product', 'refresh');
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
            //$this->load->view('administrator/admin_products_view', $error);
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $product = array(
                'upload_data' => $this->upload->data()
            );

            $this->Product_model->update_product_image($product, $this->input->post('product-id'));
            redirect('administrator_page/manage_product', 'refresh');
        }
    }
    public function delete_product() {
        $id = $this->uri->segment(3);
        
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);
        redirect('administrator_page/manage_product', 'refresh');
        
        
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
    public function alpha_spaces_prod_color($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_prod_color', 'The Product color field may only contain alphabetical,numberical and white-space characters.');
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
            redirect('administrator_page/manage_product', 'refresh');
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
        $this->form_validation->set_rules('color', 'Color', 'required|callback_alpha_spaces_prod_color'); //VALIDATION OKAY
        $this->form_validation->set_rules('description', 'Description', 'required|callback_alpha_spaces_prod_desc'); //VALIDATION OKAY
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural'); //VALIDATION OKAY

        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('userfile')) {
            //$this->load->view('administrator/admin_products_view', $error);
            $this->manage_product();
        } else {
            $this->load->model('Product_model');
            $product = array(
                'product_name' => $this->input->post('product-name'),
                'type' => $this->input->post('type'),
                'sizing' => $this->input->post('sizing'),
                'color' => $this->input->post('color'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status'),
                'price' => $this->input->post('price'),
                'upload_data' => $this->upload->data()
            );

            $this->Product_model->add_product($product);
            redirect('administrator_page/manage_product', 'refresh');
        }
    }
    
    /* Stocks online [OK]---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function stocks_online() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProductStocksOnline();
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/stocks-online-view',$data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
        }
    }
    
    public function stocks_walkin() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Product_model');
            $data['products'] = $this->Product_model->getProductStocksWalkin();
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/stocks-walkin-view',$data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
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
                redirect('Administrator_page/stocks_online', 'refresh');
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->add_stocks_online_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Administrator_page/stocks_online', 'refresh');
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
                redirect('Administrator_page/stocks_walkin', 'refresh');
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->add_stocks_walkin_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Administrator_page/stocks_walkin', 'refresh');
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
                    redirect('Administrator_page/stocks_walkin', 'refresh');
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
                    redirect('Administrator_page/stocks_walkin', 'refresh');
                }


                
            }
            else if ($this->input->post("prod_sizing")=="One") {
                $one_size_stocks = array(
                    'one' => $this->input->post('one-size')
                );

                $this->Product_model->decrease_stocks_walkin_onesize($one_size_stocks, $this->input->post('prod-id'));
                redirect('Administrator_page/stocks_walkin', 'refresh');
            }
        }
    }
    
    
    
    
    /* ADMIN SETTINGS [OK]---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function Administrator_settings() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];


            $this->load->model('Admin_model');
            $data['infos'] = $this->Admin_model->getAdminInfo();
            
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/admin-settings-view', $data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
        }
    }

    public function update_admin_info() {
        $admin_info = array(
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name')
        );


        $this->form_validation->set_rules('first-name', 'First name', 'required|min_length[3]|callback_alpha_spaces_fname');
        $this->form_validation->set_rules('middle-name', 'Middle name', 'required|min_length[3]|callback_alpha_spaces_mname');
        $this->form_validation->set_rules('last-name', 'Last name', 'required|min_length[2]|callback_alpha_spaces_lname');

        if ($this->form_validation->run() == FALSE) {
            $this->Administrator_settings();
        } else {
            $this->load->model('Admin_model');
            $this->Admin_model->update_admin_info($admin_info, $this->input->post('admin-id'));
            redirect('administrator_page/administrator_settings', 'refresh');
        }
    }

    public function update_admin_username() {
        $admin_username = array(
            'username' => $this->input->post('username')
        );

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|alpha_dash');

        if ($this->form_validation->run() == FALSE) {
            $this->Administrator_settings();
        } else {
            $this->load->model('Admin_model');
            $this->Admin_model->update_admin_username($admin_username, $this->input->post('admin-id'));
            redirect('administrator_page/administrator_settings', 'refresh');
        }
    }

    public function update_admin_password() {
        $admin_password = array(
            'password' => $this->input->post('password')
        );

        $this->form_validation->set_rules('oldpassword', 'Old Password', 'required|callback_oldpassword_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|alpha_numeric|matches[confirm-password]');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->Administrator_settings();
        } else {
            $this->load->model('Admin_model');
            $this->Admin_model->update_admin_password($admin_password, $this->input->post('admin-id'));
            redirect('administrator_page/administrator_settings', 'refresh');
        }
    }

    public function oldpassword_check($oldpassword) {
        $this->load->model('Admin_model');
        $result = $this->Admin_model->getAdminInfo();

        foreach ($result as $row) {
            if ($oldpassword == $row->password) {
                return TRUE;
            } else {
                $this->form_validation->set_message('oldpassword_check', 'Invalid Old password');
                return false;
            }
        }
    }

    /* Staff SETTINGS [OK]---------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function alpha_spaces_fname($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_fname', 'The First name field may only contain letters,dash,dots,spaces');
            return false;
        }
    }
    public function alpha_spaces_mname($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_mname', 'The Middle name field may only contain letters,dash,dots,spaces');
            return false;
        }
    }
    public function alpha_spaces_lname($str) {
        if (preg_match('/^[a-z0-9 .\-]+$/i', $str)) {
            return true;
        }
        else{
            $this->form_validation->set_message('alpha_spaces_lname', 'The Last name field may only contain letters,dash,dots,spaces');
            return false;
        }
    }
    
    public function staff_settings() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Staff_model');
            $data['staffs'] = $this->Staff_model->getStaffs();
            
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/staff-view', $data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
        }
    }

    public function ajax_view_staff_by_id($id) {
        $this->load->model('Staff_model');
        $data["result"] = $this->Staff_model->getStaffById($id);
        echo json_encode($data);
    }

    public function add_staff() {
        $staff = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name'),
            'status' => $this->input->post('status')
        );

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|alpha_numeric');
        $this->form_validation->set_rules('first-name', 'First name', 'required|min_length[3]|callback_alpha_spaces_fname');
        $this->form_validation->set_rules('last-name', 'Last name', 'required|min_length[2]|callback_alpha_spaces_mname');
        $this->form_validation->set_rules('middle-name', 'Middle name', 'required|min_length[2]|callback_alpha_spaces_lname');
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY


        if ($this->form_validation->run() == FALSE) {
            $this->staff_settings();
        } else {
            $this->load->model('Staff_model');
            $this->Staff_model->add_staff($staff);
            redirect('administrator_page/staff_settings', 'refresh');
        }
    }

    public function update_staff() {
        $staff = array(
            'first_name' => $this->input->post('first-name'),
            'middle_name' => $this->input->post('middle-name'),
            'last_name' => $this->input->post('last-name'),
            'status' => $this->input->post('status')
        );

        $this->form_validation->set_rules('first-name', 'First name', 'required|min_length[3]|callback_alpha_spaces_fname');
        $this->form_validation->set_rules('last-name', 'Last name', 'required|min_length[2]|callback_alpha_spaces_mname');
        $this->form_validation->set_rules('middle-name', 'Middle name', 'required|min_length[2]|callback_alpha_spaces_lname');
        $this->form_validation->set_rules('status', 'Status', 'required'); //VALIDATION OKAY


        if ($this->form_validation->run() == FALSE) {
            $this->staff_settings();
        } else {
            $this->load->model('Staff_model');
            $this->Staff_model->update_staff($staff, $this->input->post('staff-id'));
            redirect('administrator_page/staff_settings', 'refresh');
        }
    }

    public function update_staff_username() {
        $staff = array(
            'username' => $this->input->post('new-username')
        );
        $this->form_validation->set_rules('new-username', 'New Username', 'required|min_length[4]|is_unique[staff.username]');

        if ($this->form_validation->run() == FALSE) {
            $this->staff_settings();
        } else {
            $this->load->model('Staff_model');
            $this->Staff_model->update_staff($staff, $this->input->post('staff-id'));
            redirect('administrator_page/staff_settings', 'refresh');
        }
    }

    public function update_staff_password() {
        $staff_password = array(
            'password' => $this->input->post('password')
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|alpha_numeric|matches[confirm-password]');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->staff_settings();
        } else {
            $this->load->model('Staff_model');
            $this->Staff_model->update_staff_password($staff_password, $this->input->post('staff-id'));
            redirect('administrator_page/staff_settings', 'refresh');
        }
    }

    /* LOGOUT---------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function customer_settings() {
        if ($this->session->userdata('admin_logged_in')) {
            $session_data = $this->session->userdata('admin_logged_in');
            $data['username'] = $session_data['username'];

            $this->load->model('Customer_model');
            $data['customers'] = $this->Customer_model->getCustomers();
            
            
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/customer-view', $data);
            $this->load->view('administrator/includes/footer');
        } else {
            redirect('Administrator', 'refresh');
        }
    }
    
     public function deactivate_customer() {
         $customer = array(
            'status' => 0
        );
          $this->load->model('Customer_model');
          $this->Customer_model->update_customer_status($customer,$this->input->get("id"));
          redirect('Administrator_page/customer_settings', 'refresh');
     }
     
     public function activate_customer() {
         $customer = array(
            'status' => 1
        );
          $this->load->model('Customer_model');
          $this->Customer_model->update_customer_status($customer,$this->input->get("id"));
          redirect('Administrator_page/customer_settings', 'refresh');
     }

    /* ORDER VIEW---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function manage_orders() {
       if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getOrders();
           

           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-order-view',$data);
           $this->load->view('administrator/includes/footer');
       } else {
           redirect('Administrator', 'refresh');
       }
    }

    public function manage_pending_orders() {
       if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getPendingOrders();
           


           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-order-pending-view',$data);
           $this->load->view('administrator/includes/footer');
       } else {
           redirect('Administrator', 'refresh');
       }
    }

    public function manage_processing_orders() {
       if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getProcessingOrders();
           


           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-order-processing-view',$data);
           $this->load->view('administrator/includes/footer');
       } else {
           redirect('Administrator', 'refresh');
       }
    }

    public function manage_shipped_orders() {
       if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Order_model');
           $data['orders']=$this->Order_model->getShippedOrders();
           


           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-order-shipped-view',$data);
           $this->load->view('administrator/includes/footer');
       } else {
           redirect('Administrator', 'refresh');
       }
    }




    
    public function update_to_processing(){
        $status=array(
            'order_status' => 'Processing'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));
        $this->Order_model->notify_email_processing($this->input->get('id'));
        redirect('administrator_page/manage_processing_orders');
    }
    public function update_to_pending(){
        $status=array(
            'order_status' => 'Pending'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));
        redirect('administrator_page/manage_pending_orders');
    }
    public function update_to_shipped(){
        
        $status=array(
            'order_status' => 'Shipped'
        );
        $this->load->model('Order_model');
        $this->Order_model->update_order_status($status,$this->input->get('id'));


        $this->Order_model->notify_email_shipped($this->input->get('id'));
        
        
        redirect('administrator_page/manage_shipped_orders');
    }

    
    public function view_order(){
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Order_model');
           
           
           
           $data["order_details"] = $this->Order_model->getFullOrderDetails($this->input->get('invoice_id'));
           $data["orders"] = $this->Order_model->getOrderByInvoice($this->input->get('invoice_id'));


           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/view-order-view',$data);
           $this->load->view('administrator/includes/footer');
       } else {
           redirect('Administrator', 'refresh');
       }
    }
    
    /* Manage Shirt Contest---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function manage_design(){
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Contest_model');
           $this->load->model('Design_model');
           
           $data["results"] = $this->Design_model->getDesigns();
           
           $data["contest_status"] = $this->Contest_model->get_contest_status();
           $data["contest"] = $this->Contest_model->get_contest();
           
           
           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-design-view',$data);
           $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function manage_design_pending(){
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Contest_model');
           $this->load->model('Design_model');
           
           $data["results"] = $this->Design_model->getPendingDesigns();
           
           $data["contest_status"] = $this->Contest_model->get_contest_status();
           $data["contest"] = $this->Contest_model->get_contest();
           
           
           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-design-view',$data);
           $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function manage_design_approved(){
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Contest_model');
           $this->load->model('Design_model');
           
           $data["results"] = $this->Design_model->getApprovedDesigns();
           
           $data["contest_status"] = $this->Contest_model->get_contest_status();
           $data["contest"] = $this->Contest_model->get_contest();
           
           
           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-design-view',$data);
           $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }




    
    public function approve_design(){
        $this->load->model('Design_model');
        $this->load->model('Customer_model');
        
        $status=array(
            'design_status' => 'Approved'
        );
        
        $this->Design_model->update_design_status($status,$this->input->get('id'));
        
        $res=$this->Customer_model->getCustomersByDesign($this->input->get('id'));
        $customer_id=$res[0]['customer_id'];
        
        $res2=$this->Customer_model->getCustomersByIdArray($customer_id);
        $email=$res2[0]['email'];
        
        
        
        $this->load->library('email');
        
        $config=array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '30',
            'smtp_user' => 'nicolasiipro@gmail.com',
            'smtp_pass' => '#ASK ME FOR THIS: imnii@outlook.com#',
            'charset' => 'utf-8',
            'newline' =>"\r\n"
        );

        $this->email->initialize($config);
        
        $this->email->from('nicolasiipro@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
        $this->email->to($email);
        $this->email->subject('Shirt Design Entry (Approved)');
        $this->email->message('
            Congratulations! Your shirt design is qualified for the Contest. 
            Your design can be now be voted.

            From: Italiannis : Pasta, Pizza and Wings
            ');
        $this->email->send();
        
        redirect('Administrator_page/manage_design', 'refresh');
    }
    
    public function disapprove_design(){
        $this->load->model('Design_model');

        $this->Design_model->disapprove_design($this->input->get('id'));
        
        //DELETE DESIGN
        
        redirect('Administrator_page/manage_design', 'refresh');
    }
    
    public function pending_design(){
        $this->load->model('Design_model');
        $status=array(
            'design_status' => 'Pending'
        );
        
        $this->Design_model->update_design_status($status,$this->input->get('id'));
        redirect('Administrator_page/manage_design', 'refresh');
    }
    
    public function start_new_contest(){
        $this->load->model('Contest_model');

        $this->form_validation->set_rules('contest-name', 'Contest name', 'required|min_length[6]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->manage_design();
        }
        else{
            $contest=array(
            'name' => $this->input->post('contest-name'),
            'description' => $this->input->post('description'),
            'start_date' => $this->input->post('start-date'),
            'end_date' => $this->input->post('end-date')
            );
            $this->Contest_model->enable_contest($contest);

            redirect('Administrator_page/manage_design');
        }
    }
    
    public function end_contest(){
        $this->load->helper('file');
        $this->load->model('Contest_model');
        
        
        $this->Contest_model->end_contest();
        
        delete_files("uploads/designs/");
        redirect('Administrator_page/manage_design', 'refresh');
    }
    public function ajax_view_design_by_id($id){
        $this->load->model('Design_model');
        $data["result"] = $this->Design_model->getDesignsById($id);
        
        echo json_encode($data);
    }
    
    public function declare_winner(){
        $this->load->model('Contest_model');
        $this->load->model('Product_model');
        $this->load->model('Design_model');

        $source = "uploads/designs/".$this->input->post('image-path');
        $dest = "uploads/products/".$this->input->post('image-path');
        copy($source, $dest);
 
        $winner=array(
            'winner' => $this->input->post('design-id'),
            'winner_design_name' => $this->input->post('design-name'),
            'winner_customer_id' => $this->input->post('customer-id'),
            'winner_date_submitted' => $this->input->post('date-submitted'),
            'winner_votes' => $this->input->post('votes'),
            'winner_image' => $this->input->post('image-path'),
            'z' => 1
        );
        $this->Contest_model->declare_winner($winner,$this->input->post('contest-id'),$this->input->post('customer-id'));

        $product = array(
            'product_name' => $this->input->post('design-name')." (".$this->input->post('contest-name')." Winner)",
            'type' => "Shirt",
            'sizing' => "Multi",
            'color' => $this->input->post('color'),
            'description' => $this->input->post('description'),
            'status' => "Not Active",
            'price' => $this->input->post('price'),
            'image_path' => $this->input->post('image-path')
        );
        $this->Product_model->add_winner_to_product($product);

        $this->Design_model->empty_shirt_result();
        
        $shirt_result=array(
            'result' => "Winner"
        );
        $this->Design_model->update_shirt_result($shirt_result,$this->input->post('design-id'));

        redirect('Administrator_page/manage_design');

    }

    /*CONTEST HISTORY*/
    public function contest_history(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Contest_model');
            $data['results'] = $this->Contest_model->get_contest_winners();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/contest-history-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function ajax_get_contest_winner_by_id($id){
        $this->load->model('Contest_model');
        $data = $this->Contest_model->get_contest_winner_by_id($id);

        echo json_encode($data);
    }


/*CUSTOMIZATION LOGOS*/
    public function manage_customization_logo(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Contest_model');
            $data['logos']=$this->Contest_model->get_logos();


            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/manage-customization-logo-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    //Upload Image Module
    public function add_logo(){
        $image_name = random_string('alnum',20);

        $this->form_validation->set_rules('userfile', 'Image', 'callback_image_check2'); 

        $config['upload_path'] = 'uploads/customization_logos/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $image_name;
        $this->load->library('upload', $config);

        if($this->form_validation->run() == FALSE){
            $this->manage_customization_logo();
        }
        else {
            $this->image_resize_130x130();

            $this->load->model('Contest_model');

            $haha = $this->upload->data();

            $data=array(
                'logo' => $haha['file_name']
            );

            $this->Contest_model->add_logo($data);

            redirect('Administrator_page/manage_customization_logo','refresh');
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
        redirect('Administrator_page/manage_customization_logo','refresh');
    }

    /*MANAGE FEEDBACKS*/
    public function view_feedbacks(){
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->model('Feedback_model');
           
           $data["results"] = $this->Feedback_model->get_feedbacks();
           
           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/manage-feedback-view',$data);
           $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
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
        if ($this->session->userdata('admin_logged_in')) {
           $this->load->view('administrator/includes/header');
           $this->load->view('administrator/includes/topbar');
           $this->load->view('administrator/includes/sidebar');
           $this->load->view('administrator/reports-view');
           $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    
    public function reports_specific_date(){
        $this->load->model('Order_model');

        if ($this->session->userdata('admin_logged_in')) {
            
           $this->form_validation->set_rules('input-date', 'Date', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->reports();
            }
            else{
                $sdate = date('Y-m-d',strtotime($this->input->post('input-date')));
                $data['results']=$this->Order_model->getReportsCurrentDay($sdate);
                $data['header']=date("F j, Y",strtotime($this->input->post('input-date')));

                $this->load->view('administrator/includes/header');
                $this->load->view('administrator/includes/topbar');
                $this->load->view('administrator/includes/sidebar');
                $this->load->view('administrator/reports-specific-date-view',$data);
                $this->load->view('administrator/includes/footer');
            }
            
           
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    
    public function reports_specific_m_y(){
        $this->load->model('Order_model');

        if ($this->session->userdata('admin_logged_in')) {
            
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
                
                $this->load->view('administrator/includes/header');
                $this->load->view('administrator/includes/topbar');
                $this->load->view('administrator/includes/sidebar');
                $this->load->view('administrator/reports-specific-m-y-view',$data);
                $this->load->view('administrator/includes/footer');
            }
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    
    public function reports_specific_year(){
        $this->load->model('Order_model');

        if ($this->session->userdata('admin_logged_in')) {
            
            $this->form_validation->set_rules('year', 'Year', 'required|is_natural');

            if ($this->form_validation->run() == FALSE) {
                $this->reports();
            } 
            else{
                $data['results']=$this->Order_model->getReportsYear($this->input->post('year'));
                $data['header']=$this->input->post('year');

                $this->load->view('administrator/includes/header');
                $this->load->view('administrator/includes/topbar');
                $this->load->view('administrator/includes/sidebar');
                $this->load->view('administrator/reports-specific-year-view',$data);
                $this->load->view('administrator/includes/footer');
            }

        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    
    /* CMS---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function cms(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Footer_model');
            $this->load->model('Cms_model');

            $data['footer']=$this->Footer_model->get_footer_info();
            $data['cms']=$this->Cms_model->get_cms();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/cms-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function update_social(){
        $this->load->model('Footer_model');

        $this->form_validation->set_rules('fb', 'Facebook Link', 'required'); 
        $this->form_validation->set_rules('tw', 'Twitter Link', 'required'); 
        $this->form_validation->set_rules('in', 'Instagram Link', 'required');


        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else{
            $social=array(
                'facebook' => $this->input->post('fb'),
                'twitter' => $this->input->post('tw'),
                'instagram' => $this->input->post('in'),
            );

            $this->Footer_model->update_social($social);
            redirect('Administrator_page/cms', 'refresh');
        }
    }

    public function update_contact(){
        $this->load->model('Footer_model');

        $this->form_validation->set_rules('address', 'Address', 'required'); 
        $this->form_validation->set_rules('address-link', 'Address Map Link', 'required'); 
        $this->form_validation->set_rules('days-open', 'Days Open', 'required'); 
        $this->form_validation->set_rules('store-hours', 'Store Hours', 'required'); 
        $this->form_validation->set_rules('number', 'Contact number', 'required'); 


        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else{
            $contact=array(
                'address' => $this->input->post('address'),
                'address_map_link' => $this->input->post('address-link'),
                'days_open' => $this->input->post('days-open'),
                'store_hours' => $this->input->post('store-hours'),
                'contact_number' => $this->input->post('number')
            );

            $this->Footer_model->update_contact($contact);
            redirect('Administrator_page/cms', 'refresh');
        }
    }
        
        

    public function image_check($str){
        if (!$this->upload->do_upload('userfile')){
            $this->form_validation->set_message('image_check', $this->upload->display_errors());
            return false;
        } 
    }

    public function update_shop_page_header() {
        $this->form_validation->set_rules('userfile', 'Image', 'callback_image_check'); 
        
        $config['upload_path'] = 'assets/images/';    //folder na pagssave ng pic
        $config['allowed_types'] = 'jpg|png|jpeg';            //types na pede
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;                   //pag naka FALSE pag my duplicate na filename magkakarun lang ng (1)

        $this->load->library('upload', $config);
        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else {

            $this->load->model('Cms_model');
            
            $data = array(
                'shop_banner' => $this->upload->data()
            );

            $this->Cms_model->update_shop_page_header($data);
            redirect('Administrator_page/cms', 'refresh');
        }
    }

    public function update_home_page_header() {
        $this->form_validation->set_rules('userfile', 'Image', 'callback_image_check'); 
        
        $config['upload_path'] = 'assets/images/';    //folder na pagssave ng pic
        $config['allowed_types'] = 'jpg|png|jpeg';            //types na pede
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;                   //pag naka FALSE pag my duplicate na filename magkakarun lang ng (1)

        $this->load->library('upload', $config);
        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else {

            $this->load->model('Cms_model');
            
            $data = array(
                'home_header_bg' => $this->upload->data()
            );

            $this->Cms_model->update_home_page_header($data);
            redirect('Administrator_page/cms', 'refresh');
        }
    }

    public function update_about_us_bg(){
        $this->form_validation->set_rules('userfile', 'Image', 'callback_image_check'); 
        
        $config['upload_path'] = 'assets/images/';    //folder na pagssave ng pic
        $config['allowed_types'] = 'jpg|png|jpeg';            //types na pede
        $config['max_size'] = '2048000';
        $config['overwrite'] = TRUE;                   //pag naka FALSE pag my duplicate na filename magkakarun lang ng (1)

        $this->load->library('upload', $config);
        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else {

            $this->load->model('Cms_model');
            
            $data = array(
                'home_about_bg' => $this->upload->data()
            );

            $this->Cms_model->update_about_us_bg($data);
            redirect('Administrator_page/cms', 'refresh');
        }
    }
    public function update_about_us_desc(){
        $this->load->model('Cms_model');

        $this->form_validation->set_rules('desc', 'About us Description', 'required'); 
        if($this->form_validation->run() == FALSE){
            $this->cms();
        }
        else{
            $data=array(
                'home_about_desc' => $this->input->post('desc')
            );

            $this->Cms_model->update_about_us_desc($data);
            redirect('Administrator_page/cms', 'refresh');
        }
        
    }


    /*STOCK ALERT NOTIFICATION*/
    public function stock_alert(){
        $this->load->model('Product_model');
        if ($this->session->userdata('admin_logged_in')) {

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

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/stock-alert-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }




    /* INVENTORY---------------------------------------------------------------------------------------------------------------------------------------------------- */
    public function inventory_in_online(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_in_online();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/inventory-in-online-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function inventory_out_online(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_out_online();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/inventory-out-online-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function inventory_in_walkin(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_in_walkin();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/inventory-in-walkin-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }

    public function inventory_out_walkin(){
        if ($this->session->userdata('admin_logged_in')) {

            $this->load->model('Inventory_model');
            $data['result']=$this->Inventory_model->get_inventory_out_walkin();

            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/inventory-out-walkin-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    
    /* LOGOUT---------------------------------------------------------------------------------------------------------------------------------------------------- */
    
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('Administrator', 'refresh');
    }
    
    /* GCM---------------------------------------------------------------------------------------------------------------------------------------------------- */

    public function gcm(){
        $this->load->model('Push_model');
        $data['messages']=$this->Push_model->get_messages();

        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('administrator/includes/header');
            $this->load->view('administrator/includes/topbar');
            $this->load->view('administrator/includes/sidebar');
            $this->load->view('administrator/gcm-view',$data);
            $this->load->view('administrator/includes/footer');
        } 
        else {
           redirect('Administrator', 'refresh');
        }
    }
    public function push(){
        $this->load->model('Push_model');


	$this->form_validation->set_rules('message', 'Message', 'required|min_length[4]');

	if ($this->form_validation->run() == FALSE) {
		$this->gcm();
	}
	else{
		$message=array(
			'message' => strip_tags($this->input->post('message')),
			'date_submitted' => date("Y-m-d H:i:s")
		);

		$this->Push_model->push_new($message);

		// Push The notification with parameters
		require_once('PushBots.class.php');

		$pb = new PushBots();

		// Application ID
		$appID = '579f1bf04a9efa42ee8b4567';

		// Application Secret
		$appSecret = '8a5b24f797109d0ee910ed600eb5a12a';

		$pb->App($appID, $appSecret);

		// Notification Settings
		$pb->Alert("From Limitado: ".strip_tags($this->input->post('message')));
		$pb->Platform(array("0","1"));
		$pb->Badge("+2");


		// Push it !
		$pb->Push();

echo '<script>location.href = "http://italiannis.com/Administrator_page/gcm";</script>';

	}
    }

}

?>
