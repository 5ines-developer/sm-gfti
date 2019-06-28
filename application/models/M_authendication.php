<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_authendication extends CI_Model {

    // registration
    public function register($data = null)
    {
        $this->db->insert('employee', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }        
    }

    //  account activation
    public function activateAccount($regid, $newRegid)
    {
        $this->db->select('id');
        $this->db->where('ref_link', $regid);
        $result = $this->db->get('employee');
        
        if($result->num_rows() >= 1){
            $update =  array('ref_link' => $newRegid, 'is_active' => '1', 'updated_on' => date('Y-m-d H:i:s'));
            $this->db->where('ref_link', $regid);
            $this->db->update('employee', $update);
            return true;            
        }else{
            return false;
        }
    }

    //  login
    function can_login($username, $password)  
    {  
       $this->db->where('email', $username);  
       $this->db->where('is_active', '1');  
       // $this->db->where('password', $password);
        $result = $this->getUsers($password);

        if (!empty($result)) {
          return $result;
        } 
        else {
            return null;
        }  
    }

    // check password
    function getUsers($password) {
        $query = $this->db->get('employee');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            if ($this->bcrypt->check_password($password, $result['psw'])) {
                //We're good
                return $result;
            } 
            else {
                //Wrong password
                return array();
            }
        } 
        else{
            return array();
        }
    } 

    // forgot password
    public function forgotPassword($email)
    {
        $this->db->select('ref_link');
        $this->db->where('email', $email);
        $result = $this->db->get('employee');
        if($result->num_rows() > 0){
            $ref = $result->row_array();
            return $ref['ref_link'];
        }else{
            return false;
        }  
    }
    

    // forgot passwor set
    public function forgot_password_set($regid)
    {
        $this->db->where('ref_link', $regid);
        $result = $this->db->get('employee');
        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //  check the email is exist
    public function isEmail($str)
    {
        $this->db->where('email', $str);
        $result = $this->db->get('employee');
        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }

    // password reset
    public function setPassword($datas, $email)
    {
        $this->db->where('email', $email);
        $query = $this->db->update('employee', $datas);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }





}

/* End of file M_authendication.php */
