<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Ordercuminvoice extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Ordercuminvoice_model');
	}
	
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			
			$abm=$this->Ordercuminvoice_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Ordercuminvoice_model->get_abm_list($abm['manager_id']);
           	
			
			//echo'<pre>';print_r($abm);exit;
			$this->load->view('ordercuminvoice/add',$data);
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
            //echo'<pre>';print_r($post);exit;
			$userdetails=$this->Login_model->get_employee_details($login_details['e_id']);
		    $save_data=array(
			'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
			'name_of_gl'=>isset($post['name_of_gl'])?$post['name_of_gl']:'',
			'name_of_abm'=>isset($post['name_of_abm'])?$post['name_of_abm']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
			'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
			'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
			'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
			);
		$save=$this->Ordercuminvoice_model->save_ordercuminvoice_details($save_data);
				

		if(count($save)>0){
	$cnt=1;foreach ($_FILES['signature_gl_abm']['tmp_name'] as $key => $val ) {
     if($_FILES["signature_gl_abm"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["signature_gl_abm"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['signature_gl_abm']['tmp_name'][$key], "assets/ordercuminvoice_signature/" . $image1[$cnt]);
      $add_data=array(
	  'o_id'=>isset($save)?$save:'',
	  'role_id'=>isset($userdetails['role_id'])?$userdetails['role_id']:'',
      'signature_gl_abm'=>$image1[$cnt],
      'date'=>isset($post['date'][$key])?$post['date'][$key]:'',
      'order_no'=>isset($post['order_no'][$key])?$post['order_no'][$key]:'',
      'name_of_sales_executive'=>isset($post['name_of_sales_executive'][$key])?$post['name_of_sales_executive'][$key]:'',
      'invoice_doc'=>isset($post['invoice_doc'][$key])?$post['invoice_doc'][$key]:'',
      'units'=>isset($post['units'][$key])?$post['units'][$key]:'',
      'org_signature'=>isset($_FILES['signature_gl_abm']['name'][$key])?$_FILES['signature_gl_abm']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
     'created_by'=>isset($login_details['e_id'])?$login_details['e_id']:'',
	'admin_id'=>isset($login_details['admin_id'])?$login_details['admin_id']:'',
	'manager_id'=>isset($login_details['manager_id'])?$login_details['manager_id']:'',
	'group_leader'=>isset($login_details['group_leader'])?$login_details['group_leader']:'',
      );
     $this->Ordercuminvoice_model->save_ordercuminvoice_data_details($add_data);	
	      // echo'<pre>';print_r($add_data);

     }
	 
	 
      // here your insert query
     $cnt++;}


//exit;


	 
					  $this->session->set_flashdata('success',"ordercuminvoice details successfully added");	
					redirect('ordercuminvoice/lists');	
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('ordercuminvoice/add');
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
			$data['ordercuminvoice_list']=$this->Ordercuminvoice_model->get_ordercuminvoice_list();
			$this->load->view('ordercuminvoice/list',$data);
			}else if($user_details['role_id']==2){
			$data['ordercuminvoice_list']=$this->Ordercuminvoice_model->get_ordercuminvoice_list_admin($user_details['e_id']);
			$this->load->view('ordercuminvoice/ordercuminvoice_list_admin',$data);
			}else if($user_details['role_id']==3){
			$data['ordercuminvoice_list']=$this->Ordercuminvoice_model->get_ordercuminvoice_list_manager($user_details['e_id']);
			$this->load->view('ordercuminvoice/ordercuminvoice_list_manager',$data);
			}else if($user_details['role_id']==4){
			$data['ordercuminvoice_list']=$this->Ordercuminvoice_model->get_ordercuminvoice_list_group_leader($user_details['e_id']);
			$this->load->view('ordercuminvoice/ordercuminvoice_list_group_leader',$data);
			}else if($user_details['role_id']==5){
			$data['ordercuminvoice_list']=$this->Ordercuminvoice_model->get_ordercuminvoice_list_executives($user_details['e_id']);
			$this->load->view('ordercuminvoice/ordercuminvoice_list_executives',$data);
			}
			
			
			
		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('login');
		}
	}
	public function get_group_leader_list(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==4){
					$post=$this->input->post();
					
					$abm_list=$this->Ordercuminvoice_model->get_group_leader_list_group_leader($login_details['e_id'],$post['name_of_abm']);
					//echo'<pre>';print_r($route_list);exit;
					if(count($abm_list)>0){
						$data['msg']=1;
						$data['list']=$abm_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
					
             }else if($login_details['role_id']==3){
				
			     $post=$this->input->post();
					
					$abm_list=$this->Ordercuminvoice_model->get_group_leader_list_manager($post['name_of_abm']);
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
					
					$abm_list=$this->Ordercuminvoice_model->get_group_leader_list_executives($login_details['group_leader'],$post['name_of_abm']);
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
    
	public function edit()
	{	
		if($this->session->userdata('user_details'))
		{
			$user_details=$this->session->userdata('user_details');
			if($user_details['role_id']==4){
			
			$o_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_ordercuminvoice_details']=$this->Ordercuminvoice_model->get_edit_ordercuminvoice($o_id);
           	$abm=$this->Ordercuminvoice_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Ordercuminvoice_model->get_abm_list($abm['manager_id']);
			
			$data['group_leader_list']=$this->Ordercuminvoice_model->get_group_leader_list_group_leader($data['edit_ordercuminvoice_details']['e_id'],$data['edit_ordercuminvoice_details']['name_of_abm']);
			
			//echo'<pre>';print_r($data);exit;
			$this->load->view('ordercuminvoice/edit',$data);
			}else if($user_details['role_id']==3){
			$o_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_ordercuminvoice_details']=$this->Ordercuminvoice_model->get_edit_ordercuminvoice($o_id);
           	$abm=$this->Ordercuminvoice_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Ordercuminvoice_model->get_abm_list($abm['manager_id']);
			
			$data['group_leader_list']=$this->Ordercuminvoice_model->get_group_leader_list_manager($data['edit_ordercuminvoice_details']['name_of_abm']);

			$this->load->view('ordercuminvoice/edit',$data);
			}else if($user_details['role_id']==5){
			$o_id=base64_decode($this->uri->segment(3));
			$data['userdetails']=$this->Login_model->get_employee_details($user_details['e_id']);
			$data['edit_ordercuminvoice_details']=$this->Ordercuminvoice_model->get_edit_ordercuminvoice($o_id);
           	$abm=$this->Ordercuminvoice_model->get_abm($user_details['e_id']);
			$data['abm_list']=$this->Ordercuminvoice_model->get_abm_list($abm['manager_id']);
			
			$data['group_leader_list']=$this->Ordercuminvoice_model->get_group_leader_list_executives($data['edit_ordercuminvoice_details']['group_leader'],$data['edit_ordercuminvoice_details']['name_of_abm']);
             $this->load->view('ordercuminvoice/edit',$data);
			
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
			'name_of_gl'=>isset($post['name_of_gl'])?$post['name_of_gl']:'',
			'name_of_abm'=>isset($post['name_of_abm'])?$post['name_of_abm']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			);
		//echo '<pre>';print_r($update_data);exit;
		$update=$this->Ordercuminvoice_model->update_ordercuminvoice_details($post['o_id'],$update_data);
		//echo '<pre>';print_r($update);exit;
	if(count($update)>0){
	$cnt=1;foreach ($_FILES['signature_gl_abm']['tmp_name'] as $key => $val ) {
     if($_FILES["signature_gl_abm"]["name"][$key]!=''){
      $profilepicrenam2[$cnt] = microtime().basename($_FILES["signature_gl_abm"]["name"][$key]);
      $image1[$cnt]= str_replace(" ", "", $profilepicrenam2[$cnt]);
      move_uploaded_file($_FILES['signature_gl_abm']['tmp_name'][$key], "assets/ordercuminvoice_signature/" . $image1[$cnt]);
      $add_data=array(
	  'o_id'=>isset($post['o_id'])?$post['o_id']:'',
      'signature_gl_abm'=>$image1[$cnt],
      'date'=>isset($post['date'][$key])?$post['date'][$key]:'',
      'order_no'=>isset($post['order_no'][$key])?$post['order_no'][$key]:'',
      'name_of_sales_executive'=>isset($post['name_of_sales_executive'][$key])?$post['name_of_sales_executive'][$key]:'',
      'invoice_doc'=>isset($post['invoice_doc'][$key])?$post['invoice_doc'][$key]:'',
      'units'=>isset($post['units'][$key])?$post['units'][$key]:'',
      'org_signature'=>isset($_FILES['signature_gl_abm']['name'][$key])?$_FILES['signature_gl_abm']['name'][$key]:'',
      'status'=>1,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),
      );
	  // echo'<pre>';print_r($add_data);exit;
     $this->Ordercuminvoice_model->save_ordercuminvoice_data_details($add_data);	
	      

     }
	 
	 
      // here your insert query
     $cnt++;}

			
			$this->session->set_flashdata('success',"ordercuminvoice details successfully updated");	
			redirect('ordercuminvoice/lists');	
			
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('ordercuminvoice/lists');
			}	
			
	       }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}
	}	
	
	
	public function img_remove()
	{
	$post=$this->input->post();
					
		$delete_date=$this->Ordercuminvoice_model->delete_ordercuminvoice_details($post['p_id']);
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
	             $o_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
								 
					if($o_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							//echo'<pre>';print_r($stusdetails);exit;
							$statusdata=$this->Ordercuminvoice_model->update_ordercuminvoice_details($o_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"ordercuminvoice details successfully Deactivate.");
								}else{
									$this->session->set_flashdata('success',"ordercuminvoice details successfully Activate.");
								}
								redirect('ordercuminvoice/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ordercuminvoice/lists');
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
	             $o_id=base64_decode($this->uri->segment(3));
					
					
							
							$statusdata=$this->Ordercuminvoice_model->delete_ordercuminvoice($o_id);
							$statusdata=$this->Ordercuminvoice_model->delete_ordercuminvoice_data($o_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"ordercuminvoice details successfully  successfully deleted.");
								redirect('ordercuminvoice/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('ordercuminvoice/lists');
							}
						
	
	
           }else{
			$this->session->set_flashdata('error',"Please login to continue");
			redirect('login');
		}

		
		
	}
	
	
	
	
	
	
	
}
