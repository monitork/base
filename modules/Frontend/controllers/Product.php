<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Frontend_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('backend/category_m');
    $this->breadcrumbs->push('Trang chủ', '/');
  }
  public function index($value='')
  {
    show_404();
  }
  public function detail($slug)
  {
    $this->template->title('Xin chào')
    ->build('category/index');
  }
}
