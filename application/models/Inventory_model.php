<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {


    public function get_inventory_in_walkin(){
        $this->db->select('*');
        $this->db->from('inventory_in_walkin');
        $this->db->join('products', 'inventory_in_walkin.product_id=products.product_id');
        $x= $this->db->get(); 
        return $x->result();
    }

    public function get_inventory_out_walkin(){
        $this->db->select('*');
        $this->db->from('inventory_out_walkin');
        $this->db->join('products', 'inventory_out_walkin.product_id=products.product_id');
        $x= $this->db->get(); 
        return $x->result();
    }

	public function get_inventory_in_online(){
        $this->db->select('*');
        $this->db->from('inventory_in_online');
        $this->db->join('products', 'inventory_in_online.product_id=products.product_id');
        $x= $this->db->get(); 
        return $x->result();
    }

    public function get_inventory_in_online_f(){
        $this->db->select('*');
        $this->db->from('inventory_out_online');
        $this->db->join('products', 'inventory_out_online.product_id=products.product_id');
        $x= $this->db->get(); 
        return $x->result();
    }

    public function get_inventory_out_online(){
        $this->db->select('*');
        $this->db->from('inventory_out_online');
        $this->db->join('products', 'inventory_out_online.product_id=products.product_id');
        $x= $this->db->get(); 
        return $x->result();
    }

    public function getInventoryOutOnlineById($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('inventory_out_online', 'products.product_id = inventory_out_online.product_id');
        $this->db->where('products.product_id', $id);
        $x = $this->db->get(); 
        return $x->result_array();
    }

    public function addInventoryOutOnline($data,$curr_stock){

        $updated_stock = $curr_stock + $data['qty'];
        
        $this->db->select('*');
        $this->db->from('inventory_out_online');
        $this->db->where(array('product_id' => $data['id']));
        $x = $this->db->get(); 
        
        $x=array(
            $data['options']['Size'] => $updated_stock
        );
        
        $this->db->update('inventory_out_online', $x, array('product_id' => $data['id']));
        
    }

    public function return_inventory($cart,$row_id){
        $prod_id=$cart[$row_id]['id'];
        $size=$cart[$row_id]['options']['Size'];
        $qty=$cart[$row_id]['qty'];

        
        $this->db->select('*');
        $this->db->from('inventory_out_online');
        $this->db->where(array('product_id' => $prod_id));
        $x = $this->db->get(); 
        $res=$x->result_array();
        
        $curr_stock=$res[0][$size];
        
        $updated_stock = $curr_stock - $qty;
        
        $y=array(
            $size => $updated_stock
        );
        
        $this->db->update('inventory_out_online', $y, array('product_id' => $prod_id));
    }

    public function return_all_inventory_out_online($prod_id,$size,$qty){
        $this->db->select('*');
        $this->db->from('inventory_out_online');
        $this->db->where(array('product_id' => $prod_id));
        $x = $this->db->get(); 
        $res=$x->result_array();
        
        $curr_stock=$res[0][$size];
        
        $updated_stock = $curr_stock - $qty;
        
        $y=array(
            $size => $updated_stock
        );
        
        $this->db->update('inventory_out_online', $y, array('product_id' => $prod_id));
        
        
    }
}