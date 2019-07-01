<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_search');
        $this->uid = $this->session->userdata('sid');
        $this->load->library('pagination');
    }
    
    // search suggetion
    public function index()
    {
        $data = ''; $title =''; $subTitle = '';$url = '';

        $query = $this->input->get('q');
        $result = $this->m_search->getResult($query);
        // set result
        if(!empty($result)){
            foreach ($result as $key => $value) {
                $title = $value->title;
                $subTitle = $value->name;
                $url = 'search?q='.$query;
    
                $data .= '<li class="sg-result-list">';
                $data .= '<a href="'.$url.'">';
                $data .= '<div class="sgrl-item-title"><span>'.$title.'</span></div>';
                $data .= '<div class="sgrl-item-category"><span>'.$subTitle.'</span></div>';
                $data .= '</a> </li>';
            }
        }else{
            $data .= '<li class="sg-result-list"><div class="sgrl-item-title"><span>No result found</span></div></li>';
        }
        echo $data;        
    }

    // search product
    public function search($page = 1)
    {
        $perpage = 16;
        $data['breadcrumbs'] = FALSE;
        $data['title'] = $this->input->get('q');

        $query = $this->input->get('q');
        $data = $this->m_search->getResult($query);
        $result =  $this->m_search->search_pagination($query,$perpage,$page);

        $config['base_url'] = base_url().'search';
        $config['total_rows'] = count($data);
        $config['per_page'] = 16;
        $config['reuse_query_string'] = TRUE;

        $config['full_tag_open']    = '<div class="style1"> <ul class="flat-pagination style1">';
        $config['full_tag_close']   = '</ul></div>';

        $config['num_tag_open']     = '<li ><span class="waves-effect">';
        $config['num_tag_close']    = '</span></li>';

        $config['cur_tag_open']     = '<li class="active"><a class="waves-effect">';
        $config['cur_tag_close']    = '</a></li>';

        $config['next_tag_open']    = '<li class="next"> <a href="#" title=""> ';
        $config['next_tag_close']   = '</a></li>';
        $config['next_link']        = 'Next Page <img src="'.base_url().'assets/images/icons/right-1.png" alt="">';

        $config['prev_tag_open']    = '<li class="prev"> <a href="#" title=""> ';
        $config['prev_tag_close']   = '</a></li>';
        $config['prev_link']        = '<img src="'.base_url().'assets/images/icons/left-1.png" alt=""> Prev Page';


        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close']  = '</span></li>';

        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']   = '</span></li>';
        
        $this->pagination->initialize($config);
        
        $data['pagelink'] = $this->pagination->create_links();
        $data['result'] = $result;

        $this->load->view('pages/result', $data, FALSE);
        
    }

    // single product
    public function product_detail($id = null)
    {
        $data['product'] = $this->m_search->single_product($id);
        $data['breadcrumbs'] = FALSE;
        $data['title'] = $data['product']->title;
        $data['brand'] = $this->m_search->brand_product($data['product']->id);
        $this->load->view('pages/product-detail', $data, FALSE);
    }
}

/* End of file Search.php */
