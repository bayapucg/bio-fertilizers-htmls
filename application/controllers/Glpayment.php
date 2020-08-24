<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Glpayment extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Glpayment_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
           	
			$gl=$this->Glpayment_model->get_gl($user_details['e_id']);
			$data['gl_list']=$this->Glpayment_model->get_gl_list($gl['group_leader']);
			
			 //echo'<pre>';print_r($data);exit;
			
			$this->load->view('glpayment/add',$data);
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
					
					$abm_list=$this->Glpayment_model->get_se_st_expenses_list($post['gm_tm_name']);
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
					
					$abm_list=$this->Glpayment_model->get_se_st_expenses_list_excetues($login_details['e_id'],$post['gm_tm_name']);
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
            $post=$this->input->post();		    
            //echo'<pre>';print_r($post);exit;
			$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		    $save_data=array(
			'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'st_se_name'=>isset($post['st_se_name'])?$post['st_se_name']:'',
			'camp'=>isset($post['camp'])?$post['camp']:'',
			'gm_tm_name'=>isset($post['gm_tm_name'])?$post['gm_tm_name']:'',
			'date'=>isset($post['date'])?$post['date']:'',
			'branch_name'=>isset($post['branch_name'])?$post['branch_name']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
			'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
			'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
			);
		$save=$this->Glpayment_model->save_glpayment_details($save_data);
				

		if(count($save)>0){
	$cnt=1;foreach ($_FILES['signature']['tmp_name'] as $key => $val ) {
     if($_FILES["signature"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["signature"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['signature']['tmp_name'][$key], "assets/glpayment_signature/" . $image1[$cnt]);
      $add_data=array(
	  'g_id'=>isset($save)?$save:'',
	  'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
      'signature'=>$image1[$cnt],
      'customer_name'=>isset($post['customer_name'][$key])?$post['customer_name'][$key]:'',
      'order_no'=>isset($post['order_no'][$key])?$post['order_no'][$key]:'',
      'booking_date'=>isset($post['booking_date'][$key])?$post['booking_date'][$key]:'',
      'advance'=>isset($post['advance'][$key])?$post['advance'][$key]:'',
      'village'=>isset($post['village'][$key])?$post['village'][$key]:'',
      'branch'=>isset($post['branch'][$key])?$post['branch'][$key]:'',
      'cell'=>isset($post['cell'][$key])?$post['cell'][$key]:'',
      'units'=>isset($post['units'][$key])?$post['units'][$key]:'',
      'org_signature'=>isset($_FILES['signature']['name'][$key])?$_FILES['signature']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
     'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
	 'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
	'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
	'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
      );
     $this->Glpayment_model->save_glpayment_data_details($add_data);	
	      // echo'<pre>';print_r($add_data);

     }
	 
	 
      // here your insert query
     $cnt++;}


//exit;


	 
					  $this->session->set_flashdata('success',"glpayment details successfully added");	
					redirect('glpayment/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('glpayment/add');
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
			$data['glpayment_list']=$this->Glpayment_model->get_glpayment_list();
			$this->load->view('glpayment/list',$data);
			}else if($user_details['role_id']==2){
			$data['glpayment_list']=$this->Glpayment_model->get_glpayment_list_admin($user_details['e_id']);
		     //echo'<pre>';print_r($data);exit;
			$this->load->view('glpayment/glpayment_list_admin',$data);
			}else if($user_details['role_id']==3){
			$data['glpayment_list']=$this->Glpayment_model->get_glpayment_list_manager($user_details['e_id']);
			$this->load->view('glpayment/glpayment_list_manager',$data);
			}else if($user_details['role_id']==4){
			$data['glpayment_list']=$this->Glpayment_model->get_glpayment_list_group_leader($user_details['e_id']);
			$this->load->view('glpayment/glpayment_list_group_leader',$data);
			}else if($user_details['role_id']==5){
			$data['glpayment_list']=$this->Glpayment_model->get_glpayment_list_executives($user_details['e_id']);
			$this->load->view('glpayment/glpayment_list_executives',$data);
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
			$g_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_glpayment']=$this->Glpayment_model->get_edit_glpayment($g_id);
           	//echo'<pre>';print_r($data);exit;
			$gl=$this->Glpayment_model->get_gl($user_details['e_id']);
			$data['gl_list']=$this->Glpayment_model->get_gl_list($gl['group_leader']);
			
			$data['se_st_list']=$this->Glpayment_model->get_se_st_expenses_list($data['edit_glpayment']['gm_tm_name']);

			
			$this->load->view('glpayment/edit',$data);
			}else if($user_details['role_id']==5){
			$g_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_glpayment']=$this->Glpayment_model->get_edit_glpayment($g_id);
           	//echo'<pre>';print_r($data);exit;
			$gl=$this->Glpayment_model->get_gl($user_details['e_id']);
			$data['gl_list']=$this->Glpayment_model->get_gl_list($gl['group_leader']);
			$data['se_st_list']=$this->Glpayment_model->get_se_st_expenses_list_excetues($user_details['e_id'],$data['edit_glpayment']['gm_tm_name']);
			$this->load->view('glpayment/edit',$data);
			}else{
			$g_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_glpayment']=$this->Glpayment_model->get_edit_glpayment($g_id);
           	//echo'<pre>';print_r($data);exit;	
			$this->load->view('glpayment/edit',$data);
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
			'camp'=>isset($post['camp'])?$post['camp']:'',
			'gm_tm_name'=>isset($post['gm_tm_name'])?$post['gm_tm_name']:'',
			'date'=>isset($post['date'])?$post['date']:'',
			'branch_name'=>isset($post['branch_name'])?$post['branch_name']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			);
		//echo '<pre>';print_r($update_data);exit;
		$update=$this->Glpayment_model->update_glpayment_details($post['g_id'],$update_data);
		//echo '<pre>';print_r($update);exit;
	if(count($update)>0){
	$cnt=1;foreach ($_FILES['signature']['tmp_name'] as $key => $val ) {
     if($_FILES["signature"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["signature"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['signature']['tmp_name'][$key], "assets/glpayment_signature/" . $image1[$cnt]);
      $add_data=array(
	  'g_id'=>isset($post['g_id'])?$post['g_id']:'',
      'signature'=>$image1[$cnt],
      'customer_name'=>isset($post['customer_name'][$key])?$post['customer_name'][$key]:'',
      'order_no'=>isset($post['order_no'][$key])?$post['order_no'][$key]:'',
      'booking_date'=>isset($post['booking_date'][$key])?$post['booking_date'][$key]:'',
      'advance'=>isset($post['advance'][$key])?$post['advance'][$key]:'',
      'village'=>isset($post['village'][$key])?$post['village'][$key]:'',
      'branch'=>isset($post['branch'][$key])?$post['branch'][$key]:'',
      'cell'=>isset($post['cell'][$key])?$post['cell'][$key]:'',
      'units'=>isset($post['units'][$key])?$post['units'][$key]:'',
      'org_signature'=>isset($_FILES['signature']['name'][$key])?$_FILES['signature']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
      );
     $this->Glpayment_model->save_glpayment_data_details($add_data);	
	      // echo'<pre>';print_r($add_data);

     }
	 
	 
      // here your insert query
     $cnt++;}
			
			$this->session->set_flashdata('success',"glpayment details successfully updated");	
			redirect('glpayment/lists');	
			
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('glpayment/lists');
			}	
			
	       }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}	
	
	
	public function img_remove()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Glpayment_model->delete_glpayment_details($post['p_id']);
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
							$statusdata=$this->Glpayment_model->update_glpayment_details($g_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"glpayment details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"glpayment details successfully Activate.");
								}
								redirect('glpayment/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('glpayment/lists');
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
					
					
							
							$statusdata=$this->Glpayment_model->delete_glpayment($g_id);
							$statusdata=$this->Glpayment_model->delete_glpayment_data($g_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"glpayment details successfully  successfully deleted.");
								redirect('glpayment/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('glpayment/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
	
	
	
}
