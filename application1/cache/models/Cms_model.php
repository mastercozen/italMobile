<?php defined('BASEPATH') OR exit('No direct script access allowed');

    Class Cms_model extends CI_Model {

        public function get_cms() {
            $x = $this->db->get('cms');
            return $x->result();
        }

        public function update_shop_page_header($data){
	        $data = array(
	            'shop_banner' => $this->upload->data('file_name')
	       );
	        $this->db->update('cms', $data);
	    }

	    public function update_home_page_header($data){
	        $data = array(
	            'home_header_bg' => $this->upload->data('file_name')
	       );
	        $this->db->update('cms', $data);
	    }

	    public function update_about_us_bg($data){
	        $data = array(
	            'home_about_bg' => $this->upload->data('file_name')
	       );
	        $this->db->update('cms', $data);
	    }

	    public function update_about_us_desc($data){
	    	$this->db->update('cms', $data);
	    }
    }