<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

     /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Banner_model');
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
	 * Banner -> add banner load view page
	 * url : add-banner
	*/
    public function index()
    {
        $data['title'] = 'Add Banner - Siemens';
        $data['product']   = $this->Product_model->getproduct();
		$this->load->view('banner/add-banner',$data);
    }

    /**
     * display price in banner -> getprice
     * url : banner/getprice
     */
    public function getprice()
    {
        $productid = $this->input->get('productid');  
        $data   = $this->Banner_model->getprice($productid);
        echo $data->price;
    }


    /**
	 * Banner -> insert Product 
	 * @url : insert-banner
	 * @param : image ,uniqid,product name, created by id,tags,stock,price
	 * 
	 */
    public function add_banner($value='')
    {
            $title      = $this->input->post('title');
            $product    = $this->input->post('product');
            $price      = $this->input->post('price');
            $uniq       = $this->input->post('uniq');
            $subtitle   = $this->input->post('subtitle');


            $files = $_FILES;
            $filesCount = count($_FILES['banner']['name']);
            if(file_exists($_FILES['banner']['tmp_name'])) {
            $config['upload_path']          = 'banner-image/';
            $config['allowed_types']        = 'jpg|png|jpeg';                
            $config['max_width']            = 0;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);
            if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
            if ( ! $this->upload->do_upload('banner'))
            {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('add-banner');
            }
            else
            {
                $upload_data = $this->upload->data();
                $path           =   $upload_data['full_path'];
                $file_name      =   $upload_data['file_name'];        
                
            }
            }

            $insert =  array(
                'title'     =>  $title,
                'subtitle'  =>  $subtitle,
                'price'     =>  $price,
                'product'   =>  $product,
                'uniq'      =>  $uniq,
                'status '   =>  '1'
            );

            if(file_exists($_FILES['banner']['tmp_name'])) {
                $insert['image']     =  $file_name;
                $insert['path']      =   $path ;
                
            }
           $output = $this->Banner_model->insert($insert);
            if($output !='')
            {
                $this->session->set_flashdata('success', 'Product added  Successfully');
                redirect('manage-banner','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-banner','refresh');
            }
    }


    /**
     * banner -> banner List
     * url : manage-banner
    */
    public function manage_banner()
    {
        $data['title'] = 'Manage Product - Siemens';
        $data['product']   = $this->Product_model->getproduct();
        $data['banner']    = $this->Banner_model->getbanner();
        $this->load->view('banner/manage-banner',$data);
    }

    /**
     * Product -> delete Product
     * url : delete-product
     * @param : id
    */
    public function delete_banner($id='')
    {
            // send to model
             if($this->Banner_model->deletebanner($id)){
                 $this->session->set_flashdata('success', 'Product Deleted Successfully');
                 redirect('manage-banner','refresh'); // if you are redirect to list of the data add controller name here
             }else{
                  $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                  redirect('manage-banner','refresh'); // if you are redirect to list of the data add controller name here
             }
    }

    /**
     * Product -> Edit Product
     * url : edit-product
     * @param : id
    */
    public function edit_banner($id='')
    {
        $data['title']     = 'Edit Product - Siemens';
        $data['product']   = $this->Product_model->getproduct();
        $data['banner']    = $this->Banner_model->editbanner($id);
        $this->load->view('banner/add-banner',$data);
    }

    
    

}

/* End of file Banner.php */
