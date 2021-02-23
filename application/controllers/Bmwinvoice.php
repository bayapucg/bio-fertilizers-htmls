<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bmwinvoice extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('Bmwinvoice_model');
		$this->load->model('Notification_model');
	    $this->load->library('livemumtowordclsconvert');

	}
	
	public function monthlybill()
	{	
		if($this->session->userdata('user_details'))
		{
			/* notifications */
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
				
			$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list();
			$data['hospital_types']=$this->Bmwinvoice_model->get_hospital_types_list();
			$data['months_list']=$this->Bmwinvoice_model->get_months_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/bmw-invoice',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function monthlybilllist()
	{	
		if($this->session->userdata('user_details'))
		{
			/* notifications */
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
			$data['mothly_bill_list']=$this->Bmwinvoice_model->get_mothly_bill_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/bmw-invoice-list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}

	public function billpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$post=$this->input->post();
			//echo'<pre>';print_r($post);exit;
              if($post['hospital_types']=='Bedded hospital'){
			//$data['mothlybill_list']=$this->Bmwinvoice_model->get_mothlybill_list($post['hospital'],$post['month']);
			//$data['hospital_details']=$this->Bmwinvoice_model->get_hospital_details($post['hospital'],$post['month']);
			//$data['payments_details']=$this->Bmwinvoice_model->get_payments_details($post['hospital'],$post['month']);
						//echo'<pre>';print_r($data);exit;
			//$this->load->view('admin/header');
			//$this->load->view('admin/sidebar');
			
			 $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/monthlybill');
				}	
			
			
			$save_data=array(
	            'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
	            'total_amount'=>((isset($post['no_beds'])?$post['no_beds']:'')*(isset($post['cost_per_month'])?$post['cost_per_month']:'')),
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				
		        $save=$this->Bmwinvoice_model->save_hospital_monthly_bill_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully added");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/monthlybill');
					}  
			
			  }else if($post['hospital_types']=='Nursing home'){
			
			
			 $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/monthlybill');
				}	
			
			
			$save_data=array(
				'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
	            'total_amount'=>((isset($post['no_beds'])?$post['no_beds']:'')*(isset($post['cost_per_month'])?$post['cost_per_month']:'')),
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 // echo'<pre>';print_r($save_data);exit;
		        $save=$this->Bmwinvoice_model->save_hospital_monthly_bill_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully added");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/monthlybill');
					}  
			
			
			
			
			
			  }else{
				  $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/monthlybill');
				}	
			
			
			$save_data=array(
			    'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>'',
	            'cost_per_month'=>'',
	            'total_amount'=>isset($post['total_amounts'])?$post['total_amounts']:'',
				'status'=>1,
				'notification_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 
		        $save=$this->Bmwinvoice_model->save_hospital_monthly_bill_details($save_data);	
		       if(count($save)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully added");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/monthlybill');
					}   
				  
			  }
			
			
			
			
			
			
			
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	public function get_hospital_types(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$hospital_list=$this->Bmwinvoice_model->get_hospital_types($post['hospital_types']);
						//	echo'<pre>';print_r($hospital_list);exit;
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
	
	public function get_hospital_no_beds(){
	if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
					$post=$this->input->post();
					//echo'<pre>';print_r($post);exit;
					$hospital_list=$this->Bmwinvoice_model->get_hospital_no_beds($post['hospital']);
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
	
	
	public function paidbilllist()
	{	
		if($this->session->userdata('user_details'))
		{
			
			/* notifications */
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
				
			$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list();
			$data['months_list']=$this->Bmwinvoice_model->get_months_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/paid-invoice',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function pendingbilllist()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
				
			$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list();
			$data['months_list']=$this->Bmwinvoice_model->get_months_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/pending-invoice',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	public function paidbill(){
	if($this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			 //echo'<pre>';print_r($post);exit;
			
	   $data['paid_bill']=$this->Bmwinvoice_model->get_monthly_paid_list($post['hospital'],$post['month'],$post['year']);
	  $data['paid_bills_previous_month']=$this->Bmwinvoice_model->get_monthly_previous_amount($post['hospital'],$post['month'],$post['year']);

	  $data['paid_previous_month']=$this->Bmwinvoice_model->get_pending_previous_month($post['hospital'],$post['month'],$post['year']);
	  $data['total_previous_month']=$this->Bmwinvoice_model->get_total_previous_month($post['hospital'],$post['month'],$post['year']);
	  $data['month_name']=$this->Bmwinvoice_model->get_monthly_name($post['hospital'],$post['month'],$post['year']);
		      	  	// echo'<pre>';print_r($data);exit;
          if($data['paid_bill']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '22'.'12_11.pdf';            
					$data['page_title'] = $data['month_name']['p_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/paid_bills/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('bills/paid_invoice_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/paid_bills/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"paid bill this monthly  no data");
				redirect('bmwinvoice/paidbilllist'); 
				}
			
	   }else{
		$this->session->set_flashdata('error',"you don't have permission to access");
		redirect('admin');
		}
	}
	
	
	
	public function pendingbill(){
	if($this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			 //echo'<pre>';print_r($post);exit;
			
	  $data['pending_bill']=$this->Bmwinvoice_model->get_monthly_pending_bill($post['hospital'],$post['month'],$post['year']);
	  $data['monthly_pending_bill_list']=$this->Bmwinvoice_model->get_monthly_pending_bill_list($post['hospital'],$post['month'],$post['year']);
	  $data['paid_bills_previous_month']=$this->Bmwinvoice_model->get_monthly_previous_pending_amount($post['hospital'],$post['month'],$post['year']);
       $data['paid_previous_month']=$this->Bmwinvoice_model->get_pending_previous_month($post['hospital'],$post['month'],$post['year']);
	  $data['total_previous_month']=$this->Bmwinvoice_model->get_total_previous_month($post['hospital'],$post['month'],$post['year']);
	 
		      	  	//echo'<pre>';print_r($data);exit;
          if($data['pending_bill']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '22'.'12_11.pdf';            
					$data['page_title'] = $data['pending_bill']['h_m_b_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/pending_bills/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('bills/pending_invoice_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/pending_bills/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"paid bill this monthly  no data");
				redirect('bmwinvoice/pendingbilllist'); 
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
			/* notifications */
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
			$h_m_b_id=base64_decode($this->uri->segment(3));
			$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list();
			$data['hospital_types']=$this->Bmwinvoice_model->get_hospital_types_list();
			$data['edit_bill']=$this->Bmwinvoice_model->edit_mothly_bill($h_m_b_id);
		   $data['hospital_list_data']=$this->Bmwinvoice_model->get_hospital_types($data['edit_bill']['hospital_types']);

			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/edit-bmw-invoice',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function editpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			$post=$this->input->post();
			//echo'<pre>';print_r($post);exit;
              
			//$data['mothlybill_list']=$this->Bmwinvoice_model->get_mothlybill_list($post['hospital'],$post['month']);
			//$data['hospital_details']=$this->Bmwinvoice_model->get_hospital_details($post['hospital'],$post['month']);
			//$data['payments_details']=$this->Bmwinvoice_model->get_payments_details($post['hospital'],$post['month']);
						//echo'<pre>';print_r($data);exit;
			//$this->load->view('admin/header');
			//$this->load->view('admin/sidebar');
			
			 if($post['hospital_types']=='Bedded hospital'){
			$edit_bill=$this->Bmwinvoice_model->edit_mothly_bill($post['h_m_b_id']);
			 if($edit_bill['hospital_types']!=$post['hospital_types'] || $edit_bill['hospital']!=$post['hospital'] || $edit_bill['month']!=$post['month']|| $edit_bill['year']!=date('Y')){
			 $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
				}	
			}
			
			$update_data=array(
	            'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
	            'total_amount'=>((isset($post['no_beds'])?$post['no_beds']:'')*(isset($post['cost_per_month'])?$post['cost_per_month']:'')),
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'h_m_b_id'=>isset($post['h_m_b_id'])?$post['h_m_b_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Bmwinvoice_model->notifications_list($post['h_m_b_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Bmwinvoice_model->update_notifications_list_details($check['h_m_b_id'],$updates_datas);	 
				 }else{
				$this->Bmwinvoice_model->save_notifications_list_details($updates_datas);
				 }
				 //echo'<pre>';print_r($update_data);exit;
		        $update=$this->Bmwinvoice_model->update_hospital_monthly_bill_details($post['h_m_b_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully updated");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
					}  
			
			}else if($post['hospital_types']=='Nursing home'){
			
			$edit_bill=$this->Bmwinvoice_model->edit_mothly_bill($post['h_m_b_id']);
			 $edit_bill=$this->Bmwinvoice_model->edit_mothly_bill($post['h_m_b_id']);
			 if($edit_bill['hospital_types']!=$post['hospital_types'] || $edit_bill['hospital']!=$post['hospital'] || $edit_bill['month']!=$post['month']|| $edit_bill['year']!=date('Y')){
			 $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
				}	
			}
			
			
			$update_data=array(
	            'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>isset($post['no_beds'])?$post['no_beds']:'',
	            'cost_per_month'=>isset($post['cost_per_month'])?$post['cost_per_month']:'',
	            'total_amount'=>((isset($post['no_beds'])?$post['no_beds']:'')*(isset($post['cost_per_month'])?$post['cost_per_month']:'')),
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				 $updates_datas=array(
				'h_m_b_id'=>isset($post['h_m_b_id'])?$post['h_m_b_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Bmwinvoice_model->notifications_list($post['h_m_b_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Bmwinvoice_model->update_notifications_list_details($check['h_m_b_id'],$updates_datas);	 
				 }else{
				$this->Bmwinvoice_model->save_notifications_list_details($updates_datas);
				 }
		        $update=$this->Bmwinvoice_model->update_hospital_monthly_bill_details($post['h_m_b_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully updated");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
					}  
			
			
			
			
			
			
			}else{
				$edit_bill=$this->Bmwinvoice_model->edit_mothly_bill($post['h_m_b_id']);
			 if($edit_bill['hospital_types']!=$post['hospital_types'] || $edit_bill['hospital']!=$post['hospital'] || $edit_bill['month']!=$post['month']|| $edit_bill['year']!=date('Y')){
			 $check=$this->Bmwinvoice_model->check_hospital_month_year_already_exit($post['hospital_types'],$post['hospital'],$post['month'],date('Y'));
				if(count($check)>0){
					$this->session->set_flashdata('error',"hospital bill month year already exist. Please use another hospital name ");
					redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
				}	
			}
			
			
			$update_data=array(
	             'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
	            'hospital'=>isset($post['hospital'])?$post['hospital']:'',
	            'month'=>isset($post['month'])?$post['month']:'',
	            'year'=>date('Y'),
	            'no_beds'=>'',
	            'cost_per_month'=>'',
	            'total_amount'=>isset($post['total_amounts'])?$post['total_amounts']:'',
				'status'=>1,
				'notification_status'=>3,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				 );
				  $updates_datas=array(
				'h_m_b_id'=>isset($post['h_m_b_id'])?$post['h_m_b_id']:'',
				'notification_status'=>3,
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
				);
				$check=$this->Bmwinvoice_model->notifications_list($post['h_m_b_id']);
				//echo'<pre>';print_r($check);exit;
				if(($check)>0){
				$this->Bmwinvoice_model->update_notifications_list_details($check['h_m_b_id'],$updates_datas);	 
				 }else{
				$this->Bmwinvoice_model->save_notifications_list_details($updates_datas);
				 }
				 // echo'<pre>';print_r($update_data);exit;
		        $update=$this->Bmwinvoice_model->update_hospital_monthly_bill_details($post['h_m_b_id'],$update_data);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"hospital monthly bill details successfully updated");	
					redirect('bmwinvoice/monthlybilllist');	
					}else{
						$this->session->set_flashdata('error',"technical problem occurred. please try again once");
						redirect('bmwinvoice/edit/'.base64_encode($post['h_m_b_id']));
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
	             $h_m_b_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					if($h_m_b_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'notification_status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Bmwinvoice_model->update_hospital_monthly_bill_details($h_m_b_id,$stusdetails);
							$this->Bmwinvoice_model->update_payments_details($h_m_b_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"hospital monthly bill details  successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"hospital monthly bill details  successfully  Activate.");
								}
								redirect('bmwinvoice/monthlybilllist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('bmwinvoice/monthlybilllist');
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
	             $h_m_b_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($h_m_b_id!=''){
						$stusdetails=array(
							'status'=>2,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$update=array(
							'h_m_b_id'=>$h_m_b_id,
							'notification_status'=>2,
							'updated_at'=>date('Y-m-d H:i:s'),
                             'created_by'=>isset($login_details['a_id'])?$login_details['a_id']:''
							);
							$this->Bmwinvoice_model->save_notifications_list_details($update);
							$statusdata=$this->Bmwinvoice_model->update_hospital_monthly_bill_details($h_m_b_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"hospital monthly bill details  successfully  deleted.");
								redirect('bmwinvoice/monthlybilllist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('bmwinvoice/monthlybilllist');
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
	             $h_m_b_id=base64_decode($this->uri->segment(3));
							$statusdata=$this->Bmwinvoice_model->delete_bill_details($h_m_b_id);
							$this->Bmwinvoice_model->delete_payment_details($h_m_b_id);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"payments details  successfully  deleted.");
								redirect('bmwinvoice/monthlybilllist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('bmwinvoice/monthlybilllist');
							}
	
					}else{
					 $this->session->set_flashdata('error',"Please login and continue");
					 redirect('admin');  
				   }
    }
	*/
	
	public function bill()
	{	
		if($this->session->userdata('user_details'))
		{
			 $login_details=$this->session->userdata('user_details');	
			 /* notifications */
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
			//$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list();
			$data['hospital_list']=$this->Bmwinvoice_model->get_hospital_list_data();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('invoice/monthly-bill',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
	
	
	
	public function billprint(){
	if($this->session->userdata('user_details'))
	{
		 $login_details=$this->session->userdata('user_details');	
		$post=$this->input->post();
	  $years=$post['year'];
	  $months=$post['month'];
	  		//echo'<pre>';print_r($years);exit;

	 $month_count=$this->Bmwinvoice_model->monthly_count($post['month'],$post['year']);
     $moths_and_year=$this->Bmwinvoice_model->monthly_and_year_list($post['month'],$post['year']);
     		//echo'<pre>';print_r($month_count);exit;	
       
	 $cnt=$month_count['count'];
	 $data['cnts']=$month_count['count'];
        $data['days']=cal_days_in_month(CAL_GREGORIAN,$post['month'],$post['year']);
	   	$data['month_name']=$this->Bmwinvoice_model->monthly_list($post['hospital'],$post['month'],$post['year']);
	   $data['bill_paid_amount']=$this->Bmwinvoice_model->get_bill_paid_amount($post['hospital'],$post['month'],$post['year']);
	   $data['previous_total_month_bill']=$this->Bmwinvoice_model->get_previous_total_month_bill($post['hospital'],$post['month'],$post['year']);
	   $data['previous_paid_month_bill']=$this->Bmwinvoice_model->get_previous_paid_month_bill($post['hospital'],$post['month'],$post['year']);
	   
	        
	  //$data['bill']=$this->Bmwinvoice_model->get_mothly_genrate_bill($post['hospital'],$post['month'],$post['year']);
	 // $data['previous_bill_paid']=$this->Bmwinvoice_model->genrate_previous_paid_bill($post['hospital'],$post['month'],$post['year']);
	  //$data['previous_bill_total']=$this->Bmwinvoice_model->genrate_previous_total_bill($post['hospital'],$post['month'],$post['year']);
		           // echo'<pre>';print_r($data);exit;	 

          if($data['month_name']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = $years.'-'.$months.'-'.$cnt.'.pdf';                 
					$data['page_title'] = $data['month_name']['h_m_b_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/monthly_bmw_bills/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('invoice/monthly_bill_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					$update_data=array(
			       'cnt'=>(isset($month_count['count'])?$month_count['count']:'')+1,
			        );
					foreach($moths_and_year as $list){
	   	  $this->Bmwinvoice_model->update_count_value($list['h_m_b_id'],$update_data);
					}
					redirect("assets/monthly_bmw_bills/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"Monthly BMW Generation Bill  no data");
				redirect('bmwinvoice/bill'); 
				}
			
	   }else{
		$this->session->set_flashdata('error',"you don't have permission to access");
		redirect('admin');
		}
	}
	
	
	
	public function prints(){
	if($this->session->userdata('user_details'))
		{
	    $h_m_b_id=base64_decode($this->uri->segment(3));
		$data['month_name']=$this->Bmwinvoice_model->monthly_list_hospital_bill($h_m_b_id);
		
			     //echo'<pre>';print_r($data);exit;

	  // $data['bill_paid_amount']=$this->Bmwinvoice_model->get_bill_paid_amount($post['hospital'],$post['month'],$post['year']);
	   //$data['previous_total_month_bill']=$this->Bmwinvoice_model->get_previous_total_month_bill($post['hospital'],$post['month'],$post['year']);
	   //$data['previous_paid_month_bill']=$this->Bmwinvoice_model->get_previous_paid_month_bill($post['hospital'],$post['month'],$post['year']);
          if($data['month_name']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '22'.'12_11.pdf';            
					$data['page_title'] = $data['month_name']['h_m_b_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/pending_bills/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('bills/pending_invoice_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/pending_bills/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"paid bill this monthly  no data");
				redirect('bmwinvoice/pendingbilllist'); 
				}
			
	   }else{
		$this->session->set_flashdata('error',"you don't have permission to access");
		redirect('admin');
		}
	}
	
	function download(){
		if($this->session->userdata('user_details'))
		{
			/* notifications */
			$h_m_b_id=base64_decode($this->uri->segment(3));	
				$data['h_bill_d']=$this->Bmwinvoice_model->get_bill_hospital_details($h_m_b_id);
				$data['payment_list']=$this->Bmwinvoice_model->get_bill_payment_list($data['h_bill_d']['hospital']);
				//echo '<pre>';print_r($data);exit;
				$path = rtrim(FCPATH,"/");
				$file_name = $data['h_bill_d']['h_m_b_id'].$data['h_bill_d']['cnt'].'.pdf';                 
				$data['page_title'] = $data['h_bill_d']['h_m_b_id'].'invoice'; // pass data to the view
				$pdfFilePath = $path."/assets/monthly_bmw_bills_invoice/".$file_name;
				ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$html = $this->load->view('invoice/bill_pdf', $data, true); // render the view into HTML
				//echo '<pre>';print_r($html);exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$pdf->SetDisplayMode('fullpage');
				$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F');
				redirect("assets/monthly_bmw_bills_invoice/".$file_name);
			//echo'<pre>';print_r($data);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	

	
	
}
