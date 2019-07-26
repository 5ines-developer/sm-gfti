<?php
defined('BASEPATH') or exit('No direct script access allowed');

class payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sid') == '') {redirect('login', 'refresh');}
        $this->load->model('m_cart');
        $this->uid = $this->session->userdata('sid');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('sid'));
        $this->load->model('m_web');
        $this->data['categories'] = $this->m_web->categories();
    }

    public function success($puropse='',$team='')
    {
        $paymentid = $this->input->post('razorpay_payment_id');

        $this->load->helper('string');
        $bach = 'SMB-' . random_string('numeric', 14);
        if (empty($this->session->userdata('bill_id'))) {
            $shipping = $this->m_cart->getdefaultShipping($this->uid);
        }

        $cartitesms = $this->m_cart->getCart($this->uid);

        foreach ($cartitesms as $key => $value) {
            $orderid = 'SMG-' . random_string('numeric', 14);
            $data = array(
                'order_id' => $orderid,
                'order_bach' => $bach,
                'product' => $value->prid,
                'order_by' => $this->uid,
                'qty' => $value->qty,
                'price' => $value->price,
                'team' => $team,
                'purpose' => $puropse,
                'payment_id' => $paymentid,
                'size'          => $value->size,
                'discount'      => $value->pdiscount,
                'gst'           => $value->pgst
            );

            if (!empty($this->session->userdata('bill_id'))) {
                $data['billing'] = $this->session->userdata('bill_id');
                $data['shipping'] = '0';
                $address['bill'] = $this->m_cart->selectedbilling($data['billing']);
                $address['ship'] = $this->m_cart->selectedbilling($data['billing']);
            } else {
                $data['billing'] = $this->input->post('bill_val');
                $data['shipping'] = $shipping;
                $address['bill'] = $this->m_cart->selectedbilling($data['billing']);
                $address['ship'] = $this->m_cart->selectedship($shipping);
            }

            if (!empty($paymentid)) {
                if ($this->m_cart->insertOrder($data)) {
                    $this->m_cart->deletecartBrand($value->cid, $orderid);
                    $this->sendorder($cartitesms, $bach, $address, $puropse, $team);
                    $this->sendadmin($cartitesms, $bach, $address, $puropse, $team);
                    redirect('my-orders', 'refresh');
                }
            } else {
                $this->p_failed($cartitesms, $bach, $address, $puropse, $team);
                $this->p_failedadmin($cartitesms, $bach, $address, $puropse, $team);
                redirect('cart', 'refresh');
            }

        }

    }

    //  place order request
    public function sendorder($cartitesms = '', $bach = '', $address = '', $puropse = '', $team = '')
    {

        $to = $this->session->userdata('suser');
        $data['detail'] = $cartitesms;
        $data['bach'] = $bach;
        $data['bill'] = $address['bill'];
        $data['ship'] = $address['ship'];
        $data['team'] = $team;
        $data['puropse'] = $puropse;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/place-order', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Gifting Express');
        $this->email->to($to);
        $this->email->subject('Order Placed Successfully');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }

    }

    //  place order request
    public function sendadmin($cartitesms = '', $bach = '', $address = '', $puropse = '', $team = '')
    {

        $data['detail'] = $cartitesms;
        $data['bach'] = $bach;
        $data['bill'] = $address['bill'];
        $data['ship'] = $address['ship'];
        $data['team'] = $team;
        $data['puropse'] = $puropse;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/place-order-admin', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Gifting Express');
        $this->email->to('Vinayaka@giftingxpress.in');
        $this->email->subject('Order Placed Successfully');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }

    }

    //  place order request
    public function p_failed($cartitesms = '', $bach = '', $address = '', $puropse = '', $team = '')
    {

        $to = $this->session->userdata('suser');
        $data['detail'] = $cartitesms;
        $data['bach'] = $bach;
        $data['bill'] = $address['bill'];
        $data['ship'] = $address['ship'];
        $data['team'] = $team;
        $data['puropse'] = $puropse;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/payment-failed', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Gifting Express');
        $this->email->to($to);
        $this->email->subject('Payment Failed');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }

    }

    //  place order request
    public function p_failedadmin($cartitesms = '', $bach = '', $address = '', $puropse = '', $team = '')
    {

        $to = $this->session->userdata('suser');
        $data['detail'] = $cartitesms;
        $data['bach'] = $bach;
        $data['bill'] = $address['bill'];
        $data['ship'] = $address['ship'];
        $data['team'] = $team;
        $data['puropse'] = $puropse;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/payment-failed-admin', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Gifting Express');
        $this->email->to('Vinayaka@giftingxpress.in');
        $this->email->subject('Payment Failed');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }

    }

}

/* End of file payment.php */
