<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Invoice extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Hospital_model');
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			
			$this->load->view('invoice/bmw-invoice');
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
	
	
	
	

	
	
}
