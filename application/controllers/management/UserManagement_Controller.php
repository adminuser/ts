<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class UserManagement_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();
		
		if(!$this->isAuthenticated()){
			redirect('account/logout');
		}			
	}

	public function addUser(){		
		$this->setTemplate('management');
		$this->setTitle('Management');		
		if($this->isMethod('post')){
			$result = $this->getModel('User_Model')->createUser();
			//$es = $this->load->library('EmailService');
			$to = $result['email'];	
			$subject = 'Your Talent Shores Account ';
			$message = "<h1>Your Talent Shores account has been created successfully.</h1>".
						"Please find the below credentials <br>".
						"Username : ".$result['email']." <br>".
						"Password : ".$result['password']." <br><br>
						<a href='".$this->config->base_url()."account/login'>Click here to login</a>";

			$res = @$this->tsSendMail($to,$subject,$message);
			$this->render('account/user/adduser_success',$data = array('mailResult'=>$res));
		}else{
			$this->render('account/user/adduser');
		}
	}

	public function editUser(){

	}

	public function getUserById(){

	}

	public function getAllUsers(){ 
		$this->setTemplate('management');
		$this->setTitle('Management');			
		$user_model  = $this->getModel('User_Model');
		$user_type = 'candidate';
		$allUsers = $user_model->getAllUsers($user_type);			

		if($user_type == 'candidate'){
			$displayContent = ($user_type == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}else{
			$displayContent = ($user_type == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}
		//$viewData = $this->load->view('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent),true);
		//echo $viewData;
		$this->render('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent));		
	}
	public function getTrainers(){ 
		$this->setTemplate('management');
		$this->setTitle('Management');			
		$user_model  = $this->getModel('User_Model');
		$user_type = 'trainer';
		$allUsers = $user_model->getAllUsers($user_type);			

		if($user_type == 'trainer'){
			$displayContent = ($user_type == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}else{
			$displayContent = ($user_type == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}
		//$viewData = $this->load->view('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent),true);
		//echo $viewData;
		$this->render('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent));		
	}	

	public function filterUsers(){
		$this->setTemplate('management');
		$this->setTitle('Management');			
		$user_model  = $this->getModel('User_Model');
		$allUsers = $user_model->filterUsers();

		if(isset($_POST['user_type'])){
			$displayContent = ($this->input->post('user_type') == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}elseif (isset($_GET['user_type'])) {
			$displayContent = ($this->input->get('user_type') == 'candidate')? 'Candidates Listing':'Trainers Listing';
		}
		//$viewData = $this->load->view('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent),true);
		$filterKeys = $_POST;
		$this->render('management/user/viewallusers',$data = array('allUsers' => $allUsers,'displayContent' => $displayContent,'filterKeys'=>$filterKeys));
	}


}

?>