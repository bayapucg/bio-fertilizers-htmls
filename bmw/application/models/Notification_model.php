<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_sales_person_list_data(){
	$this->db->select('salespersons.*')->from('salespersons');
	$this->db->where('salespersons.notification_status!=',1);
	$this->db->where('salespersons.notification_status!=',0);
	return $this->db->get()->result_array();
	}
	public function get_hospital_list_data(){
	$this->db->select('hospital.*')->from('hospital');
	$this->db->where('hospital.notification_status!=',1);
	$this->db->where('hospital.notification_status!=',0);
	return $this->db->get()->result_array();
	}
	public function get_expenditure_list_data(){
	$this->db->select('expenditure.*')->from('expenditure');
	$this->db->where('expenditure.notification_status!=',1);
	$this->db->where('expenditure.notification_status!=',0);
	return $this->db->get()->result_array();
	}
    public function get_payments_list_data(){
	$this->db->select('payments.*')->from('payments');
	$this->db->where('payments.notification_status',2);
	return $this->db->get()->result_array();
	}
    public function get_bmw_invoice_list_data(){
	$this->db->select('hospital_mothly_bill.*,hospital.hospital_name')->from('hospital_mothly_bill');
    $this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.notification_status!=',1);
	$this->db->where('hospital_mothly_bill.notification_status!=',0);
	return $this->db->get()->result_array();
	}

     public function edit_salespersons_details($s_id){
	$this->db->select('salespersons.*')->from('salespersons');
	$this->db->where('salespersons.s_id',$s_id);
	return $this->db->get()->row_array();
	} 

    public function edit_hospital_details($h_id){
	$this->db->select('hospital.*')->from('hospital');
	$this->db->where('hospital.h_id',$h_id);
	return $this->db->get()->row_array();
	} 

   public function edit_expenditure_details($e_id){
	$this->db->select('expenditure.*')->from('expenditure');
	$this->db->where('expenditure.e_id',$e_id);
	return $this->db->get()->row_array();
	} 

 public function edit_bmw_invoice_details($h_m_b_id){
	$this->db->select('hospital_mothly_bill.*,hospital.hospital_name')->from('hospital_mothly_bill');
	$this->db->join('hospital', 'hospital.h_id = hospital_mothly_bill.hospital', 'left');
	$this->db->where('hospital_mothly_bill.h_m_b_id',$h_m_b_id);
	return $this->db->get()->row_array();
	} 

    public function edit_payments_details($p_id){
	$this->db->select('payments.*')->from('payments');
	$this->db->where('payments.p_id',$p_id);
	return $this->db->get()->row_array();
	}




    public function get_notifications_list(){
	$this->db->select('(notifications_list.h_m_b_id)as invoice_id,(notifications_list.p_id)as payments_id,(notifications_list.e_id)as expenditure_id,(notifications_list.s_id)as sales_id,(notifications_list.h_id)as hospital_id,notifications_list.n_id,(notifications_list.notification_status)as n_status,(notifications_list.updated_at)as upadte_date,salespersons.name,salespersons.email,salespersons.mobile_number,salespersons.alt_mobile_number,salespersons.aadhar_number,salespersons.qualification,salespersons.dob,salespersons.address,hospital.hospital_name,hospital.hospital_type,hospital.s_d_r,hospital.e_d_r,hospital.no_beds,hospital.cost_per_month,hospital.total_amount,hospital.advance_fee,hospital.hospital_address,h.hospital_types,h.hospital,h.month,h.no_beds as beds,h.cost_per_month as cost_beds,h.total_amount as total,h.year,payments.*,expenditure.*')->from('notifications_list');
	$this->db->join('salespersons', 'salespersons.s_id = notifications_list.s_id', 'left');
	$this->db->join('hospital', 'hospital.h_id = notifications_list.h_id', 'left');
	$this->db->join('hospital_mothly_bill as h', 'h.h_m_b_id = notifications_list.h_m_b_id', 'left');
	$this->db->join('payments', 'payments.p_id = notifications_list.p_id', 'left');
	$this->db->join('expenditure', 'expenditure.e_id = notifications_list.e_id', 'left');
	return $this->db->get()->result_array();
	}













}