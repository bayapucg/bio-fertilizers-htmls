<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_city($data){
	$this->db->insert('city',$data);
	return $this->db->insert_id();
	}
	public function check_city_alreay_exit($city){
	$this->db->select('city.*')->from('city');
	$this->db->where('city.city',$city);
	$this->db->where('city.status',1);
	return $this->db->get()->row_array();
	}
    public function get_city_list(){
	$this->db->select('city.*')->from('city');
	$this->db->where('city.status !=',2);
	return $this->db->get()->result_array();
	}
	public function get_city_details($c_id){
	$this->db->select('city.*')->from('city');
	$this->db->where('city.c_id',$c_id);
	return $this->db->get()->row_array();	
	}
	public function update_city($c_id,$data){
	$this->db->where('c_id',$c_id);
    return $this->db->update("city",$data);		
	}
    public function delete_city($c_id){
	$this->db->where('c_id',$c_id);
	return $this->db->delete('city');
	}




}