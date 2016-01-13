<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Frontend_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('category_f');
    $this->load->model('product_f');
    $this->breadcrumbs->push('Trang chủ', '/');
  }
  public function index($value='')
  {
    show_404();
  }
  public function detail($slug)
  {
    $cate =  $this->category_f->get_term_w_slug($slug);
    if(empty($cate)){
      show_404();
    }
    $this->breadcrumbs->push($cate->name,$cate->slug);
    $product = $this->product_f->get_all_content($cate->term_taxonomy_id);
    $this->template->title($cate->name)
    ->set('products',$product)
    ->build('category/index');
  }
}
