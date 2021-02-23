<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('Login_model');
	}
	public function index()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('admin/login');
		}else{
			redirect('login');
		}
	}
	public function loginpost()
	{
		if(!$this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			$login_data=array('email'=>$post['email'],'password'=>md5($post['password']));
			$check_login=$this->Login_model->employee_login_details($login_data);
			if(count($check_login)>0){
				$login_details=$this->Login_model->get_employee_details($check_login['e_id']);
				$this->session->set_userdata('user_details',$login_details);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('error',"Invalid Email Address or Password!");
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
}
