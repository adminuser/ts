<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();
		if(!$this->isAuthenticated()){
			redirect('account/logout');
		}		
	}

	public function editProfile(){
		$user_model = $this->getModel('User_Model');
		$userid = $this->getLoggedInUserId();
		$userInfo = $this->getSessionData('userinfo');	
		$this->setTemplate('user');		
		if($this->isMethod('post')){
			//Validation 
			$this->load->library('form_validation');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');			
			$this->form_validation->set_rules('gender', 'Gender', 'required');				
			$this->form_validation->set_rules('primary_skillid', 'Primary Skill', 'required|callback_zeroCheck');
			$this->form_validation->set_rules('secondary_skillid', 'Secondary Skill', 'required');
			$this->form_validation->set_rules('zipcode', 'Zip Code', 'required|numeric');
			if($this->form_validation->run() === false ){
				$userProfile = $user_model->getUserProfileByUserId($userid,'candidate');
				$skillMap = $this->getModel('Skill_Model')->getSkillMap();				
				$visaTypes = $this->getModel('User_Model')->getVisaTypes();
				$countryList = $this->getModel('User_Model')->getCountryList();
				$this->render('account/candidate/vieweditprofile',$data = array('userProfile' => $userProfile ,'skillMap' => $skillMap,'userInfo'=>$userInfo,
				'visaTypes' => $visaTypes,'countryList' => $countryList));
				return false;
			}					

			$result = $user_model->editUserProfileByUserId($userid);
			$this->updateSessionData($userid);		
			if($result){
				$this->render('account/candidate/editprofile_success');
			}else{
				$this->render('account/candidate/editprofile_failure');
			}
		}else{
			$this->setTemplate('user');
			$this->setTitle('My Profile');
			$userProfile = $user_model->getUserProfileByUserId($userid,'candidate');
			$skillMap = $this->getModel('Skill_Model')->getSkillMap();
			$visaTypes = $this->getModel('User_Model')->getVisaTypes();
			$countryList = $this->getModel('User_Model')->getCountryList();
			$this->render('account/candidate/vieweditprofile',$data = array('userProfile' => $userProfile ,'skillMap' => $skillMap,'userInfo'=>$userInfo,
				'visaTypes' => $visaTypes,'countryList' => $countryList));
		}
	}

	public function zeroCheck($str){
			if ($str == 0)
			{
				$this->form_validation->set_message('zeroCheck', 'Primary skill is mandatory');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
	}

	public function getAllBatchBySkill(){
		$this->setTemplate('user');		
		$batch_model = $this->getModel('Batch_Model');
		$userInfo = $this->getSessionData('userinfo');
		$allBatch = $batch_model->getAllBatchBySkill($userInfo['skillid']);

		//Batch status display array
		$batchStatusMap = array(
							'adminonly' => 'Admin Only',
							'readytorelease' => 'Ready To Release',
							'released' 	=> 'Released',
							'ongoing'	=> 'On Going',
							'completed' => 'Completed'
						);

		$skillMap = $this->getModel('Skill_Model')->getSkillMap();
		//print_r($skillMap);
		$data = array('allBatch' => $allBatch,'batchStatusMap' => $batchStatusMap ,'skillMap' => $skillMap,'displayContent' => 'Batch Listing');
		if($userInfo['user_type'] == 'candidate'){
			$this->render('account/candidate/viewallbatch',$data);
		}else{
			$this->render('account/trainer/viewallbatch',$data);	
		}
	}

	public function resume(){
		$this->setTemplate('user');
		$this->setTitle('Resume');
		$userInfo = $this->getSessionData('userinfo');
		$resumeInfo = $this->getModel('User_Model')->getResumeDetails($userInfo['userid']);
		if($resumeInfo->resume_orgname != null){
			$download_path = base_url().'uploads/resumes/'.$resumeInfo->resume_orgname;	
			$this->render('account/candidate/viewuploadresume',$data = array('download_path'=> $download_path,'resumeInfo'=>$resumeInfo));		
		}else{
			$this->render('account/candidate/viewuploadresume',$data = array('resumeInfo'=>$resumeInfo));			
		}
	}

	public function resumeUpload(){
		$this->setTemplate('user');
		$this->setTitle('Resume');		
		$userInfo = $this->getSessionData('userinfo');
		$msg=$this->do_upload();		
		$uploadarray=isset($this->data)?$this->data:0;
		if($uploadarray != 0){
			$this->getModel('User_Model')->updateUserResumeDetails($uploadarray[0]['resume'],$userInfo['userid']);
			$resumeInfo = $this->getModel('User_Model')->getResumeDetails($userInfo['userid']);			
			$this->render('account/candidate/viewuploadresume',$data = array('info'=> 'Resume Uploaded Successfully','resumeInfo'=>$resumeInfo));
		}else{
			$this->render('account/candidate/viewuploadresume',$data = array('info'=> 'Failed to upload resume','msg'=>$msg));
		}
	}

	public function resumeDownload(){
		$this->setTemplate('user');
		$this->setTitle('Resume');		
        $this->load->helper('download'); //load helper
		$userInfo = $this->getSessionData('userinfo');
		$resumeInfo = $this->getModel('User_Model')->getResumeDetails($userInfo['userid']);	
		$download_path = base_url().'uploads/resumes/'.$resumeInfo->resume_orgname;  
		$this->render("account/candidate/viewuploadresume",$data = array('download_path'=> $download_path,'resumeInfo'=>$resumeInfo)); 
	}

	public function candidateResumes(){
		$this->setTemplate('user');
		$this->setTitle('Resume');
		$allResumeInfo = $this->getModel('User_Model')->getAllResumeDetails();		
		//print_r($allResumeInfo);
		$this->render("account/resumewriter/viewallcandidate_resumes",$data = array('allResumeInfo'=>$allResumeInfo));		
	}


	//Function to Upload Photos and Datasheets
	public function do_upload(){
		$config['upload_path'] = './uploads/resumes';
		$config['allowed_types'] =  'pdf|doc|docx';//'pdf|doc|docx|xls|xlsx|txt';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '1024';
		$this->load->library('upload', $config);		
		$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('resume')){
				$error = array('error' => $this->upload->display_errors());
				return $error;
				if(strcmp($error['error'],"You did not select a file to upload.")!==false){
					$this->data[]="0";
				}
			}else{
				$this->data[] = array('resume' => $this->upload->data());
			}
		}		




}

?>