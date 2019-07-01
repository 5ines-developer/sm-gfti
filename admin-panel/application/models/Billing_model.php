<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_model extends CI_Model {

        /**
         * insert new billing address 
         * @url : add-billing-address
         * @param : billing data
         * 
        */
        public function insert($insert)
		{
			$this->db->where('uniq', $insert['uniq']);
			$query = $this->db->get('billing_address');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniq', $insert['uniq']);
				return $this->db->update('billing_address', $insert);
			}
			else
			{
				return $this->db->insert('billing_address',$insert);
			}
        }

        /**
         * get Billing address 
         * url : manage-billing-address
         * 
        */
        public function getbilling()
		{
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('billing_address');
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
         * delete Billing Address 
         * @url : delete-billing-address
         * @param : id
         * 
        */
        public function deletebilling($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('billing_address');
        }


        /**
         * billing  address -> Edit billing  address
         * url : edit-billing-address
         * @param : id
        */
        public function edit_billing($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('billing_address');
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
