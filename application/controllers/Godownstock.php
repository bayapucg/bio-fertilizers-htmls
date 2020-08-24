<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Godownstock extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Godownstock_model');
		$this->load->model('Salesbulletin_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$this->load->view('godownstock/add',$data);
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
		$save=$this->Godownstock_model->save_godownstock_details($save_data);
		if(count($save)>0){
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						  'g_id'=>isset($save)?$save:'',
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
						  $this->Godownstock_model->save_godownstock_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"godownstock details successfully added");	
				redirect('godownstock/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('godownstock/add');
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
			$data['godownstock_list']=$this->Godownstock_model->get_godownstock_list();
			$this->load->view('godownstock/list',$data);
			}else if($user_details['role_id']==2){
			$data['godownstock_list']=$this->Godownstock_model->get_godownstock_list_admin($user_details['e_id']);
			$this->load->view('godownstock/admin_list',$data);
			}else if($user_details['role_id']==3){
			
			$data['godownstock_list']=$this->Godownstock_model->get_godownstock_list_manager($user_details['e_id']);
			$this->load->view('godownstock/manager_list',$data);
			}else if($user_details['role_id']==4){
			
			$data['godownstock_list']=$this->Godownstock_model->get_godownstock_list_group_leader($user_details['e_id']);
			$this->load->view('godownstock/group_leader_list',$data);
			}else if($user_details['role_id']==5){
			$data['godownstock_list']=$this->Godownstock_model->get_godownstock_list_executives($user_details['e_id']);
			$this->load->view('godownstock/executives_list',$data);	
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
			$g_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$data['edit_godownstock']=$this->Godownstock_model->get_edit_godownstock($g_id);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('godownstock/edit',$data);
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
		$upadte=$this->Godownstock_model->update_godownstock_details($post['g_id'],$save_data);
		if(count($upadte)>0){
			$details=$this->Godownstock_model->get_edit_godownstock_data_list($post['g_id']);
				  if(count($details)>0){
					  foreach($details as $lis){
						 $this->Godownstock_model->delete_godownstock_details($lis['g_d_id']); 
					  }
					}
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						 'g_id'=>isset($post['g_id'])?$post['g_id']:'',
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
						  $this->Godownstock_model->save_godownstock_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"godownstock details successfully updated");	
				redirect('godownstock/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('godownstock/lists');
				}
		
	      }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
	
	public function remove_data()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Godownstock_model->delete_godownstock_details($post['p_id']);
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
	             $g_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
								 
					if($g_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Godownstock_model->update_godownstock_details($g_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"godownstock details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"godownstock details successfully Activate.");
								}
								redirect('godownstock/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('godownstock/lists');
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
	             $g_id=base64_decode($this->uri->segment(3));
					
					
							
							$statusdata=$this->Godownstock_model->delete_godownstock($g_id);
							$statusdata=$this->Godownstock_model->delete_godownstock_data($g_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"godownstock details successfully  successfully deleted.");
								redirect('godownstock/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('godownstock/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	

	
	
	
	
	
}
