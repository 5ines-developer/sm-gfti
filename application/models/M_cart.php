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
        $this->db->select('qty, p.id as prid, product_id, name,c.id as cid, p.title as ptitle, p.image_path, p.price as price, b.title as title, b.price as bprice ');
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

    public function insertOrder($data)
    {
       $this->db->insert('orders', $data);
       $this->protectedQty($data);
       $this->deleteCartitem();
       return true;
       
    }


    // decreez product qty
    public function protectedQty($data)
    {
        $this->db->where('id', $data['product'])
            ->set('available_stock', 'available_stock-'.$data['qty'], FALSE)
            ->update('product');
            return true;
        
    }

    // delete cart items
    public function deleteCartitem()
    {
        $this->db->where('emp_id', $this->session->userdata('sid'))->delete('cart');
        return true;        
    }

    // save shipping address
    public function saveShipping($data, $uid)
    {
        $this->db->where('employee', $uid);
        $this->db->update('shipping_address', array('status' => 0));
        $this->db->group_start();
            $this->db->insert('shipping_address', $data);
        $this->db->group_end();
        return True;  
        
    }

    // get shipping addres  detail
    public function getShipping($id = null)
    {
        $this->db->where('employee', $id)->order_by('status', 'DESC');
        return $this->db->get('shipping_address')->result();
    }

       // get billing addres  detail
       public function getBilling($id = null)
       {
           $this->db->order_by('id', 'DESC');
           return $this->db->get('billing_address')->result();
       }

    // change address default
    public function cahnge_address($sid, $uid)
    {
        
        $this->db->where('employee', $uid);
        $this->db->update('shipping_address', array('status' => 0));
        $this->cahnge_address_update($sid, $uid);
        return True;  
    }

    public function cahnge_address_update($sid, $uid)
    {
        $this->db->where('employee', $uid);
        $this->db->where('id', $sid);
        $this->db->update('shipping_address', array('status' => 1));
        return true;
    }

    // Get default shipping address
    public function getdefaultShipping($uid = null)
    {
        $query  = $this->db->where('employee', $uid)->where('status', '1')->get('shipping_address')->row();
        return  $query->id; 
    }

    // carrt item
    public function cart_item($id = null)
    {
        $result =$this->db->where('emp_id', $id)->get('cart');
        return $result->num_rows();
        
    }

    public function brandpriceFect($id = null)
    {
       $this->db->where('product', $id);
       return $this->db->get('brad_pricing')->result();
    }

    public function updateBrand($id, $prd)
    {
        $this->db->where('id', $prd);
        $this->db->update('cart', array('barand_price' => $id));
        return true; 
    }

}

/* End of file M_cart.php */
