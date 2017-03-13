<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Token_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }        
    
     public function getUserByToken($token_value) {
        $this->db->select("*")
                ->from("token")     
                ->where("token.token_key = 'reset_password'")           
                ->where("token.token_value = '{$token_value}' ");
        $resultObj = $this->db->get();        
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    
    //variation_tracker
    public function add($dbData) {
        return $this->db->insert("token", $dbData);
    }
    
    public function update( $dbData )
    {
        $data = array('token_value' => $dbData['token_value']);
        $this->db->where('token_id ', $dbData['token_id']);
        $this->db->where('token_key ', $dbData['token_key']);
        $this->db->update('token', $data);
        return $this->db->affected_rows() > 0;
    }
    
    public function delete($token_id) {
        $data = array('token_id' => $token_id);        
        $this->db->delete('token', $data);
        return $this->db->affected_rows() > 0;    
    }    
}
?>