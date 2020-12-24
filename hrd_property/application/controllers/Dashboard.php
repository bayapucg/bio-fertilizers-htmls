<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Dashboard extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$this->load->view('admin/index');
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	public  function logout(){
		$admindetails=$this->session->userdata('user_details');
		$userinfo = $this->session->userdata('user_details');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('user_details');
		$this->session->unset_userdata('user_details');
        redirect('');
	}
	
	
	
	
	
}
