<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function create_order($order){
        $this->db->insert('orders', $order);
    }
    public function create_order_details($order_details){
        $this->db->insert('order_details', $order_details);
    }
    public function getOrders() {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('customer', 'customer.customer_id=orders.customer_id');
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getPendingOrders() {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('customer', 'customer.customer_id=orders.customer_id');
        $this->db->where('order_status', 'Pending');
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getProcessingOrders() {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('customer', 'customer.customer_id=orders.customer_id');
        $this->db->where('order_status', 'Processing');
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getShippedOrders() {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('customer', 'customer.customer_id=orders.customer_id');
        $this->db->where('order_status', 'Delivered');
        $x= $this->db->get(); 
        return $x->result();
    }



    public function update_order_status($status,$id) {
        $this->db->update('orders', $status, array('invoice_id' => $id));
    }
    
    public function getFullOrderDetails($id){
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('invoice_id', $id);
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getOrderByInvoice($id){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('customer', 'customer.customer_id=orders.customer_id');
        $this->db->where('invoice_id', $id);
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getOrderDetailsByInvoice($id){
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('invoice_id', $id);
        $x= $this->db->get(); 
        return $x->result();
    }
    public function getOrderByUser($id){
        $x = $this->db->get_where('orders', array('customer_id' => $id));
        return $x->result();
    }
    
    public function notify_email($email,$invoice){
        $x = $this->db->get_where('orders', array('invoice_id' => $invoice));
        $res = $x->result_array();

        $z=$this->db->get_where('customer', array('email' => $email));
        $res2 = $z->result_array();
        
        $customer_fname=$res2[0]['first_name'];
        $customer_lname=$res2[0]['last_name'];
        
        $order_id=$res[0]['order_id'];
        $transaction_id=$res[0]['transaction_id'];
        $invoice_id=$res[0]['invoice_id'];
        $payment_type=$res[0]['payment_type'];
        $order_status=$res[0]['order_status'];
        $payment_status=$res[0]['payment_status'];
        $shipping_address=$res[0]['shipping_address'];
        $date_ordered=$res[0]['date_ordered'];
        
        
        $this->load->library('email');
        
        $config=array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '120',
            'smtp_user' => 'janvincent689@gmail.com',
            'smtp_pass' => '',
            'charset' => 'utf-8',
            'newline' =>"\r\n"
        );

        $this->email->initialize($config);
        
        $this->email->from('janvincent689@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
        $this->email->to($email);
        $this->email->subject('Italiannis : Order Notification');
        $this->email->message('
            
        Hi '.$customer_fname.' '.$customer_lname.', Your order is now in our Database.
           
        ORDER ID: '.$order_id.'
        TRANSACTION ID: '.$transaction_id.'
        INVOICE ID: '.$invoice_id.'
        PAYMENT TYPE: '.$payment_type.'
        ORDER STATUS: '.$order_status.'
        PAYMENT STATUS: '.$payment_status.'
        DATE ORDERED: '.$date_ordered.'
        SHIPPING ADDRESS: 
        '.$shipping_address.'
            
        Go to > Accounts > Order History to see your Order Summary.

        We will send you an email if your Order is ready for processing.
        Thankyou.

        From: Italiannis : Pasta, Pizza and Wings
            
            
        ');
        $this->email->send();
    }
    
    public function notify_email_shipped($invoice){
        $x = $this->db->get_where('orders', array('invoice_id' => $invoice));
        $res = $x->result_array();
        $customer_id=$res[0]['customer_id'];
        
        $y = $this->db->get_where('customer', array('Customer_id' => $customer_id));
        $res2= $y->result_array();
        
        
        $customer_fname=$res2[0]['first_name'];
        $customer_lname=$res2[0]['last_name'];
        $email=$res2[0]['email'];
        
        $order_id=$res[0]['order_id'];
        $transaction_id=$res[0]['transaction_id'];
        $invoice_id=$res[0]['invoice_id'];
        $payment_type=$res[0]['payment_type'];
        $order_status=$res[0]['order_status'];
        $payment_status=$res[0]['payment_status'];
        $date_ordered=$res[0]['date_ordered'];
        $shipping_address=$res[0]['shipping_address'];
        
        $this->load->library('email');
        
        $config=array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '120',
            'smtp_user' => 'janvincent689@gmail.com',
            'smtp_pass' => '',
            'charset' => 'utf-8',
            'newline' =>"\r\n"
        );

        $this->email->initialize($config);
        
        $this->email->from('janvincent689@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
        $this->email->to($email);
        $this->email->subject('Italiannis : Order Notification (Shipped)');
        $this->email->message('
            
        Hi '.$customer_fname.' '.$customer_lname.', Your Order is now Shipped.
            
        
        ORDER ID: '.$order_id.'
        TRANSACTION ID: '.$transaction_id.'
        INVOICE ID: '.$invoice_id.'
        PAYMENT TYPE: '.$payment_type.'
        ORDER STATUS: '.$order_status.'
        PAYMENT STATUS: '.$payment_status.'
        DATE ORDERED: '.$date_ordered.'
        SHIPPING ADDRESS: 
        '.$shipping_address.'
            
        Go to > Accounts > Order History to see your Order Summary.

        From: Italiannis : Pasta, Pizza and Wings
            
            
        ');
        $this->email->send();
    }
    
    public function notify_email_processing($invoice){
        $x = $this->db->get_where('orders', array('invoice_id' => $invoice));
        $res = $x->result_array();
        $customer_id=$res[0]['customer_id'];
        
        $y = $this->db->get_where('customer', array('Customer_id' => $customer_id));
        $res2= $y->result_array();
        
        
        $customer_fname=$res2[0]['first_name'];
        $customer_lname=$res2[0]['last_name'];
        $email=$res2[0]['email'];
        
        $order_id=$res[0]['order_id'];
        $transaction_id=$res[0]['transaction_id'];
        $invoice_id=$res[0]['invoice_id'];
        $payment_type=$res[0]['payment_type'];
        $order_status=$res[0]['order_status'];
        $payment_status=$res[0]['payment_status'];
        $date_ordered=$res[0]['date_ordered'];
        $shipping_address=$res[0]['shipping_address'];
        
        $this->load->library('email');
        
        $config=array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '120',
            'smtp_user' => 'janvincent689@gmail.com',
            'smtp_pass' => '',
            'charset' => 'utf-8',
            'newline' =>"\r\n"
        );

        $this->email->initialize($config);
        
        $this->email->from('janvincent689@gmail.com', 'Italiannis : Pasta, Pizza and Wings');
        $this->email->to($email);
        $this->email->subject('Italiannis : Order Notification (Processing)');
        $this->email->message('
            
        Hi '.$customer_fname.' '.$customer_lname.', Your Order is now Processing.
            
        
        ORDER ID: '.$order_id.'
        TRANSACTION ID: '.$transaction_id.'
        INVOICE ID: '.$invoice_id.'
        PAYMENT TYPE: '.$payment_type.'
        ORDER STATUS: '.$order_status.'
        PAYMENT STATUS: '.$payment_status.'
        DATE ORDERED: '.$date_ordered.'
        SHIPPING ADDRESS: 
        '.$shipping_address.'
            
        Go to > Accounts > Order History to see your Order Summary.
        
        We will send you an email if your Order is ready for shipping.
        Thankyou.

        From: Italiannis : Pasta, Pizza and Wings
            
            
        ');
        $this->email->send();
    }
    
    public function check_invoice($invoice){
        $x=$this->db->get_where('orders', array('invoice_id' => $invoice)); 
        if ($x->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function check_invoice2($invoice){
        $x=$this->db->get_where('orders', array('invoice_id' => $invoice)); 
        if ($x->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function reserve_order($cart,$id){
        $data=array(
            'customer_id'=>$id,
            'reservation_order'=>$cart,
            'date_reserved'=> date("Y-m-d H:i:s")
        );
        
        $this->db->insert('reserved_orders',$data);
        
        
        
    }
    
    public function display_reserved_orders($id){
        $x = $this->db->get_where('reserved_orders', array('customer_id' => $id));
        return $x->result();
    }
    
    public function retrieve_order($id){
        $x = $this->db->get_where('reserved_orders', array('reservation_id' => $id));
        return $x->result_array();
    }
    public function delete_reservation($id){
        $this->db->delete('reserved_orders',array('reservation_id'=>$id));
    }
    
    
    
    
    public function getReportsCurrentDay($sdate){

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_details', 'order_details.invoice_id=orders.invoice_id');
        

        $this->db->like('orders.date_ordered',$sdate);
        $this->db->like('orders.date_ordered',$sdate);
        $x= $this->db->get(); 

        return $x->result();
    }
    
    public function getReportsMonth($month,$year){

        
        
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_details', 'order_details.invoice_id=orders.invoice_id');
        

        $this->db->where('MONTH(orders.date_ordered)',$month);
        
        $this->db->where('YEAR(orders.date_ordered)',$year);
       
  
        $x= $this->db->get(); 

        return $x->result();
        
        
    }
    
    public function getReportsYear($year){

        
        
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('order_details', 'order_details.invoice_id=orders.invoice_id');
        
        
        $this->db->where('YEAR(orders.date_ordered)',$year);
       
  
        $x= $this->db->get(); 

        return $x->result();
        
        
    }
}

