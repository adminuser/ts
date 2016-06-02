<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 class Forum_Controller extends TS_Controller
 {
	
	public function __construct(){
		parent:: __construct();

		if(!$this->isAuthenticated()){
			redirect('forumlogout');
		}
	}

	public function index(){
			$this->setTemplate('forum');
			$forum_model = $this->getModel('Forum_Model');			
			$allPost = $forum_model->getAllPost();
			//$skillMap = $this->getModel('Skill_Model')->getSkillMap();
			$data = array('allPost' => $allPost,'displayContent' => 'Discussions Listing ');
			$this->render('forum/viewallpost',$data);			
	}


	public function addPost(){		
		$this->setTemplate('forum');		
		if($this->isMethod('post')){
			$forum_model = $this->getModel('Forum_Model');
			$result = $forum_model->addPost($this->getLoggedInUserId());
			$allPost = array();		
			if($result){
				$allPost = $forum_model->getAllPost();
				$data = array('allPost' => $allPost,'displayContent' => 'Question added successfully');
				$this->render('forum/viewallpost',$data);
			}else{
				$data = array('allPost' => $allPost,'displayContent' => 'Failed to add Question');
				$this->render('forum/viewallpost',$data);
			}
		}else{	
			$skillMap = $this->getModel('Skill_Model')->getSkillMap();
			$data = array('skillMap' => $skillMap);		
			$this->render('forum/addpost',$data);
		}
	}

	public function addReply(){		
		$this->setTemplate('forum');
		if($this->isMethod('post')){
			$forum_model = $this->getModel('Forum_Model');
			$result = $forum_model->addReply($this->getLoggedInUserId());

			//
			$post = $forum_model->getPostById();
			$postReplies = $forum_model->getAllReplyByPostId();

			if($result){
				$data = array('post' => $post,'postReplies' => $postReplies,'displayContent' => 'Answer added successfully');					
				$this->render('forum/viewpost_withreplies',$data);
			}else{
				$data = array('post' => $post,'postReplies' => $postReplies,'displayContent' => 'Failed to add answer');					
				$this->render('forum/viewpost_withreplies',$data);
			}
		}else{
			$data = array('post' => $post,'postReplies' => $postReplies,'displayContent' => 'Question details');					
			$this->render('forum/viewpost_withreplies',$data);
		}
	}


	public function getAllPost(){
		$this->setTemplate('forum');		
		$forum_model = $this->getModel('Forum_Model');
		$allPost = $forum_model->getAllPost();
		$data = array('allPost' => $allPost,'displayContent' => 'Questions Listing');
		$this->render('forum/viewallpost',$data);
	}
	
	public function getPost(){
		$this->setTemplate('forum');		
		$forum_model = $this->getModel('Forum_Model');
		$post = $forum_model->getPostById();
		if(count($post) == 0 ){
			redirect('forum');	
		}
		$postReplies = $forum_model->getAllReplyByPostId();
		$data = array('post' => $post,'postReplies' => $postReplies,'displayContent' => 'Question details');
		$this->render('forum/viewpost_withreplies',$data);
	}

	public function getPostBySkill($skillid){
		$this->setTemplate('forum');		
		$forum_model = $this->getModel('Forum_Model');
		$allPost = $forum_model->getPostBySkill($skillid);
		$data = array('allPost' => $allPost,'displayContent' => 'Discussions Listing');
		//echo $this->load->view('forum/viewallpost',$data,true);
		$this->render('forum/viewallpost',$data);	
	}
	/*
	public function getAllReplyByPostId(){
		$this->setTemplate('forum');
		$forum_model = $this->getModel('Forum_Model');
		$allReply = $forum_model->getAllReplyByPostId();
		$data = array('allReply' => $allReply, 'displayContent' => '');
	}
	*/


}
	?>