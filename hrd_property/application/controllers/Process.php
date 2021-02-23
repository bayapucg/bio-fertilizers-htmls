<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Process extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Properties_model');
	}
	
	public function propertylist()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			if($user_details['role_id']==2){
			$data['p_list']=$this->Properties_model->get_on_process_property_list_admin($user_details['e_id']);	
			$this->load->view('process/properties_list_admin',$data);
			}else if($user_details['role_id']==1){
			$data['p_list']=$this->Properties_model->get_on_process_property_list_superadmin();	
			$this->load->view('process/properties_list_superadmin',$data);	
			}
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	public function sold()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'p_status'=>3,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  Acepted.");
								redirect($this->agent->referrer());
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect($this->agent->referrer());
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}	
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('login');  
	   }
    }
	
	public function unsold()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'p_status'=>4,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  Acepted.");
								redirect($this->agent->referrer());
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect($this->agent->referrer());
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}	
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('login');  
	   }
    }
	
	
	
	
	
	
	
	
}
