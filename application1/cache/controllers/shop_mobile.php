	<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class shop_mobile extends CI_Controller {
    public function index() {

       
       
        
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getProductsForShop($this->input->get('x'));
        $z["product_type"] = $this->Product_model->getProductType();
        
        $this->load->model('Cms_model');
        $z["cms"] = $this->Cms_model->get_cms();

        $this->load->model('Footer_model');
        $footer["footer"] = $this->Footer_model->get_footer_info();

        if($this->session->userdata('customer_logged_in')){
            
            $this->load->model('Customer_model');
            $user_sess=$this->session->userdata('customer_logged_in');
            $data['addresses'] = $this->Customer_model->getAddressById($user_sess["id"]);

            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-mobile');
            $this->load->view('customer/includes/sidebar',$stat);
            //--------------------------------------------------
            $this->load->view('customer/includes/banner-menu',$z);
            $this->load->view('customer/shop-view-mobile',$data);
            //--------------------------------------------------
            // $this->load->view('customer/includes/footer',$footer);
            $this->load->view('customer/includes/modal-quick-view');
            $this->load->view('customer/includes/modal-shipping-address');
        }

        else{
            $this->load->view('customer/includes/header');
            $this->load->view('customer/includes/navbar-nl-mobile');
            $this->load->view('customer/includes/sidebar',$stat);
            //--------------------------------------------------
            $this->load->view('customer/includes/banner-menu',$z);
            $this->load->view('customer/shop-view-mobile',$data);
            //--------------------------------------------------
            $this->load->view('customer/includes/footer',$footer);
            $this->load->view('customer/includes/modal-quick-view');
        }
    }
    
    public function positive_int($str) {
        if (preg_match('/^[1-9]+[0-9]*$/', $str)) {
            return true;
        } else {
            $this->form_validation->set_message('positive_int', 'Quantity must be greater than 0.');
            return false;
        }
    }
    
    public function quantity_more_than_stocks($str) {
        
        if($this->input->post('quantity') <= $str){
            return true;
        }
        else{
            $this->form_validation->set_message('quantity_more_than_stocks', 'Insufficient Stocks.');
            return false;
        }
           
    }
    
    public function add_to_cart() {
        $this->load->library('cart');
        $this->load->model('Product_model');
        $this->load->model('Inventory_model');

        $id = $this->uri->segment(3);
        $data['itm'] = $this->Product_model->getProductsById($id);
        $item = $data['itm'];
        
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('hd-stocks', 'Quantity', 'callback_quantity_more_than_stocks');
        $this->form_validation->set_rules('quantity', 'Size', 'callback_positive_int');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $this->cart->product_name_rules = '[:print:]';
            
            $data['order'] = array(
                'id' => $item[0]->product_id,
                'qty'     => $this->input->post('quantity'),
                'price' => $item[0]->price,
                'name'    => $item[0]->product_name,
                'options' => array('Size' => $this->input->post('size'))
            );
            
            //STOCKS ONLINE
            $this->load->model('Product_model');
            $data['stocks']=$this->Product_model->getStocksOnlineById($id);
            $curr_stock = $data['stocks'][0][$this->input->post('size')];
            
            //Inventory Out Online
            $data['istocks']=$this->Inventory_model->getInventoryOutOnlineById($id);
            $curr_stock2 = $data['istocks'][0][$this->input->post('size')];


            
            if($curr_stock<$this->input->post('quantity')||$this->input->post('quantity')==0){
                $this->index();
            }
            else{
                $this->Product_model->subtractStocks($data['order'],$curr_stock);
                $this->Inventory_model->addInventoryOutOnline($data['order'],$curr_stock2);
                
                $this->cart->insert($data['order']);
                redirect('shop_mobile','refresh');
            }
            
        }
        
    }


    
    public function update_cart() {
        foreach($_POST as $key => $hehe) {
           $this->form_validation->set_rules($key.'[qty]', 'Quantity', 'required|callback_positive_int');
        }

        if ($this->form_validation->run() == FALSE) {
           $this->index();
        }
        else{
            $this->load->model('Product_model');




            $cart_ni_belo=$this->cart->contents();    
            $key=1;
            foreach($cart_ni_belo as $cart){

                $stocks_array=$this->Product_model->getStocksOnlineBySize($cart['id'],$cart['options']['Size']);
                $current_stocks=$stocks_array[0][$cart['options']['Size']];

                $qty_input=$this->input->post($key.'[qty]');
                $prod_size = $this->input->post($key.'[size]');
                $prod_id = $this->input->post($key.'[id]');

		if($qty_input>($current_stocks+$cart['qty'])){
                    redirect('shop_mobile','refresh');
                }
                if($qty_input<$cart['qty']){
                    $res=$cart['qty']-$qty_input;
                    $updated_stock=$res+$current_stocks;

                    $this->Product_model->update_stocks($updated_stock, $prod_id, $prod_size);

                }
                
                elseif($qty_input==$cart['qty']){
                    redirect('shop_mobile','refresh');
                }
                elseif($qty_input>$cart['qty']){
                    $res=$qty_input-$cart['qty'];
                    $updated_stock=$current_stocks-$res;

                    $this->Product_model->update_stocks($updated_stock, $prod_id, $prod_size);
                }

                $key++;
            }


            $this->cart->update($_POST);
            redirect('shop_mobile','refresh');
        }

        
    }

    
    

    public function remove_to_cart() {
        
        $cart=$this->cart->contents();
        if(empty($cart)){
            redirect('shop_mobile','refresh');
        }
        else{
            $row_id = $this->uri->segment(3);
        
        
            //STOCKS ONLINE
            $this->load->model('Product_model');
            $this->Product_model->return_stocks($cart,$row_id);


            //Inventory Out Online
            $this->load->model('Inventory_model');
            $this->Inventory_model->return_inventory($cart,$row_id);


            $data = array(
                'rowid' => $row_id,
                'qty' => 0,
            );

            $this->cart->update($data);

            redirect('shop_mobile','refresh');
        }
            
            
        
    }

    public function destroy_cart() {

        $this->load->model('Product_model');
        $this->load->model('Inventory_model');
        
        
        $carts=$this->cart->contents();
        foreach($carts as $cart){
            
            $prod_id=$cart['id'];
            $size=$cart['options']['Size'];
            $qty=$cart['qty'];
            
            $this->Product_model->return_all_stocks($prod_id,$size,$qty);

            $this->Inventory_model->return_all_inventory_out_online($prod_id,$size,$qty);
        }
        
        $this->cart->destroy();
        redirect('shop_mobile','refresh');
    }

    public function logout() {
        $this->load->model('Product_model');
        $this->load->model('Inventory_model');

        $carts=$this->cart->contents();
        foreach($carts as $cart){
            
            $prod_id=$cart['id'];
            $size=$cart['options']['Size'];
            $qty=$cart['qty'];
            
            $this->Product_model->return_all_stocks($prod_id,$size,$qty);

            $this->Inventory_model->return_all_inventory_out_online($prod_id,$size,$qty);
            
        }
        
        $this->cart->destroy();
        $this->session->unset_userdata('customer_logged_in');
        redirect('shop_mobile');
    }
    
    public function test() {
        $haha = "asdasdasdasd";
        $id=$this->input->get("id");
        $size=$this->input->get("size");
        
        $this->load->model("Product_model");
        $data['result']=$this->Product_model->check_stocks_by_size($id,$size);
        $data['result2']=$this->Product_model->check_stocks_by_size_walkin($id,$size);

        echo json_encode($data);
    }
    
    public function place_order(){
        $this->load->model('Order_model');

        
        
        
        

        
        
        
        $carts=$this->cart->contents();
        
        
        if(empty($carts)){
            redirect('shop_mobile','refresh');
        }
        else if(is_null($this->input->post('shipping-address'))){
           
            redirect('shop_mobile','refresh');
        }
        else{
	        $config['business'] = 'italiannis@gmail.com';
	        $config['no_shipping'] = 1;
	        $config["shipping"] = 500;
		$config['cpp_header_image'] = '';
		$config['cancel_return'] = base_url().'shop_mobile';
		$config['notify_url'] = base_url().'shop_mobile/after_payment';
		$config['production'] = false;
		$config["invoice"] = rand(100000, 999999);
	        
	        $config["custom"] = $this->input->post('shipping-address');
	        $this->load->library('paypal', $config);



            /*foreach($carts as $cart){

                $this->paypal->add($cart['name'],$cart['price'],$cart['qty'],$cart['options']['Size']);
            }
            if($this->input->post('state')=="Metro Manila"){
            	$this->paypal->add("Shipping fee (with in Metro Manila)",160,1);
            }else{
            	$this->paypal->add("Shipping fee (Outside Metro Manila)",170,1);
            }
            
            $this->paypal->pay();*/
			
			            foreach($carts as $cart){

                $this->input->post($cart['name'],$cart['price'],$cart['qty'],$cart['options']['Size']);
            }
           
            
            $this->after_payment();
        }
        
        

    }
    
    public function after_payment(){
    
    	if(!$_POST){
    		redirect('shop_mobile','refresh');
    	}
    	else{
    		$this->load->model('Product_model');
	        $this->load->model('Order_model');
	        $user_sess=$this->session->userdata('customer_logged_in');
	        $carts=$this->cart->contents();
	        
	       // $invoice_check=$this->Order_model->check_invoice($this->input->post('invoice'));
	        
	        if($invoice_check==false){
	            $order=array(
	               /* 'invoice_id' => $this->input->post('invoice'),
	               'transaction_id' => $this->input->post('txn_id'),
	                'customer_id' => $user_sess['id'],
	                'payment_type' => 'PayPal',
	                'order_status' => 'Pending',
	                'payment_status' => $this->input->post('payment_status'),
	                'shipping_address' => $this->input->post('custom'),
	                'date_ordered' => date("Y-m-d H:i:s")*/
					
					 'invoice_id' => $user_sess['id'],
	               //'transaction_id' => $this->input->post('txn_id'),
	                'customer_id' => $user_sess['id'],
	                'payment_type' => 'Cash',
	                'order_status' => 'Pending',
	               // 'payment_status' => $this->input->post('payment_status'),
	              //  'shipping_address' => $this->input->post('custom'),
	                'date_ordered' => date("Y-m-d H:i:s")
	            );
	            $this->Order_model->create_order($order);
	        
	            foreach($carts as $cart){
	                $order_details=array(
	                    'invoice_id' => $user_sess['id'],
	                    'product_id' => $cart['id'],
	                    'name' => $cart['name'],
	                    'price' => $cart['price'],
	                    'quantity' => $cart['qty'],
	                    'size' => $cart['options']['Size'],
	                    'subtotal' => $cart['subtotal']
	                );
	
	                $this->Order_model->create_order_details($order_details);
	            }
	            $session_user=$this->session->userdata('customer_logged_in');
	            $this->cart->destroy();
	            //$this->Order_model->notify_email($session_user['email'],$this->input->post('invoice'));
	            redirect('shop_mobile/destroy_cart','refresh');
	        }
	        else{
	            redirect('shop_mobile','refresh');
	        }
    	}
        
        
    }

    public function ajax_view_order_by_id($id){
        $this->load->model('Order_model');
        $data['order']=$this->Order_model->getOrderByInvoice($id);
        $data['order_details']=$this->Order_model->getOrderDetailsByInvoice($id);
        echo json_encode($data);
    }
    
}