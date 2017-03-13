<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of User_model
 *
 * @author shuvo
 */
class User_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    //*********** Employer ***************************************************************//
    public function addEmployer($dbUserData, $dbEmployerData) {
        $this->db->trans_start();
        $resultObj = $this->db->get_where("user", array("user_role" => $dbUserData['user_role'], "email_address" => $dbUserData['email_address']));
        if ($resultObj->num_rows() > 0)
            return -1;
        $this->db->insert("user", $dbUserData);
        $dbEmployerData['user_id'] = $this->db->insert_id();
        $result = $this->db->insert("employer", $dbEmployerData);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function getEmployerDetailsByEmail($email_address, $user_role) {
        $this->db->select('*')
                 ->from('user')
                 ->join('employer', 'user.user_id = employer.user_id')
                 ->where('email_address', $email_address)
                 ->where("user_role", $user_role);
        $resultObj = $this->db->get();
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    public function getEmplyerDetailsByID($user_id, $user_role) {
        $this->db->select('*')
                 ->from('user')
                 ->join('employer', 'user.user_id = employer.user_id')
                 ->where('user.user_id', $user_id)
                 ->where("user_role", $user_role);
        $resultObj = $this->db->get();
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    public function updateEmployer($dbUserData, $dbEmployerData, $user_id){
        if(isset($dbUserData['email_address'])) {
            $this->db->where("email_address", $dbUserData['email_address']);
            $this->db->where("user_id != ", $user_id);
            $resultObj = $this->db->get("user");
            if ($resultObj->num_rows() > 0)
                return -1;
        }
        $this->db->trans_start();
        $this->db->update('user', $dbUserData, array("user_role" => "Employer", "user_id" => $user_id));
        if(count($dbEmployerData) != 0)
            $this->db->update('employer', $dbEmployerData, array("user_id" => $user_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    // ********************************* Contractor ************************************************ //
    public function addContractor($dbUserData, $dbContractorData) {
        $this->db->trans_start();
        $resultObj = $this->db->get_where("user", array("email_address" => $dbUserData['email_address'], "account_status !=" => "Pending"));
        if ($resultObj->num_rows() > 0)
            return -1;
        $this->db->insert("user", $dbUserData);
        $dbContractorData['user_id'] = $this->db->insert_id();
        $result = $this->db->insert("contractor", $dbContractorData);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function addContractorAndGetID($dbUserData, $dbContractorData) {
        $this->db->trans_start();
        $resultObj = $this->db->get_where("user", array("email_address" => $dbUserData['email_address'], "account_status !=" => "Pending"));
        if ($resultObj->num_rows() > 0)
            return -1;
        $this->db->insert("user", $dbUserData);
        $dbContractorData['user_id'] = $this->db->insert_id();
        $result = $this->db->insert("contractor", $dbContractorData);
        $this->db->trans_complete();
        return $dbContractorData['user_id'];
    }
    public function getPaymentPendingContractors() {
        $this->db->select('*')
                 ->from('user')
                 ->join('contractor', 'user.user_id = contractor.user_id')
                 ->where('DATE(membership_expires_on)', date("Y-m-d"))
                 ->where("user_role", "Contractor");
        $resultObj = $this->db->get();
        return $resultObj->result_array();
    }
    /* ------ generals -------------------------------- */
    public function getUserDetailsByEmail($email_address) {
        $this->db->select('*')
                 ->from('user')
                 ->where("LOWER(email_address) = LOWER('{$email_address}')");
        $resultObj = $this->db->get();
        if ($resultObj->num_rows() > 0) {
            $userDetailsList = $resultObj->result_array();
            $userDetails = $userDetailsList[0];
            if($userDetails['user_role'] == "Employer") {
                $this->db->select('*')
                     ->from('user')
                     ->join('employer', 'user.user_id = employer.user_id')
                     ->where("LOWER(email_address) = LOWER('{$email_address}')")
                     ->where("user_role", $userDetails['user_role']);
            }
            else {
                $this->db->select('*')
                     ->from('user')
                     ->join('contractor', 'user.user_id = contractor.user_id')
                     ->where("LOWER(email_address) = LOWER('{$email_address}')")
                     ->where("user_role", $userDetails['user_role']);
            }
            $resultObj = $this->db->get();
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else 
            return array();
    }
    public function getContractorDetailsByID($user_id, $user_role) {
        $this->db->select('*')
                 ->from('user')
                 ->join('contractor', 'user.user_id = contractor.user_id')
                 ->where('user.user_id', $user_id)
                 ->where("user_role", $user_role);
        $resultObj = $this->db->get();
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }    
    public function updateContractor($dbUserData, $dbContractorData, $user_id){
        if(isset($dbUserData['email_address'])) {
            $this->db->where("email_address", $dbUserData['email_address']);
            $this->db->where("user_id != ", $user_id);
            $resultObj = $this->db->get("user");
            if ($resultObj->num_rows() > 0)
                return -1;
        }
        $this->db->trans_start();
        if(count($dbUserData) != 0)
            $this->db->update('user', $dbUserData, array("user_role" => "Contractor", "user_id" => $user_id));
        if(count($dbContractorData) != 0)
            $this->db->update('contractor', $dbContractorData, array("user_id" => $user_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    public function getList($conditionArray = array()) {
        $resultObj = $this->db->get_where("users", $conditionArray);
        return $resultObj->result_array();
    }
    public function update($updateData, $updateConditionArray) {
        return $this->db->update('users', $updateData, $updateConditionArray);
    }
    public function delete($deleteConditionArray) {
        return $this->db->delete('users', $deleteConditionArray);
    }
    
     public function resetPassword( $user_id, $newpass )
    {
        $data = array('password' => $newpass);
        $this->db->where('user_id ', $user_id);
        $this->db->update('user', $data);
        return $this->db->affected_rows() > 0;
    }
    
    public function getUserByID($user_id)
    {
        $this->db->select("*")
                ->from("user")
                ->where("user.user_id = {$user_id} ");
        $resultObj = $this->db->get();        
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }

    public function getContractorDetailsByAccessCode($access_code) {
        $this->db->select('*')
                 ->from('user')
                 ->join('contractor', 'user.user_id = contractor.user_id')
                 ->where('contractor.access_code', $access_code);
        $resultObj = $this->db->get();
        if ($resultObj->num_rows() > 0) {
            $rows = $resultObj->result_array();
            return $rows[0];
        }
        else
            return array();
    }
    
}
?>