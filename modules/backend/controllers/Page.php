<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}
	// -----------------------------LIST--------------------------------------
	public function index()
	{
		$data = $this->page_m->get_all();
		$this->template
		->title('Page')
		->set('page',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/index');
	}
	public function published()
	{
		$data = $this->page_m->get_all('publish');
		$this->template
		->title('Page')
		->set('page',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/index');
	}
	public function draft()
	{
		$data = $this->page_m->get_all('draft');
		$this->template
		->title('Page')
		->set('page',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/index');
	}
	public function trash()
	{
		$data = $this->page_m->get_all('trash');
		$this->template
		->title('Page')
		->set('page',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/trash');
	}
	// -----------------------------END LIST--------------------------------------

	public function add(){
		$this->form_validation->set_rules('post_title', 'Post title', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$this->page_m->insert($this->input->post());
			$this->session->set_flashdata('message','Insert page success.');
			redirect(site_url(ADMIN_FOLDER.'/page'),'refresh');
		}
		$this->template->set('title', array(
			'name' => 'post_title',
			'id' => 'title',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'placeholder'=>'Enter title here',
			'value' => $this->form_validation->set_value('post_title'),
		));
		$this->template->set('content', array(
			'name' => 'content',
			'id' => 'editor1',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'rows'=>'10',
			'value' => $this->form_validation->set_value('content'),
		));

		$this->template
		->title('Add new page')
		->set_partial('ckeditor', 'partials/ckeditor')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/add');
	}
	public function edit($id = 0){
		$page = $this->page_m->get_a_page($id);
		if(empty($page)){
			show_404();
		}
		$this->form_validation->set_rules('post_title', 'Post title', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$this->page_m -> update($id,$this->input->post());
			$this->session->set_flashdata('message','Update page success.');
			redirect(site_url(ADMIN_FOLDER.'/page'),'refresh');
		}
		$this->template->set('title', array(
			'name' => 'post_title',
			'id' => 'title',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'placeholder'=>'Enter title here',
			'value' => $page->post_title,
		));
		$this->template->set('content', array(
			'name' => 'content',
			'id' => 'editor1',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'rows'=>'10',
			'value' => $page->post_content,
		));
		$this->template
		->title('Edit page')
		->set_partial('ckeditor', 'partials/ckeditor')
		->set('page',$page)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('page/edit');
	}
	public function untrash($pid){
		$page = $this->page_m->get_a_page($pid);
		if(empty($page)){
			show_404();
		}
		$this->page_m->untrash($pid,$page);
		$this->session->set_flashdata('message','1 page restored from the Trash.');
		redirect(ADMIN_FOLDER.'/page','refresh');
	}
	public function movetrash($pid){
		$page = $this->page_m->get_a_page($pid);
		if(empty($page)){
			show_404();
		}
		$this->page_m->movetrash($pid,$page);
		$this->session->set_flashdata('message','1 page moved to the Trash.');
		redirect(ADMIN_FOLDER.'/page/trash','refresh');
	}
	public function delete(){
		$this->load->view('welcome_message');
	}
}
