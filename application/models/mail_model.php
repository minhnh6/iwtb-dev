<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Mail_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /**
     * 
     * Parameter: 
     * - $protocol can be 'smtp' or  'mail' of PHP
     * - $params['recipient']       :  received emails 
     * - $params['subject']         :  subject of email
     * - $params['message']         :  Message /Body of email
     * - $params['attached_file']   :  attched file goes with email   
     *  */  
    public function sendEmail($protocol, $params) {
        // If using SMTP    
		if ($protocol  == 'smtp') 
        {
			$this->load->library('encrypt');
            $smtp_pass = 'Asj5DIOJI/agD8SxedFr2ffjoMgfmxx8jKqUc01nt7le';
            $smtp_host = 'email-smtp.us-west-2.amazonaws.com';
            $smtp_port = '465';
            $smtp_user = 'AKIAILSVFTD5TASGJL4A';
			$raw_smtp_pass =  $this->encrypt->decode($smtp_pass);
			$config = array(
					'smtp_host' => $smtp_host,
					'smtp_port' => $smtp_port,
					'smtp_user' => $smtp_user,
					'smtp_pass' => $raw_smtp_pass,
					'crlf' 		=> "\r\n",    							
					'protocol'	=> $protocol,
			);						
	    }
        else
        {
            $config['protocol'] = 'mail'; 
        }
    	// Send email 
		$config['useragent'] = 'Freelance Office';        
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $config['starttls'] = true;
		$config['charset'] = 'utf-8';
        $config['encoding'] = '8bit';
		$config['wordwrap'] = TRUE;
		$this->load->library('email');        
        $this->email->initialize($config);
        $company_email = 'iwtb.support@perceptivemind.com.au';
        $company_name = 'IWTB Company';
        if(empty($company_email) || $company_email == '')
        {
            $company_email = 'info@perceptivemind.com.au';
        }
        if(empty($company_name) || $company_name == '')
        {
            $company_name = '';
        }
		$this->email->from($company_email, $company_name);
		$this->email->to($params['recipient']);
		$this->email->subject($params['subject']);
		$this->email->message($params['message']);
	    if($params['attached_file'] != ''){ 
	    	$this->email->attach($params['attached_file']);
	    }
		$this->email->send();
        return $this->email->print_debugger();
    }
}
?>