<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_cart');
        $this->uid = $this->session->userdata('sid');
    }

    public function success()
    {
        $paymentid = $this->input->post('razorpay_payment_id');
        
        $this->load->helper('string');
        $bach = 'SMB-'.random_string('numeric', 14);

        $shipping = $this->m_cart->getdefaultShipping($this->uid);
        $cartitesms = $this->m_cart->getCart($this->uid);

        foreach ($cartitesms as $key => $value) {
            $orderid = 'SMG-'.random_string('numeric', 14);
            $data  = array(
                'order_id'      => $orderid, 
                'order_bach'    => $bach, 
                'product'       =>  $value->prid, 
                'order_by'      => $this->uid, 
                'shipping'      => $shipping, 
                'brand_price'   =>  $value->bprice, 
                'qty'           =>  $value->qty, 
                'price'         =>  $value->price, 
                'billing'       =>  '0', 
                'shipping'      =>  $shipping, 
                'payment_id'    => $paymentid,
            );

            $this->m_cart->insertOrder($data);

            redirect('my-orders','refresh');
            
            
        }
        
    }

}

/* End of file payment.php */
