<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry extends CI_Controller {

    
	/*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Enquiry_model');
        $this->load->library('email');          
        $this->load->library('session'); 
        $this->load->library('form_validation'); 
		$this->load->library('session'); 
        $this->load->helper('url'); 


    }
    
    /**
    * Enquiry -> manage Enquiry 
    * url : manage-enquiry
    */
    public function index()
    {
        $data['title'] = 'Manage Enquiry - Siemens';
        $data['enquiry']   = $this->Enquiry_model->getenquiry();
        $this->load->view('enquiry/manage-enquiry',$data);
        
    }
    

    
    /**
    * Enquiry -> manage Enquiry 
    * url : manage-enquiry
    *@param : id
    */
    public function view_enquiry($id='')
    { 
        $data['title']     = 'View Enquiry - Siemens';
        $data['enquiry']    = $this->Enquiry_model->singleenquiry($id);
        $this->load->view('enquiry/view-enquiry',$data);
    }
}

/* End of file Controllername.php */