<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function employee_login_details($data){
		$this->db->select('*')->from('employee');		
		$this->db->where('email', $data['email']);
		$this->db->where('password',$data['password']);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();
	}
	  
	  public  function get_employee_details($e_id){
		$this->db->select('employee.*,roles.role_name')->from('employee');
   	    $this->db->join('roles', 'roles.r_id = employee.role_id', 'left');		
		$this->db->where('employee.e_id',$e_id);
		$this->db->where('employee.status',1);
        return $this->db->get()->row_array();
	}
	  
	  public  function check_email_exits($email){
		$this->db->select('e_id,email,org_password')->from('employee');
		$this->db->where('email',$email);
		return $this->db->get()->row_array();
	}
	public function update_profile_details($e_id,$data){
	$this->db->where('e_id',$e_id);
    return $this->db->update("employee",$data);		
	}
	
	
	
	

}