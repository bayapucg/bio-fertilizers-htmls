<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_property($data){
	$this->db->insert('property',$data);
	return $this->db->insert_id();
	}
	public function check_property_alreay_exit($property){
	$this->db->select('property.*')->from('property');
	$this->db->where('property.property',$property);
	$this->db->where('property.status',1);
	return $this->db->get()->row_array();
	}
    public function get_property_list(){
	$this->db->select('property.*')->from('property');
	$this->db->where('property.status !=',2);
	return $this->db->get()->result_array();
	}
	public function get_property_details($p_id){
	$this->db->select('property.*')->from('property');
	$this->db->where('property.p_id',$p_id);
	return $this->db->get()->row_array();	
	}
	public function update_property($p_id,$data){
	$this->db->where('p_id',$p_id);
    return $this->db->update("property",$data);		
	}
    public function delete_property($p_id){
	$this->db->where('p_id',$p_id);
	return $this->db->delete('property');
	}




}