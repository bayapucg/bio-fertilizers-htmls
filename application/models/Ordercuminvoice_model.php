<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordercuminvoice_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_group_leader_list_group_leader($e_id,$name_of_abm){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.e_id',$e_id);
	$this->db->where('employee.manager_id',$name_of_abm);
	$this->db->where('employee.role_id',4);
	$this->db->where('employee.status',1);
    $this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	public function get_group_leader_list_manager($name_of_abm){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.manager_id',$name_of_abm);
	$this->db->where('employee.role_id',4);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
	}
	public function get_group_leader_list_executives($group_leader,$name_of_abm){
	$this->db->select('employee.e_id,employee.manager_id,employee.name')->from('employee');
	$this->db->where('employee.e_id',$group_leader);
	$this->db->where('employee.manager_id',$name_of_abm);
	$this->db->where('employee.role_id',4);
	$this->db->where('employee.status',1);
	$this->db->group_by('employee.name');
	return $this->db->get()->result_array();
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
	
	
	public function save_ordercuminvoice_details($data){
	$this->db->insert('Order_cum_invoice',$data);
	return $this->db->insert_id();	
	}
	public function save_ordercuminvoice_data_details($data){
	$this->db->insert('Order_cum_invoice_data',$data);
	return $this->db->insert_id();	
	}
	public function get_ordercuminvoice_list(){
    $this->db->select('Order_cum_invoice.*,roles.role_name,employee.name,e.name as group_leader,em.name as manager')->from('Order_cum_invoice');
	$this->db->join('roles', 'roles.r_id = Order_cum_invoice.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = Order_cum_invoice.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = Order_cum_invoice.name_of_abm', 'left');
	$this->db->join('employee as e', 'e.e_id = Order_cum_invoice.name_of_gl', 'left');
	$this->db->where('Order_cum_invoice.status !=', 2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_ordercuminvoice_details($list['o_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['o_id']]=$list;
	   $data[$list['o_id']]['invoice_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_ordercuminvoice_details($o_id){
	 $this->db->select('order_cum_invoice_data.*')->from('order_cum_invoice_data');
     $this->db->where('order_cum_invoice_data.o_id',$o_id);
     $this->db->where('order_cum_invoice_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	public function get_ordercuminvoice_list_admin($e_id){
	 $this->db->select('Order_cum_invoice.*,roles.role_name,employee.name,e.name as group_leader,em.name as manager')->from('Order_cum_invoice');
	$this->db->join('roles', 'roles.r_id = Order_cum_invoice.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = Order_cum_invoice.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = Order_cum_invoice.name_of_abm', 'left');
	$this->db->join('employee as e', 'e.e_id = Order_cum_invoice.name_of_gl', 'left');
	$this->db->where('Order_cum_invoice.status !=', 2);
    $this->db->where('Order_cum_invoice.admin_id',$e_id);
	$this->db->where('Order_cum_invoice.role_id!=',1);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_ordercuminvoice_details_admin($list['o_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['o_id']]=$list;
	   $data[$list['o_id']]['invoice_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_ordercuminvoice_details_admin($o_id){
	 $this->db->select('order_cum_invoice_data.*')->from('order_cum_invoice_data');
     $this->db->where('order_cum_invoice_data.o_id',$o_id);
     $this->db->where('order_cum_invoice_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	public function get_ordercuminvoice_list_manager($e_id){
	 $this->db->select('Order_cum_invoice.*,roles.role_name,employee.name,e.name as group_leader,em.name as manager')->from('Order_cum_invoice');
	$this->db->join('roles', 'roles.r_id = Order_cum_invoice.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = Order_cum_invoice.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = Order_cum_invoice.name_of_abm', 'left');
	$this->db->join('employee as e', 'e.e_id = Order_cum_invoice.name_of_gl', 'left');
	$this->db->where('Order_cum_invoice.status !=', 2);
	$this->db->where('Order_cum_invoice.manager_id',$e_id);
	$this->db->where('Order_cum_invoice.role_id!=',1);
	$this->db->where('Order_cum_invoice.role_id!=',2);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_ordercuminvoice_details_manager($list['o_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['o_id']]=$list;
	   $data[$list['o_id']]['invoice_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_ordercuminvoice_details_manager($o_id){
	 $this->db->select('order_cum_invoice_data.*')->from('order_cum_invoice_data');
     $this->db->where('order_cum_invoice_data.o_id',$o_id);
     $this->db->where('order_cum_invoice_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	public function get_ordercuminvoice_list_group_leader($e_id){
	 $this->db->select('Order_cum_invoice.*,roles.role_name,employee.name,e.name as group_leader,em.name as manager')->from('Order_cum_invoice');
	$this->db->join('roles', 'roles.r_id = Order_cum_invoice.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = Order_cum_invoice.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = Order_cum_invoice.name_of_abm', 'left');
	$this->db->join('employee as e', 'e.e_id = Order_cum_invoice.name_of_gl', 'left');
	$this->db->where('Order_cum_invoice.status !=', 2);
	$this->db->where('Order_cum_invoice.group_leader',$e_id);
	$this->db->where('Order_cum_invoice.role_id!=',1);
	$this->db->where('Order_cum_invoice.role_id!=',2);
	$this->db->where('Order_cum_invoice.role_id!=',3);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_ordercuminvoice_details_group_leader($list['o_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['o_id']]=$list;
	   $data[$list['o_id']]['invoice_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_ordercuminvoice_details_group_leader($o_id){
	 $this->db->select('order_cum_invoice_data.*')->from('order_cum_invoice_data');
     $this->db->where('order_cum_invoice_data.o_id',$o_id);
     $this->db->where('order_cum_invoice_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	public function get_ordercuminvoice_list_executives($e_id){
	 $this->db->select('Order_cum_invoice.*,roles.role_name,employee.name,e.name as group_leader,em.name as manager')->from('Order_cum_invoice');
	$this->db->join('roles', 'roles.r_id = Order_cum_invoice.role_id', 'left');
	$this->db->join('employee', 'employee.e_id = Order_cum_invoice.created_by', 'left');
	$this->db->join('employee as em', 'em.e_id = Order_cum_invoice.name_of_abm', 'left');
	$this->db->join('employee as e', 'e.e_id = Order_cum_invoice.name_of_gl', 'left');
	$this->db->where('Order_cum_invoice.status !=', 2);
	$this->db->where('Order_cum_invoice.created_by',$e_id);
	$this->db->where('Order_cum_invoice.role_id',5);
	 $return=$this->db->get()->result_array();
	  foreach($return as $list){
	   $lists=$this->get_ordercuminvoice_details_executives($list['o_id']);
	   //echo '<pre>';print_r($lists);exit;
	   $data[$list['o_id']]=$list;
	   $data[$list['o_id']]['invoice_data']=$lists;
	   
	  }
	if(!empty($data)){
	   
	   return $data;
	   
	  }
 }
	public function get_ordercuminvoice_details_executives($o_id){
	 $this->db->select('order_cum_invoice_data.*')->from('order_cum_invoice_data');
     $this->db->where('order_cum_invoice_data.o_id',$o_id);
     $this->db->where('order_cum_invoice_data.status !=',2);
	 return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	public function get_edit_ordercuminvoice($o_id){
	$this->db->select('Order_cum_invoice.*')->from('Order_cum_invoice');
	$this->db->where('o_id',$o_id);
	$return=$this->db->get()->row_array();
		$about_list=$this->get_edit_team_data_list($return['o_id']);
		$data=$return;
		$data['ordercuminvoice_details']=$about_list;
		if(!empty($data)){
			return $data;
		}
	}
	public  function get_edit_team_data_list($o_id){
		$this->db->select('*')->from('order_cum_invoice_data');
		$this->db->where('order_cum_invoice_data.o_id',$o_id);
		return $this->db->get()->result_array();
		
	}
	public function delete_ordercuminvoice($o_id){
	$this->db->where('o_id',$o_id);
	return $this->db->delete('Order_cum_invoice');
	}
	public function delete_ordercuminvoice_data($o_id){
	$this->db->where('o_id',$o_id);
	return $this->db->delete('order_cum_invoice_data');
	}
	public function update_ordercuminvoice_details($o_id,$data){
	$this->db->where('o_id',$o_id);
    return $this->db->update("Order_cum_invoice",$data);		
	}
	public function delete_ordercuminvoice_details($o_d_id){
	$this->db->where('o_d_id',$o_d_id);
	return $this->db->delete('order_cum_invoice_data');
	}
	


}