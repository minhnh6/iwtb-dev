<?php

if (!defined('BASEPATH'))
      exit('No direct script access allowed');

class Project extends AppController {

      function __construct()
      {
            parent::__construct();
            $this->load->model("Variation_tracker_model");
      }

      public function manageAuthentication()
      {
            $publicUri = array();
            $currentMethod = $this->router->fetch_method();
            if (!in_array($currentMethod, $publicUri)) {
                  $this->checkEmployer();
            }
      }

      public function index()
      {
            
      }

      public function addNew()
      {
            $this->viewData['pageTitle'] = "Employer - Add New Project";
            $employerDetails = $this->User_model->getEmplyerDetailsByID($this->getSession("user_id"), "Employer");
            $projectDbData = array();
            if (isset($_POST["hiringIwtbProjectManagerSubmitButton"])) {
                  $this->load->library("app_eway_payment");
                  $transactionData['user_id'] = $this->getSession("user_id");
                  $transactionData['title'] = $this->getSession("title");
                  $transactionData['first_name'] = $this->getSession("first_name");
                  $transactionData['surename'] = $this->getSession("surename");
                  $transactionData['email_address'] = $this->getSession("email_address");
                  $transactionData['paymentDescription'] = "Payment For Hiring IWTB Project Manager";

                  $txnCreationResult = $this->app_eway_payment->createManagerHiringTransaction($transactionData);

                  if ($txnCreationResult['responseStatus']) {
                        $projectDbData['access_code'] = $txnCreationResult['data']->AccessCode;
                        //////// add payment info details to the DB, for later checking purposes //
                        $transactionDbData = array();
                        $transactionDbData["access_code"] = $txnCreationResult['data']->AccessCode;
                        $transactionDbData["isTokenPayment"] = 0;
                        $transactionDbData["invoiceDescription"] = $txnCreationResult['data']->Payment->InvoiceDescription;
                        $transactionDbData["currencyCode"] = $txnCreationResult['data']->Payment->CurrencyCode;
                        $transactionDbData["user_id"] = $txnCreationResult['data']->Customer->Reference;
                        $transactionDbData["payment_for"] = "Hiring_project_manager";
                        $this->Payment_details_model->add($transactionDbData);
                        // ------------- DONE ------------------------------------------------------ //
                        header("Location:" . $txnCreationResult['data']->SharedPaymentUrl);
                        exit();
                  } else {
                        $this->setSession("error", $txnCreationResult['ErrorMessage']);
                  }
            } else if (isset($_POST['submitButton'])) {

                  if (isset($_FILES['daFile']) && $_FILES['daFile']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $config['overwrite'] = false;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload("daFile")) {
                              $this->setSession("error", $this->upload->display_errors());
                              $fileError = true;
                        } else {
                              $uploadData = $this->upload->data();
                              $projectDbData['da_document_url'] = $uploadData['file_name'];
                        }
                  }
                  $projectDbData['name'] = $this->input->post("name", true);
                  $projectDbData['suburb'] = $this->input->post("suburb", true);
                  $projectDbData['description'] = $this->input->post("description", true);
                  $projectDbData['sector'] = $this->input->post("sector", true);
                  $projectDbData['state_id'] = $employerDetails['state_id'];
                  $projectDbData['budget_range'] = $this->input->post("budget_range", true);
                  $projectDbData['fixed_budget'] = $this->input->post("fixed_budget", true);
                  $projectDbData['is_inspection_required'] = $this->input->post("is_inspection_required", true);
                  $projectDbData['is_da_approval_required'] = $this->input->post("is_da_approval_required", true);
                  $projectDbData['is_urgent_project'] = isset($_POST['is_urgent_project']) ? "Y" : "N";
                  $projectDbData['is_hiring_iwtb_expert'] = isset($_POST['is_hiring_iwtb_expert']) ? "Y" : "N";
                  $projectDbData['user_id'] = $this->getSession("user_id");
                  $projectDbData['project_status'] = "Unpaid";
                  $trades = $this->input->post("trades", true);


                  if (!isset($fileError)) {

                        $this->load->library("app_eway_payment");

                        $transactionData['user_id'] = $this->getSession("user_id");
                        $transactionData['title'] = $this->getSession("title");
                        $transactionData['first_name'] = $this->getSession("first_name");
                        $transactionData['surename'] = $this->getSession("surename");
                        $transactionData['email_address'] = $this->getSession("email_address");
                        $transactionData['paymentDescription'] = "Payment For One Time Project Posting Fee";

                        $txnCreationResult = $this->app_eway_payment->createProjectPostingTransaction($transactionData);

                        if ($txnCreationResult['responseStatus']) {
                              $projectDbData['access_code'] = $txnCreationResult['data']->AccessCode;

                              $result = $this->Project_model->addAndGetID($projectDbData, $trades);


                              if ($result) {
                                    // ------------- DONE ------------------------------------------------------ //
                                    $project_files = $this->input->post("project_imgs", true);
                                    if (isset($project_files) && count($project_files) > 0) {
                                          if (!file_exists('files/' . $result)) {
                                                mkdir('projects/' . $result, 0777, true);
                                          }
                                          if (!file_exists('files/' . $result . '/thumbs')) {
                                                mkdir('projects/' . $result . '/thumbs', 0777, true);
                                          }
                                          foreach ($project_files as $file) {
                                                $file_name = basename($file);
                                                $source_path = 'files/' . $file_name;
                                                $target_path = 'projects/' . $result . '/' . $file_name;
                                                $source_path_thumb = 'files/thumbs/' . $file_name;
                                                $target_path_thumb = 'projects/' . $result . '/thumbs/' . $file_name;
                                                if (rename($source_path, $target_path) && rename($source_path_thumb, $target_path_thumb)) {
                                                      $uploadData = array(
                                                                     'url_img' => $target_path,
                                                                     'project_id' => $result
                                                      );
                                                      $insert = $this->Project_model->insertProjectImgs($uploadData);
                                                      if (!$insert) {
                                                            $this->setSession("error", "There was a problem in saving project details to database!");
                                                      }
                                                } else {
                                                      
                                                }
                                          }
                                    }

                                    //////// add payment info details to the DB, for later checking purposes //
                                    $transactionDbData = array();
                                    $transactionDbData["access_code"] = $txnCreationResult['data']->AccessCode;
                                    $transactionDbData["isTokenPayment"] = 0;
                                    $transactionDbData["invoiceDescription"] = $txnCreationResult['data']->Payment->InvoiceDescription;
                                    $transactionDbData["currencyCode"] = $txnCreationResult['data']->Payment->CurrencyCode;
                                    $transactionDbData["user_id"] = $txnCreationResult['data']->Customer->Reference;
                                    $transactionDbData["payment_for"] = "Posting_project";
                                    $transactionDbData["project_id"] = $result;
                                    $this->Payment_details_model->add($transactionDbData);
                                    // ------------- DONE ------------------------------------------------------ //

                                    header("Location:" . $txnCreationResult['data']->SharedPaymentUrl);
                                    exit();
                              } else {
                                    $this->setSession("error", "There was a problem in saving project details to database!");
                              }
                        } else {
                              $this->setSession("error", $txnCreationResult['ErrorMessage']);
                        }
                  }
            } else if (isset($_GET['AccessCode'])) {
                  $this->load->library("app_eway_payment");

                  $accessCode = $_GET['AccessCode'];
                  $transactionResult = $this->app_eway_payment->queryTransaction($_GET['AccessCode']);
                  if ($transactionResult['responseStatus']) {
                        $result = $this->Project_model->getDetailsByAccessCode($accessCode);

                        if (isset($result['project_status']) && ($result['project_status'] == "Unpaid")) {
                              //------- update payment details table and project table --------------------------------//
                              $tnxData = array();
                              $tnxData['transaction_id'] = $transactionResult['data']->TransactionID;
                              $tnxData['totalAmount'] = $transactionResult['data']->TotalAmount;
                              $txnUpdateResult = $this->Payment_details_model->update($tnxData, array("access_code" => $accessCode));

                              if ($txnUpdateResult) {
                                    $projectResult = $this->Project_model->updateProjectDetail($result['project_id'], $this->getSession("user_id"), array("project_status" => "Open", "txn_id" => $tnxData['transaction_id']));
                              }
                              //------------ DONE ------------------------------------------------------//
                              if (isset($projectResult) && $projectResult) {
                                    $this->setSession("success", "Project has been posted successfully!");
                                    redirect('employer/index');
                                    exit();
                              } else {
                                    $this->setSession("error", "There was a problem in posting project!");
                              }
                        } else {
                              $this->setSession("error", "The access code seems to be Invalid!");
                        }
                  } else {
                        $this->setSession("error", "There was a problem in getting transaction details!");
                  }
            }

            $this->viewData['employerDetails'] = $employerDetails;
            $this->viewData['tradeList'] = $this->Trade_model->getList();
            $this->viewData['state'] = $this->State_model->getStateByID($this->viewData['employerDetails']['state_id']);
            $this->showEmployerView("project/add_new");
      }

      public function viewProjectProposal($projectId = 0, $proposalId = 0)
      {
            $this->viewData['projectId'] = $projectId;
            $bid_id = $proposalId;

            /* Get Bid detail */
            $bid_detail = $this->Project_bid_model->getBidDetailByBidID($bid_id);
            if ($bid_detail) {
                  $contractor_detail = $this->User_model->getContractorDetailsByID($bid_detail['user_id'], 'Contractor');
                  /* Get user, contractor detail */
                  if ($contractor_detail) {
                        $this->viewData['pageTitle'] = "Employer - View Project Proposal";
                        $this->viewData['bid_detail'] = $bid_detail;
                        $this->viewData['proposal_detail'] = $contractor_detail;
                        $this->viewData['feedbackList'] = $this->Project_bid_model->getContractorFeedbackList($contractor_detail['user_id']);
                        $this->showEmployerView("project/view_project_proposal");
                  } else {
                        $this->setSession("error", "There was a problem in reviewing proposal!");
                        redirect("employer/project/viewDetails/{$projectId}");
                  }
            } else {
                  $this->setSession("error", "There was a problem in reviewing proposal!");
                  redirect("employer/project/viewDetails/{$projectId}");
            }
      }

      public function viewDetails($projectId = 0)
      {
            if (empty($projectId))
                  redirect("employer/");
            $projectId = (int) $projectId;
            $this->viewData['pageTitle'] = "Employer - View Project Details";
            $this->viewData['projectDetails'] = $this->Project_model->getDetails($projectId, $this->getSession("user_id"));            
            
            $this->viewData['tradeList'] = $this->Trade_model->getList();
            $this->viewData['projectTradeCustomList'] = $this->Project_trade_model->getCustomList($projectId);
            /* lay ra danh sach cac loai nhan vien can co cua du an 
              Vi du: du an 1 can nhan vien "builder" va "electric"
             */
            $this->viewData['projectTradeList'] = $this->Project_trade_model->getList($projectId);
    
            $this->viewData['employerDetails'] = $this->User_model->getEmplyerDetailsByID($this->getSession("user_id"), "Employer");
            /* lay ra danh sach nhung contractor da bid du an nay         
             */
            $projectBidList = $this->Project_model->getProjectBidders($projectId);
            $bidCustomList = array();
            /*
              Lay ra danh sach cac biders theo linh vuc
              $aBid['user_trade'] => la ID cua loai nhan vien (builder hoac electric)
             */
            foreach ($projectBidList as $aBid) {
                  $bidCustomList[$aBid['user_trade']][] = $aBid;
            }

            /* Get all image of project */
            $img_sql = $this->Project_model->getProjectImgs($projectId);
            if ($img_sql)
                  $this->viewData['project_imgs'] = $img_sql;
            else
                  $this->viewData['project_imgs'] = array();
            
            $this->viewData['bidCustomList'] = $bidCustomList;
            
            $this->viewData['state'] = $this->State_model->getStateByID($this->viewData['projectDetails']['state_id']);
            $this->showEmployerView("project/view_detials");
      }

      public function edit($projectId = 0)
      {
            
            $this->viewData['pageTitle'] = "Employer - Edit Project Details";
            if (empty($projectId))
                  redirect("employer/");
            /* Check if this is a submit for updating */
           
            if ($_POST && count($_POST) > 0) {
                  /* Get old project data */
                  $old_project = $this->Project_model->getDetails($_POST['project_id'], $this->getSession("user_id"));

                  $is_urgent_project = isset($_POST['is_urgent_project']) ? "Y" : "N";
                  $is_hiring_iwtb_expert = isset($_POST['is_hiring_iwtb_expert']) ? "Y" : "N";
                  $fix_budget = (isset($_POST['fixed_budget']) && $_POST['fixed_budget'] != '') ? $_POST['fixed_budget'] : 0;
                  //echo $fix_budget;
                  /* step 1:  repaire data */
                  $update_data = array(
                                 'name' => $_POST['project_name'],
                                 'description' => $_POST['project_description'],
                                 'sector' => $_POST['project_sector'],
                                 'suburb' => $_POST['project_description'],
                                 'budget_range' => $_POST['budget_range'],
                                 'fixed_budget' => $fix_budget,
                                 'is_inspection_required' => $_POST['is_inspection_required'],
                                 'is_da_approval_required' => $_POST['is_da_approval_required'],
                                 'is_urgent_project' => $is_urgent_project,
                                 'is_hiring_iwtb_expert' => $is_hiring_iwtb_expert,
                                 'last_updated_on' => date('d/m/Y H:s:i')
                  );
//var_dump($update_data); exit;
                  /* Upload file progress */
                  if (isset($_FILES['daFile']) && $_FILES['daFile']['size'] > 0) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
                        $config['overwrite'] = false;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload("daFile")) {
                              $this->setSession("error", $this->upload->display_errors());
                              $fileError = true;
                              $this->setSession("error", "There was a problem in adding file to project!");
                              redirect('employer/project/viewDetails/' . $_POST['project_id']);
                        } else {
                              $uploadData = $this->upload->data();
                              $update_data['da_document_url'] = $uploadData['file_name'];
                        }
                  }
                  /* Step 2: update to database */
                  $update_result = $this->Project_model->updateProjectDetail($_POST['project_id'], $this->getSession("user_id"), $update_data);

                  /* Step 3 : Update project_trades */
                  //31. Delete all old trade 
                  $result_delete_trade = $this->Project_trade_model->deleteAllProjectTrade($_POST['project_id']);
                  /* Insert new trades to project */
                  $result = $this->Project_trade_model->insertProjectTrade($_POST['project_trades'], $_POST['project_id']);
                  if ($result) {
                        
                  } else {
                        $this->setSession("error", "There was a problem in adding trades of project!");
                        redirect('employer/project/viewDetails/' . $_POST['project_id']);
                  }

                  if ($update_result && $update_result > 0) {

                        echo "frgdg";
                        // ------------- DONE ------------------------------------------------------ //
                        /* Add Imges for project */
                        $project_files = $this->input->post("project_imgs", true);

                        if (isset($project_files) && is_array($project_files) && count($project_files) > 0) {
                              if (!file_exists('files/' . $result)) {
                                    mkdir('projects/' . $result, 0777, true);
                              }
                              if (!file_exists('files/' . $result . '/thumbs')) {
                                    mkdir('projects/' . $result . '/thumbs', 0777, true);
                              }
                              /* Delete all current img url */
                              $this->Project_model->deleteProjectImgs($_POST['project_id']);
                             
                              foreach ($project_files as $file) {
                                    $file_name = basename($file);
                                    $target_path = 'projects/' . $_POST['project_id'] . '/' . $file_name;
                                    $uploadData = array(
                                                   'url_img' => $target_path,
                                                   'project_id' => $_POST['project_id']
                                    );
                                    $insert = $this->Project_model->insertProjectImgs($uploadData);
                                    if (!$insert) {
                                          $this->setSession("error", "There was a problem in saving project details to database!");
                                    }
                              }
                        }

                        /* Get all bidders of this project */
                        $projectBidList = $this->Project_model->getProjectBiddersListEmail($_POST['project_id']);
                        $result_project_detail = false;
                        $result_project_detail = $this->Project_model->getDetails($_POST['project_id'], $this->getSession("user_id"));
                        $project_name = '';
                        if ($result_project_detail) {
                              $project_name = $result_project_detail['name'];
                        }
                        /* Send email to all bidder about this updating */
                        if ($projectBidList && count($projectBidList) > 0) {
                              foreach ($projectBidList as $bider) {
                                    /* Store changed fields in tracker variation tbale */
                                    $updated_fileds = array();
                                    foreach ($update_data as $key => $val) {
                                          if ($val != $old_project[$key]) {
                                                $updated_fileds[] = $key;
                                          }
                                    }

                                    $tracker_data = array();
                                    $tracker_data = array(
                                                   'project_id' => $_POST['project_id'],
                                                   'bid_id' => $bider['bid_id'],
                                                   'track_action' => json_encode($updated_fileds)
                                    );
                                    $old_update = $this->Variation_tracker_model->getChangeVariation($_POST['project_id'], $bider['bid_id']);
                                    if ($old_update) {
                                          $tracker_data['track_action'] = json_encode(array_merge($old_update, $updated_fileds));
                                          $this->Variation_tracker_model->update($tracker_data);
                                    } else
                                          $this->Variation_tracker_model->add($tracker_data);


                                    /* step 1: Get email , user name of contractor  */
                                    $contractor_email = $bider['email_address'];
                                    $contractor_name = $bider['business_name'];
                                    //step 2: get link to contractor review project detail with shared detail information
                                    $link_review_project = base_url() . "contractor/lead/myBidDetails/" . $_POST['project_id'];
                                    //step 3: coolect all nessary in $params array and call model mail to send email
                                    $params = array();
                                    $params['recipient'] = $contractor_email;
                                    $params['subject'] = 'IWTB - The client has added variations to the project';
                                    $params['attached_file'] = '';
                                    $mail_data = array(
                                                   'project_link' => $link_review_project,
                                                   'project_name' => $project_name,
                                                   'contractor_name' => $contractor_name
                                    );
                                    $message = $this->load->view("add_variantion_template", $mail_data, TRUE);
                                    $params['message'] = $message;
                                    $output = $this->Mail_model->sendEmail('mail', $params);
                                    $this->setSession("success", "You has added variations to the project successfully!");
                              }
                        }
                  }
                  else {
                        $this->setSession("error", "There was a problem in adding variations to the project!");
                  }
            }


            $projectId = (int) $projectId;
            $this->viewData['tradeList'] = $this->Trade_model->getList();
            $this->viewData['projectDetails'] = $this->Project_model->getDetails($projectId, $this->getSession("user_id"));
            $this->viewData['employerDetails'] = $this->User_model->getEmplyerDetailsByID($this->getSession("user_id"), "Employer");
            $this->viewData['projectTradeCustomList'] = $this->Project_trade_model->getCustomList($projectId);
            /* get state */
            $this->viewData['state'] = $this->State_model->getStateByID($this->viewData['employerDetails']['state_id']);
            $this->showEmployerView("project/edit_project");
      }

      /* MinhNH added new function to share Employer detail to contractor */

      public function shareContactDetails()
      {
            $result_share = false;
            if (isset($_REQUEST['bid_id']) && $_REQUEST['bid_id'] != 0) {
                  $bid_id = $_REQUEST['bid_id'];
                  $result_share = $this->Project_model->updateShareContactDetail($bid_id);
            }
            if ($result_share) {
                  /* Send out email to contractor about the sharing contact detail */
                  $bid_detail = $this->Project_bid_model->getBidDetailByBidID($bid_id);
                  if ($bid_detail) {
                        $contractor_detail = $this->User_model->getContractorDetailsByID($bid_detail['user_id'], 'Contractor');
                        //step 1: Get email , user name of contractor 
                        $contractor_email = $contractor_detail['email_address'];
                        $contractor_name = $contractor_detail['business_name'];
                        //step 2: get link to contractor review project detail with shared detail information
                        $link_review_project = base_url() . "contractor/lead/myBidDetails/1";
                        //step 3: coolect all nessary in $params array and call model mail to send email
                        $params = array();
                        $params['recipient'] = $contractor_email;
                        $params['subject'] = "IWTB - Congratulation! You have been shared Contact Detail";
                        $params['attached_file'] = '';
                        $message = $this->load->view("mail_template", array('link' => $link_review_project), TRUE);
                        $params['message'] = $message;
                        $output = $this->Mail_model->sendEmail('mail', $params);
                        $this->setSession("success", "Contact Detail shared successfully!");
                  } else {
                        $this->setSession("error", "There was a problem in sending email to contractor!");
                  }
            } else {
                  $this->setSession("error", "There was a problem in sharing contact detail to contractor!");
            }
            redirect('employer/project/viewDetails/' . $_REQUEST['project_id']);
      }

      /* MinhNH added new function to award PROJECT to contractor */

      public function awardProjectToBidder()
      {
            $result_share = false;
            if (isset($_REQUEST['bid_id']) && $_REQUEST['bid_id'] != 0) {
                  $bid_id = $_REQUEST['bid_id'];
                  $result_share = $this->Project_model->updateAwardProject($bid_id);
            }
            $result_project_detail = false;
            if (isset($_REQUEST['project_id']) && $_REQUEST['project_id'] != 0) {
                  $project_id = $_REQUEST['project_id'];
                  $result_project_detail = $this->Project_model->getDetails($project_id, $this->getSession("user_id"));
            }
            $project_name = '';
            if ($result_project_detail) {
                  $project_name = $result_project_detail['name'];
            }
            if ($result_share) {
                  /* Send out email to contractor about the sharing contact detail */
                  $bid_detail = $this->Project_bid_model->getBidDetailByBidID($bid_id);
                  if ($bid_detail) {
                        $contractor_detail = $this->User_model->getContractorDetailsByID($bid_detail['user_id'], 'Contractor');
                        //step 1: Get email , user name of contractor 
                        $contractor_email = $contractor_detail['email_address'];
                        $contractor_name = $contractor_detail['business_name'];
                        //step 2: get link to contractor review project detail with shared detail information
                        $link_review_project = base_url() . "contractor/lead/myBidDetails/" . $_REQUEST['project_id'];
                        //step 3: coolect all nessary in $params array and call model mail to send email
                        $params = array();
                        $params['recipient'] = $contractor_email;
                        $params['subject'] = "IWTB - Congratulation! You have been awared the project";
                        $params['attached_file'] = '';
                        $mail_data = array(
                                       'link' => $link_review_project,
                                       'project_name' => $project_name
                        );
                        $message = $this->load->view("award_template", $mail_data, TRUE);
                        $params['message'] = $message;
                        $output = $this->Mail_model->sendEmail('mail', $params);
                        $this->setSession("success", "The project awared successfully!");

                        // closing bidding status for this project trade. i.e contractors of this type of trade cannot bid on the project now //
                        $this->Project_trade_model->updateBiddingStatus($result_project_detail['project_id'], $bid_detail['user_trade']);
                  } else {
                        $this->setSession("error", "There was a problem in sending email for awarding!");
                  }
            } else {
                  $this->setSession("error", "There was a problem in awarding project!");
            }

            redirect('employer/project/viewDetails/' . $_REQUEST['project_id']);
      }

      /* MinhNH added function to discards the bid */

      public function discardBid()
      {
            $bid_id = $this->uri->segment(4);
            $bid_data = $this->Project_bid_model->getBidDetailByBidID($bid_id);
            $result_discards = $this->Project_bid_model->discardBidByID($bid_id);
            if ($result_discards > 0) {
                  /* Send out email to contractor about this discard */
                  $contractor_detail = $this->User_model->getContractorDetailsByID($bid_data['user_id'], 'Contractor');

                  //step 1: Get email , user name of contractor 
                  $contractor_email = $contractor_detail['email_address'];
                  $contractor_name = $contractor_detail['business_name'];
                  //step 2: get link to contractor review project detail with shared detail information
                  $link_review_project = base_url() . "contractor/lead/viewDetails/" . $bid_data['project_id'];

                  $result_project_detail = false;
                  $result_project_detail = $this->Project_model->getDetails($bid_data['project_id'], $this->getSession("user_id"));

                  $project_name = '';
                  if ($result_project_detail) {
                        $project_name = $result_project_detail['name'];
                  }

                  //step 3: coolect all nessary in $params array and call model mail to send email
                  $params = array();
                  $params['recipient'] = $contractor_email;
                  $params['subject'] = "IWTB - Your Proposal ended: " . $project_name;
                  $params['attached_file'] = '';
                  $mail_data = array('contractor_name' => $contractor_name,
                                 'project_name' => $project_name,
                                 'project_link' => $link_review_project,
                                 'budget' => $result_project_detail['budget_range'],
                                 'bid_amount' => $bid_data['bid_amount'],
                                 'bid_proposal' => $bid_data['bid_proposal']
                  );
                  $message = $this->load->view("discard_bid_template", $mail_data, TRUE);
                  $params['message'] = $message;
                  $output = $this->Mail_model->sendEmail('mail', $params);
                  $this->setSession("success", "You have been discarded Bid successfully!");
            } else {

                  $this->setSession("error", "There was a problem in discarding a Bid!");
            }
            redirect('employer/project/viewDetails/' . $bid_data['project_id']);
      }

      function endProject($projectId = 0)
      { // for ajax call, from view project details page! //
            if (empty($projectId))
                  exit();
            $projectId = (int) $projectId;
            $result = $this->Project_model->updateProjectDetail($projectId, $this->getSession("user_id"), array("project_status" => "Ended"));

            $targetContractorEmails = array();
            if ($result) {
                  $bidders = $this->Project_model->getProjectBiddersListEmail($projectId);
                  if (count($bidders) == 0) {
                        echo true;
                        return;
                  }

                  foreach ($bidders as $aBidder) {
                        if ($aBidder['bidding_status'] == 0 && (($aBidder['bid_status'] == "Awarded") || ($aBidder['bid_status'] == "Accepted"))) {
                              $targetContractorEmails[] = $aBidder['email_address'];
                              //echo "{$aBidder['email_address']} awarded <br>";
                        } else if ($aBidder['bidding_status'] == 1 && $aBidder['bid_status'] == "Open") {
                              $targetContractorEmails[] = $aBidder['email_address'];
                              //echo "{$aBidder['email_address']} not awarded <br>";
                        }
                  }
            } else {
                  echo false;
                  return;
            }

            $emailTemplateVar = array();
            $emailTemplateVar['projectName'] = $bidders[0]['projectName'];
            foreach ($targetContractorEmails as $aContractorEmail) {
                  $content = $this->load->view("email_template/project_ending_notification", $emailTemplateVar, true);
                  $this->sendEmail($aContractorEmail, "", "Project Ended", $content);
            }

            echo true; // everything has been completed, so project status has been updated successfully //
      }

      public function leaveFeedback($projectId = 0, $contractorUserId = 0, $bid_id = 0)
      { // for ajax call from view project details page //
            if (empty($projectId) || empty($contractorUserId))
                  exit();

            if (!isset($_POST['feedback']) || !isset($_POST['rating']))
                  echo false;
            $feedback = $this->input->post("feedback");
            $rating = $this->input->post("rating");
            if ($feedback == "")
                  echo false;

            $projectDetails = $this->Project_model->getDetails($projectId, $this->getSession("user_id"));
            if ($projectDetails['project_status'] == "Ended") {
                  echo $this->Project_bid_model->update(array("project_testimony" => $feedback, "testimony_rating" => $rating, "testimony_given_on" => date('Y-m-d')), array("project_id" => $projectId, "user_id" => $contractorUserId, "bid_id" => $bid_id));
            }
      }

}
