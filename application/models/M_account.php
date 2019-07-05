<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {

    // get profile detail
    public function profileGet($uid)
    {
        return $this->db->where('id', $uid)->get('employee')->row_array();
    }

    //  update profile
    public function updateProfile($datas, $uid)
    {
        $this->db->where('id', $uid)->where('email', $datas['email'])->update('employee', $datas);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }    
    }

    // check pasw
    public function checkpsw($psw)
    {
        $this->db->where('id', $this->session->userdata('sid'));  
        $result = $this->getUsers($psw);
 
        if (!empty($result)) {
           return true;
        } 
        else {
           return false;
        } 
    }

    // check password
    function getUsers($password) {
        $query = $this->db->get('employee');
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            if ($this->bcrypt->check_password($password, $result['psw'])) {
                return $result;
            } 
            else {
                return array();
            }
        } 
        else{
            return array();
        }
    } 

    // change password
    public function changePassword($datas, $uid, $opsw)
    {
        $this->db->where('id', $uid)->update('employee', $datas);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    // get shipping addres
    public function singleShipping($id = null)
    {
        return $this->db->where('id', $id)->get('shipping_address')->row();
        
    }

    // update shipping address
    public function shippingUpdate($data, $id)
    {
        $this->db->where('id', $id)->update('shipping_address', $data);
        if( $this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file M_account.php */
