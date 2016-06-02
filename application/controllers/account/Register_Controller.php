<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Register_Controller extends TS_Controller
{
	//public $userType;


	public function __construct(){
		parent:: __construct();
	}

	public function index(){
		$this->setTitle('Sign Up');
		$this->render('account/register/register_pre_form');
	}

	public function candidatePreSignUp(){
		$this->setTitle('Candidate Sign Up');
		$this->render('account/register/register_form');
	}

	public function trainerPreSignUp(){
		$this->setTitle('Trainer Sign Up');
		$this->render('account/register/register_form_trainer');
	}

	public function signUp(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtuname', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('txtpass', 'Password', 'required|matches[txtpass]|min_length[6]');
		$this->form_validation->set_rules('txtcpass', 'Confirm Password', 'required|matches[txtpass]|min_length[6]');
		$this->userType = $this->input->post('signup-type');
	
		if($this->form_validation->run() === false ){
			$this->setTitle('Sign Up');
			if($this->userType == 'candidate'){
				$this->render('account/register/register_form');
			}
			if($this->userType == 'trainer'){
				$this->render('account/register/register_form_trainer');				
			}			
		}else{
			$user_model = $this->getModel('User_Model');
			$isCreated = $user_model->createUser();
			if($isCreated){
				$this->render('account/register/register_success');
			}

		}


	}


}
?>