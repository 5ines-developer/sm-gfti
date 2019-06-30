<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

        /**
         * get banner 
         * @url : manage-banner
         * 
        */
        public function getemployee()
		{
            $this->db->where('is_active', '1');
			$query = $this->db->get('employee');
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
         * delete employee 
         * @url : delete-employee
         * @param : id
         * 
        */
        public function delete_employee($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('employee');
        }
        
        /**
         * employee -> view employee
         * url : view-employee
         * @param : id
        */
        public function viewemployee($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('employee');
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
         * employee -> get employee orders
         * url : view-employee
         * @param : id
        */
        public function employeeorder($id)
		{
			$this->db->order_by('id', 'desc');
            $this->db->where('order_by', $id);
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
         * employee -> shippingaddress
         * url : view-employee
         * @param : id
        */
        public function shippingaddress($id)
		{
            $this->db->where('employee', $id);
			$query = $this->db->get('shipping_address');
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

/* End of file ModelName.php */
