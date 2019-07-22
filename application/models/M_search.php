<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_search extends CI_Model
{

    // get result()
    public function getResult($query = null, $category = null, $max = null, $min = null)
    {

        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');
        if ($max != '') {

            $this->db->where('p.price <=', $max);

        }

        if ($min != '') {
            $this->db->where('p.price >=', $min);
        }

        if ($query != '') {
            $this->db->like('title', $query)
                ->or_like('tags', $query)
                ->or_like('name', $query);
        }
        if ($category != '') {
            $this->db->like('name', $category);
        }

        return $this->db->get()->result();
    }

    // get product with pagination
    public function search_pagination($query, $category, $perpage, $page, $max, $min)
    {
        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');

        if ($max != '') {

            $this->db->where('p.price <=', $max);

        }

        if ($min != '') {
            $this->db->where('p.price >=', $min);
        }

        if ($query != '') {
            $this->db->like('title', $query)
                ->or_like('tags', $query)
                ->or_like('name', $query);
        }
        if ($category != '') {
            $this->db->like('name', $category);
        }
        $this->db->limit($perpage, $page);
        return $this->db->get()->result();
    }

    // get single product
    public function single_product($id)
    {
        return $this->db->from('product p')
            ->select('product_id, p.id as pid, image_path,title, price, mrp, des, tags, total_stock, available_stock, category, name, path, uniqid')
            ->where('product_id', $id)
            ->join('category c', 'c.id = p.category', 'left')
            ->get()
            ->row();
    }

    // brand select
    public function brand_product($id = null)
    {
        return $this->db->where('product', $id)->get('brad_pricing')->result();
    }

    // brand select
    public function brand_price($id = null)
    {
        $query =  $this->db->select('price')->where('id', $id)->get('brad_pricing')->row();
        return $query->price;
    }

}

/* End of file M_search.php */
