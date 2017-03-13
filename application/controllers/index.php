<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends AppController {

    function __construct() {
        parent::__construct();
        $this->load->model("Token_model");
    }

    public function manageAuthentication() {
        $publicUri = array("login");
        $currentMethod = $this->router->fetch_method();
//        if (!in_array($currentMethod, $publicUri)) {
//            $this->checkEmployer();
//        }
    }

    public function index() {
        redirect(base_url().'login');
    }

    public function login() {
        if (isset($_POST['submitButton'])) {
            $email_address = $this->input->post("email_address", true);
            $password = $this->input->post("password");

            $userDetails = $this->User_model->getUserDetailsByEmail($email_address);

            if (count($userDetails) == 0)
                $this->setSession("error", "User email-address does not exist!");
            else if($userDetails["account_status"] != "Active")
            	$this->setSession("error", "Your account is {$userDetails["account_status"]}, please contact to IWTB Team!");
            else if ($userDetails['password'] != $this->hashString($password))
                $this->setSession("error", "Email address and password do not match!");
            else {
                $this->setSession("user_id", $userDetails['user_id']);
                $this->setSession("user_role", $userDetails['user_role']);

                if ($userDetails['user_role'] == "Employer") {
                    $this->setSession("title", $userDetails['title']);
                    $this->setSession("first_name", $userDetails['first_name']);
                    $this->setSession("surename", $userDetails['surename']);
                    $this->setSession("email_address", $userDetails['email_address']);
                    redirect('employer/index');
                    exit();
                } else {
                    
                    if($userDetails['membership_plan_id'] == 3) { // for contractor free-trial membership expiration, contractor will be moved to upgrade membership page// //
                        $baseUrl = base_url();
                        if(strtotime($userDetails['membership_expires_on']) <= time()) {
                            header("Location: {$baseUrl}contractor/upgradeMembership");
                            exit();
                        }
                    }
                    
                    $this->setSession("trade_id", $userDetails['trade_id']);
                    $this->setSession("business_name", $userDetails['business_name']);
                    $this->setSession("profile_picture_url", $userDetails['profile_picture_url']);
                    $this->setSession("email_address", $userDetails['email_address']);
                    $this->setSession("membership_plan_id", $userDetails['membership_plan_id']);
                    $this->setSession("membership_expires_on", $userDetails['membership_expires_on']);
                    
                    redirect('contractor/index');
                    exit();
                }
            }
        }

        $this->load->view("login", $this->viewData);
        session_destroy(); // destroy all sessions used during registration, if its redirected from registration //
    }
    public function generateRandomString($length = 6) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function forgotPassword() {

       if (isset($_POST['submitForgotPassword'])) 
       {

            $email_address = $this->input->post("email_address", true);            

            $userDetails = $this->User_model->getUserDetailsByEmail($email_address);

            if (count($userDetails) == 0)

                $this->setSession("error", "User email-address does not exist!");               

            else
            {       
                /* create token value for this reset  */
                $token_value = $this->generateRandomString(6);
                $token_data = array(
                    'token_key' => 'reset_password',
                    'token_value' => $token_value,                        
                    'user_id' => $userDetails['user_id']                    
                );
                
                $result_insert = $this->Token_model->add($token_data);
                
                if($result_insert)
                {
                     /* Send email to user about new password */
                    $this->setSession("success", "Please check your email for reset password!");
                    
                    $params = array();
                    $params['recipient']  = $userDetails['email_address'];     
                    $params['subject'] = "IWTB - You have requested to reset your password";   
                    $params['attached_file'] = '';
                    
                    $link = base_url().'reset_password/?token='.$token_value;   
                    $mail_data = array(
                                        'link' => $link                                                                           
                                );
                    $message = $this->load->view("forgot_password_template", $mail_data, TRUE);
                    $params['message'] = $message;
                    $output = $this->Mail_model->sendEmail('mail', $params);  
                }
                else
                {
                    $this->setSession("error", "The creating token seesion not completed! Please try again");               
                }
               $this->load->view("login", $this->viewData);  
            }

        }        
             
             $this->load->view("forgot_password", $this->viewData);             
    }
     public function reset_password() {

            $user_id = 0; 
            if(isset($_GET['token']))
            {
                /* Get user id by token value */
                $token_value = $_GET['token'];
                $token  = $this->Token_model->getUserByToken($token_value) ;
                if($token && count($token) > 0)
                {
                    $user_id = $token['user_id'];
                    
                    /*Delete this tolken */
                    $this->Token_model->delete($token['token_id']);
                    
                }
                else
                {
                    $this->setSession("error", "The token value was be incorrected!");
                    $this->load->view("login", $this->viewData);  
                }                
                
            }
            $this->viewData['user_id'] = $user_id;
            if (isset($_POST['submitResetPassword'])) 
            {
            
                $password = $this->input->post("password");    
                $repassword = $this->input->post("re_password");  
                $user_id =   $this->input->post("user_id");               
                $userDetails = $this->User_model->getUserByID($user_id);
                $this->viewData['user_id'] = $user_id;    
                if (count($userDetails) == 0)
                {
                    $this->setSession("error", "User does not exist!");
                    $this->load->view("login", $this->viewData);  
                }
                 else
                 {
                     if ($password != $repassword)                      
                     {
                        $this->setSession("error", "Two passwords must be same!");
                        $this->load->view("reset_password", $this->viewData);     
                     }   
                     else
                     {
                         $new_password = $this->hashString($password);
                         $update_result = $this->User_model->resetPassword($user_id, $new_password);
                         if(!$update_result)
                         {
                             $this->setSession("error", "The reset your password was be failed!");
                             $this->load->view("login", $this->viewData);                               
                         }
                         else
                         {
                            /* Send email to user about new password */
                            $this->setSession("success", "Please check your email for new password!");
                            
                            $params = array();
                            $params['recipient']  = $userDetails['email_address'];     
                            $params['subject'] = "IWTB - Congratulation! Your password has been reset";   
                            $params['attached_file'] = '';   
                            $mail_data = array(
                                                'new_pass' => $password                                       
                                        );
                            $message = $this->load->view("reset_password_template", $mail_data, TRUE);
                            $params['message'] = $message;
                            $output = $this->Mail_model->sendEmail('mail', $params);    
                            
                            $this->load->view("login", $this->viewData);   
                         }     
                      }
                }
           }  
           
           $this->load->view("reset_password", $this->viewData);       
                     
    }

}