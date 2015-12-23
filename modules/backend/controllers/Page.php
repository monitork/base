<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}
	public function index()
	{
		$data = $this->page_m->get_all();
		$this->template
		->title('Page')
		->set('page',$data)
		->build('page/index');
	}

	public function add($id = 0){
		$this->load->view('welcome_message');
	}
	public function edit($id = 0){
		var_dump($id);
		$this->load->view('welcome_message');
	}
	public function delete(){
		$this->load->view('welcome_message');
	}
}
