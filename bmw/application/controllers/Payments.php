<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Payments extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Payments_model');
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
		    $data['sales_person_list']=$this->Payments_model->get_sales_person_list();
			//echo'<pre>';print_r($data);exit;
			
			$this->load->view('payments/otp-screen',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public function get_sales_person_mobile_number_list(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$mobile_number_list=$this->Payments_model->get_mobile_number_list($post['sale_person']);
					if(count($mobile_number_list)>0){
						$data['msg']=1;
						$data['list']=$mobile_number_list;
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
	public  function post(){
		if($this->session->userdata('user_details'))
		{
		$post=$this->input->post();
		$login_data=array('email'=>$post['email'],'password'=>md5($post['password']));
		$check_login=$this->Payments_model->check_saleperson_login($login_data);

		if(count($check_login)>0){
			$login_details=$this->Payments_model->get_saleperson_details($check_login['s_id']);
			$this->session->set_flashdata('success','Sales person login sucessfully');
			redirect('payments/update/'.base64_encode($check_login['s_id']));	
		}else{
			$this->session->set_flashdata('error','Invalid Email  or Password!');
			redirect('payments');	
		}
	}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	public function update(){
		if($this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			$s_id=base64_decode($this->uri->segment(3));
			$data['check']=$this->Payments_model->get_saleperson_details($s_id);
			$this->load->view('payments/update-payment',$data);
			$this->load->view('admin/footer');	
	        }else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function get_hospital_month_wise_total_amount(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					$hospital_list=$this->Payments_model->get_hospital_month_wise_total_amount($post['hospital']);
							//echo'<pre>';print_r($hospital_list);exit;
					if(count($hospital_list)>0){
						$data['msg']=1;
						$data['list']=$hospital_list;
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
	public function get_hospital_month_wise_year(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					$hospital_list=$this->Payments_model->get_hospital_month_wise_year($post['month_name']);
							//echo'<pre>';print_r($hospital_list);exit;
					if(count($hospital_list)>0){
						$data['msg']=1;
						$data['list']=$hospital_list;
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
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
		  $data['payments_list']=$this->Payments_model->get_payments_list();
		  //echo'<pre>';print_r($data);exit;
			$this->load->view('payments/payment-list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function get_hospital_paid_amount(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$hospital_list=$this->Payments_model->get_hospital_paid_amount($post['year']);
							//echo'<pre>';print_r($hospital_list);exit;
					if(count($hospital_list)>0){
						$data['msg']=1;
						$data['list']=$hospital_list;
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
	public function get_hospital_year_wise_total_amount(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$hospital_list=$this->Payments_model->get_hospital_year_wise_total_amount($post['year']);
							//echo'<pre>';print_r($hospital_list);exit;
					if(count($hospital_list)>0){
						$data['msg']=1;
						$data['list']=$hospital_list;
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
	
	
	public function updatepost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
		   $post=$this->input->post();
		   //echo'<pre>';print_r($post);exit;
		$month_name=$this->Payments_model->get_month_data($post['month_name']);
		$year_name=$this->Payments_model->get_year_data($post['year']);
		$hospital_name=$this->Payments_model->get_hospital_data($post['hospital']);
               		 // echo'<pre>';print_r($month_name);exit;
           if(isset($post['hospital']) && $post['hospital']=='Investment'){

				 $save_data=array(
	            's_id'=>isset($post['s_id'])?$post['s_id']:'',
			    'hospitals_name'=>isset($post['hospital'])?$post['hospital']:'',
			    'months_names'=>isset($post['months_names'])?$post['months_names']:'',
	            'year_name'=>date('Y'),
	            'sales_person'=>isset($post['sales_person'])?$post['sales_person']:'',
	            'investment_amount'=>isset($post['investment_amount'])?$post['investment_amount']:'',
	            'total_amount'=>0,
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
			    'trans_action_no'=>isset($post['trans_action_no'])?$post['trans_action_no']:'',
                'cheque_no'=>isset($post['cheque_no'])?$post['cheque_no']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  //echo'<pre>';print_r($save_data);exit;
		        $save=$this->Payments_model->save_payments_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"payments details successfully added");	
					redirect('payments/confirmation/'.base64_encode($save));
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('payments/lists');
					}  
			
		   }else{
			   
		   $paid_amount_list=$this->Payments_model->paid_amount_list($post['hospital'],$post['month_name'],$post['year']);	
				//echo'<pre>';print_r($paid_amount_list);exit;
				$paid_total=$paid_amount_list['paid'];
				$totals=$post['total_amount'];
				
				if($totals <= $paid_total){
				$this->session->set_flashdata('error',"total paid amount Sucessfully");	
				redirect('payments/lists');
				}
				$total=$post['total_amount'];
				$paids=$post['paid_amount']+$post['discount'];
				$paid_amount=$paid_amount_list['paid']+$paid;
				// echo'<pre>';print_r($paid);exit;
				if($total < $paids){
				$this->session->set_flashdata('error',"add paid amount discount not grater than total amount sucessfully");	
				redirect('payments/otp/'.base64_encode($post['s_id']));	
				}
		  if(isset($post['payment_type']) && $post['payment_type']==1){
			  
		    $save_data=array(
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            's_id'=>isset($post['s_id'])?$post['s_id']:'',
	            'h_m_b_id'=>isset($post['month_name'])?$post['month_name']:'',
	            'month_name'=>isset($post['month_name'])?$post['month_name']:'',
	            'm_name'=>isset($month_name['month'])?$month_name['month']:'',
	            'year'=>isset($post['year'])?$post['year']:'',
			    'hospitals_name'=>isset($hospital_name['hospital_name'])?$hospital_name['hospital_name']:'',
			    'months_names'=>isset($month_name['month'])?$month_name['month']:'',
	            'year_name'=>isset($year_name['year'])?$year_name['year']:'',
	            'sales_person'=>isset($post['sales_person'])?$post['sales_person']:'',
	            'total_amount'=>isset($post['total_amount'])?$post['total_amount']:'',
			    'investment_amount'=>0,
	            'pending_amount'=>(isset($post['total_amount'])?$post['total_amount']:'')-(isset($post['paid_amount'])?$post['paid_amount']:''),
	            'paid_amount'=>isset($post['paid_amount'])?$post['paid_amount']:'',
	            'discount'=>isset($post['discount'])?$post['discount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Payments_model->save_payments_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"payments details successfully added");	
					redirect('payments/confirmation/'.base64_encode($save));
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('payments/lists');
					}  
		 }else  if(isset($post['payment_type']) && $post['payment_type']==2){
			  
			 $save_data=array(
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
				's_id'=>isset($post['s_id'])?$post['s_id']:'',
			    'h_m_b_id'=>isset($post['month_name'])?$post['month_name']:'',
	            'month_name'=>isset($post['month_name'])?$post['month_name']:'',
			    'm_name'=>isset($month_name['month'])?$month_name['month']:'',
			    'year'=>isset($post['year'])?$post['year']:'',
				'hospitals_name'=>isset($hospital_name['hospital_name'])?$hospital_name['hospital_name']:'',
			    'months_names'=>isset($month_name['month'])?$month_name['month']:'',
	            'year_name'=>isset($year_name['year'])?$year_name['year']:'',
	            'sales_person'=>isset($post['sales_person'])?$post['sales_person']:'',
	            'total_amount'=>isset($post['total_amount'])?$post['total_amount']:'',
		       'investment_amount'=>0,
	            'pending_amount'=>(isset($post['total_amount'])?$post['total_amount']:'')-(isset($post['paid_amount'])?$post['paid_amount']:''),
	            'paid_amount'=>isset($post['paid_amount'])?$post['paid_amount']:'',
	            'discount'=>isset($post['discount'])?$post['discount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
	            'trans_action_no'=>isset($post['trans_action_no'])?$post['trans_action_no']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Payments_model->save_payments_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"payments details successfully added");	
					redirect('payments/confirmation/'.base64_encode($save));
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('payments/lists');
					}    
			  
			    
			  
		  }else if(isset($post['payment_type']) && $post['payment_type']==3){
			  
			  $save_data=array(
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
				's_id'=>isset($post['s_id'])?$post['s_id']:'',
				'h_m_b_id'=>isset($post['month_name'])?$post['month_name']:'',
	            'month_name'=>isset($post['month_name'])?$post['month_name']:'',
			    'm_name'=>isset($month_name['month'])?$month_name['month']:'',
			    'year'=>isset($post['year'])?$post['year']:'',
				'hospitals_name'=>isset($hospital_name['hospital_name'])?$hospital_name['hospital_name']:'',
			    'months_names'=>isset($month_name['month'])?$month_name['month']:'',
	            'year_name'=>isset($year_name['year'])?$year_name['year']:'',
	            'sales_person'=>isset($post['sales_person'])?$post['sales_person']:'',
	            'total_amount'=>isset($post['total_amount'])?$post['total_amount']:'',
				'investment_amount'=>0,
	            'pending_amount'=>(isset($post['total_amount'])?$post['total_amount']:'')-(isset($post['paid_amount'])?$post['paid_amount']:''),
	            'paid_amount'=>isset($post['paid_amount'])?$post['paid_amount']:'',
	            'discount'=>isset($post['discount'])?$post['discount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
	            'cheque_no'=>isset($post['cheque_no'])?$post['cheque_no']:'',
				'status'=>0,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Payments_model->save_payments_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"payments details successfully added");	
					redirect('payments/confirmation/'.base64_encode($save));	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('payments/lists');
					}    
			   
		  }
			
		   }
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public  function confirmation(){
	if($this->session->userdata('user_details'))
		{
      $login_details=$this->session->userdata('user_details');
		$p_id=base64_decode($this->uri->segment(3));
		//echo'<pre>';print_r($login_details);exit;
		if($p_id==''){
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
			redirect('payments');	
		}
		$details=$this->Payments_model->get_payments_type_list($p_id);
				//echo'<pre>';print_r($details);exit;
		if($details['hospitals_name']=='Investment'){
         $s_detail=$this->Payments_model->get_payments_details($p_id);
		//echo'<pre>';print_r($s_detail);exit;
		if(count($s_detail)>0){
			$data['s_detail']=$s_detail;
			$this->load->view('payments/investment_confirmation',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"payments details are not found. Please try again once");
			redirect('payments/update/'.base64_encode($s_detail['s_id']));
		}
		
		 
		}else{
		 if($details['payment_type']==1){
		$s_detail=$this->Payments_model->get_payments_details($p_id);
		//echo'<pre>';print_r($s_detail);exit;
		if(count($s_detail)>0){
			$data['s_detail']=$s_detail;
			$this->load->view('payments/confirmation',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"payments details are not found. Please try again once");
			redirect('payments/update/'.base64_encode($s_detail['s_id']));
		}
		
		
		 }else if($details['payment_type']==2){
			 
		$s_detail=$this->Payments_model->get_payments_details($p_id);
		//echo'<pre>';print_r($s_detail);exit;
		if(count($s_detail)>0){
			$data['s_detail']=$s_detail;
			$this->load->view('payments/confirmation',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"payments details are not found. Please try again once");
			redirect('payments/update/'.base64_encode($s_detail['s_id']));
		} 
		
		
		 }else if($details['payment_type']==3){
		
		$s_detail=$this->Payments_model->get_payments_cheque_details($p_id);
		if(count($s_detail)>0){
			$data['s_detail']=$s_detail;
			$this->load->view('payments/confirmation',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"payments details are not found. Please try again once");
			redirect('payments/update/'.base64_encode($s_detail['s_id']));
		} 
		
		
		
		 }
}
	     }else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	public function delete()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Payments_model->update_payment_cheque_details($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payments details  successfully  deleted.");
								redirect('payments/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('payments/lists');
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
	
	public function deletes()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($p_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$update=array(
							'p_id'=>$p_id,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
                             'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
							);
							$this->Payments_model->save_notifications_list_details($update);
							$statusdata=$this->Payments_model->update_payment_cheque_details($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payments details  successfully  deleted.");
								redirect('payments');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('payments');
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
	public function deletes()
		{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Payments_model->delete_payments_details($p_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payments details  successfully  deleted.");
								redirect('payments');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('payments');
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
	             $p_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Payments_model->delete_payments_details($p_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payments details  successfully  deleted.");
								redirect('payments/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('payments/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	*/
	
	
	public function cleared()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
						$stusdetails=array(
							'status'=>1,
							'cheque_updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Payments_model->update_payment_cheque_details($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payment cheque details  successfully  Cleared.");
								redirect('payments/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('payments/lists');
								}
						
		}else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('admin');  
	   }
        
    
}
	
	
	
	public function uncleared()
{
if($this->session->userdata('user_details'))
		{	
         $login_details=$this->session->userdata('user_details');	
	             $p_id=base64_decode($this->uri->segment(3));
						$stusdetails=array(
							'status'=>3,
							'cheque_updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Payments_model->update_payment_cheque_details($p_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payment cheque details  successfully  Un Cleared.");
								redirect('payments/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('payments/lists');
								}
						
		}else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('admin');  
	   }
        
    
}
	
	
	
	
	
	
	
	
	

	
	
}
