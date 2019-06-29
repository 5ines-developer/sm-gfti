<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

        /**
         * get orders 
         * @url : manage-order
         * 
        */
        public function getorders()
		{
            
            $this->db->order_by('id', 'desc');
			$query = $this->db->get('orders');
			if ($query->num_rows() > 0) 
			{
				
				return $query->result();
			}
			else
			{
				return false;
			}
        }

}