<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends AppController {

    function __construct() {
            parent::__construct();
      }

      public function manageAuthentication()
      {
            $publicUri = array("login", "registrationStepOne", "registrationStepTwo", "registrationStepThree", "registrationPaymentVerification");
            $currentMethod = $this->router->fetch_method();
            if (!in_array($currentMethod, $publicUri)) {
                  $this->checkContractor();
            }
      }

      public function index()
      {
            $this->viewData["pageTitle"] = "Contractor - Home";
            $state = $this->User_model->getContractorDetailsByID($this->getSession("user_id"), $this->getSession("user_role"));
            $this->viewData['leadList'] = $this->Project_model->getAvailableLeadsForBidByTradeId($this->getSession("user_id"), $state['trade_id'],$state['state_id']);
            $this->showContractorView("index");
      }

      public function registrationStepOne()
      {
            if (!isset($_SESSION['registrationStepOneSubmit'])) {
                  session_destroy();
            }
            $this->load->view("contractor/registration_step_one", $this->viewData);
      }

      public function registrationStepTwo()
      {
            if (isset($_POST['registrationStepOneSubmit'])) {
                  $_SESSION = $_POST;
                  if ($_FILES['profileImage']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("profileImage")) {
                              $this->setSession("error", $this->upload->display_errors());
                              redirect("contractor/registrationStepOne");
                        } else {
                              $uploadData = $this->upload->data();
                              $_SESSION['profile_picture_url'] = $uploadData['file_name'];
                        }
                  } else {
                        $_SESSION['profile_picture_url'] = "avatar.png";
                  }
            } elseif (isset($_SESSION['project_capabilities'])) {
                  //do nothing, it has been redirected from step-3
            } else
                  redirect("contractor/registrationStepOne");
            $this->load->view("contractor/registration_step_two", $this->viewData);
      }

      public function registrationStepThree()
      {
            $userDbData = array();
            $contractorDbData = array();
            if (isset($_POST['registrationStepTwoSubmit'])) {
                  $_SESSION = array_merge($_SESSION, $_POST);
                  if ($_FILES['trade_license']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("trade_license")) {
                              $this->setSession("error", $this->upload->display_errors());
                              redirect("contractor/registrationStepTwo");
                              exit();
                        } else {
                              $uploadData = $this->upload->data();
                              $_SESSION['trade_license_url'] = $uploadData['file_name'];
                        }
                  } else {
                        $_SESSION['trade_license_url'] = "";
                  }

                  if ($_FILES['insurance_certificate']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("insurance_certificate")) {
                              $this->setSession("error", $this->upload->display_errors());
                              redirect("contractor/registrationStepTwo");
                              exit();
                        } else {
                              $uploadData = $this->upload->data();
                              $_SESSION['insurance_certificate_url'] = $uploadData['file_name'];
                        }
                  } else {
                        $_SESSION['insurance_certificate_url'] = "";
                  }
                  
            } elseif (isset($_POST['registrationStepThreeSubmit'])) 
            {
                  $_SESSION = array_merge($_SESSION, $_POST);
                  $password = $this->input->post("password");
                  $rePassword = $this->input->post("rePassword");
                  if(!filter_var($this->input->post("email_address"), FILTER_VALIDATE_EMAIL))
                  {
                        $this->setSession("error", "The email address is not valid!");
                  }
                  else 
                    {
                        $tra_id = $this->input->post("trade_id"); 
                        if(empty ($tra_id) || count($tra_id) < 0 || !is_array($tra_id)){
                            $this->setSession("error", "The Trade is required and can't be empty!");
                        }
                        else
                        {
                            if ($password != $rePassword) {
                            $this->setSession("error", "Two passwords must be same!");
                            }
                            else
                            {
                                $hashedPassword = $this->hashString($password);
                                $userDbData['password'] = $hashedPassword;
                                $userDbData['email_address'] = $_SESSION['email_address'];
                                $userDbData['address_line_1'] = $_SESSION['address_line_1'];
                                $userDbData['address_line_2'] = $_SESSION['address_line_2'];
                                $userDbData['state_id'] = $_SESSION['state'];
                                $userDbData['user_role'] = "Contractor";
                                $userDbData["account_status"] = "Active";
                                if (isset($_SESSION['trade_id'])) {
                                      $contractorDbData['trade_id'] = implode(',', $_SESSION['trade_id']);
                                }
                                $contractorDbData['business_name'] = $_SESSION['business_name'];
                                $contractorDbData['abn_number'] = $_SESSION['abn_number'];
                                $contractorDbData['director_name'] = $_SESSION['director_name'];
                                $contractorDbData['industry'] = $_SESSION['industry'];
                                $contractorDbData['office_number'] = $_SESSION['office_number'];
                                $contractorDbData['mobile_number'] = $_SESSION['mobile_number'];
                                $contractorDbData['website'] = $_SESSION['website'];
                                $contractorDbData['profile_picture_url'] = $_SESSION['profile_picture_url'];
                                $contractorDbData['trade_license_url'] = $_SESSION['trade_license_url'];
                                $contractorDbData['insurance_certificate_url'] = $_SESSION['insurance_certificate_url'];
                                $contractorDbData['project_capabilities'] = $_SESSION['project_capabilities'];
                                $contractorDbData['legal_option'] = isset($_SESSION['legal_option']) ? $_SESSION['legal_option'] : "";
                                $contractorDbData['membership_plan_id'] = 3; // free-trial membership by default //
                                $contractorDbData['membership_activated_on'] = date("Y-m-d H:i:s");
                                $contractorDbData['membership_expires_on'] = date('Y-m-d H:i:s', strtotime('+30 days'));
                                
                                $result = $this->User_model->addContractorAndGetID($userDbData, $contractorDbData);
                                if ($result === -1) {
                                      $this->setSession("error", "Email address already exisits!");
                                } else if (!$result) {
                                      $this->setSession("error", "There was a problem in registration, please try again!");
                                } else {
                                      /* Sending out Email when some one sign up  */
                                      $params = array();
                                      $params['recipient'] = $userDbData['email_address'];
                                      $params['subject'] = 'IWTB - Congratulations, Your registration has been completed successfully for a Free-Trial!';
                                      $params['attached_file'] = '';
                                      $mail_data = array(
                                                     'contractor_name' => $contractorDbData['business_name'],
                                                     'email' => $userDbData['email_address'],
                                                     'password' => $password
                                      );
                                      $message = $this->load->view("contractor_signup_template", $mail_data, TRUE);
                                      $params['message'] = $message;
                                      $output = $this->Mail_model->sendEmail('mail', $params);
        
                                      $this->setSession("success", "Please check your email for details!");
                                      header("Location: " . base_url());
                                      exit();
                                } 
                            }
                        }                            
                    }                       
                  
                }                  
            else {
                  redirect("contractor/registrationStepTwo");
            }
            $this->viewData['tradeList'] = $this->Trade_model->getList();
            /*get state*/
            $this->viewData['state'] = $this->State_model->getList();
            $this->load->view("contractor/registration_step_three", $this->viewData);
      }

      public function upgradeMembership()
      {

            $this->viewData["pageTitle"] = "Membership Upgrade";
            $userDetails = $this->User_model->getContractorDetailsByID($this->getSession("user_id"), $this->getSession("user_role"));

            if (isset($_POST["buttonSubmit"])) {
                  /* transaction step */
                  $this->load->library("app_eway_payment");
                  $transactionData["user_id"] = $userDetails["user_id"];
                  $transactionData['first_name'] = $userDetails['business_name'];
                  $transactionData["last_name"] = $userDetails['director_name'];
                  $transactionData['email_address'] = $userDetails['email_address'];
                  $transactionData['paymentDescription'] = "Payment For Membership Fee";
                  $transactionData['membership_plan_id'] = $this->input->post("membership_plan_id", true);

                  $txnCreationResult = $this->app_eway_payment->createMembershipFirstTimeTransaction($transactionData);

                  if ($txnCreationResult['responseStatus']) {
                        $contractorDbData = array();
                        $contractorDbData['access_code'] = $txnCreationResult['data']->AccessCode;

                        $this->User_model->updateContractor(array(), array("access_code" => $contractorDbData['access_code']), $userDetails["user_id"]);
                        //////// add payment info details to the DB, for later checking purposes //
                        $transactionDbData = array();
                        $transactionDbData["access_code"] = $contractorDbData['access_code'];
                        $transactionDbData["isTokenPayment"] = 1;
                        $transactionDbData["invoiceDescription"] = $txnCreationResult['data']->Payment->InvoiceDescription;
                        $transactionDbData["currencyCode"] = $txnCreationResult['data']->Payment->CurrencyCode;
                        $transactionDbData["user_id"] = $txnCreationResult['data']->Customer->Reference;
                        $transactionDbData["payment_for"] = "Membership_fee";
                        $this->Payment_details_model->add($transactionDbData);
                        // ------------- DONE ------------------------------------------------------ //
                        header("Location:" . $txnCreationResult['data']->SharedPaymentUrl);
                        exit();
                  } else {
                        $this->setSession("error", $txnCreationResult['ErrorMessage']);
                  }
                  /* end of transaction */
            }
            $this->load->view("contractor/upgrade_membership", $this->viewData);
      }

      public function membershipUpgradePaymentVerification()
      {

            if (isset($_GET['AccessCode'])) {
                  $this->load->library("app_eway_payment");

                  $accessCode = $_GET['AccessCode'];
                  $transactionResult = $this->app_eway_payment->queryTransaction($_GET['AccessCode']);

                  if ($transactionResult['responseStatus']) {
                        $contractorDetails = $this->User_model->getContractorDetailsByAccessCode($accessCode);

                        if (isset($contractorDetails['membership_activated_on'])) {
                              //------- update payment details table and user table --------------------------------//
                              $tnxData = array();
                              $tnxData['transaction_id'] = $transactionResult['data']->TransactionID;
                              $tnxData['totalAmount'] = $transactionResult['data']->TotalAmount;
                              $tnxData['tokenCustomerID'] = $transactionResult['data']->TokenCustomerID;
                              $membershipPlanId = $transactionResult['data']->Options[0]["Value"];
                              $txnUpdateResult = $this->Payment_details_model->update($tnxData, array("access_code" => $accessCode));

                              if ($txnUpdateResult) {
                                    $contractorUpdateResult = $this->User_model->updateContractor(array("account_status" => "Active"), array("membership_expires_on" => date('Y-m-d H:i:s', strtotime('+1 months')), "membership_plan_id" => $membershipPlanId, "tokenCustomerID" => $transactionResult['data']->TokenCustomerID), $contractorDetails["user_id"]);
                              }
                              //------------ DONE ------------------------------------------------------//
                              if (isset($contractorUpdateResult) && $contractorUpdateResult) {
                                    /* Sending out Email when some one sign up  */
                                    $params = array();
                                    $params['recipient'] = $contractorDetails['email_address'];
                                    $params['subject'] = 'IWTB - Membership has been upgraded.';
                                    $params['attached_file'] = '';
                                    $mail_data = array(
                                                   'contractor_name' => $contractorDetails['business_name'],
                                                   'email' => $contractorDetails['email_address']
                                    );
                                    $message = $this->load->view("email_template/contractor_membership_upgrade", $mail_data, TRUE);
                                    $params['message'] = $message;
                                    $output = $this->Mail_model->sendEmail('mail', $params);

                                    $this->setSession("success", "Your membership has been upgraded successfully, please check your email for details!");
                                    header("Location: " . base_url());
                                    exit();
                              } else {
                                    $this->setSession("error", "There was a problem in your membership upgrade!");
                              }
                        } else {
                              $this->setSession("error", "The access code seems to be Invalid!");
                        }
                  } else {
                        $this->setSession("error", "There was a problem in getting transaction details!");
                  }
            }
      }

      public function myECard()
      {
                 
            $this->viewData["pageTitle"] = "Contractor - My E-Card";
            $this->viewData['feedbackList'] = $this->Project_bid_model->getContractorFeedbackList($this->getSession("user_id"));
            $this->viewData['info_user'] = $this->Project_bid_model->get_user($this->getSession("user_id"));
            $this->viewData['tradeList'] = $this->Trade_model->getList();                  
            if(isset($this->viewData['info_user']) && count($this->viewData['info_user']) > 0)
            {                
                  $this->viewData['user_trade_id'] = explode(',', $this->viewData['info_user'][0]['trade_id']);            
            }            
            else
                 $this->viewData['user_trade_id'] = array();            
            $this->showContractorView("my_e_card");
      }

      public function updateProfile()
      {
            $userDbData = array();
            $contractorDbData = array();
            $this->viewData["pageTitle"] = "Contractor - Update Profile";

            if (isset($_POST['submitButton'])) {
                  $passwordError = false;
                  $fileUploadError = false;

                  $userDbData['address_line_1'] = $_POST['address_line_1'];
                  $userDbData['address_line_2'] = $_POST['address_line_2'];
                  $userDbData['state_id'] = $_POST['state'];
                  
                  $password = $this->input->post("password");
                  $rePassword = $this->input->post("rePassword");
                  if (strlen($password) != 0 || strlen($rePassword) != 0) {
                        if ($password != $rePassword) {
                              $this->setSession("error", "Two passwords must be same!");
                              $fileUploadError = true;
                        } else {
                              $userDbData['password'] = $this->hashString($password);
                        }
                  }
                  if ($_FILES['profileImage']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $new_name = time() . $_FILES["profileImage"]['name'];
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("profileImage")) {
                              $this->setSession("error", $this->upload->display_errors());
                              $fileUploadError = true;
                        } else {
                              $uploadData = $this->upload->data();
                              $oldProfilePic = $this->getSession("profile_picture_url");
                              $contractorDbData['profile_picture_url'] = $uploadData['file_name'];
                              $this->setSession("profile_picture_url", $uploadData['file_name']);
                        }
                  }

                  if ($_FILES['trade_license']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $new_name = time() . $_FILES["trade_license"]['name'];
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("trade_license")) {
                              $this->setSession("error", $this->upload->display_errors());
                              $fileUploadError = true;
                        } else {
                              $uploadData = $this->upload->data();
                              $oldTradeLicense = $this->getSession("trade_license_url");
                              $contractorDbData['trade_license_url'] = $uploadData['file_name'];
                        }
                  }

                  if ($_FILES['insurance_certificate']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $new_name = time() . $_FILES["insurance_certificate"]['name'];
                        $config['file_name'] = $new_name;
                        $config['overwrite'] = false;

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload("insurance_certificate")) {
                              $this->setSession("error", $this->upload->display_errors());
                              $fileUploadError = true;
                        } else {
                              $uploadData = $this->upload->data();
                              $oldInsuranceCertificate = $this->getSession("insurance_certificate_url");
                              $contractorDbData['insurance_certificate_url'] = $uploadData['file_name'];
                        }
                  }

                  if (!$passwordError && !$fileUploadError) {
                        $contractorDbData['business_name'] = $_POST['business_name'];
                        $contractorDbData['abn_number'] = $_POST['abn_number'];
                        $contractorDbData['director_name'] = $_POST['director_name'];
                        $contractorDbData['industry'] = $_POST['industry'];
                        $contractorDbData['office_number'] = $_POST['office_number'];
                        $contractorDbData['mobile_number'] = $_POST['mobile_number'];
                        $contractorDbData['website'] = $_POST['website'];
                        $contractorDbData['project_capabilities'] = $_POST['project_capabilities'];
                        $contractorDbData['legal_option'] = isset($_POST['legal_option']) ? $_POST['legal_option'] : "";

                        $result = $this->User_model->updateContractor($userDbData, $contractorDbData, $this->getSession("user_id"));
                        if ($result === -1) {
                              $this->setSession("error", "Email already exisits!");
                        } else if (!$result) {
                              $this->setSession("error", "Please try again!");
                        } else {
                              // delete old files pic from server to reduce load //
                              if (isset($oldProfilePic) && $oldProfilePic != "") {
                                    if (file_exists("./uploads/{$oldProfilePic}"))
                                          unlink("./uploads/{$oldProfilePic}");
                              }

                              if (isset($oldTradeLicense) && $oldTradeLicense != "") {
                                    if (file_exists("./uploads/{$oldTradeLicense}"))
                                          unlink("./uploads/{$oldTradeLicense}");
                              }

                              if (isset($oldInsuranceCertificate) && $oldInsuranceCertificate != "") {
                                    if (file_exists("./uploads/{$oldInsuranceCertificate}"))
                                          unlink("./uploads/{$oldInsuranceCertificate}");
                              }
                              /* update business_name */
                              $this->setSession("business_name", $contractorDbData['business_name']);
                              $this->setSession("success", "Profile has been updated successfully!");
                        }
                  }
            }

            $this->viewData['contractorDetails'] = $this->User_model->getContractorDetailsByID($this->getSession("user_id"), $this->getSession("user_role"));
            // saving in session to delete old files if contractor uploads new file, session is used to make one less query//
            $this->setSession("trade_license_url", $this->viewData['contractorDetails']['trade_license_url']);
            $this->setSession("insurance_certificate_url", $this->viewData['contractorDetails']['insurance_certificate_url']);
            
            $this->viewData['tradeList'] = $this->Trade_model->getList();                  
            if(isset($this->viewData['contractorDetails']) && count($this->viewData['contractorDetails']) > 0)
            {                
                  $this->viewData['user_trade_id'] = explode(',', $this->viewData['contractorDetails']['trade_id']);            
            }            
            else
                 $this->viewData['user_trade_id'] = array();   
                 
            /*get state*/
            $this->viewData['state'] = $this->State_model->getList();
            $this->showContractorView("update_profile");
      }

      public function myMembership()
      {
            $this->viewData["pageTitle"] = "Contractor - My Membership Plan";
            $member_level = '';
            $expirite_day = '';
            if($this->getSession("membership_plan_id") == 3) {
                $member_level = 'Free Trial';
                $expirite_day = $this->getSession("membership_expires_on");
                
            }
            $this->viewData["member_level"] =  $member_level;
            $this->viewData["expirite_day"] =  $expirite_day;
            $this->showContractorView("my_membership");
      }

      public function logout()
      {
            session_destroy();
            redirect(base_url() . "login");
            exit();
      }

}
