<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Profile extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		
	}
	public function index()
	{
		if($this->session->userdata('user_details'))
		{
			$admindetails=$this->session->userdata('user_details');
			$data['user_details']=$this->Admin_model->get_admin_details($admindetails['a_id']);
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/profile',$data);
			$this->load->view('admin/footer');

		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function edit()
	{
		if($this->session->userdata('user_details'))
		{
			$admindetails=$this->session->userdata('user_details');
			$data['user_details']=$this->Admin_model->get_admin_details($admindetails['a_id']);
			$this->load->view('admin/profile',$data);
			$this->load->view('admin/footer');

		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function editpost()
	{
		if($this->session->userdata('user_details'))
		{
			$admindetails=$this->session->userdata('user_details');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$user_details=$this->Admin_model->get_admin_details($admindetails['a_id']);
			if($user_details['email']!=$post['email']){
				
				$check_email=$this->Admin_model->check_email_exits($post['email']);
				if(count($check_email)>0){
					$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
					redirect('profile');
				}
			}
				if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
						unlink('assets/admin_profile_pic/'.$user_details['profile_pic']);
							$temp = explode(".", $_FILES["profile_pic"]["name"]);
							$image = round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/admin_profile_pic/" . $image);
						}else{
							$image=$user_details['profile_pic'];
						}
					$updatedetails=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'email'=>isset($post['email'])?$post['email']:'',
					'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
					'gender'=>isset($post['gender'])?$post['gender']:'',
					'address'=>isset($post['address'])?$post['address']:'',
					'profile_pic'=>$image,
					'created_at'=>date('Y-m-d H:i:s'),
					);
				
			$profile_update=$this->Admin_model->update_profile_details($admindetails['a_id'],$updatedetails);
			if(count($profile_update)>0){
				$this->session->set_flashdata('success','Profile Details successfully Updated');
				redirect('profile');
				
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('profile');
			}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function changepassword()
	{
		if($this->session->userdata('user_details'))
		{
			$admindetails=$this->session->userdata('user_details');
				$this->load->view('admin/change_password');
				$this->load->view('admin/footer');

			
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function changepasswordpost(){
	 
		if($this->session->userdata('user_details'))
		{
			$admindetails=$this->session->userdata('user_details');
			$post=$this->input->post(); 
			$admin_details = $this->Admin_model->get_adminpassword_details($admindetails['a_id']);
			if($admin_details['password']== md5($post['oldpassword'])){
				if(md5($post['password'])== md5($post['confirmpassword'])){
						$updateuserdata=array(
						'password'=>md5($post['confirmpassword']),
						'org_password'=>$post['confirmpassword'],
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->Admin_model->update_profile_details($admindetails['a_id'],$updateuserdata);
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('profile');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('profile/changepassword');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password and Confirm password are not matched");
					redirect('profile/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Old password are not matched");
				redirect('profile/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('admin');
		} 
	 
	}
	
	
	
}
