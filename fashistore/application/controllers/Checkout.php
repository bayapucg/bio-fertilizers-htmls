<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');
class Checkout extends Front_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('html/checkout');
			$this->load->view('html/footer');

		}
	}
	
	
	
	
	
}
