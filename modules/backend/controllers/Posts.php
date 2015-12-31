<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_m');
		$this->load->model('category_m');
	}
	public function index()
	{
		$data = $this->posts_m->get_all();
		$this->template
		->title('Posts')
		->set('posts', $data)
		->build('content/index');
	}
	public function published()
	{
		$data = $this->posts_m->get_all('publish');
		$this->template
		->title('Posts')
		->set('posts', $data)
		->build('content/index');
	}
	public function draft()
	{
		$data = $this->posts_m->get_all('draft');
		$this->template
		->title('Posts')
		->set('posts', $data)
		->build('content/index');
	}

	public function trash()
	{
		$data = $this->posts_m->get_all('trash');
		$this->template
		->title('Posts')
		->set('posts', $data)
		->build('content/index');
	}
	public function add(){

		$data = $this->category_m->get_all('category');
		$this->template
		->title('Add new post')
		->set('category',$data)
		->set_partial('ckeditor', 'partials/ckeditor')
		->set_partial('ckfinder', 'partials/ckfinder')
		->build('content/add');
	}
	public function edit($id = 0){
		$this->load->view('welcome_message');
	}
	public function delete($id = 0){
		$this->load->view('welcome_message');
	}
	public function categories($id = 0)
	{
		$data = $this->category_m->get_all('category');
		$this->template
		->title('Categories')
		->set('cates',$data)
		->build('content/category');
	}
	public function tags($id = 0){
		$data = $this->category_m->get_all('post_tag');
		$this->template
		->title('Tags')
		->set('cates',$data)
		->build('content/tags');
	}
}
