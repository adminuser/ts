<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Batch_Model extends TS_Model
{

	private $batchid;
	private $batchname;
	private $startdate;
	private $enddate;
	private $starttime;
	private $endtime;
	private $releasedate;
	private $trainer_1;
	private $trainer_2;
	private $is_trainer_1_active;
	private $is_trainer_2_active;
	private $status;

	private $ql;

	public function __construct(){
		parent:: __construct();
	}


	public function addBatch(){

		$insertData = array(
						'batchname' 	=> 	($this->input->post('batchname') != false) ? trim($this->input->post('batchname')) : null,
						'skillid'		=>	($this->input->post('skillid') != false) ? trim($this->input->post('skillid')) : null,
						'startdate'		=>	($this->input->post('startdate') != false) ? trim($this->input->post('startdate')) : null,
						'enddate'		=>	($this->input->post('enddate') != false) ? trim($this->input->post('enddate')) : null,
						'starttime'		=>	($this->input->post('starttime') != false) ? trim($this->input->post('starttime')) : null,
						'endtime'		=>	($this->input->post('endtime') != false) ? trim($this->input->post('endtime')) : null,		
						'releasedate'	=>	($this->input->post('releasedate') != false) ? trim($this->input->post('releasedate')) : null,	
						'trainer_1' 	=>	($this->input->post('trainer_1') != false) ? trim($this->input->post('trainer_1')) : 0,
						'status'		=>	($this->input->post('status') != false) ? trim($this->input->post('status')) : null			
						);

		$this->db->insert('batch',$insertData);
		$batchid = $this->db->insert_id();
		return $batchid;
	}

	//Update active trainer - NEXT RELEASE
	public function updateActiveTrainerForBatch($batchid,$trainerid){

	}

	public function getAllBatch(){
		$this->db->select('batchid,batchname,skillid,startdate,enddate,starttime,endtime,releasedate,trainer_1,status');
		$resultant = $this->db->get('batch');
		return $resultant->result();
	}

	public function getAllBatchBySkill($skillid){
		$this->db->select('batchid,batchname,skillid,startdate,enddate,starttime,endtime,releasedate,trainer_1,status');
		$this->db->where('skillid',$skillid);
		$resultant = $this->db->get('batch');
		return $resultant->result();
	}	


	public function getBatchById(){
		if(isset($_POST['batchid'])){
			$batchid = $this->input->post('batchid');			
		}elseif(isset($_GET['batchid'])){
			$batchid = $this->input->get('batchid');			
		}

		$this->db->select('batchid,batchname,skillid,startdate,enddate,starttime,endtime,releasedate,trainer_1,status');
		$this->db->where('batchid',$batchid);
		$resultant = $this->db->get('batch');
		return $resultant->row();
	}	


	public function editBatch(){

		$batchid = ($this->input->post('batchid') != false) ? trim($this->input->post('batchid')) : null;

		$updateData = array(
						'batchname' 	=> 	($this->input->post('batchname') != false) ? trim($this->input->post('batchname')) : null,
						'startdate'		=>	($this->input->post('startdate') != false) ? trim($this->input->post('startdate')) : null,
						'enddate'		=>	($this->input->post('enddate') != false) ? trim($this->input->post('enddate')) : null,
						'starttime'		=>	($this->input->post('starttime') != false) ? trim($this->input->post('starttime')) : null,
						'endtime'		=>	($this->input->post('endtime') != false) ? trim($this->input->post('endtime')) : null,		
						'releasedate'	=>	($this->input->post('releasedate') != false) ? trim($this->input->post('releasedate')) : null,	
				//		'trainer_1' 	=>	($this->input->post('trainer_1') != false) ? trim($this->input->post('trainer_1')) : 0,
						'status'		=>	($this->input->post('status') != false) ? trim($this->input->post('status')) : null			
						);
		try{
		$this->db->where('batchid',$batchid);
		$this->db->update('batch',$updateData);
		}catch(Exception $e){

		}

	}

	public function getReleasedBatchesBySkill(){
		$this->db->select('batchid,batchname,skillid,startdate,enddate,starttime,endtime,releasedate,trainer_1,status');
		$where = array('skillid' => trim($this->input->post('skill')) ,'status' => 'released') ;
		$this->db->where($where);
		return $this->db->get('batch')->result();
	}	

	public function getUnallocatedCandBySkill(){
		$queryString = 'SELECT up.userid,up.firstname,up.lastname.bl.candidateid,bl.status
						FROM user_profile up
						LEFT JOIN batch_link bl
						ON up.userid = bl.candidateid
						WHERE up.user_type = ?
						AND ';
						
	}

	public function getAllocatedCandBySkill(){

	}

}

?>