<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_m');
	}
	public function index()
	{
		if(!empty($this->input->post('settings'))){
			$this -> setting_m->updateSetting($this->input->post('settings'));
		}
		$this->template
		->title('General Settings')
		->build('settings/index');
	}

	public function email(){
		$this->template
		->title('Email Settings')
		->build('settings/email');
	}
	public function reading(){
		$this->template
		->title('Reading Settings')
		->build('settings/reading');
	}
}
