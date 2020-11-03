<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class District extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('District_model');
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			
			$this->load->view('district/add');
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
			  $check=$this->District_model->check_district_name_already_exit($post['name']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"district name already exist. Please use another district name ");
					redirect('district/add');
				}	
		       $save_data=array(
	            'name'=>isset($post['name'])?$post['name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->District_model->save_district_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"district details successfully added");	
					redirect('district/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('district/add');
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
			$data['district_list']=$this->District_model->get_district_list();	
			$this->load->view('district/list',$data);
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
			$d_id=base64_decode($this->uri->segment(3));
			$data['edit_district']=$this->District_model->edit_district_details($d_id);	
			$this->load->view('district/edit',$data);
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
          $edit_district=$this->District_model->edit_district_details($post['d_id']);	
			 if($edit_district['name']!=$post['name']){
			  $check=$this->District_model->check_district_name_already_exit($post['name']);
				if(count($check)>0){
					$this->session->set_flashdata('error',"district name already exist. Please use another district name ");
					redirect('district/edit/'.base64_encode($post['d_id']));
				}
			 }				
		       $update_data=array(
	            'name'=>isset($post['name'])?$post['name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $update=$this->District_model->update_district_details($post['d_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"district details successfully updated");	
					redirect('district/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('district/edit/'.base64_encode($post['d_id']));
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
	             $d_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($d_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->District_model->update_district_details($d_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"district details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"district details  successfully  Activate.");
								}
								redirect('district/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('district/lists');
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
	             $d_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->District_model->delete_district_details($d_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"district details  successfully  deleted.");
								redirect('district/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('district/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	
	
	
	
	

	
	
}
