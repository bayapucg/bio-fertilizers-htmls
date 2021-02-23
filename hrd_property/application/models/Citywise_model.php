<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citywise_model extends CI_Model 

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
	public function get_c_w_m_list($city){
	$this->db->select('employee.*,city.city as c_name')->from('employee');
	$this->db->join('city', 'city.c_id = employee.city', 'left');
	$this->db->where('employee.status',1);
	$this->db->where('employee.city',$city);
	$this->db->where('employee.role_id',3);
	return $this->db->get()->result_array();
	}
	
	public function get_c_w_p_list($city){
	$this->db->select('properties.*,city.city as c_name,property.property')->from('properties');
	$this->db->join('city', 'city.c_id = properties.city', 'left');
	$this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.p_status',1);
	$this->db->where('properties.city',$city);
	return $this->db->get()->result_array();
	}
	
	
	

}