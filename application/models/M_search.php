<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

    // get result()
    public function getResult($query)
    {
        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');
        $this->db->like('title',$query)
                ->or_like('tags',$query)
                ->or_like('name', $query);
        return $this->db->get()->result();
    }

    // get product with pagination
    public function search_pagination($query,$perpage,$page)
    {
        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');
        if($query != ''){
            $this->db->like('title',$query)
                    ->or_like('tags',$query)
                    ->or_like('name', $query);
        }
        $this->db->limit($perpage, $page); 
        return $this->db->get()->result();
    }

    // get single product
    public function single_product($id)
    {
        return $this->db->from('product p')
        ->where('product_id', $id)
        ->join('category c', 'c.id = p.category', 'right')
        ->get()
        ->row();
    }

    // brand select
    public function brand_product($id = null)
    {
       return $this->db->where('product', $id)->get('brad_pricing')->result();
    }

}

/* End of file M_search.php */
