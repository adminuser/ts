<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();
		
		if(!$this->isAuthenticated()){
			redirect('account/logout');
		}		
	}

	public function index(){
		if(!$this->isAuthenticated()){
			$this->render('account/auth/login_form');
		}
	}

	public function goToDashBoard(){ 	
		//print_r($this->getSessionData('userinfo'));exit;
		$userInfo = $this->getSessionData('userinfo');

		//checking user profile status 
		if( ($userInfo['is_profilecomplete'] == 0) && ($userInfo['user_type']!='superadmin') && ($userInfo['user_type']!='resumewriter') ){
			redirect('profile');
		}

		if($userInfo['user_type'] == "superadmin"){
			$this->setTemplate('management');
			$this->setTitle('Management');
			$this->render('dashboard/management_dashboard',$data = array('userInfo' => $userInfo));
		}elseif($userInfo['user_type'] == "candidate"){
			$this->setTemplate('user');
			$this->setTitle('Candidate Dashboard');
			$this->render('dashboard/candidate_dashboard',$data = array('userInfo' => $userInfo));
		}elseif ($userInfo['user_type'] == "trainer") {
			$this->setTemplate('user');
			$this->setTitle('Trainer Dashboard');
			$this->render('dashboard/trainer_dashboard',$data = array('userInfo' => $userInfo));
		}elseif ($userInfo['user_type'] == "resumewriter") {
			$this->setTemplate('user');
			$this->setTitle('Resume Writer');			
			$this->render('dashboard/resumewriter_dashboard');
		}

	}
}
?>