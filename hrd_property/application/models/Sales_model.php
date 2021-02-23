<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
    /* on process property list*/
   public function get_sales_list_admin($e_id){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.e_id',$e_id);
	$this->db->where('properties.p_status',3);
	return $this->db->get()->result_array();
	} 

 public function get_sales_list_superadmin(){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.p_status',3);
	return $this->db->get()->result_array();
	}

    public function get_sales_list_manager($e_id){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.admin_id',$e_id);
	$this->db->where('properties.p_status',3);
	return $this->db->get()->result_array();
	}
 public function get_sales_list_executives($e_id){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.admin_id',$e_id);
	$this->db->where('properties.p_status',3);
	return $this->db->get()->result_array();
	}





}