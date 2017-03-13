<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Messages_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function sendMessageByProjectId($projectId, $from, $to, $content) {
        $resultObj = $this->db->get_where("threads", array("project_id" => $projectId, "employer_id" => $from, "contractor_id" => $to));
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->first_row("array");
            $threadId = $rows['thread_id'];
        }
        else {
            $this->db->insert("threads", array("project_id" => $projectId, "employer_id" => $from, "contractor_id" => $to));
            $threadId = $this->db->insert_id();
        }
        
        $messageData = array(
            "thread_id" => $threadId,
            "from" => $from,
            "to" => $to,
            "content" => $content,
            "read_status" => 0
        );
        $this->db->insert("messages", $messageData);
        
        return array("thread_id" => $threadId, "message_id" => $this->db->insert_id());
    }
    
    public function sendMessageByThreadId($threadId, $from, $to, $content) {
        $messageData = array(
            "thread_id" => $threadId,
            "from" => $from,
            "to" => $to,
            "content" => $content,
            "read_status" => 0
        );
        return $this->db->insert("messages", $messageData);
    }
    
    public function getContractorThreadList($contractorId, $offset = 0, $limit = 99999999999) {
        $this->db->select("*, (select count(id) from messages where messages.thread_id = threads.thread_id and messages.to = '{$contractorId}' and read_status = 0) as totalUnread")
                ->from("threads")
                ->join("project", "threads.project_id = project.project_id")
                ->join("messages", "threads.thread_id = messages.thread_id")
                ->join("employer", "threads.employer_id = employer.user_id")
                ->where("threads.contractor_id = '{$contractorId}'")
                ->where("messages.id = (select max(id) from messages where messages.thread_id = threads.thread_id)")
                ->group_by("threads.thread_id")
                ->order_by("messages.id", "desc")
                ->limit($limit, $offset);
        $resultObj = $this->db->get();  
        return $resultObj->result_array();
    }
    
    public function getEmployerThreadList($employerUserId, $offset = 0, $limit = 99999999999) {
        $this->db->select("*, (select count(id) from messages where messages.thread_id = threads.thread_id and messages.to = '{$employerUserId}' and read_status = 0) as totalUnread")
                ->from("threads")
                ->join("project", "threads.project_id = project.project_id")
                ->join("messages", "threads.thread_id = messages.thread_id")
                ->join("contractor", "threads.contractor_id = contractor.user_id")
                ->where("threads.employer_id = '{$employerUserId}'")
                ->where("messages.id = (select max(id) from messages where messages.thread_id = threads.thread_id)")
                ->group_by("threads.thread_id")
                 ->order_by("messages.id", "DESC")
                ->limit($limit, $offset);
        $resultObj = $this->db->get();  
        return $resultObj->result_array();
    }
    
    public function getUnreadMessageTotal($user_id) {
        $this->db->select("*")
                ->from("messages")
                ->where("to = '{$user_id}'")
                ->where("read_status = 0");
        $resultObj = $this->db->get();
        return $resultObj->num_rows();
    }
    

    public function updateUserMessageReadStatus($threadId, $userId) {
        return $this->db->update('messages', 
                array("read_status" => 1), 
                array("thread_id" => $threadId, "to" => $userId)
             );
    }
    
    
    public function getContractorThreadDetails($threadId, $contractorId) {
        $this->db->select("threads.*, project.name as projectName, employer.*, user.*")
                ->from("threads")
                ->join("employer", "threads.employer_id = employer.user_id")
                ->join("project", "threads.project_id = project.project_id")
                ->join("user", "employer.user_id = user.user_id")
                ->where("threads.contractor_id = '{$contractorId}'")
                ->where("threads.thread_id = '{$threadId}'")
                ->limit(1,0);
        $resultObj = $this->db->get();  
        return $resultObj->first_row("array");
    }
    
    public function getEmployerThreadDetails($threadId, $employerId) {
        $this->db->select("threads.*, project.name as projectName, contractor.*, user.*")
                ->from("threads")
                ->join("contractor", "threads.contractor_id = contractor.user_id")
                ->join("project", "threads.project_id = project.project_id")
                ->join("user", "contractor.user_id = user.user_id")
                ->where("threads.employer_id = '{$employerId}'")
                ->where("threads.thread_id = '{$threadId}'")
                ->limit(1,0);
        $resultObj = $this->db->get();  
        return $resultObj->first_row("array");
    }
    
    public function getContractorThreadMessageList($threadId, $contractorId, $lastMessageId){
        $this->db->select("*")
                ->from("threads")
                ->join("messages", "threads.thread_id = messages.thread_id")
                ->where("threads.contractor_id = '{$contractorId}'")
                ->where("threads.thread_id = '{$threadId}'")
                ->where("messages.id > '{$lastMessageId}'")
                ->order_by("messages.id", "ASC");
        $resultObj = $this->db->get();  
        return $resultObj->result_array();
    }
    
    public function getEmployerThreadMessageList($threadId, $employerId, $lastMessageId){
        $this->db->select("*")
                ->from("threads")
                ->join("messages", "threads.thread_id = messages.thread_id")
                ->where("threads.employer_id = '{$employerId}'")
                ->where("threads.thread_id = '{$threadId}'")
                ->where("messages.id > '{$lastMessageId}'")
                ->order_by("messages.id", "ASC");
        $resultObj = $this->db->get();  
        return $resultObj->result_array();
    }
    
    function getLastSeenMessageId($lastSeenMessageId, $userId) {
        $this->db->select("max(id) as lastMessageId")
                ->from("messages")
                ->where("messages.to = '{$userId}'")
                ->where("messages.read_status = 0");
        $resultObj = $this->db->get();  
        $row = $resultObj->first_row("array");
        return $row['lastMessageId'];
    }
}
?>
