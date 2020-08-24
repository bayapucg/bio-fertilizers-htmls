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
			if($user_details['role_id']==1){
			$data['employee_list']=$this->Dashboard_model->get_employee_list();
			$data['glpayment_list']=$this->Dashboard_model->get_glpayment_list();
			$data['order_cum_invoice_list']=$this->Dashboard_model->get_order_cum_invoice_list();
			$data['se_st_expenses_list']=$this->Dashboard_model->get_se_st_expenses_list();
			
			$data['sales_bulletin_list']=$this->Dashboard_model->get_sales_bulletin_list();
			$data['transfer_to_other_camps_list']=$this->Dashboard_model->get_transfer_to_other_camps_list();
            $data['godown_stock_point_list']=$this->Dashboard_model->get_godown_stock_point_list();
            $data['stock_list']=$this->Dashboard_model->get_stock_list();

			
			 //echo '<pre>';print_r($data);exit;
			
			$this->load->view('admin/index' ,$data);
			}else if($user_details['role_id']==2){
			$data['employee_list']=$this->Dashboard_model->get_employee_list_admin($user_details['e_id']);
			$data['glpayment_list']=$this->Dashboard_model->get_glpayment_list_admin($user_details['e_id']);
			$data['order_cum_invoice_list']=$this->Dashboard_model->get_order_cum_invoice_list_admin($user_details['e_id']);
			$data['se_st_expenses_list']=$this->Dashboard_model->get_se_st_expenses_list_admin($user_details['e_id']);	
			
			
			$data['sales_bulletin_list']=$this->Dashboard_model->get_sales_bulletin_list_admin($user_details['e_id']);
			$data['transfer_to_other_camps_list']=$this->Dashboard_model->get_transfer_to_other_camps_list_admin($user_details['e_id']);
            $data['godown_stock_point_list']=$this->Dashboard_model->get_godown_stock_point_list_admin($user_details['e_id']);
            $data['stock_list']=$this->Dashboard_model->get_stock_list_admin($user_details['e_id']);
			
			
			$this->load->view('admin/admin_dashboard',$data);
			}else if($user_details['role_id']==3){
			
			$data['employee_list']=$this->Dashboard_model->get_employee_list_manager($user_details['e_id']);
			$data['glpayment_list']=$this->Dashboard_model->get_glpayment_list_manager($user_details['e_id']);
			$data['order_cum_invoice_list']=$this->Dashboard_model->get_order_cum_invoice_list_manager($user_details['e_id']);
			$data['se_st_expenses_list']=$this->Dashboard_model->get_se_st_expenses_list_manager($user_details['e_id']);

            $data['sales_bulletin_list']=$this->Dashboard_model->get_sales_bulletin_list_manager($user_details['e_id']);
			$data['transfer_to_other_camps_list']=$this->Dashboard_model->get_transfer_to_other_camps_list_manager($user_details['e_id']);
            $data['godown_stock_point_list']=$this->Dashboard_model->get_godown_stock_point_list_manager($user_details['e_id']);
            $data['stock_list']=$this->Dashboard_model->get_stock_list_manager($user_details['e_id']);
			
			$this->load->view('admin/manager_dashboard',$data);
			
			}else if($user_details['role_id']==4){
			$data['employee_list']=$this->Dashboard_model->get_employee_list_group_leader($user_details['e_id']);
			$data['glpayment_list']=$this->Dashboard_model->get_glpayment_list_group_leader($user_details['e_id']);
			$data['order_cum_invoice_list']=$this->Dashboard_model->get_order_cum_invoice_list_group_leader($user_details['e_id']);
			$data['se_st_expenses_list']=$this->Dashboard_model->get_se_st_expenses_list_group_leader($user_details['e_id']);	
			
			 $data['sales_bulletin_list']=$this->Dashboard_model->get_sales_bulletin_list_group_leader($user_details['e_id']);
			$data['transfer_to_other_camps_list']=$this->Dashboard_model->get_transfer_to_other_camps_list_group_leader($user_details['e_id']);
            $data['godown_stock_point_list']=$this->Dashboard_model->get_godown_stock_point_list_group_leader($user_details['e_id']);
            $data['stock_list']=$this->Dashboard_model->get_stock_list_group_leader($user_details['e_id']);
			$this->load->view('admin/group_leader_dashboard',$data);
			
			}else if($user_details['role_id']==5){
			$data['employee_list']=$this->Dashboard_model->get_employee_list_executives($user_details['e_id']);
			$data['glpayment_list']=$this->Dashboard_model->get_glpayment_list_executives($user_details['e_id']);
			$data['order_cum_invoice_list']=$this->Dashboard_model->get_order_cum_invoice_list_executives($user_details['e_id']);
			$data['se_st_expenses_list']=$this->Dashboard_model->get_se_st_expenses_list_executives($user_details['e_id']);


             $data['sales_bulletin_list']=$this->Dashboard_model->get_sales_bulletin_list_executives($user_details['e_id']);
			$data['transfer_to_other_camps_list']=$this->Dashboard_model->get_transfer_to_other_camps_list_executives($user_details['e_id']);
            $data['godown_stock_point_list']=$this->Dashboard_model->get_godown_stock_point_list_executives($user_details['e_id']);
            $data['stock_list']=$this->Dashboard_model->get_stock_list_executives($user_details['e_id']);
           
			
			$this->load->view('admin/executives_dashboard',$data);
			
			}
			
			
			
			
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
