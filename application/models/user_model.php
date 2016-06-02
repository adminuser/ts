<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
*	
*/
class User_Model extends TS_Model
{
	protected $username;
	protected $email;
	protected $password;
	protected $createddate;
	protected $modifieddate;
	protected $user_type;

	public function __construct(){
		ini_alter('date.timezone','Asia/Calcutta');
		parent:: __construct();
	}

	//create user
	public function createUser(){ 
		$username 		= trim($this->input->post('txtuname')) ;
		$email			= trim($this->input->post('txtuname')) ;
		$password		= base64_encode($this->input->post('txtpass'));
		$createddate 	= date('Y-m-d H:i:s');
		$modifieddate	= date('Y-m-d H:i:s');;
		$user_type		= trim($this->input->post('signup-type'));

		$insertData = array('username' => $username,
							'email' => $email,
							'password'	=> $password,
							'createddate'	=> $createddate,
							'modifieddate'	=> $modifieddate,
							'user_type'	=>	$user_type
							);
		$this->db->insert('users',$insertData);
		$autoid = $this->db->insert_id();

		//insert userprofile
		if(isset($_POST['primary_skillid'])){
		$userprofileData = array('userid' => $autoid ,
								 'user_type' =>$user_type,
								 'primary_skillid'=>trim($_POST['primary_skillid'])
								 );
		}else{
		$userprofileData = array('userid' => $autoid ,
								 'user_type' =>$user_type
								 );			
		}


		$this->db->insert('user_profile',$userprofileData);
		$userprofileid = $this->db->insert_id();

		//update userprofileid into users
		$updateUser = array('userprofileid' => $userprofileid );
		$this->db->where('userid',$autoid);
		$this->db->update('users',$updateUser);

		//return $autoid;
		return array('userid'=> $autoid,
					'userprofileid'=> $userprofileid,
					'email'=> $email,
					'password' => $this->input->post('txtpass')
					);
	}

	//check the user
	public function checkAuthentication($username, $password){
		$password = base64_encode($password);
		$this->db->select('userid');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('users')->row_array();

		//echo "<pre>"; echo $this->db->last_query(); echo "</pre>"; exit;
		
	}

	public function getUserById($userId){
		$query = 'SELECT u.userid,u.username,u.email,u.user_type,u.is_profilecomplete,up.primary_skillid as skillid
					FROM users u 
					JOIN user_profile up
					ON u.userid = up.userid
					WHERE u.userid = ? ';

		$result = $this->db->query($query, array($userId));

		return $result->row_array();
	}	

	public function getUserProfileByUserId($userid,$user_type){
		$userid = trim($userid);
		$query = 'SELECT *
					FROM user_profile
					WHERE userid = ? ';
		$resultant = $this->db->query($query,array($userid));
		return $resultant->row();
	}	

	public function getAllUsers($user_type){
/*		if(isset($_POST['user_type'])){
			$user_type = trim($this->input->post('user_type'));		
		}elseif (isset($_GET['user_type'])) {
			$user_type = trim($this->input->get('user_type'));
		}
*/
		$user_type = trim($user_type);
		$query = 'SELECT up.userid,up.firstname,up.lastname,u.email,
					u.is_profilecomplete,up.existing_visatype,up.country,up.primary_skillid
					FROM user_profile up
					JOIN users u
					ON up.userid = u.userid
					WHERE u.user_type = ? 
					ORDER BY up.firstname ASC';
		$resultant = $this->db->query($query,array($user_type));
		return $resultant->result();
	}

	public function filterUsers(){
		if(isset($_POST['user_type'])){
			$user_type = trim($this->input->post('user_type'));		
		}elseif (isset($_GET['user_type'])) {
			$user_type = trim($this->input->get('user_type'));
		}
		$preparedArray = array($user_type);
		$filterString = '';
		if($this->input->post('existing_visatype')){
			$filterString.=' AND existing_visatype = ? ';
			array_push($preparedArray,trim($this->input->post('existing_visatype')) );
		} 
		if($this->input->post('country')){
			$filterString.='AND country = ? ';
			array_push($preparedArray, trim($this->input->post('country')));
		}
		if($this->input->post('primary_skillid')){
			$filterString.=' AND primary_skillid = ? ';
			array_push($preparedArray, trim($this->input->post('primary_skillid')) );
		}

		$query = 'SELECT up.userid,up.firstname,up.lastname,u.email,
					u.is_profilecomplete,up.existing_visatype,up.country,up.primary_skillid 
					FROM user_profile up
					JOIN users u
					ON up.userid = u.userid
					WHERE u.user_type = ? '.$filterString.' ORDER BY up.firstname ASC';
					//echo $query;
		$resultant = $this->db->query($query,$preparedArray);
		//print_r($resultant->result());exit;
		return $resultant->result();		

	}	

	public function getUsersByType($user_type){
		$query = 'SELECT userid,firstname,lastname 
					FROM user_profile
					WHERE user_type = ? ';
		$resultant = $this->db->query($query,array($user_type));
		return $resultant->result();
	}

	//Currently not in use
	public function getUserProfileStatus($userid){
		$this->db->select('is_profilecomplete');
		$this->db->where('userid',$userid);
		$resultant = $this->db->get('users');
		return $resultant->row();
	}

	public function getAllTrainersWithSkill(){
		$user_type = 'trainer';
		$query = 'SELECT userid,firstname,lastname 
					FROM user_profile
					WHERE user_type = ? ';
		$resultant = $this->db->query($query,array($user_type));
		return $resultant->result();		
	}

	public function getTrainersBySkill(){
		$query = 'SELECT userid,firstname,lastname,primary_skillid
					FROM user_profile
					WHERE user_type = ?
					AND primary_skillid = ?';
		$resultant = $this->db->query($query,array('trainer',trim($this->input->post('skill'))));
		return $resultant->result();
	}

	public function getTrainersByBatch(){
		$query = 'SELECT userid,firstname,lastname,primary_skillid
					FROM user_profile
					WHERE user_type = ?
					AND primary_skillid = ?';
		$resultant = $this->db->query($query,array('trainer',trim($this->input->post('skill'))));
		return $resultant->result();
	}	

	public function getBatchCandBySkill(){
		$query = 'SELECT userid,firstname,lastname,primary_skillid
					FROM user_profile
					WHERE user_type = ?
					AND primary_skillid = ?';
		$resultant = $this->db->query($query,array('candidate',trim($this->input->post('skill'))));
		return $resultant->result();		
	}

	/**
	*	Candidate Profile - start	
	*/

	public function editUserProfileByUserId($userid){

		$updateData = array(
							'firstname' => ( $this->input->post('firstname') != false ) ? $this->input->post('firstname')  : null ,
							'middlename' => ( $this->input->post('middlename') != false ) ? $this->input->post('middlename')  : null ,
							'lastname' => ( $this->input->post('lastname') != false ) ? $this->input->post('lastname')  : null ,
							'gender' => ( $this->input->post('gender') != false ) ? $this->input->post('gender')  : null ,
							'phone' => ( $this->input->post('phone') != false ) ? $this->input->post('phone')  : null ,
							'mobile' => ( $this->input->post('mobile') != false ) ? $this->input->post('mobile')  : null ,
							'email' => ( $this->input->post('email') != false ) ? $this->input->post('email')  : null ,
							'country' => ( $this->input->post('country') != false ) ? $this->input->post('country')  : null ,
							'zipcode' => ( $this->input->post('zipcode') != false ) ? $this->input->post('zipcode')  : null ,
							'applying_visatype' => ( $this->input->post('applying_visatype') != false ) ? $this->input->post('applying_visatype')  : null ,
							'existing_visatype' => ( $this->input->post('existing_visatype') != false ) ? $this->input->post('existing_visatype')  : null ,
							'visa_expirymonth' => ( $this->input->post('visa_expirymonth') != false ) ? $this->input->post('visa_expirymonth')  : null ,
							'visa_expiryyear' => ( $this->input->post('visa_expiryyear') != false ) ? $this->input->post('visa_expiryyear')  : null ,
							'primary_skillid' => ( $this->input->post('primary_skillid') != false ) ? $this->input->post('primary_skillid')  : 0 ,
							'secondary_skillid' => ( $this->input->post('secondary_skillid') != false ) ? $this->input->post('secondary_skillid')  : 0
						);
		try{
			$this->db->where('userid',$userid);
			$this->db->update('user_profile',$updateData);
		}catch(Exception $e){
			return false;
		}

		// Update profile complete flag on successfull update
		$updateData = array('is_profilecomplete' => 1);
		$this->db->where('userid',$userid);
		$this->db->update('users',$updateData);

		return true;
	}

	public function updateUserResumeDetails($resume,$userid){
		$resumeDetails = array(
							'resume_name' => $resume['raw_name'],
							'resume_orgname' => $resume['orig_name'],
							'resume_ext' => $resume['file_ext'],
							'resume_fullpath' => $resume['full_path']
						);
		$this->db->where('userid',$userid);
		$this->db->update('user_profile',$resumeDetails);

	}

	public function getResumeDetails($userid){
		$this->db->select('userid,firstname,lastname,resume_name,resume_orgname,resume_ext,resume_fullpath');
		$this->db->where('userid',$userid);
		$resultant = $this->db->get('user_profile');
		return $resultant->row();
	}

	public function getAllResumeDetails(){
		$this->db->select('userid,firstname,lastname,resume_name,resume_orgname,resume_ext,resume_fullpath');
		$this->db->where('user_type','Candidate');
		$resultant = $this->db->get('user_profile');
		return $resultant->result();		
	}

	/**
	*	Candidate Profile - end	
	*/




	 /**
	  * Helper methods - start 
	  */

	public function getVisaTypes(){
		return array('F1' => 'F1',
							'J1' => 'J1',
							'J2' => 'J2',
							'H1' => 'H1',
							'H4' => 'H4',
							'None'=> 'None',
							'Others'=>'Others'
							);
	}

	public function getCountryList(){
		return array('India' => 'India',
							'US' => 'US',
							'UK' => 'UK',
							'Pakistan' => 'Pakistan',
							'Iran' => 'Iran',
							'Iraq' => 'Iraq',
							'Bangladesh' => 'Bangladesh',
							'Bhutan' => 'Bhutan',
							'Nepal' => 'Nepal'
							);

	}

   /**
   * Helper methods - end
   */


}
?>