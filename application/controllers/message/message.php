<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message extends GSM_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout");
        $this->load->service("message_service","message");
	}
	
	public function send()
	{
		$this->setLayoutView(null);
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        
		$post = $this->input->post();
		$data = array();
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Message', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {
			$post['name'] = set_value('name');
			$post['email'] = set_value('email');
			$post['content'] = set_value('content');
            if ($this->message->send($post)) {
                $data['success'] = "Succes";
            } else {
                $data['success'] = "Failed";
            }
		}
		echo json_encode($data);
	}
}