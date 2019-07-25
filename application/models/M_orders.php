<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_orders extends CI_Model {

    /**
     *get orders list
     *
    **/
    public function getorders($var = null)
    {

                $this->db->where('o.order_by',$var)
                ->select('o.product as product_id,p.title as ptitle,o.shipping as shippping_address,o.brand_price,o.price as price ,o.qty as quantity,o.order_id as orderid, o.order_bach as bachid, o.status,o.is_cancled,o.is_deliverd,o.deliverd_on,o.orderd_on,p.product_id, p.image_path, p.price, p.tags, c.name, c.id, o.size, o.discount, o.gst ')
                ->from('orders o')
                ->order_by('orderd_on', 'desc')
                ->join('product p', 'o.product  = p.id', 'left')
                ->join('category c', 'c.id = p.category', 'left');
            return  $this->db->get()->result();
    }

   
    public function single_order($id,$uid)
    {

                $this->db->where('o.order_by',$uid)
                ->where('o.order_id',$id)
                ->select('o.product as product_id,p.title as ptitle,o.shipping as shippping_address,o.brand_price,o.price as price ,o.qty as quantity,o.order_id as orderid,o.status,o.is_cancled,o.is_deliverd,o.deliverd_on,o.orderd_on,p.product_id, p.image_path, p.price, p.tags, c.name, c.id')
                ->from('orders o')
                ->order_by('id', 'desc')
                ->join('product p', 'o.product  = p.id', 'left')
                ->join('category c', 'c.id = p.category', 'left')
                ->join('brad_pricing b', 'b.id = o.brand_price', 'left');
            return  $this->db->get()->result();
    }

    public function review($data = null)
    {
        $result = $this->db->where('product', $data['product'])->where('user', $data['user'])->get('review');
        if($result->num_rows() > 0){
            $this->db->where('product', $data['product'])->where('user',  $data['user'])->update('review', $data);
        }else{
            $this->db->insert('review', $data);
        }
        return true;
    }


    // get branding
    public function getBranding($oderid)
    {
        return $this->db->where('order_id', $oderid)->get('order_branding')->result();
    }
}