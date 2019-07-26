
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {

        /**
         * insert new brand 
         * @url : add-brand
         * @param : image ,uniqid,brand name, created by id
         * 
        */
        public function insert($insert)
		{
			$this->db->where('uniqid', $insert['uniqid']);
			$query = $this->db->get('brand');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniqid', $insert['uniqid']);
				return $this->db->update('brand', $insert);
			}
			else
			{
				return $this->db->insert('brand',$insert);
			}
        }


        /**
         * get brand 
         * @url : manage-brand
         * 
        */
        public function getbrand()
		{
			$this->db->order_by('name', 'asc');
			if(!empty($this->input->get('f'))){
				$f =  $this->input->get('f');
				$this->db->like('name', $f, 'after');
			}
			$query = $this->db->get('brand');
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
         * brand -> edit brand load view page
         * url : edit-brand
         * @param : id
        */
        public function editbrand($brandId)
		{
            $this->db->where('id', $brandId);
			$query = $this->db->get('brand');
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
         * delete brand 
         * @url : delete-brand
         * @param : id
         * 
        */
        public function deletebrand($brandId)
		{
				$this->db->where('id', $brandId);
				$this->db->delete('brand');
				if($this->db->affected_rows() > 0)
				{
					return true;
				}else{
					return false;
				}

				
		}
		
		/**
         * get created by (admin name)
        */
        public function brandname($id)
        {
        	$this->db->select('name as brandname');
        	$this->db->where('id', $id);
			$result = $this->db->get('brand')->row_array();
			return $result['brandname'];
        }
		
		
		
        

    

}

/* End of file ModelName.php */
