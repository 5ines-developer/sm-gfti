<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domain extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Domain_model');
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
	 * Domain -> add domain load view page
	 * url : add-domain
	*/
    public function index()
    {
        $data['title'] = 'Add Domain - Siemens';
		$this->load->view('domain/add-domain',$data);
    }

        /**
		* Domain -> insert domain 
		* @url : insert-domain
		*/
		public function add_domain()
		{
			$domain = $this->input->post('domain');
			$uniq 	= $this->input->post('uniq');

            $insert =  array(
                'domain'        =>  $domain,
                'created_by'    => $this->session->userdata('unique_id'),
                'status'         => '1' ,
                'uniq'         =>  $uniq
            );
            
			if($this->Domain_model->insert($insert))
			{
				$this->session->set_flashdata('success', 'Domain Added Successfully');
				redirect('manage-domain','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('add-domain','refresh');
			}
        }
        
        /**
        * Domain -> manage domain 
         * url : manage-domain
         */
        public function manage_domain()
        {
            $data['title'] = 'Manage Domain - Siemens';
            $data['domain']   = $this->Domain_model->getdomain();
            $this->load->view('domain/manage-domain',$data);
        }

        /**
         * domain -> delete domain
         * url : delete-domain
         * @param : id
        */
        public function delete_domain($id='')
        {
                // send to model
                if($this->Domain_model->deletedomain($id)){
                    $this->session->set_flashdata('success', 'domain Deleted Successfully');
                    redirect('manage-domain','refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('manage-domain','refresh'); // if you are redirect to list of the data add controller name here
                }
        }

        /**
         * Domain -> Edit domain
         * url : edit-domain
         * @param : id
        */
        public function edit_domain($id='')
        { 
            $data['title']     = 'Edit Domain - Siemens';
            $data['domain']    = $this->Domain_model->edit_domain($id);
            $this->load->view('domain/add-domain',$data);
        }



        


        

}