<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Glpayment_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_gl($e_id){
	$this->db->select('employee.e_id,employee.group_leader,employee.name')->from('employee');
	$this->db->where('employee.e_id',$e_id);
	$this->db->where('employee.status',1);
	return $this->db->get()->row_array();
	}
	public function get_gl_list($manager_id){
	$this->db->select('employee.e_id,employee.group_leader,employee.name')->from('employee');
	$this->db->where('employee.e_id',$manager_id);
	$this->db->where('employee.status',1);
	return $this->db->get()->result_array();
	}
	
	
	public function get_se_st_expenses_list($gm_tm_name){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.group_leader',$gm_tm_name);
	$this->db->where('employee.role_id',5);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	
	public function get_se_st_expenses_list_excetues($e_id,$gm_tm_name){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.group_leader',$gm_tm_name);
	$this->db->where('employee.e_id',$e_id);
	$this->db->where('employee.role_id',5);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	public function save_glpayment_details($data){
	$this->db->insert('gl_payment',$data);
	return $this->db->insert_id();	
	}
	public function save_glpayment_data_details($data){
	$this->db->insert('gl_payment_data',$data);
	return $this->db->insert_id();	
	}
	public function get_glpayment_list(){
	$this->db->select('gl_payment.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as gl_name')->from('gl_payment');
	$this->db->join('roles', 'roles.r_id = gl_payment.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = gl_payment.created_by', 'left');
    $this->db->join('employee as em', 'em.e_id = gl_payment.gm_tm_name', 'left');
    $this->db->join('employee as e', 'e.e_id = gl_payment.st_se_name', 'left');
	$this->db->where('gl_payment.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_glpayment_details($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['glpayment_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_glpayment_details($g_id){
	 $this->db->select('gl_payment_data.*')->from('gl_payment_data');
     $this->db->where('gl_payment_data.g_id',$g_id);
     $this->db->where('gl_payment_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	public function get_glpayment_list_admin($e_id){
	$this->db->select('gl_payment.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as gl_name')->from('gl_payment');
	$this->db->join('roles', 'roles.r_id = gl_payment.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = gl_payment.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = gl_payment.gm_tm_name', 'left');
    $this->db->join('employee as e', 'e.e_id = gl_payment.st_se_name', 'left');
	$this->db->where('gl_payment.status !=', 2);
    $this->db->where('gl_payment.admin_id',$e_id);
	$this->db->where('gl_payment.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_glpayment_details_admin($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['glpayment_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_glpayment_details_admin($g_id){
	 $this->db->select('gl_payment_data.*')->from('gl_payment_data');
     $this->db->where('gl_payment_data.g_id',$g_id);
     $this->db->where('gl_payment_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	public function get_glpayment_list_manager($e_id){
	$this->db->select('gl_payment.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as gl_name')->from('gl_payment');
	$this->db->join('roles', 'roles.r_id = gl_payment.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = gl_payment.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = gl_payment.gm_tm_name', 'left');
    $this->db->join('employee as e', 'e.e_id = gl_payment.st_se_name', 'left');
	$this->db->where('gl_payment.status !=', 2);
	$this->db->where('gl_payment.manager_id',$e_id);
	$this->db->where('gl_payment.role_id!=',1);
	$this->db->where('gl_payment.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_glpayment_details_manager($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['glpayment_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_glpayment_details_manager($g_id){
	 $this->db->select('gl_payment_data.*')->from('gl_payment_data');
     $this->db->where('gl_payment_data.g_id',$g_id);
     $this->db->where('gl_payment_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function get_glpayment_list_group_leader($e_id){
	$this->db->select('gl_payment.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as gl_name')->from('gl_payment');
	$this->db->join('roles', 'roles.r_id = gl_payment.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = gl_payment.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = gl_payment.gm_tm_name', 'left');
    $this->db->join('employee as e', 'e.e_id = gl_payment.st_se_name', 'left');
	$this->db->where('gl_payment.status !=', 2);
	$this->db->where('gl_payment.group_leader',$e_id);
	$this->db->where('gl_payment.role_id!=',1);
	$this->db->where('gl_payment.role_id!=',2);
	$this->db->where('gl_payment.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_glpayment_details_group_leader($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['glpayment_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_glpayment_details_group_leader($g_id){
	 $this->db->select('gl_payment_data.*')->from('gl_payment_data');
     $this->db->where('gl_payment_data.g_id',$g_id);
     $this->db->where('gl_payment_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	public function get_glpayment_list_executives($e_id){
	$this->db->select('gl_payment.*,roles.role_name,employee.name,e.name as se_st_expenses_name,em.name as gl_name')->from('gl_payment');
	$this->db->join('roles', 'roles.r_id = gl_payment.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = gl_payment.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = gl_payment.gm_tm_name', 'left');
    $this->db->join('employee as e', 'e.e_id = gl_payment.st_se_name', 'left');
	$this->db->where('gl_payment.status !=', 2);
	$this->db->where('gl_payment.created_by',$e_id);
	$this->db->where('gl_payment.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_glpayment_details_executives($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['glpayment_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_glpayment_details_executives($g_id){
	 $this->db->select('gl_payment_data.*')->from('gl_payment_data');
     $this->db->where('gl_payment_data.g_id',$g_id);
     $this->db->where('gl_payment_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function get_edit_glpayment($g_id){
	$this->db->select('gl_payment.*')->from('gl_payment');
	$this->db->where('g_id',$g_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_glpayment_data_list($return['g_id']);
		$data=$return;
		$data['glpayment_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_glpayment_data_list($g_id){
		$this->db->select('*')->from('gl_payment_data');
		$this->db->where('gl_payment_data.g_id',$g_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_glpayment($g_id){
	$this->db->where('g_id',$g_id);
	return $this->db->delete('gl_payment');
	}
	public function delete_glpayment_data($g_id){
	$this->db->where('g_id',$g_id);
	return $this->db->delete('gl_payment_data');
	}
	public function update_glpayment_details($g_id,$data){
	$this->db->where('g_id',$g_id);
    return $this->db->update("gl_payment",$data);		
	}
	public function delete_glpayment_details($g_d_id){
	$this->db->where('g_d_id',$g_d_id);
	return $this->db->delete('gl_payment_data');
	}
	


}