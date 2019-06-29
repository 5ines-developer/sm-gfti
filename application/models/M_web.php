<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_web extends CI_Model {

    // getCategoryProduct
    public function getCategoryProduct()
    {
        $data['category'] = $this->getCatogory();
        $data['products'] = $this->getItembyCategory($data['category']);
        return $data;
    }

    // get category list
    public function getCatogory($var = null)
    {
        $this->db->select('id, name');
        $this->db->order_by('id', 'desc');
        return $this->db->get('category', 7)->result();
    }


    // get category item
    public function getItembyCategory($category = null)
    {
        foreach ($category as $key => $value) {
            $this->db->where('category', $value->id);
            $this->db->order_by('id', 'desc');
            $data[$key]  = $this->db->get('product', 8)->result();
        }
        foreach ($data as $key => $value) {
            foreach ($value as $key1 => $value1) {
                $result[] = $value1;
            }
        }
        return $result;
    }
}

/* End of file M_web.php */
