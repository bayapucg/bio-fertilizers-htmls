<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification extends CI_Controller {

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
		$this->load->model('Certification_model');
		$this->load->model('Notification_model');
	    $this->load->library('livemumtowordclsconvert');

	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			/* notifications */
			$data['c_list']=$this->Certification_model->get_certification_list();				
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('certifications/c_list',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function add()
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
			//echo'<pre>';print_r($data);exit;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('certifications/certificate',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	function download(){
		if($this->session->userdata('user_details'))
		{
			/* notifications */
				$c_id=base64_decode($this->uri->segment(3));	
				$data['c_details']=$this->Certification_model->get_certification_details($c_id);			
				//echo '<pre>';print_r($data);
				$path = rtrim(FCPATH,"/");
				$file_name = $data['c_details']['c_id'].$data['c_details']['hospital_name'].'.pdf';                 
				$data['page_title'] = $data['c_details']['hospital_name'].'invoice'; // pass data to the view
				$pdfFilePath = $path."/assets/certifications/".$file_name;
				ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$html = $this->load->view('certifications/certification_pdf', $data, true); // render the view into HTML
				//echo '<pre>';print_r($html);exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				//$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$pdf->SetDisplayMode('fullpage');
				$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F');
				redirect("assets/certifications/".$file_name);
			//echo'<pre>';print_r($data);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function addpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			$ld=$this->session->userdata('user_details');
			$ad=array(
			'hospital_types'=>isset($post['hospital_types'])?$post['hospital_types']:'',
			'hospital'=>isset($post['hospital'])?$post['hospital']:'',
			'total_bed_strength'=>isset($post['total_bed_strength'])?$post['total_bed_strength']:'',
			'to_date'=>isset($post['to_date'])?$post['to_date']:'',
			'from_date'=>isset($post['from_date'])?$post['from_date']:'',
			'registration_no'=>isset($post['registration_no'])?$post['registration_no']:'',
			'created_at'=>date('Y-m-d h:i:s'),
			'created_by'=>isset($ld['a_id'])?$ld['a_id']:''
			);
			$save=$this->Certification_model->save_certification($ad);	
			if(count($save)>0){
				$this->session->set_flashdata('success',"Certification details successfully added");	
				redirect('certification/index');	
			}else{
				$this->session->set_flashdata('error',"technical problem occurred. please try again once");
				redirect('certification/add');
			} 
			//echo'<pre>';print_r($post);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	

	
	
}
