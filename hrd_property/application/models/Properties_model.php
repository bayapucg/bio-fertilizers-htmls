<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Properties_model extends CI_Model 

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
	public function get_property_list(){
	$this->db->select('property.p_id,property.property')->from('property');
	$this->db->where('property.status',1);
	$this->db->group_by('property.property');
	return $this->db->get()->result_array();
	}
	public function save_properties($data){
	$this->db->insert('properties',$data);
	return $this->db->insert_id();
	}
	public function check_properties_alreay_exit($property_name){
	$this->db->select('properties.*')->from('properties');
	$this->db->where('properties.property_name',$property_name);
	$this->db->where('properties.p_status',1);
	return $this->db->get()->row_array();
	}
    public function get_properties_list(){
	$this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.status !=',2);
	return $this->db->get()->result_array();
	}
	public function get_properties_details($p_id){
	$this->db->select('properties.*')->from('properties');
	$this->db->where('properties.p_id',$p_id);
	return $this->db->get()->row_array();	
	}
	public function update_properties($p_id,$data){
	$this->db->where('p_id',$p_id);
    return $this->db->update("properties",$data);		
	}
    public function delete_properties($p_id){
	$this->db->where('p_id',$p_id);
	return $this->db->delete('properties');
	}
    /* propertyies active*/
    public function get_properties_list_active($e_id){
	$this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.e_id',$e_id);
	$this->db->where('properties.p_status',0);
	return $this->db->get()->result_array();
	}  
    public function get_properties_list_active_superadmin(){
	$this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.p_status',0);
	return $this->db->get()->result_array();
	}
    /* manger list */
    public function get_properties_list_add_admin($e_id){
	$this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.e_id',$e_id);
	$this->db->where('properties.p_status',0);
	return $this->db->get()->result_array();
	} 

    /* on process property list*/
   public function get_on_process_property_list_admin($e_id){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.e_id',$e_id);
	$this->db->where('properties.p_status',1);
	return $this->db->get()->result_array();
	} 

 public function get_on_process_property_list_superadmin(){
    $this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.p_status',1);
	return $this->db->get()->result_array();
	}

    public function properties_id($p_id){
	$this->db->select('properties.p_id')->from('properties');
	$this->db->where('properties.p_id',$p_id);
	return $this->db->get()->row_array();
	}
    public function save_properties_imgs($data){
	$this->db->insert('properties_imgs',$data);
	return $this->db->insert_id();
	}
    public function get_p_imgs($p_id){
	$this->db->select('properties_imgs.p_i_id,properties_imgs.p_id,properties_imgs.pics')->from('properties_imgs');
	$this->db->where('properties_imgs.p_id',$p_id);
	$this->db->where('properties_imgs.status',1);
	return $this->db->get()->result_array();
	}
	public  function get_img_details($img_id){
		$this->db->select('pics')->from('properties_imgs');		
		$this->db->where('p_i_id',$img_id);
        return $this->db->get()->row_array();
	}
    public  function remove_imgs($id){
		$this->db->where('p_i_id',$id);
		return $this->db->delete('properties_imgs');		
	}
    public function check_property_images_exit($p_id){
	$this->db->select('properties_imgs.*')->from('properties_imgs');
	$this->db->where('properties_imgs.p_id',$p_id);
	$this->db->where('properties_imgs.status',1);
	return $this->db->get()->row_array();
	}

    public function get_verified_properties_list($e_id){
	$this->db->select('properties.*,property.property,city.city as c_name')->from('properties');
    $this->db->join('city', 'city.c_id = properties.city', 'left');
    $this->db->join('property', 'property.p_id = properties.type_of_property', 'left');
	$this->db->where('properties.e_id',$e_id);
	$this->db->where('properties.status',1);
	return $this->db->get()->result_array();
	}









}