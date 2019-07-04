<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

    // add to cart
    public function addTocart($datas, $eid)
    {
        $prid =  $this->getProductid($datas['product']);

        $data = array('qty' =>$datas['qty'], 'barand_price' => $datas['barand_price'], 'product' => $prid, 'emp_id' => $eid);

        $this->db->where('emp_id', $eid);
        $this->db->where('product', $prid);
        $query = $this->db->get('cart');
        if($query->num_rows() > 0){
            $this->db->where('emp_id', $eid);
            $this->db->where('product', $prid);
            $this->db->update('cart', $data);
        }else{
            $this->db->insert('cart', $data);
        }
        return true;        
    }

    // get product
    public function getProductid($pid = null)
    {
        $result = $this->db->select('id')->where('product_id', $pid)->get('product')->row();
        return $result->id;        
    }

    // get cart item
    public function getCart($eid)
    {
        $this->db->select('qty, product_id, name,c.id as cid, p.title as ptitle, p.image_path, p.price as price, b.title as title, b.price as bprice ');
        $this->db->where('emp_id', $eid);
        $this->db->from('cart c');
        $this->db->join('product p', 'p.id = c.product', 'left');
        $this->db->join('brad_pricing b', 'b.id = c.barand_price', 'left');
        $this->db->join('category ct', 'ct.id = p.category', 'left');
        return $this->db->get()->result();
    }

    //delete cart
    public function deletecart($pid, $eid)
    {

        $this->db->where('id', $pid)->where('emp_id', $eid)->delete('cart');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        } 
    }

    //  update qty
    public function setQty($cid, $data, $uid)
    {
        $this->db->where('id', $cid)
            ->where('emp_id', $uid)
            ->update('cart', $data);
        return true;
        
    }

    public function insertOrder($value)
    {
       
       echo "<pre>";
       print_r ($value);
       echo "</pre>";

       exit;
       
    }

}

/* End of file M_cart.php */
