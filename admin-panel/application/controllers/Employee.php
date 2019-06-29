<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->library('email');          
        $this->load->library('session'); 
        $this->load->library('form_validation'); 
		$this->load->library('session'); 
        $this->load->helper('url'); 
        if($this->session->userdata('unique_id') == '') 
		{
            $this->session->set_flashdata('error', 'Please login andtry again');
            redirect('dashboard'); 
        }
    }


        /**
        * Employee -> manage employee 
         * url : manage-employee
         */
        public function index()
        {
            $data['title'] = 'Manage Employee - Siemens';
            $data['employee']   = $this->Employee_model->getemployee();
            $this->load->view('employee/manage-employee',$data);
        }


        /**
         * Employee -> delete employee
         * url : delete-employee
         * @param : id
        */
        public function delete_employee($id='')
        {
                // send to model
                if($this->Employee_model->delete_employee($id)){
                    $this->session->set_flashdata('success', 'Employee Deleted Successfully');
                    redirect('manage-employee','refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('manage-employee','refresh'); // if you are redirect to list of the data add controller name here
                }
        }

        /**
        * Employee -> view employee 
         * url : view-employee
         * @param:id
         */
        public function view_employee($id="")
        {
            $data['title'] = 'View Employee - Siemens';
            $data['employee']   = $this->Employee_model->viewemployee($id);
            $data['order']      = $this->Employee_model->employeeorder($id);
            $data['shipping']   = $this->Employee_model->shippingaddress($id);


            foreach ($data['order'] as $key => $value) {
                $billingid = $value->billing;
            }

            $this->load->view('employee/view-employee',$data);
        }
        

        
}