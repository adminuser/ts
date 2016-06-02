<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Forum_Model extends TS_Model
{

	//Forum Post parameters
	private $postid; 
	private $posttitle;
	private $postdescription;
	private $skillid;
	private $createdby;

	//Forum Reply parameters
	private $replydescription;


	public function __construct(){
		parent:: __construct();
	}

	public function addPost($userid){
		$insertData = array('posttitle' => ($this->input->post('posttitle') != false) ? trim($this->input->post('posttitle')) : null,
							'postdescription' => ($this->input->post('postdescription') != false) ? trim($this->input->post('postdescription')) : null,
							'skillid' => ($this->input->post('skillid') != false) ? trim($this->input->post('skillid')) : 0,
							'createdby' => ($userid != false) ? $userid : 0,
							'createddate' => date('Y-m-d H:i:s')
							);
		$this->db->insert('forumpost',$insertData);
		$autoId = $this->db->insert_id();
		return $autoId;
	}

	public function addReply($userid){

		$insertData = array('replydescription' => ($this->input->post('replydescription') != false) ? trim($this->input->post('replydescription')) : null,
							'postid' => ($this->input->post('postid') != false) ? trim($this->input->post('postid')) : 0,	
							'createddate' => date('Y-m-d H:i:s'),
							'createdby' => ($userid != false) ? $userid : 0
							);
		$this->db->insert('forumreply',$insertData);
		$autoId = $this->db->insert_id();
		return $autoId;
	}

	public function getAllPost(){
		$this->db->select('postid,posttitle,postdescription,skillid,createddate,createdby');
		$this->db->order_by('createddate','desc');
		$resultant = $this->db->get('forumpost');
		return $resultant->result();
	}

	public function getPostById(){
		$postid = ($this->input->post('postid') != false) ? $this->input->post('postid') : 0;

		$this->db->select('postid,posttitle,postdescription,skillid,createddate,createdby');
		$this->db->where('postid',$postid);
		$this->db->order_by('createddate','desc');
		$resultant = $this->db->get('forumpost');
		return $resultant->result();
	}

	public function getAllReplyByPostId(){
		$postid = ($this->input->post('postid') != false) ? $this->input->post('postid') : 0;

		$this->db->select('replyid,replydescription,postid,createddate,createdby');
		$this->db->where('postid',$postid);
		$resultant = $this->db->get('forumreply');
		return $resultant->result();
	}

	public function getPostBySkill($skillid){
		//$skillid = ($this->input->post('sid') != false) ? $this->input->post('sid') : 0;

		$this->db->select('postid,posttitle,postdescription,skillid,createddate,createdby');
		$this->db->where('skillid',$skillid);
		$this->db->order_by('createddate','desc');
		$resultant = $this->db->get('forumpost');
		return $resultant->result();
	}	

}


?>