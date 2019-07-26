<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('brand_model');
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
	 * brand -> add brand load view page
	 * url : add-brand
	 */
    public function index()
    {
		$data['title'] = 'Add Brand - Siemens';
		$this->load->view('brand/add-brand',$data);
    }

    /**
	 * insert new brand 
	 * @url : add-brand
	 * @param : image ,uniqid,brand name, created by id
	 * 
	 */
    public function add_brand($value='')
    {
        // brand image size needs to be changed once after the design

 
        $bancheck = $this->input->post('bancheck');
        $data = $this->input->post('image');
        $uniq = $this->input->post('uniq');
        $brand = $this->input->post('brand');
        $createdby = $this->session->userdata('unique_id');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time().'.png';

         file_put_contents('../brand-image/'.$imageName, $data);


        $insert = array(
			'name' 		=>	$brand ,
			'created_by' 	=>	$createdby ,
			'uniqid' 		=>	$uniq
            );

        if ($bancheck !='') {
            $insert['image'] = $imageName;
            $insert['path']  = 'brand-image/'.$imageName;
        }

        $result = $this->brand_model->insert($insert);
        if($result){
                $this->session->set_flashdata('success', 'brand added  Successfully');
                redirect('manage-brand','refresh');
        }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-brand','refresh');
        }
    }


    /**
	 * brand -> brand List
	 * url : add-brand
	 */
    public function manage_brand()
    {
        $data['title'] = 'Manage brand - Siemens';
        $data['brand']	= $this->brand_model->getbrand();
		$this->load->view('brand/manage-brand',$data);
    }

    /**
	 * brand -> edit brand load view page
	 * url : edit-brand
     * @param : id
	*/
    public function edit_brand($brandId='')
    {
        $data['title'] = 'Edit brand - Siemens';
        $data['brand']	= $this->brand_model->editbrand($brandId);
		$this->load->view('brand/add-brand',$data);
    }

    /**
	 * brand -> delete brand
	 * url : delete-brand
     * @param : id
	*/
    public function delete_brand($brandId='')
    {
            // send to model
             if($this->brand_model->deletebrand($brandId)){
                 $this->session->set_flashdata('success', 'brand Deleted Successfully');
                 redirect('manage-brand','refresh'); // if you are redirect to list of the data add controller name here
             }else{
                  $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                  redirect('manage-brand','refresh'); // if you are redirect to list of the data add controller name here
             }
    }






}

/* End of file Controllername.php */