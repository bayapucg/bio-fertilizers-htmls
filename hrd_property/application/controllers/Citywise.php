<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Citywise extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Citywise_model');
	}
	
	public function managerlist()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$post=$this->input->post();
			if(isset($post['signup'])&& $post['signup']=='submit'){
			$data['c_w_m_list']=$this->Citywise_model->get_c_w_m_list($post['city']);
			//echo'<pre>';print_r($data);exit;
			}
			$data['city_list']=$this->Citywise_model->get_city_list();
			$this->load->view('citywise/manager_list',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function propertylist()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$post=$this->input->post();
			if(isset($post['signup'])&& $post['signup']=='submit'){
			$data['c_w_p_list']=$this->Citywise_model->get_c_w_p_list($post['city']);
			//echo'<pre>';print_r($data);exit;
			}
			$data['city_list']=$this->Citywise_model->get_city_list();
			$this->load->view('citywise/property_list',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	
}
