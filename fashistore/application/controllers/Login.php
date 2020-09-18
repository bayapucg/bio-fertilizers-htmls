<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');
class Login extends Front_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('html/login');
			$this->load->view('html/footer');

		}
	}
	
	
	
	
	
}
