<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesbulletin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_group_leaders($e_id){
	$this->db->select('employee.e_id,employee.group_leader')->from('employee');
     $this->db->where('employee.e_id',$e_id);
     $this->db->where('employee.status',1);
	 return $this->db->get()->row_array();
	}
	public function get_group_leader_list($group_leader){
	$this->db->select('employee.e_id,employee.group_leader,employee.name')->from('employee');
     $this->db->where('employee.e_id',$group_leader);
     $this->db->group_by('employee.e_id',$group_leader);
     $this->db->where('employee.status',1);
	 return $this->db->get()->result_array();
	}
	
	
	
	public function save_salesbulletin_details($data){
	$this->db->insert('sales_bulletin',$data);
	return $this->db->insert_id();	
	}
    public function get_salesbulletin_list(){
	$this->db->select('sales_bulletin.*,roles.role_name,employee.name,e.name as group_leader')->from('sales_bulletin');
	$this->db->join('roles', 'roles.r_id = sales_bulletin.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = sales_bulletin.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = sales_bulletin.name_of_gl', 'left');
     $this->db->where('sales_bulletin.status!=',2);
	 return $this->db->get()->result_array();
	}
	
	public function get_salesbulletin_list_admin($e_id){
	$this->db->select('sales_bulletin.*,roles.role_name,employee.name,e.name as group_leader')->from('sales_bulletin');
	$this->db->join('roles', 'roles.r_id = sales_bulletin.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = sales_bulletin.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = sales_bulletin.name_of_gl', 'left');
    $this->db->where('sales_bulletin.status!=',2);
	$this->db->where('sales_bulletin.admin_id',$e_id);
	$this->db->where('sales_bulletin.role_id!=',1);
	return $this->db->get()->result_array();
	}
	
	public function get_salesbulletin_list_manager($e_id){
	$this->db->select('sales_bulletin.*,roles.role_name,employee.name,e.name as group_leader')->from('sales_bulletin');
	$this->db->join('roles', 'roles.r_id = sales_bulletin.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = sales_bulletin.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = sales_bulletin.name_of_gl', 'left');
    $this->db->where('sales_bulletin.status!=',2);
	$this->db->where('sales_bulletin.manager_id',$e_id);
	$this->db->where('sales_bulletin.role_id!=',1);
	$this->db->where('sales_bulletin.role_id!=',2);
	return $this->db->get()->result_array();
	}
	
	public function get_salesbulletin_list_group_leader($e_id){
	$this->db->select('sales_bulletin.*,roles.role_name,employee.name,e.name as group_leader')->from('sales_bulletin');
	$this->db->join('roles', 'roles.r_id = sales_bulletin.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = sales_bulletin.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = sales_bulletin.name_of_gl', 'left');
    $this->db->where('sales_bulletin.status!=',2);
	$this->db->where('sales_bulletin.group_leader',$e_id);
	$this->db->where('sales_bulletin.role_id!=',1);
	$this->db->where('sales_bulletin.role_id!=',2);
	$this->db->where('sales_bulletin.role_id!=',3);
	return $this->db->get()->result_array();
	}
	
	
	public function get_salesbulletin_list_executives($e_id){
	$this->db->select('sales_bulletin.*,roles.role_name,employee.name,e.name as group_leader')->from('sales_bulletin');
	$this->db->join('roles', 'roles.r_id = sales_bulletin.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = sales_bulletin.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = sales_bulletin.name_of_gl', 'left');
    $this->db->where('sales_bulletin.status!=',2);
	$this->db->where('sales_bulletin.created_by',$e_id);
	$this->db->where('sales_bulletin.role_id',5);
	return $this->db->get()->result_array();
	}
	
	
	
	public function get_sales_bulletin_details($s_id){
	$this->db->select('sales_bulletin.*')->from('sales_bulletin');
    $this->db->where('sales_bulletin.s_id',$s_id);
	return $this->db->get()->row_array();
	}
	
	
	
	
	public function update_salesbulletin_details($s_id,$data){
	$this->db->where('s_id',$s_id);
    return $this->db->update("sales_bulletin",$data);		
	}
	public function delete_salesbulletin_details($s_id){
	$this->db->where('s_id',$s_id);
	return $this->db->delete('sales_bulletin');
	}
	


}