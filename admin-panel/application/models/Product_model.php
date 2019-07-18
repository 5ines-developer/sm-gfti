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
		 * Product -> add Product  bulk with excell
		 * @url : insert-product
		 * @param : image ,uniqid,product name, created by id,tags,stock,price
		 * 
		*/

		public function insertbulk($insert)
		{
			if($this->db->insert('product',$insert))
			{
				$this->db->select('id');
				$this->db->where('product_id', $insert['product_id']);
				return $this->db->get('product')->row_array();
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
		 * Product -> add marquee 
		 * @url : insert-product
		 * @param : marquee data
		 * 
		 */
        public function marqueeinsert($marquee)
		{
			$this->db->where('uniq', $marquee['uniq']);
			$query = $this->db->get('marquee');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniq', $marquee['uniq']);
				return $this->db->update('marquee', $marquee);
			}
			else
			{
				return $this->db->insert('marquee',$marquee);
			}
        }


        


        

        /**
         * get all product 
         * @url : manage-product
         * 
        */
        public function getproduct()
		{
			$this->db->select('c.id as cid, c.name,p.id as id, p.product_id as product_id, p.title, p.image_path, p.price, p.total_stock, p.available_stock, p.discount, p.gst');
			
			$this->db->from('product p');
			$this->db->join('category c', 'c.id = p.category', 'left');
			if(!empty($this->input->get('f'))){
				$f =  $this->input->get('f');
				$this->db->like('c.name', $f, 'after');
			}
			$this->db->order_by('p.id', 'desc');
			$query = $this->db->get();

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
				

				$this->db->where('product', $id);
				$this->db->delete('marquee');

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
         * product -> get marquee detail
         * url : edit-product
         * @param : id
        */
        public function getmarquee($productid)
		{
            $this->db->where('product', $productid);
			$query = $this->db->get('marquee');
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
         * product -> get brand charges detail
         * url : edit-product
         * @param : id
        */
        public function getbrand($productid)
		{
            $this->db->where('product', $productid);
			$query = $this->db->get('brad_pricing');
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
         * delete brand 
         * @url : delete-brand
         * @param : brand id
         * 
        */
        public function deletebrand($brandid)
		{
			$this->db->where('id', $brandid);
			return $this->db->delete('brad_pricing');
			
		}

		/**
         * delete brand 
         * @url : delete-brand
         * @param : brand id
         * 
        */
        public function deletemarquee($marqueid)
		{
			$this->db->where('id', $marqueid);
			return $this->db->delete('marquee');
			
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

		/**
         * get created by (admin name)
        */
        public function productname($id)
        {
        	$this->db->select('title as productname');
        	$this->db->where('id', $id);
			$result = $this->db->get('product')->row_array();
			return $result['productname'];
		}

		/**
         * get category id
        */
        public function categoryid($name)
        {
        	$this->db->select('id');
        	$this->db->where('name', $name);
			$result = $this->db->get('category')->row_array();
			return $result['id'];
		}
		
		public function insertSize($data, $key)
		{
			if($key == 0){
				$this->db->where('prdid', $data['prdid'])->delete('size_chart');
			}
			$this->db->insert('size_chart', $data);
			return true;
			
		}

		public function getsize($productid)
		{
			return $this->db->where('prdid', $productid)->get('size_chart')->result();
			
		}
		

}