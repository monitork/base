<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
		$this->template ->set('module','products');
		$this->load->model('product_m');
		$this->load->model('category_m');
	}
	public function index()
	{
		$data = $this->product_m->get_all();
		$this->template
		->title('Product')
		->set('content',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/index');
	}
	public function published()
	{
		$data = $this->product_m->get_all('publish');
		$this->template
		->title('Product')
		->set('content',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/index');
	}
	public function draft()
	{
		$data = $this->product_m->get_all('draft');
		$this->template
		->title('Product')
		->set('content',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/index');
	}
	public function trash()
	{
		$data = $this->product_m->get_all('trash');
		$this->template
		->title('Product')
		->set('content',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/trash');
	}
	public function add($id = 0){
		$this->form_validation->set_rules('post_title', 'Post title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('product[sku]', 'SKU', 'trim|required|xss_clean');
		$this->form_validation->set_rules('product[price]', 'Price', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$this->product_m->insert($this->input->post());
			$this->session->set_flashdata('message','Insert page success.');
			redirect(site_url(ADMIN_FOLDER.'/products'),'refresh');
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
		$this->template->set('sku', array(
			'name' => 'product[sku]',
			'id' => 'sku',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $this->form_validation->set_value('sku'),
		));
		$this->template->set('price', array(
			'name' => 'product[price]',
			'id' => 'price',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $this->form_validation->set_value('price'),
		));
		$this->template->set('sale_price', array(
			'name' => 'product[sale_price]',
			'id' => 'sale_price',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $this->form_validation->set_value('sale_price'),
		));
		$this->template
		->title('Add new product')
		->set('category',$this->category_m->get_all('category_product'))
		->set('color',$this->category_m->get_all('color_product'))
		->set('size',$this->category_m->get_all('size_product'))
		->set_partial('ckeditor', 'partials/ckeditor')
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/add');
	}
	public function edit($id = 0){
		$page = $this->product_m->get_a_product($id);
		if(empty($page)){
			show_404();
		}
		$this->form_validation->set_rules('post_title', 'Post title', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			$this->product_m -> update($id,$this->input->post());
			$this->session->set_flashdata('message','Update page success.');
			redirect(site_url(ADMIN_FOLDER.'/products'),'refresh');
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
		$this->template->set('sku', array(
			'name' => 'product[sku]',
			'id' => 'sku',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $page->sku,
		));
		$this->template->set('price', array(
			'name' => 'product[price]',
			'id' => 'price',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $page->price,
		));
		$this->template->set('sale_price', array(
			'name' => 'product[sale_price]',
			'id' => 'sale_price',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => $page->sale_price,
		));
		$cate = $this->category_m->get_term_with_post($id);
		$this->template
		->title('Edit product')
		->set_partial('ckeditor', 'partials/ckeditor')
		->set('product',$page)
		->set('category',$this->category_m->get_all('category_product'))
		->set('color',$this->category_m->get_all('color_product'))
		->set('size',$this->category_m->get_all('size_product'))
		->set('cates',$cate)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/edit');
	}
	public function movetrash($id = 0){
		$page = $this->page_m->get_a_page($pid);
		if(empty($page)){
			show_404();
		}
		$this->page_m->movetrash($pid,$page);
		$this->session->set_flashdata('message','1 page moved to the Trash.');
		redirect(ADMIN_FOLDER.'/products/trash','refresh');
	}
	# FUNCTION SUB
	public function categories($id = 0)
	{
		$this->form_validation->set_rules('tag-name', 'Name', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			if($this->category_m->check_slug($this->input->post('tag-name'),$id)){
				$this->session->set_flashdata('message','Category name is exit.');
			}else {
				if($id == 0){
					$this->category_m->insert($this->input->post(),'category_product');
					$this->session->set_flashdata('message','Add category success.');
					redirect(site_url(ADMIN_FOLDER.'/products/categories'),'refresh');
				}else {
					$this->category_m-> edit($this->input->post(),'category_product',$id);
					$this->session->set_flashdata('message','Update category success.');
					redirect(site_url(ADMIN_FOLDER.'/products/categories'),'refresh');
				}
			}
		}
		$data = $this->category_m->get_all('category_product');
		if($id != 0) {
			$cate = $this->category_m->get_a_cate($id);
			$parent = $cate->parent;
		}else {
			$cate = array();
			$parent = 0;
		}
		$this->template->set('tag_name', array(
			'name' => 'tag-name',
			'id' => 'tag-name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => (isset($cate->name))?$cate->name:$this->form_validation->set_value('tag-name'),
		));
		$this->template->set('tag_description', array(
			'name' => 'tag-description',
			'id' => 'tag-description',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'rows'=>'5',
			'value' => (isset($cate->description))?$cate->description:$this->form_validation->set_value('tag-description'),
		));
		$this->template->set('submit', array(
			'name' => 'submit',
			'id' => 'submit',
			'type' => 'submit',
			'class' => 'btn btn-sm btn-primary',
			'value' => ($id==0)?'Add new category':'Update category',
		));
		$this->template
		->title('Categories')
		->set('cates',$data)
		->set('cate_parent',$parent)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/category');
	}
	public function color($id = 0){
		$this->form_validation->set_rules('tag-name', 'Name', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			if($this->category_m->check_slug($this->input->post('tag-name'),$id)){
				$this->session->set_flashdata('message','Category name is exit.');
			}else {
				if($id == 0){
					$this->category_m->insert($this->input->post(),'color_product');
					$this->session->set_flashdata('message','Add color success.');
					redirect(site_url(ADMIN_FOLDER.'/products/color'),'refresh');
				}else {
					$this->category_m-> edit($this->input->post(),'color_product',$id);
					$this->session->set_flashdata('message','Update color success.');
					redirect(site_url(ADMIN_FOLDER.'/products/color'),'refresh');
				}
			}
		}
		$data = $this->category_m->get_all('color_product');
		if($id != 0) {
			$cate = $this->category_m->get_a_cate($id);
		}else {
			$cate = array();
		}
		$this->template->set('tag_name', array(
			'name' => 'tag-name',
			'id' => 'tag-name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => (isset($cate->name))?$cate->name:$this->form_validation->set_value('tag-name'),
		));
		$this->template->set('tag_description', array(
			'name' => 'tag-description',
			'id' => 'tag-description',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'rows'=>'5',
			'value' => (isset($cate->description))?$cate->description:$this->form_validation->set_value('tag-description'),
		));
		$this->template->set('submit', array(
			'name' => 'submit',
			'id' => 'submit',
			'type' => 'submit',
			'class' => 'btn btn-sm btn-primary',
			'value' => ($id==0)?'Add new color':'Update color',
		));
		$this->template
		->title('Color')
		->set('cates',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/color');
	}
	public function size($id = 0){
		$this->form_validation->set_rules('tag-name', 'Name', 'trim|required|xss_clean');
		if ($this->form_validation->run() == true) {
			if($this->category_m->check_slug($this->input->post('tag-name'),$id)){
				$this->session->set_flashdata('message','Size name is exit.');
			}else {
				if($id == 0){
					$this->category_m->insert($this->input->post(),'size_product');
					$this->session->set_flashdata('message','Add size success.');
					redirect(site_url(ADMIN_FOLDER.'/products/color'),'refresh');
				}else {
					$this->category_m-> edit($this->input->post(),'size_product',$id);
					$this->session->set_flashdata('message','Update size success.');
					redirect(site_url(ADMIN_FOLDER.'/products/size'),'refresh');
				}
			}
		}
		$data = $this->category_m->get_all('size_product');
		if($id != 0) {
			$cate = $this->category_m->get_a_cate($id);
		}else {
			$cate = array();
		}
		$this->template->set('tag_name', array(
			'name' => 'tag-name',
			'id' => 'tag-name',
			'type' => 'text',
			'class' => 'form-control input-sm',
			'value' => (isset($cate->name))?$cate->name:$this->form_validation->set_value('tag-name'),
		));
		$this->template->set('tag_description', array(
			'name' => 'tag-description',
			'id' => 'tag-description',
			'type' => 'textarea',
			'class' => 'form-control input-sm',
			'rows'=>'5',
			'value' => (isset($cate->description))?$cate->description:$this->form_validation->set_value('tag-description'),
		));
		$this->template->set('submit', array(
			'name' => 'submit',
			'id' => 'submit',
			'type' => 'submit',
			'class' => 'btn btn-sm btn-primary',
			'value' => ($id==0)?'Add new size':'Update size',
		));
		$this->template
		->title('Size')
		->set('cates',$data)
		->set('message', (validation_errors()) ? validation_errors() : $this->session->flashdata('message'))
		->build('product/size');
	}
}
