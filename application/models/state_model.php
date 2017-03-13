<?php

if (!defined('BASEPATH'))
      exit('No direct script access allowed');

class State_model extends CI_Model {

      function __construct()
      {
            parent::__construct();
            $this->load->database();
      }

      public function getList()
      {
            $this->db->order_by("name", "ASC");
            $resultObj = $this->db->get("state");
            return $resultObj->result_array();
      }
      public function getStateByID($state_id) {
        $this->db->select("*")
                ->from("state")
                ->where("state.id", $state_id);
        $resultObj = $this->db->get();
        return $resultObj->first_row("array");
    }
}
