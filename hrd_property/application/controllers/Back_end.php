<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Employee_model');
		$this->load->model('Login_model');
	
			if($this->session->userdata('user_details'))
			{
				$user_details=$this->session->userdata('user_details');
				$data['user_details']=$this->Login_model->get_employee_details($user_details['e_id']);
				// echo'<pre>';print_r($data);exit;		 
				$this->load->view('admin/header',$data);
			    $this->load->view('admin/sidebar',$data);
			    $this->load->view('admin/footer',$data);
			}
		}
	
}
