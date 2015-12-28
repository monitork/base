<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_Controller extends My_Controller
{
  public function __construct()
  {
    parent::__construct();
    if(empty($this->session->userdata('fireant_admin_ss')) && $this->uri->segment(2) != 'users' &&  $this->uri->segment(3) != 'login'){
      $cookie_name	=	'fireantAuth';
      // var_dump($_COOKIE[$cookie_name]); die; unserialize
      if(!empty(get_cookie('fireant_Auth'))){
        $user_session = unserialize(get_cookie('fireant_Auth'));
        $this->session->set_userdata('fireant_admin_ss', $user_session);
      }else {
        redirect(site_url(ADMIN_FOLDER.'/users/login'),'refresh');
      }
    }
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
