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
        $this->db->order_by('name', 'asc');
        return $this->db->get('category', 5)->result();
    }

    //  get all category 
    public function categories()
    {
        $data['full'] = $this->db->order_by('name', 'asc')->get('category')->result();
        $data['five'] = $this->getFiveCategiry();
        $data['marquee'] = $this->marquee();
        return $data;
    }

    public function getFiveCategiry($var = null)
    {
        return $this->db->order_by('name', 'asc')->get('category', 5)->result();
    }
    
    // get marque
    public function marquee()
    {
       return $this->db->get('marquee')->result();
       
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

    // recently added product list
    public function recently_added_products()
    {
        return  $this->db->select('p.product_id, p.title, p.image_path, p.price, p.tags, c.name, c.id, p.discount')
                ->from('product p')
                ->order_by('id', 'desc')
                ->join('category c', 'c.id = p.category', 'left')
                ->limit('15')
                ->get()
                ->result();
    }

    // our product fetch randum datas
    public function ourProducts()
    {
        return  $this->db->select('p.product_id, p.title, p.image_path, p.price, p.tags, c.name, c.id')
        ->from('product p')
        ->order_by('rand()')
        ->join('category c', 'c.id = p.category', 'left')
        ->limit('18')
        ->get()
        ->result();
    }

    // category fetch
    public function category($var = null)
    {
        $this->db->select('id, name');
        $this->db->order_by('id', 'RANDOM');
        return $this->db->get('category', 6)->result();
    }

    // GET BRAND
    public function brand()
    {
        $this->db->order_by('name', 'desc');
        return $this->db->get('brand')->result();
    }

    // get banner
    public function getBanner($var = null)
    {
        return $this->db->select('*')
                ->from('banner b')
                ->get()
                ->result();        
    }

        // get offer
        public function getoffer($var = null)
        {
            return $this->db->select('*')
                    ->from('offers o')
                    ->get()
                    ->result();        
        }

    // brand logo
    public function brandlogo()
    {
        return $this->db->order_by('name', 'asc')->get('brand')->result();
    }
    
    // enquirey
    public function enquiry($data = null)
    {
       $fiedls = array(
           'name' => $data['name'], 
           'phone' => $data['phone'], 
           'email' => $data['email'], 
           'subject' => $data['subject'], 
           'message' => $data['comment'], 
        );
        $this->db->insert('enquiry', $fiedls);
        return true;
        
    }
}

/* End of file M_web.php */
