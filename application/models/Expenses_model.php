<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenses_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_abm($e_id){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.e_id',$e_id);
	$this->db->where('employee.status',1);
	return $this->db->get()->row_array();
	}
	public function get_abm_list($manager_id){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.e_id',$manager_id);
	$this->db->where('employee.status',1);
	return $this->db->get()->result_array();
	}
	public function get_se_st_expenses_list($group_leader,$abm_tm_name){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.group_leader',$group_leader);
	$this->db->where('employee.manager_id',$abm_tm_name);
	$this->db->where('employee.role_id',5);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	
	public function get_se_st_expenses_list_excetues($e_id,$abm_tm_name){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.manager_id',$abm_tm_name);
	$this->db->where('employee.e_id',$e_id);
	$this->db->where('employee.role_id',5);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	
	
	
	
	public function save_expenses_details($data){
	$this->db->insert('expenses',$data);
	return $this->db->insert_id();	
	}
	public function save_expenses_data_details($data){
	$this->db->insert('expenses_data',$data);
	return $this->db->insert_id();	
	}
	public function get_expenses_list(){
	$this->db->select('expenses.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as abm_name')->from('expenses');
	$this->db->join('roles', 'roles.r_id = expenses.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = expenses.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = expenses.abm_tm_name', 'left');
	$this->db->join('employee as e', 'e.e_id = expenses.st_se_name', 'left');
	$this->db->where('expenses.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_expenses_details($list['e_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['e_id']]=$list;
	   $data[$list['e_id']]['expenses_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_expenses_details($e_id){
	 $this->db->select('expenses_data.*')->from('expenses_data');
     $this->db->where('expenses_data.e_id',$e_id);
     $this->db->where('expenses_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	public function get_expenses_list_admin($e_id){
	$this->db->select('expenses.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as abm_name')->from('expenses');
	$this->db->join('roles', 'roles.r_id = expenses.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = expenses.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = expenses.abm_tm_name', 'left');
	$this->db->join('employee as e', 'e.e_id = expenses.st_se_name', 'left');
	$this->db->where('expenses.status !=', 2);
    $this->db->where('expenses.admin_id',$e_id);
	$this->db->where('expenses.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_expenses_details_admin($list['e_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['e_id']]=$list;
	   $data[$list['e_id']]['expenses_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_expenses_details_admin($e_id){
	 $this->db->select('expenses_data.*')->from('expenses_data');
     $this->db->where('expenses_data.e_id',$e_id);
     $this->db->where('expenses_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	public function get_expenses_list_manager($e_id){
	$this->db->select('expenses.*,roles.role_name,employee.name,	e.name as se_st_expenses_name,em.name as abm_name')->from('expenses');
	$this->db->join('roles', 'roles.r_id = expenses.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = expenses.created_by', 'left');
	  $this->db->join('employee as em', 'em.e_id = expenses.abm_tm_name', 'left');
	$this->db->join('employee as e', 'e.e_id = expenses.st_se_name', 'left');
	$this->db->where('expenses.status !=', 2);
	$this->db->where('expenses.manager_id',$e_id);
	$this->db->where('expenses.role_id!=',1);
	$this->db->where('expenses.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_expenses_details_manager($list['e_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['e_id']]=$list;
	   $data[$list['e_id']]['expenses_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_expenses_details_manager($e_id){
	 $this->db->select('expenses_data.*')->from('expenses_data');
     $this->db->where('expenses_data.e_id',$e_id);
     $this->db->where('expenses_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_expenses_list_group_leader($e_id){
	$this->db->select('expenses.*,roles.role_name,employee.name,	e.name as se_st_expenses_name,em.name as abm_name')->from('expenses');
	$this->db->join('roles', 'roles.r_id = expenses.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = expenses.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = expenses.abm_tm_name', 'left');
	$this->db->join('employee as e', 'e.e_id = expenses.st_se_name', 'left');
	$this->db->where('expenses.status !=', 2);
	$this->db->where('expenses.group_leader',$e_id);
	$this->db->where('expenses.role_id!=',1);
	$this->db->where('expenses.role_id!=',2);
	$this->db->where('expenses.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_expenses_details_group_leader($list['e_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['e_id']]=$list;
	   $data[$list['e_id']]['expenses_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_expenses_details_group_leader($e_id){
	 $this->db->select('expenses_data.*')->from('expenses_data');
     $this->db->where('expenses_data.e_id',$e_id);
     $this->db->where('expenses_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	public function get_expenses_list_executives($e_id){
	$this->db->select('expenses.*,roles.role_name,employee.name,	e.name as se_st_expenses_name,em.name as abm_name')->from('expenses');
	$this->db->join('roles', 'roles.r_id = expenses.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = expenses.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = expenses.abm_tm_name', 'left');
	$this->db->join('employee as e', 'e.e_id = expenses.st_se_name', 'left');
	$this->db->where('expenses.status !=', 2);
	$this->db->where('expenses.created_by',$e_id);
	$this->db->where('expenses.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_expenses_details_executives($list['e_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['e_id']]=$list;
	   $data[$list['e_id']]['expenses_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_expenses_details_executives($e_id){
	 $this->db->select('expenses_data.*')->from('expenses_data');
     $this->db->where('expenses_data.e_id',$e_id);
     $this->db->where('expenses_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	public function get_edit_expenses($e_id){
	$this->db->select('expenses.*')->from('expenses');
	$this->db->where('e_id',$e_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_expenses_data_list($return['e_id']);
		$data=$return;
		$data['expenses_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_expenses_data_list($e_id){
		$this->db->select('*')->from('expenses_data');
		$this->db->where('expenses_data.e_id',$e_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_expenses($e_id){
	$this->db->where('e_id',$e_id);
	return $this->db->delete('expenses');
	}
	public function delete_expenses_data($e_id){
	$this->db->where('e_id',$e_id);
	return $this->db->delete('expenses_data');
	}
	public function update_expenses_details($e_id,$data){
	$this->db->where('e_id',$e_id);
    return $this->db->update("expenses",$data);		
	}
	public function delete_expenses_details($e_d_id){
	$this->db->where('e_d_id',$e_d_id);
	return $this->db->delete('expenses_data');
	}
	


}