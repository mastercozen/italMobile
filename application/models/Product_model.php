<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_all_products_and_its_online_stocks(){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_online', 'products.product_id = stocks_online.product_id');
        $this->db->where('products.status', 'Active');
        $x = $this->db->get(); 
        return $x->result(); 
    }

    public function get_all_products_and_its_walkin_stocks(){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_walkin', 'products.product_id = stocks_walkin.product_id');
        $this->db->where('products.status', 'Active');
        $x = $this->db->get(); 
        return $x->result(); 
    }


    public function getProducts() {
        $x = $this->db->get('products');
        return $x->result();
    }

    public function getProductType() {
        $x = $this->db->get('product_type');
        return $x->result();
    }

    public function getProductsForShop($type) {

        if (!isset($type)){
            $x = $this->db->get_where('products', array('status' => 'Active'));
            return $x->result();
        }
        else{
            $x = $this->db->get_where('products', array('status' => 'Active','type' => $type));
            return $x->result();
        }
        
    }


    public function add_winner_to_product($product) {
        $this->db->insert('products', $product);

        $last_generated_id = $this->db->insert_id() ;
        
        $stocks = array(
            'product_id' => $last_generated_id
        );
        
        $this->db->insert('stocks_online', $stocks);
        $this->db->insert('stocks_walkin', $stocks);
        $this->db->insert('inventory_in_online', $stocks);
        $this->db->insert('inventory_out_online', $stocks);
        $this->db->insert('inventory_in_walkin', $stocks);
        $this->db->insert('inventory_out_walkin', $stocks);
    }

    public function add_product($product) {
        $product = array(
            'product_name' => $product['product_name'],
            'type' => $product['type'],
            'sizing' => $product['sizing'],
            'main_ing' => $product['main_ing'],
            'description' => $product['description'],
            'status' => $product['status'],
            'price' => $product['price'],
            'image_path' => $this->upload->data('file_name')
        );
        
        $this->db->insert('products', $product);
        
        
        $last_generated_id = $this->db->insert_id() ;
        
        $stocks = array(
            'product_id' => $last_generated_id
        );

        
        $this->db->insert('stocks_online', $stocks);
        $this->db->insert('stocks_walkin', $stocks);
        
        $this->db->insert('inventory_in_online', $stocks);
        $this->db->insert('inventory_out_online', $stocks);
        $this->db->insert('inventory_in_walkin', $stocks);
        $this->db->insert('inventory_out_walkin', $stocks);
        
    }
    public function check_product_type($type) {
        $x = $this->db->get_where('products', array('type' => $type ));

        if ($x->num_rows() > 0){
            return 1;

        }
        else{
            $this->db->delete('product_type',array('type'=>$type));
            return 0;
        }
    }

    public function add_product_type($product_type) {
        $this->db->insert('product_type', $product_type);
    }

    public function update_product($product, $id) {
        $this->db->update('products', $product, array('product_id' => $id));
    }

    public function update_product_image($product, $id) {
        $product = array(
            'image_path' => $this->upload->data('file_name')
        );
        $this->db->update('products', $product, array('product_id' => $id));
    }

    public function delete_product($id){
        $this->db->delete('products',array('product_id'=>$id));

        $this->db->delete('stocks_online',array('product_id'=>$id));
        $this->db->delete('stocks_walkin',array('product_id'=>$id));

        $this->db->delete('inventory_in_online',array('product_id'=>$id));
        $this->db->delete('inventory_out_online',array('product_id'=>$id));
        $this->db->delete('inventory_in_walkin',array('product_id'=>$id));
        $this->db->delete('inventory_out_walkin',array('product_id'=>$id));
    }
    
    public function getProductsById($id) {
        $x = $this->db->get_where('products', array('product_id' => $id));
        return $x->result();
    }

    public function getProductStocksOnline() {
     
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_online', 'products.product_id = stocks_online.product_id');
        $x = $this->db->get(); 
        return $x->result(); 
    }
    
    public function getProductStocksWalkin() {
     
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_walkin', 'products.product_id = stocks_walkin.product_id');
        $x = $this->db->get(); 
        return $x->result(); 
    }
    
    public function getStocksOnlineById($id) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_online', 'products.product_id = stocks_online.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result_array();
    }

     public function getStocksOnlineForecastedById($id) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_online_forecasted', 'products.product_id = stocks_online.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result_array();
    }
    
    public function getStocksWalkinById($id) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('stocks_walkin', 'products.product_id = stocks_walkin.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result_array();
    }
    
    public function getStocksOnlineBySize($id,$size) {
        $this->db->select($size);
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        return $x->result_array();
    }
    
    public function add_stocks_online_multisize($stocks, $id){
        $this->db->select('*');
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();

        $stocks = array(
                'xs' => $this->input->post('xs')+$current_stock[0]['xs'],
                'sm' => $this->input->post('sm')+$current_stock[0]['sm'],
                'md' => $this->input->post('md')+$current_stock[0]['md'],
                'lg' => $this->input->post('lg')+$current_stock[0]['lg'],
                'xl' => $this->input->post('xl')+$current_stock[0]['xl'],
                'xxl' => $this->input->post('xxl')+$current_stock[0]['xxl'],
                'xxxl' => $this->input->post('xxxl')+$current_stock[0]['xxxl']
        );
        
        $this->db->update('stocks_online', $stocks, array('product_id' => $id));  





        //FOR INVENTORY ONLINE IN multisize
        $this->db->select('*');
        $this->db->from('inventory_in_online');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_online_inventory_stock=$x->result_array();

        $stocks2 = array(
                'xs' => $this->input->post('xs')+$current_online_inventory_stock[0]['xs'],
                'sm' => $this->input->post('sm')+$current_online_inventory_stock[0]['sm'],
                'md' => $this->input->post('md')+$current_online_inventory_stock[0]['md'],
                'lg' => $this->input->post('lg')+$current_online_inventory_stock[0]['lg'],
                'xl' => $this->input->post('xl')+$current_online_inventory_stock[0]['xl'],
                'xxl' => $this->input->post('xxl')+$current_online_inventory_stock[0]['xxl'],
                'xxxl' => $this->input->post('xxxl')+$current_online_inventory_stock[0]['xxxl']
        );
        
        $this->db->update('inventory_in_online', $stocks2, array('product_id' => $id));  
    }
    
    public function add_stocks_online_onesize($stocks, $id){
        $this->db->select('*');
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();
        $stocks = array(
                'one' => $this->input->post('one-size')+$current_stock[0]['one'],      
        );
        
        $this->db->update('stocks_online', $stocks, array('product_id' => $id));

        //FOR INVENTORY ONLINE IN one size
        $this->db->select('*');
        $this->db->from('inventory_in_online');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_online_inventory_stock=$x->result_array();
        $stocks2 = array(
                'one' => $this->input->post('one-size')+$current_online_inventory_stock[0]['one'],      
        );
        
        $this->db->update('inventory_in_online', $stocks2, array('product_id' => $id));
    }
    
    public function add_stocks_walkin_multisize($stocks, $id){
       
        $this->db->select('*');
        $this->db->from('stocks_walkin');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();

        $stocks = array(
                'xs' => $this->input->post('xs')+$current_stock[0]['xs'],
                'sm' => $this->input->post('sm')+$current_stock[0]['sm'],
                'md' => $this->input->post('md')+$current_stock[0]['md'],
                'lg' => $this->input->post('lg')+$current_stock[0]['lg'],
                'xl' => $this->input->post('xl')+$current_stock[0]['xl'],
                'xxl' => $this->input->post('xxl')+$current_stock[0]['xxl'],
                'xxxl' => $this->input->post('xxxl')+$current_stock[0]['xxxl']
        );
        
        $this->db->update('stocks_walkin', $stocks, array('product_id' => $id));  




        //FOR INVENTORY WALKIN IN MULTI SIZE
        $this->db->select('*');
        $this->db->from('inventory_in_walkin');
        $this->db->where(array('product_id' => $id));
        $y = $this->db->get(); 
        
        $current_stock2=$y->result_array();

        $stocks2 = array(
                'xs' => $this->input->post('xs')+$current_stock2[0]['xs'],
                'sm' => $this->input->post('sm')+$current_stock2[0]['sm'],
                'md' => $this->input->post('md')+$current_stock2[0]['md'],
                'lg' => $this->input->post('lg')+$current_stock2[0]['lg'],
                'xl' => $this->input->post('xl')+$current_stock2[0]['xl'],
                'xxl' => $this->input->post('xxl')+$current_stock2[0]['xxl'],
                'xxxl' => $this->input->post('xxxl')+$current_stock2[0]['xxxl']
        );
        
        $this->db->update('inventory_in_walkin', $stocks2, array('product_id' => $id));  
    }

    public function add_stocks_walkin_onesize($stocks, $id){
        
        $this->db->select('*');
        $this->db->from('stocks_walkin');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();
        $stocks = array(
                'one' => $this->input->post('one-size')+$current_stock[0]['one'],      
        );
        
        $this->db->update('stocks_walkin', $stocks, array('product_id' => $id));



        //FOR INVENTORY WALKIN IN ONE SIZE
        $this->db->select('*');
        $this->db->from('inventory_in_walkin');
        $this->db->where(array('product_id' => $id));
        $y = $this->db->get(); 
        
        $current_stock2=$y->result_array();
        $stocks2 = array(
                'one' => $this->input->post('one-size')+$current_stock2[0]['one'],      
        );
        
        $this->db->update('inventory_in_walkin', $stocks2, array('product_id' => $id));

    }
    
    public function decrease_stocks_walkin_multisize($stocks, $id){
        $this->db->select('*');
        $this->db->from('stocks_walkin');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();

        $stocks = array(
                'xs' => $current_stock[0]['xs']-$this->input->post('xs'),
                'sm' => $current_stock[0]['sm']-$this->input->post('sm'),
                'md' => $current_stock[0]['md']-$this->input->post('md'),
                'lg' => $current_stock[0]['lg']-$this->input->post('lg'),
                'xl' => $current_stock[0]['xl']-$this->input->post('xl'),
                'xxl' => $current_stock[0]['xxl']-$this->input->post('xxl'),
                'xxxl' => $current_stock[0]['xxxl']-$this->input->post('xxxl')
        );
        
        $this->db->update('stocks_walkin', $stocks, array('product_id' => $id));  



        //FOR INVENTORY OUT WALKIN MULTISIZE
        $this->db->select('*');
        $this->db->from('inventory_out_walkin');
        $this->db->where(array('product_id' => $id));
        $y = $this->db->get(); 
        
        $current_stock2=$y->result_array();

        $stocks2 = array(
                'xs' => $current_stock2[0]['xs']+$this->input->post('xs'),
                'sm' => $current_stock2[0]['sm']+$this->input->post('sm'),
                'md' => $current_stock2[0]['md']+$this->input->post('md'),
                'lg' => $current_stock2[0]['lg']+$this->input->post('lg'),
                'xl' => $current_stock2[0]['xl']+$this->input->post('xl'),
                'xxl' => $current_stock2[0]['xxl']+$this->input->post('xxl'),
                'xxxl' => $current_stock2[0]['xxxl']+$this->input->post('xxxl')
        );
        
        $this->db->update('inventory_out_walkin', $stocks2, array('product_id' => $id));  


    }
    
    public function decrease_stocks_walkin_onesize($stocks, $id){
        
        $this->db->select('*');
        $this->db->from('stocks_walkin');
        $this->db->where(array('product_id' => $id));
        $x = $this->db->get(); 
        
        $current_stock=$x->result_array();
        $stocks = array(
                'one' => $current_stock[0]['one']-$this->input->post('one-size'),      
        );
        
        $this->db->update('stocks_walkin', $stocks, array('product_id' => $id));



        //FOR INVENTORY OUT WALKIN ONE SIZE
        $this->db->select('*');
        $this->db->from('inventory_out_walkin');
        $this->db->where(array('product_id' => $id));
        $y = $this->db->get(); 
        
        $current_stock2=$y->result_array();
        $stocks2 = array(
                'one' => $current_stock2[0]['one']+$this->input->post('one-size'),      
        );
        
        $this->db->update('inventory_out_walkin', $stocks2, array('product_id' => $id));

    }
    
    
    
    
    public function check_stocks_by_size($id,$size){
        $this->db->select('sizing,'.$size.'');
        $this->db->from('products');
        $this->db->join('stocks_online', 'products.product_id = stocks_online.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result();
    }
    public function check_stocks_by_size_walkin($id,$size){
        $this->db->select('sizing,'.$size.'');
        $this->db->from('products');
        $this->db->join('stocks_walkin', 'products.product_id = stocks_walkin.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result();
    }
    
    public function subtractStocks($data,$curr_stock){
        
// DEBUGGING PURPOSES
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        echo "Current: ".$curr_stock."<br>";
//        echo "Quantity: ".$data['qty']."<br>";
//        echo "Size: ".$data['options']['Size']."<br><br>";
//        
//        $updated_stock = $curr_stock - $data['qty'];
//        echo $updated_stock;
//        
//        
//        $this->db->select('*');
//        $this->db->from('stocks_online');
//        $this->db->where(array('product_id' => $data['id']));
//        $x = $this->db->get(); 
//        
//        echo "<pre>";
//        print_r($x->result_array());
//        
//        
//        
//       $x=array(
//           $data['options']['Size'] => $updated_stock
//       );
//                
//       print_r($x);
//       
//       $this->db->update('stocks_online', $x, array('product_id' => $data['id']));
//       
//       die
        
        $updated_stock = $curr_stock - $data['qty'];
        
        $this->db->select('*');
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $data['id']));
        $x = $this->db->get(); 
        
        $x=array(
            $data['options']['Size'] => $updated_stock
        );
        
        $this->db->update('stocks_online', $x, array('product_id' => $data['id']));
        
    }
    public function return_stocks($cart,$row_id){
        $prod_id=$cart[$row_id]['id'];
        $size=$cart[$row_id]['options']['Size'];
        $qty=$cart[$row_id]['qty'];

        
        $this->db->select('*');
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $prod_id));
        $x = $this->db->get(); 
        $res=$x->result_array();
        
        $curr_stock=$res[0][$size];
        
        $updated_stock = $curr_stock + $qty;
        
        $y=array(
            $size => $updated_stock
        );
        
        $this->db->update('stocks_online', $y, array('product_id' => $prod_id));
        
        
        
    }
    public function return_all_stocks($prod_id,$size,$qty){
        $this->db->select('*');
        $this->db->from('stocks_online');
        $this->db->where(array('product_id' => $prod_id));
        $x = $this->db->get(); 
        $res=$x->result_array();
        
        $curr_stock=$res[0][$size];
        
        $updated_stock = $curr_stock + $qty;
        
        $y=array(
            $size => $updated_stock
        );
        
        $this->db->update('stocks_online', $y, array('product_id' => $prod_id));
        
        
    }
    
    
    public function update_stocks($updated_stock, $prod_id, $prod_size){
        
        
        $y=array(
            $prod_size => $updated_stock
        );
        
        $this->db->update('stocks_online', $y, array('product_id' => $prod_id));
        
        
    }
    
}
