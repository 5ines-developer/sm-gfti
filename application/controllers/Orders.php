<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sid') == '') {redirect('login', 'refresh');}
        $this->load->model('m_orders');
        $this->uid = $this->session->userdata('sid');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('sid'));
        $this->load->model('m_web');
        $this->data['categories'] = $this->m_web->categories();
    }

    public function index($var = null)
    {
        $data['title'] = 'My Orders - siemens';
        $result = $this->m_orders->getorders($this->uid);
        $bach = '';
        foreach ($result as $key => &$value) {

            $bach[$value->bachid][$key] = $value;
        }

        $data['orders'] = $bach;

        $this->load->view('account/myorders', $data);
    }

    // single product
    public function order_detail($id = null)
    {
        $data['order'] = $this->m_orders->single_order($id, $this->uid);

        $data['breadcrumbs'] = false;
        // $data['title'] = $data['order']->title;
        // $data['brand'] = $this->m_search->brand_product($data['product']->id);
        $this->load->view('pages/product-detail', $data, false);
    }

    // review
    public function review()
    {
        $input = $this->input->post();
        $data = array(
            'rating' => $input['rating'],
            'product' => $input['product'],
            'headline' => $input['headline'],
            'comments' => $input['cmd'],
            'user' => $this->uid,
        );
        $this->m_orders->review($data);
        $this->session->set_flashdata('msg', 'We’re processing your review. This may take several days, so we appreciate your patience.');
        redirect('my-orders', 'refresh');
    }

    // escalation
    public function escalation()
    {
        $input = $this->input->post();
        $data = array(
            'product' => $input['product'],
            'headline' => $input['headline'],
            'comments' => $input['cmd'],
            'user' => $this->uid,
        );
        if($this->m_orders->escalation($data))
        {
            $this->sendesclation($data);
        }
        $this->session->set_flashdata('msg', 'Thank you for the feedback. We will check and rectify the issue.');
        redirect('my-orders', 'refresh');
    }

    //  place order request
    public function sendesclation($data='')
    {
        $data['product'] = $this->m_orders->product_name($data['product']);
        $data['customer'] = $this->m_orders->customer($data['user']);
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = $this->load->view('email/escalation', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Gifting Express');
        $this->email->to('Vinayaka@giftingxpress.in');
        $this->email->subject('Product Escalation');
        $this->email->message($msg);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }

    }

    // order status fetch
    public function order_status()
    {
        $data['orderStatus'] = $this->m_orders->order_status($this->input->get('oid'));    
        $this->load->view('account/order-status', $data, FALSE);
        
    }

}
