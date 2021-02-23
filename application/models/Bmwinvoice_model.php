<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bmwinvoice_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_hospital_list(){
	$this->db->select('hospital.h_id,hospital.hospital_name,hospital.hospital_type')->from('hospital');
	$this->db->where('hospital.status', 1);
	$this->db->group_by('hospital.h_id');
	$this->db->order_by('hospital.hospital_name');
	return $this->db->get()->result_array();
	} 
	public function get_hospital_types_list(){
	$this->db->select('hospital.h_id,hospital.hospital_type')->from('hospital');
	$this->db->where('hospital.status', 1);
	$this->db->group_by('hospital.hospital_type');
	return $this->db->get()->result_array();
	}
	public function get_hospital_list_data(){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.cnt,hospital.h_id,hospital.hospital_name')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.status', 1);
	$this->db->group_by('hospital_mothly_bill.hospital');
	$this->db->order_by('hospital.hospital_name');
	return $this->db->get()->result_array();
	} 
	public function get_hospital_types($hospital_types){
	$this->db->select('hospital.h_id,hospital.hospital_name,hospital.hospital_type')->from('hospital');
	$this->db->where('hospital.hospital_type',$hospital_types);
	$this->db->group_by('hospital.hospital_name');
    $this->db->where('hospital.status', 1);
	return $this->db->get()->result_array(); 
	}
	
	public function get_months_list(){
	$this->db->select('months.m_id,months.months')->from('months');
	$this->db->where('months.status', 1);
	return $this->db->get()->result_array();
	} 
	public function update_hospital_monthly_bill_details($h_m_b_id,$data){
	$this->db->where('h_m_b_id',$h_m_b_id);
    return $this->db->update("hospital_mothly_bill",$data);
	}
	public function update_payments_details($h_m_b_id,$data){
	$this->db->where('h_m_b_id',$h_m_b_id);
    return $this->db->update("payments",$data);
	}
    public function get_mothlybill_list($hospital,$month){
	$this->db->select('SUM(payments.paid_amount) as paid,SUM(payments.pending_amount) as pending')->from('payments');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month',$month);
	$this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	} 
	public function get_hospital_details($hospital,$month){
	$this->db->select('payments.*,hospital.hospital_name,hospital.hospital_address,hospital.no_beds,hospital.cost_per_month')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month',$month);
	$this->db->where('payments.status', 1);
	$this->db->group_by('payments.hospital');
	$this->db->group_by('payments.month');
	return $this->db->get()->row_array();
	} 
	public function get_payments_details($hospital,$month){
	$this->db->select('payments.*,salespersons.name')->from('payments');
	$this->db->join('salespersons', 'salespersons.s_id = payments.sales_person', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('payments.month',$month);
	$this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	} 
	
	
	public function get_hospital_no_beds($hospital_types){
	$this->db->select('hospital.h_id,hospital.no_beds,hospital.cost_per_month,hospital.total_amount')->from('hospital');
	$this->db->where('hospital.h_id',$hospital_types);
	return $this->db->get()->result_array(); 
	}
	public function save_hospital_monthly_bill_details($data){
	$this->db->insert('hospital_mothly_bill',$data);
	return $this->db->insert_id();
	}
	public function get_mothly_bill_list(){
	$this->db->select('hospital_mothly_bill.*,hospital.hospital_name')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.status!=',2);
	return $this->db->get()->result_array(); 
	}
	
	
	
	public function get_monthly_paid_list($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.month,payments.*,hospital.hospital_name,hospital_mothly_bill.year as years')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.h_m_b_id', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->result_array(); 
	}
	public function get_monthly_name($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.month,hospital_mothly_bill.hospital_types,(SUM((payments.paid_amount)+(payments.discount)))as recived_amount ,SUM((payments.paid_amount))as paid,SUM((payments.discount))as discounts,((payments.total_amount)-(SUM((payments.paid_amount)+(payments.discount))))as pending,payments.p_id,payments.hospital,payments.month_name,payments.year,payments.sales_person,payments.total_amount,hospital.hospital_name,hospital.hospital_address,hospital_mothly_bill.year as years')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.h_m_b_id', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array(); 
	}
	
	public function get_monthly_previous_amount($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.month,(hospital_mothly_bill.year)as years,hospital_mothly_bill.total_amount,months.months')->from('hospital_mothly_bill');
    $this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->amount_monthly_wise($list['h_m_b_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['h_m_b_id']]=$list;
	   $data[$list['h_m_b_id']]['month_wise_amount']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function amount_monthly_wise($h_m_b_id){
	 $this->db->select('payments.hospital,payments.total_amount,SUM((payments.discount))as discounts,SUM((payments.paid_amount))as paid,SUM(((payments.paid_amount)+(payments.discount)))as paid_amount')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}	
		
		
		
		
		
		
		
		
		
		
		
		
	
		
	public function get_pending_previous_month($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(payments.paid_amount+payments.discount)as paid')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('payments', 'payments.h_m_b_id = hospital_mothly_bill.h_m_b_id', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function get_total_previous_month($hospital,$month,$year){
	$this->db->select('SUM(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->row_array();
	}
	
	public function check_hospital_month_year_already_exit($hospital_types,$hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.*')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.hospital_types',$hospital_types);
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->row_array(); 
	}
	public function edit_mothly_bill($h_m_b_id){
	$this->db->select('hospital_mothly_bill.*')->from('hospital_mothly_bill');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$h_m_b_id);
	return $this->db->get()->row_array();
	} 
	public function delete_bill_details($h_m_b_id){
	$this->db->where('h_m_b_id', $h_m_b_id);
    return $this->db->delete('hospital_mothly_bill');
	}
	public function delete_payment_details($h_m_b_id){
	$this->db->where('h_m_b_id', $h_m_b_id);
    return $this->db->delete('payments');
	}
	
	public function get_mothly_genrate_bill($hospital,$month,$year){
	$this->db->select('payments.p_id,SUM(payments.paid_amount+payments.discount)as paid,hospital_mothly_bill.month,hospital_mothly_bill.no_beds,hospital_mothly_bill.cost_per_month,hospital_mothly_bill.year,hospital.hospital_name,payments.hospital,hospital.hospital_address,payments.total_amount')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.month_name', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	
	public function get_mothly_genrate_previous_bill($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM((hospital_mothly_bill.no_beds)*(hospital_mothly_bill.cost_per_month))as total')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month >',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->row_array();
	}
	
	
	
	public function genrate_previous_paid_bill($hospital,$month,$year){
	$this->db->select('SUM(payments.paid_amount+payments.discount)as paid,hospital_mothly_bill.month,hospital.hospital_name,hospital.hospital_address')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.month_name', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month >',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	
	public function genrate_previous_total_bill($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.month,SUM(payments.total_amount)as total')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.month_name', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month >',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	$this->db->group_by('payments.h_m_b_id');
	return $this->db->get()->row_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	public function get_monthly_paid_list_data($hospital,$month,$year){
	$this->db->select('payments.p_id,payments.sales_person,payments.created_at,payments.cheque_no,payments.payment_type,payments.trans_action_no,payments.hospital,payments.p_id,payments.year as years,payments.total_amount,payments.paid_amount,payments.discount,hospital.hospital_name,hospital_mothly_bill.month,hospital_mothly_bill.year')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.year', 'left');
    $this->db->where('payments.hospital', $hospital);
    $this->db->where('hospital_mothly_bill.month', $month);
    $this->db->where('hospital_mothly_bill.year', $year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	}
	public function get_monthly_previous_amount_data($hospital,$month,$year){
	$this->db->select('payments.p_id,payments.sales_person,payments.created_at,payments.cheque_no,payments.payment_type,payments.trans_action_no,payments.hospital,payments.p_id,payments.year as years,payments.total_amount,payments.paid_amount,payments.discount,hospital.hospital_name,hospital_mothly_bill.month,hospital_mothly_bill.year')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.year', 'left');
    $this->db->where('payments.hospital', $hospital);
    $this->db->where('payments.m_name >', $month);
    $this->db->where('hospital_mothly_bill.year', $year);
    $this->db->where('payments.status', 1);
	return $this->db->get()->result_array();
	}
	
	public function monthly_list($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.*,hospital.hospital_name,hospital.hospital_address')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
    $this->db->where('hospital_mothly_bill.hospital', $hospital);
    $this->db->where('hospital_mothly_bill.month', $month);
    $this->db->where('hospital_mothly_bill.year', $year);
    $this->db->where('hospital_mothly_bill.status', 1);
	return $this->db->get()->row_array();
	}
	
	public function monthly_count($month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,max(hospital_mothly_bill.cnt)as count')->from('hospital_mothly_bill');
    $this->db->where('hospital_mothly_bill.month', $month);
    $this->db->where('hospital_mothly_bill.year', $year);
    $this->db->where('hospital_mothly_bill.status', 1);
	return $this->db->get()->row_array();
	}
	public function monthly_and_year_list($month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.cnt')->from('hospital_mothly_bill');
    $this->db->where('hospital_mothly_bill.month', $month);
    $this->db->where('hospital_mothly_bill.year', $year);
    $this->db->where('hospital_mothly_bill.status', 1);
	return $this->db->get()->result_array();
	}
	
	
	public function get_bill_paid_amount($hospital,$month,$year){
	$this->db->select('payments.p_id,SUM(payments.paid_amount+payments.discount)as paid,SUM(payments.paid_amount)as recived_amount,SUM(payments.discount)as discount_amount')->from('payments');
	$this->db->join('hospital', 'hospital.h_id = payments.hospital', 'left');
	$this->db->join('hospital_mothly_bill', 'hospital_mothly_bill.h_m_b_id = payments.month_name', 'left');
	$this->db->where('payments.hospital',$hospital);
	$this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function get_previous_total_month_bill($hospital,$month,$year){
	$this->db->select('SUM(hospital_mothly_bill.total_amount)as total')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	return $this->db->get()->row_array();
	}
	public function get_previous_paid_month_bill($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,SUM(payments.paid_amount+payments.discount)as paid')->from('hospital_mothly_bill');
	$this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->join('payments', 'payments.h_m_b_id = hospital_mothly_bill.h_m_b_id', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('payments.status',1);
	return $this->db->get()->row_array();
	}
	public function check_bill_list($hospital,$month,$year){
	$this->db->select('bill_invoice.h_m_b_id')->from('bill_invoice');
	$this->db->where('bill_invoice.hospital_name',$hospital);
    $this->db->where('bill_invoice.month_name',$month);
	$this->db->where('bill_invoice.year_name',$year);
	$this->db->where('bill_invoice.status',1);
	return $this->db->get()->row_array();
	}
	
	public function save_bill_invoice_details($data){
	$this->db->insert('bill_invoice',$data);
	return $this->db->insert_id();
	}
	public function update_bill_invoice_details($h_m_b_id,$data){
	$this->db->where('h_m_b_id',$h_m_b_id);
    return $this->db->update("bill_invoice",$data);
	}
	public function monthly_list_hospital_bill($h_m_b_id){
	$this->db->select('bill_invoice.b_i_id,bill_invoice.h_m_b_id,bill_invoice.hospital_name,bill_invoice.month_name as month,bill_invoice.year_name as year,bill_invoice.prev_balance_amount,bill_invoice.total_amount,bill_invoice.paid_amount,bill_invoice.pending_amount,bill_invoice.amount,bill_invoice.created_at')->from('bill_invoice');
    $this->db->where('bill_invoice.h_m_b_id',$h_m_b_id);
	$this->db->where('bill_invoice.status',1);
	return $this->db->get()->row_array();
	}
	public function hospital_bill_list(){
	$this->db->select('bill_invoice.*')->from('bill_invoice');
	$this->db->where('bill_invoice.status',1);
	return $this->db->get()->row_array();
	}


    public function update_count_value($h_m_b_id,$data){
	$this->db->where('h_m_b_id',$h_m_b_id);
    return $this->db->update("hospital_mothly_bill",$data);
	}
    


public function save_notifications_list_details($data){
    $this->db->insert('notifications_list',$data);
	return $this->db->insert_id();	
	}
    public function notifications_list($h_m_b_id){
	$this->db->select('notifications_list.*')->from('notifications_list');
    $this->db->where('notifications_list.h_m_b_id',$h_m_b_id);
	return $this->db->get()->row_array();
	}
    public function update_notifications_list_details($h_m_b_id,$data){
	$this->db->where('h_m_b_id',$h_m_b_id);
    return $this->db->update("notifications_list",$data);
	}
	
	
public function get_monthly_pending_bill($hospital,$month,$year){
	$this->db->select('hospital.hospital_name,hospital.hospital_type,hospital.hospital_address,hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.month,(hospital_mothly_bill.year)as years,hospital_mothly_bill.total_amount,months.months')->from('hospital_mothly_bill');
    $this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
    $this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	$return=$this->db->get()->row_array();
		$about_list=$this->amount_monthly_pending_bill($return['h_m_b_id']);
		$data=$return;
		$data['month_wise_pending_amount']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	 
	public function amount_monthly_pending_bill($h_m_b_id){
	 $this->db->select('payments.hospital,payments.total_amount,SUM((payments.discount))as discounts,SUM((payments.paid_amount))as paid,SUM(((payments.paid_amount)+(payments.discount)))as paid_amount')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}	
		
 public function get_monthly_pending_bill_list($hospital,$month,$year){
	$this->db->select('hospital.hospital_name,hospital.hospital_type,hospital.hospital_address,hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.month,(hospital_mothly_bill.year)as years,hospital_mothly_bill.total_amount,months.months')->from('hospital_mothly_bill');
    $this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
    $this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('hospital_mothly_bill.month',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	$return=$this->db->get()->row_array();
		$about_list=$this->amount_monthly_pending_bill_list($return['h_m_b_id']);
		$data=$return;
		$data['pending_bill_list']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	 
	public function amount_monthly_pending_bill_list($h_m_b_id){
	 $this->db->select('payments.*')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}	

public function get_monthly_previous_pending_amount($hospital,$month,$year){
	$this->db->select('hospital_mothly_bill.h_m_b_id,hospital_mothly_bill.month,(hospital_mothly_bill.year)as years,hospital_mothly_bill.total_amount,months.months')->from('hospital_mothly_bill');
    $this->db->join('months', 'months.m_id = hospital_mothly_bill.month', 'left');
	$this->db->where('hospital_mothly_bill.hospital',$hospital);
    $this->db->where('months.m_id <',$month);
	$this->db->where('hospital_mothly_bill.year',$year);
	$this->db->where('hospital_mothly_bill.status',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->amount_monthly_wise_pending($list['h_m_b_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['h_m_b_id']]=$list;
	   $data[$list['h_m_b_id']]['month_wise_amount']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function amount_monthly_wise_pending($h_m_b_id){
	 $this->db->select('payments.hospital,(payments.total_amount-SUM((payments.paid_amount)+(payments.discount)))as pending_amount,payments.total_amount,SUM(((payments.paid_amount)+(payments.discount)))as paid_amount')->from('payments');
     $this->db->where('payments.h_m_b_id',$h_m_b_id);
     $this->db->where('payments.status',1);
	 return $this->db->get()->result_array();
	}
	public function get_bill_hospital_details($h_id){
		$this->db->select('hmbl.*,h.*,district.name as d_name,town.town_name')->from('hospital_mothly_bill as hmbl');
		$this->db->join('hospital as h', 'h.h_id = hmbl.hospital', 'left');
		$this->db->join('district', 'district.d_id =h.district', 'left');
		$this->db->join('town', 'town.t_id =h.town', 'left');
		$this->db->where('hmbl.h_m_b_id',$h_id);
		return $this->db->get()->row_array();
	} 	
	public  function get_bill_payment_list($h_id){
	 $this->db->select('hmb.*,h.hospital_name')->from('hospital_mothly_bill as hmb');
	 $this->db->join('hospital as h', 'h.h_id = hmb.hospital', 'left');
     $this->db->where('hmb.hospital',$h_id);
     $this->db->where('hmb.status',1);
	 return $this->db->get()->result_array();	
	}
		





}