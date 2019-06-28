<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	     /**
		 * Product -> add Product 
		 * @url : insert-product
		 * @param : image ,uniqid,product name, created by id,tags,stock,price
		 * 
		 */
        public function insert($insert)
		{
			$this->db->where('product_id', $insert['product_id']);
			$query = $this->db->get('product');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('product_id', $insert['product_id']);
				if($this->db->update('product', $insert))
				{
					$this->db->select('id');
					$this->db->where('product_id', $insert['product_id']);
					return $this->db->get('product')->row_array();
				}
			}
			else
			{
				if($this->db->insert('product',$insert))
				{
					$this->db->select('id');
					$this->db->where('product_id', $insert['product_id']);
					return $this->db->get('product')->row_array();
				}
			}
        }


        /**
		 * Product -> add brand 
		 * @url : insert-product
		 * @param : brand data
		 * 
		 */
        public function brandinsert($brand)
		{
			$this->db->where('brand_uniq', $brand['brand_uniq']);
			$query = $this->db->get('brad_pricing');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('brand_uniq', $brand['brand_uniq']);
				return $this->db->update('brad_pricing', $brand);
			}
			else
			{
				return $this->db->insert('brad_pricing',$brand);
			}
        }


        

        /**
         * get all product 
         * @url : manage-product
         * 
        */
        public function getproduct()
		{
			$query = $this->db->get('product');
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
         * delete product 
         * @url : delete-product
         * @param : id
         * 
        */
        public function deleteproduct($id)
		{
			$this->db->where('product', $id);
			if($this->db->delete('brad_pricing'))
			{
				$this->db->where('id', $id);
				return $this->db->delete('product');
			}else{
				return false;
			}
        }

        /**
         * product -> edit product
         * url : edit-product
         * @param : id
        */
        public function editproduct($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('product');
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
         * get created by (admin name)
        */
        public function createdby($id)
        {
        	$this->db->select('name as createdby');
        	$this->db->where('id', $id);
			$result = $this->db->get('admin')->row_array();
			return $result['createdby'];
        }

}