<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_total_hospitals(){
	$this->db->select('count(hospital.h_id)as hospitals')->from('hospital');
	$this->db->where('hospital.status',1);
	return $this->db->get()->row_array();
	}
	public function get_total_beds(){
	$this->db->select('SUM(hospital.no_beds)as bed')->from('hospital');
	$this->db->where('hospital.status',1);
	return $this->db->get()->row_array();
	}
	
	
	public function get_investment_amount(){
	$this->db->select('payments.p_id,(payments.investment_amount) as investment')->from('payments');
	$this->db->where('payments.status',1);
    $this->db->where('payments.hospitals_name=','Investment');
	return $this->db->get()->result_array();
	}
	
	
	public function get_advance_amount(){
	$this->db->select('SUM(hospital.advance_fee)as advance')->from('hospital');
	$this->db->where('hospital.status',1);
	return $this->db->get()->row_array();
	}
	public function get_expenditure_amount(){
	$this->db->select('SUM(expenditure.amount)as expenditure')->from('expenditure');
	$this->db->where('expenditure.status',1);
	return $this->db->get()->row_array();
	}
	
	public function get_discount_amount(){
	$this->db->select('SUM(payments.discount)as amount')->from('payments');
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function get_total_amount(){
	$this->db->select('SUM(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->row_array();
	}
	public function get_received_amount(){
	$this->db->select('SUM(payments.paid_amount)as paid')->from('payments');
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function get_cash_on_hand_amount(){
	$this->db->select('SUM(payments.paid_amount)as cash')->from('payments');
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type',1);
	return $this->db->get()->row_array();
	}
	public function get_cash_at_bank_amount(){
	$this->db->select('SUM(payments.paid_amount)as online')->from('payments');
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type!=',1);
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_on_hand_amount(){
	$this->db->select('SUM(expenditure.amount)as cash')->from('expenditure');
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type=','Cash');
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_at_bank_amount(){
	$this->db->select('SUM(expenditure.amount)as online')->from('expenditure');
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type!=','Cash');
	return $this->db->get()->row_array();
	}
	
	
	
	
	public function district_list(){
	$this->db->select('district.d_id,district.name')->from('district');
	$this->db->where('district.status',1);
	$this->db->group_by('district.name');
	return $this->db->get()->result_array();
	}
	public function get_cash_on_hand_amount_kadapa_dist(){
	$this->db->select('SUM(payments.paid_amount)as cash')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->where('district.d_id',1);
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type',1);
	return $this->db->get()->row_array();
	}
	public function get_cash_at_bank_amount_kadapa_dist(){
	$this->db->select('SUM(payments.paid_amount)as online')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->where('district.d_id',1);
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type!=',1);
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_on_hand_amount_kadapa_dist(){
	$this->db->select('SUM(expenditure.amount)as cash')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where('district.d_id',1);
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type=','Cash');
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_at_bank_amount_kadapa_dist(){
	$this->db->select('SUM(expenditure.amount)as online')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where('district.d_id',1);
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type!=','Cash');
	return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	public function get_cash_on_hand_amount_Ananthapur_dist(){
	$this->db->select('SUM(payments.paid_amount)as cash')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->where('district.d_id',2);
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type',1);
	return $this->db->get()->row_array();
	}
	public function get_cash_at_bank_amount_Ananthapur_dist(){
	$this->db->select('SUM(payments.paid_amount)as online')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->where('district.d_id',2);
	$this->db->where('payments.status',1);
	$this->db->where('payments.payment_type!=',1);
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_on_hand_amount_Ananthapur_dist(){
	$this->db->select('SUM(expenditure.amount)as cash')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where('district.d_id',2);
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type=','Cash');
	return $this->db->get()->row_array();
	}
	public function get_expenditure_cash_at_bank_amount_Ananthapur_dist(){
	$this->db->select('SUM(expenditure.amount)as online')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where('district.d_id',2);
	$this->db->where('expenditure.status',1);
	$this->db->where('expenditure.payment_type!=','Cash');
	return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	
	

}