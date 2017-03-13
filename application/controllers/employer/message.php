<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends AppController {
    
    function __construct() {
        parent::__construct();
    }
    
    public function manageAuthentication() {
        $publicUri = array();
        $currentMethod = $this->router->fetch_method();
        if (!in_array($currentMethod, $publicUri)) {
            $this->checkEmployer();
        }
    }
    
    public function sendMessageFromBidList($projectId = 0, $recieverId = 0) { //ajax for sending message from the project bids //
        if(empty ($projectId) || empty ($recieverId)) return;
        $content = $this->input->post("content", true);
        if($content == "") return;
        
        $projectId = (int)$projectId;
        $to = (int)$recieverId;
        $from = $this->getSession("user_id");
        $returnResult = $this->Messages_model->sendMessageByProjectId($projectId, $from, $to, $content);
        
        // sending email about the messages ///
        $employerUserId = $this->getSession("user_id");
        $threadId = $returnResult['thread_id'];
        $threadDetails = $this->Messages_model->getEmployerThreadDetails($threadId, $employerUserId);
        $emailTemplateVar = array();
        $to = $threadDetails['email_address'];
        $from = $this->getSession("email_address");
        $subject = "{$threadDetails['projectName']} - {$this->getSession("first_name")} {$this->getSession("last_name")} messaged you";
        
        $emailTemplateVar['to'] = $to;
        $emailTemplateVar['from'] = $this->getSession("first_name") . " " . $this->getSession("surename");
        $emailTemplateVar['subject'] = $subject;
        $emailTemplateVar['projectName'] = $threadDetails['projectName'];
        $emailTemplateVar['messageText'] = $content;
        $emailTemplateVar['threadUrl'] = base_url() . "contractor/message/showThread/{$threadId}";
        
        $emailHtml = $this->load->view("email_template/new_message", $emailTemplateVar, true);
        
        $this->sendEmail($to, $from, $subject, $emailHtml);
        // ---------------------------------------------- //
        
        echo $returnResult['message_id'];
    }
    
    public function showList($currentPage = 1) {
        $this->viewData['pageTitle'] = "Employer - Inbox";
        $offset = (int)( ($currentPage - 1) * $this->inboxThreadPerPage );
        $this->viewData['offset'] = $offset;
        $this->viewData['inboxThreadPerPage'] = $this->inboxThreadPerPage;
        $this->viewData['currentPage'] = $currentPage;
        
        $this->viewData['threadList'] = $this->Messages_model->getEmployerThreadList($this->getSession("user_id"), $offset, $this->inboxThreadPerPage);
        $this->viewData['totalThread'] = count($this->Messages_model->getEmployerThreadList($this->getSession("user_id")));
        $this->viewData['totalUnredMessages'] = $this->Messages_model->getUnreadMessageTotal($this->getSession("user_id"));
        
        if($currentPage == 1) {
            $this->viewData['prevLink'] = "";
        }
        else {
            $this->viewData['prevLink'] = base_url() . "employer/message/showList/" . ($currentPage-1);
        }
        if( ($offset+$this->inboxThreadPerPage) >= $this->viewData['totalThread'] )
        {
            $this->viewData['nextLink'] = "";
        }
        else {
            $this->viewData['nextLink'] = base_url() . "employer/message/showList/" . ($currentPage+1);
        }
        
        $this->showEmployerView("message/show_list");
    }
    
    public function showThread($threadId = 0) {
        if(empty($threadId)) exit();
        $threadId = (int)$threadId;
        
        $this->Messages_model->updateUserMessageReadStatus($threadId, $this->getSession("user_id"));
        $this->viewData['totalUnredMessages'] = $this->Messages_model->getUnreadMessageTotal($this->getSession("user_id"));
        $this->viewData['theadDetails'] = $this->Messages_model->getEmployerThreadDetails($threadId, $this->getSession("user_id"));
        
        
        $this->showEmployerView("message/thread_details");
    }
    
    public function getLatestMessageUpdate($threadId = 0, $lastMessageShownId = 0) { // for ajax call //
        if(empty($threadId)) exit();
        $threadId = (int)$threadId;
        $lastMessageShownId = (int)$lastMessageShownId;
        $employerId = (int)$this->getSession("user_id");
        
        $theadDetails = $this->Messages_model->getEmployerThreadDetails($threadId, $this->getSession("user_id"));
        $threadMessageList = $this->Messages_model->getEmployerThreadMessageList($threadId, $employerId, $lastMessageShownId);
    
        
        $lastMessageIdShown = $lastMessageShownId;
        $outputHtml = "";
        foreach($threadMessageList as $aThreadMessage) {

            $lastMessageIdShown = $aThreadMessage['id'];
            $timelineClass = "timeline-inverted";
            $name = $theadDetails["business_name"];

            if($aThreadMessage['from'] == $this->getSession("user_id")) {
                $timelineClass = "";
                $name = $this->getSession("first_name") . " " . $this->getSession('surename');
            }

            $messagingTime = date("d/m/Y h:i A", strtotime($aThreadMessage['sent_on']));

            $outputHtml .= "
                                <li class='". $timelineClass ."'>
                                    <div class='timeline-panel'>
                                        <div class='timeline-heading'>
                                            <h4 class='timeline-title'><a>{$name}</a> <small class='text-muted'><i class='fa fa-clock-o'></i> <i>{$messagingTime}</i></small></h4>
                                        </div>
                                        <div class='timeline-body'>
                                            <p>{$aThreadMessage['content']}</p>
                                        </div>
                                    </div>
                                </li>
                            ";
        }
        echo json_encode(
                array(
                    "lastMessageShownId" => $lastMessageIdShown,
                    "messageListOutput" => $outputHtml
                )
             );
    }
    
    function addNewMessage($threadId = 0, $contractorId) { // for ajax-call //
        if(empty($threadId)) exit();
        $threadId = (int)$threadId;
        $contractorId = (int)$contractorId;
        $messageContent = $this->input->post("messageContent", true);
        $employerUserId = (int)$this->getSession("user_id");
        
        // sending email about the messages ///
        $threadDetails = $this->Messages_model->getEmployerThreadDetails($threadId, $employerUserId);
        $emailTemplateVar = array();
        $to = $threadDetails['email_address'];
        $from = $this->getSession("email_address");
        $subject = "{$threadDetails['projectName']} - {$this->getSession("first_name")} {$this->getSession("last_name")} messaged you";
        
        $emailTemplateVar['to'] = $to;
        $emailTemplateVar['from'] = $this->getSession("first_name") . " " . $this->getSession("surename");
        $emailTemplateVar['subject'] = $subject;
        $emailTemplateVar['projectName'] = $threadDetails['projectName'];
        $emailTemplateVar['messageText'] = $messageContent;
        $emailTemplateVar['threadUrl'] = base_url() . "contractor/message/showThread/{$threadId}";
        
        $emailHtml = $this->load->view("email_template/new_message", $emailTemplateVar, true);
        
        $this->sendEmail($to, $from, $subject, $emailHtml);
        // ---------------------------------------------- //
                
        return $this->Messages_model->sendMessageByThreadId($threadId, $employerUserId, $contractorId, $messageContent);
    }
    
    function getlastSeenMessageId($lastSeenMessageId = 0) { // for ajax call //
        if($lastSeenMessageId < 0 || ( $lastSeenMessageId == 0 )) exit();
        $lastSeenMessageId = (int)$lastSeenMessageId;
        
        
        $newLastSeenMessageId = $this->Messages_model->getLastSeenMessageId($lastSeenMessageId, $this->getSession("user_id"));
        if($newLastSeenMessageId == null) $newLastSeenMessageId = $lastSeenMessageId;
        echo json_encode(
                    array(
                        "newLastSeenMessageId" => $newLastSeenMessageId
                    )
                );
    }
    
    function updateUnreadMessageStatus($threadId = 0) { // for ajax call //
        if($threadId == 0) exit();
        $threadId = (int)$threadId;
        $this->Messages_model->updateUserMessageReadStatus($threadId, $this->getSession("user_id"));
    }
    

    function getNoOfUnreadMessages() { //for ajax call //
        echo $this->Messages_model->getUnreadMessageTotal($this->getSession("user_id"));
    }
}

?>
