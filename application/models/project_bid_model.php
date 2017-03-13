<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Project_bid_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function add($dbData) {
        return $this->db->insert("project_bid", $dbData);
    }
    public function getBidDetailByBidID( $bid_id )
    {
            $this->db->select("*")
                ->from("project_bid")                
                ->where("project_bid.bid_id = {$bid_id} ");
        $resultObj = $this->db->get();        
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    public function getBidDetailByProjectID($project_id, $user_id)
    {
            $this->db->select("*")
                ->from("project_bid")                
                ->where("project_bid.project_id = {$project_id}  AND project_bid.user_id = {$user_id} ");
        $resultObj = $this->db->get();        
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    
    public function acceptAwardProjectByBidID( $bid_id )
    {
        $data = array('bid_status' => 'Accepted');
        $this->db->where('bid_id ', $bid_id);
        $this->db->update('project_bid', $data);
        return $this->db->affected_rows() > 0;
    }
    
    public function rejectAwardProjectByBidID( $bid_id )
    {
        $data = array('bid_status' => 'Open');
        $this->db->where('bid_id ', $bid_id);
        $this->db->update('project_bid', $data);
        return $this->db->affected_rows() > 0;
    }
    public function discardBidByID( $bid_id )
    {        
        $data = array('discard_status' => 1);
        $this->db->where('bid_id ', $bid_id);
        $this->db->update('project_bid', $data);
        return $this->db->affected_rows() > 0;     
    }
    
    public function updateBid($bid_data)
    {
        $data =   array('bid_amount' => $bid_data['bid_amount'],
                        'bid_proposal' => $bid_data['bid_proposal'],
                        'resubmit_status' => 1 );
        $this->db->where('bid_id ', $bid_data['bid_id']);
        $this->db->update('project_bid', $data);
        return $this->db->affected_rows() > 0;
    }
    
    public function update($dbData, $conditionArray = array()) {
        $this->db->where($conditionArray);
        $this->db->update('project_bid', $dbData);
        return $this->db->affected_rows() > 0;
    }
    
    public function getContractorFeedbackList($userId) {
        $this->db->select("*")
                ->from("project_bid")
                ->join("project", "project_bid.project_id = project.project_id")
                ->join("employer", "employer.user_id = project.user_id")
                ->where("project_bid.user_id = {$userId} and project_testimony != ''");
        $resultObj = $this->db->get();        
        return $resultObj->result_array();
    }
    
    public function get_user($userID){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('contractor','contractor.user_id=user.user_id');
        $this->db->where('user.user_id',$userID);
        $result=$this->db->get();
        return $result->result_array();
    }
}
?>