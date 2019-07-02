<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_cart');
        $this->uid = $this->session->userdata('sid');
    }

    public function index($pid = null)
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Cart';

        $qty = $this->input->post('qty');
        $brand = $this->input->post('brand');

        if (empty($qty)) { $qty = 1; }
        if (empty($brand)) { $brand = ''; }
        
        $datas = array('qty' => $qty, 'barand_price' => $brand, 'product' => $pid);
        $this->m_cart->addTocart($datas, $this->uid);

        $data['cart'] = $this->m_cart->getCart($this->uid);
        $this->load->view('pages/cart', $data, FALSE);
    }

}

/* End of file Cart.php */
