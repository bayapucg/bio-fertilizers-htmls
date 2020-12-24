<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

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
			
			$this->load->view('admin/forgot-password');
		}else{
			redirect('login');
		}
	}
	public function forgotpost(){
		$post=$this->input->post();
		$check_email=$this->Login_model->check_email_exits($post['email']);
			if(count($check_email)>0){
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from($post['email']);
				$this->email->to('admin@biofertilizers.com');
				$this->email->subject('forgot - password');
				$body = "Your  login Password is ".$check_email['org_password'];
				$this->email->message($body);
				$this->email->send();
				$this->session->set_flashdata('success','Check Your Email to reset your password!');
				redirect('login');

			}else{
				$this->session->set_flashdata('error','The email you entered is not a registered email. Please try again. ');
				redirect('login');	
			}
		
	}
	
	
	
	
	
	
	
	
	
	
	
}
