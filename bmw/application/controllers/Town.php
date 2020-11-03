<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Town extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Town_model');
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Town_model->get_district_list();
			$this->load->view('town/add',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function addpost(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
	     $post=$this->input->post();	
			//echo'<pre>';print_r($post);exit;
		 
			  $check=$this->Town_model->check_town_name_already_exit($post['district_name'],$post['town_name']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"town name already exist. Please use another town name ");
					redirect('town/add');
				}	
		       $save_data=array(
	            'district_name'=>isset($post['district_name'])?$post['district_name']:'',
	            'town_name'=>isset($post['town_name'])?$post['town_name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Town_model->save_town_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"town details successfully added");	
					redirect('town/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('town/add');
					}  
		
		
		
				}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('admin');
			}
	}
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['town_list']=$this->Town_model->get_town_list();	
			$this->load->view('town/list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public function edit()
	{	
		if($this->session->userdata('user_details'))
		{
			$t_id=base64_decode($this->uri->segment(3));
			$data['edit_town']=$this->Town_model->edit_town_details($t_id);	
			$data['district_list']=$this->Town_model->get_district_list();
			$this->load->view('town/edit',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public function editpost(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
	        $post=$this->input->post();	
          $edit_town=$this->Town_model->edit_town_details($post['t_id']);	
		 if($edit_town['district_name']!=$post['district_name'] || $edit_town['town_name']!=$post['town_name']){
			 $check=$this->Town_model->check_town_name_already_exit($post['district_name'],$post['town_name']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"town name already exist. Please use another town name ");
					redirect('town/edit/'.base64_encode($post['t_id']));
				}
			 }				
		       $update_data=array(
	            'district_name'=>isset($post['district_name'])?$post['district_name']:'',
	            'town_name'=>isset($post['town_name'])?$post['town_name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $update=$this->Town_model->update_town_details($post['t_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"town details successfully updated");	
					redirect('town/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('town/edit/'.base64_encode($post['t_id']));
					}  
		
		
		
				}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('admin');
			}
	}
	
	public function status()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $t_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($t_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Town_model->update_town_details($t_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"town details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"town details  successfully  Activate.");
								}
								redirect('town/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('town/lists');
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}	
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('admin');  
	   }
    }
	
	
	public function delete()
		{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $t_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Town_model->delete_town_details($t_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"town details  successfully  deleted.");
								redirect('town/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('town/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	
	
	
	
	

	
	
}
