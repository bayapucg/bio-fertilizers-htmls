<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Income_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_monthly_reports($month,$year){
	$this->db->select('payments.*')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	}
	
	public function get_investment_amount($month,$year){
	$this->db->select('SUM((payments.paid_amount)+(payments.discount))as paid')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	public function get_month_name($month,$year){
	$this->db->select('DATE_FORMAT(payments.created_at,"%m") as month,DATE_FORMAT(payments.created_at,"%Y") as years,payments.p_id,payments.sales_person,payments.year_name,payments.months_names')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	public function monthly_reports($month,$year){
	$this->db->select('payments.h_m_b_id,payments.p_id,(payments.hospitals_name)as hospital_name,SUM(payments.investment_amount)as investment ,payments.total_amount,payments.paid_amount,payments.discount,SUM((payments.paid_amount)+(payments.discount))as paid,')->from('payments');
    $this->db->where('payments.months_names', $month);
    $this->db->where('payments.year_name', $year);
    $this->db->where('payments.status', 1);
    //$this->db->group_by('payments.h_m_b_id');
    $this->db->group_by('payments.hospitals_name');
	return $this->db->get()->result_array();
	}
	
	public function paid_amount_monthly_reports($month,$year){
	$this->db->select('SUM(payments.paid_amount)as paid')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	public function discount_amount_monthly_reports($month,$year){
	$this->db->select('SUM(payments.discount)as  discount_amounts')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	
	
	public function total_amount_monthly_reports($month,$year){
	$this->db->select('payments.p_id,(payments.total_amount) as total')->from('payments');
	$this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
    //$this->db->group_by('payments.hospital');
	return $this->db->get()->result_array();
	}
	public function investment_amount_monthly_reports($month,$year){
	$this->db->select('payments.p_id,(payments.investment_amount) as investment')->from('payments');
	$this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.hospitals_name=','Investment');
	return $this->db->get()->result_array();
	}
	
	public function get_cash_amount($month,$year){
	$this->db->select('SUM(payments.paid_amount) as cash_paid')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 1);
	return $this->db->get()->row_array();
	}
	public function get_online_amount($month,$year){
	$this->db->select('SUM(payments.paid_amount) as online_paid')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 2);
	return $this->db->get()->row_array();
	}
	
	public function get_cheque_amount($month,$year){
	$this->db->select('SUM(payments.paid_amount) as cheque_paid')->from('payments');
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 3);
	return $this->db->get()->row_array();
	}
	
	/* district_wise_reports */
	
	public function get_district_wise_cash_amount($district,$town,$month,$year){
	$this->db->select('SUM(payments.paid_amount) as cash_paid')->from('payments');
    $this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 1);
	return $this->db->get()->row_array();
	}
	public function get_district_wise_online_amount($district,$town,$month,$year){
	$this->db->select('SUM(payments.paid_amount) as online_paid')->from('payments');
     $this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 2);
	return $this->db->get()->row_array();
	}
	
	public function get_district_wise_cheque_amount($district,$town,$month,$year){
	$this->db->select('SUM(payments.paid_amount) as cheque_paid')->from('payments');
     $this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
    $this->db->where('payments.payment_type', 3);
	return $this->db->get()->row_array();
	}
	
	public function get_district_wise_month_name($district,$town,$month,$year){
	$this->db->select('town.town_name,DATE_FORMAT(payments.created_at,"%m") as month,DATE_FORMAT(payments.created_at,"%Y") as years,payments.p_id,payments.sales_person,payments.year_name,payments.months_names,district.name')->from('payments');
    $this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	
	
	public function paid_amount_district_wise_monthly_reports($district,$town,$month,$year){
	$this->db->select('SUM(payments.paid_amount)as paid')->from('payments');
    $this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	public function total_amount_district_wise_monthly_reports($district,$town,$month,$year){
	$this->db->select('payments.p_id,(payments.total_amount) as total')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
    //$this->db->group_by('payments.hospitals_name');
	return $this->db->get()->result_array();
	}
	
	public function get_district_wise_monthly_reports($district,$town,$month,$year){
	$this->db->select('payments.*,district.name')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	}
	public function discount_district_wise_amount_monthly_reports($district,$town,$month,$year){
	$this->db->select('SUM(payments.discount)as  discount_amounts')->from('payments');
	$this->db->join('hospital', 'hospital.h_id =payments.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where("DATE_FORMAT(payments.created_at,'%m')",$month);
	$this->db->where("DATE_FORMAT(payments.created_at,'%Y')",$year);
	$this->db->where('district.d_id',$district);
    $this->db->where('payments.status', 1);
	return $this->db->get()->row_array();
	}
	
	/* district_wise_reports */
	public function get_district_list(){
	$this->db->select('district.name,district.d_id')->from('district');
	$this->db->where('district.status',1);
	$this->db->group_by('district.name');
	return $this->db->get()->result_array();
	}
	public function get_district_name($district,$town,$month,$year){
	$this->db->select('town.town_name,hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.hospital_types,hospital_mothly_bill.hospital,hospital_mothly_bill.total_amount,hospital_mothly_bill.month,hospital_mothly_bill.year,district.name,hospital.hospital_name,hospital.hospital_address')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
    $this->db->where('hospital_mothly_bill.month',$month);
    $this->db->where('hospital_mothly_bill.year',$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('town.t_id',$town);
    $this->db->where('hospital_mothly_bill.status', 1);
    return $this->db->get()->row_array();
	}
	/* pending income reports */
	
	public function get_district_wise_monthly_pending_reports($district,$town,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.hospital_types,hospital_mothly_bill.hospital,hospital_mothly_bill.total_amount,hospital_mothly_bill.month,hospital_mothly_bill.year,district.name,hospital.hospital_name,hospital.hospital_address')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
    $this->db->where('hospital_mothly_bill.month',$month);
    $this->db->where('hospital_mothly_bill.year',$year);
    $this->db->where('district.d_id',$district);
	$this->db->where('town.t_id',$town);
    $this->db->where('hospital_mothly_bill.status', 1);
    $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->monthly_district_wise_paid_amount($list['h_m_b_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['h_m_b_id']]=$list;
	   $data[$list['h_m_b_id']]['paid_amount']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function monthly_district_wise_paid_amount($h_m_b_id){
	 $this->db->select('payments.hospital,payments.total_amount,SUM((payments.discount))as discounts,SUM((payments.paid_amount))as paid,SUM(((payments.paid_amount)+(payments.discount)))as paid_amount')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}	
	
	public function get_bills_total_amounts($district,$town,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where('hospital_mothly_bill.month',$month);
    $this->db->where('hospital_mothly_bill.year',$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('hospital_mothly_bill.status', 1);
    return $this->db->get()->row_array();
	}
	public function get_bills_paid_amounts($district,$town,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(payments.paid_amount+payments.discount)as paid_amount,SUM(payments.paid_amount)as recevied_amount,SUM(payments.discount)as discount_amount')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('payments', 'payments.h_m_b_id = hospital_mothly_bill.h_m_b_id', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('district.d_id',$district);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	
	
	public function get_district_wise_monthly_prevous_pending_reports($district,$town,$month,$year){
    $this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.hospital_types,hospital_mothly_bill.hospital,hospital_mothly_bill.total_amount,hospital_mothly_bill.month,hospital_mothly_bill.year,district.name,hospital.hospital_name,hospital.hospital_address')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where('months.m_id <',$month);
    $this->db->where('hospital_mothly_bill.year',$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('hospital_mothly_bill.status', 1);	
	$return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->previous_monthly_district_wise_paid_amount($list['h_m_b_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['h_m_b_id']]=$list;
	   $data[$list['h_m_b_id']]['paid_amount']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function previous_monthly_district_wise_paid_amount($h_m_b_id){
	 $this->db->select('payments.hospital,payments.total_amount,SUM((payments.discount))as discounts,SUM((payments.paid_amount))as paid,SUM(((payments.paid_amount)+(payments.discount)))as paid_amount')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}	
	
	public function paid_amount($district,$town,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(payments.paid_amount+payments.discount)as paid_amount,SUM(payments.paid_amount)as recevied_amount,SUM(payments.discount)as discount_amount')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('payments', 'payments.h_m_b_id = hospital_mothly_bill.h_m_b_id', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where('months.m_id <',$month);
	$this->db->where('district.d_id',$district);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	
	public function prevous_total_amount($district,$town,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('hospital', 'hospital.h_id =hospital_mothly_bill.hospital', 'left');
	$this->db->join('district', 'district.d_id =hospital.district', 'left');
	$this->db->join('town', 'town.t_id=hospital.town', 'left');
	$this->db->where('town.t_id',$town);
    $this->db->where('months.m_id <',$month);
    $this->db->where('hospital_mothly_bill.year',$year);
    $this->db->where('district.d_id',$district);
    $this->db->where('hospital_mothly_bill.status', 1);	
	return $this->db->get()->row_array();
	}
	public function get_town_list($district){
	$this->db->select('town.district_name,town.t_id,town.town_name')->from('town');
	$this->db->where('town.status',1);
	$this->db->where('town.district_name',$district);
	$this->db->group_by('town.t_id');
	return $this->db->get()->result_array();
	}
	
	
	
	

}