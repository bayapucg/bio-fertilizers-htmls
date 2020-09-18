<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
		public function __construct() 
		{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('Home_model');
	
		}

		public function index()
		{	
		if(!$this->session->userdata('user_details'))
		{
		
		$this->load->view('html/header');
		$this->load->view('html/index');
		$this->load->view('html/footer');
		}
		}		
	
	
	
	
	
}
