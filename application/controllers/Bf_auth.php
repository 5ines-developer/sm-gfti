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

    // privacy
    public function privacy()
    {
        $this->load->view('pages/privacy');
    }

    // enquiry
    public function enquiry()
    {
        $input = $this->input->post();
        $this->m_web->enquiry($input);
        $this->session->set_flashdata('success', 'We received your message! Will get back to you shortly!!!');
        redirect('contact-us','refresh');
    }

    
}

/* End of file bf_auth.php */

?>