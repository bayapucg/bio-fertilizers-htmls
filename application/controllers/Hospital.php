<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Hospital extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Hospital_model');
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Hospital_model->district_list();
			$this->load->view('hospital/add',$data);
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
		//echo'<pre>';print_r($post);exit;
		
			  $check_hospital_name_exit=$this->Hospital_model->check_hospital_name_already_exit($post['hospital_name']);
				if(count($check_hospital_name_exit)>0){
					$this->session->set_flashdata('error',"hospital name already exist. Please use another hospital name ");
					redirect('hospital/add');
				}	
		       $save_data=array(
	            'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
	            'hospital_type'=>isset($post['hospital_type'])?$post['hospital_type']:'',
	            's_d_r'=>isset($post['s_d_r'])?$post['s_d_r']:'',
	            'e_d_r'=>isset($post['e_d_r'])?$post['e_d_r']:'',
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
	            'total_amount'=>isset($post['total_amount'])?$post['total_amount']:'',
	            'advance_fee'=>isset($post['advance_fee'])?$post['advance_fee']:'',
	            'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'hospital_address'=>isset($post['hospital_address'])?$post['hospital_address']:'',
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Hospital_model->save_hospital_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Hospital details successfully added");	
					redirect('hospital/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('hospital/add');
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
			$data['hospital_list']=$this->Hospital_model->get_hospital_list();	
			    //echo'<pre>';print_r($data);exit;
			$this->load->view('hospital/list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function get_town_list(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$town_list=$this->Hospital_model->get_town_list($post['district']);
					if(count($town_list)>0){
						$data['msg']=1;
						$data['list']=$town_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
					
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function edit()
	{	
		if($this->session->userdata('user_details'))
		{
			$h_id=base64_decode($this->uri->segment(3));
			$data['edit_hospital']=$this->Hospital_model->edit_hospital_details($h_id);	
            $data['district_list']=$this->Hospital_model->district_list();
            $data['town_list']=$this->Hospital_model->get_town_list($data['edit_hospital']['district']);
			//echo'<pre>';print_r($data);exit;
			$this->load->view('hospital/edit',$data);
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
		//echo'<pre>';print_r($post);exit;
		if($post['hospital_type']=='Bedded hospital'){
			$edit_hospital=$this->Hospital_model->edit_hospital_details($post['h_id']);
		 if($edit_hospital['hospital_name']!=$post['hospital_name']){
			   $check_hospital_name_exit=$this->Hospital_model->check_hospital_name_already_exit($post['hospital_name']);
						if(count($check_hospital_name_exit)>0){
						$this->session->set_flashdata('error',"hospital name already exist. Please use another hospital name");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
						}	
					}	
		       $update_data=array(
	            'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
	            'hospital_type'=>isset($post['hospital_type'])?$post['hospital_type']:'',
	            's_d_r'=>isset($post['s_d_r'])?$post['s_d_r']:'',
	            'e_d_r'=>isset($post['e_d_r'])?$post['e_d_r']:'',
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
				'total_amount'=>'',
	            'advance_fee'=>isset($post['advance_fee'])?$post['advance_fee']:'',
                'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'hospital_address'=>isset($post['hospital_address'])?$post['hospital_address']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 $updates_datas=array(
				'h_id'=>isset($post['h_id'])?$post['h_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Hospital_model->notifications_list($post['h_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Hospital_model->update_notifications_list_details($check['h_id'],$updates_datas);	 
				 }else{
				$this->Hospital_model->save_notifications_list_details($updates_datas);
				 }
			  
                $update=$this->Hospital_model->update_hospital_details($post['h_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital details  successfully updated");	
					redirect('hospital/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
					  }    
				
			
			
		}else if($post['hospital_type']=='Nursing home'){
		$edit_hospital=$this->Hospital_model->edit_hospital_details($post['h_id']);
		 if($edit_hospital['hospital_name']!=$post['hospital_name']){
			   $check_hospital_name_exit=$this->Hospital_model->check_hospital_name_already_exit($post['hospital_name']);
						if(count($check_hospital_name_exit)>0){
						$this->session->set_flashdata('error',"hospital name already exist. Please use another hospital name");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
						}	
					}	
		       $update_data=array(
	            'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
	            'hospital_type'=>isset($post['hospital_type'])?$post['hospital_type']:'',
	            's_d_r'=>isset($post['s_d_r'])?$post['s_d_r']:'',
	            'e_d_r'=>isset($post['e_d_r'])?$post['e_d_r']:'',
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
			    'total_amount'=>'',
	            'advance_fee'=>isset($post['advance_fee'])?$post['advance_fee']:'',
				'district'=>isset($post['district'])?$post['district']:'',
			    'town'=>isset($post['town'])?$post['town']:'',
	            'hospital_address'=>isset($post['hospital_address'])?$post['hospital_address']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'h_id'=>isset($post['h_id'])?$post['h_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Hospital_model->notifications_list($post['h_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Hospital_model->update_notifications_list_details($check['h_id'],$updates_datas);	 
				 }else{
				$this->Hospital_model->save_notifications_list_details($updates_datas);
				 }
                $update=$this->Hospital_model->update_hospital_details($post['h_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital details  successfully updated");	
					redirect('hospital/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
					  }    
				
			
		
		}else{

         $edit_hospital=$this->Hospital_model->edit_hospital_details($post['h_id']);
		 if($edit_hospital['hospital_name']!=$post['hospital_name']){
			   $check_hospital_name_exit=$this->Hospital_model->check_hospital_name_already_exit($post['hospital_name']);
						if(count($check_hospital_name_exit)>0){
						$this->session->set_flashdata('error',"hospital name already exist. Please use another hospital name");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
						}	
					}	
		       $update_data=array(
	            'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
	            'hospital_type'=>isset($post['hospital_type'])?$post['hospital_type']:'',
	            's_d_r'=>isset($post['s_d_r'])?$post['s_d_r']:'',
	            'e_d_r'=>isset($post['e_d_r'])?$post['e_d_r']:'',
				'no_beds'=>'',
	            'cost_per_month'=>'',
	            'total_amount'=>isset($post['total_amount'])?$post['total_amount']:'',
	            'advance_fee'=>isset($post['advance_fee'])?$post['advance_fee']:'',
				'district'=>isset($post['district'])?$post['district']:'',
			    'town'=>isset($post['town'])?$post['town']:'',
	            'hospital_address'=>isset($post['hospital_address'])?$post['hospital_address']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'h_id'=>isset($post['h_id'])?$post['h_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Hospital_model->notifications_list($post['h_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Hospital_model->update_notifications_list_details($check['h_id'],$updates_datas);	 
				 }else{
				$this->Hospital_model->save_notifications_list_details($updates_datas);
				 }
                $update=$this->Hospital_model->update_hospital_details($post['h_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital details  successfully updated");	
					redirect('hospital/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('hospital/edit/'.base64_encode($post['h_id']));
					  }    






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
	             $h_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($h_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'notification_status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Hospital_model->update_hospital_details($h_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"hospital details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"hospital details  successfully  Activate.");
								}
								redirect('hospital/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('hospital/lists');
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
	             $h_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($h_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$update=array(
							'h_id'=>$h_id,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
                             'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
							);
							$this->Hospital_model->save_notifications_list_details($update);
							$statusdata=$this->Hospital_model->update_hospital_details($h_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Hospital details  successfully  deleted.");
								redirect('hospital/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('hospital/lists');
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
	             $h_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Hospital_model->delete_hospital_details($h_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"hospital details  successfully  deleted.");
								redirect('hospital/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('hospital/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	
	*/
	
	
	
	
	
	
	
	

	
	
}
