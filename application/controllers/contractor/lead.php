<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lead extends AppController {

    function __construct() {

        parent::__construct();
        $this->load->model("Mail_model");
        $this->load->model("Variation_tracker_model");
    }

    public function manageAuthentication() {
        $publicUri = array();
        $currentMethod = $this->router->fetch_method();
        if (!in_array($currentMethod, $publicUri)) {
            $this->checkContractor();
        }
    }

    public function viewDetails($projectId = 0, $employerId = 0) {
        if(empty ($projectId) || empty ($employerId)) exit();
        
        $this->viewData["pageTitle"] = "Contractor - Lead Details";
        $projectId = (int) $projectId;
        $employerId = (int) $employerId;
        $projectBidDbData = array();
        $this->viewData['projectTradeList'] = $this->Project_trade_model->getCustomList($projectId);
        if (isset($_POST['bidSubmit'])) {
            $projectBidDbData['project_id'] = $projectId;
            $projectBidDbData['bid_amount'] = $this->input->post("bid_amount", true);
            $projectBidDbData['bid_proposal'] = $this->input->post("bid_proposal", true);
            $projectBidDbData['user_id'] = $this->getSession("user_id");
            $projectBidDbData['user_trade'] = $this->getSession("trade_id");
            $trade_users = explode(",",$this->getSession("trade_id"));
            foreach($trade_users as $trade)
            {
                if(in_array($trade, $this->viewData['projectTradeList']))
                {
                    $projectBidDbData['user_trade'] = $trade;
                }
            }
             
            $projectBidDbData['bid_status'] = "Open";
            $result = $this->Project_bid_model->add($projectBidDbData);
            if (!$result) {
                $this->setSession("error", "Please try again!");
            } else {
                $this->setSession("success", "Your bid has been placed successfully!");
            }
            redirect(base_url() . 'contractor/lead/myBidDetails/'.$projectId);
        }
		/*load image project*/
		$img_sql = $this->Project_model->getProjectImgs($projectId); 
        if($img_sql){
			$this->viewData['project_imgs'] = $img_sql;   
		}else{
			$this->viewData['project_imgs'] = array();
		}
        $this->viewData['leadDetails'] = $this->Project_model->getDetails($projectId, $employerId);
        
        $this->viewData['tradeList'] = $this->Trade_model->getList();
        
        
        $this->showContractorView("lead/view_details");
    }

 	public function myBidDetails($projectId = 0)
      {            
            $projectDetails = $this->Project_model->getDetailsByID($projectId);
            if (empty($projectId) || !is_numeric($projectId) || count($projectDetails) < 1) {
                  $this->setSession("error", "Project not found!");
                  redirect(base_url() . 'contractor/lead/myBids');
                  die();
            } else {
                  $project_id = trim($projectId);
                  $employerId = trim($projectDetails['user_id']);
                  if (isset($_POST['resubmit_bid'])) {
                        $projectBidDbData['bid_amount'] = $this->input->post("bid_amount", true);
                        $projectBidDbData['bid_proposal'] = $this->input->post("bid_proposal", true);
                        $projectBidDbData['bid_id'] = $this->input->post("bid_id", true);
                        $result = $this->Project_bid_model->updateBid($projectBidDbData);

                        if (!$result) {
                              $this->setSession("error", "Please try again!");
                        } else {
                              /* Update that this bidder already view changes on project */
                              $this->Variation_tracker_model->markAsReview($projectBidDbData['bid_id']);
                              $this->setSession("success", "Your bid has been placed successfully!");
                        }
                  }

                  /* Get project detail */
                  $this->viewData['projectDetails'] = $this->Project_model->getDetails($projectId, $employerId);
                  /* Get tracker changes pf project */
                  $this->viewData['tracker_change'] = array();
                  /* Get trade list (loai nhan vien can cho du an) */
                  $this->viewData['projectTradeCustomList'] = $this->Project_trade_model->getTradeNameList($projectId);
                  /* Get Employer Detail */
                  $this->viewData['employerDetails'] = $this->User_model->getEmplyerDetailsByID($this->viewData['projectDetails']['user_id'], "Employer");
                  /* Get current budding of this user on this project */
                  $this->viewData['bid_detail'] = $this->Project_bid_model->getBidDetailByProjectID($project_id, $this->getSession("user_id"));
                  $this->viewData['tracker_change'] = $this->Variation_tracker_model->getChangeVariation($projectId, $this->viewData['bid_detail']['bid_id']);
                  $this->viewData["pageTitle"] = "Contractor - My Bid Details";
                  /* load image project */
                  $img_sql = $this->Project_model->getProjectImgs($projectId);
                  if ($img_sql) {
                        $this->viewData['project_imgs'] = $img_sql;
                  } else {
                        $this->viewData['project_imgs'] = array();
                  }
                  $this->showContractorView("lead/my_bid_details");
            }
      }

    public function myBids() {
        $this->viewData["pageTitle"] = "Contractor - My Current Bids";
        $this->viewData['myBiddedLeadList'] = $this->Project_model->getUserBiddedList($this->getSession("user_id"), $this->getSession("trade_id"));
        $this->showContractorView("lead/my_bids");
    }

    public function myAwardedLeads() {
        $this->viewData["pageTitle"] = "Contractor - My Awarded Leads";
        /* Get all projects which this user was be awarded */
        $this->viewData['awardProjectList'] = $this->Project_model->getAwardedProjectsByContractorID($this->getSession("user_id"));
        $this->showContractorView("lead/my_awarded_leads");
    }

    public function awardedLeadDetails($projectId = 0) {
        $this->viewData["pageTitle"] = "Contractor - My Awarded Lead Details";
        $project_id = $this->uri->segment(4);
        /* Get project detail */        
        $this->viewData['projectDetails'] = $this->Project_model->getDetailsByID($projectId);        
        
        /* Get trade list (loai nhan vien can cho du an) */
        $this->viewData['projectTradeCustomList'] = $this->Project_trade_model->getTradeNameList($projectId);
        /* Get Employer Detail */
        $this->viewData['employerDetails'] = $this->User_model->getEmplyerDetailsByID($this->viewData['projectDetails']['user_id'], "Employer");
        /* Get current budding of this user on this project */
        $this->viewData['bid_detail'] = $this->Project_bid_model->getBidDetailByProjectID($project_id, $this->getSession("user_id"));
        /*load image project*/
		$img_sql = $this->Project_model->getProjectImgs($project_id); 
        if($img_sql){
			$this->viewData['project_imgs'] = $img_sql;   
		}else{
			$this->viewData['project_imgs'] = array();
		}
        
        $this->showContractorView("lead/awarded_lead_details");
    }

    public function acceptAwardProject() {
        $bid_id = $this->uri->segment(5);
        $result_accept = $this->Project_bid_model->acceptAwardProjectByBidID($bid_id);

        if ($result_accept) {
            $project_id = $this->uri->segment(4);
            if (isset($project_id) && $project_id != 0) {
                $result_project_detail = $this->Project_model->getDetailsByID($project_id);
            }
            $project_name = '';
            if ($result_project_detail) {
                $project_name = $result_project_detail['name'];
            }
            /* Send out email to Employer about the accepting of this contractor */
            $bid_detail = $this->Project_bid_model->getBidDetailByBidID($bid_id);
            if ($bid_detail) {
                $enployer_detail = $this->User_model->getEmplyerDetailsByID($result_project_detail['user_id'], 'Employer');
                
                //step 1: Get email , user name of contractor 
                $enployer_email = $enployer_detail['email_address'];
                $enployer_name = $enployer_detail['title'] . " " . $enployer_detail['surename'] . " " . $enployer_detail['first_name'];
                //step 2: get link to contractor review project detail with shared detail information
                $link_review_project = base_url() . "employer/project/viewDetails/" . $project_id;
                //step 3: coolect all nessary in $params array and call model mail to send email
                $params = array();
                $params['recipient'] = $enployer_email;
                $params['subject'] = "IWTB - Congratulation! Contractor have been accepted on your project";
                $params['attached_file'] = '';
                $mail_data = array(
                    'link' => $link_review_project,
                    'project_name' => $project_name
                );
                $message = $this->load->view("accept_award_template", $mail_data, TRUE);
                $params['message'] = $message;
                $output = $this->Mail_model->sendEmail('mail', $params);
                $this->setSession("success", "You have been accepted this project successfully!");
            } else {
                $this->setSession("error", "There was a problem in sending email for accepting project!");
            }
        } else {
            $this->setSession("error", "There was a problem in acceptting project!");
        }

        redirect(base_url() . 'contractor/lead/myAwardedLeads');
    }

    public function rejecttAwardProject() {
        $bid_id = $this->uri->segment(5);
        $result_reject = $this->Project_bid_model->rejectAwardProjectByBidID($bid_id);

        if ($result_reject) {
            $project_id = $this->uri->segment(4);
            if (isset($project_id) && $project_id != 0) {
                $result_project_detail = $this->Project_model->getDetailsByID($project_id);
            }
            $project_name = '';
            if ($result_project_detail) {
                $project_name = $result_project_detail['name'];
            }
            /* Send out email to Employer about the accepting of this contractor */
            $bid_detail = $this->Project_bid_model->getBidDetailByBidID($bid_id);
            if ($bid_detail) {
                $enployer_detail = $this->User_model->getEmplyerDetailsByID($result_project_detail['user_id'], 'Employer');

                //step 1: Get email , user name of contractor 
                $enployer_email = $enployer_detail['email_address'];
                $enployer_name = $enployer_detail['title'] . " " . $enployer_detail['surename'] . " " . $enployer_detail['first_name'];
                //step 2: get link to contractor review project detail with shared detail information
                $link_review_project = base_url() . "employer/project/viewDetails/" . $project_id;
                //step 3: coolect all nessary in $params array and call model mail to send email
                $params = array();
                $params['recipient'] = $enployer_email;
                $params['subject'] = "IWTB - OOP! Contractor have been rejected on your project";
                $params['attached_file'] = '';
                $mail_data = array(
                    'link' => $link_review_project,
                    'project_name' => $project_name
                );
                $message = $this->load->view("reject_award_template", $mail_data, TRUE);
                $params['message'] = $message;
                $output = $this->Mail_model->sendEmail('mail', $params);
                $this->setSession("success", "You have been rejected this project successfully!");
            } else {
                $this->setSession("error", "There was a problem in sending email for rejectting project!");
            }
        } else {
            $this->setSession("error", "There was a problem in rejectting project!");
        }

        redirect(base_url() . 'contractor/lead/myBids');
    }

    public function contractorDiscardBid() {
        $bid_id = $this->uri->segment(4);
        $bid_data = $this->Project_bid_model->getBidDetailByBidID($bid_id);
        $result_discards = $this->Project_bid_model->discardBidByID($bid_id);
        if ($result_discards > 0) {
            $this->setSession("success", "You have been discarded Bid successfully!");
            redirect(base_url() . 'contractor/lead/myBids');
        } else {

            $this->setSession("error", "There was a problem in discarding a Bid!");
            redirect(base_url() . 'contractor/lead/myBidDetails/' . $bid_data['project_id']);
        }
    }

}