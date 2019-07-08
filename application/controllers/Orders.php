<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
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
        $data['orders'] =  $bach;
        $this->load->view('account/myorders', $data);
    }

        // single product
        public function order_detail($id = null)
        {
            $data['order'] = $this->m_orders->single_order($id,$this->uid);

            
            echo "<pre>";
            print_r ($data['order']);
            echo "</pre>";
            
            $data['breadcrumbs'] = FALSE;
            // $data['title'] = $data['order']->title;
            // $data['brand'] = $this->m_search->brand_product($data['product']->id);
            $this->load->view('pages/product-detail', $data, FALSE);
        }


}