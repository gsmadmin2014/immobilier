<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accueil extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout");
	
	}
	
	public function index()
	{
	
        $this->setContentView('index');
	}	
    
    
    /**
     * redirection vers autre page
     */
     public function accueilpage($type){      
         $this->setContentView($type);
     }
	
}