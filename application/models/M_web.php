<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_web extends CI_Model {

    // getCategoryProduct
    public function getCategoryProduct()
    {
        $this->getCatogory();
        $this->getItembyCategory();
    }

    // get category list
    public function getCatogory($var = null)
    {
        $this->db->get('product', limit, offset);
        
    }


    // get category item
    public function getItembyCategory($var = null)
    {
        # code...
    }
}

/* End of file M_web.php */
