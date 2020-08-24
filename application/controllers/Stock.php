<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Stock extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Salesbulletin_model');
		$this->load->model('Stock_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$this->load->view('stock/add',$data);
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
		$save=$this->Stock_model->save_stock_details($save_data);
		if(count($save)>0){
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						  's_id'=>isset($save)?$save:'',
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
						  $this->Stock_model->save_stock_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"stock details successfully added");	
				redirect('stock/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('stock/add');
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
			$data['stock_list']=$this->Stock_model->get_stock_list();
			$this->load->view('stock/list',$data);
			}else if($user_details['role_id']==2){
			$data['stock_list']=$this->Stock_model->get_stock_list_admin($user_details['e_id']);
			$this->load->view('stock/admin_list',$data);
			}else if($user_details['role_id']==3){
			$data['stock_list']=$this->Stock_model->get_stock_list_manager($user_details['e_id']);
			$this->load->view('stock/manager_list',$data);
			}else if($user_details['role_id']==4){	
			$data['stock_list']=$this->Stock_model->get_stock_list_group_leader($user_details['e_id']);
			$this->load->view('stock/group_leader_list',$data);	
		   }else if($user_details['role_id']==5){
			$data['stock_list']=$this->Stock_model->get_stock_list_executives($user_details['e_id']);
			$this->load->view('stock/executives_list',$data);	
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
			$s_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$group_leaders=$this->Salesbulletin_model->get_group_leaders($user_details['e_id']);
			$data['group_leaders_list']=$this->Salesbulletin_model->get_group_leader_list($group_leaders['group_leader']);
			$data['edit_stock']=$this->Stock_model->get_edit_stock($s_id);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('stock/edit',$data);
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
		$upadte=$this->Stock_model->update_stock_details($post['s_id'],$save_data);
		if(count($upadte)>0){
			$details=$this->Stock_model->get_edit_stock_data_list($post['s_id']);
				  if(count($details)>0){
					  foreach($details as $lis){
						 $this->Stock_model->delete_stock_details($lis['s_d_id']); 
					  }
					}
	        if(isset($post['issue_date']) && count($post['issue_date'])>0){
					$cnt=0;foreach($post['issue_date'] as $list){ 
						  $add_data=array(
						 's_id'=>isset($post['s_id'])?$post['s_id']:'',
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
						  $this->Stock_model->save_stock_data_details($add_data);	

				       $cnt++;}
					}


	 
				$this->session->set_flashdata('success',"stock details successfully updated");	
				redirect('stock/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('stock/lists');
				}
		
	      }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}
	
	
	
	
	
	
	
	
	public function remove_data()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Stock_model->delete_stock_details($post['p_id']);
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
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Stock_model->update_stock_details($s_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"stock details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"stock details successfully Activate.");
								}
								redirect('stock/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('stock/lists');
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
	             $s_id=base64_decode($this->uri->segment(3));
					
					
							
							$statusdata=$this->Stock_model->delete_stock($s_id);
							$statusdata=$this->Stock_model->delete_stock_data($s_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"stock details successfully  successfully deleted.");
								redirect('stock/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('stock/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
}
