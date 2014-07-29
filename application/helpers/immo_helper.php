<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function relative_image_path($dimension, $fileId) {
	$CI =& get_instance();
	$CI->load->service('immo_service', 'is');
	
	return $CI->is->getImageRelativePathById($dimension, $fileId);
}