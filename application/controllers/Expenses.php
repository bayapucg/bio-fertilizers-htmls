<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Expenses extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Expenses_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	
			$abm=$this->Expenses_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Expenses_model->get_abm_list($abm['manager_id']);
			
			
			$this->load->view('expenses/add',$data);
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function get_se_st_expenses_list(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==4){
					$post=$this->input->post();
					
					$abm_list=$this->Expenses_model->get_se_st_expenses_list($login_details['group_leader'],$post['abm_tm_name']);
					//echo'<pre>';print_r($route_list);exit;
					if(count($abm_list)>0){
						$data['msg']=1;
						$data['list']=$abm_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
					
             }else if($login_details['role_id']==5){
		  $post=$this->input->post();
					
					$abm_list=$this->Expenses_model->get_se_st_expenses_list_excetues($login_details['e_id'],$post['abm_tm_name']);
					//echo'<pre>';print_r($route_list);exit;
					if(count($abm_list)>0){
						$data['msg']=1;
						$data['list']=$abm_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
						
		 
			 }
		 
		 
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('login');
		}
	}
    
	
	
	
	
	
	public function addpost()
	{
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');	
			  //echo'<pre>';print_r($login_details);
            $post=$this->input->post();		    
			$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		    $save_data=array(
			'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'st_se_name'=>isset($post['st_se_name'])?$post['st_se_name']:'',
			'abm_tm_name'=>isset($post['abm_tm_name'])?$post['abm_tm_name']:'',
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
		$save=$this->Expenses_model->save_expenses_details($save_data);
				

		if(count($save)>0){
	$cnt=1;foreach ($_FILES['sign']['tmp_name'] as $key => $val ) {
     if($_FILES["sign"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["sign"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['sign']['tmp_name'][$key], "assets/expenses_signature/" . $image1[$cnt]);
      $add_data=array(
	  'e_id'=>isset($save)?$save:'',
	  'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
      'sign'=>$image1[$cnt],
      'date'=>isset($post['date'][$key])?$post['date'][$key]:'',
      'received_amount'=>isset($post['received_amount'][$key])?$post['received_amount'][$key]:'',
      'cumulative_amount'=>isset($post['cumulative_amount'][$key])?$post['cumulative_amount'][$key]:'',
      'org_sign'=>isset($_FILES['sign']['name'][$key])?$_FILES['sign']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
      'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
	  'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
	  'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
	  'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
      );
     $this->Expenses_model->save_expenses_data_details($add_data);	
	      // echo'<pre>';print_r($add_data);

     }
	 
	 
      // here your insert query
     $cnt++;}


//exit;


	 
					  $this->session->set_flashdata('success',"expenses details successfully added");	
					redirect('expenses/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('expenses/add');
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
			$data['expenses_list']=$this->Expenses_model->get_expenses_list();
			$this->load->view('expenses/list',$data);
			 }else if($user_details['role_id']==2){
			$data['expenses_list']=$this->Expenses_model->get_expenses_list_admin($user_details['e_id']);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('expenses/expenses_list_admin',$data);
			}else if($user_details['role_id']==3){
			$data['expenses_list']=$this->Expenses_model->get_expenses_list_manager($user_details['e_id']);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('expenses/expenses_list_manager',$data);
			}else if($user_details['role_id']==4){
			$data['expenses_list']=$this->Expenses_model->get_expenses_list_group_leader($user_details['e_id']);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('expenses/expenses_list_group_leader',$data);
			}else if($user_details['role_id']==5){
			$data['expenses_list']=$this->Expenses_model->get_expenses_list_executives($user_details['e_id']);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('expenses/expenses_list_executives',$data);
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
			if($user_details['role_id']==4){
			
			$e_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_expenses']=$this->Expenses_model->get_edit_expenses($e_id);
           	//echo'<pre>';print_r($data);exit;
			$abm=$this->Expenses_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Expenses_model->get_abm_list($abm['manager_id']);
		    $data['se_st_list']=$this->Expenses_model->get_se_st_expenses_list($user_details['group_leader'],$data['edit_expenses']['abm_tm_name']);
			$this->load->view('expenses/edit',$data);		
			}else if($user_details['role_id']==5){
			
			$e_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_expenses']=$this->Expenses_model->get_edit_expenses($e_id);
           	//echo'<pre>';print_r($data);exit;
			$abm=$this->Expenses_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Expenses_model->get_abm_list($abm['manager_id']);
			$data['se_st_list']=$this->Expenses_model->get_se_st_expenses_list_excetues($user_details['e_id'],$data['edit_expenses']['abm_tm_name']);

			$this->load->view('expenses/edit',$data);
			
			}else{
			$e_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_expenses']=$this->Expenses_model->get_edit_expenses($e_id);
           	//echo'<pre>';print_r($data);exit;
			$this->load->view('expenses/edit',$data);
			
			}
			
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
		$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		//echo '<pre>';print_r($userdetails);exit;
        $post=$this->input->post();
		
         $update_data=array(
		 'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'st_se_name'=>isset($post['st_se_name'])?$post['st_se_name']:'',
			'abm_tm_name'=>isset($post['abm_tm_name'])?$post['abm_tm_name']:'',
			'month'=>isset($post['month'])?$post['month']:'',
			'branch'=>isset($post['branch'])?$post['branch']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			);
		//echo '<pre>';print_r($update_data);exit;
		$update=$this->Expenses_model->update_expenses_details($post['e_id'],$update_data);
		//echo '<pre>';print_r($update);exit;
	if(count($update)>0){
	$cnt=1;foreach ($_FILES['sign']['tmp_name'] as $key => $val ) {
     if($_FILES["sign"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["sign"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['sign']['tmp_name'][$key], "assets/expenses_signature/" . $image1[$cnt]);
      $add_data=array(
	  'e_id'=>isset($post['e_id'])?$post['e_id']:'',
      'sign'=>$image1[$cnt],
      'date'=>isset($post['date'][$key])?$post['date'][$key]:'',
      'received_amount'=>isset($post['received_amount'][$key])?$post['received_amount'][$key]:'',
      'cumulative_amount'=>isset($post['cumulative_amount'][$key])?$post['cumulative_amount'][$key]:'',
      'org_sign'=>isset($_FILES['sign']['name'][$key])?$_FILES['sign']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
      );
     $this->Expenses_model->save_expenses_data_details($add_data);	
	      // echo'<pre>';print_r($add_data);

     }
	 
	 
      // here your insert query
     $cnt++;}

			
			$this->session->set_flashdata('success',"expenses details successfully updated");	
			redirect('expenses/lists');	
			
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('expenses/lists');
			}	
			
	       }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}	
	
	
	public function img_remove()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Expenses_model->delete_expenses_details($post['p_id']);
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
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Expenses_model->update_expenses_details($e_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"expenses details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"expenses details successfully Activate.");
								}
								redirect('expenses/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('expenses/lists');
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
	             $e_id=base64_decode($this->uri->segment(3));
					
					
							
							$statusdata=$this->Expenses_model->delete_expenses($e_id);
							$statusdata=$this->Expenses_model->delete_expenses_data($e_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"expenses details successfully  successfully deleted.");
								redirect('expenses/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('expenses/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
	
	
	
}
