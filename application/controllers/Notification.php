<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Notification extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Notification_model');
	}
	
	
	public function salespersonlist_view()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$s_id=base64_decode($this->uri->segment(3));
			$data['edit_salespersons']=$this->Notification_model->edit_salespersons_details($s_id);	
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('notification/sales_person_list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function hospitallist_view()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$h_id=base64_decode($this->uri->segment(3));
			$data['edit_hospital']=$this->Notification_model->edit_hospital_details($h_id);	
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('notification/hospital_list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function expenditurelist_view()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$e_id=base64_decode($this->uri->segment(3));
			$data['edit_expenditure']=$this->Notification_model->edit_expenditure_details($e_id);	
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('notification/expenditure_list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function payments_view()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$p_id=base64_decode($this->uri->segment(3));
			$data['edit_payments']=$this->Notification_model->edit_payments_details($p_id);	
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('notification/payments_list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}

	
	
}
