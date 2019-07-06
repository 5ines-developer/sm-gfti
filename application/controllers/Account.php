<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_account');
        $this->uid = $this->session->userdata('sid');
    }
    
    //  profile
    public function index()
    {
        $data['breadcrumbs'] = false;
        $data['title'] = 'Account';
        $uid = $this->session->userdata('sid');

        $input = $this->input->post();
        if(count($input) > 0){
            $this->form_validation->set_rules('name', 'Name', 'trim');
            $this->form_validation->set_rules('email', 'Email address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $datas  = array( 'name' =>$input['name'] , 'email' => $input['email'], 'phone' => $input['phone'] );
                if($this->m_account->updateProfile($datas, $uid)){
                    $this->session->set_flashdata('success', 'Change are updated');
                    redirect('account','refresh');
                }else{
                    $this->session->set_flashdata('error', 'No Changes updated');
                    redirect('account','refresh');
                }
                
            } else {
                redirect('account','refresh');
            }
            
            
        }else{
            $data['profile'] = $this->m_account->profileGet($uid);
            $this->load->view('account/account', $data, FALSE);
        }

    }

    // change password
    public function change_psw()
    {
        $data['breadcrumbs'] = FALSE;
        $data['title'] = 'Change password';
        $uid = $this->session->userdata('sid');

        $input = $this->input->post();
        if (count($input) > 0) {

            $this->form_validation->set_rules('opsw', 'Current Password', 'trim|required|callback_checkpsw_check');
            $this->form_validation->set_rules('npsw', 'Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('cpsw', 'Password Confirmation', 'trim|required|matches[npsw]');

            if ($this->form_validation->run() == TRUE) {

                $hash 		= $this->bcrypt->hash_password($input['npsw']);
                $datas = array('psw' => $hash);
                if($this->m_account->changePassword($datas, $uid, $input['opsw'])){
                    $this->session->set_flashdata('succes', 'Your password has been reset successfully');
                    redirect('change-psw','refresh');
                }else{
                    $this->session->set_flashdata('error', 'Invalid Current password!');
                    redirect('change-psw','refresh');
                }

            } 
            else {
                $this->load->view('account/change-psw', $data, FALSE);
            }
        } 
        else {
            $this->load->view('account/change-psw', $data, FALSE);
        }
        
    }

    // psw check function
    public function checkpsw_check($psw)
    {
        if ($this->m_account->checkpsw($psw)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkpsw_check', 'Invalid {field}');
            return FALSE;
        }
        
    }

    // shipping
    public function shipping_address()
    {
        $this->load->model('m_cart');
        $data['shipping'] = $this->m_cart->getShipping($this->uid);
        $this->load->view('pages/shipping', $data, FALSE);
        
    }

    // get single shipping
    public function shipping_address_edit($id = null)
    {
        $data['shipping'] = $this->m_account->singleShipping($id);
        $this->load->view('pages/shipping-edit', $data);
        
    }

    // update
    public function shipping_address_update()
    {
        $input = $this->input->post();   
        $data = array(
           'name'       => $input['name'], 
           'street'     => $input['street'], 
           'street1'    => $input['street1'], 
           'religion'   => $input['state'], 
           'city'       => $input['city'], 
           'zip_code'   => $input['zip'], 
           'employee'   => $this->uid, 
           'status'     => 1,
           'phone'      =>  $input['phone'],
        ); 

        if($this->m_account->shippingUpdate($data, $input['id'])){
            $this->session->set_flashdata('success', 'Shipping address successfuly updated');
            redirect('shipping-address','refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('shipping-address-edit/'.$input['id'],'refresh');
        }
    }

}

/* End of file account.php */
