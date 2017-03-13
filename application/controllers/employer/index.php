<?php

if (!defined('BASEPATH'))
      exit('No direct script access allowed');

class Index extends AppController {

      function __construct()
      {

            parent::__construct();
      }

      public function manageAuthentication()
      {

            $publicUri = array("login", "registration");

            $currentMethod = $this->router->fetch_method();

            if (!in_array($currentMethod, $publicUri)) {

                  $this->checkEmployer();
            }
      }

      public function index()
      {
            $this->viewData['pageTitle'] = "Employer - Home";
            $this->viewData['projectList'] = $this->Project_model->getList($this->getSession("user_id"));
            $this->showEmployerView("index");
      }

      public function registration()
      {
            $dbUserData = array();
            $dbEmployerData = array();

            if (isset($_POST['submitButton'])) {
                  $dbEmployerData['title'] = $this->input->post("title", true);
                  $dbEmployerData['first_name'] = $this->input->post("first_name", true);
                  $dbEmployerData['surename'] = $this->input->post("surename", true);
                  $dbEmployerData['phone_number'] = $this->input->post("phone_number", true);
                  $dbEmployerData['suburb'] = $this->input->post("suburb", true);
                  $dbEmployerData['post_code'] = $this->input->post("post_code", true);

                  $password = $this->input->post("password");
                  $rePassword = $this->input->post("rePassword");

                  $dbUserData['email_address'] = $this->input->post("email_address", true);
                  $dbUserData['password'] = $this->hashString($password);
                  $dbUserData['address_line_1'] = $this->input->post("address_line_1", true);
                  $dbUserData['address_line_2'] = $this->input->post("address_line_2", true);
                  $dbUserData['user_role'] = "Employer";
                  $dbUserData['state_id'] = $this->input->post("state", true);
                  // check whether two passwords are same or not //
                  if ($password != $rePassword) {
                        $this->setSession("error", "Two passwords must be same!");
                  } else {
                        $result = $this->User_model->addEmployer($dbUserData, $dbEmployerData);
                        if ($result === -1) {
                              $this->setSession("error", "Email already exisits!");
                        } else if (!$result) {
                              $this->setSession("error", "Please try again!");
                        } else {
                              /* Sending out Email when some one sign up  */
                              $params = array();
                              $params['recipient'] = $dbUserData['email_address'];
                              $params['subject'] = 'IWTB - Congratulations, Your registration has been completed.';
                              $params['attached_file'] = '';
                              $mail_data = array(
                                             'employer_name' => $dbEmployerData['title'] . ' ' . $dbEmployerData['first_name'] . ' ' . $dbEmployerData['surename'],
                                             'email' => $dbUserData['email_address'],
                                             'password' => $password
                              );
                              $message = $this->load->view("employer_signup_template", $mail_data, TRUE);
                              $params['message'] = $message;
                              $output = $this->Mail_model->sendEmail('mail', $params);

                              $this->setSession("success", "Please check your email for details!");
                              header("Location: " . base_url());
                              exit();
                        }
                  }
            }
            /*get state*/
            $this->viewData['state'] = $this->State_model->getList();
            $this->load->view("employer/registration", $this->viewData);
      }

      public function myProfile()
      {
            $this->viewData['pageTitle'] = "Employer - Profile";
            $dbUserData = array();
            $dbEmployerData = array();

            if (isset($_POST['passwordChangeButtonSubmit'])) {
                  $currentPassword = $this->input->post("currentPassword");
                  $password = $this->input->post("newPassword");
                  $rePassword = $this->input->post("rePassword");

                  $userDetails = $this->User_model->getEmplyerDetailsByID($this->getSession("user_id"), "Employer");

                  if ($this->hashString($currentPassword) != $userDetails['password']) {
                        $this->setSession("error", "Current password did not match!");
                  } else if ($password != $rePassword) {
                        $this->setSession("error", "Two passwords must be same!");
                  } else {
                        $dbUserData['password'] = $this->hashString($password);
                        $result = $this->User_model->updateEmployer($dbUserData, $dbEmployerData, $this->getSession("user_id"));
                        if ($result) {
                              $this->setSession("success", "Password has been updated successfully!");
                        } else {
                              $this->setSession("error", "Encountered problem, please try again!");
                        }
                  }
            } else if (isset($_POST['submitButton'])) {
                  $dbEmployerData['title'] = $this->input->post("title", true);
                  $dbEmployerData['first_name'] = $this->input->post("first_name", true);
                  $dbEmployerData['surename'] = $this->input->post("surename", true);
                  $dbEmployerData['phone_number'] = $this->input->post("phone_number", true);
                  $dbEmployerData['suburb'] = $this->input->post("suburb", true);
                  $dbEmployerData['post_code'] = $this->input->post("post_code", true);
                  $dbUserData['email_address'] = $this->input->post("email_address", true);
                  $dbUserData['address_line_1'] = $this->input->post("address_line_1", true);
                  $dbUserData['address_line_2'] = $this->input->post("address_line_2", true);

                  // check whether two passwords are same or not //
                  $result = $this->User_model->updateEmployer($dbUserData, $dbEmployerData, $this->getSession("user_id"));
                  if ($result === -1) {
                        $this->setSession("error", "Email already exisits!");
                  } else if (!$result) {
                        $this->setSession("error", "Please try again!");
                  } else {
                        $this->setSession("success", "Profile has been updated successfully!");
                  }
            }

            $this->viewData['employerDetails'] = $this->User_model->getEmplyerDetailsByID($this->getSession("user_id"), $this->getSession("user_role"));
            $this->viewData['state'] = $this->State_model->getStateByID($this->viewData['employerDetails']['state_id']);
            $this->showEmployerView("my_profile");
      }

      public function hiringIWTBProjectManagerPaymentConfirmation()
      {
            if (isset($_GET['AccessCode'])) {
                  $this->load->library("app_eway_payment");

                  $accessCode = $_GET['AccessCode'];
                  $transactionResult = $this->app_eway_payment->queryTransaction($_GET['AccessCode']);
                  if ($transactionResult['responseStatus']) {
                        //------- update payment details table --------------------------------//
                        $tnxData = array();
                        $tnxData['transaction_id'] = $transactionResult['data']->TransactionID;
                        $tnxData['totalAmount'] = $transactionResult['data']->TotalAmount;
                        $txnUpdateResult = $this->Payment_details_model->update($tnxData, array("access_code" => $accessCode));

                        if ($txnUpdateResult) {
                              //successfully paid for hiring IWTB project manager, now send email to IWTB admin regarding this //
                              $params = array();
                              $params['recipient'] = $this->hiringProjectManagerNotificationEmail;
                              $params['subject'] = 'IWTB - A Project Manager has been hired';
                              $params["attached_file"] = "";
                              $mail_data = array(
                                             'employer_email' => $this->getSession("email_address"),
                                             'employer_name' => $this->getSession("title") . " " . $this->getSession("first_name") . " " . $this->getSession("suremane"),
                              );
                              $message = $this->load->view("email_template/hiring_iwtb_project_manager", $mail_data, TRUE);
                              $params['message'] = $message;
                              $output = $this->Mail_model->sendEmail('mail', $params);
                              $this->setSession("success", "You have successfully paid for hiring IWTB project manager, you will be notified regarding this soon!");
                        } else {
                              $this->setSession("error", "Access code does not seem to be a valid one!");
                        }
                  }
            } else {
                  $this->setSession("error", "There was a problem in getting transaction details!");
            }

            header("Location: index");
            exit();
      }

      public function logout()
      {
            session_destroy();
            redirect(base_url() . "login");
            exit();
      }

}
