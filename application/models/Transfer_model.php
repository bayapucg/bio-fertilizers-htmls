<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transfer_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function save_transfer_to_other_camps_details($data){
	$this->db->insert('transfer_to_other_camps',$data);
	return $this->db->insert_id();	
	}
	public function save_transfer_to_other_camps_data_details($data){
	$this->db->insert('transfer_to_other_camps_data',$data);
	return $this->db->insert_id();	
	}
	public function get_transfer_to_other_camps_list(){
	$this->db->select('transfer_to_other_camps.*,roles.role_name,employee.name,e.name as group_leader')->from('transfer_to_other_camps');
	$this->db->join('roles', 'roles.r_id = transfer_to_other_camps.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = transfer_to_other_camps.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = transfer_to_other_camps.name_of_gl', 'left');
	$this->db->where('transfer_to_other_camps.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_transfer_to_other_camps_details($list['t_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['t_id']]=$list;
	   $data[$list['t_id']]['transfer_to_other_camps_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_transfer_to_other_camps_details($t_id){
	 $this->db->select('transfer_to_other_camps_data.*')->from('transfer_to_other_camps_data');
     $this->db->where('transfer_to_other_camps_data.t_id',$t_id);
     $this->db->where('transfer_to_other_camps_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	public function get_transfer_to_other_camps_list_admin($e_id){
	$this->db->select('transfer_to_other_camps.*,roles.role_name,employee.name,e.name as group_leader')->from('transfer_to_other_camps');
	$this->db->join('roles', 'roles.r_id = transfer_to_other_camps.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = transfer_to_other_camps.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = transfer_to_other_camps.name_of_gl', 'left');
	$this->db->where('transfer_to_other_camps.status !=', 2);
	$this->db->where('transfer_to_other_camps.admin_id',$e_id);
	$this->db->where('transfer_to_other_camps.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_transfer_to_other_camps_details_admin($list['t_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['t_id']]=$list;
	   $data[$list['t_id']]['transfer_to_other_camps_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_transfer_to_other_camps_details_admin($t_id){
	 $this->db->select('transfer_to_other_camps_data.*')->from('transfer_to_other_camps_data');
     $this->db->where('transfer_to_other_camps_data.t_id',$t_id);
     $this->db->where('transfer_to_other_camps_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	public function get_transfer_to_other_camps_list_manager($e_id){
	$this->db->select('transfer_to_other_camps.*,roles.role_name,employee.name,e.name as group_leader')->from('transfer_to_other_camps');
	$this->db->join('roles', 'roles.r_id = transfer_to_other_camps.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = transfer_to_other_camps.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = transfer_to_other_camps.name_of_gl', 'left');
	$this->db->where('transfer_to_other_camps.status !=', 2);
	$this->db->where('transfer_to_other_camps.manager_id',$e_id);
	$this->db->where('transfer_to_other_camps.role_id!=',1);
	$this->db->where('transfer_to_other_camps.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_transfer_to_other_camps_details_manager($list['t_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['t_id']]=$list;
	   $data[$list['t_id']]['transfer_to_other_camps_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_transfer_to_other_camps_details_manager($t_id){
	 $this->db->select('transfer_to_other_camps_data.*')->from('transfer_to_other_camps_data');
     $this->db->where('transfer_to_other_camps_data.t_id',$t_id);
     $this->db->where('transfer_to_other_camps_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_transfer_to_other_camps_list_group_leader($e_id){
	$this->db->select('transfer_to_other_camps.*,roles.role_name,employee.name,e.name as group_leader')->from('transfer_to_other_camps');
	$this->db->join('roles', 'roles.r_id = transfer_to_other_camps.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = transfer_to_other_camps.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = transfer_to_other_camps.name_of_gl', 'left');
	$this->db->where('transfer_to_other_camps.status !=', 2);
	$this->db->where('transfer_to_other_camps.group_leader',$e_id);
	$this->db->where('transfer_to_other_camps.role_id!=',1);
	$this->db->where('transfer_to_other_camps.role_id!=',2);
	$this->db->where('transfer_to_other_camps.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_transfer_to_other_camps_details_group_leader($list['t_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['t_id']]=$list;
	   $data[$list['t_id']]['transfer_to_other_camps_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_transfer_to_other_camps_details_group_leader($t_id){
	 $this->db->select('transfer_to_other_camps_data.*')->from('transfer_to_other_camps_data');
     $this->db->where('transfer_to_other_camps_data.t_id',$t_id);
     $this->db->where('transfer_to_other_camps_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	public function get_transfer_to_other_camps_list_executives($e_id){
	$this->db->select('transfer_to_other_camps.*,roles.role_name,employee.name,e.name as group_leader')->from('transfer_to_other_camps');
	$this->db->join('roles', 'roles.r_id = transfer_to_other_camps.role_id', 'left');
    $this->db->join('employee', 'employee.e_id = transfer_to_other_camps.created_by', 'left');
    $this->db->join('employee as e', 'e.e_id = transfer_to_other_camps.name_of_gl', 'left');
	$this->db->where('transfer_to_other_camps.status !=', 2);
	$this->db->where('transfer_to_other_camps.created_by',$e_id);
	$this->db->where('transfer_to_other_camps.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_transfer_to_other_camps_details_executives($list['t_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['t_id']]=$list;
	   $data[$list['t_id']]['transfer_to_other_camps_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_transfer_to_other_camps_details_executives($t_id){
	 $this->db->select('transfer_to_other_camps_data.*')->from('transfer_to_other_camps_data');
     $this->db->where('transfer_to_other_camps_data.t_id',$t_id);
     $this->db->where('transfer_to_other_camps_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_edit_transfer_to_other_camps($t_id){
	$this->db->select('transfer_to_other_camps.*')->from('transfer_to_other_camps');
	$this->db->where('t_id',$t_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_transfer_to_other_camps_data_list($return['t_id']);
		$data=$return;
		$data['transfer_to_other_camps_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_transfer_to_other_camps_data_list($t_id){
		$this->db->select('*')->from('transfer_to_other_camps_data');
		$this->db->where('transfer_to_other_camps_data.t_id',$t_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_transfer_to_other_camps($t_id){
	$this->db->where('t_id',$t_id);
	return $this->db->delete('transfer_to_other_camps');
	}
	public function delete_transfer_to_other_camps_data($t_id){
	$this->db->where('t_id',$t_id);
	return $this->db->delete('transfer_to_other_camps_data');
	}
	public function update_transfer_to_other_camps_details($t_id,$data){
	$this->db->where('t_id',$t_id);
    return $this->db->update("transfer_to_other_camps",$data);		
	}
	public function delete_transfer_to_other_camps_details($t_d_id){
	$this->db->where('t_d_id',$t_d_id);
	return $this->db->delete('transfer_to_other_camps_data');
	}
	


}