<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Transfer_to_other_camps extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Salesbulletin_model');
		$this->load->model('Transfer_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$this->load->view('transfer_to_other_camps/add',$data);
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
           // echo'<pre>';print_r($post);exit;
			$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		    $save_data=array(
			'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'name_of_gl'=>isset($post['name_of_gl'])?$post['name_of_gl']:'',
			'month'=>isset($post['month'])?$post['month']:'',
			'branch'=>isset($post['branch'])?$post['branch']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
			'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
			'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
			);
		$save=$this->Transfer_model->save_transfer_to_other_camps_details($save_data);
		if(count($save)>0){
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						  't_id'=>isset($save)?$save:'',
						  'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
						  'issue_date'=>$list,
						   'grovin'=>$post['grovin'][$cnt],
							'free'=>$post['free'][$cnt],
							'3g'=>$post['3g'][$cnt],
							'neem'=>$post['neem'][$cnt],
							'neem_oil'=>$post['neem_oil'][$cnt],
							'ss'=>$post['ss'][$cnt],
							'mic'=>$post['mic'][$cnt],
							'action'=>$post['action'][$cnt],
							'corax'=>$post['corax'][$cnt],
							'bkts'=>$post['bkts'][$cnt],
							'fatra'=>$post['fatra'][$cnt],
							'terror'=>$post['terror'][$cnt],
							'status'=>1,
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
							'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
							'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
							'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
						   );
						  $this->Transfer_model->save_transfer_to_other_camps_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"Transfer to other camps details successfully added");	
				redirect('transfer_to_other_camps/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('transfer_to_other_camps/add');
				}
		
	      }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			 if($user_details['role_id']==1){
			$data['transfer_to_other_camps_list']=$this->Transfer_model->get_transfer_to_other_camps_list();
			$this->load->view('transfer_to_other_camps/list',$data);
			}else if($user_details['role_id']==2){
			$data['transfer_to_other_camps_list']=$this->Transfer_model->get_transfer_to_other_camps_list_admin($user_details['e_id']);
			$this->load->view('transfer_to_other_camps/admin_list',$data);
			}else if($user_details['role_id']==3){
			$data['transfer_to_other_camps_list']=$this->Transfer_model->get_transfer_to_other_camps_list_manager($user_details['e_id']);
			$this->load->view('transfer_to_other_camps/manager_list',$data);
			}else if($user_details['role_id']==4){
			$data['transfer_to_other_camps_list']=$this->Transfer_model->get_transfer_to_other_camps_list_group_leader($user_details['e_id']);
			$this->load->view('transfer_to_other_camps/group_leader_list',$data);
			}else if($user_details['role_id']==5){
			$data['transfer_to_other_camps_list']=$this->Transfer_model->get_transfer_to_other_camps_list_executives($user_details['e_id']);
			$this->load->view('transfer_to_other_camps/executives_list',$data);	
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
			$t_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$data['edit_transfer_to_other_camps']=$this->Transfer_model->get_edit_transfer_to_other_camps($t_id);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('transfer_to_other_camps/edit',$data);
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
          // echo'<pre>';print_r($post);exit;
			$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		    $save_data=array(
			'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'name_of_gl'=>isset($post['name_of_gl'])?$post['name_of_gl']:'',
			'month'=>isset($post['month'])?$post['month']:'',
			'branch'=>isset($post['branch'])?$post['branch']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			);
		$upadte=$this->Transfer_model->update_transfer_to_other_camps_details($post['t_id'],$save_data);
		if(count($upadte)>0){
			$details=$this->Transfer_model->get_edit_transfer_to_other_camps_data_list($post['t_id']);
				  if(count($details)>0){
					  foreach($details as $lis){
						 $this->Transfer_model->delete_transfer_to_other_camps_details($lis['t_d_id']); 
					  }
					}
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						 't_id'=>isset($post['t_id'])?$post['t_id']:'',
						  'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
						  'issue_date'=>$list,
						   'grovin'=>$post['grovin'][$cnt],
							'free'=>$post['free'][$cnt],
							'3g'=>$post['3g'][$cnt],
							'neem'=>$post['neem'][$cnt],
							'neem_oil'=>$post['neem_oil'][$cnt],
							'ss'=>$post['ss'][$cnt],
							'mic'=>$post['mic'][$cnt],
							'action'=>$post['action'][$cnt],
							'corax'=>$post['corax'][$cnt],
							'bkts'=>$post['bkts'][$cnt],
							'fatra'=>$post['fatra'][$cnt],
							'terror'=>$post['terror'][$cnt],
							'status'=>1,
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
						   );
						  $this->Transfer_model->save_transfer_to_other_camps_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"Transfer to other camps details successfully updated");	
				redirect('transfer_to_other_camps/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('transfer_to_other_camps/lists');
				}
		
	      }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
	
	public function remove_data()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Transfer_model->delete_transfer_to_other_camps_details($post['p_id']);
		if(count($delete_date)>0){
			$data['msg']=1;
			echo json_encode($data);exit;
		}else{
			$data['msg']=0;
			echo json_encode($data);exit;
		}
}	
	
	public function status(){
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
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Transfer_model->update_transfer_to_other_camps_details($t_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Transfer to other camps details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Transfer to other camps details successfully Activate.");
								}
								redirect('transfer_to_other_camps/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transfer_to_other_camps/lists');
							}
						}
						else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard');
					}	
	
	
          }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}


}	
	public function delete()
{

		if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $t_id=base64_decode($this->uri->segment(3));
					
					
							
							$statusdata=$this->Transfer_model->delete_transfer_to_other_camps($t_id);
							$statusdata=$this->Transfer_model->delete_transfer_to_other_camps_data($t_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Transfer to other camps details successfully  successfully deleted.");
								redirect('transfer_to_other_camps/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('transfer_to_other_camps/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
}
