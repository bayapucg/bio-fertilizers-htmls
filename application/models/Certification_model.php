<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certification_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}	
	public function save_certification($d){
		$this->db->insert('certification_list',$d);
		return $this->db->insert_id();	
	}
	public  function get_certification_list(){
		$this->db->select('c.*,h.hospital_name')->from('certification_list as c');
		$this->db->join('hospital as h', 'h.h_id = c.hospital', 'left');
		$this->db->where('c.c_status',0);
		return $this->db->get()->result_array();
	}
	public  function get_certification_details($id){
		$this->db->select('c.*,h.hospital_name')->from('certification_list as c');
		$this->db->join('hospital as h', 'h.h_id = c.hospital', 'left');
		$this->db->where('c.c_id',$id);
		return $this->db->get()->row_array();
	}
	

}