<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Authendication extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $data['breadcrumbs'] = false;
        $this->load->helper('string');
        $this->load->library('bcrypt');
        $this->load->model('m_authendication');
    }
    
    // registration
    public function register()
    {
        $this->load->library('form_validation');
        if($this->session->userdata('sid') != ''){ redirect('/','refresh'); }

        $data['breadcrumbs'] = false;
        $data['title'] = 'Register';

        $input = $this->input->post();
        if(count($input) >= 3){
            
            $refid 		= random_string('alnum', 50);
            $phone 		= $this->input->post('phone');
            $password 	= $this->input->post('password');
            $cpassword 	= $this->input->post('cpassword');
            $email 		= $this->input->post('email');
            $hash 		= $this->bcrypt->hash_password($password);
            
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[employee.email]|callback_domailcheck');
            $this->form_validation->set_rules('phone', 'Phone number', 'required|is_unique[employee.phone]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
            if ($this->form_validation->run() == FALSE){
                $this->load->view('web/register', $data, FALSE);
            }
            else{
                $datas = array(
                    'ref_link'  => $refid, 
                    'phone'     => $phone, 
                    'psw'       => $hash, 
                    'email'     => $email, 
                );
                if($this->m_authendication->register($datas)){
                    if($this->sendregister($email, $refid))
                    {
                        $this->session->set_flashdata('success', 'Before you can login, you must active your account with the code sent to your email address.');
                        redirect('login','refresh');
                    }else{
                        $this->session->set_flashdata('error', 'Some error occured! Contact to support team.(mail sending error)');
                        redirect('register','refresh');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Some error occured! Contact to support team');
                    redirect('register','refresh');
                }
            }
        }else{
            $this->load->view('web/register', $data, FALSE);
        }
    }

    public function domailcheck($email = null)
    {
        $exvalue = explode('@',  $email);
        
        if ($this->m_authendication->domain_check($exvalue['1']) == FALSE)
        {
            $this->form_validation->set_message('domailcheck', 'Invalid domain. Please use Comapny email id');
            return FALSE;
        }
        else
        {
            return TRUE;
        }

        exit;
    }


    // account activation
    public function email_verification($var = null)
    {
       $regid = $this->input->get('regid');
       $newRegid = random_string('alnum', 50);
       if($this->m_authendication->activateAccount($regid, $newRegid)){
        $this->session->set_flashdata('success', 'Your account has been activated successfully. You can now login. ');
        redirect('login','refresh');
       }else{
        $this->session->set_flashdata('error', 'Activation link expired!<br> <a href="'.base_url().'resent-activation-code">Resend activation link</a>');
        redirect('login','refresh');
       }
    }

    // login
    public function login($var = null)
    {
        $data['breadcrumbs'] = false;
        $data['title'] = 'Login';
        if($this->session->userdata('sid') != ''){ redirect('/','refresh'); }

        $input = $this->input->post();
        if(count($input) > 0){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
            if ($this->form_validation->run() == FALSE){
                $this->load->view('web/login', $data, FALSE);
            }else{
                $username = $this->input->post('email'); 
				$password = $this->input->post('password'); 
				if($result = $this->m_authendication->can_login($username, $password)) 
					{
						$session_data = array(
							'suser' => $username,
                            'sid' 	=> $result['id'],
						); 
						$this->session->set_userdata($session_data); 
						redirect('authendication/enter'); 
					} 
				else 
					{
						$this->session->set_flashdata('error', 'Invalid Username or Password'); 
						redirect('login');
					}
            }

        }else{
            $this->load->view('web/login', $data, FALSE);
        }
        
    }


    // set login session
    public function enter()
	{
		if($this->session->userdata('sid') != ''){ 
				redirect('');
		} 
		else{
				redirect('login');
		} 
	}

    /* --  logout -- */ 
    public function logout() 
	{
        $session_data = array(
            'suser' => $this->session->userdata('suser'),
            'sid' 	=> $this->session->userdata('sid'),
        ); 
       
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
        $this->session->set_flashdata('succes', 'Successfully Logout');
        
		redirect(base_url());
    } 
    

    // forgot password
    public function forgot_password($var = null)
    {
        $data['breadcrumbs'] = false;
        $data['title'] = 'Forgot password';

        $input = $this->input->post();
        if(count($input) > 0){
            $email = $this->input->post('email');
            if($result = $this->m_authendication->forgotPassword($email)){
                $this->forgotPassworMail($result, $email);
                $this->session->set_flashdata('success', 'Reset Password link has been sent your register email id.'); 
				redirect('forgot-password');
            }else{
                $this->session->set_flashdata('error', 'Invalid email id. Please use register email id'); 
				redirect('forgot-password');
            }
        }else{
            $this->load->view('web/forgotpassword', $data, FALSE);
            
        }
    }

    // forgot password set
    public function forgot_password_set()
    {
        $data['breadcrumbs'] = false;
        $data['title'] = 'Reset password';
        $input = $this->input->post();
        if(count($input) > 0){
            $refid 		= random_string('alnum', 50);
            $password 	= $this->input->post('password');
            $cpassword 	= $this->input->post('cpassword');
            $email 		= $this->input->post('email');
            $hash 		= $this->bcrypt->hash_password($password);
            $olref      = $this->input->post('refid');
            
            $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
            if ($this->form_validation->run() == True){
                $datas = array(
                    'ref_link' => $refid,
                    'psw' => $hash,
                );
                if($this->m_authendication->setPassword($datas, $email)){
                    $this->session->set_flashdata('success', 'Your password has been reset successfully!');
                    redirect('login');
                }else{
                    $this->session->set_flashdata('error', 'Invalid email id');
                    redirect('forgot-password-set?regid='.$olref);
                }
            }else{
                $this->session->set_flashdata('error', 'Invalid email id');
                redirect('forgot-password-set?regid='.$olref);
            }
        }
        else{
            $regid = $this->input->get('regid');
            if($result = $this->m_authendication->forgot_password_set($regid)){
                $this->load->view('web/set-password', $data);
                
            }else{
                $this->session->set_flashdata('error', 'Reset password link has been expaired, Please try again.'); 
                redirect('forgot-password');
            }
        }
        
    }

    //  email confirmation mail
    function sendregister($to='', $regid='')
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = '<!DOCTYPE html> 
        <html> 
        <head> 
            <title>
                
            </title> 
        </head> 

        <body style="background-color:rgb(224, 224, 224)">
        <br><br>
        <center>
            <table width="60%" style="background-color:#ffff"> 
                <tr> 
                    <td>
                        <center> 
                            <h1>Registration Email verification</h1> 
                        </center> 
                    </td>
                </tr> 
                <tr> 
                    <td>
                        <center> 
                            <p style="width: 80%"></p> <br>
                        </center> 
                    </td>
                </tr>
                <tr> 
                    <td>
                        <center><a href="'.base_url().'email-verification?regid='.$regid.'" style="background-color: #009999; color: #fff; height: 15px; padding: 13px 12px;"> Activate Account</a> <br> <br></center>
                    </td>

                </tr> 

                <tr > 
                    <td >
                        <p style="width: 80%"><center>Registration Email verification</center></p><br>
                    </td>
                </tr> 
            </table> 
            </center> 
            <br><br>
        </body> 
        </html>';

		$this->email->set_newline("\r\n");
		$this->email->from($from , 'Gifting Express');
        $this->email->to($to);
        $this->email->subject('Registration verification'); 
        $this->email->message($msg);
     	if($this->email->send())  
        {  
         	return true;
        } 
        else
        {
            return false;
        }
        
    }

    //  email Forgot password
    function forgotPassworMail($regid, $to)
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $msg = '<!DOCTYPE html> 
        <html> 
        <head> 
            <title>
                
            </title> 
        </head> 

        <body style="background-color:rgb(224, 224, 224)">
        <br><br>
        <center>
            <table width="60%" style="background-color:#ffff"> 
                <tr> 
                    <td>
                        <center> 
                            <h1>Forgot password</h1> 
                        </center> 
                    </td>
                </tr> 
                <tr> 
                    <td>
                        <center> 
                            <p style="width: 80%">To Reset your password, Click this below button</p> <br>
                        </center> 
                    </td>
                </tr>
                <tr> 
                    <td>
                        <center><a href="'.base_url().'forgot-password-set?regid='.$regid.'" style="background-color: #009999; color: #fff; height: 15px; padding: 13px 12px;">Change password</a> <br> <br></center>
                    </td>

                </tr> 

                <tr > 
                    <td >
                        <p style="width: 80%"><center>If you did not request a password reset, you can ignore this message; Someone probably typed in your email by accident</center></p><br>
                    </td>
                </tr> 
            </table> 
            </center> 
            <br><br>
        </body> 
        </html>';

		$this->email->set_newline("\r\n");
		$this->email->from($from , 'Gifting Express');
        $this->email->to($to);
        $this->email->subject('Forgot password'); 
        $this->email->message($msg);
     	if($this->email->send())  
        {  
         	return true;
        } 
        else
        {
            return false;
        }
        
    }

    function email_check($str)
    {
            if ($this->m_authendication->isEmail($str) == FALSE)
            {
                $this->form_validation->set_message('username_check', 'The {field} not Valid');
                return FALSE;
            }
            else
            {
                return TRUE;
            }
    }

}

/* End of file Authendication.php */

