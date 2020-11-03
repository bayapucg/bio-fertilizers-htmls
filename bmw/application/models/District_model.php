<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class District_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function check_district_name_already_exit($name){
		$this->db->select('district.*')->from('district');
		$this->db->where('district.name',$name);
		$this->db->where('district.status',1);
		return $this->db->get()->row_array();
	}
	public function save_district_details($data){
	$this->db->insert('district',$data);
	return $this->db->insert_id();	
	}
	public function get_district_list(){
	$this->db->select('district .*')->from('district ');
	$this->db->where('district .status !=', 2);
	return $this->db->get()->result_array();
	} 
    public function edit_district_details($d_id){
	$this->db->select('district.*')->from('district');
	$this->db->where('district.d_id',$d_id);
	return $this->db->get()->row_array();
	} 
    public function update_district_details($d_id,$data){
	$this->db->where('d_id',$d_id);
    return $this->db->update("district",$data);
	}
     public function delete_district_details($d_id){
	  $this->db->where('d_id', $d_id);
     return $this->db->delete('district');
	}








}