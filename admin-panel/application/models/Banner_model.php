<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    /**
     * display price in banner -> getprice
     * url : banner/getprice
     */
    public function getprice($productid)
    {
        $this->db->select('price');
        $this->db->where('id', $productid);
        return $this->db->get('product')->row();
    }

        /**
         * insert new banner 
         * @url : add-banner
         * @param : banner data
         * 
        */
        public function insert($insert)
		{
			$this->db->where('uniq', $insert['uniq']);
			$query = $this->db->get('banner');
			if ($query->num_rows() > 0) 
			{
				$this->db->where('uniq', $insert['uniq']);
				return $this->db->update('banner', $insert);
			}
			else
			{
				return $this->db->insert('banner',$insert);
			}
        }

        /**
         * get banner 
         * @url : manage-banner
         * 
        */
        public function getbanner()
		{
            $this->db->order_by('id', 'desc');
			$query = $this->db->get('banner');
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
         * delete banner 
         * @url : delete-banner
         * @param : id
         * 
        */
        public function deletebanner($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('banner');
        }

                /**
         * product -> edit banner
         * url : edit-banner
         * @param : id
        */
        public function editbanner($id)
		{
            $this->db->where('id', $id);
			$query = $this->db->get('banner');
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

/* End of file Banner_model.php */
