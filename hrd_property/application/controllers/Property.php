<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class property extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Property_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$this->load->view('property/add');
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function addpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$post=$this->input->post();	
			$check=$this->Property_model->check_property_alreay_exit($post['property']);	
			if(count($check)>0){
			$this->session->set_flashdata('error',"property name already exist. Please use another property name");	
			redirect('property/add');	
			}
			$add=array(
			'property'=>isset($post['property'])?$post['property']:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'status'=>1,
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:''
			);
			$save=$this->Property_model->save_property($add);	
			if(count($save)>0){
			$this->session->set_flashdata('success',"property successfully added");	
			redirect('property/lists');	
			}else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('property/add');
			}  
		}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('login');
		}
	}
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['property_list']=$this->Property_model->get_property_list();	
			$this->load->view('property/list',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	public function edit()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			 $p_id=base64_decode($this->uri->segment(3));
			$data['property_details']=$this->Property_model->get_property_details($p_id);	
			$this->load->view('property/edit',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function editpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$post=$this->input->post();
			$property_details=$this->Property_model->get_property_details($post['p_id']);	
			if($property_details['property']!=$post['property']){
			$check=$this->Property_model->check_property_alreay_exit($post['property']);	
			if(count($check)>0){
			$this->session->set_flashdata('error',"property name already exist. Please use another property name");	
			redirect('property/edit/'.base64_encode($post['p_id']));
			}
			}
			$update_data=array(
			'property'=>isset($post['property'])?$post['property']:'',
			'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update=$this->Property_model->update_property($post['p_id'],$update_data);	
			if(count($update)>0){
			$this->session->set_flashdata('success',"property successfully updated");	
			redirect('property/lists');	
			}else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('property/edit/'.base64_encode($post['p_id']));
			}  
		}else{
				$this->session->set_flashdata('error','Please login to continue');
				redirect('login');
		}
	}
	public function status()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($p_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Property_model->update_property($p_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"property details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"property details  successfully  Activate.");
								}
								redirect('property/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('property/lists');
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
	
	public function delete()
		{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->Property_model->delete_property($p_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"property details successfully  deleted.");
								redirect('property/lists');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('property/lists');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('login');  
	   }
    }
	
	
	
	
	
	
}
