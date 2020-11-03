<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_sales_person_list(){
	$this->db->select('salespersons.s_id,salespersons.name')->from('salespersons');
	$this->db->where('salespersons.status', 1);
	return $this->db->get()->result_array();
	}
	public function get_mobile_number_list($sale_person){
	$this->db->select('salespersons.s_id,salespersons.name,salespersons.mobile_number')->from('salespersons');
	$this->db->where('salespersons.name',$sale_person);
	return $this->db->get()->result_array(); 
	}
	public function check_mobile_saleperson_exist($sale_person,$mobile){
	$this->db->select('salespersons.*')->from('salespersons');
	$this->db->where('salespersons.name',$sale_person);
	$this->db->where('salespersons.mobile_number',$mobile);
    return $this->db->get()->row_array();
	}
	public function update_sales_persons_details($s_id,$data){
	$this->db->where('s_id',$s_id);
	return $this->db->update('salespersons',$data);
	}
	public  function get_otp_user_details($s_id){
		$this->db->select('mobile_number,s_id,name,otp,opt_created_at')->from('salespersons');
		$this->db->where('s_id',$s_id);
        return $this->db->get()->row_array();
	}
	
	public function get_sales_persons_list($s_id){
	$this->db->select('salespersons.s_id,salespersons.name')->from('salespersons');
	$this->db->where('salespersons.status', 1);
	$this->db->where('salespersons.s_id', $s_id);
	return $this->db->get()->result_array();
	}
	
	
	public function save_payments_details($data){
	$this->db->insert('payments',$data);
	return $this->db->insert_id();
	}
	
	public function check_hospital_wise_mothly_exit($hospital,$month){
	$this->db->select('payments.*')->from('payments');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month',$month);
	return $this->db->get()->result_array();
	}
	public function get_payments_list(){
	$this->db->select('hospital_mothly_bill.year as years,payments.*,hospital.hospital_name,salespersons.s_id,salespersons.name,hospital_mothly_bill.month')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('salespersons', 'salespersons.s_id = payments.sales_person', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.year', 'left');
	$this->db->where('payments.status!=', 2);
	return $this->db->get()->result_array();
	}
	
	public function get_hospital_list(){
	$this->db->select('hospital_mothly_bill.hospital,hospital_mothly_bill.h_m_b_id,hospital.h_id,hospital.hospital_name')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.status', 1);
	$this->db->group_by('hospital_mothly_bill.hospital');
	$this->db->order_by('hospital.hospital_name');
	return $this->db->get()->result_array();
	}
	public function get_hospital_month_wise_total_amount($hospital){
	$this->db->select('hospital_mothly_bill.month,hospital_mothly_bill.h_m_b_id,months.months')->from('hospital_mothly_bill');
    $this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
	$this->db->group_by('hospital_mothly_bill.month');
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->result_array(); 
	}
	
	public function get_hospital_month_wise_year($month_name){
	$this->db->select('hospital_mothly_bill.month,hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.year')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$month_name);
	$this->db->group_by('hospital_mothly_bill.h_m_b_id');
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->result_array(); 
	}
	public function get_hospital_year_wise_total_amount($year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$year);
	$this->db->group_by('hospital_mothly_bill.h_m_b_id');
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->result_array(); 
	}
	
	
	public function get_hospital_paid_amount($year){
	$this->db->select('payments.p_id,SUM((payments.paid_amount)+(payments.discount))as paid')->from('payments');
	$this->db->where('payments.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->result_array(); 
	}
	public function paid_amount($hospital,$month_name){
	$this->db->select('payments.p_id,SUM(payments.paid_amount)as paid')->from('payments');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month_name',$month_name);
	return $this->db->get()->row_array(); 
	}
	
	public function paid_amount_list($hospital,$month_name,$year){
	$this->db->select('payments.p_id,SUM((payments.paid_amount)+(payments.discount))as paid')->from('payments');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month_name',$month_name);
	$this->db->where('payments.year',$year);
	return $this->db->get()->row_array(); 
	}
	public function delete_payments_details($p_id){
	$this->db->where('p_id', $p_id);
    return $this->db->delete('payments');
	}
	
	public function get_payments_details($p_id){
	$this->db->select('payments.*,hospital.hospital_name,hospital_mothly_bill.month,hospital_mothly_bill.year as years')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.year', 'left');
	$this->db->where('payments.p_id',$p_id);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function get_payments_type_list($p_id){
	$this->db->select('payments.p_id,payments.payment_type,payments.hospitals_name')->from('payments');
	$this->db->where('payments.p_id',$p_id);
	return $this->db->get()->row_array();
	}
	public function get_payments_cheque_details($p_id){
	$this->db->select('payments.*,hospital.hospital_name,hospital_mothly_bill.month,hospital_mothly_bill.year as years')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.year', 'left');
	$this->db->where('payments.p_id',$p_id);
	$this->db->where('payments.status',0);
	return $this->db->get()->row_array();
	}
	
	
	
	
	public function update_payment_cheque_details($p_id,$data){
	$this->db->where('p_id',$p_id);
	return $this->db->update('payments',$data);
	}
	
	
	public function get_month_data($month_name){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.month')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$month_name);
	return $this->db->get()->row_array(); 
	}
	
	public function get_year_data($year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.year')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$year);
	return $this->db->get()->row_array(); 
	}
	public function get_hospital_data($hospital){
	$this->db->select('hospital.h_id,hospital.hospital_name')->from('hospital');
	$this->db->where('hospital.h_id',$hospital);
	return $this->db->get()->row_array(); 
	}
	
	public function save_notifications_list_details($data){
    $this->db->insert('notifications_list',$data);
	return $this->db->insert_id();	
	}
    public function notifications_list($p_id){
	$this->db->select('notifications_list.*')->from('notifications_list');
    $this->db->where('notifications_list.p_id',$p_id);
	return $this->db->get()->row_array();
	}
    public function update_notifications_list_details($p_id,$data){
	$this->db->where('p_id',$p_id);
    return $this->db->update("notifications_list",$data);
	}
	
	public function check_saleperson_login($data){
		$this->db->select('*')->from('salespersons');		
		$this->db->where('email', $data['email']);
		$this->db->where('password',$data['password']);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();
	}
	
	public  function get_saleperson_details($s_id){
		$this->db->select('*')->from('salespersons');		
		$this->db->where('s_id',$s_id);
        return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	

}