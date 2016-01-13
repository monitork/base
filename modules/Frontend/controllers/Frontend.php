<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends Frontend_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->template->title('Xin chào')
    ->build('homepage/index');
  }
}
