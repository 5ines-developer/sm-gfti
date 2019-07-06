<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

    /*--construct--*/
	function __construct() {
        parent::__construct();
        $this->load->model('Offers_model');
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
     * Offers -> add Offer load view page
     * url : add-offers
     */
    public function index()
    {
        $data['title'] = 'Add Offers - Siemens';
        $this->load->view('offers/add-offers',$data);
    }


    /**
	 * Offers -> Insert offers data 
	 * @url : insert-banner
	 * @param : position,uniq,image,link
	 * 
	 */
    public function add_offer($value='')
    {
            $position   = $this->input->post('position');
            $uniq       = $this->input->post('uniq');
            $link       = $this->input->post('link');

            if ($position == '1' || $position == '2') {
               $width = '360';
               $height = '200';
            }else if ($position == '3') {
                $width = '785';
                $height = '241';
            }else if ($position == '4') {
                $width = '400';
                $height = '475';
            }else{
                $width = '';
                $height = '';
            }

            $files = $_FILES;
            $filesCount = count($_FILES['offerimage']['name']);
            if(file_exists($_FILES['offerimage']['tmp_name'])) {
            $config['upload_path']          = '../offers-image/';
            $config['allowed_types']        = 'jpg|png|jpeg';                
            $config['max_width']            = 0;
            $config['max_width']            = 0;
            $config['encrypt_name']         = TRUE;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
            if ( ! $this->upload->do_upload('offerimage'))
            {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('add-offers');
            }
            else
            {
                $upload_data = $this->upload->data();

                $config['image_library']    =   'gd2';
                      $config['source_image']     =   $upload_data['full_path'];
                      $config['create_thumb']     =   TRUE;
                      $config['width']            =   $width;
                      $config['height']           =   $height;

                      $this->load->library('image_lib', $config);
                      $this->image_lib->resize();
                      $file_name      =   $upload_data['file_name'];        
                      $file_tumb      =   $upload_data['raw_name'];       
                      $file_tumb_ex   =   $upload_data['file_ext'];                      
                      $thum_file      =   $file_tumb.'_thumb'.$file_tumb_ex;
                
            }
            }

            $insert =  array(
                'link'     =>  $link,
                'position'  =>  $position,
                'uniq'      =>  $uniq
            );
            if(file_exists($_FILES['offerimage']['tmp_name'])) {
                $insert['image']      =  'offers-image/'.$thum_file ;
            }

            
           $output = $this->Offers_model->insert($insert);
            if($output !='')
            {
                $this->session->set_flashdata('success', 'Offers added  Successfully');
                redirect('manage-offers','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('add-offers','refresh');
            }
    }


    /**
     * Offers -> manage Offer
     * url : manage-offers
     */
    public function manage_offers()
    {
        $data['title'] = 'Add Offers - Siemens';
        $data['offer'] = $this->Offers_model->getoffer();
        $this->load->view('offers/manage-offers',$data);
    }

    /**
    * domain -> delete domain
    * url : delete-domain
    * @param : id
    */
        public function delete_offers($id='')
        {
                // send to model
                if($this->Offers_model->deleteoffer($id)){
                    $this->session->set_flashdata('success', 'Offers Deleted Successfully');
                    redirect('manage-offers','refresh'); // if you are redirect to list of the data add controller name here
                }else{
                    $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                    redirect('manage-offers','refresh'); // if you are redirect to list of the data add controller name here
                }
        }


    /**
         * Domain -> Edit domain
         * url : edit-domain
         * @param : id
        */
        public function edit_offers($id='')
        { 
            $data['title']     = 'Edit Offers - Siemens';
            $data['offers']    = $this->Offers_model->edit_Offers($id);
            $this->load->view('offers/add-offers',$data);
        }



    


}