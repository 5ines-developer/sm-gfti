<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_search extends CI_Model
{

    // get result()
    public function getResult($query = null, $category = null, $max = null, $min = null, $brand = null)
    {

        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');
        if ($max != '') {

            $this->db->where('p.price <=', $max);

        }

        if ($min != '') {
            $this->db->where('p.price >=', $min);
        }



        if ($brand != '') {
            $this->db->group_start();
                foreach ($brand as $key => $value) {
                    if($key == 0)
                    {
                        $this->db->where('p.brand ', $value);
                    }elseif($key > 0){
                        $this->db->or_where('p.brand ', $value);
                    }
                }
            $this->db->group_end();
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
    public function search_pagination($query, $category, $perpage, $page, $max, $min, $brand = 'null')
    {
        $this->db->from('product p');
        $this->db->join('category c', 'c.id = p.category', 'left');

        if ($max != '') {

            $this->db->where('p.price <=', $max);

        }

        if ($min != '') {
            $this->db->where('p.price >=', $min);
        }
        if ($brand != '') {
            $this->db->group_start();
                foreach ($brand as $key => $value) {
                    if($key == 0)
                    {
                        $this->db->where('p.brand ', $value);
                    }elseif($key > 0){
                        $this->db->or_where('p.brand ', $value);
                    }
                }
            $this->db->group_end();
        }

        if ($query != '') {
            $this->db->like('title', $query)
                ->or_like('tags', $query)
                ->or_like('name', $query);
        }
        if ($category != '') {
            $this->db->like('name', $category);
        }
        $this->db->order_by('p.created_on', 'desc');
        $this->db->limit($perpage, $page);
        return $this->db->get()->result();
    }

    // get single product
    public function single_product($id)
    {
        return $this->db->from('product p')
        ->select('product_id,p.discount, p.hsn, p.id as pid, image_path,title, price, mrp, des, tags, total_stock, available_stock, category, name, path, uniqid')
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

    public function sizeList($id = null)
    {
        $this->db->where('prdid', $id);
        $this->db->order_by('size', 'asc');
        return $this->db->get('size_chart')->result();
    }

    // rating fetch
    public function ratingSingleProduct($prid)
    {
        // $result['avg'] = $this->RatingAvg($prid);
        $this->db->select('r.id as rid, r.rating, r.product, r.headline, r.comments, r.created_on, e.name');
        $this->db->where('product', $prid);
        $this->db->where('status', 1);
        $this->db->from('review r');
        $this->db->join('employee e', 'e.id = r.user', 'left');
        return $this->db->get()->result();
       
    }

    // // Rating avg
    // public function FunctionName(Type $var = null)
    // {
    //     # code...
    // }
}

/* End of file M_search.php */
