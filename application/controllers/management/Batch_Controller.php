<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Batch_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();	

		if(!$this->isAuthenticated()){
/*			if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
				echo 'timeout';
			}else{*/
				redirect('account/logout');				
			//}

		}		
	}

	public function addBatch(){
		$this->setTemplate('management');		
		if($this->isMethod('post')){
			$batch_model = $this->getModel('Batch_Model');
			$result = $batch_model->addBatch();		
			if($result){
				$this->render('management/batch/addbatch_success');
			}else{
				$this->render('management/batch/addbatch_failure');
			}

		}else{
			$allSkills = $this->getAllSkills();		
			$this->render('management/batch/addbatch',$data = array('allSkills' => $allSkills ));
		}
		
	}

	public function getAllBatch(){
		$this->setTemplate('management');		
		$batch_model = $this->getModel('Batch_Model');
		$allBatch = $batch_model->getAllBatch();

		//Batch status display array
		$batchStatusMap = array(
							'adminonly' => 'Admin Only',
							'readytorelease' => 'Ready To Release',
							'released' 	=> 'Released',
							'ongoing'	=> 'On Going',
							'completed' => 'Completed'
						);

		$skillMap = $this->getSkillMap();
		//print_r($skillMap);
		$data = array('allBatch' => $allBatch,'batchStatusMap' => $batchStatusMap ,'skillMap' => $skillMap,'displayContent' => 'Batch Listing');
		$this->render('management/batch/viewallbatch',$data);
	}
	

	public function getBatchById(){
		$this->setTemplate('management');		
		$batch_model = $this->getModel('Batch_Model');
		$batch = $batch_model->getBatchById();
		//print_r($batch);exit;
		$allSkills = $this->getAllSkills();
		//print_r($allSkills);
		$skillMap = $this->getSkillMap();
		$displayContent = 'Batch details';
		$data = array('myBatch' => $batch,'allSkills' => $allSkills ,'skillMap' => $skillMap,'displayContent' => $displayContent);
		$this->render('management/batch/vieweditbatch',$data);
	}

	public function editBatch(){
		$this->setTemplate('management');		
		$batch_model = $this->getModel('Batch_Model');
		$batch_model->editBatch();
		$this->render('management/batch/editbatch_success');
	}	

	
	public function getSkillMap(){
		$allSkills = $this->getAllSkills();
		$skillMap = array();
		//print_r($allSkills);
		foreach ($allSkills as $skill) {
			$skillMap[$skill->skillid] = $skill->skillname;
		}
		return $skillMap;
	}

	public function getAllSkills(){
		$this->getModel('Skill_Model');
		return $this->Skill_Model->getAllSkills();
	}

	public function getAllTrainersWithSkill(){
		$user_model = $this->getModel('User_Model');
		$user_model->getAllTrainers();
	}

	public function allocateBatch(){
		$this->setTemplate('management');
		$this->javascripts('management/batch/allocate_batch.js');
		$this->stylesheets('management/batch/allocate_batch.css');
		if($this->isMethod('post')){

		}else{
			//get Skills
			$skillMap = $this->getSkillMap();
			$this->render('management/batch/allocate_batch',array('skillMap'=>$skillMap));
		}
	}

	public function getTrainersBySkill(){
		$user_model = $this->getModel('User_Model');
		$trainers = $user_model->getTrainersBySkill();
		$skillMap = $this->getSkillMap();
		echo $this->load->view('management/batch/trainer_dropdown_by_id',array('trainers'=>$trainers,'skillMap'=>$skillMap),true);
	}

	public function getTrainersByBatch(){
		$user_model = $this->getModel('User_Model');
		$trainers = $user_model->getTrainersBySkill();
		$skillMap = $this->getSkillMap();
		echo $this->load->view('management/batch/trainer_dropdown_by_id',array('trainers'=>$trainers,'skillMap'=>$skillMap),true);
	}

	public function getReleasedBatchesBySkill(){
		$batches = $this->getModel('Batch_Model')->getReleasedBatchesBySkill();
		echo $this->load->view('management/batch/batch_dropdown_by_skill',array('batches'=>$batches),true);
	}	

	public function getBatchCandBySkill(){
		
	}

	public function testMail(){
		$this->setTemplate('management');
		$to = 'a.chethan3@gmail.com';
		$subject = 'TS';
		$message = $this->load->view('mail/signup_welcome',array(),true); //'TEST MESSAGE';

		if($this->tsSendMail($to,$subject,$message) == 'success'){
			$this->render('management/batch/addbatch_success');
		}else{
			$this->render('management/batch/addbatch_failure');
		}
		
	}



}

?>