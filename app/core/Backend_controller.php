<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends My_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('text');
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter'), $this->config->item('error_end_delimiter'));
    $this->template
    ->enable_parser(FALSE)
    ->set_partial('header', 'partials/header')
    ->set_partial('footer', 'partials/footer')
    ->title('Admin')
    ->set_theme('backend')
    ->set_layout('default');
  }
}
