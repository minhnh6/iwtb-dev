<?php

abstract class AppController extends CI_Controller {

    public $sessionPrefix = "iwtb_";
    public $viewData = null;
    public $inboxThreadPerPage = 2;
    protected $hiringProjectManagerNotificationEmail = "nick@perceptivemind.com.au";

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        session_start();
        $this->loadModels();
        $this->customInit();
    }

    public function loadModels() {
        $this->load->model("User_model");
        $this->load->model("Trade_model");
        $this->load->model("Project_model");
        $this->load->model("Project_trade_model");
        $this->load->model("Project_bid_model");
        $this->load->model("Messages_model");
        $this->load->model("Mail_model");
        $this->load->model("Payment_details_model");
        $this->load->model('State_model');
    }

    public function customInit() {
        $this->viewData = array("pageTitle" => "I Want To Build", "sessionPrefix" => $this->sessionPrefix);
        $this->manageAuthentication();
    }

    public abstract function manageAuthentication();
    
    public function setSession($sessionName, $sessionValue) {
        $_SESSION[$this->sessionPrefix . $sessionName] = $sessionValue;
    }

    public function getSession($sessionName) {
        if (isset($_SESSION[$this->sessionPrefix . $sessionName]))
            return $_SESSION[$this->sessionPrefix . $sessionName];
        else
            return null;
    }
    
    private function checkFreeTrialValidity() {
        $baseUrl = base_url();
        if($this->getSession("membership_plan_id") == 3) {// free-trial // 
            $secDiff = strtotime($this->getSession("membership_expires_on")) - time();
            $daysDiff = floor($secDiff/(60*60*24));
            if($daysDiff < 0) { // if membership expired after logged in, take contaractor to upgrade membership page //
                header("Location: {$baseUrl}contractor/upgradeMembership");
                exit();
            }
            $this->viewData["freeTrialWarning"] = "<label class='label label-warning'>Free-trial expires in {$daysDiff} day(s)!</label>";
        } else {
            $this->viewData["freeTrialWarning"] = "";
        }
    }
    
    private function getAdditionalContractorIssue() { // this function is used to check or load additional contractor data / validity ///
        $this->checkFreeTrialValidity();
    }

    public function showEmployerView($mainContentFile) {
        $this->load->view("employer/template/header", $this->viewData);
        $this->load->view("employer/template/flush_message", $this->viewData);
        $this->load->view("employer/template/sidebar");
        $this->load->view("employer/{$mainContentFile}", $this->viewData);
        $this->load->view("employer/template/footer");
    }

    public function showContractorView($mainContentFile) {
        $this->getAdditionalContractorIssue();
        $this->load->view("contractor/template/header", $this->viewData);
        $this->load->view("contractor/template/flush_message", $this->viewData);
        $this->load->view("contractor/template/sidebar");
        $this->load->view("contractor/{$mainContentFile}", $this->viewData);
        $this->load->view("contractor/template/footer");
    }

    public function checkEmployer() {
        if (($this->getSession("user_id") != null) && ($this->getSession("user_role") == "Employer"))
            return true;
        else {
            redirect(base_url()."login");
            exit();
        }
    }
    
    public function checkContractor() {
       if (($this->getSession("user_id") != null) && ($this->getSession("user_role") == "Contractor"))
            return true;
        else {
            redirect(base_url()."login");
            exit();
        } 
    }
    
    public function hashString($string){
        return md5($string);
    }
    
    public function sendEmail($to, $from, $subject, $content) {
        $header = "From: IWTB <noreply@perceptivemind.com.au> \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        return mail($to,$subject,$content,$header);
    }
}

?>