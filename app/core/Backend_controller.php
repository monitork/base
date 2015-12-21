<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends My_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->helper('text');
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->template
    ->enable_parser(FALSE)
    ->set_partial('header', 'partials/header')
    ->title('Admin')
    ->set_theme('backend')
    ->set_layout('default');
  }
}
