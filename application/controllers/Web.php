<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->uid = $this->session->userdata('sid');
        $this->load->model('m_cart');
        $this->data['cart_item'] = $this->m_cart->cart_item($this->session->userdata('sid'));
        $this->load->model('m_web');
        $this->data['categories'] = $this->m_web->categories();
        
    }
    
    

    public function index()
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Change password';
        $data['categoryProduct'] = $this->categoryProduct();
        $data['recent'] = $this->recently_added_products();
        $data['ourproduct'] = $this->ourProducts();
        $data['banner'] = $this->bannerGet();
        $data['offer'] = $this->offerGet();
        $this->load->view('pages/index', $data, FALSE);
        
    }

    // categoryProduct
    public function categoryProduct()
    {
        $data = $this->m_web->getCategoryProduct();
        return  $data;
    }

    // recently added product   
    public function recently_added_products($var = null)
    {
       $data = $this->m_web->recently_added_products();
       return $data;
    }

    // home pge randum datas
    public function ourProducts($var = null)
    {
        $data = $this->m_web->ourProducts();
        return $data;
    }

    // slect category
    public function category($var = null)
    {
        $data = $this->m_web->category();
        return $data;
    }

    // fetch banner
    public function bannerGet($var = null)
    {
        $data = $this->m_web->getBanner();
        return $data;
    }

        // fetch offer images
        public function offerGet($var = null)
        {
            $data = $this->m_web->getoffer();
            return $data;
        }

}

/* End of file Web.php */
