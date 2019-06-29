
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

        /**
         * insert new category 
         * @url : add-category
         * @param : image ,uniqid,category name, created by id
         * 
        */
        public function insert($insert)
		{
			$this->db->where('uniqid', $insert['uniqid']);
			$query = $this->db->get('category');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniqid', $insert['uniqid']);
				return $this->db->update('category', $insert);
			}
			else
			{
				return $this->db->insert('category',$insert);
			}
        }


        /**
         * get category 
         * @url : manage-category
         * 
        */
        public function getcategory()
		{
			$query = $this->db->get('category');
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
         * category -> edit category load view page
         * url : edit-category
         * @param : id
        */
        public function editcategory($categoryId)
		{
            $this->db->where('id', $categoryId);
			$query = $this->db->get('category');
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
         * delete category 
         * @url : delete-category
         * @param : id
         * 
        */
        public function deletecategory($categoryId)
		{
			$this->db->select('id');
			$this->db->where('category', $categoryId);
			$result = $this->db->get('product')->result();
			foreach ($result as $key) {
				$productid = $key->id;
				$this->db->where('product', $productid);
				$this->db->delete('brad_pricing');
				if($this->db->affected_rows() > 0)
				{
					$brand = 1;
				}else{
					$brand = 0;
				}

				$this->db->where('product', $productid);
				$this->db->delete('marquee');
			}

				$this->db->where('category', $categoryId);
				$this->db->delete('product');
				if($this->db->affected_rows() > 0)
				{
					$product = 1;
				}else{
					$product = 0;
				}

				$this->db->where('id', $categoryId);
				$this->db->delete('category');
				if($this->db->affected_rows() > 0)
				{
					$category = 1;
				}else{
					$category = 0;
				}

				if ($brand!='' || $product!='' || $category!='') {
					return true;
				}else{
					return false;
				}
		}
		
		/**
         * get created by (admin name)
        */
        public function categoryname($id)
        {
        	$this->db->select('name as categoryname');
        	$this->db->where('id', $id);
			$result = $this->db->get('category')->row_array();
			return $result['categoryname'];
        }
		
		
		
        

    

}

/* End of file ModelName.php */
