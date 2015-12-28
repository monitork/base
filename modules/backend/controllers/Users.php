<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
	public function index()
	{
		$data = $this->user_m->get_all();
		$this->template
		->title('User')
		->set('users',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/index');
	}
	public function login(){
		$this->load->helper('security');
		if(!empty($this->session->userdata('fireant_admin_ss'))){
			redirect(site_url(ADMIN_FOLDER),'refresh');
		}
		//check Pass
		if(!empty($_POST)){
			$this->form_validation->set_rules('log', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == true) {
				$name = $this->input->post('log');
				$plain_password = $this->input->post('pwd');
				$user = $this->user_m->get_a_name($name);
				$autologin =	($this->input->post('rememberme') == '1') ? 1 : 0;
				if(!empty($user)){
					require_once (APPPATH.'libraries/PasswordHash.php');
					$wp_hasher = new PasswordHash(8, TRUE);
					$password_hashed = $user->user_pass;
					if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
						$user_session = array(
							'id' => $user->ID,
							'name' => $user->user_login
						);
						if($autologin == 1){
							$cookie = array(
								'name'   => 'Auth',
								'value'  => serialize($user_session),
								'expire' => time()+86500,
								'path'   => '/',
								'prefix' => 'fireant_',
							);
							set_cookie($cookie);
						}
						$this->session->set_userdata('fireant_admin_ss', $user_session);
						redirect(site_url(ADMIN_FOLDER),'refresh');
					}
					else {
						$this->session->set_flashdata('message','Error username or password.');
					}
				}
				else {
					$this->session->set_flashdata('message','User is not exits.');
				}
			}
		}
		$this->template->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
		$this->template
		->set_layout('login')
		->title('Login')
		->build('users/login');
	}
	public function logout()
	{
		$this->session->unset_userdata('fireant_admin_ss');
		// delete cookie
		$cookie = array(
			'name'   => 'Auth',
			'value'  => '',
			'expire' => '0',
			'prefix' => 'fireant_'
		);
		delete_cookie($cookie);
		redirect(site_url(),'refresh');
	}
	public function add(){
		// Add User
		$this->form_validation->set_rules('user_login', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		if ($this->form_validation->run() == true) {
			if ( preg_match('/\s/',$this->input->post('user_login')) ){
				$this->session->set_flashdata('message', 'Fill username without whitespace.');
			}elseif (!preg_match('/^[a-z0-9 .\-]+$/i',$this->input->post('user_login')) ) {
				$this->session->set_flashdata('message', 'Fill username without pecial character.');
			}elseif($this->user_m->get_a_name($this->input->post('user_login'))){
				$this->session->set_flashdata('message', 'User is exits.');
			}else {
				if($this->user_m->addUser($this->input->post())){
					$this->session->set_flashdata('message', 'Add user success!');
					redirect(ADMIN_FOLDER.'/users');
				}else {
					$this->session->set_flashdata('message', 'Fail: Add user error.');
				}
			}
		}
		$this->template->set('user_login', array(
			'name' => 'user_login',
			'id' => 'user_login',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $this->form_validation->set_value('user_login'),
		));

		$this->template->set('email', array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'email',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $this->form_validation->set_value('email'),
		));
		$this->template->set('first_name', array(
			'name' => 'first_name',
			'id' => 'first_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $this->form_validation->set_value('first_name'),
		));
		$this->template->set('last_name', array(
			'name' => 'last_name',
			'id' => 'last_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $this->form_validation->set_value('last_name'),
		));
		$this->template->set('url', array(
			'name' => 'url',
			'id' => 'url',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $this->form_validation->set_value('url'),
		));
		$this->template->set('role', array(
			'name' => 'role',
			'option' => unserialize(ADMIN_ROLE),
			'selected' => $this->form_validation->set_value('role') ? $this->form_validation->set_value('role'):'subscriber',
			'extra' => array('class'=>'form-control input-sm','id'=>'role'),
		));
		$this->template->set('pass', array(
			'name' => 'pass',
			'id' => 'pass',
			'type' => 'password',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => '',
		));
		$this->template
		->title('Add user')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/add');
	}
	public function delete(){

		$this->template
		->title('Edit user')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/add');
	}
}
