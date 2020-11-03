<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Salespersons extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Salespersons_model');
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			
			$this->load->view('salespersons/add');
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
		// echo'<pre>';print_r($post);exit;
			  $check_salespersons_exit=$this->Salespersons_model->check_salespersons_model_already_exit($post['email']);
				if(count($check_salespersons_exit)>0){
					$this->session->set_flashdata('error',"email already exist. Please use another email ");
					redirect('salespersons/add');
				}	
		       $save_data=array(
	            'name'=>isset($post['name'])?$post['name']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
				'password'=>isset($post['org_password'])?md5($post['org_password']):'',
				'org_password'=>isset($post['org_password'])?$post['org_password']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'alt_mobile_number'=>isset($post['alt_mobile_number'])?$post['alt_mobile_number']:'',
	            'aadhar_number'=>isset($post['aadhar_number'])?$post['aadhar_number']:'',
	            'qualification'=>isset($post['qualification'])?$post['qualification']:'',
	            'dob'=>isset($post['dob'])?$post['dob']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Salespersons_model->save_salespersons_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Salespersons details successfully added");	
					redirect('salespersons/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('salespersons/add');
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
			$data['salespersons_list']=$this->Salespersons_model->get_salespersons_list();	
			        // echo'<pre>';print_r($data);exit;
			$this->load->view('salespersons/list',$data);
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
			$s_id=base64_decode($this->uri->segment(3));
			$data['edit_salespersons']=$this->Salespersons_model->edit_salespersons_details($s_id);	
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('salespersons/edit',$data);
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
		$edit_salespersons=$this->Salespersons_model->edit_salespersons_details($post['s_id']);
		//echo'<pre>';print_r($edit_salespersons);exit;
		 if($edit_salespersons['email']!=$post['email']){
			  $check_salespersons_exit=$this->Salespersons_model->check_salespersons_model_already_exit($post['email']);
						if(count($check_salespersons_exit)>0){
						$this->session->set_flashdata('error',"email already exist. Please use another email");
						redirect('salespersons/edit/'.base64_encode($post['s_id']));
						}	
					}	
		       $update_data=array(
	            'name'=>isset($post['name'])?$post['name']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'alt_mobile_number'=>isset($post['alt_mobile_number'])?$post['alt_mobile_number']:'',
	            'aadhar_number'=>isset($post['aadhar_number'])?$post['aadhar_number']:'',
	            'qualification'=>isset($post['qualification'])?$post['qualification']:'',
	            'dob'=>isset($post['dob'])?$post['dob']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
				$updates_datas=array(
				's_id'=>isset($post['s_id'])?$post['s_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Salespersons_model->notifications_list($post['s_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Salespersons_model->update_notifications_list_details($check['s_id'],$updates_datas);	 
				 }else{
				$this->Salespersons_model->save_notifications_list_details($updates_datas);
				 }
			  
                $update=$this->Salespersons_model->update_Salespersons_details($post['s_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Salespersons details  successfully updated");	
					redirect('salespersons/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('salespersons/edit/'.base64_encode($post['s_id']));
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
	             $s_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					
					if($s_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'notification_status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Salespersons_model->update_Salespersons_details($s_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Salespersons details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Salespersons details  successfully  Activate.");
								}
								redirect('salespersons/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('salespersons/lists');
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
	             $s_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($s_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
							);
							$statusdata=$this->Salespersons_model->update_Salespersons_details($s_id,$stusdetails);
							$update=array(
							's_id'=>$s_id,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
                             'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
							);
							$this->Salespersons_model->save_notifications_list_details($update);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Salespersons details  successfully  deleted.");
								redirect('salespersons/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('salespersons/lists');
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
	
	
	
	
	/*
	public function delete()
		{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $s_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Salespersons_model->delete_salespersons_details($s_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"salespersons details  successfully  deleted.");
								redirect('salespersons/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('salespersons/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	*/
	
	
	
	
	
	
	
}
