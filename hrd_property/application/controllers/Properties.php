<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Properties extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Properties_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['city_list']=$this->Properties_model->get_city_list();
			$data['property_list']=$this->Properties_model->get_property_list();
			$this->load->view('properties/add',$data);
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
			//echo'<pre>';print_r($login_details);exit;
			$check=$this->Properties_model->check_properties_alreay_exit($post['property_name']);	
			if(count($check)>0){
			$this->session->set_flashdata('error',"properties name already exist. Please use another properties name");	
			redirect('properties/add');	
			}
			$add=array(
			'e_id'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			'property_name'=>isset($post['property_name'])?$post['property_name']:'',
			'owner_name'=>isset($post['owner_name'])?$post['owner_name']:'',
			'city'=>isset($post['city'])?$post['city']:'',
			'address'=>isset($post['address'])?$post['address']:'',
			'type_of_property'=>isset($post['type_of_property'])?$post['type_of_property']:'',
			'land'=>isset($post['land'])?$post['land']:'',
			'p_cost'=>isset($post['p_cost'])?$post['p_cost']:'',
			'specifications'=>isset($post['specifications'])?$post['specifications']:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'p_status'=>0,
			'status'=>0,
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
			'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
			'executives_id'=>isset($login_details['executives_id'])?$login_details['executives_id']:'',
			);
			$save=$this->Properties_model->save_properties($add);	
			if(count($save)>0){
			$this->session->set_flashdata('success',"properties successfully added");	
			redirect('properties/lists');	
			}else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('properties/add');
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
			if($user_details['role_id']==2){
			$data['p_list']=$this->Properties_model->get_properties_list_active($user_details['e_id']);	
			$this->load->view('properties/admin_p_list',$data);
            }else if($user_details['role_id']==1){
			$data['p_list']=$this->Properties_model->get_properties_list_active_superadmin();
            $this->load->view('properties/superadmin_p_list',$data);			
			}else if($user_details['role_id']==3){
			$data['p_list']=$this->Properties_model->get_properties_list_add_admin($user_details['admin_id']);	
            // echo'<pre>';print_r($data);exit;		
		    $this->load->view('properties/manger_p_list',$data);
			}else if($user_details['role_id']==4){
            $data['p_list']=$this->Properties_model->get_properties_list_add_admin($user_details['admin_id']);	
            // echo'<pre>';print_r($data);exit;		
		    $this->load->view('properties/executives_p_list',$data);
            }
				
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function acepted()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'p_status'=>1,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  Acepted.");
								redirect('properties/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('properties/lists');
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
	
	public function rejected()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'p_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  Acepted.");
								redirect('properties/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('properties/lists');
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
	
	public function uploadpics()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$p_id=base64_decode($this->uri->segment(3));
			$data['p_list']=$this->Properties_model->properties_id($p_id);
			$data['p_img']=$this->Properties_model->get_p_imgs($p_id);
			//echo'<pre>';print_r($data);exit;
			 $this->load->view('properties/uploadpics',$data);	
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	public function uploadpicspost()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$post=$this->input->post();	
			//echo'<pre>';print_r($post);exit;
			$cnt=0;foreach($_FILES['pics']['name'] as $lis){
			if($_FILES['pics']['tmp_name'][$cnt]!=''){
			$temp = explode(".", $_FILES["pics"]["name"][$cnt]);
			$img =$cnt.round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES['pics']['tmp_name'][$cnt], "assets/properties_imgs/" . $img);
			$add=array(
			'p_id'=>isset($post['p_id'])?$post['p_id']:'',
			'pics'=>isset($img)?$img:'',
			'org_img_name'=>isset($_FILES["pics"]["name"][$cnt])?$_FILES["pics"]["name"][$cnt]:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($user_details['e_id'])?$user_details['e_id']:'',
			);
			$this->Properties_model->save_properties_imgs($add);
			}
			$cnt++;}
			$this->session->set_flashdata('success',"Property Images details updated successfully");
			redirect('properties/lists');
			
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	//delete iimage. 
	public function remove_imgs(){
		if($this->session->userdata('user_details'))
		{
				$post = $this->input->post();
				$img_d=$this->Properties_model->get_img_details($post['img_id']);
				$remove=$this->Properties_model->remove_imgs($post['img_id']);
				if(count($remove) > 0)
				{
					unlink('assets/properties_imgs/'.$img_d['pics']);
					$data['msg']=1;
					echo json_encode($data);exit;	
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('login');
		}
	}
	
	public function verified()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	            $p_id=base64_decode($this->uri->segment(3));
				$status=base64_decode($this->uri->segment(4));
			$check=$this->Properties_model->check_property_images_exit($p_id);	
			if($check['p_id']==array()){
			$this->session->set_flashdata('error',"property uploadpics atleast one pic upload");	
			redirect('properties/lists');	
			}
					
					if($p_id!=''){
						$stusdetails=array(
							'status'=>1,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  verified.");
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
	
	public function nonverified()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Properties_model->update_properties($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"properties details  successfully  nonverified.");
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
	
	
	public function verifiedlist()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['p_list']=$this->Properties_model->get_verified_properties_list($user_details['e_id']);	
			$this->load->view('properties/admin_verified_p_list',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
	
	
	
}
