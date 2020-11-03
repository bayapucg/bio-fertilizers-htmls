<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Expenditure extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Expenditure_model');
	}
	public function add()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Expenditure_model->district_list();
			$this->load->view('expenditure/add',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['expenditure_list']=$this->Expenditure_model->get_expenditure_list();	
			   // echo'<pre>';print_r($data);exit;
			$this->load->view('expenditure/list',$data);
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
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
				$temp = explode(".", $_FILES["image"]["name"]);
				$images = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES['image']['tmp_name'], "assets/expenditure_images/" . $images);
				}else{
				$images='';
				}		
		       $save_data=array(
			    'image'=>isset($images)?$images:'',
				'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
	            'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'particulars'=>isset($post['particulars'])?$post['particulars']:'',
	            'received_by'=>isset($post['received_by'])?$post['received_by']:'',
	            'amount'=>isset($post['amount'])?$post['amount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
	            'trans_action_no'=>isset($post['trans_action_no'])?$post['trans_action_no']:'',
	            'cheque_no'=>isset($post['cheque_no'])?$post['cheque_no']:'',
	            'date'=>isset($post['date'])?$post['date']:'',
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Expenditure_model->save_expenditure_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"Expenditure details successfully added");	
					redirect('expenditure/lists');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('expenditure/add');
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
			$e_id=base64_decode($this->uri->segment(3));
			$data['district_list']=$this->Expenditure_model->district_list();
			$data['edit_expenditure']=$this->Expenditure_model->edit_expenditure_details($e_id);
            $data['town_list']=$this->Expenditure_model->get_town_list($data['edit_expenditure']['district']);			
			      //echo'<pre>';print_r($data);exit;
			$this->load->view('expenditure/edit',$data);
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
		 $edit_expenditure=$this->Expenditure_model->edit_expenditure_details($post['e_id']);
			if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
			unlink('assets/expenditure_images/'.$edit_expenditure['image']);
			$temp = explode(".", $_FILES["image"]["name"]);
			$images = round(microtime(true)) . '.' . end($temp);
			$org_image=$_FILES["image"]["name"];
			move_uploaded_file($_FILES['image']['tmp_name'], "assets/expenditure_images/" . $images);
			}else{
			$images=$edit_expenditure['image'];
			$org_image=$edit_expenditure['org_image'];
			}
          if(isset($post['payment_type']) && $post['payment_type']=='Cash'){		 
		       $update_data=array(
			   'image'=>isset($images)?$images:'',
			   'org_image'=>isset($org_image)?$org_image:'',
	           'particulars'=>isset($post['particulars'])?$post['particulars']:'',
			   	'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'received_by'=>isset($post['received_by'])?$post['received_by']:'',
	            'amount'=>isset($post['amount'])?$post['amount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
				 'trans_action_no'=>'',
				 'cheque_no'=>'',
	            'date'=>isset($post['date'])?$post['date']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 $updates_datas=array(
				'e_id'=>isset($post['e_id'])?$post['e_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Expenditure_model->notifications_list($post['e_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Expenditure_model->update_notifications_list_details($check['e_id'],$updates_datas);	 
				 }else{
				$this->Expenditure_model->save_notifications_list_details($updates_datas);
				 }
                $update=$this->Expenditure_model->update_expenditure_details($post['e_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Expenditure details  successfully updated");	
					redirect('expenditure/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('expenditure/edit/'.base64_encode($post['e_id']));
					  }    
		 }else  if(isset($post['payment_type']) && $post['payment_type']=='Online'){		
			$update_data=array(
			 'image'=>isset($images)?$images:'',
			  'org_image'=>isset($org_image)?$org_image:'',
	           'particulars'=>isset($post['particulars'])?$post['particulars']:'',
	            'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'received_by'=>isset($post['received_by'])?$post['received_by']:'',
	            'amount'=>isset($post['amount'])?$post['amount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
	            'trans_action_no'=>isset($post['trans_action_no'])?$post['trans_action_no']:'',
	            'cheque_no'=>'',
	            'date'=>isset($post['date'])?$post['date']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'e_id'=>isset($post['e_id'])?$post['e_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Expenditure_model->notifications_list($post['e_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Expenditure_model->update_notifications_list_details($check['e_id'],$updates_datas);	 
				 }else{
				$this->Expenditure_model->save_notifications_list_details($updates_datas);
				 }
                $update=$this->Expenditure_model->update_expenditure_details($post['e_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Expenditure details  successfully updated");	
					redirect('expenditure/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('expenditure/edit/'.base64_encode($post['e_id']));
					  }    	
				 }else  if(isset($post['payment_type']) && $post['payment_type']=='Cheques'){	
				$update_data=array(
				'image'=>isset($images)?$images:'',
			    'org_image'=>isset($org_image)?$org_image:'',
	           'particulars'=>isset($post['particulars'])?$post['particulars']:'',
	            'district'=>isset($post['district'])?$post['district']:'',
	            'town'=>isset($post['town'])?$post['town']:'',
	            'received_by'=>isset($post['received_by'])?$post['received_by']:'',
	            'amount'=>isset($post['amount'])?$post['amount']:'',
	            'payment_type'=>isset($post['payment_type'])?$post['payment_type']:'',
	            'trans_action_no'=>'',
	            'cheque_no'=>isset($post['cheque_no'])?$post['cheque_no']:'',
	            'date'=>isset($post['date'])?$post['date']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'e_id'=>isset($post['e_id'])?$post['e_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Expenditure_model->notifications_list($post['e_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Expenditure_model->update_notifications_list_details($check['e_id'],$updates_datas);	 
				 }else{
				$this->Expenditure_model->save_notifications_list_details($updates_datas);
				 }
                $update=$this->Expenditure_model->update_expenditure_details($post['e_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"Expenditure details  successfully updated");	
					redirect('expenditure/lists');	
					  }else{
						$this->session->set_flashdata('error',"techechal probelem occur ");
						redirect('expenditure/edit/'.base64_encode($post['e_id']));
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
							'notification_status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Expenditure_model->update_expenditure_details($e_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"Expenditure details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"Expenditure details  successfully  Activate.");
								}
								redirect('expenditure/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('expenditure/lists');
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
	             $e_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($e_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$update=array(
							'e_id'=>$e_id,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
                             'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
							);
							$this->Expenditure_model->save_notifications_list_details($update);
							$statusdata=$this->Expenditure_model->update_expenditure_details($e_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Expenditure details  successfully  deleted.");
								redirect('expenditure/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('expenditure/lists');
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
	             $e_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Expenditure_model->delete_expenditure_details($e_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"Expenditure details  successfully  deleted.");
								redirect('expenditure/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('expenditure/lists');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	*/
	public function monthlywise()
	{	
		if($this->session->userdata('user_details'))
		{
			
			$this->load->view('expenditure/monthly-expenditure');
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	public function monthlywisereports()
	{	
		if($this->session->userdata('user_details'))
		{
		$post=$this->input->post();	
			 //echo'<pre>';print_r($post);exit;
	$data['monthly_wise_reports']=$this->Expenditure_model->get_monthly_wise_reports($post['month'],$post['year']);	
	$data['month_name']=$this->Expenditure_model->get_month_name($post['month'],$post['year']);	
         //echo'<pre>';print_r($data);exit;
		if($data['monthly_wise_reports']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = $data['month_name']['dates'].'.pdf';            
					$data['page_title'] = $data['monthly_wise_reports']['e_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/monthly_wise_expenditure_reports/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('expenditure/monthly_expenditure_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/monthly_wise_expenditure_reports/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"expenditure monthly  Reports no data");
				redirect('expenditure/monthlywise'); 
				}
			
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
					$town_list=$this->Expenditure_model->get_town_list($post['district']);
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
	
	public function districtwise()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Expenditure_model->district_list();
			$this->load->view('expenditure/district-expenditure',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
	public function districtwisereports()
	{	
		if($this->session->userdata('user_details'))
		{
		$post=$this->input->post();	
		//echo'<pre>';print_r($post);exit;
	$data['district_wise_reports']=$this->Expenditure_model->get_district_wise_reports($post['district'],$post['town'],$post['month'],$post['year']);	
	$data['month_name']=$this->Expenditure_model->get_district_wise_month_name($post['district'],$post['town'],$post['month'],$post['year']);	
         //echo'<pre>';print_r($data);exit;
		if($data['district_wise_reports']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = $data['month_name']['dates'].'.pdf';            
					$data['page_title'] = $data['district_wise_reports']['e_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/district_wise_expenditure_reports/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('expenditure/district_wise_expenditure_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/district_wise_expenditure_reports/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"expenditure district wise  Reports no data");
				redirect('expenditure/districtwise'); 
				}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
}
