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

        '
            
        ';

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

        $msgs = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title></title>
            <!--[if (mso 16)]>
            <style type="text/css">
            a {text-decoration: none;}
            </style>
            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <!--[if !mso]><!-- -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
            <!--<![endif]-->
        </head>
        
        <body>
            <div class="es-wrapper-color">
                <!--[if gte mso 9]>
                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                        <v:fill type="tile" color="#f7f9fb"></v:fill>
                    </v:background>
                <![endif]-->
                <table class="es-wrapper" style="background-position: center top;" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="esd-email-paddings" valign="top">
                                <table class="es-content es-preheader esd-header-popover" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="es-adaptive esd-stripe" esd-custom-block-id="15609" align="center">
                                                <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" align="left">
                                                                <!--[if mso]><table width="560"><tr><td width="268" valign="top"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="268" align="left">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="es-infoblock esd-block-text es-m-txt-c" align="left">
                                                                                                <p><br></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="20"></td><td width="272" valign="top"><![endif]-->
                                                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="272" align="left">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="es-infoblock esd-block-text es-m-txt-c" align="right">
                                                                                                <p><a href="'.base_url().'" target="_blank">View in browser</a></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-header" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" esd-custom-block-id="15610" align="center">
                                                <table class="es-header-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-image es-p20b" align="center">
                                                                                                <a href target="_blank"><img src="'.base_url().'assets/images/img/logo.svg" alt style="display: block;" width="154"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" align="center">
                                                <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                <table style="border-radius: 3px; border-collapse: separate; background-color: rgb(252, 252, 252);" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-m-txt-l es-p30t es-p20r es-p20l" align="left">
                                                                                                <h2 style="color: #333333;">Welcome!</h2>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                                                <p>Hi Alison, we’re glad you’re here! You can enjoy purchases and discover new discounts every week. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p30t es-p20r es-p20l" style="background-color: rgb(252, 252, 252);" esd-custom-block-id="15791" bgcolor="#fcfcfc" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                <table style="border-color: rgb(239, 239, 239); border-style: solid; border-width: 1px; border-radius: 3px; border-collapse: separate; background-color: rgb(255, 255, 255);" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p20t es-p15b" align="center">
                                                                                                <h3 style="color: #333333;">Your account information:</h3>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="center">
                                                                                                <p style="color: rgb(100, 67, 74); font-size: 16px; line-height: 150%;">Login: xxxxxxx</p>
                                                                                                <p style="color: rgb(100, 67, 74); font-size: 16px; line-height: 150%;">Email: xxxx@xxxxxxxxxx</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-button es-p20t es-p20b es-p10r es-p10l" align="center"> <span class="es-button-border" style="background: rgb(248, 243, 239) none repeat scroll 0% 0%;"> <a href="https://viewstripo.email/" class="es-button" target="_blank" style="background: rgb(248, 243, 239) none repeat scroll 0% 0%; border-color: rgb(248, 243, 239);">Log In Now</a> </span> </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" align="center">
                                                <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                <table style="background-color: rgb(255, 244, 247);" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff4f7">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p20t es-p5b es-p20r es-p20l" align="center">
                                                                                                <h3>Lets get social</h3>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" style="background-color: rgb(102, 102, 102);" esd-custom-block-id="15624" bgcolor="#666666" align="center">
                                                <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                <table style="background-color: rgb(255, 244, 247); border-radius: 3px; border-collapse: separate;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff4f7">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-spacer es-p5t es-p5b es-p20r es-p20l" bgcolor="#fff4f7" align="center">
                                                                                                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="border-bottom: 1px solid rgb(255, 244, 247); background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-social es-p5t es-p25b es-p20r es-p20l" align="center">
                                                                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a target="_blank" href="https://viewstripo.email/"><img title="Facebook" src="https://mcfml.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" width="32"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a target="_blank" href="https://viewstripo.email/"><img title="Twitter" src="https://mcfml.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Tw" width="32"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a target="_blank" href="https://viewstripo.email/"><img title="Instagram" src="https://mcfml.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png" alt="Inst" width="32"></a>
                                                                                                            </td>
                                                                                                            <td class="es-p10r" valign="top" align="center">
                                                                                                                <a target="_blank" href="https://viewstripo.email/"><img title="Youtube" src="https://mcfml.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png" alt="Yt" width="32"></a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="es-footer esd-footer-popover" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" style="background-color: rgb(102, 102, 102);" esd-custom-block-id="15625" bgcolor="#666666" align="center">
                                                <table class="es-footer-body" style="background-color: rgb(102, 102, 102);" width="600" cellspacing="0" cellpadding="0" bgcolor="#666666" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>
        ';

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

