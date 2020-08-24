<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Godownstock_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_godownstock_details($data){
	$this->db->insert('godown_stock',$data);
	return $this->db->insert_id();	
	}
	public function save_godownstock_data_details($data){
	$this->db->insert('godown_stock_data',$data);
	return $this->db->insert_id();	
	}
	public function get_godownstock_list(){
	$this->db->select('godown_stock.*,roles.role_name,employee.name,e.name as group_leader')->from('godown_stock');
	$this->db->join('roles', 'roles.r_id = godown_stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = godown_stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = godown_stock.name_of_gl', 'left');
	$this->db->where('godown_stock.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_godownstock_details($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['godownstock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_godownstock_details($g_id){
	 $this->db->select('godown_stock_data.*')->from('godown_stock_data');
     $this->db->where('godown_stock_data.g_id',$g_id);
     $this->db->where('godown_stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	public function get_godownstock_list_admin($e_id){
	$this->db->select('godown_stock.*,roles.role_name,employee.name,e.name as group_leader')->from('godown_stock');
	$this->db->join('roles', 'roles.r_id = godown_stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = godown_stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = godown_stock.name_of_gl', 'left');
	$this->db->where('godown_stock.status !=', 2);
	$this->db->where('godown_stock.admin_id',$e_id);
	$this->db->where('godown_stock.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_godownstock_details_admin($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['godownstock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_godownstock_details_admin($g_id){
	 $this->db->select('godown_stock_data.*')->from('godown_stock_data');
     $this->db->where('godown_stock_data.g_id',$g_id);
     $this->db->where('godown_stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	public function get_godownstock_list_manager($e_id){
	$this->db->select('godown_stock.*,roles.role_name,employee.name,e.name as group_leader')->from('godown_stock');
	$this->db->join('roles', 'roles.r_id = godown_stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = godown_stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = godown_stock.name_of_gl', 'left');
	$this->db->where('godown_stock.status !=', 2);
	$this->db->where('godown_stock.manager_id',$e_id);
	$this->db->where('godown_stock.role_id!=',1);
	$this->db->where('godown_stock.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_godownstock_details_manager($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['godownstock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_godownstock_details_manager($g_id){
	 $this->db->select('godown_stock_data.*')->from('godown_stock_data');
     $this->db->where('godown_stock_data.g_id',$g_id);
     $this->db->where('godown_stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_godownstock_list_group_leader($e_id){
	$this->db->select('godown_stock.*,roles.role_name,employee.name,e.name as group_leader')->from('godown_stock');
	$this->db->join('roles', 'roles.r_id = godown_stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = godown_stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = godown_stock.name_of_gl', 'left');
	$this->db->where('godown_stock.status !=', 2);
	$this->db->where('godown_stock.group_leader',$e_id);
	$this->db->where('godown_stock.role_id!=',1);
	$this->db->where('godown_stock.role_id!=',2);
	$this->db->where('godown_stock.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_godownstock_details_group_leader($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['godownstock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_godownstock_details_group_leader($g_id){
	 $this->db->select('godown_stock_data.*')->from('godown_stock_data');
     $this->db->where('godown_stock_data.g_id',$g_id);
     $this->db->where('godown_stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_godownstock_list_executives($e_id){
	$this->db->select('godown_stock.*,roles.role_name,employee.name,e.name as group_leader')->from('godown_stock');
	$this->db->join('roles', 'roles.r_id = godown_stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = godown_stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = godown_stock.name_of_gl', 'left');
	$this->db->where('godown_stock.status !=', 2);
    $this->db->where('godown_stock.created_by',$e_id);
	$this->db->where('godown_stock.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_godownstock_details_executives($list['g_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['g_id']]=$list;
	   $data[$list['g_id']]['godownstock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_godownstock_details_executives($g_id){
	 $this->db->select('godown_stock_data.*')->from('godown_stock_data');
     $this->db->where('godown_stock_data.g_id',$g_id);
     $this->db->where('godown_stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	public function get_edit_godownstock($g_id){
	$this->db->select('godown_stock.*')->from('godown_stock');
	$this->db->where('g_id',$g_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_godownstock_data_list($return['g_id']);
		$data=$return;
		$data['godownstock_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_godownstock_data_list($g_id){
		$this->db->select('*')->from('godown_stock_data');
		$this->db->where('godown_stock_data.g_id',$g_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_godownstock($g_id){
	$this->db->where('g_id',$g_id);
	return $this->db->delete('godown_stock');
	}
	public function delete_godownstock_data($g_id){
	$this->db->where('g_id',$g_id);
	return $this->db->delete('godown_stock_data');
	}
	public function update_godownstock_details($g_id,$data){
	$this->db->where('g_id',$g_id);
    return $this->db->update("godown_stock",$data);		
	}
	public function delete_godownstock_details($g_d_id){
	$this->db->where('g_d_id',$g_d_id);
	return $this->db->delete('godown_stock_data');
	}
	


}