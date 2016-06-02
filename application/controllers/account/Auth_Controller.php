<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Auth_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();		
	}

	public function index(){
		$this->setTitle('Talent Shores');
		$this->render('account/auth/homepage');
	}

	public function login(){
		if($this->isMethod('post')) {
			$session_id = $this->session->userdata('session_id');   
			$username=$this->input->post('txtuname');
			$password = $this->input->post('txtpass');
			$user_model = $this->getModel('User_Model');

			$result = $user_model->checkAuthentication($username,$password);
			//print_r($result);exit;
			if(!empty($result)){ 
				$userInfo = $user_model->getUserById($result['userid']);
				if (!empty($userInfo)){ 						
					$this->setAuthenticated(true);				
					// store user info to session
					$this->setSessionData('userinfo', $userInfo);
					if(isset($_POST['forum'])){
						redirect('forum');
					}else{
						redirect('dashboard');							
					}				
			
				}else { 
					$this->setFlash('error', true);
					if(isset($_POST['forum'])){
						redirect('forum');
					}						
					redirect('account/login');
				}
			}else{
				$this->render('account/auth/login_form',$data = array('info' =>'User does not exist' ));
			}
		}elseif(!$this->isAuthenticated()){
			//redirect("dashboard");
			$this->render('account/auth/login_form');
		}else{
			$this->render('account/auth/login_form');
		}
	
	}

	public function forumLogin(){
		$this->render('account/auth/forum_login');
	}
	public function forumLogout(){
		$session_id = $this->session->userdata('session_id');
		$this->db->delete('ts_sessions', array('session_id'=>$session_id));
		 
		$this->setAuthenticated(false);
		redirect('forumlogin');
	}	


	public function logout(){
		$session_id = $this->session->userdata('session_id');
		$this->db->delete('ts_sessions', array('session_id'=>$session_id));
		 
		$this->setAuthenticated(false);
		redirect('account/login');
	}


}
