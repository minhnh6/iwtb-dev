<?php

if (!defined('BASEPATH'))
      exit('No direct script access allowed');

class Trade_model extends CI_Model {

      function __construct()
      {
            parent::__construct();
            $this->load->database();
      }

      public function getList()
      {
            $this->db->order_by("trade_name", "ASC");
            $resultObj = $this->db->get("trade");
            return $resultObj->result_array();
      }

}

?>