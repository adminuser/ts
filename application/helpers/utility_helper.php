<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_random_string($length){
	$str = '';
	$chars = "12346789abcdfghjkmnpqrtvwxyzABCDFGHJKLMNPQRTVWXYZ";

	$maxlength = strlen($chars);
	if ($length > $maxlength) {
		$length = $maxlength;
	}

	$i = 0;
	while ($i < $length) {
		$char = substr($chars, mt_rand(0, $maxlength - 1), 1);
		if (!strstr($str, $char)) {
			$str .= $char;
			$i++;
		}
	}

	return $str;
}

function getClientIP() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
		$ip = getenv("REMOTE_ADDR");
	} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = "unknown";
	}
	return($ip);
}

function getUserTypes(){
	return array('candidate' => 'candidate',
				'trainer' => 'trainer',
				'resumewriter' => 'resumewriter'
				);
}

 	 /**
	  * Helper methods - start 
	  */

function getVisaTypes(){
		return array('F1' => 'F1',
							'J1' => 'J1',
							'J2' => 'J2',
							'H1' => 'H1',
							'H4' => 'H4',
							'None'=> 'None',
							'Others'=>'Others'
							);
	}
	
function getCountryList(){
		return array('India' => 'India',
							'US' => 'US',
							'UK' => 'UK',
							'Pakistan' => 'Pakistan',
							'Iran' => 'Iran',
							'Iraq' => 'Iraq',
							'Bangladesh' => 'Bangladesh',
							'Bhutan' => 'Bhutan',
							'Nepal' => 'Nepal'
							);

	}

   /**
   * Helper methods - end
   */
