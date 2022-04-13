<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	function search($title){
        $this->db->like('title', $title , 'both');
        $this->db->limit(10);
        return $this->db->get('product')->result();
    }

}

/* End of file Product_model.php */
