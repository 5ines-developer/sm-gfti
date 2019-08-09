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
                ->select('o.product as product_id,o.payment_id,p.title as ptitle,o.ex_discount, o.shipping as shippping_address,o.brand_price,o.price as price ,o.qty as quantity,o.order_id as orderid, o.order_bach as bachid, o.status,o.is_cancled,o.is_deliverd,o.deliverd_on,o.orderd_on,p.product_id, p.image_path, p.price, p.tags, c.name, c.id, o.size, o.discount, o.gst ')
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

    // escalation
    public function escalation($data)
    {
        $result = $this->db->where('product', $data['product'])->where('user', $data['user'])->get('escalation');
        if($result->num_rows() > 0){
            $this->db->where('product', $data['product'])->where('user',  $data['user'])->update('escalation', $data);
        }else{
            $this->db->insert('escalation', $data);
        }
        return true;
    }

    public function product_name($id = null)
    {
        $result =  $this->db->select('title')->where('product_id', $id)->get('product')->row_array();
        return $result['title'];
    }

    public function customer($id = null)
    {
        return $this->db->select('name,email,phone')->where('id', $id)->get('employee')->row_array();
    }

    // order / courrir status
    public function order_status($id)
    {
        return  $this->db->where('order_bach', $id)
        ->from('orders o')
        ->join('product p', 'o.product  = p.id', 'left')
        ->get()->result();
        
        
    }
    



}