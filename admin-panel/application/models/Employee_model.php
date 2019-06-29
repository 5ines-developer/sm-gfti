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

        

    

}

/* End of file ModelName.php */
