<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Admin_model');
		$this->load->model('Notification_model');
	
			if($this->session->userdata('user_details'))
			{
				$user_details=$this->session->userdata('user_details');
				$data['user_details']=$this->Admin_model->get_admin_details($user_details['a_id']);
				/* notifications */
				$data['notifications_list']=$this->Notification_model->get_notifications_list();
				//echo'<pre>';print_r($data);exit;
				
				$data['sales_person_list_data']=$this->Notification_model->get_sales_person_list_data();
				$data['hospital_list_data']=$this->Notification_model->get_hospital_list_data();
				$data['expenditure_list_data']=$this->Notification_model->get_expenditure_list_data();
				$data['payments_list_data']=$this->Notification_model->get_payments_list_data();
				$data['bmw_invoice_list_data']=$this->Notification_model->get_bmw_invoice_list_data();
				//echo'<pre>';print_r($data);exit;
				$this->load->view('admin/header',$data);
			    $this->load->view('admin/sidebar',$data);
			}
		}
	
}
