<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_model extends CI_Model {


        /**
         * get domain 
         * @url : manage-domain
         * 
        */
        public function getenquiry()
		{
			$query = $this->db->get('enquiry');
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
         *View enquiry  get Single enquiry 
         * @url : view-enquiry
         * @param: id
         * 
        */
        public function singleenquiry($id)
		{
            
            $this->db->where('id', $id);
			$query = $this->db->get('enquiry');
			if ($query->num_rows() > 0) 
			{
				
				return $query->row_array();
			}
			else
			{
				return false;
			}
        }

}

/* End of file ModelName.php */
