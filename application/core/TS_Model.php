<?php
class TS_Model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * Retrieve data from session
	 * @param string $key Key to retrieve
	 */
	public function getSessionData($key){
		return $this->session->userdata($key);
	}
}
