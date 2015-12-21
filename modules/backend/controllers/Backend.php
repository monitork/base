<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends Backend_controller {
	public function __construct()
	{
		parent::__construct();
	}
	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see http://codeigniter.com/user_guide/general/urls.html
	*/
	public function index()
	{
		$this->template
		->title('Dashboard')
		->build('backend');
	}
	public function conf(){
		$this->load->view('welcome_message');
	}
	public function conz(){
		$this->load->view('welcome_message');
	}
}
