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
		->build('users/index');
	}
	public function login(){
		if(!empty($this->session->userdata('fireant_admin_ss'))){
			redirect(site_url(ADMIN_FOLDER),'refresh');
		}
		//check Pass
		if(!empty($_POST)){
			$name = $this->input->post('log');
			$plain_password = $this->input->post('pwd');
			$user = $this->user_m->get_a_name($name);
			if(!empty($user)){
				require_once (APPPATH.'libraries/PasswordHash.php');
				$wp_hasher = new PasswordHash(8, TRUE);
				$password_hashed = $user->user_pass;
				if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
					$user_session = array(
						'id' => $user->ID,
						'name' => $user->user_login
					);
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
		$this->template->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
		$this->template
		->set_layout('login')
		->title('Login')
		->build('users/login');
	}
	public function add($id = 0){
		$this->load->view('welcome_message');
	}
	public function delete(){
		$this->load->view('welcome_message');
	}
}
