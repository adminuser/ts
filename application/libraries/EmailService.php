<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class EmailService 
{

	public $fromEmail;
	public $fromName;
	public $to;
	public $subject;
	public $message;

	public function __construct(){
	}

	public function tsSendMail(){			
		/*
		smtp_host: smtp.gmail.com
		smtp_port: 465 or 587
		smtp_ssl: 1
		https://www.google.com/settings/security/lesssecureapps
		*/

		$config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'commontest2016@gmail.com',    //email id
        'smtp_pass' => 'test!@#$',            // password
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    	);
    	$this->load->library('email', $config);
    	$this->email->set_newline("\r\n");	

		$this->email->initialize($config);
		$this->email->from('No Reply', 'Talent Shores Support Team');
		$this->email->to($to);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject($subject);
		$this->email->message($message);

		try{
			if($this->email->send()){
				return 'success';
			}else{
				return 'failure';
			}
		}catch(Exception $e){
			return 'error';	
		}

		//echo $this->email->print_debugger();
	}

}

?>