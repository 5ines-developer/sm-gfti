<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sid') == ''){ redirect('login','refresh'); }
        $this->load->model('m_account');
        
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

}

/* End of file account.php */
