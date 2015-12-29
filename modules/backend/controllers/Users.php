<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}
	//------------------------------ LIST-----------------------------------------
	public function index()
	{
		$filter = array();
		if(!empty($this->input->post('name'))){
			$filter = $this->input->post();
		}
		$data = $this->user_m->get_all('',$filter);
		$this->template
		->title('All users')
		->set('users',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/index');
	}
	public function published()
	{
		$filter = array();
		if(!empty($this->input->post('name'))){
			$filter = $this->input->post();
		}
		$data = $this->user_m->get_all('public',$filter);
		$this->template
		->title('User published')
		->set('users',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/index');
	}
	public function draft()
	{
		$filter = array();
		if(!empty($this->input->post('name'))){
			$filter = $this->input->post();
		}
		$data = $this->user_m->get_all('draft',$filter);
		$this->template
		->title('User draft')
		->set('users',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/index');
	}
	//------------------------  END LIST -----------------------------------------
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
			}elseif($this->user_m->get_a_email(0,$this->input->post('email'))){
				$this->session->set_flashdata('message', 'Email is exits.');
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
	public function edit($id = 0){
		$this->form_validation->set_rules('user_login', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->form_validation->run() == true) {
			if($this->user_m->get_a_email($id,$this->input->post('email'))){
				$this->session->set_flashdata('message', 'Email is exits.');
			}else {
				//Update
				$this->user_m->updateProfile($id,$this->input->post());
				$this->session->set_flashdata('message', 'Update user success!');
			}
		}
		$user = $this->user_m->get_a_id($id);
		if(empty($user)){
			echo show_404();
		}

		$this->template->set('user_login', array(
			'name' => 'user_login',
			'id' => 'user_login',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'readonly' => '',
			'value' => $user->user_login,
		));

		$this->template->set('email', array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'email',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->user_email,
		));
		$this->template->set('first_name', array(
			'name' => 'meta[first_name]',
			'id' => 'first_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->first_name,
		));
		$this->template->set('last_name', array(
			'name' => 'meta[last_name]',
			'id' => 'last_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->last_name,
		));
		$this->template->set('url', array(
			'name' => 'url',
			'id' => 'url',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->user_url,
		));
		$this->template->set('role', array(
			'name' => 'meta[wp_capabilities]',
			'option' => unserialize(ADMIN_ROLE),
			'selected' => userRoleKey(unserialize($user->capabilities)),
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
		$this->form_validation->set_rules('user_login', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->template
		->title('Edit user')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/add');
	}
	public function profile(){
		$this->form_validation->set_rules('user_login', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nickname', 'Nickname', 'required');
		$id = $this->session->userdata('fireant_admin_ss')['id'];
		if ($this->form_validation->run() == true) {
			if($this->user_m->get_a_email($id,$this->input->post('email'))){
				$this->session->set_flashdata('message', 'Email is exits.');
			}else {
				//Update
				$this->user_m->updateProfile($id,$this->input->post());
				$this->session->set_flashdata('message', 'Update your profile success!');
			}
		}
		$user = $this->user_m->get_profile($id);
		if(!empty($user)){

		}else {
			echo show_404();
		}

		$this->template->set('user_login', array(
			'name' => 'user_login',
			'id' => 'user_login',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'readonly' => '',
			'value' => $user->user_login,
		));

		$this->template->set('email', array(
			'name' => 'email',
			'id' => 'email',
			'type' => 'email',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->user_email,
		));
		$this->template->set('first_name', array(
			'name' => 'meta[first_name]',
			'id' => 'first_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->first_name,
		));
		$this->template->set('last_name', array(
			'name' => 'meta[last_name]',
			'id' => 'last_name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->last_name,
		));
		$this->template->set('nickname', array(
			'name' => 'nickname',
			'id' => 'nickname',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->user_nicename,
		));
		$this->template->set('display_name', array(
			'name' => 'display_name',
			'option' => display_name(array($user->first_name,$user->last_name,$user->last_name.' '. $user->first_name,$user->first_name.' '.$user->last_name,$user->user_login)),
			'selected' => $user->display_name,
			'extra' => array('class'=>'form-control input-sm','id'=>'display_name'),
		));
		$this->template->set('url', array(
			'name' => 'url',
			'id' => 'url',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => $user->user_url,
		));
		$this->template->set('description', array(
			'name' => 'meta[description]',
			'id' => 'description',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'size' => '40',
			'rows' => '5',
			'value' => $user->description,
		));
		$this->template->set('pass', array(
			'name' => 'pass',
			'id' => 'pass',
			'type' => 'password',
			'class' => 'form-control input-sm',
			'size' => '40',
			'value' => '',
		));
		$this->form_validation->set_rules('user_login', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->template
		->title('User profile')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/profile');
	}
	public function delete(){
		$this->template
		->title('Delete user')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('users/add');
	}

}
