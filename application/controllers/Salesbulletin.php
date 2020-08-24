<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Salesbulletin extends Back_end {

	public function __construct() 
	{
		parent::__construct();
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
			$this->load->view('salesbulletin/add',$data);
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
			$cnt=0;foreach($post['name_of_gl'] as $lis){
							$save_data = array(
							'role_id'=>isset($login_details['role_id'])?$login_details['role_id']:'',
							'name_of_gl'=>$lis,
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
							'total_units'=>$post['total_units'][$cnt],
							'status'=>1,
							'created_at'=>date('Y-m-d H:i:s'),
							'updated_at'=>date('Y-m-d H:i:s'),
							'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
							'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
							'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
							'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
						   );
					$save=$this->Salesbulletin_model->save_salesbulletin_details($save_data);		
					$cnt++;
					}
					if(count($save)>0){
						$this->session->set_flashdata('success',"Sales Bulletin details are successfully added");	
						redirect('salesbulletin/lists');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur");
						redirect('salesbulletin/add');
					}
			
			
			
			
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			 if($user_details['role_id']==1){
			$data['sales_bulletin_list']=$this->Salesbulletin_model->get_salesbulletin_list();
			$this->load->view('salesbulletin/list',$data);
			}else if($user_details['role_id']==2){
			$data['sales_bulletin_list']=$this->Salesbulletin_model->get_salesbulletin_list_admin($user_details['e_id']);
			$this->load->view('salesbulletin/salesbulletin_admin_list',$data);
			}else if($user_details['role_id']==3){
			$data['sales_bulletin_list']=$this->Salesbulletin_model->get_salesbulletin_list_manager($user_details['e_id']);
			$this->load->view('salesbulletin/salesbulletin_manager_list',$data);
			}else if($user_details['role_id']==4){
			$data['sales_bulletin_list']=$this->Salesbulletin_model->get_salesbulletin_list_group_leader($user_details['e_id']);
			$this->load->view('salesbulletin/salesbulletin_group_leader_list',$data);
			}else if($user_details['role_id']==5){
			$data['sales_bulletin_list']=$this->Salesbulletin_model->get_salesbulletin_list_executives($user_details['e_id']);
			$this->load->view('salesbulletin/salesbulletin_executives_list',$data);	
				
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
			$data['sales_bulletin_details']=$this->Salesbulletin_model->get_sales_bulletin_details($s_id);
			$this->load->view('salesbulletin/edit',$data);
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
					$upadte_data = array(
					'role_id'=>isset($login_details['role_id'])?$login_details['role_id']:'',
					'name_of_gl'=>isset($post['name_of_gl'])?$post['name_of_gl']:'',
					'grovin'=>isset($post['grovin'])?$post['grovin']:'',
					'free'=>isset($post['free'])?$post['free']:'',
					'3g'=>isset($post['3g'])?$post['3g']:'',
					'neem'=>isset($post['neem'])?$post['neem']:'',
					'neem_oil'=>isset($post['neem_oil'])?$post['neem_oil']:'',
					'ss'=>isset($post['ss'])?$post['ss']:'',
					'mic'=>isset($post['mic'])?$post['mic']:'',
					'action'=>isset($post['action'])?$post['action']:'',
					'corax'=>isset($post['corax'])?$post['corax']:'',
					'bkts'=>isset($post['bkts'])?$post['bkts']:'',
					'fatra'=>isset($post['fatra'])?$post['fatra']:'',
					'terror'=>isset($post['terror'])?$post['terror']:'',
					'total_units'=>isset($post['total_units'])?$post['total_units']:'',
					'status'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Salesbulletin_model->update_salesbulletin_details($post['s_id'],$upadte_data);		
					if(count($update)>0){
						$this->session->set_flashdata('success',"Sales Bulletin details are successfully updated");	
						redirect('salesbulletin/lists');	
					}else{
						$this->session->set_flashdata('error',"techechal probelem occur");
						redirect('salesbulletin/edit/'.base64_encode($post['s_id']));
					}
			
			
			
			
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
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
							$statusdata=$this->Salesbulletin_model->update_salesbulletin_details($s_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Sales Bulletin details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Sales Bulletin details successfully Activate.");
								}
								redirect('salesbulletin/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('salesbulletin/lists');
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
					
					
							
							$statusdata=$this->Salesbulletin_model->delete_salesbulletin_details($s_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Sales Bulletin details successfully  successfully deleted.");
								redirect('salesbulletin/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('salesbulletin/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
	
	
	
}
