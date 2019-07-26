<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

        /**
         * get orders 
         * @url : manage-order
         * 
        */
        public function getorders($statuscode = null)
		{
            if($statuscode == 1){
                $this->db->where('payment_id is NOT NULL', NULL, FALSE);
            }elseif($statuscode == 2){
                $this->db->where('payment_id is NULL', NULL, FALSE);
            }
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

        /**
         * Orders -> view order
         * url : view-order
         * @param : id
        */
        public function singleorder($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('orders');
			if ($query->num_rows() > 0) 
			{
				
				return $query->row_array();
			}
			else
			{
				return false;
			}
        }

        /**
         * get order by (employee name)
        */
        public function orderby($id)
        {
        	$this->db->select('name as orderby');
        	$this->db->where('id', $id);
			$result = $this->db->get('employee')->row_array();
			return $result['orderby'];
        }

         /**
         * get image of product
        */
        public function productimage($id)
        {
        	$this->db->select('image_path as image');
        	$this->db->where('id', $id);
			$result = $this->db->get('product')->row_array();
			return $result['image'];
        }

        /**
         * get shipping address
        */
        public function shipping($id)
        {
        	$this->db->select('*');
        	$this->db->where('id', $id);
			$result = $this->db->get('shipping_address')->result();
			return $result;
        }
        
        /**
         * get billing address
        */
        public function billing($id)
        {
        	$this->db->select('*');
        	$this->db->where('id', $id);
			$result = $this->db->get('billing_address')->result();
			return $result;
		}
        
        // Courrior status
        public function getSingle($id)
        {
           return $this->db->where('id', $id)->get('orders')->row();
        }

        // update courier status
        public function UpdateStatus($data)
        {
            if($data['status'] == 5){
                $updateData = array('is_deliverd' => 1 , 'deliverd_on' =>date('Y-m-d H:i:s'), 'status' => $data['status'] );
            }else{
                $updateData = array('status' => $data['status'] );
            }
            $this->db->where('id', $data['id']);
            $this->db->update('orders', $updateData);
            return true;
        }
        
        


}