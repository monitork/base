<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_m');
	}
	public function index()
	{
		$data = $this->posts_m->get_all();
		$this->template
		->title('Posts')
		->set('posts', $data)
		->build('content/index');
	}

	public function add($id = 0){
		$this->template
		->title('Add new post')
		->build('content/add');
	}
	public function edit($id = 0){
		$this->load->view('welcome_message');
	}
	public function trash($id = 0){
		$this->load->view('welcome_message');
	}
	public function delete($id = 0){
		$this->load->view('welcome_message');
	}
}
