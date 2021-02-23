<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenditure_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function district_list(){
	$this->db->select('district.d_id,district.name')->from('district');
	$this->db->where('district.status',1);
	$this->db->group_by('district.name');
	return $this->db->get()->result_array();
	}
	public function save_expenditure_details($data){
	$this->db->insert('expenditure',$data);
	return $this->db->insert_id();	
	}
	public function get_expenditure_list(){
	$this->db->select('expenditure.*,district.name,town.town_name')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->join('town', 'town.t_id =expenditure.town', 'left');
	$this->db->where('expenditure.status !=', 2);
	return $this->db->get()->result_array();
	} 
    public function edit_expenditure_details($e_id){
	$this->db->select('expenditure.*')->from('expenditure');
	$this->db->where('expenditure.e_id',$e_id);
	return $this->db->get()->row_array();
	} 
    public function update_expenditure_details($e_id,$data){
	$this->db->where('e_id',$e_id);
    return $this->db->update("expenditure",$data);
	}
     public function delete_expenditure_details($e_id){
	  $this->db->where('e_id', $e_id);
     return $this->db->delete('expenditure');
	}
	public function get_monthly_wise_reports($month,$year){
	$this->db->select('expenditure.*,district.name')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where("DATE_FORMAT(expenditure.date,'%m')",$month);
    $this->db->where("DATE_FORMAT(expenditure.date,'%Y')",$year);
    $this->db->order_by("(expenditure.date)");
    $this->db->where('expenditure.status', 1);
	return $this->db->get()->result_array();
	} 
	
	public function get_month_name($month,$year){
	$this->db->select('district.name,SUM(expenditure.amount)as total,expenditure.e_id,DATE_FORMAT(expenditure.date,"%M-%Y") as dates')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->where("DATE_FORMAT(expenditure.date,'%m')",$month);
    $this->db->where("DATE_FORMAT(expenditure.date,'%Y')",$year);
    $this->db->where('expenditure.status', 1);
	return $this->db->get()->row_array();
	} 
	
	
	public function save_notifications_list_details($data){
    $this->db->insert('notifications_list',$data);
	return $this->db->insert_id();	
	}
    public function notifications_list($e_id){
	$this->db->select('notifications_list.*')->from('notifications_list');
    $this->db->where('notifications_list.e_id',$e_id);
	return $this->db->get()->row_array();
	}
    public function update_notifications_list_details($e_id,$data){
	$this->db->where('e_id',$e_id);
    return $this->db->update("notifications_list",$data);
	}
	
	
	
	/* dist wise reports */
	public function get_district_wise_reports($district,$town,$month,$year){
	$this->db->select('expenditure.*')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->join('town', 'town.t_id=expenditure.town', 'left');
	$this->db->where('town.t_id',$town);
	$this->db->where('district.d_id',$district);
	$this->db->where("DATE_FORMAT(expenditure.date,'%m')",$month);
    $this->db->where("DATE_FORMAT(expenditure.date,'%Y')",$year);
    $this->db->order_by("(expenditure.date)");
    $this->db->where('expenditure.status', 1);
	return $this->db->get()->result_array();
	} 
	
	public function get_district_wise_month_name($district,$town,$month,$year){
	$this->db->select('district.name,SUM(expenditure.amount)as total,expenditure.e_id,DATE_FORMAT(expenditure.date,"%M-%Y") as dates')->from('expenditure');
	$this->db->join('district', 'district.d_id =expenditure.district', 'left');
	$this->db->join('town', 'town.t_id=expenditure.town', 'left');
	$this->db->where('town.t_id',$town);
	$this->db->where('district.d_id',$district);
	$this->db->where("DATE_FORMAT(expenditure.date,'%m')",$month);
    $this->db->where("DATE_FORMAT(expenditure.date,'%Y')",$year);
    $this->db->where('expenditure.status', 1);
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