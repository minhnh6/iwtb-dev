<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Variation_tracker_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getList() {
        $this->db->order_by("tracker_id", "ASC");
        $resultObj = $this->db->get("variation_tracker");
        return $resultObj->result_array();
    }
    
    //variation_tracker
    public function add($dbData) {
        return $this->db->insert("variation_tracker", $dbData);
    }
    
    public function getChangeVariation($project_id, $bid_id)
    {
         $this->db->select("track_action")
                ->from("variation_tracker")                
                ->where("variation_tracker.project_id = {$project_id}  AND variation_tracker.bid_id = {$bid_id} ");
        $resultObj = $this->db->get();        
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return json_decode($rows[0]['track_action'], true);
        }
        else
            return array();
    }
    public function update( $dbData )
    {
        $data = array('track_action' => $dbData['track_action']);
        $this->db->where('project_id ', $dbData['project_id']);
        $this->db->update('variation_tracker', $data);
        return $this->db->affected_rows() > 0;
    }
    
    public function markAsReview($bid_id )
    {
        $data = array('bid_id' => $bid_id);        
        $this->db->delete('variation_tracker', $data);
        return $this->db->affected_rows() > 0;    
    }
}
?>