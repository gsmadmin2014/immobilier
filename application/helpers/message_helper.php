<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function listMessageUser() {
	$CI =& get_instance();
	$CI->load->service('message_service', 'message');
	$userId = get_session_value('user_id');
	return $CI->message->getUserMessage($userId);
}