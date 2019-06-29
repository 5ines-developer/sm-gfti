<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('Category_model');
        $this->load->library('email');          
        $this->load->library('session'); 
        $this->load->library('form_validation'); 
		$this->load->library('session'); 
        $this->load->helper('url'); 
        if($this->session->userdata('unique_id') == '') 
		{
            $this->session->set_flashdata('error', 'Please login and try again');
            redirect('dashboard'); 
        }
    }

    /**
     * Orders -> Orders List
     * url : orders
     */
    public function index()
    {
        $data['title'] = 'Orders - Siemens';
        $data['order']   = $this->Order_model->getorders();
        $this->load->view('order/manage-order',$data);
    }

    /**
      * Orders -> view Orders 
     * url : view-order
     * @param : id
    */
    public function view_order($id='')
    {
        $data['title']      = 'View Order - Siemens';
        $data['order']      = $this->Order_model->singleorder($id);
        $this->load->view('order/view-order',$data);
    }

}