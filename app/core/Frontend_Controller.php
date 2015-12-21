<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends My_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('breadcrumbs');
    $this->template
    ->enable_parser(FALSE)
    ->set_theme('foo')
    ->set_partial('header', 'partials/header')
    ->set_partial('footer', 'partials/footer')
    ->set_layout('default');
  }
}
