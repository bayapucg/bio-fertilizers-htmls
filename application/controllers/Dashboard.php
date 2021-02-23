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
			$data['total_hospitals']=$this->Dashboard_model->get_total_hospitals();
			$data['total_beds']=$this->Dashboard_model->get_total_beds();
			$data['advance_amount']=$this->Dashboard_model->get_advance_amount();
			$data['expenditure_amount']=$this->Dashboard_model->get_expenditure_amount();
			$data['discount_amount']=$this->Dashboard_model->get_discount_amount();
			$data['total_amount']=$this->Dashboard_model->get_total_amount();
			$data['received_amount']=$this->Dashboard_model->get_received_amount();
			$data['cash_on_hand']=$this->Dashboard_model->get_cash_on_hand_amount();
			$data['cash_at_bank']=$this->Dashboard_model->get_cash_at_bank_amount();
			
			$data['cash_on_hand_expenditure']=$this->Dashboard_model->get_expenditure_cash_on_hand_amount();
			$data['cash_at_bank_expenditure']=$this->Dashboard_model->get_expenditure_cash_at_bank_amount();
			
			/* dist wise kadapa */
			$data['district_list']=$this->Dashboard_model->district_list();
			$data['cash_on_hand_kadapa_dist']=$this->Dashboard_model->get_cash_on_hand_amount_kadapa_dist();

			$data['cash_at_bank_kadapa_dist']=$this->Dashboard_model->get_cash_at_bank_amount_kadapa_dist();
			
			$data['cash_on_hand_expenditure_kadapa_dist']=$this->Dashboard_model->get_expenditure_cash_on_hand_amount_kadapa_dist();
			$data['cash_at_bank_expenditure_kadapa_dist']=$this->Dashboard_model->get_expenditure_cash_at_bank_amount_kadapa_dist();
			
			
			/* dist wise Ananthapur */
			$data['cash_on_hand_Ananthapur_dist']=$this->Dashboard_model->get_cash_on_hand_amount_Ananthapur_dist();

			$data['cash_at_bank_Ananthapur_dist']=$this->Dashboard_model->get_cash_at_bank_amount_Ananthapur_dist();
			
			$data['cash_on_hand_expenditure_Ananthapur_dist']=$this->Dashboard_model->get_expenditure_cash_on_hand_amount_Ananthapur_dist();
			$data['cash_at_bank_expenditure_Ananthapur_dist']=$this->Dashboard_model->get_expenditure_cash_at_bank_amount_Ananthapur_dist();
			
			
			
			
									//echo'<pre>';print_r($data);exit;

			
			
			$this->load->view('admin/index',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
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
