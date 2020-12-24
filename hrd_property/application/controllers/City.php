<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class City extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('City_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$this->load->view('city/add');
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
			$check=$this->City_model->check_city_alreay_exit($post['city']);	
			if(count($check)>0){
			$this->session->set_flashdata('error',"city name already exist. Please use another city name");	
			redirect('city/add');	
			}
			$add=array(
			'city'=>isset($post['city'])?$post['city']:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'status'=>1,
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:''
			);
			$save=$this->City_model->save_city($add);	
			if(count($save)>0){
			$this->session->set_flashdata('success',"City successfully added");	
			redirect('city/lists');	
			}else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('city/add');
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
			$data['city_list']=$this->City_model->get_city_list();	
			$this->load->view('city/list',$data);
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
			 $c_id=base64_decode($this->uri->segment(3));
			$data['city_details']=$this->City_model->get_city_details($c_id);	
			$this->load->view('city/edit',$data);
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
			$city_details=$this->City_model->get_city_details($post['c_id']);	
			if($city_details['city']!=$post['city']){
			$check=$this->City_model->check_city_alreay_exit($post['city']);	
			if(count($check)>0){
			$this->session->set_flashdata('error',"city name already exist. Please use another city name");	
			redirect('city/edit/'.base64_encode($post['c_id']));
			}
			}
			$update_data=array(
			'city'=>isset($post['city'])?$post['city']:'',
			'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update=$this->City_model->update_city($post['c_id'],$update_data);	
			if(count($update)>0){
			$this->session->set_flashdata('success',"City successfully updated");	
			redirect('city/lists');	
			}else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('city/edit/'.base64_encode($post['c_id']));
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
	             $c_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($c_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->City_model->update_city($c_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"city details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"city details  successfully  Activate.");
								}
								redirect('city/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('city/lists');
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
	             $c_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->City_model->delete_city($c_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"city details successfully  deleted.");
								redirect('city/lists');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('city/lists');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('login');  
	   }
    }
	
	
	
	
	
	
}
