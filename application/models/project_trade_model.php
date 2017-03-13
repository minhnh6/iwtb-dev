<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_trade_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add($dbData) {
        return $this->db->insert("project_trade", $dbData);
    }
    
    public function updateBiddingStatus($projectId, $tradeId) {
        $this->db->where("project_id", $projectId);
        $this->db->where("trade_id", $tradeId);
        $this->db->update('project_trade', array("bidding_status" => 0));
        return $this->db->affected_rows() > 0;
    }
    
    public function getList($project_id) {
        $this->db->select("*")
                ->from("project_trade")
                ->join("trade", "project_trade.trade_id = trade.trade_id")
                ->where("project_id", $project_id)
                ->order_by("project_trade.trade_id", "DESC");
        $resultObj = $this->db->get();
        return $resultObj->result_array();
    }
    
    public function getCustomList($project_id) {
        $this->db->where("project_id", $project_id);
        $resultObj = $this->db->get("project_trade");
        $projectTradeList = $resultObj->result_array();
        $outputTrades = array();
        foreach($projectTradeList as $aProjectTrade) {
            $outputTrades[] = $aProjectTrade['trade_id'];
        }
        return $outputTrades;
    }
    
    public function getTradeNameList($project_id) {
        $this->db->where("project_id", $project_id);
        $resultObj = $this->db->get("project_trade");
        $projectTradeList = $resultObj->result_array();
        $outputTrades = array();
        foreach($projectTradeList as $aProjectTrade) {
            /*Get trade name */
            $this->db->where("trade_id", $aProjectTrade['trade_id']);
            $resultObj = $this->db->get("trade");
            $projectTradeList = $resultObj->result_array();
            if($projectTradeList && count($projectTradeList) > 0)
            {
                 $outputTrades[] = $projectTradeList[0];
            }           
        }
        return $outputTrades;
    }
    
    public function deleteAllProjectTrade($project_id) {        
        
        $data = array('project_id' => $project_id);             
        $this->db->delete('project_trade', $data);
        return $this->db->affected_rows() > 0;    
    }
    
    public function insertProjectTrade($trades, $project_id)
    {
         $this->db->trans_start();
        $projectTradeDbData = array();
        foreach($trades as $aTrade) {
            $projectTradeDbData[] = array("project_id" => $project_id, "trade_id" => $aTrade);
        }
        $this->db->insert_batch("project_trade", $projectTradeDbData);        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
?>