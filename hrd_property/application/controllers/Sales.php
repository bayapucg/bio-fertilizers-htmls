<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Sales extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Sales_model');
	}
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			if($user_details['role_id']==2){
			$data['s_list']=$this->Sales_model->get_sales_list_admin($user_details['e_id']);	
			$this->load->view('sales/sales_list_admin',$data);
			}else if($user_details['role_id']==1){
			$data['s_list']=$this->Sales_model->get_sales_list_superadmin();	
			$this->load->view('sales/sales_list_superadmin',$data);	
			}else if($user_details['role_id']==3){
			$data['s_list']=$this->Sales_model->get_sales_list_manager($user_details['admin_id']);	
			$this->load->view('sales/sales_list_manager',$data);	
			}else if($user_details['role_id']==4){
			$data['s_list']=$this->Sales_model->get_sales_list_executives($user_details['admin_id']);	
			$this->load->view('sales/sales_list_executives',$data);
			}
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
}
