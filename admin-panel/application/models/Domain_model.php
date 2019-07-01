<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Domain_model extends CI_Model {

        /**
         * insert new domain 
         * @url : add-domain
         * @param : domain data
         * 
        */
        public function insert($insert)
		{
			$this->db->where('uniq', $insert['uniq']);
			$query = $this->db->get('domain');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniq', $insert['uniq']);
				return $this->db->update('domain', $insert);
			}
			else
			{
				return $this->db->insert('domain',$insert);
			}
        }

        /**
         * get domain 
         * @url : manage-domain
         * 
        */
        public function getdomain()
		{
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('domain');
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
         * delete domain 
         * @url : delete-domain
         * @param : id
         * 
        */
        public function deletedomain($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('domain');
		}
		
		/**
         * product -> edit banner
         * url : edit-banner
         * @param : id
        */
        public function edit_domain($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('domain');
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