<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salespersons_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function check_salespersons_model_already_exit($email){
		$this->db->select('salespersons.*')->from('salespersons');
		$this->db->where('salespersons.email',$email);
		$this->db->where('salespersons.status',1);
		return $this->db->get()->row_array();
	}
	public function save_salespersons_details($data){
	$this->db->insert('salespersons',$data);
	return $this->db->insert_id();	
	}
	public function get_salespersons_list(){
	$this->db->select('salespersons.*')->from('salespersons');
	$this->db->where('salespersons.status !=', 2);
	return $this->db->get()->result_array();
	} 
    public function edit_salespersons_details($s_id){
	$this->db->select('salespersons.*')->from('salespersons');
	$this->db->where('salespersons.s_id',$s_id);
	return $this->db->get()->row_array();
	} 
    public function update_Salespersons_details($s_id,$data){
	$this->db->where('s_id',$s_id);
    return $this->db->update("salespersons",$data);
	}
     public function delete_salespersons_details($s_id){
	  $this->db->where('s_id', $s_id);
     return $this->db->delete('salespersons');
	}


     public function save_notifications_list_details($data){
    $this->db->insert('notifications_list',$data);
	return $this->db->insert_id();	
	}
    public function notifications_list($s_id){
	$this->db->select('notifications_list.*')->from('notifications_list');
    $this->db->where('notifications_list.s_id',$s_id);
	return $this->db->get()->row_array();
	}
    public function update_notifications_list_details($s_id,$data){
	$this->db->where('s_id',$s_id);
    return $this->db->update("notifications_list",$data);
	}






}