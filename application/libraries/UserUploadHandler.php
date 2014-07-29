<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once 'CustomUploadHandler.php';
class UserUploadHandler extends CustomUploadHandler
{
	
	
	public function __construct($options)
	{
		$options['script_url'] = $this->get_full_url() . '/upload?type=user';
		$options['image_versions'] = array(
                // The empty image version key defines options for the original image:
                '' => array(
                    // Automatically rotate images based on EXIF meta data:
                    'auto_orient' => true
                ),                
                'medium' => array(
                    'max_width' => 300
                ),                
        );
		parent::__construct($options);
	}
	
	/** 
	 * Set file directory
	 */
	protected function get_user_id()
	{
		return 'users';
	}	
	
}