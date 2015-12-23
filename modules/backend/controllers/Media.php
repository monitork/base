<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->template
		->title('Media')
		->build('media/index');
	}

	public function add($id = 0){
		var_dump($id);
		$this->load->view('welcome_message');
	}
	public function delete(){
		$this->load->view('welcome_message');
	}
}
