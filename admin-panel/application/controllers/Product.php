<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        $this->load->library('email');          
        $this->load->library('session'); 
        $this->load->library('form_validation'); 
		$this->load->library('session'); 
        $this->load->helper('url'); 
        $this->load->library(array('email','upload','MY_Upload','excel'));
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
        $data['category'] = $this->Category_model->getcategory();
		$this->load->view('Product/add-product',$data);
    }

     /**
	 * Product -> add Product 
	 * @url : insert-product
	 * @param : image ,uniqid,product name, created by id,tags,stock,price
	 * 
	 */
    public function add_product($value='')
    {
        
            $edit        = $this->input->post('edit');
            $product     = $this->input->post('product');
            $category    = $this->input->post('category');
            $price       = $this->input->post('price');
            $stock       = $this->input->post('stock');
            $tags        = $this->input->post('tags');
            $description = $this->input->post('description');
            $uniq        = $this->input->post('uniq');
            $mrp         = $this->input->post('mrp');
            $desc        = trim($description);
            $size_title  = $this->input->post('size_title');
            $size        = $this->input->post('size');

            
           
            
            if (empty($edit)) {
                $txt        = strtoupper( substr($product, 0, 2 ) ).substr( $product, 2 );
                $result     = mb_substr($txt, 0, 2);
                $product_id = $result.$uniq;
            }else{
                $product_id = $uniq;
            }
            
            
            $brand_title    = $this->input->post('brand_title');
            $brand_price    = $this->input->post('brand_price');
            $brndunq        = $this->input->post('brndunq');

            $marquee_title  = $this->input->post('marquee_title');
            $marquee_link   = $this->input->post('marquee_link');
            $marqueeunq     = $this->input->post('marqueeunq');


            $files = $_FILES;
            $filesCount = count($_FILES['pimage']['name']);
            if(file_exists($_FILES['pimage']['tmp_name'])) {
            $config['upload_path']          = '../product-image/';
            $config['allowed_types']        = 'jpg|png|jpeg';                
            $config['max_width']            = 0;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload');
            $this->upload->initialize($config);
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
            	// echo "ok";exit();
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
                'tags'              =>  $splittedstring,
                'product_id'        =>  $product_id,
                'title'             =>  $product,
                'price'             =>  $price,
                'mrp'               =>  $mrp,
                'total_stock'       =>  $stock,
                'available_stock'   =>  $stock,
                'des'               =>  $desc,
                'update_on'         =>  date('Y-m-d H:i:s'),
                'category'          =>  $category,
                'created_by'        =>  $this->session->userdata('unique_id'),
                'discount'          =>  $this->input->post('discound'),
                'hsn'               =>  $this->input->post('hsn'),
                'gst'               =>  $this->input->post('gst'),
                'other_tax'         =>  $this->input->post('otax'),
            );
            if(file_exists($_FILES['pimage']['tmp_name'])) {
             $insert['image_path'] =   'product-image/'.$file_name ;
            }

           $output1['product'] = $this->Product_model->insert($insert);

           if($size_title != ''){
                    $this->insertSize($size_title, $size, $output1['product']['id']);
            }

           if ($brand_title !='') {
                for ($i=0; $i < count($brand_title) ; $i++) {
                    if ($brand_title[$i] !='' ) {
                        $brand = array(
                            'product' =>  $output1['product']['id'],
                            'title'   =>  $brand_title[$i],
                            'price'   =>  $brand_price[$i],
                            'status'  =>  '1'
                            );
                            if (empty($brndunq[$i])) {
                                $brand['brand_uniq'] = random_string('alnum', 16);
                            } else {
                                $brand['brand_uniq'] = $brndunq[$i];
                            }
                        $output2 = $this->Product_model->brandinsert($brand);
                    }
                }
           }

           
           

           if ($marquee_title !='') {
                for ($i=0; $i < count($marquee_title) ; $i++) {
                    if ($marquee_title[$i] !='' ) {
                        $marquee = array(
                            'product' =>  $output1['product']['id'],
                            'title'   =>  $marquee_title[$i],
                            'link'    =>  $marquee_link[$i],
                            'status'  =>  '1'
                            );
                            if (empty($marqueeunq[$i])) {
                                $marquee['uniq'] = random_string('alnum', 16);
                            } else {
                                $marquee['uniq'] = $marqueeunq[$i];
                            }
                        $output3 = $this->Product_model->marqueeinsert($marquee);
                    }
                }
           }

            if($output1 !='')
            {
                $this->session->set_flashdata('success', 'Product added  Successfully');
                redirect('manage-product','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-product','refresh');
            }
    }


    public function insertSize($size_title, $size, $product_id)
    {
        foreach ($size_title as $key => $value) {
            if(!empty($value)){
                $data  = array(
                'prdid'      => $product_id,
                'size_name'  => $value,
                'size'       => $size[$key],
                );
                $this->Product_model->insertSize($data, $key);
            }
        }
        
        return true;
    }

    /**
     * Product -> Product List
     * url : manage-product
     */
    public function manage_product()
    {
        $data['title'] = 'Manage Product - Siemens';
        $data['product']   = $this->Product_model->getproduct();
        $this->load->view('Product/manage-product',$data);
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
        $data['title']      = 'Edit Product - Siemens';
        $data['product']    = $this->Product_model->editproduct($productid);
        $data['category']   = $this->Category_model->getcategory();
        $data['brand']      = $this->Product_model->getbrand($productid);
        $data['marquee']    = $this->Product_model->getmarquee($productid);
        $data['size']       = $this->Product_model->getsize($productid);
        
        $this->load->view('Product/add-product',$data);
    }


    /**
     * Product -> delete brand
     * url : delete-brand
     * @param : id
    */
    public function delete_brand()
    {
        $brandid = $this->input->get('brandid');
        // send to model
        $output = $this->Product_model->deletebrand($brandid);
        json_encode($output);
    }


    /**
     * Product -> delete brand
     * url : delete-brand
     * @param : id
    */
    public function delete_marquee()
    {
        $marqueid = $this->input->get('marqueid');
        // send to model
        $output = $this->Product_model->deletemarquee($marqueid);
        json_encode($output);
    }


    

    /**
     * Product -> Edit Product
     * url : edit-product
     * @param : id
    */
    public function view_product($productid='')
    {
        $data['title']      = 'View Product - Siemens';
        $data['product']    = $this->Product_model->editproduct($productid);
        $data['brand']      = $this->Product_model->getbrand($productid);
        $data['marquee']    = $this->Product_model->getmarquee($productid);
        $data['size']    = $this->Product_model->getsize($productid);
        $this->load->view('Product/view-product',$data);
    }



    /**
     * Product -> Edit Product
     * url : edit-product
     * @param : id
    */
    function import_excel()

	{

        

		$this->load->helper('string');

		if(isset($_FILES["file"]["name"]))

		{
           

                $path = $_FILES["file"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                
				foreach($object->getWorksheetIterator() as $worksheet)

				{



					$highestRow = $worksheet->getHighestRow();

                    $highestColumn = $worksheet->getHighestColumn();
                    


					for($row=2; $row<=$highestRow; $row++)

					{

                        $product 			= $worksheet->getCellByColumnAndRow(0, $row)->getValue();

						if (!empty($product)) {
						

						$path 			= $worksheet->getCellByColumnAndRow(1, $row)->getValue();

						$price 			= $worksheet->getCellByColumnAndRow(2, $row)->getValue();

						$desc 			= $worksheet->getCellByColumnAndRow(3, $row)->getValue();

						$tags 		    = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

						$stock 		    = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

						$category 		= $worksheet->getCellByColumnAndRow(6, $row)->getValue();

						$bran 	= $worksheet->getCellByColumnAndRow(7, $row)->getValue();

						$brandprice    = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$marq	= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $marqueelink	= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $brand_title = explode(" ",$bran);
                        $brand_price = explode(" ",$brandprice);
                        $marquee_title = explode(" ",$marq);
                        $marquee_link = explode(" ",$marqueelink);

                        $categoryid = $this->Product_model->categoryid($category);

                        $txt        = strtoupper( substr($product, 0, 2 ) ).substr( $product, 2 );
                        $result     = mb_substr($txt, 0, 2);
						$uniq 		= random_string('numeric',8);
                        $product_id = $result.$uniq;
                        $splittedstring =   str_replace(" ", ', ',$tags);

                        $insert =  array(
                            'tags'      =>  $splittedstring,
                            'product_id'=>  $product_id,
                            'title'     =>  $product,
                            'price'     =>  $price,
                            'total_stock'     =>  $stock,
                            'available_stock' =>  $stock,
                            'des'       =>  $desc,
                            'update_on' =>  date('Y-m-d H:i:s'),
                            'category'  =>  $categoryid,
                            'created_by' => $this->session->userdata('unique_id'),
                            'image_path' => $path
                        );

                        $output1['product'] = $this->Product_model->insertbulk($insert);

                        if ($marquee_title !='') {
                            for ($i=0; $i < count($marquee_title) ; $i++) {
                                if ($marquee_title[$i] !='' ) {
                                    $marquee = array(
                                        'product' =>  $output1['product']['id'],
                                        'title'   =>  $marquee_title[$i],
                                        'link'    =>  $marquee_link[$i],
                                        'status'  =>  '1'
                                        );
                                        if (empty($marqueeunq[$i])) {
                                            $marquee['uniq'] = random_string('alnum', 16);
                                        } else {
                                            $marquee['uniq'] = $marqueeunq[$i];
                                        }

          
                                        
                                    $output3 = $this->Product_model->marqueeinsert($marquee);
                                }
                            }
                       }


                        if ($brand_title !='') {
                            for ($i=0; $i < count($brand_title) ; $i++) {
                                if ($brand_title[$i] !='' ) {
                                    $brand = array(
                                        'product' =>  $output1['product']['id'],
                                        'title'   =>  $brand_title[$i],
                                        'price'   =>  $brand_price[$i],
                                        'status'  =>  '1'
                                        );
                                        if (empty($brndunq[$i])) {
                                            $brand['brand_uniq'] = random_string('alnum', 16);
                                        } else {
                                            $brand['brand_uniq'] = $brndunq[$i];
                                        }

                                        
                                    $output2 = $this->Product_model->brandinsert($brand);
                                }
                            }
                       }
					}
				}

				}

                if($output1 !='')
                {
                    $this->session->set_flashdata('success', 'Product added  Successfully');
                    redirect('manage-product','refresh');
                }else{
                    $this->session->set_flashdata('error', 'Some error occured please try again');
                    redirect('add-product','refresh');
                }

 		}

 	}

    // product Ratings and feed back from customer
    public function product_ratings()
    {
        $data['title'] = 'Product Ratings';
        if($this->input->get('status')){
            $this->Product_model->updateRatingStatus($this->input->get());
            $this->session->set_flashdata('success', 'Review Successfuly update');
        }
        $data['rating'] = $this->Product_model->product_ratings();
        $this->load->view('Product/rating', $data, FALSE);
        
    }


    // escation list
    public function escalation()
    {
        $data['title'] = 'Product Escalation';
        $data['rating'] = $this->Product_model->escalation();
        $this->load->view('Product/escalation', $data, FALSE);
    }
    


    
    
    

}