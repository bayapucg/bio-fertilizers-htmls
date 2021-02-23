<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');
class Income extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Income_model');
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			
			$this->load->view('income/monthly-income');
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
		
	$data['cash_amount']=$this->Income_model->get_cash_amount($post['month'],$post['year']);
	$data['online_amount']=$this->Income_model->get_online_amount($post['month'],$post['year']);
	$data['cheque_amount']=$this->Income_model->get_cheque_amount($post['month'],$post['year']);
   $data['month_name']=$this->Income_model->get_month_name($post['month'],$post['year']);
$data['investment_amount']=$this->Income_model->get_investment_amount($post['month'],$post['year']);
$data['paid_amount']=$this->Income_model->paid_amount_monthly_reports($post['month'],$post['year']);	
$data['discount_amount']=$this->Income_model->discount_amount_monthly_reports($post['month'],$post['year']);	
	$total_amount=$this->Income_model->total_amount_monthly_reports($post['month'],$post['year']);	
	$investment_amount=$this->Income_model->investment_amount_monthly_reports($post['month'],$post['year']);	

	   if(isset($total_amount) && count($total_amount)>0){
			$count='';
			foreach($total_amount as $list){
			$count +=$list['total'];
			}
			$data['total_amount']=$count;
			}else{
			$data['total_amount']='0';
			}
	   if(isset($investment_amount) && count($investment_amount)>0){
			$count='';
			foreach($investment_amount as $lis){
			$count +=$lis['investment'];
			}
			$data['investment_amount']=$count;
			}else{
			$data['investment_amount']='0';
			}
		
    $data['monthly_wise_reports']=$this->Income_model->get_monthly_reports($post['month'],$post['year']);
	//echo'<pre>';print_r($data);exit;
		
		
        if($data['monthly_wise_reports']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '21'.'12_11.pdf';             
					$data['page_title'] = $data['month_name']['p_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/monthly_income_bill/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('income/monthly_income_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/monthly_income_bill/".$file_name);
				}else{
			    $this->session->set_flashdata('error'," monthly income bill Reports no data");
				redirect('income'); 
				}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	public function district_wise()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Income_model->get_district_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('income/district-wise-monthly-income',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public function district_wise_reports()
	{	
		if($this->session->userdata('user_details'))
		{
		$post=$this->input->post();	
		//echo'<pre>';print_r($post);exit;
	$data['cash_amount']=$this->Income_model->get_district_wise_cash_amount($post['district'],$post['town'],$post['month'],$post['year']);
	$data['online_amount']=$this->Income_model->get_district_wise_online_amount($post['district'],$post['town'],$post['month'],$post['year']);
	$data['cheque_amount']=$this->Income_model->get_district_wise_cheque_amount($post['district'],$post['town'],$post['month'],$post['year']);
   $data['month_name']=$this->Income_model->get_district_wise_month_name($post['district'],$post['town'],$post['month'],$post['year']);
//$data['investment_amount']=$this->Income_model->get_investment_amount($post['month'],$post['year']);
$data['paid_amount']=$this->Income_model->paid_amount_district_wise_monthly_reports($post['district'],$post['town'],$post['month'],$post['year']);
$data['discount_amount']=$this->Income_model->discount_district_wise_amount_monthly_reports($post['district'],$post['town'],$post['month'],$post['year']);	
	
	$total_amount=$this->Income_model->total_amount_district_wise_monthly_reports($post['district'],$post['town'],$post['month'],$post['year']);	
	//$investment_amount=$this->Income_model->investment_amount_monthly_reports($post['month'],$post['year']);	

	   if(isset($total_amount) && count($total_amount)>0){
			$count='';
			foreach($total_amount as $list){
			$count +=$list['total'];
			}
			$data['total_amount']=$count;
			}else{
			$data['total_amount']='0';
			}
			/*
	   if(isset($investment_amount) && count($investment_amount)>0){
			$count='';
			foreach($investment_amount as $lis){
			$count +=$lis['investment'];
			}
			$data['investment_amount']=$count;
			}else{
			$data['investment_amount']='0';
			}
		*/
    $data['monthly_wise_reports']=$this->Income_model->get_district_wise_monthly_reports($post['district'],$post['town'],$post['month'],$post['year']);
	//echo'<pre>';print_r($data);exit;
		
		
        if($data['monthly_wise_reports']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '21'.'12_11.pdf';             
					$data['page_title'] = $data['month_name']['p_id'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/district_wise_monthly_income_bill/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('income/district-wise-monthly-income_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/district_wise_monthly_income_bill/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"district wise monthly income bill Reports no data");
				redirect('income/district_wise'); 
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
					$town_list=$this->Income_model->get_town_list($post['district']);
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
	public function pending()
	{	
		if($this->session->userdata('user_details'))
		{
			$data['district_list']=$this->Income_model->get_district_list();
			//echo'<pre>';print_r($data);exit;
			$this->load->view('income/pending-report',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	public function pendingreports()
	{	
		if($this->session->userdata('user_details'))
		{
		$post=$this->input->post();	
           //echo '<pre>';print_r($post);exit;
	
    $data['district_name']=$this->Income_model->get_district_name($post['district'],$post['town'],$post['month'],$post['year']);
    $data['pending_reports']=$this->Income_model->get_district_wise_monthly_pending_reports($post['district'],$post['town'],$post['month'],$post['year']);
	
	$data['bills_total_amounts']=$this->Income_model->get_bills_total_amounts($post['district'],$post['town'],$post['month'],$post['year']);
    $data['bills_paid_amounts']=$this->Income_model->get_bills_paid_amounts($post['district'],$post['town'],$post['month'],$post['year']);
	

$data['prevous_pending_reports']=$this->Income_model->get_district_wise_monthly_prevous_pending_reports($post['district'],$post['town'],$post['month'],$post['year']);
$data['prevous_paid_amount']=$this->Income_model->paid_amount($post['district'],$post['town'],$post['month'],$post['year']);
$data['prevous_total_amount']=$this->Income_model->prevous_total_amount($post['district'],$post['town'],$post['month'],$post['year']);


     //echo '<pre>';print_r($data);exit;

      





		
        if($data['pending_reports']!=array()){
				$path = rtrim(FCPATH,"/");
					$file_name = '21'.'12_11.pdf';             
					$data['page_title'] = $data['pending_reports']['hospital'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/district_wise_pending_bill/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('income/pending-report_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("assets/district_wise_pending_bill/".$file_name);
				}else{
			    $this->session->set_flashdata('error',"district wise monthly pending bill Reports no data");
				redirect('income/pending'); 
				}
			
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
	
	
	
	
	
	
	

	
	
}
