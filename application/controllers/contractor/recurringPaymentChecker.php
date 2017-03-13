<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RecurringPaymentChecker extends AppController {

    function __construct() {
        parent::__construct();
    }

    public function manageAuthentication() {
        $publicUri = array("checkRecurringPaymentDue");

        $currentMethod = $this->router->fetch_method();
        if (!in_array($currentMethod, $publicUri)) {
            $this->checkContractor();
        }
    }

    public function checkRecurringPaymentDue() {
    	$this->load->library("app_eway_payment");
    	$paymentRenewerContractorList = $this->User_model->getPaymentPendingContractors();
        
    	foreach($paymentRenewerContractorList as $aContractor) {
    		$tokenCustomerID = $aContractor["tokenCustomerID"];
    		if($tokenCustomerID == "") {
    			continue;
    		}

            $txnCreationResult = $this->app_eway_payment->doRecurringTokenPayment($aContractor);
            
            if($txnCreationResult["responseStatus"]) {
                $transactionDbData = array();
                $transactionDbData["transaction_id"] = $txnCreationResult['data']->TransactionID;
                $transactionDbData["isTokenPayment"] = 1;
                $transactionDbData["invoiceDescription"] = $txnCreationResult['data']->Payment->InvoiceDescription;
                $transactionDbData["currencyCode"] = $txnCreationResult['data']->Payment->CurrencyCode;
                $transactionDbData["user_id"] = $txnCreationResult['data']->Customer->Reference;
                $transactionDbData["payment_for"] = "Membership_fee";
                $transactionDbData["transactionType"] = $txnCreationResult['data']->TransactionType;
                $transactionDbData["totalAmount"] = $txnCreationResult['data']->Payment->TotalAmount;
                $transactionDbData['tokenCustomerID'] = $txnCreationResult['data']->Customer->TokenCustomerID;
                $this->Payment_details_model->add($transactionDbData);

                $contractorUpdateResult = $this->User_model->updateContractor(array("account_status" => "Active"), array("membership_expires_on" => date('Y-m-d H:i:s', strtotime('+1 months'))), $aContractor["user_id"]);
            } else {
                $contractorUpdateResult = $this->User_model->updateContractor(array("account_status" => "Expired"), array(), $aContractor["user_id"]);
            }


    	}
    }
}