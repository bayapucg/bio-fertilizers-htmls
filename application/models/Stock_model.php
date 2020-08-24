<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_stock_details($data){
	$this->db->insert('stock',$data);
	return $this->db->insert_id();	
	}
	public function save_stock_data_details($data){
	$this->db->insert('stock_data',$data);
	return $this->db->insert_id();	
	}
	public function get_stock_list(){
	$this->db->select('stock.*,roles.role_name,employee.name,e.name as group_leader')->from('stock');
	$this->db->join('roles', 'roles.r_id = stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = stock.name_of_gl', 'left');
	$this->db->where('stock.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_stock_details($list['s_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['s_id']]=$list;
	   $data[$list['s_id']]['stock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_stock_details($s_id){
	 $this->db->select('stock_data.*')->from('stock_data');
     $this->db->where('stock_data.s_id',$s_id);
     $this->db->where('stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	public function get_stock_list_admin($e_id){
	$this->db->select('stock.*,roles.role_name,employee.name,e.name as group_leader')->from('stock');
	$this->db->join('roles', 'roles.r_id = stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = stock.name_of_gl', 'left');
	$this->db->where('stock.status !=', 2);
	$this->db->where('stock.admin_id',$e_id);
	$this->db->where('stock.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_stock_details_admin($list['s_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['s_id']]=$list;
	   $data[$list['s_id']]['stock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_stock_details_admin($s_id){
	 $this->db->select('stock_data.*')->from('stock_data');
     $this->db->where('stock_data.s_id',$s_id);
     $this->db->where('stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function get_stock_list_manager($e_id){
	$this->db->select('stock.*,roles.role_name,employee.name,e.name as group_leader')->from('stock');
	$this->db->join('roles', 'roles.r_id = stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = stock.name_of_gl', 'left');
	$this->db->where('stock.status !=', 2);
	$this->db->where('stock.manager_id',$e_id);
	$this->db->where('stock.role_id!=',1);
	$this->db->where('stock.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_stock_details_manager($list['s_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['s_id']]=$list;
	   $data[$list['s_id']]['stock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_stock_details_manager($s_id){
	 $this->db->select('stock_data.*')->from('stock_data');
     $this->db->where('stock_data.s_id',$s_id);
     $this->db->where('stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_stock_list_group_leader($e_id){
	$this->db->select('stock.*,roles.role_name,employee.name,e.name as group_leader')->from('stock');
	$this->db->join('roles', 'roles.r_id = stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = stock.name_of_gl', 'left');
	$this->db->where('stock.status !=', 2);
	$this->db->where('stock.group_leader',$e_id);
	$this->db->where('stock.role_id!=',1);
	$this->db->where('stock.role_id!=',2);
	$this->db->where('stock.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_stock_details_group_leader($list['s_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['s_id']]=$list;
	   $data[$list['s_id']]['stock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_stock_details_group_leader($s_id){
	 $this->db->select('stock_data.*')->from('stock_data');
     $this->db->where('stock_data.s_id',$s_id);
     $this->db->where('stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	public function get_stock_list_executives($e_id){
	$this->db->select('stock.*,roles.role_name,employee.name,e.name as group_leader')->from('stock');
	$this->db->join('roles', 'roles.r_id = stock.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = stock.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = stock.name_of_gl', 'left');
	$this->db->where('stock.status !=', 2);
	$this->db->where('stock.created_by',$e_id);
	$this->db->where('stock.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_stock_details_executives($list['s_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['s_id']]=$list;
	   $data[$list['s_id']]['stock_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_stock_details_executives($s_id){
	 $this->db->select('stock_data.*')->from('stock_data');
     $this->db->where('stock_data.s_id',$s_id);
     $this->db->where('stock_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	public function get_edit_stock($s_id){
	$this->db->select('stock.*')->from('stock');
	$this->db->where('s_id',$s_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_stock_data_list($return['s_id']);
		$data=$return;
		$data['stock_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_stock_data_list($s_id){
		$this->db->select('*')->from('stock_data');
		$this->db->where('stock_data.s_id',$s_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_stock($s_id){
	$this->db->where('s_id',$s_id);
	return $this->db->delete('stock');
	}
	public function delete_stock_data($s_id){
	$this->db->where('s_id',$s_id);
	return $this->db->delete('stock_data');
	}
	public function update_stock_details($s_id,$data){
	$this->db->where('s_id',$s_id);
    return $this->db->update("stock",$data);		
	}
	public function delete_stock_details($s_d_id){
	$this->db->where('s_d_id',$s_d_id);
	return $this->db->delete('stock_data');
	}
	


}