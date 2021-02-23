<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hospital_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_town_list($district){
	$this->db->select('town.district_name,town.t_id,town.town_name')->from('town');
	$this->db->where('town.status',1);
	$this->db->where('town.district_name',$district);
	$this->db->group_by('town.t_id');
	return $this->db->get()->result_array();
	}
	
	public function district_list(){
	$this->db->select('district.d_id,district.name')->from('district');
	$this->db->where('district.status',1);
	$this->db->group_by('district.name');
	return $this->db->get()->result_array();
	}
	public function check_hospital_name_already_exit($hospital_name){
		$this->db->select('hospital.*')->from('hospital');
		$this->db->where('hospital.hospital_name',$hospital_name);
		$this->db->where('hospital.status',1);
		return $this->db->get()->row_array();
	}
	public function save_hospital_details($data){
	$this->db->insert('hospital',$data);
	return $this->db->insert_id();	
	}
	public function get_hospital_list(){
	$this->db->select('hospital.*,district.name,town.town_name')->from('hospital');
    $this->db->join('district', 'district.d_id =hospital.district', 'left');
    $this->db->join('town', 'town.t_id =hospital.town', 'left');
	$this->db->where('hospital.status !=', 2);
	return $this->db->get()->result_array();
	} 
    public function edit_hospital_details($h_id){
	$this->db->select('hospital.*')->from('hospital');
	$this->db->where('hospital.h_id',$h_id);
	return $this->db->get()->row_array();
	} 
    public function update_hospital_details($h_id,$data){
	$this->db->where('h_id',$h_id);
    return $this->db->update("hospital",$data);
	}
     public function delete_hospital_details($h_id){
	  $this->db->where('h_id', $h_id);
     return $this->db->delete('hospital');
	}


public function save_notifications_list_details($data){
    $this->db->insert('notifications_list',$data);
	return $this->db->insert_id();	
	}
    public function notifications_list($h_id){
	$this->db->select('notifications_list.*')->from('notifications_list');
    $this->db->where('notifications_list.h_id',$h_id);
	return $this->db->get()->row_array();
	}
    public function update_notifications_list_details($h_id,$data){
	$this->db->where('h_id',$h_id);
    return $this->db->update("notifications_list",$data);
	}











}