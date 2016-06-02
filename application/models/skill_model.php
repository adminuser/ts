<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Skill_Model extends TS_Model
{

	protected $skillname;
	protected $skillsyllabus;
	protected $skillid = 0;

	public function __construct(){
		parent:: __construct();
	}

	public function addSkill(){
		$skillname 		= ($this->input->post('skillname') != false) ? trim($this->input->post('skillname')) : null;
		$skillsyllabus 	= ($this->input->post('syllabus') != false) ? trim($this->input->post('syllabus')) : null;

		$insertData = array('skillname' => $skillname,
							'skillsyllabus' => $skillsyllabus
							);
		$this->db->insert('skill',$insertData);
		$autoId = $this->db->insert_id();
		return $autoId;
	}

	public function editSkill(){
		$skillid 		= ($this->input->post('skillid') != false) ? trim($this->input->post('skillid')) : null;		
		$skillname 		= ($this->input->post('skillname') != false) ? trim($this->input->post('skillname')) : null;
		$skillsyllabus 	= ($this->input->post('syllabus') != false) ? trim($this->input->post('syllabus')) : null;

		$updateData = array('skillname' => $skillname,
							'skillsyllabus' => $skillsyllabus
							);
		$this->db->where('skillid',$skillid);
		$this->db->update('skill',$updateData);		
	}

	public function getAllSkills(){
		$this->db->select('skillid,skillname,status,is_deleted');
		$resultant = $this->db->get('skill');
		return $resultant->result();
	}


	public function getSkillById(){
		if(isset($_POST['skillid'])){
			$skillid = $this->input->post('skillid');			
		}elseif(isset($_GET['skillid'])){
			$skillid = $this->input->get('skillid');			
		}
		if($skillid == 0 ){
			return array();
		}

		$query = 'SELECT skillid,skillname,skillsyllabus,status,is_deleted
					FROM skill
					WHERE skill.skillid = ? ';
		$resultant = $this->db->query($query, array($skillid));
		return $resultant->row();
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

	public function deleteSkill(){

	}


	
}
?>