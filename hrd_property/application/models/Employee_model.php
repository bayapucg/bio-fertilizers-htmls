<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_city_list(){
	$this->db->select('city.c_id,city.city')->from('city');
	$this->db->where('city.status',1);
	$this->db->group_by('city.city');
	return $this->db->get()->result_array();
	}
	public function save_employee_details($data){
	$this->db->insert('employee',$data);
	return $this->db->insert_id();	
	}
	public function get_roles_list_for_super_admin(){
	$this->db->select('roles.r_id,roles.role_name')->from('roles');
	$this->db->where('roles.r_id',2);
	$this->db->where('roles.status',1);
	return $this->db->get()->result_array();
	}
	public function get_roles_list_for_admin(){
	$this->db->select('roles.r_id,roles.role_name')->from('roles');
	$this->db->where('roles.r_id',3);
	$this->db->where('roles.status',1);
	return $this->db->get()->result_array();
	} 

    public function get_roles_list_for_manager(){
	$this->db->select('roles.r_id,roles.role_name')->from('roles');
	$this->db->where('roles.r_id',4);
	$this->db->where('roles.status',1);
	return $this->db->get()->result_array();
	} 

   
    public function check_email_exits($email){
		$this->db->select('employee.*')->from('employee');
		$this->db->where('employee.email',$email);
		$this->db->where('employee.status',1);
		return $this->db->get()->row_array();
	}

   public function get_employees_list(){
   $this->db->select('employee.*,roles.role_name,city.city as c_name')->from('employee');
   	$this->db->join('roles', 'roles.r_id = employee.role_id', 'left');
   	$this->db->join('city', 'city.c_id = employee.city', 'left');
   $this->db->where('employee.status!=',2);
   return $this->db->get()->result_array();
  }

   public function get_employees_list_admin($e_id){
   $this->db->select('employee.*,roles.role_name,city.city as c_name')->from('employee');
   $this->db->join('roles', 'roles.r_id = employee.role_id', 'left');
  $this->db->join('city', 'city.c_id = employee.city', 'left');
   $this->db->where('employee.status!=',2);
   $this->db->where('employee.admin_id',$e_id);
   $this->db->where('employee.role_id!=',1);
   return $this->db->get()->result_array();
  }

public function get_employees_list_manager($e_id){
   $this->db->select('employee.*,roles.role_name,city.city as c_name')->from('employee');
   	$this->db->join('roles', 'roles.r_id = employee.role_id', 'left');
  $this->db->join('city', 'city.c_id = employee.city', 'left');
   $this->db->where('employee.status!=',2);
   $this->db->where('employee.manager_id',$e_id);
   $this->db->where('employee.role_id!=',1);
   $this->db->where('employee.role_id!=',2);
   return $this->db->get()->result_array();
  }


public function get_employees_list_executives($e_id){
   $this->db->select('employee.*,roles.role_name,city.city as c_name')->from('employee');
   	$this->db->join('roles', 'roles.r_id = employee.role_id', 'left');
  $this->db->join('city', 'city.c_id = employee.city', 'left');
   $this->db->where('employee.status!=',2);
   $this->db->where('employee.e_id',$e_id);
   $this->db->where('employee.role_id',4);
   return $this->db->get()->result_array();
  }
   public function get_admin_id($created_by){
    $this->db->select('employee.e_id,employee.created_by,employee.admin_id,employee.manager_id')->from('employee');
    $this->db->where('employee.e_id',$created_by);
    return $this->db->get()->row_array();
 }


  public function edit_employee_details($e_id){
  $this->db->select('employee.*')->from('employee');
  $this->db->where('employee.e_id',$e_id);
  return $this->db->get()->row_array();
 }

public function update_employee_details($e_id,$data){
	$this->db->where('e_id',$e_id);
	return $this->db->update('employee',$data);
	}
public function delete_employee($e_id){
	$this->db->where('e_id',$e_id);
	return $this->db->delete('employee');
	}




}