<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Agence extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('acl_auth');
		$this->load->service('agence_service', 'agence');
       	$this->acl_auth->restrict_access('admin');
		$this->setLayoutView("layout_admin");
	}
	
	public function add()
	{
		$this->load->library('form_validation');
		
		$post = $this->input->post();
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('adresse', 'Adress', 'trim|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
		} else {
			$post['name'] = set_value('name');
			$post['description'] = set_value('description');
			$post['adresse'] = set_value('adresse');
			if ($this->agence->add($post)) {
				
			}
		}	
		$data['agents'] = $this->user->listeAgents();
        $this->setData($data);
		$this->setContentView('admin/agence');
        
	}
	
}
