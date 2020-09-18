<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');
class Giftcards extends Front_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('html/giftcards');
			$this->load->view('html/footer');

		}
	}
	
	public function details()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('html/giftcard-details');
			$this->load->view('html/footer');

		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
