<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
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
	 * category -> add category load view page
	 * url : add-category
	 */
    public function index()
    {
		$data['title'] = 'Add Category - Siemens';
		$this->load->view('category/add-category',$data);
    }

    /**
	 * insert new category 
	 * @url : add-category
	 * @param : image ,uniqid,category name, created by id
	 * 
	 */
    public function add_category($value='')
    {
        // category image size needs to be changed once after the design

 
        $bancheck = $this->input->post('bancheck');
        $data = $this->input->post('image');
        $uniq = $this->input->post('uniq');
        $category = $this->input->post('category');
        $createdby = $this->session->userdata('unique_id');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time().'.png';

         file_put_contents('category-image/'.$imageName, $data);


        $insert = array(
			'name' 		=>	$category ,
			'created_by' 	=>	$createdby ,
			'uniqid' 		=>	$uniq
            );

        if ($bancheck !='') {
            $insert['image'] = $imageName;
        }

        $result = $this->Category_model->insert($insert);
        if($result){
                $this->session->set_flashdata('success', 'category added  Successfully');
                redirect('manage-category','refresh');
        }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-category','refresh');
        }
    }


    /**
	 * category -> category List
	 * url : add-category
	 */
    public function manage_category()
    {
        $data['title'] = 'Manage Category - Siemens';
        $data['category']	= $this->Category_model->getcategory();
		$this->load->view('category/manage-category',$data);
    }

    /**
	 * category -> edit category load view page
	 * url : edit-category
     * @param : id
	*/
    public function edit_category($categoryId='')
    {
        $data['title'] = 'Edit Category - Siemens';
        $data['category']	= $this->Category_model->editcategory($categoryId);
		$this->load->view('category/add-category',$data);
    }

    /**
	 * category -> delete category
	 * url : delete-category
     * @param : id
	*/
    public function delete_category($categoryId='')
    {
            // send to model
             if($this->Category_model->deletecategory($categoryId)){
                 $this->session->set_flashdata('success', 'Category Deleted Successfully');
                 redirect('manage-category','refresh'); // if you are redirect to list of the data add controller name here
             }else{
                  $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                  redirect('manage-category','refresh'); // if you are redirect to list of the data add controller name here
             }
    }






}

/* End of file Controllername.php */