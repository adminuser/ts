<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('getSkillMap')){

	function  getSkillMap(){
		$CI = &get_instance();
		$CI->load->model('Skill_Model');
		return $CI->Skill_Model->getSkillMap();
	}
}


?>