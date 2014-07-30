<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class User extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout");
        $this->load->service('user_service', 'user');
        $this->load->service('agence_service', 'agence');
        $this->load->library('acl_auth');
	}
	
	public function login()
	{
		$data['isLogin'] = true;
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('login-username', 'Login', 'trim|required|xss_clean');
		$this->form_validation->set_rules('login-password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
			
		} else {
			$identity = set_value('login-username');
			$password = set_value('login-password');
			$post = $this->input->post();
			$remember_me = FALSE;
			if (array_key_exists('remember_me', $post)) {
				$remember_me = TRUE;
			}
			if ($this->acl_auth->login($identity, $password, $remember_me)) {
				if ($this->acl_auth->has_role('agent')) {
					redirect('admin');
				}
				redirect('/');
			} else {
                $data['error'] = 'Please check your username or password';
            }
		}
		$this->setData($data);
        $this->setContentView('registration');
	}
	
	public function register($user = 'guest')
	{
		$data['isRegister'] = true;
		$this->load->helper(array('form', 'url'));
		
		$isAdmin = false;
		if ($user == 'admin') {
			$isAdmin = true;	
		}

		$this->load->library('form_validation');
		$post = $this->input->post();
		
		if ($isAdmin) {
			$this->load->library('acl_auth');
			$this->acl_auth->restrict_access('admin');
			$this->setLayoutView("layout_admin");
			$this->form_validation->set_rules('role', 'Role', 'required');
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_email_check|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('passwordVerify', 'Password confirmation', 'required|matches[password]|');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
		} else {
			$post['name'] = set_value('name');
			$post['username'] = set_value('username');
			$post['email'] = set_value('email');
			$post['password'] = set_value('password');
			if ($this->acl_auth->register($post)) {
				if ($isAdmin) {
					
				} else {
					if ($this->acl_auth->login( $post['username'], $post['password'], TRUE )) {
						redirect('/');	
					} else {
						$data['errors'] = 'Please check your username or password';
					}		
				}
							
			} else { 
				$data['errors'] = $this->acl_auth->errors(); 
			}
			
		}	
		
        if ($isAdmin) {
        	$data['roles'] = $this->user->listRole();
        	$data['agences'] = $this->agence->getAgencesList();
        	$this->setData($data);
			$this->setContentView('admin/user_register');
		} else {
			$this->setData($data);
			$this->setContentView('registration');	
		}	
        
	}
	
	function logout()
 	{
 		if ($this->acl_auth->logout()) {
			redirect('user/login');
		}
 	}
	
	/**
     * Callback qui verifie si email existe deja
     */
	public function email_check($email)
	{
		$this->load->service('user_service', 'user');
		$user = $this->user->findByEmail($email);
		if ($user) { // si user existe error
			$this->form_validation->set_message('email_check', sprintf('The email <strong>"%s"</strong> is already taken.', $email));
			return false;
		} else {
			return true;
		}
	}
	
	/**
     * Callback qui verifie si username existe deja
     */
	public function username_check($username)
	{
		$this->load->service('user_service', 'user');
		$user = $this->user->findByUsername($username);
		if ($user) { // si user existe error
			$this->form_validation->set_message('username_check', sprintf('The username <strong>"%s"</strong> is already taken.', $username));
			return false;
		} else {
			return true;
		}
	}
	
}
	