<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bf_auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->uid = $this->session->userdata('sid');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('sid'));
        $this->load->model('m_web');
        $this->data['categories'] = $this->m_web->categories();
    }

    // about us
    public function about()
    {
        $this->load->view('pages/about');
        
    }

    // contact
    public function contact()
    {
        $this->load->view('pages/contact');
    }

    // contact
    public function privacy()
    {
        $this->load->view('pages/privacy');
    }

    // contact
    public function termsCondition()
    {
        $this->load->view('pages/terms-condition');
    }

}

/* End of file bf_auth.php */

?>