<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
require_once 'CustomUploadHandler.php';
class ImmobilierUploadHandler extends CustomUploadHandler
{
	
	
	public function __construct($options)
	{
		$options['script_url'] = $this->get_full_url() . '/upload?type=immobilier';
		parent::__construct($options);
	}
	
	/** 
	 * Set file directory
	 */
	protected function get_user_id()
	{
		return 'immobiliers';
	}	
	
}