<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Skill_Controller extends TS_Controller
{
	public function __construct(){
		parent:: __construct();

		if(!$this->isAuthenticated()){
			redirect('account/logout');
		}			
	}

	public function addSkill(){
		$this->setTemplate('management');		
		if($this->isMethod('post')){
			$skill_model = $this->getModel('SKill_Model');
			$result = $skill_model->addskill();		
			if($result){
				$this->render('management/skill/addskill_success');
			}else{
				$this->render('management/skill/addskill_failure');
			}

		}else{			
			$this->render('management/skill/addskill');
		}

	}

	public function getAllSkills(){
		$this->setTemplate('management');		
		$skill_model = $this->getModel('SKill_Model');
		$allSkills = $skill_model->getAllSkills();
		$data = array('allSkills' => $allSkills,'displayContent' => 'Skills Listing');
		$this->render('management/skill/viewallskills',$data);
	}
	

	public function getSkillById(){
		$this->setTemplate('management');		
		$skill_model = $this->getModel('SKill_Model');
		$skill = $skill_model->getSkillById();
		//print_r($skill);exit;
		$displayContent = 'Skill details';
		$data = array('skill' => $skill,'displayContent' => $displayContent);
		$this->render('management/skill/vieweditskill',$data);
	}

	public function editSkill(){
		$this->setTemplate('management');	
		$skill_model = $this->getModel('SKill_Model');
		$skill = $skill_model->editSkill();
		$this->render('management/skill/editskill_success');		
	}

	

}
?>