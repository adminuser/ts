<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('get_session_data'))
{
	function get_session_data($key){

		$CI = &get_instance();

		return $CI->session->userdata($key);
	}
}

if (!function_exists('get_flash_data'))
{
	function get_flash_data($key){

		$CI = &get_instance();

		return $CI->session->flashdata($key);
	}
}