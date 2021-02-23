<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Employee extends Back_end {

	public function __construct() 
	{
		parent::__construct();
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	if($data['userdetails']['role_id']==1){
			$data['city_list']=$this->Employee_model->get_city_list();	
			$data['roles_list']=$this->Employee_model->get_roles_list_for_super_admin();
				 //echo'<pre>';print_r($data);exit;		 
			$this->load->view('employee/add',$data);
			}else if($data['userdetails']['role_id']==2){
			$data['city_list']=$this->Employee_model->get_city_list();		
			$data['roles_list']=$this->Employee_model->get_roles_list_for_admin();
			$this->load->view('employee/add',$data); 
			}else if($data['userdetails']['role_id']==3){
			$data['city_list']=$this->Employee_model->get_city_list();	
			$data['roles_list']=$this->Employee_model->get_roles_list_for_manager();
			$this->load->view('employee/add',$data); 
			}
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	public function addpost(){
		if($this->session->userdata('user_details'))
		{
		$login_details=$this->session->userdata('user_details');
	     $post=$this->input->post();
		 //echo'<pre>';print_r($post);exit;
		$check_email=$this->Employee_model->check_email_exits($post['email']);
		if(count($check_email)>0){
		$this->session->set_flashdata('error',"Email address already exists. Please enter another email address.");
		redirect('employee/add');
		}
				if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
				$temp = explode(".", $_FILES["profile_pic"]["name"]);
				$images = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pics/" . $images);
				}else{
				$images='';
				}	
               if($login_details['role_id']==1){				
		       $save_data=array(
			    'profile_pic'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['profile_pic']['name'])?$_FILES['profile_pic']['name']:'',
	            'name'=>isset($post['name'])?$post['name']:'',
	            'role_id'=>isset($post['role_id'])?$post['role_id']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'city'=>isset($post['city'])?$post['city']:'',
	            'password'=>isset($post['confirm_password'])?md5($post['confirm_password']):'',
	            'org_password'=>isset($post['confirm_password'])?$post['confirm_password']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:''
				 );
		        $save=$this->Employee_model->save_employee_details($save_data);	
		       if(count($save)>0){
				   $id=$save;
				   $adminid=array('admin_id'=>$id);
				   $this->Employee_model->update_employee_details($save,$adminid);
					$this->session->set_flashdata('success',"Employee details successfully added");	
					redirect('employee/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/add');
					}

			   }else if($login_details['role_id']==2){	
             $save_data=array(
			   'profile_pic'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['profile_pic']['name'])?$_FILES['profile_pic']['name']:'',
	            'name'=>isset($post['name'])?$post['name']:'',
	            'role_id'=>isset($post['role_id'])?$post['role_id']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'city'=>isset($post['city'])?$post['city']:'',
	            'password'=>isset($post['confirm_password'])?md5($post['confirm_password']):'',
	            'org_password'=>isset($post['confirm_password'])?$post['confirm_password']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
				'admin_id'=>isset($login_details['e_id'])?$login_details['e_id']:'',
				 );
		        $save=$this->Employee_model->save_employee_details($save_data);	
		       if(count($save)>0){
				   $id=$save;
				   $adminid=array('manager_id'=>$id);
				   $this->Employee_model->update_employee_details($save,$adminid);
					$this->session->set_flashdata('success',"Employee details successfully added");	
					redirect('employee/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/add');
					}





			   }else if($login_details['role_id']==3){
				    $admin=$this->Employee_model->get_admin_id($login_details['created_by']);
                 $save_data=array(
			    'profile_pic'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['profile_pic']['name'])?$_FILES['profile_pic']['name']:'',
	            'name'=>isset($post['name'])?$post['name']:'',
	            'role_id'=>isset($post['role_id'])?$post['role_id']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'city'=>isset($post['city'])?$post['city']:'',
	            'password'=>isset($post['confirm_password'])?md5($post['confirm_password']):'',
	            'org_password'=>isset($post['confirm_password'])?$post['confirm_password']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
				'manager_id'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			     'admin_id'=>isset($admin['admin_id'])?$admin['admin_id']:'',
				 );
		        $save=$this->Employee_model->save_employee_details($save_data);	
		       if(count($save)>0){
				   $id=$save;
				   $adminid=array('executives_id'=>$id);
				   $this->Employee_model->update_employee_details($save,$adminid);
					$this->session->set_flashdata('success',"Employee details successfully added");	
					redirect('employee/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/add');
					}


			   }else{
			
			$save_data=array(
			   'profile_pic'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['profile_pic']['name'])?$_FILES['profile_pic']['name']:'',
	            'name'=>isset($post['name'])?$post['name']:'',
	            'role_id'=>isset($post['role_id'])?$post['role_id']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'city'=>isset($post['city'])?$post['city']:'',
	            'password'=>isset($post['confirm_password'])?md5($post['confirm_password']):'',
	            'org_password'=>isset($post['confirm_password'])?$post['confirm_password']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
				 );
		        $save=$this->Employee_model->save_employee_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Employee details successfully added");	
					redirect('employee/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/add');
					}   



					
			 }
			
					
				
				}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('login');
			}
	}
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
		  $data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
		  //echo'<pre>';print_r($user_details);exit;
		  if($user_details['role_id']==1){
			$data['employees_list']=$this->Employee_model->get_employees_list();
			$this->load->view('employee/list',$data);
			}else if($user_details['role_id']==2){
			$data['employees_list']=$this->Employee_model->get_employees_list_admin($user_details['e_id']);
			//echo'<pre>';print_r($data);exit;
			$this->load->view('employee/admin_list',$data);
			}else if($data['userdetails']['role_id']==3){
			$data['employees_list']=$this->Employee_model->get_employees_list_manager($user_details['e_id']);
			//echo'<pre>';print_r($data);exit;
			$this->load->view('employee/manager_list',$data);
			}else if($data['userdetails']['role_id']==4){
			$data['employees_list']=$this->Employee_model->get_employees_list_executives($user_details['e_id']);
			$this->load->view('employee/executives_list',$data);
			}
			
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
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$e_id=base64_decode($this->uri->segment(3));
           	if($data['userdetails']['role_id']==1){
			$data['city_list']=$this->Employee_model->get_city_list();		
			$data['roles_list']=$this->Employee_model->get_roles_list_for_super_admin();
			$data['employee_details']=$this->Employee_model->edit_employee_details($e_id);
				 //echo'<pre>';print_r($data);exit;		 
			$this->load->view('employee/edit',$data);
			}else if($data['userdetails']['role_id']==2){
			$data['city_list']=$this->Employee_model->get_city_list();	
			$data['roles_list']=$this->Employee_model->get_roles_list_for_admin();
			$data['employee_details']=$this->Employee_model->edit_employee_details($e_id);
			$this->load->view('employee/edit',$data); 
			}else if($data['userdetails']['role_id']==3){
			$data['city_list']=$this->Employee_model->get_city_list();	
			$data['roles_list']=$this->Employee_model->get_roles_list_for_manager();
			$data['employee_details']=$this->Employee_model->edit_employee_details($e_id);
			$this->load->view('employee/edit',$data); 
			}else if($data['userdetails']['role_id']==4){
			$data['city_list']=$this->Employee_model->get_city_list();	
			$data['employee_details']=$this->Employee_model->edit_employee_details($e_id);
            $this->load->view('employee/edit',$data); 			
			}
				
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	public function editpost(){
		if($this->session->userdata('user_details'))
		{
		$login_details=$this->session->userdata('user_details');
	    $post=$this->input->post();
		$employee_details=$this->Employee_model->edit_employee_details($post['e_id']);
		if($employee_details['email']!=$post['email']){
		$check_email=$this->Employee_model->check_email_exits($post['email']);
		if(count($check_email)>0){
		$this->session->set_flashdata('error',"Email address already exists. Please enter another email address.");
		redirect('employee/edit/'.base64_encode($post['e_id']));
		}
		}
				if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
			unlink('assets/profile_pics/'.$employee_details['profile_pic']);
			$temp = explode(".", $_FILES["profile_pic"]["name"]);
			$images = round(microtime(true)) . '.' . end($temp);
			$org_images=$_FILES["profile_pic"]["name"];
			move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pics/" . $images);
			}else{
			$images=$employee_details['profile_pic'];
			$org_images=$employee_details['org_image'];
			}	
		       $update_data=array(
			    'profile_pic'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['profile_pic']['name'])?$_FILES['profile_pic']['name']:'',
	            'name'=>isset($post['name'])?$post['name']:'',
	            'email'=>isset($post['email'])?$post['email']:'',
	            'city'=>isset($post['city'])?$post['city']:'',
	            'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
	            'address'=>isset($post['address'])?$post['address']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				 );
		        $update=$this->Employee_model->update_employee_details($post['e_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Employee details successfully updated");	
					redirect('employee/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('employee/edit/'.base64_encode($post['e_id']));
					}  
				}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('login');
			}
	}
	
	public function status()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $e_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($e_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Employee_model->update_employee_details($e_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"employee details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"employee details  successfully  Activate.");
								}
								redirect('employee/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employee/lists');
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
	             $e_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->Employee_model->delete_employee($e_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"employee details successfully  deleted.");
								redirect('employee/lists');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('employee/lists');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('login');  
	   }
    }
	
	
	
	
	
	
	
}
