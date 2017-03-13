<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_details_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add($dbData) {
        return $this->db->insert("payment_details", $dbData);
    }
    
    public function update($dbData, $conditionArray = array()) {
        $this->db->where($conditionArray);
        $this->db->update('payment_details', $dbData);
        return $this->db->affected_rows() > 0;
    }
}
?>