<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cart extends CI_Model
{

    // add to cart
    public function addTocart($datas, $eid)
    {
        
        $prid = $this->getProductid($datas['product']);

        $data = array('qty' =>$datas['qty'], 'size' => $datas['size'],'product' => $prid, 'emp_id' => $eid);

        $this->db->where('emp_id', $eid);
        $this->db->where('product', $prid);
        $query = $this->db->get('cart');

        if ($query->num_rows() > 0) {
            $this->db->where('emp_id', $eid);
            $this->db->where('product', $prid);
            $this->db->update('cart', $data);

            foreach ($query->result() as $key => $value) {
                return $value->id;
            }
        } else {
            $this->db->insert('cart', $data);
            return $insert_id = $this->db->insert_id();
        }
        return $insert_id;
    }

    public function addcartbrand($insert,$cartid)
    {

        $this->db->where('cart_id',$cartid);
        $this->db->where('brand_id',$insert['brand_id']);
        $query = $this->db->get('cart_branding');
        if ($query->num_rows() > 0) {
            $this->db->where('cart_id', $cartid);
            $this->db->where('brand_id',$insert['brand_id']);
            $this->db->update('cart_branding',$insert);
        }else{
            $this->db->insert('cart_branding', $insert);
        }
        // $this->deletebrand($brandcr['id'],$cartid);
        return true;
    }

    public function deletebrand($brand,$cartid)
    {
        $this->db->where('cart_id',$cartid);
        if (!empty($brand[0])) {
            $this->db->where_not_in('brand_id', $brand);
        }
        return $this->db->delete('cart_branding');
    }

    

    public function getbrand($brand='')
    {
        $this->db->where('id', $brand);
        $query = $this->db->get('brad_pricing')->result();
        return $query;
    }



    

    // get product
    public function getProductid($pid = null)
    {
        $result = $this->db->select('id')->where('product_id', $pid)->get('product')->row();
        return $result->id;
    }

    // get product name
    public function getproduct($pid = null)
    {
        $result = $this->db->select('title')->where('product_id', $pid)->get('product')->row();
        return $result->title;
    }

    // get cart item
    public function getCart($eid)
    {
        $this->db->select('qty,c.size, p.id as prid, product_id, name,c.id as cid, p.discount as pdiscount,p.gst as pgst,p.title as ptitle, p.image_path, p.price as price,');
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
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
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

    public function deletecartBrand($cid,$orderid)
    {
        if($this->updateorderBrand($cid,$orderid))
        {
            $this->db->where('cart_id', $cid);
            $this->db->delete('cart_branding');
        }
        return true;
    }

    //update order branding charges
    public function updateorderBrand($cid,$orderid)
    {
        $this->db->where('cart_id', $cid);
       $query =  $this->db->get('cart_branding');

       if ($query->num_rows() > 0) {

        foreach ($query->result() as $key => $value) {
            $insert =array(
                'order_id' => $orderid,
                'brand_title' => $value->brand_title,
                'brand_price' => $value->brand_price,
                'brand_id' => $value->brand_id,

            );
            $this->db->insert('order_branding', $insert); }
       }
        return true;

    }

    

    // decreez product qty
    public function protectedQty($data)
    {
        $this->db->where('id', $data['product'])
            ->set('available_stock', 'available_stock-' . $data['qty'], false)
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
        return true;

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
        return true;
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
        $query = $this->db->where('employee', $uid)->where('status', '1')->get('shipping_address')->row();
        return $query->id;
    }

    // Get selected billing addres
    public function selectedbilling($billing = null)
    {
        $query = $this->db->where('id', $billing)->get('billing_address')->row_array();
        return $query;
    }

    // Get selected shipping address
    public function selectedship($shipping = null)
    {
        $query = $this->db->where('id', $shipping)->get('shipping_address')->row_array();
        return $query;
    }

        // Get getuseremail
        public function getuseremail($cid = null)
        {
            $query = $this->db->where('id', $cid)->get('employee')->row();
            return $query->email;
        }

    

    // carrt item
    public function cart_item($id = null)
    {
        $result = $this->db->where('emp_id', $id)->get('cart');
        return $result->num_rows();

    }

    public function brandpriceFect($id = null)
    {
        $this->db->where('cart_id', $id);
        return $this->db->get('cart_branding')->result();
    }

    public function updateBrand($id, $prd)
    {
        $this->db->where('id', $prd);
        $this->db->update('cart', array('barand_price' => $id));
        return true;
    }

    public function getphone($id = null)
    {
        $this->db->select('phone');
        $this->db->where('id', $id);
        $result = $this->db->get('employee')->row_array();
        return $result['phone'];
    }

    public function hsncode($prid = null)
    {
        $this->db->select('hsn');
        $this->db->where('id', $prid);
        $result = $this->db->get('product')->row_array();
        return $result['hsn'];
    }
    public function size($prid = null,$size=null)
    {
        $this->db->select('size_name');
        $this->db->where('prdid', $prid);
        $this->db->where('id', $size);
        $result = $this->db->get('size_chart')->row_array();
        return $result['size_name'];
    }
    
    



}

/* End of file M_cart.php */
