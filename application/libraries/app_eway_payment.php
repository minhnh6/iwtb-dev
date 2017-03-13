<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class App_Eway_Payment {

    private $apiKey = '44DD7CMQ3qOMpwial90ob0EweCCW7EYW5FSMwIPepTnbClBvs3HcWrxicmvDwJ+xEbGAyT';
    private $apiPassword = '0ifgB2z6';
    private $apiEndpoint = 'Sandbox';
    private $client = null;
    private $projectPostingFee = 100; // amount is like 100 = 1.00, 10000 = 100.00 //
    private $membershipFee = array("1" => 50, "2" => 100); // membership plan ID => membership fee //
    private $hiringProjectMangerFee = 1000;

    public function __construct() {
        require_once APPPATH . 'third_party/eway-rapid-php-master/include_eway.php';
        $this->client = \Eway\Rapid::createClient($this->apiKey, $this->apiPassword, $this->apiEndpoint);
    }

    public function createProjectPostingTransaction($transactionData) { // used one time for project posting fee //
        
        $transaction = [

		    "Customer" => [
		    	"Reference" => $transactionData['user_id'],
		        "Title" => $transactionData['title'],
		        "FirstName" => $transactionData['first_name'],
		        "LastName" => $transactionData['surename'],
		        "Email" => $transactionData['email_address'],
		        "Country" => "au",
		    ],

		    "Items" => [
		        [
		            "Description" => $transactionData['paymentDescription'],
		            "Quantity" => 1,
		            "UnitCost" => $this->projectPostingFee,
		        ],
		    ],

		    'Options' => [
		        [
		            'payment_for' => 'Posting_project',
		        ],

		        [
		            'project_id' => "",
		        ],

		    ],

		    "Payment" => [
		        "TotalAmount" => $this->projectPostingFee,
		        'InvoiceDescription' => "Inv-" . uniqid() . "-" . $transactionData['user_id'],
		        "CurrencyCode" => "AUD",
		    ],

		    "RedirectUrl" => base_url() . "employer/project/addNew",
		    "CancelUrl" => base_url() . "employer/project/cancelPayment",
		    "CustomerIP" => $_SERVER['REMOTE_ADDR'],
		    "TransactionType" => \Eway\Rapid\Enum\TransactionType::PURCHASE,
		    "Capture" => true,
		    "HeaderText" => "I Want To Buid",
		    "Language" => "EN",
		    "CustomerReadOnly" => true
		];
        
        $response = $this->client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);
        if (!$response->getErrors()) {
            return array("responseStatus" => 1, "data" => $response);
        } else {
            $responseError = "";
            foreach ($response->getErrors() as $error) {
                $responseError .= "Error: " . \Eway\Rapid::getMessage($error) . "<br>";
            }
            return array("responseStatus" => 0, "ErrorMessage" => $responseError);
        }
    }


    public function createMembershipFirstTimeTransaction($transactionData) { // used for the first time for any contractor for its membership fee //
        
        $transaction = [

		    "Customer" => [
		    	"Reference" => $transactionData['user_id'],
		        "Title" => "Mr.",
		        "FirstName" => $transactionData['first_name'],
		        "LastName" => $transactionData['last_name'],
		        "Email" => $transactionData['email_address'],
		        "Country" => "au",
		    ],

		    "Items" => [
		        [
		            "Description" => $transactionData['paymentDescription'],
		            "Quantity" => 1,
		            "UnitCost" => $this->membershipFee[$transactionData["membership_plan_id"]],
		        ],
		    ],

		    'Options' => [

		        [
		            'Value' => $transactionData["membership_plan_id"],
		        ],

		    ],

		    "Payment" => [
		        "TotalAmount" => $this->membershipFee[$transactionData["membership_plan_id"]],
		        'InvoiceDescription' => "Inv-" . uniqid() . "-" . $transactionData['user_id'],
		        "CurrencyCode" => "AUD",
		    ],

		    "RedirectUrl" => base_url() . "contractor/membershipUpgradePaymentVerification",
		    "CancelUrl" => base_url() . "contractor/membershipUpgradePaymentCancel",
		    "CustomerIP" => $_SERVER['REMOTE_ADDR'],
		    'Method' => 'TokenPayment',
		    "TransactionType" => \Eway\Rapid\Enum\TransactionType::PURCHASE,
		    "Capture" => true,
		    "HeaderText" => "I Want To Buid",
		    "Language" => "EN",
		    "SaveCustomer" => 1,
		    "CustomerReadOnly" => true
		];
        
        $response = $this->client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);
        if (!$response->getErrors()) {
            return array("responseStatus" => 1, "data" => $response);
        } else {
            $responseError = "";
            foreach ($response->getErrors() as $error) {
                $responseError .= "Error: " . \Eway\Rapid::getMessage($error) . "<br>";
            }
            return array("responseStatus" => 0, "ErrorMessage" => $responseError);
        }
    }
    
    public function createManagerHiringTransaction($transactionData) {
        $transaction = [

		    "Customer" => [
		    	"Reference" => $transactionData['user_id'],
		        "Title" => $transactionData['title'],
		        "FirstName" => $transactionData['first_name'],
		        "LastName" => $transactionData['surename'],
		        "Email" => $transactionData['email_address'],
		        "Country" => "au",
		    ],

		    "Items" => [
		        [
		            "Description" => $transactionData['paymentDescription'],
		            "Quantity" => 1,
		            "UnitCost" => $this->hiringProjectMangerFee,
		        ],
		    ],

		    'Options' => [
		        [
		            'payment_for' => 'Hiring_project_manager',
		        ],

		        [
		            'project_id' => "",
		        ],

		    ],

		    "Payment" => [
		        "TotalAmount" => $this->hiringProjectMangerFee,
		        'InvoiceDescription' => "Inv-" . uniqid() . "-" . $transactionData['user_id'],
		        "CurrencyCode" => "AUD",
		    ],

		    "RedirectUrl" => base_url() . "employer/hiringIWTBProjectManagerPaymentConfirmation",
		    "CancelUrl" => base_url() . "employer/index",
		    "CustomerIP" => $_SERVER['REMOTE_ADDR'],
		    "TransactionType" => \Eway\Rapid\Enum\TransactionType::PURCHASE,
		    "Capture" => true,
		    "HeaderText" => "I Want To Buid",
		    "Language" => "EN",
		    "CustomerReadOnly" => true
		];
        
        $response = $this->client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);
        if (!$response->getErrors()) {
            return array("responseStatus" => 1, "data" => $response);
        } else {
            $responseError = "";
            foreach ($response->getErrors() as $error) {
                $responseError .= "Error: " . \Eway\Rapid::getMessage($error) . "<br>";
            }
            return array("responseStatus" => 0, "ErrorMessage" => $responseError);
        }
    }

    public function doRecurringTokenPayment($transactionData) {
    	$transaction = [

		    'Customer' => [
		        'TokenCustomerID' => $transactionData["tokenCustomerID"],
		    ],

		    'Payment' => [
		        'TotalAmount' => $this->membershipFee[$transactionData["membership_plan_id"]],
		    ],

		    'TransactionType' => \Eway\Rapid\Enum\TransactionType::RECURRING,

		];

		$response = $this->client->createTransaction(\Eway\Rapid\Enum\ApiMethod::DIRECT, $transaction);

		if (!$response->getErrors()) {
            return array("responseStatus" => 1, "data" => $response);
        } else {
            $responseError = "";
            foreach ($response->getErrors() as $error) {
                $responseError .= "Error: " . \Eway\Rapid::getMessage($error) . "<br>";
            }
            return array("responseStatus" => 0, "ErrorMessage" => $responseError);
        }
    }
    
    public function queryTransaction($accessCode) {
		$response = $this->client->queryTransaction($accessCode);
		$transactionResponse = $response->Transactions[0];
		
		if($transactionResponse->TransactionStatus){
			return array("responseStatus" => 1, "data" => $transactionResponse);
		} else {
			$errors = split(', ', $transactionResponse->ResponseMessage);
			$errorMessage = "";
		    foreach ($errors as $error) {
		        $errorMessage .= "Payment failed: " .
		            \Eway\Rapid::getMessage($error)."<br>";
		    }
		    return array("responseStatus" => 0, "errorMessage" => $errorMessage);
		}
	}

}

// transactionData sample for test, in case if anyone does not know about the format //
//$transactionData = [
//	    'Customer' => [
//	        'Reference' => 'A12345',
//	        'Title' => 'Mr.',
//	        'FirstName' => 'John',
//	        'LastName' => 'Smith',
//	        'CompanyName' => 'Demo Shop 123',
//	        'JobDescription' => 'Developer',
//	        'Street1' => 'Level 5',
//	        'Street2' => '369 Queen Street',
//	        'City' => 'Sydney',
//	        'State' => 'NSW',
//	        'PostalCode' => '2000',
//	        'Country' => 'au',
//	        'Phone' => '09 889 0986',
//	        'Mobile' => '09 889 6542',
//	        'Email' => 'demo@example.org',
//	        "Url" => "http://www.ewaypayments.com",
//	    ],
//	    'ShippingAddress' => [
//	        'ShippingMethod' => \Eway\Rapid\Enum\ShippingMethod::NEXT_DAY,
//	        'FirstName' => 'John',
//	        'LastName' => 'Smith',
//	        'Street1' => 'Level 5',
//	        'Street2' => '369 Queen Street',
//	        'City' => 'Sydney',
//	        'State' => 'NSW',
//	        'Country' => 'au',
//	        'PostalCode' => '2000',
//	        'Phone' => '09 889 0986',
//	    ],
//	    'Items' => [
//	        [
//	            'SKU' => '12345678901234567890',
//	            'Description' => 'Item Description 1',
//	            'Quantity' => 1,
//	            'UnitCost' => 400,
//	            'Tax' => 100,
//	            // Total is calculated automatically
//	        ],
//	        [
//	            'SKU' => '123456789012',
//	            'Description' => 'Item Description 2',
//	            'Quantity' => 1,
//	            'UnitCost' => 400,
//	            'Tax' => 100,
//	        ],
//	    ],
//	    'Options' => [
//	        [
//	            'Value' => 'Option1',
//	        ],
//	        [
//	            'Value' => 'Option2',
//	        ],
//	    ],
//	    'Payment' => [
//	        'TotalAmount' => 1000,
//	        'InvoiceNumber' => 'Inv 21540',
//	        'InvoiceDescription' => 'Individual Invoice Description',
//	        'InvoiceReference' => '513456',
//	        'CurrencyCode' => 'AUD',
//	    ],
//	    'RedirectUrl' => 'http://digups.perceptivemind.com.au/eway/end_transaction.php',
//	    'CancelUrl' => "http://www.eway.com.au",
//	    'DeviceID' => 'D1234',
//	    'CustomerIP' => '127.0.0.1',
//	    'PartnerID' => 'ID',
//	    'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
//	    'Capture' => true,
//	    'LogoUrl' => 'https://mysite.com/images/logo4eway.jpg',
//	    'HeaderText' => 'My Site Header Text',
//	    'Language' => 'EN',
//	    'CustomerReadOnly' => true
//	];
?>