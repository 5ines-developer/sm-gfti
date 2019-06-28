<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_web');
        $this->uid = $this->session->userdata('sid');
    }
    

    public function index()
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Change password';
        $data['categoryProduct'] = $this->categoryProduct();

        exit;
        $this->load->view('pages/index', $data, FALSE);
        
    }

    // categoryProduct
    public function categoryProduct()
    {
        $data = $this->m_web->getCategoryProduct();
        return  $data;
    }

}

/* End of file Web.php */
