<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('category_model');
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
	 * Product -> add Product load view page
	 * url : add-product
	*/
    public function index()
    {
        $data['title'] = 'Add Product - Siemens';
        $data['category'] = $this->category_model->getcategory();
		$this->load->view('product/add-product',$data);
    }

     /**
	 * Product -> add Product 
	 * @url : insert-product
	 * @param : image ,uniqid,product name, created by id,tags,stock,price
	 * 
	 */
    public function add_product($value='')
    {
            $product    = $this->input->post('product');
            $category   = $this->input->post('category');
            $price      = $this->input->post('price');
            $stock      = $this->input->post('stock');
            $tags       = $this->input->post('tags');
            $description = $this->input->post('description');
            $uniq       = $this->input->post('uniq');
            $desc       = trim($description);
            $txt        = strtoupper( substr($product, 0, 2 ) ).substr( $product, 2 );
            $result     = mb_substr($txt, 0, 2);
            $product_id = $result.$uniq;
            $brand_title       = $this->input->post('brand_title');
            $brand_price       = $this->input->post('brand_price');

            $files = $_FILES;
            $filesCount = count($_FILES['pimage']['name']);
            if(file_exists($_FILES['pimage']['tmp_name'])) {
            $config['upload_path']          = 'product-image/';
            $config['allowed_types']        = 'jpg|png|jpeg';                
            $config['max_width']            = 0;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload', $config);
            if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
            if ( ! $this->upload->do_upload('pimage'))
            {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('add-product');
            }
            else
            {


                $upload_data = $this->upload->data();
                $config['image_library']    =   'gd2';
                $config['source_image']     =   $upload_data['full_path'];
                $config['create_thumb']     =   TRUE;
                $config['maintain_ratio']   =   TRUE;
                $config['height']           =   250;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_name      =   $upload_data['file_name'];        
                $file_tumb      =   $upload_data['raw_name'];       
                $file_tumb_ex   =   $upload_data['file_ext'];                      
                $thum_file      =   $file_tumb.'_thumb'.$file_tumb_ex; 

            }
            }

            $splittedstring =   str_replace(",", ', ',$tags);
            $insert =  array(
                'tags'      =>  $splittedstring,
                'product_id'=>  $product_id,
                'title'     =>  $product,
                'price'     =>  $price,
                'total_stock'     =>  $stock,
                'available_stock' =>  $stock,
                'des'       =>  $desc,
                'update_on' =>  date('Y-m-d H:i:s'),
                'category'  =>  $category,
                'created_by' => $this->session->userdata('unique_id')
            );
            if(file_exists($_FILES['pimage']['tmp_name'])) {
             $insert['image_path'] =   $file_name ;
             $insert['image_thumbnail'] =   $thum_file ;
            }

           $output1['product'] = $this->Product_model->insert($insert);


           for ($i=0; $i < count($brand_title) ; $i++) {
                       $brand = array(
                        'product' =>  $output1['product']['id'],
                        'title'   =>  $brand_title[$i],
                        'price'   =>  $brand_price[$i],
                        'status'  =>  '1',
                        'brand_uniq' => random_string('alnum','16')
                       );
           $output2 = $this->Product_model->brandinsert($brand);
           }

            if($output2 != FALSE && $output1 !='')
            {
                $this->session->set_flashdata('success', 'Product added  Successfully');
                redirect('manage-product','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-product','refresh');
            }
    }


    /**
     * Product -> Product List
     * url : manage-product
     */
    public function manage_product()
    {
        $data['title'] = 'Manage Product - Siemens';
        $data['product']   = $this->Product_model->getproduct();
        $this->load->view('product/manage-product',$data);
    }

    /**
     * Product -> delete Product
     * url : delete-product
     * @param : id
    */
    public function delete_product($id='')
    {
            // send to model
             if($this->Product_model->deleteproduct($id)){
                 $this->session->set_flashdata('success', 'Product Deleted Successfully');
                 redirect('manage-product','refresh'); // if you are redirect to list of the data add controller name here
             }else{
                  $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                  redirect('manage-product','refresh'); // if you are redirect to list of the data add controller name here
             }
    }

    /**
     * Product -> Edit Product
     * url : edit-product
     * @param : id
    */
    public function edit_product($productid='')
    {
        $data['title'] = 'Edit Product - Siemens';
        $data['product']   = $this->Product_model->editproduct($productid);
        $this->load->view('product/add-product',$data);
    }

    
    

}