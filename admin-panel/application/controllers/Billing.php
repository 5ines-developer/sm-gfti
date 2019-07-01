<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

     /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Billing_model');
        $this->load->model('Product_model');
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
	 * Billing Address -> add domain load view page
	 * url : add-billing-address
	*/
    public function index()
    {
        $data['title'] = 'Add Billing Address - Siemens';
		$this->load->view('billing/add-billing',$data);
    }

        /**
		* Billing Address -> add billing 
        * @url : insert-billing-address
		*/
		public function add_billing()
		{
			$company_name   = $this->input->post('company_name');
			$street 	    = $this->input->post('street');
			$city 	        = $this->input->post('city');
			$state 	        = $this->input->post('state');
			$zipcode 	    = $this->input->post('zipcode');
			$gst 	        = $this->input->post('gst');
			$uniq 	        = $this->input->post('uniq');
			$country 	    = $this->input->post('country');

            $insert =  array(
                'street'        => $street,
                'company_name'  => $company_name,
                'city'          => $city,
                'religion'      => $state ,
                'zip_code'      => $zipcode ,
                'gst_number'    => $gst ,
                'country'       => $country ,
                'uniq'          => $uniq
            );
            
			if($this->Billing_model->insert($insert))
			{
				$this->session->set_flashdata('success', 'Billing Address Added Successfully');
				redirect('manage-billing-address','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('add-billing-address','refresh');
			}
        }

        /**
        * billing  address -> manage billing  address
         * url : manage-billing-address
         */
        public function manage_billing()
        {
            $data['title']      = 'Manage Billing Address - Siemens';
            $data['billing']    = $this->Billing_model->getbilling();
            $this->load->view('billing/manage-billing',$data);
        }


        /**
          * billing  address -> delete domain
         * url : delete-domain
         * @param : id
        */
        public function delete_billing($id='')
        {
                // send to model
                if($this->Billing_model->deletebilling($id)){
                    $this->session->set_flashdata('success', 'Billing Address Deleted Successfully');
                    redirect('manage-billing-address','refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('manage-billing-address','refresh'); // if you are redirect to list of the data add controller name here
                }
        }

        /**
         * billing  address -> Edit billing  address
         * url : edit-billing-address
         * @param : id
        */
        public function edit_billing($id='')
        { 
            $data['title']     = 'Edit Billing Address - Siemens';
            $data['billing']   = $this->Billing_model->edit_billing($id);
            $this->load->view('billing/add-billing',$data);
        }

    

}