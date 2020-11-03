<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Town_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_district_list(){
	$this->db->select('district.name,district.d_id')->from('district');
	$this->db->where('district.status',1);
	$this->db->group_by('district.name');
	return $this->db->get()->result_array();
	}
	
	public function check_town_name_already_exit($district_name,$town_name){
		$this->db->select('town.*')->from('town');
		$this->db->where('town.district_name',$district_name);
		$this->db->where('town.town_name',$town_name);
		$this->db->where('town.status',1);
		return $this->db->get()->row_array();
	}
	public function save_town_details($data){
	$this->db->insert('town',$data);
	return $this->db->insert_id();	
	}
	public function get_town_list(){
	$this->db->select('town .*,district.name')->from('town ');
   $this->db->join('district', 'district.d_id =town.district_name', 'left');
	$this->db->where('town .status !=', 2);
	return $this->db->get()->result_array();
	} 
    public function edit_town_details($t_id){
	$this->db->select('town.*')->from('town');
	$this->db->where('town.t_id',$t_id);
	return $this->db->get()->row_array();
	} 
    public function update_town_details($t_id,$data){
	$this->db->where('t_id',$t_id);
    return $this->db->update("town",$data);
	}
     public function delete_town_details($t_id){
	  $this->db->where('t_id', $t_id);
     return $this->db->delete('town');
	}








}